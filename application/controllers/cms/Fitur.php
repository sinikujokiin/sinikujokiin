<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fitur extends CI_Controller {

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
			'title' => 'List Fitur'
		];	

		$this->template->load('templates/cms', 'cms/fitur',$data, FALSE);
	}

	public function add()
	{
		$data = [
			'title' => 'Tambah List Fitur'
		];	

		$this->template->load('templates/cms', 'cms/fitur/form-add',$data, FALSE);
	}

	public function edit($id_fitur)
	{
		$data = [
			'title' => 'Ubah List Fitur',
			'data' => $this->General_Model->get('fitur', ['id_fitur' => encrypt_decrypt("decrypt",$id_fitur)])->row()
		];	

		$this->template->load('templates/cms', 'cms/fitur/form-edit',$data, FALSE);
	}

	public function detail($id_fitur)
	{
		$data = [
			'title' => 'Detail Fitur',
			'data' => $this->General_Model->get('fitur', ['id_fitur' => encrypt_decrypt("decrypt",$id_fitur)])->row()
		];	

		$this->template->load('templates/cms', 'cms/fitur/detail',$data, FALSE);
	}


	function getDataById($id_fitur)
	{
		if ($this->input->is_ajax_request()) {
			$response = [
				'sukses' => true,
				'data' => $this->General_Model->get("fitur",["id_fitur" => encrypt_decrypt("decrypt",$id_fitur)])->row_array()
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
			$column_order = [null, 'ikon', 'nama_fitur','link','status', 'created_at'];
			$column_search = ['ikon', 'nama_fitur','link','status', 'created_at'];
			$where = ['fitur.deleted_at' => null];
			$order = ['id_fitur' => 'ASC'];
			$query = [
				'table' => 'fitur',
				'select' => '*',
				'where' => $where,
				'join' => []
			];
			// var_dump($this->input->post('tipe'));
			$features = $this->Datatable_Model->getDataTables($query, $column_order, $column_search, $order);
			$data = [];
			$no = @$_POST['start'];
			foreach ($features as $fitur) {
				$no++;
				$row = [];
				$row[] = $no . ".";
				$row[] = '<span class="'.$fitur->ikon.' fa-5x"></span>';
				$row[] = $fitur->nama_fitur.'<hr>'.$fitur->deskripsi_singkat;
				$row[] = $fitur->link ? '<a href="'.$fitur->link.'" title="Kunjungi Link">Kunjunngi Link</a>' : '-';
				if ($fitur->status == 'Aktif') {
					$row[] = '<button type="button" class="btn btn-success btn-sm" onclick="UpdateStatus(' . "'" . encrypt_decrypt('encrypt',$fitur->id_fitur) . "'" . ')">'.$fitur->status.'</button>';
				}else{
					$row[] = '<button type="button" class="btn btn-danger btn-sm" onclick="UpdateStatus(' . "'" . encrypt_decrypt('encrypt',$fitur->id_fitur) . "'" . ')">'.$fitur->status.'</button>';
				}
				$row[] = '
				  	<div class="">
	                 	<a href="#" type="button" id="btn-edit-' . $fitur->id_fitur . '" onclick="ButtonEdit(' . "'" . encrypt_decrypt('encrypt',$fitur->id_fitur) . "'" . ')" class="btn btn-warning shadow btn-sm sharp"><span class="fa fa-edit"></span></a>
	                 	<a href="#" type="button" id="btn-delete-' . $fitur->id_fitur . '" onclick="ButtonDelete(' . "'" . encrypt_decrypt('encrypt',$fitur->id_fitur) . "'" . ')" class="btn btn-danger shadow btn-sm sharp"><span class="fa fa-trash"></span></a>

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
				$nama_fitur = $this->input->post('nama_fitur', TRUE);
				$deskripsi_singkat = $this->input->post('deskripsi_singkat', TRUE);
				$deskripsi = $this->input->post('deskripsi');
				$ikon = $this->session->userdata('ikon');
				$ikon = $this->input->post('ikon');
				$link = $this->input->post('link');
				$data = [
					'nama_fitur' => $nama_fitur,
					'deskripsi_singkat' => $deskripsi_singkat,
					'deskripsi' => $deskripsi,
					'status' => "Aktif",
					'ikon' => $ikon,
					'link' => $link,
				];
				$this->General_Model->insert('fitur',$data);
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
				$id_fitur = $this->input->post('id_fitur', TRUE);
				$nama_fitur = $this->input->post('nama_fitur', TRUE);
				$deskripsi_singkat = $this->input->post('deskripsi_singkat', TRUE);
				$deskripsi = $this->input->post('deskripsi');
				$ikon = $this->session->userdata('ikon');
				$ikon = $this->input->post('ikon');
				$link = $this->input->post('link');
				$data = [
					'nama_fitur' => $nama_fitur,
					'deskripsi_singkat' => $deskripsi_singkat,
					'deskripsi' => $deskripsi,
					'ikon' => $ikon,
					'link' => $link,
				];
				$this->General_Model->update('fitur',$data,['id_fitur' => $id_fitur]);
				// var_dump($this->db->last_query());die;
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
		$this->form_validation->set_rules('nama_fitur', 'judul cara order', 'trim|required');
		$this->form_validation->set_rules('deskripsi_singkat', 'deskripsi', 'trim|required');
		$this->form_validation->set_rules('deskripsi', 'deskripsi', 'trim|required');
		$this->form_validation->set_rules('ikon', 'ikon', 'trim|required');
		// $this->form_validation->set_rules('link', 'link', 'trim|required|valid_url');
		// if (!$this->input->post('id_fitur') || $_FILES['ikon']['name']) {
			// $this->form_validation->set_rules('ikon', 'ikon', 'callback_upload_file');
		// }
		$this->form_validation->set_error_delimiters('', '');
		$return = $this->form_validation->run();
		return $return;
	}

	function upload_file()
	{
		$judul = $this->input->post("nama_fitur");
		$path = './uploads/fitur/';
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

	function updateStatus($id_fitur)
	{
		$id_fitur = encrypt_decrypt('decrypt', $id_fitur);
		$cek = $this->General_Model->get('fitur', ['id_fitur' => $id_fitur])->row();
		// var_dump($cek);die;
		if ($cek->status == 'Aktif') {
			$status = 'Tidak Aktif';
		}else{
			$status = 'Aktif';
		}

		$this->General_Model->update('fitur', ['status' => $status], ['id_fitur' => $id_fitur]);

		$this->output->set_output(json_encode(['status' => true, 'alert' => "Successfully change status"]));
	}

	function delete($id_fitur)
	{
		if ($this->input->is_ajax_request()) {
			softDelete('fitur', ['id_fitur' => encrypt_decrypt("decrypt",$id_fitur)]);
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
			$path = './uploads/fitur/';
			if (!is_dir($path)) {
			    mkdir($path, 0777, TRUE);
			}
			$judul = $this->input->post("nama_fitur");

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
				$response = ['image' => base_url('uploads/fitur/').$webp, 'status' => true];
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

/* End of file Fitur.php */
/* Location: ./application/controllers/cms/Fitur.php */