<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Testimoni extends CI_Controller {

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
			'title' => 'List Testimoni'
		];	

		$this->template->load('templates/cms', 'cms/testimoni',$data, FALSE);
	}


		function getDataById($id_testimoni)
		{
			if ($this->input->is_ajax_request()) {
				$response = [
					'sukses' => true,
					'data' => $this->General_Model->get("testimoni",["id_testimoni" => encrypt_decrypt("decrypt",$id_testimoni)])->row_array()
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
				$column_order = [null, 'image' , 'nama', 'universitas', 'text','status', 'created_at'];
				$column_search = ['image' , 'nama', 'universitas', 'text','status', 'created_at'];
				$where = ['testimoni.deleted_at' => null];
				$order = ['id_testimoni' => 'ASC'];
				$query = [
					'table' => 'testimoni',
					'select' => '*',
					'where' => $where,
					'join' => []
				];
				// var_dump($this->input->post('tipe'));
				$testimoni = $this->Datatable_Model->getDataTables($query, $column_order, $column_search, $order);
				$data = [];
				$no = @$_POST['start'];
				foreach ($testimoni as $testi) {
					$no++;
					$row = [];
					$row[] = $no . ".";
					$row[] = $testi->image ? '<img src="'.base_url('uploads/testimoni/'.$testi->image).'" width="50px" alt="'.$testi->nama.'" title="'.$testi->nama.'">' : "-";
					$row[] = $testi->nama;
					$row[] = $testi->universitas;
					$row[] = $testi->text;
					if ($testi->status == 'Aktif') {
						$row[] = '<button type="button" class="btn btn-success btn-sm" onclick="UpdateStatus(' . "'" . encrypt_decrypt('encrypt',$testi->id_testimoni) . "'" . ')">'.$testi->status.'</button>';
					}else{
						$row[] = '<button type="button" class="btn btn-danger btn-sm" onclick="UpdateStatus(' . "'" . encrypt_decrypt('encrypt',$testi->id_testimoni) . "'" . ')">'.$testi->status.'</button>';
					}
					$row[] = '
					  	<div class="">
		                 	<a href="#" type="button" id="btn-edit-' . $testi->id_testimoni . '" onclick="ButtonEdit(' . "'" . encrypt_decrypt('encrypt',$testi->id_testimoni) . "'" . ')" class="btn btn-warning shadow btn-sm sharp"><span class="fa fa-edit"></span></a>
		                 	<a href="#" type="button" id="btn-delete-' . $testi->id_testimoni . '" onclick="ButtonDelete(' . "'" . encrypt_decrypt('encrypt',$testi->id_testimoni) . "'" . ')" class="btn btn-danger shadow btn-sm sharp"><span class="fa fa-trash"></span></a>

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
				$nama = $this->input->post('nama', TRUE);
				$universitas = $this->input->post('universitas', TRUE);
				$text = $this->input->post('text', TRUE);
				$image = $this->session->userdata('image');
				$data = [
					'nama' => $nama,
					'universitas' => $universitas,
					'text' => $text,
					'status' => "Aktif",
					'image' => $image ? $image : 'default.jpg',
				];
				$this->General_Model->insert('testimoni',$data);
				$this->session->unset_userdata('image');
				$response = [
					'status' => true,
					'alert' => "Successfully Added Data"
				];
			} else {
				$response['error'] = getErrorValidation();
				$response['error']['image'] = strip_tags(form_error('image'));
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
				$id_testimoni = $this->input->post('id_testimoni', TRUE);
				$nama = $this->input->post('nama', TRUE);
				$universitas = $this->input->post('universitas', TRUE);
				$text = $this->input->post('text', TRUE);
				$image = $this->session->userdata('image');
				$data = [
					'nama' => $nama,
					'universitas' => $universitas,
					'text' => $text,
				];
				if ($image) {
					$data['image'] = $image;
				}
				$this->General_Model->update('testimoni',$data,['id_testimoni' => $id_testimoni]);
				$response = [
					'status' => true,
					'alert' => "Successfully Updated Data"
				];
			} else {
				$response['error'] = getErrorValidation();
				$response['error']['image'] = strip_tags(form_error('image'));
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
		$this->form_validation->set_rules('nama', 'nama', 'trim|required');
		$this->form_validation->set_rules('text', 'isi', 'trim|required');
		$this->form_validation->set_rules('universitas', 'universitas', 'trim|required');
		// $this->form_validation->set_rules('deskripsi', 'deskripsi', 'trim|required');
		if ($_FILES['image']['name']) {
			$this->form_validation->set_rules('image', 'image', 'callback_upload_file');
		}
		$this->form_validation->set_error_delimiters('', '');
		$return = $this->form_validation->run();
		return $return;
	}

	function upload_file()
	{
		$judul = $this->input->post("nama");
		$path = './uploads/testimoni/';
		if (!is_dir($path)) {
		    mkdir($path, 0777, TRUE);
		}
		$config['upload_path'] = $path;
		$config['allowed_types'] = 'gif|jpg|png|jpeg|webp';
		$config['file_name'] = uniqid().'-'.url_title($judul, "dash", true).'-'.date("y-m-d");
		$config['overwrite'] = true;
		$this->load->library('upload', $config);
		if ( ! $this->upload->do_upload('image')){
			$this->form_validation->set_message('upload_file', $this->upload->display_errors());
			return FALSE;
		}else{
			$ext = explode(".", $this->upload->data('file_name'));
			$ext = end($ext);
			$webp = $this->upload->data('file_name');
			// if ($ext != "webp") {
			// 	$webp = covertToWebp($path, $this->upload->data('file_name'));
			// }
			$file = $this->session->set_userdata('image', $webp);
			return TRUE;
		}
	}

	function updateStatus($id_testimoni)
	{
		$id_testimoni = encrypt_decrypt('decrypt', $id_testimoni);
		$cek = $this->General_Model->get('testimoni', ['id_testimoni' => $id_testimoni])->row();
		// var_dump($cek);die;
		if ($cek->status == 'Aktif') {
			$status = 'Tidak Aktif';
		}else{
			$status = 'Aktif';
		}

		$this->General_Model->update('testimoni', ['status' => $status], ['id_testimoni' => $id_testimoni]);

		$this->output->set_output(json_encode(['status' => true, 'alert' => "Successfully change status"]));
	}

	function delete($id_testimoni)
	{
		if ($this->input->is_ajax_request()) {
			softDelete('testimoni', ['id_testimoni' => encrypt_decrypt("decrypt",$id_testimoni)]);
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

/* End of file Testimoni.php */
/* Location: ./application/controllers/cms/Testimoni.php */