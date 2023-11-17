<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Faq extends CI_Controller {

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
			'title' => 'Faq'
		];	

		$this->template->load('templates/cms', 'cms/faq',$data, FALSE);
	}




	function getDataById($id_faq)
	{
		if ($this->input->is_ajax_request()) {
			$response = [
				'sukses' => true,
				'data' => $this->General_Model->get('faq',['id_faq' => encrypt_decrypt("decrypt",$id_faq)])->row_array()
			];
			$this->output->set_output(json_encode($response));
		} else {
			exit('Proses Tidak Dapat Dilanjutkan');
		}
	}

	var $column_order = [null, 'pertanyaan','jawaban', 'status', 'created_at'];
	var $column_search = ['pertanyaan','jawaban', 'status', 'created_at'];
	var $order = ['created_at' => 'DESC'];

	function getData()
	{
		if ($this->input->is_ajax_request()) {
			$where = ['deleted_at' => null];
			$query = [
				'table' => 'faq',
				'select' => '*',
				'where' => $where,
				'join' => []
			];
			// var_dump($this->input->post('tipe'));
			$faq = $this->Datatable_Model->getDataTables($query, $this->column_order, $this->column_search, $this->order);
			// var_dump($faq);die;
			$data = [];
			$no = @$_POST['start'];
			foreach ($faq as $fq) {
				$no++;
				$row = [];
				$row[] = $no . ".";
				$row[] = $fq->pertanyaan;
				$row[] = $fq->jawaban;
				if ($fq->status == 'Aktif') {
					$row[] = '<button type="button" class="btn btn-success btn-sm" onclick="UpdateStatus(' . "'" . encrypt_decrypt('encrypt',$fq->id_faq) . "'" . ')">'.$fq->status.'</button>';
				}else{
					$row[] = '<button type="button" class="btn btn-danger btn-sm" onclick="UpdateStatus(' . "'" . encrypt_decrypt('encrypt',$fq->id_faq) . "'" . ')">'.$fq->status.'</button>';
				}
				$row[] = date('d-m-Y', strtotime($fq->created_at));
				$row[] = '
			  	<div class="">
				  	<a href="#" type="button" id="btn-edit-' . $fq->id_faq . '" onclick=ButtonEdit("' . encrypt_decrypt("encrypt",$fq->id_faq) . '") class="btn btn-warning shadow btn-sm sharp mr-1"><span class="fa fa-edit"></span></a>
                 	<a href="#" type="button" id="btn-delete-' . $fq->id_faq . '" onclick=ButtonDelete("' . encrypt_decrypt("encrypt",$fq->id_faq) . '") class="btn btn-danger shadow btn-sm sharp"><span class="fa fa-trash"></span></a>

                </div>	
			  ';
				$data[] = $row;
			}
			// var_dump($data);die;
			$output = [
				'draw' => @$_POST['draw'],
				'recordsTotal' => $this->Datatable_Model->countAll($query),
				'recordsFiltered' => $this->Datatable_Model->countFilters($query, $this->column_order, $this->column_search, $this->order),
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
				$pertanyaan = $this->input->post('pertanyaan', TRUE);
				$jawaban = $this->input->post('jawaban', TRUE);
				$data = [
					'pertanyaan' => $pertanyaan,
					'jawaban' => $jawaban,
					'status' => "Aktif",
				];
				$this->General_Model->insert('faq',$data);
				$response = [
					'status' => true,
					'alert' => "Successfully Added Data"
				];
			} else {
				$response['error'] = getErrorValidation();
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
				$id_faq = $this->input->post('id_faq', TRUE);
				$pertanyaan = $this->input->post('pertanyaan', TRUE);
				$jawaban = $this->input->post('jawaban', TRUE);
				$data = [
					'pertanyaan' => $pertanyaan,
					'jawaban' => $jawaban,
				];
				$this->General_Model->update('faq',$data,['id_faq' => $id_faq]);
				$response = [
					'status' => true,
					'alert' => "Successfully Updated Data"
				];
			} else {
				$response['error'] = getErrorValidation();
				$response['status'] = false;
				$response['alert'] = 'Successfully Updated Data';
			}
			$this->output->set_output(json_encode($response));
		} else {
			exit('Proses Tidak Dapat Dilanjutkan');
		}
	}

	function delete($id_faq)
	{
		if ($this->input->is_ajax_request()) {

			softDelete('faq',['id_faq' => encrypt_decrypt("decrypt",$id_faq)]);
			$this->output->set_output(json_encode(['sukses' => true, 'alert' => 'Successfully Deleted Data']));
		} else {
			exit('Proses Tidak Dapat Dilanjutkan');
		}
	}

	function updateStatus($id_faq)
	{
		$id_faq = encrypt_decrypt('decrypt', $id_faq);
		$cek = $this->General_Model->get('faq', ['id_faq' => $id_faq])->row();
		// var_dump($cek);die;
		if ($cek->status == 'Aktif') {
			$status = 'Tidak Aktif';
		}else{
			$status = 'Aktif';
		}

		$this->General_Model->update('faq', ['status' => $status], ['id_faq' => $id_faq]);

		$this->output->set_output(json_encode(['status' => true, 'alert' => "Successfully change status"]));
	}

	private function _validation()
	{
		$this->form_validation->set_rules('pertanyaan', 'pertanyaan', 'trim|required');
		$this->form_validation->set_rules('jawaban', 'jawaban', 'trim|required');
		$this->form_validation->set_error_delimiters('', '');
		return $this->form_validation->run();
	}

}

/* End of file Faq.php */
/* Location: ./application/controllers/cms/Faq.php */