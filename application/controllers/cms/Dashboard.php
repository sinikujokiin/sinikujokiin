<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
		$this->load->model('General_Model');
		cekLogin();
	}

	public function index()
	{

		$userData = $this->session->userdata('userData');
		$role = $userData['role_id'];
		$id = $userData['id_user'];
		$data = [
			'title' => 'Dashboard',
		];
		
		

			$this->template->load('templates/cms','cms/dashboard', $data,FALSE);
		// $test = $this->db->select('COUNT(articles.created_by) as jml, fullname')->join('users', 'users.id_user = articles.created_by')->group_by("id_user")->get_where('articles', ['DAY(created_date)' => date("d")])->result();	
		// $this->template->load('templates/cms', 'cms/dashboard');		
	}


	function getData()
	{
		$year = $this->input->get('y');
		$month = $this->input->get('m');
		// $orderCharts = $this->orderChart();
		$userData = $this->session->userdata('userData');

		$artikel = $this->db->get_where('artikel', ['deleted_at' => null])->num_rows();
		$portfolio = $this->db->get_where('portfolio', ['deleted_at' => null])->num_rows();
		$team = $this->db->get_where('team', ['deleted_at' => null])->num_rows();
		$faq = $this->db->get_where('faq', ['deleted_at' => null])->num_rows();
		$response = [
			'status' => true,
			'data' => [
				// 'order' => $orderCharts,
				'artikel' => $artikel,
				'portfolio' => $portfolio,
				'team' => $team,
				'faq' => $faq,
			]
		];

		$this->output->set_output(json_encode($response));
	}


	private function orderChart()
	{	
		$year = $this->input->get('y');
		$month = $this->input->get('m');
		$jumlah = [];
		$bulan = [];
		$isDate = '';
		$where['YEAR(date_time_orders)'] = $year ? date("Y") : $year ;
		if ($month) {
			$group = "DAY(date_time_orders)"; 
			$day = date("t", strtotime($year.'-'.$month));
			$where['MONTH(date_time_orders)'] = $month;
			for ($i=1; $i <= $day ; $i++) { 
				$where['DAY(date_time_orders)'] = $i;
				$data = $this->db->select('COUNT(id) as jumlah')->group_by($group)->get_where('orders', $where)->row_array();
				$jumlah[] = $data ? $data['jumlah'] : 0 ;
				$bulan[] = $i;
			}
			$isDate = true;
		}else{
			$month = $month ? $month : date("m");
			$group = "MONTH(date_time_orders)"; 
			for ($i=1; $i <= $month ; $i++) { 
				$where['MONTH(date_time_orders)'] = $i;
				$data = $this->db->select('COUNT(id) as jumlah')->group_by($group)->get_where('orders', $where)->row_array();
				$jumlah[] = $data ? $data['jumlah'] : 0 ;
				$bulan[] = bulan($i);
			}
			$isDate = false;
		}

		return $chart = ['jumlah' => $jumlah, 'bulan' => $bulan, 'isDate' => $isDate];


	}

}

/* End of file Dashboard.php */
/* Location: ./application/controllers/cms/Dashboard.php */