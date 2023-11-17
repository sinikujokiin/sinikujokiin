<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Log extends CI_Controller {

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
			'title' => 'Data Log'
		];	

		$this->template->load('templates/cms', 'cms/logs',$data, FALSE);
	}

		var $column_order = [null, 'ip_address', 'url','deskripsi', 'jumlah','created_at'];
		var $column_search = ['ip_address', 'url','deskripsi', 'jumlah','created_at'];
		var $order = ['updated_at' => 'DESC'];

		function getData()
		{
			if ($this->input->is_ajax_request()) {
				// $where = ['deleted_at' => null];
				$query = [
					'table' => 'logs',
					'select' => '*',
					'where' => [],
					'join' => [
					]
				];
				// var_dump($this->input->post('tipe'));
				$logs = $this->Datatable_Model->getDataTables($query, $this->column_order, $this->column_search, $this->order);
				$data = [];
				$no = @$_POST['start'];
				foreach ($logs as $log) {
					$no++;
					$row = [];
					$row[] = $no . ".";
					$row[] = $log->ip_address;
					$row[] = $log->url;
					$row[] = $log->deskripsi;
					$row[] = $log->jumlah;
					$row[] = $log->updated_at ? date('d-m-Y H:i', strtotime($log->updated_at)) : date('d-m-Y H:i', strtotime($log->created_at)) ;
					$data[] = $row;
				}
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

}

/* End of file Log.php */
/* Location: ./application/controllers/cms/Log.php */