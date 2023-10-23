<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TataCaraOrder extends CI_Controller {

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
			'title' => 'Tata Cara Order'
		];	

		$this->template->load('templates/cms', 'cms/tata-cara-order',$data, FALSE);
	}


		function getDataById($id_cara_order)
		{
			if ($this->input->is_ajax_request()) {
				$response = [
					'sukses' => true,
					'data' => $this->General_Model->get("cara_order",["id_cara_order" => encrypt_decrypt("decrypt",$id_cara_order)])->row_array()
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
				$column_order = [null, 'gambar', 'judul_cara_order', 'urutan','status', 'created_at'];
				$column_search = ['gambar', 'judul_cara_order', 'urutan','status', 'created_at'];
				$where = ['cara_order.deleted_at' => null];
				$order = ['urutan' => 'ASC'];
				$query = [
					'table' => 'cara_order',
					'select' => '*',
					'where' => $where,
					'join' => []
				];
				// var_dump($this->input->post('tipe'));
				$cara_order = $this->Datatable_Model->getDataTables($query, $column_order, $column_search, $order);
				$data = [];
				$no = @$_POST['start'];
				foreach ($cara_order as $cara) {
					$no++;
					$row = [];
					$row[] = $no . ".";
					$row[] = '<img src="'.base_url('uploads/cara_order/'.$cara->gambar).'" width="150px" alt="'.$cara->judul_cara_order.'" title="'.$cara->judul_cara_order.'">';
					$row[] = $cara->judul_cara_order.'<hr>'.$cara->deskripsi_cara_order;
					$row[] = '<span class="badge badge-info">'.$cara->urutan.'</span>';
					if ($cara->status == 'Aktif') {
						$row[] = '<button type="button" class="btn btn-success btn-sm" onclick="UpdateStatus(' . "'" . encrypt_decrypt('encrypt',$cara->id_cara_order) . "'" . ')">'.$cara->status.'</button>';
					}else{
						$row[] = '<button type="button" class="btn btn-danger btn-sm" onclick="UpdateStatus(' . "'" . encrypt_decrypt('encrypt',$cara->id_cara_order) . "'" . ')">'.$cara->status.'</button>';
					}
					$row[] = '
					  	<div class="">
		                 	<a href="#" type="button" id="btn-edit-' . $cara->id_cara_order . '" onclick="ButtonEdit(' . "'" . encrypt_decrypt('encrypt',$cara->id_cara_order) . "'" . ')" class="btn btn-warning shadow btn-sm sharp"><span class="fa fa-edit"></span></a>
		                 	<a href="#" type="button" id="btn-delete-' . $cara->id_cara_order . '" onclick="ButtonDelete(' . "'" . encrypt_decrypt('encrypt',$cara->id_cara_order) . "'" . ')" class="btn btn-danger shadow btn-sm sharp"><span class="fa fa-trash"></span></a>

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
				$judul_cara_order = $this->input->post('judul_cara_order', TRUE);
				$deskripsi_cara_order = $this->input->post('deskripsi_cara_order', TRUE);
				$urutan = $this->input->post('urutan', TRUE);
				$gambar = $this->session->userdata('gambar');
				$data = [
					'judul_cara_order' => $judul_cara_order,
					'deskripsi_cara_order' => $deskripsi_cara_order,
					'urutan' => $urutan,
					'status' => "Aktif",
					'gambar' => $gambar,
				];
				$this->General_Model->insert('cara_order',$data);
				$this->session->unset_userdata('gambar');
				$response = [
					'status' => true,
					'alert' => "Successfully Added Data"
				];
			} else {
				$response['error'] = getErrorValidation();
				$response['error']['gambar'] = strip_tags(form_error('gambar'));
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
				$id_cara_order = $this->input->post('id_cara_order', TRUE);
				$judul_cara_order = $this->input->post('judul_cara_order', TRUE);
				$deskripsi_cara_order = $this->input->post('deskripsi_cara_order', TRUE);
				$urutan = $this->input->post('urutan', TRUE);
				$gambar = $this->session->userdata('gambar');
				$data = [
					'judul_cara_order' => $judul_cara_order,
					'deskripsi_cara_order' => $deskripsi_cara_order,
					'urutan' => $urutan,
					'gambar' => $gambar,
				];
				$this->General_Model->update('cara_order',$data,['id_cara_order' => $id_cara_order]);
				$this->session->unset_userdata('gambar');
				$response = [
					'status' => true,
					'alert' => "Successfully Updated Data"
				];
			} else {
				$response['error'] = getErrorValidation();
				$response['error']['gambar'] = strip_tags(form_error('gambar'));
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
		$this->form_validation->set_rules('judul_cara_order', 'judul cara order', 'trim|required');
		$this->form_validation->set_rules('deskripsi_cara_order', 'deskripsi', 'trim|required');
		$this->form_validation->set_rules('urutan', 'urutan', 'trim|required');
		if (!$this->input->post('id_cara_order') || $_FILES['gambar']['name']) {
			$this->form_validation->set_rules('gambar', 'gambar', 'callback_upload_file');
		}
		$this->form_validation->set_error_delimiters('', '');
		$return = $this->form_validation->run();
		return $return;
	}

	function upload_file()
	{
		$judul = $this->input->post("judul_cara_order");
		$path = './uploads/cara_order/';
		if (!is_dir($path)) {
		    mkdir($path, 0777, TRUE);
		}
		$config['upload_path'] = $path;
		$config['allowed_types'] = 'gif|jpg|png|jpeg|webp';
		$config['file_name'] = url_title($judul, "dash", true).'-'.date("y-m-d");
		$config['overwrite'] = true;
		$this->load->library('upload', $config);
		if ( ! $this->upload->do_upload('gambar')){
			$this->form_validation->set_message('upload_file', $this->upload->display_errors());
			return FALSE;
		}else{
			$ext = explode(".", $this->upload->data('file_name'));
			$ext = end($ext);
			$webp = $this->upload->data('file_name');
			if ($ext != "webp") {
				$webp = covertToWebp($path, $this->upload->data('file_name'));
			}
			$file = $this->session->set_userdata('gambar', $webp);
			return TRUE;
		}
	}

	function updateStatus($id_cara_order)
	{
		$id_cara_order = encrypt_decrypt('decrypt', $id_cara_order);
		$cek = $this->General_Model->get('cara_order', ['id_cara_order' => $id_cara_order])->row();
		// var_dump($cek);die;
		if ($cek->status == 'Aktif') {
			$status = 'Tidak Aktif';
		}else{
			$status = 'Aktif';
		}

		$this->General_Model->update('cara_order', ['status' => $status], ['id_cara_order' => $id_cara_order]);

		$this->output->set_output(json_encode(['status' => true, 'alert' => "Successfully change status"]));
	}

	function delete($id_cara_order)
	{
		if ($this->input->is_ajax_request()) {
			softDelete('cara_order', ['id_cara_order' => encrypt_decrypt("decrypt",$id_cara_order)]);
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

/* End of file TataCaraOrder.php */
/* Location: ./application/controllers/cms/TataCaraOrder.php */