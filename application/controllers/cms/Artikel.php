<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Artikel extends CI_Controller {

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
			'title' => 'Artikel',
			'penulis' => $this->General_Model->get("users", ['role_id' => 2])->result_array(),
		];	

		$this->template->load('templates/cms', 'cms/artikel/index',$data, FALSE);
	}


	
	function getDataById($id_artikel)
	{
		if ($this->input->is_ajax_request()) {
			$response = [
				'sukses' => true,
				'data' => $this->General_Model->get("artikel",["id_artikel" => encrypt_decrypt("decrypt",$id_artikel)])->row_array()
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
			if ($userData['role_id'] == 1) {
				$column_order = [null, 'artikel.image','title','fullname','artikel.created_at', 'artikel.updated_at', 'artikel.status'];
				$column_search = ['artikel.image','title','fullname','artikel.created_at', 'artikel.updated_at', 'artikel.status'];
			}else{
				$column_order = [null, 'artikel.image','title','artikel.created_at', 'artikel.updated_at', 'artikel.status'];
				$column_search = ['artikel.image','title','artikel.created_at', 'artikel.updated_at', 'artikel.status'];
			}
			$order = ['artikel.created_at' => 'DESC'];
			$where = ['artikel.deleted_at' => null];
			if ($userData['role_id'] == "2" ) {
				$where['artikel.created_by'] = $userData['id_user'];
			}

			$penulis = $this->input->post("penulis");
			// $publish = $this->input->post("publish");

			if ($penulis) $where['artikel.created_by'] = $penulis;
			// if ($publish) $where['DATE(publish_date)'] = $publish;

			$query = [
				'table' => 'artikel',
				'select' => 'artikel.*, users.fullname',
				'where' => $where,
				'join' => [
					['users', 'users.id_user = artikel.created_by', 'inner'],
				]
			];
			// var_dump($this->input->post('tipe'));
			$artikel = $this->Datatable_Model->getDataTables($query, $column_order, $column_search, $order);
			$data = [];
			$no = @$_POST['start'];
			foreach ($artikel as $artikel) {
				$no++;
				$row = [];
				$row[] = $no . ".";
				$row[] = '
					<a href="'.base_url("uploads/artikel/".$artikel->image).'" target="_BLANK" title="Lihat">
				<img src="'.base_url("uploads/artikel/".$artikel->image).'" alt="'.$artikel->title.'" width="100%"> 
					</a>
				' ;
				$row[] = $artikel->title;
				if ($userData['role_id'] == 1) {
					$row[] = $artikel->fullname;
				}
				$row[] = date('d-m-Y H:i:s', strtotime($artikel->created_at));
				$row[] = $artikel->updated_at ? date('d-m-Y H:i:s', strtotime($artikel->updated_at)) : "-";
				if ($artikel->status == 'Aktif') {
					$row[] = '<button type="button" class="btn btn-success btn-sm" onclick="UpdateStatus(' . "'" . encrypt_decrypt('encrypt',$artikel->id_artikel) . "'" . ')">'.$artikel->status.'</button>';
				}else{
					$row[] = '<button type="button" class="btn btn-danger btn-sm" onclick="UpdateStatus(' . "'" . encrypt_decrypt('encrypt',$artikel->id_artikel) . "'" . ')">'.$artikel->status.'</button>';
				}
				$row[] = '
				  	<div class="">
					  	<a href="'.base_url("cms/list-artikel/detail/").$artikel->slug.'" type="button" class="btn btn-info shadow btn-sm sharp mr-1"><span class="fa fa-eye"></span></a>
					  	<a href="'.base_url("cms/list-artikel/edit/").encrypt_decrypt('encrypt',$artikel->id_artikel).'" type="button" class="btn btn-warning shadow btn-sm sharp mr-1"><span class="fa fa-edit"></span></a>
	                 	<a href="#" type="button" id="btn-delete-' . $artikel->id_artikel . '" onclick="ButtonDelete(' . "'" . encrypt_decrypt('encrypt',$artikel->id_artikel) . "'" . ')" class="btn btn-danger shadow btn-sm sharp"><span class="fa fa-trash"></span></a>

	                </div>	
				  ';
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


	function add()
	{
		$data = [
			'title' => 'Add Artikel',
			'kategori' => $this->db->group_by('kategori')->get_where('artikel', ['deleted_at' => null])->result_array()
		];	


		$this->template->load('templates/cms', 'cms/artikel/form-add',$data, FALSE);
	}

	function edit()
	{
		$id_artikel = $this->uri->segment(4);
		$id_artikel = encrypt_decrypt("decrypt", $id_artikel);
		$data = [
			'title' => 'Edit Artikel',
			'data' => $this->General_Model->get("artikel", ['id_artikel' => $id_artikel])->row_array(),
			'kategori' => $this->db->group_by('kategori')->get_where('artikel', ['deleted_at' => null])->result_array()
		];	

		if ($data['data']) {
			$this->template->load('templates/cms', 'cms/artikel/form-edit',$data, FALSE);
		}else{
			$this->template->load('templates/cms', 'errors/404', $data);
		}
	}

	function detail()
	{
		$slug = $this->uri->segment(4);
		// $id_artikel = encrypt_decrypt("decrypt", $id_artikel);
		$data = [
			'title' => 'Detail Artikel',
			'data' => $this->General_Model->get("artikel", ['slug' => $slug])->row_array(),
		];	

		if ($data['data']) {
			$this->template->load('templates/cms', 'cms/artikel/form-detail',$data, FALSE);
		}else{
			$this->template->load('templates/cms', 'errors/404', $data);
		}
	}

	function addArtikel()
	{
		if ($this->input->is_ajax_request()) {
			if ($this->_validation()) {


				$title = $this->input->post('title', TRUE);
				$deskripsi_singkat = $this->input->post('deskripsi_singkat');
				$content = $this->input->post('content');
				$kategori = $this->input->post('kategori');
				$image = $this->session->userdata('image');
				// var_dump(count($hastag_name));die;
				// var_dump($status != NULL ? 'Active' : 'Non Active');die;
				$data = [
					'title' => $title,
					'deskripsi_singkat' => $deskripsi_singkat,
					'slug' => url_title($title, 'dash', true),
					'content' => $content,
					'kategori' => $kategori,
					'image' => $image,
					'status' => 'Aktif',
					'created_by' => $this->session->userdata('userData')['id_user'],
					'created_at' => date("Y-m-d H:i:s"),

					// 'created_by' => $this->session->userdata('item')
				];
				// var_dump($data);die;
				$this->General_Model->insert("artikel",$data);
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

	private function upload($title)
	{
		$this->load->helper('string');
		$random = random_string('alnum', 4);
		$date = date("d");
		$month = date("m");
		$year = date("Y");
		$linkDefault = './uploads/artikel/default/'.$year."/".$month."/".$date."/";
		$linkThumbnail = './uploads/artikel/thumbnail/'.$year."/".$month."/".$date."/";
		if (!is_dir($linkDefault)) {
		    mkdir($linkDefault, 0777, TRUE);
		}

		$config = [
			'upload_path' => $linkDefault,
			'allowed_types' => 'jpg|jpeg|png|webp',
			'max_size' => '5000',
			// 'encrypt_name' => true,
			'overwrite'=> true,
			'file_name' => url_title($title, 'dash', true),
		];
		$this->load->library('upload', $config);
		if ($this->input->post('id_artikel')) {
			$cek = $this->db->get_where('artikel', ['id_artikel' => $this->input->post('id_artikel')])->row_array();
			if ($_FILES['image']['name']) {
				if (!$this->upload->do_upload('image')) {
					$response = ['image_error' => $this->upload->display_errors(), 'status' => false];
				} else {
					// unlink(FCPATH . './uploads/artikel/' . $cek['image']);
					resizeImage($this->upload->data('file_name'), $linkDefault, $linkThumbnail);
					covertToWebp($linkDefault, $this->upload->data('file_name'));
					$webp = covertToWebp($linkThumbnail, $this->upload->data('file_name'));
					// resizeImage($webp, $linkThumbnail);
					// uploadFTP($linkLocal,$linkRemote,$this->upload->data('file_name'));
					$response = ['image' => $webp, 'status' => true];
					// unlink(FCPATH . './uploads/artikel/thumbnail/' . $cek['image']);
				}
			} else {
				$response = ['image' => $cek['image'], 'status' => true];
			}
		} else {
			if (!$this->upload->do_upload('image')) {
				if ($this->input->post("draft") == "true") {
					$response = ['image' => "", 'status' => true];
				}else{
					$response = ['image_error' => $this->upload->display_errors(), 'status' => false];
				}
			} else {
				resizeImage($this->upload->data('file_name'), $linkDefault, $linkThumbnail);
				covertToWebp($linkDefault, $this->upload->data('file_name'));
				$webp = covertToWebp($linkThumbnail, $this->upload->data('file_name'));
					// uploadFTP($linkLocal,$linkRemote,$this->upload->data('file_name'));
				$response = ['image' => $webp, 'status' => true];
			}
		}
		return $response;
	}


	function editArtikel()
	{
		if ($this->input->is_ajax_request()) {
			if ($this->_validation()) {
				$id_artikel = $this->input->post('id_artikel', TRUE);
				$title = $this->input->post('title', TRUE);
				$deskripsi_singkat = $this->input->post('deskripsi_singkat');
				$content = $this->input->post('content');
				$kategori = $this->input->post('kategori');
				// var_dump(count($hastag_name));die;
				// var_dump($status != NULL ? 'Active' : 'Non Active');die;
				$data = [
					'title' => $title,
					'deskripsi_singkat' => $deskripsi_singkat,
					'slug' => url_title($title, 'dash', true),
					'content' => $content,
					'kategori' => $kategori,
					'updated_at' => date("Y-m-d H:i:s"),

					// 'created_by' => $this->session->userdata('item')
				];
				if ($_FILES['image']['name']) {
					$image = $this->session->userdata('image');
					$data['image'] = $image;
				}
				$this->General_Model->update('artikel', $data, ['id_artikel' => $id_artikel]);
				$response = [
					'status' => true,
					'alert' => "Successfully Updated Data"
				];
			} else {
				$response['error'] = getErrorValidation();
				$response['status'] = false;
				$response['alert'] = 'Failed Updated Data';
			}
			$this->output->set_output(json_encode($response));
		} else {
			exit('Proses Tidak Dapat Dilanjutkan');
		}
	}

	function delete($id_artikel)
	{
		if ($this->input->is_ajax_request()) {
			$id_artikel = encrypt_decrypt('decrypt',$id_artikel);
			$note = $this->input->post('note');
			$this->General_Model->update("artikel", ['deleted_at' => date("Y-m-d H:i:s"), 'status' => 'Non Publish', 'deleted_by' => $this->session->userdata('userData')['id_user']], ['id_artikel' => $id_artikel]);

			$getartikel = $this->General_Model->get("artikel", ['id_artikel' => $id_artikel])->row();
			$datalog = [
				'user_id' => $this->session->userdata('userData')['id_user'],
				'id_artikel' => $id_artikel,
				'note' => $this->input->post('note'),
				'created_at' => $getartikel->created_at
			];
			// var_dump($this->input->post('note'));die;
			$this->General_Model->insert('logs', $datalog);


			// $get = $this->General_Model->get('artikel', ['id_artikel' => $id_artikel])->row_array();

			// $year = date("Y", strtotime($get['created_at']));
   //      	$month = date("m", strtotime($get['created_at']));
   //      	$date = date("d", strtotime($get['created_at']));
   //      	$url = "./uploads/artikel/default/".$year."/".$month."/".$date."/";
   //      	$thumbnail = "./uploads/artikel/thumbnail/".$year."/".$month."/".$date."/";
   //      	$cekurl = @file_get_contents($url.$get['image']);
   //      	$cekthumbnail = @file_get_contents($url.$get['image']);
   //      	if ($cekurl) unlink($url.$get['image']);
   //      	if ($cekthumbnail) unlink($thumbnail.$get['image']);
			// $this->General_Model->delete('artikel', ['id_artikel',$id_artikel]);
			$this->output->set_output(json_encode(['sukses' => true, 'alert' => 'Successfully Deleted Data']));
		} else {
			exit('Proses Tidak Dapat Dilanjutkan');
		}
	}

	private function _validation()
	{
		// var_dump($this->input->post("draft") == "true");die;
		if ($this->input->post("draft") == "true") {
			$return = true;
		}else{
			$this->form_validation->set_rules('title', 'title', 'trim|required');
			$this->form_validation->set_rules('deskripsi_singkat', 'deskripsi', 'trim|required');
			$this->form_validation->set_rules('content', 'content', 'trim|required');
			$this->form_validation->set_rules('kategori', 'kategori', 'trim|required');
			if ($this->uri->segment(3) == 'add' || $_FILES['image']['name']) {
				$this->form_validation->set_rules('image', 'gambar', 'callback_upload_file');
			}
			$this->form_validation->set_error_delimiters('', '');
			$return = $this->form_validation->run();
		}
	
		// $this->form_validation->set_rules('crime_scene', 'Location', 'trim|required');
		return $return;
	}

	function upload_file()
	{
		$judul = $this->input->post("title");
		$path = './uploads/artikel/';
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

	function uploadImage()
	{
		$this->load->helper('string');
		$random = random_string('alnum', 4);
		$date = date("d");
		$month = date("m");
		$year = date("Y");
		$link = './uploads/artikel/content/'.$year."/".$month."/".$date."/";
		$url = '/uploads/artikel/content/'.$year."/".$month."/".$date."/";
		if (!is_dir($link)) {
		    mkdir($link, 0777, TRUE);
		}

		$config = [
			'upload_path' => $link,
			'allowed_types' => 'jpg|jpeg|png|webp',
			'max_size' => '5000',
			// 'encrypt_name' => true,
			'overwrite'=> true,
			'file_name' => url_title($this->input->post('title'), 'dash', true).$random.$date.$year.$month,
		];
		$this->load->library('upload', $config);
		if (!$this->upload->do_upload('image')) {
			$response = ['image_error' => $this->upload->display_errors(), 'status' => false];
		} else {
			// resizeImage($this->upload->data('file_name'), $link, $linkThumbnail);
			$webp = covertToWebp($link, $this->upload->data('file_name'));
			// $webp = covertToWebp($linkThumbnail, $this->upload->data('file_name'));
				// uploadFTP($linkLocal,$linkRemote,$this->upload->data('file_name'));
			$response = ['image' => $link.$webp, 'status' => true];
		}
		$this->output->set_output(json_encode($response));
	}

	function updateStatus($id_artikel)
	{
		$id_artikel = encrypt_decrypt('decrypt', $id_artikel);
		$cek = $this->General_Model->get('artikel', ['id_artikel' => $id_artikel])->row();
		// var_dump($cek);die;
		if ($cek->status == 'Aktif') {
			$status = 'Tidak Aktif';
		}else{
			$status = 'Aktif';
		}

		$this->General_Model->update('artikel', ['status' => $status], ['id_artikel' => $id_artikel]);

		$this->output->set_output(json_encode(['status' => true, 'alert' => "Successfully change status"]));
	}


}

/* End of file Artikel.php */
/* Location: ./application/controllers/cms/Artikel.php */