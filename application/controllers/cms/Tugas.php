<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tugas extends CI_Controller {

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
			'title' => 'List Tugas'
		];	

		$this->template->load('templates/cms', 'cms/tugas/index',$data, FALSE);
	}

	public function add()
	{
		$data = [
			'title' => 'Tambah List Tugas'
		];	

		$this->template->load('templates/cms', 'cms/tugas/form-add',$data, FALSE);
	}

	public function edit($id_tugas)
	{
		$data = [
			'title' => 'Ubah List Tugas',
			'data' => $this->General_Model->get('tugas', ['id_tugas' => encrypt_decrypt("decrypt",$id_tugas)])->row()
		];	

		$this->template->load('templates/cms', 'cms/tugas/form-edit',$data, FALSE);
	}

	public function detail($id_tugas)
	{
		$data = [
			'title' => 'Detail Tugas',
			'data' => $this->General_Model->get('tugas', ['id_tugas' => encrypt_decrypt("decrypt",$id_tugas)])->row()
		];	

		$this->template->load('templates/cms', 'cms/tugas/detail',$data, FALSE);
	}


	function getDataById($id_tugas)
	{
		if ($this->input->is_ajax_request()) {
			$response = [
				'sukses' => true,
				'data' => $this->General_Model->get("tugas",["id_tugas" => encrypt_decrypt("decrypt",$id_tugas)])->row_array()
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
			$column_order = [null, 'ikon', 'nama_tugas','status', 'created_at'];
			$column_search = ['ikon', 'nama_tugas','status', 'created_at'];
			$where = ['tugas.deleted_at' => null];
			$order = ['id_tugas' => 'ASC'];
			$query = [
				'table' => 'tugas',
				'select' => '*',
				'where' => $where,
				'join' => []
			];
			// var_dump($this->input->post('tipe'));
			$tugas = $this->Datatable_Model->getDataTables($query, $column_order, $column_search, $order);
			$data = [];
			$no = @$_POST['start'];
			foreach ($tugas as $cara) {
				$no++;
				$row = [];
				$row[] = $no . ".";
				$row[] = '<span class="'.$cara->ikon.' fa-5x"></span>';
				$row[] = $cara->nama_tugas.'<hr>'.$cara->deskripsi_singkat;
				if ($cara->status == 'Aktif') {
					$row[] = '<button type="button" class="btn btn-success btn-sm" onclick="UpdateStatus(' . "'" . encrypt_decrypt('encrypt',$cara->id_tugas) . "'" . ')">'.$cara->status.'</button>';
				}else{
					$row[] = '<button type="button" class="btn btn-danger btn-sm" onclick="UpdateStatus(' . "'" . encrypt_decrypt('encrypt',$cara->id_tugas) . "'" . ')">'.$cara->status.'</button>';
				}
				$row[] = '
				  	<div class="">
					  	<a href="'.base_url("cms/list-tugas/detail/").encrypt_decrypt('encrypt',$cara->id_tugas).'" type="button" class="btn btn-info shadow btn-sm sharp mr-1"><span class="fa fa-eye"></span></a>
					  	<a href="'.base_url("cms/list-tugas/edit/").encrypt_decrypt('encrypt',$cara->id_tugas).'" type="button" class="btn btn-warning shadow btn-sm sharp mr-1"><span class="fa fa-edit"></span></a>
	                 	<a href="#" type="button" id="btn-delete-' . $cara->id_tugas . '" onclick="ButtonDelete(' . "'" . encrypt_decrypt('encrypt',$cara->id_tugas) . "'" . ')" class="btn btn-danger shadow btn-sm sharp"><span class="fa fa-trash"></span></a>

	                </div>	';
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
				$nama_tugas = $this->input->post('nama_tugas', TRUE);
				$deskripsi_singkat = $this->input->post('deskripsi_singkat', TRUE);
				$deskripsi = $this->input->post('deskripsi');
				$ikon = $this->session->userdata('ikon');
				$ikon = $this->input->post('ikon');
				$data = [
					'nama_tugas' => $nama_tugas,
					'slug' => url_title($nama_tugas, 'dash', true),
					'deskripsi_singkat' => $deskripsi_singkat,
					'deskripsi' => $deskripsi,
					'status' => "Aktif",
					'ikon' => $ikon,
				];
				$this->General_Model->insert('tugas',$data);
				$response = [
					'status' => true,
					'alert' => "Successfully Added Data"
				];
			} else {
				$response['error'] = getErrorValidation();
				// $response['error']['ikon'] = strip_tags(form_error('ikon'));
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
				$id_tugas = $this->input->post('id_tugas', TRUE);
				$nama_tugas = $this->input->post('nama_tugas', TRUE);
				$deskripsi_singkat = $this->input->post('deskripsi_singkat', TRUE);
				$deskripsi = $this->input->post('deskripsi');
				$ikon = $this->session->userdata('ikon');
				$ikon = $this->input->post('ikon');
				$data = [
					'nama_tugas' => $nama_tugas,
					'slug' => url_title($nama_tugas, 'dash', true),
					'deskripsi_singkat' => $deskripsi_singkat,
					'deskripsi' => $deskripsi,
					'ikon' => $ikon,
				];
				$this->General_Model->update('tugas',$data,['id_tugas' => encrypt_decrypt("decrypt",$id_tugas)]);
				$response = [
					'status' => true,
					'alert' => "Successfully Updated Data"
				];
			} else {
				$response['error'] = getErrorValidation();
				// $response['error']['ikon'] = strip_tags(form_error('ikon'));
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
		$this->form_validation->set_rules('nama_tugas', 'judul cara order', 'trim|required');
		$this->form_validation->set_rules('deskripsi_singkat', 'deskripsi', 'trim|required');
		$this->form_validation->set_rules('deskripsi', 'deskripsi', 'trim|required');
		$this->form_validation->set_rules('ikon', 'ikon', 'trim|required');
		// if (!$this->input->post('id_tugas') || $_FILES['ikon']['name']) {
			// $this->form_validation->set_rules('ikon', 'ikon', 'callback_upload_file');
		// }
		$this->form_validation->set_error_delimiters('', '');
		$return = $this->form_validation->run();
		return $return;
	}

	function upload_file()
	{
		$judul = $this->input->post("nama_tugas");
		$path = './uploads/tugas/';
		if (!is_dir($path)) {
		    mkdir($path, 0777, TRUE);
		}
		$config['upload_path'] = $path;
		$config['allowed_types'] = 'gif|jpg|png|jpeg|webp';
		$config['file_name'] = url_title($judul, "dash", true).'-'.date("y-m-d");
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

	function updateStatus($id_tugas)
	{
		$id_tugas = encrypt_decrypt('decrypt', $id_tugas);
		$cek = $this->General_Model->get('tugas', ['id_tugas' => $id_tugas])->row();
		// var_dump($cek);die;
		if ($cek->status == 'Aktif') {
			$status = 'Tidak Aktif';
		}else{
			$status = 'Aktif';
		}

		$this->General_Model->update('tugas', ['status' => $status], ['id_tugas' => $id_tugas]);

		$this->output->set_output(json_encode(['status' => true, 'alert' => "Successfully change status"]));
	}

	function delete($id_tugas)
	{
		if ($this->input->is_ajax_request()) {
			softDelete('tugas', ['id_tugas' => encrypt_decrypt("decrypt",$id_tugas)]);
			$response = [
				'status' => true,
				'alert' => 'Successfully deleted data'
			];
			$this->output->set_output(json_encode($response));

		}else{
			exit('access denied');
		}
	}


	function uploadImage()
	{
		if ($this->input->is_ajax_request()) {
			
			$this->load->helper('string');
			$random = random_string('alnum', 4);
			$path = './uploads/tugas/';
			if (!is_dir($path)) {
			    mkdir($path, 0777, TRUE);
			}
			$judul = $this->input->post("nama_tugas");

			$config['upload_path'] = $path;
			$config['allowed_types'] = 'gif|jpg|png|jpeg|webp';
			$config['file_name'] = "image-content-".url_title($judul, "dash", true).'-'.date("y-m-d").'-'.encrypt_decrypt("encrypt",rand(0,100));
			$config['overwrite'] = true;
			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('image')) {
				$response = ['image_error' => $this->upload->display_errors(), 'status' => false];
			} else {
				$ext = explode(".", $this->upload->data('file_name'));
				$ext = end($ext);
				$webp = $this->upload->data('file_name');
				if ($ext != "webp") {
					$webp = covertToWebp($path, $this->upload->data('file_name'));
				}
				$response = ['image' => base_url('uploads/tugas/').$webp, 'status' => true];
			}
			$this->output->set_output(json_encode($response));
		}else{
			$this->index();			
		}
	}

	function deleteImage()
	{
		if ($this->input->is_ajax_request()) {
			$src = $this->input->post('src');
			$src = str_replace(base_url(),"./", $src);
			unlink($src);
			$this->output->set_output(json_encode(true));
		}else{
			$this->index();
		}
	}

}

/* End of file Tugas.php */
/* Location: ./application/controllers/cms/Tugas.php */