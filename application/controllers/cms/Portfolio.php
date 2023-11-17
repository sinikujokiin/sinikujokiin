<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Portfolio extends CI_Controller {

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
			'title' => 'List Portfolio',
			'kategori' => $this->db->group_by('kategori_portfolio')->get_where('portfolio', ['deleted_at' => null])->result_array()
		];	

		$this->template->load('templates/cms', 'cms/portfolio',$data, FALSE);
	}


		function getDataById($id_portfolio)
		{
			if ($this->input->is_ajax_request()) {
				$response = [
					'sukses' => true,
					'data' => $this->General_Model->get("portfolio",["id_portfolio" => encrypt_decrypt("decrypt",$id_portfolio)])->row_array()
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
				$column_order = [null, 'image', 'kategori_portfolio', 'deskripsi','status', 'created_at'];
				$column_search = ['image', 'kategori_portfolio', 'deskripsi','status', 'created_at'];
				$where = ['portfolio.deleted_at' => null];
				$order = ['id_portfolio' => 'ASC'];
				$query = [
					'table' => 'portfolio',
					'select' => '*',
					'where' => $where,
					'join' => []
				];
				// var_dump($this->input->post('tipe'));
				$portfolio = $this->Datatable_Model->getDataTables($query, $column_order, $column_search, $order);
				$data = [];
				$no = @$_POST['start'];
				foreach ($portfolio as $testi) {
					$no++;
					$row = [];
					$row[] = $no . ".";
					$row[] = $testi->image ? '<img src="'.base_url('uploads/portfolio/'.$testi->image).'" width="50px" alt="'.$testi->kategori_portfolio.'" title="'.$testi->kategori_portfolio.'">' : "-";
					$row[] = $testi->kategori_portfolio;
					$row[] = $testi->deskripsi;
					if ($testi->status == 'Aktif') {
						$row[] = '<button type="button" class="btn btn-success btn-sm" onclick="UpdateStatus(' . "'" . encrypt_decrypt('encrypt',$testi->id_portfolio) . "'" . ')">'.$testi->status.'</button>';
					}else{
						$row[] = '<button type="button" class="btn btn-danger btn-sm" onclick="UpdateStatus(' . "'" . encrypt_decrypt('encrypt',$testi->id_portfolio) . "'" . ')">'.$testi->status.'</button>';
					}
					$row[] = '
					  	<div class="">
		                 	<a href="#" type="button" id="btn-edit-' . $testi->id_portfolio . '" onclick="ButtonEdit(' . "'" . encrypt_decrypt('encrypt',$testi->id_portfolio) . "'" . ')" class="btn btn-warning shadow btn-sm sharp"><span class="fa fa-edit"></span></a>
		                 	<a href="#" type="button" id="btn-delete-' . $testi->id_portfolio . '" onclick="ButtonDelete(' . "'" . encrypt_decrypt('encrypt',$testi->id_portfolio) . "'" . ')" class="btn btn-danger shadow btn-sm sharp"><span class="fa fa-trash"></span></a>

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
				$kategori_portfolio = $this->input->post('kategori_portfolio', TRUE);
				$deskripsi = $this->input->post('deskripsi', TRUE);
				$image = $this->session->userdata('image');
				$data = [
					'kategori_portfolio' => $kategori_portfolio,
					'deskripsi' => $deskripsi,
					'status' => "Aktif",
					'image' => $image,
				];
				$this->General_Model->insert('portfolio',$data);
				$this->session->unset_userdata('image');
				$response = [
					'status' => true,
					'alert' => "Successfully Added Data"
				];
			} else {
				$response['error'] = getErrorValidation();
				$response['error']['kategori_portfolio'] = form_error('kategori_portfolio');
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
				$id_portfolio = $this->input->post('id_portfolio', TRUE);
				$kategori_portfolio = $this->input->post('kategori_portfolio', TRUE);
				$deskripsi = $this->input->post('deskripsi', TRUE);
				$image = $this->session->userdata('image');
				$data = [
					'kategori_portfolio' => $kategori_portfolio,
					'deskripsi' => $deskripsi,
				];
				if ($image) {
					$data['image'] = $image;
				}
				// var_dump($data);die;
				$this->General_Model->update('portfolio',$data,['id_portfolio' => $id_portfolio]);
				$this->session->unset_userdata('image');
				$response = [
					'status' => true,
					'alert' => "Successfully Updated Data"
				];
			} else {
				$response['error'] = getErrorValidation();
				$response['error']['kategori_portfolio'] = form_error('kategori_portfolio');
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
		// $this->form_validation->set_rules('kategori_portfolio', 'kategori_portfolio', 'trim|required');
		$this->form_validation->set_rules('kategori_portfolio', 'kategori_portfolio', 'trim|required');
		$this->form_validation->set_rules('deskripsi', 'deskripsi', 'trim|required');
		// $this->form_validation->set_rules('universitas', 'universitas', 'trim|required');
		// $this->form_validation->set_rules('deskripsi', 'deskripsi', 'trim|required');
		if ($this->uri->segment(3) == 'tambah' || $_FILES['image']['name']) {
			$this->form_validation->set_rules('image', 'image', 'callback_upload_file');
		}
		// if ($_FILES['image']['name']) {
		// }
		$this->form_validation->set_error_delimiters('', '');
		$return = $this->form_validation->run();
		return $return;
	}

	function upload_file()
	{
		$judul = $this->input->post("kategori_portfolio");
		$path = './uploads/portfolio/';
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

	function updateStatus($id_portfolio)
	{
		$id_portfolio = encrypt_decrypt('decrypt', $id_portfolio);
		$cek = $this->General_Model->get('portfolio', ['id_portfolio' => $id_portfolio])->row();
		// var_dump($cek);die;
		if ($cek->status == 'Aktif') {
			$status = 'Tidak Aktif';
		}else{
			$status = 'Aktif';
		}

		$this->General_Model->update('portfolio', ['status' => $status], ['id_portfolio' => $id_portfolio]);

		$this->output->set_output(json_encode(['status' => true, 'alert' => "Successfully change status"]));
	}

	function delete($id_portfolio)
	{
		if ($this->input->is_ajax_request()) {
			softDelete('portfolio', ['id_portfolio' => encrypt_decrypt("decrypt",$id_portfolio)]);
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

/* End of file Portfolio.php */
/* Location: ./application/controllers/cms/Portfolio.php */