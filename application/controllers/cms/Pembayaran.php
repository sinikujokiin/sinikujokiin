<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembayaran extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Datatable_Model');
		$this->load->model('General_Model');
		cekLogin();
	}

	public function index()
	{
		$data = [
			'title' => 'List Pembayaran'
		];	

		$this->template->load('templates/cms', 'cms/pembayaran',$data, FALSE);
	}


		function getDataById($id_pembayaran)
		{
			if ($this->input->is_ajax_request()) {
				$response = [
					'sukses' => true,
					'data' => $this->General_Model->get("pembayaran",["id_pembayaran" => encrypt_decrypt("decrypt",$id_pembayaran)])->row_array()
				];
				$this->output->set_output(json_encode($response));
			} else {
				exit('Proses Tidak Dapat Dilanjutkan');
			}
		}

		function getData()
		{
			if ($this->input->is_ajax_request()) {
				$userData = $this->session->userdata('userData');
				$column_order = [null, 'ikon', 'nama_pembayaran', 'nomer_pembayaran','status', 'created_at'];
				$column_search = ['ikon', 'nama_pembayaran', 'nomer_pembayaran','status', 'created_at'];
				$where = ['pembayaran.deleted_at' => null];
				$order = ['id_pembayaran' => 'ASC'];
				$query = [
					'table' => 'pembayaran',
					'select' => '*',
					'where' => $where,
					'join' => []
				];
				// var_dump($this->input->post('tipe'));
				$pembayaran = $this->Datatable_Model->getDataTables($query, $column_order, $column_search, $order);
				$data = [];
				$no = @$_POST['start'];
				foreach ($pembayaran as $bayar) {
					$no++;
					$row = [];
					$row[] = $no . ".";
					$row[] = '<img src="'.base_url('uploads/pembayaran/'.$bayar->ikon).'" width="150px" alt="'.$bayar->nama_pembayaran.'" title="'.$bayar->nama_pembayaran.'">';
					$row[] = $bayar->nama_pembayaran;
					$row[] = '<span class="badge badge-info">'.$bayar->nomer_pembayaran.'</span>';
					if ($bayar->status == 'Aktif') {
						$row[] = '<button type="button" class="btn btn-success btn-sm" onclick="UpdateStatus(' . "'" . encrypt_decrypt('encrypt',$bayar->id_pembayaran) . "'" . ')">'.$bayar->status.'</button>';
					}else{
						$row[] = '<button type="button" class="btn btn-danger btn-sm" onclick="UpdateStatus(' . "'" . encrypt_decrypt('encrypt',$bayar->id_pembayaran) . "'" . ')">'.$bayar->status.'</button>';
					}
					$row[] = '
					  	<div class="">
		                 	<a href="#" type="button" id="btn-edit-' . $bayar->id_pembayaran . '" onclick="ButtonEdit(' . "'" . encrypt_decrypt('encrypt',$bayar->id_pembayaran) . "'" . ')" class="btn btn-warning shadow btn-sm sharp"><span class="fa fa-edit"></span></a>
		                 	<a href="#" type="button" id="btn-delete-' . $bayar->id_pembayaran . '" onclick="ButtonDelete(' . "'" . encrypt_decrypt('encrypt',$bayar->id_pembayaran) . "'" . ')" class="btn btn-danger shadow btn-sm sharp"><span class="fa fa-trash"></span></a>

		                </div>';
					$data[] = $row;
				}
				$output = [
					'draw' => @$_POST['draw'],
					'recordsTotal' => $this->Datatable_Model->countAll($query),
					'recordsFiltered' => $this->Datatable_Model->countFilters($query, $column_order, $column_search, $order),
					'data' => $data,
				];


				$this->output->set_output(json_encode($output));
			} else {
				exit('Proses Tidak Dapat Dilanjutkan');
			}
		}


	function tambah()
	{
		if ($this->input->is_ajax_request()) {
			if ($this->_validation()) {
				$nama_pembayaran = $this->input->post('nama_pembayaran', TRUE);
				$nomer_pembayaran = $this->input->post('nomer_pembayaran', TRUE);
				$ikon = $this->session->userdata('ikon');
				$data = [
					'nama_pembayaran' => $nama_pembayaran,
					'nomer_pembayaran' => $nomer_pembayaran,
					'status' => "Aktif",
					'ikon' => $ikon,
				];
				$this->General_Model->insert('pembayaran',$data);
				$this->session->unset_userdata('ikon');
				$response = [
					'status' => true,
					'alert' => "Successfully Added Data"
				];
			} else {
				$response['error'] = getErrorValidation();
				$response['error']['ikon'] = strip_tags(form_error('ikon'));
				$response['status'] = false;
				$response['alert'] = 'Failed Added Data';
			}
			$this->output->set_output(json_encode($response));
		} else {
			exit('Proses Tidak Dapat Dilanjutkan');
		}
	}

	function ubah()
	{
		if ($this->input->is_ajax_request()) {
			if ($this->_validation()) {
				$id_pembayaran = $this->input->post('id_pembayaran', TRUE);
				$nama_pembayaran = $this->input->post('nama_pembayaran', TRUE);
				$nomer_pembayaran = $this->input->post('nomer_pembayaran', TRUE);
				$ikon = $this->session->userdata('ikon');
				$data = [
					'nama_pembayaran' => $nama_pembayaran,
					'nomer_pembayaran' => $nomer_pembayaran,
					'ikon' => $ikon,
				];
				$this->General_Model->update('pembayaran',$data,['id_pembayaran' => $id_pembayaran]);
				$this->session->unset_userdata('ikon');
				$response = [
					'status' => true,
					'alert' => "Successfully Updated Data"
				];
			} else {
				$response['error'] = getErrorValidation();
				$response['error']['ikon'] = strip_tags(form_error('ikon'));
				$response['status'] = false;
				$response['alert'] = 'Failed Updated Data';
			}
			$this->output->set_output(json_encode($response));
		} else {
			exit('Proses Tidak Dapat Dilanjutkan');
		}
	}


	private function _validation()
	{
		$this->form_validation->set_rules('nama_pembayaran', 'Nama Pembayaran', 'trim|required');
		$this->form_validation->set_rules('nomer_pembayaran', 'nomer_pembayaran', 'trim|required');
		if (!$this->input->post('id_pembayaran') || $_FILES['ikon']['name']) {
			$this->form_validation->set_rules('ikon', 'ikon', 'callback_upload_file');
		}
		$this->form_validation->set_error_delimiters('', '');
		$return = $this->form_validation->run();
		return $return;
	}

	function upload_file()
	{
		$judul = $this->input->post("nama_pembayaran");
		$path = './uploads/pembayaran/';
		if (!is_dir($path)) {
		    mkdir($path, 0777, TRUE);
		}
		$config['upload_path'] = $path;
		$config['allowed_types'] = 'gif|jpg|png|jpeg|webp';
		$config['file_name'] = uniqid().'-'.url_title($judul, "dash", true).'-'.date("y-m-d");
		$config['overwrite'] = true;
		$this->load->library('upload', $config);
		if ( ! $this->upload->do_upload('ikon')){
			$this->form_validation->set_message('upload_file', $this->upload->display_errors());
			return FALSE;
		}else{
			$ext = explode(".", $this->upload->data('file_name'));
			$ext = end($ext);
			$webp = $this->upload->data('file_name');
			 if ($ext != "webp") {
			 	$webp = covertToWebp($path, $this->upload->data('file_name'));
			 }
			$file = $this->session->set_userdata('ikon', $webp);
			return TRUE;
		}
	}

	function updateStatus($id_pembayaran)
	{
		$id_pembayaran = encrypt_decrypt('decrypt', $id_pembayaran);
		$cek = $this->General_Model->get('pembayaran', ['id_pembayaran' => $id_pembayaran])->row();
		// var_dump($cek);die;
		if ($cek->status == 'Aktif') {
			$status = 'Tidak Aktif';
		}else{
			$status = 'Aktif';
		}

		$this->General_Model->update('pembayaran', ['status' => $status], ['id_pembayaran' => $id_pembayaran]);

		$this->output->set_output(json_encode(['status' => true, 'alert' => "Successfully change status"]));
	}

	function delete($id_pembayaran)
	{
		if ($this->input->is_ajax_request()) {
			softDelete('pembayaran', ['id_pembayaran' => encrypt_decrypt("decrypt",$id_pembayaran)]);
			$response = [
				'status' => true,
				'alert' => 'Successfully deleted data'
			];
			$this->output->set_output(json_encode($response));

		}else{
			exit('access denied');
		}
	}

}

/* End of file Pembayaran.php */
/* Location: ./application/controllers/cms/Pembayaran.php */