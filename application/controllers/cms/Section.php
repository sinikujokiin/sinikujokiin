<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Section extends CI_Controller {

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
			'title' => 'List Section'
		];	

		$this->template->load('templates/cms', 'cms/section',$data, FALSE);
	}


		function getDataById($id_section)
		{
			if ($this->input->is_ajax_request()) {
				$response = [
					'sukses' => true,
					'data' => $this->General_Model->get("section",["id_section" => encrypt_decrypt("decrypt",$id_section)])->row_array()
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
				$column_order = [null, 'background' , 'type_section', 'nama_section','status', 'created_at'];
				$column_search = ['background' , 'type_section', 'nama_section','status', 'created_at'];
				$where = ['section.deleted_at' => null];
				$order = ['id_section' => 'ASC'];
				$query = [
					'table' => 'section',
					'select' => '*',
					'where' => $where,
					'join' => []
				];
				// var_dump($this->input->post('tipe'));
				$section = $this->Datatable_Model->getDataTables($query, $column_order, $column_search, $order);
				$data = [];
				$no = @$_POST['start'];
				$badges = ['primary', 'secondary', 'warning', 'danger', 'success', 'info'];
				foreach ($section as $sec) {
					$no++;
					$row = [];
					$row[] = $no . ".";
					$row[] = $sec->background ? '<img src="'.base_url('uploads/section/'.$sec->background).'" width="150px" alt="'.$sec->nama_section.'" title="'.$sec->nama_section.'">' : "-";
					$row[] = '<span class="badge badge-'.$badges[mt_rand(0,5)].'">'.$sec->type_section.'</span>';
					$row[] = $sec->nama_section."<hr>".$sec->deskripsi_singkat;
					if ($sec->status == 'Aktif') {
						$row[] = '<button type="button" class="btn btn-success btn-sm" onclick="UpdateStatus(' . "'" . encrypt_decrypt('encrypt',$sec->id_section) . "'" . ')">'.$sec->status.'</button>';
					}else{
						$row[] = '<button type="button" class="btn btn-danger btn-sm" onclick="UpdateStatus(' . "'" . encrypt_decrypt('encrypt',$sec->id_section) . "'" . ')">'.$sec->status.'</button>';
					}
					$row[] = '
					  	<div class="">
		                 	<a href="#" type="button" id="btn-edit-' . $sec->id_section . '" onclick="ButtonEdit(' . "'" . encrypt_decrypt('encrypt',$sec->id_section) . "'" . ')" class="btn btn-warning shadow btn-sm sharp"><span class="fa fa-edit"></span></a>
		                 	<a href="#" type="button" id="btn-delete-' . $sec->id_section . '" onclick="ButtonDelete(' . "'" . encrypt_decrypt('encrypt',$sec->id_section) . "'" . ')" class="btn btn-danger shadow btn-sm sharp"><span class="fa fa-trash"></span></a>

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
				$nama_section = $this->input->post('nama_section', TRUE);
				$type_section = $this->input->post('type_section', TRUE);
				$deskripsi_singkat = $this->input->post('deskripsi_singkat', TRUE);
				$deskripsi = $this->input->post('deskripsi', TRUE);
				$background = $this->session->userdata('background');
				$data = [
					'nama_section' => $nama_section,
					'type_section' => $type_section,
					'deskripsi_singkat' => $deskripsi_singkat,
					'deskripsi' => $deskripsi,
					'status' => "Aktif",
					'background' => $background ? $background : null,
				];
				$this->General_Model->insert('section',$data);
				$this->session->unset_userdata('background');
				$response = [
					'status' => true,
					'alert' => "Successfully Added Data"
				];
			} else {
				$response['error'] = getErrorValidation();
				$response['error']['background'] = strip_tags(form_error('background'));
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
				$id_section = $this->input->post('id_section', TRUE);
				$nama_section = $this->input->post('nama_section', TRUE);
				$type_section = $this->input->post('type_section', TRUE);
				$deskripsi_singkat = $this->input->post('deskripsi_singkat', TRUE);
				$deskripsi = $this->input->post('deskripsi', TRUE);
				$data = [
					'nama_section' => $nama_section,
					'type_section' => $type_section,
					'deskripsi_singkat' => $deskripsi_singkat,
					'deskripsi' => $deskripsi,
					// 'background' => $background ? $background : null,
				];
				if ($_FILES['background']['name']) {
					$background = $this->session->userdata('background');
					$data['background'] = $background;
				}
				$this->General_Model->update('section',$data,['id_section' => $id_section]);
				$response = [
					'status' => true,
					'alert' => "Successfully Updated Data"
				];
			} else {
				$response['error'] = getErrorValidation();
				$response['error']['background'] = strip_tags(form_error('background'));
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
		$this->form_validation->set_rules('nama_section', 'nama section', 'trim|required');
		$this->form_validation->set_rules('type_section', 'tipe section', 'trim|required');
		// $this->form_validation->set_rules('deskripsi', 'deskripsi', 'trim|required');
		if ($_FILES['background']['name']) {
			$this->form_validation->set_rules('background', 'background', 'callback_upload_file');
		}
		$this->form_validation->set_error_delimiters('', '');
		$return = $this->form_validation->run();
		return $return;
	}

	function upload_file()
	{
		$judul = $this->input->post("nama_section");
		$path = './uploads/section/';
		if (!is_dir($path)) {
		    mkdir($path, 0777, TRUE);
		}
		$config['upload_path'] = $path;
		$config['allowed_types'] = 'gif|jpg|png|jpeg|webp';
		$config['file_name'] = uniqid().'-'.url_title($judul, "dash", true).'-'.date("y-m-d");
		$config['overwrite'] = true;
		$this->load->library('upload', $config);
		if ( ! $this->upload->do_upload('background')){
			$this->form_validation->set_message('upload_file', $this->upload->display_errors());
			return FALSE;
		}else{
			$ext = explode(".", $this->upload->data('file_name'));
			$ext = end($ext);
			$webp = $this->upload->data('file_name');
			 if ($ext != "webp") {
			 	$webp = covertToWebp($path, $this->upload->data('file_name'));
			 }
			$file = $this->session->set_userdata('background', $webp);
			return TRUE;
		}
	}

	function updateStatus($id_section)
	{
		$id_section = encrypt_decrypt('decrypt', $id_section);
		$cek = $this->General_Model->get('section', ['id_section' => $id_section])->row();
		// var_dump($cek);die;
		if ($cek->status == 'Aktif') {
			$status = 'Tidak Aktif';
		}else{
			$status = 'Aktif';
		}

		$this->General_Model->update('section', ['status' => $status], ['id_section' => $id_section]);

		$this->output->set_output(json_encode(['status' => true, 'alert' => "Successfully change status"]));
	}

	function delete($id_section)
	{
		if ($this->input->is_ajax_request()) {
			softDelete('section', ['id_section' => encrypt_decrypt("decrypt",$id_section)]);
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

/* End of file Section.php */
/* Location: ./application/controllers/cms/Section.php */