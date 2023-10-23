<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	private $where = ['status' => "Aktif", 'deleted_at' => null];
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data['title'] = "Home";
		$data['breadcrumb'] = breadcrumb($data['title'], false);
		$data['fitur'] = $this->db->get_where('fitur', $this->where)->result_array();
		$data['tugas'] = $this->db->limit(6)->order_by('created_at', "ASC")->get_where('tugas', $this->where)->result_array();
		$data['faq'] = $this->db->get_where('faq', $this->where)->result_array();
		$data['testimoni'] = $this->db->get_where('testimoni', $this->where)->result_array();
		$data['portfolio'] = $this->db->get_where('portfolio', $this->where)->result_array();
		$data['kategori'] = $this->db->group_by('kategori_portfolio')->get_where('portfolio', ['deleted_at' => null])->result_array();
		$data['team'] = $this->db->get_where('team', $this->where)->result_array();
		$data['jenis_joki'] = $this->db->get_where('jenis_joki', $this->where)->result_array();
		$data['section'] = [
			'home' => $this->db->where('type_section', 'section_home')->get_where('section', $this->where)->row_array(),
			'faq' => $this->db->where('type_section', 'section_faq')->get_where('section', $this->where)->row_array(),
			'payment' => $this->db->where('type_section', 'section_payment')->get_where('section', $this->where)->row_array(),
			'jenis_joki' => $this->db->where('type_section', 'section_jenis_joki')->get_where('section', $this->where)->row_array(),
			'contact' => $this->db->where('type_section', 'section_contact')->get_where('section', $this->where)->row_array(),
			'service' => $this->db->where('type_section', 'section_service')->get_where('section', $this->where)->row_array(),
			'best_price' => $this->db->where('type_section', 'section_best_price')->get_where('section', $this->where)->row_array(),
			'portfolio' => $this->db->where('type_section', 'section_portfolio')->get_where('section', $this->where)->row_array(),
			'testimoni' => $this->db->where('type_section', 'section_testimoni')->get_where('section', $this->where)->row_array(),
			'team' => $this->db->where('type_section', 'section_team')->get_where('section', $this->where)->row_array(),
			'footer' => $this->db->where('type_section', 'section_footer_home')->get_where('section', $this->where)->row_array(),
		];
		$data['pembayaran'] = $this->db->get_where('pembayaran', $this->where)->result_array();
		loadView('templates/landing', 'landing/home', $data);
	}

	public function caraOrder()
	{
		$data['title'] = "Cara Order";
		$data['breadcrumb'] = breadcrumb($data['title'], true);
		$data['data'] = $this->db->get_where('cara_order', $this->where)->result_array();
		$data['pembayaran'] = $this->db->get_where('pembayaran', $this->where)->result_array();
		$pembayaran = [];
		foreach ($data['pembayaran'] as $value) {
			$pembayaran[] = $value['nama_pembayaran'];
		}
		$data['list_pembayaran'] = implode(",", $pembayaran);
		$data['section'] = [
			'banner' => $this->db->where('type_section', 'section_banner_cara_order')->get_where('section', $this->where)->row_array(),
			'cara_order' => $this->db->where('type_section', 'section_cara_order')->get_where('section', $this->where)->row_array(),
			'cara_ordernya' => $this->db->where('type_section', 'section_cara_ordernya')->get_where('section', $this->where)->row_array(),
			'pembayaran' => $this->db->where('type_section', 'section_pembayaran')->get_where('section', $this->where)->row_array(),
			'footer' => $this->db->where('type_section', 'section_footer_cara_order')->get_where('section', $this->where)->row_array(),
		];
		loadView('templates/landing', 'landing/cara_order', $data);
	}

	public function testimoni()
	{
		$data['title'] = "Testimoni";
		$data['breadcrumb'] = breadcrumb($data['title'], true);
		$data['data'] = $this->db->get_where('testimoni', $this->where)->result_array();
		$data['testimoni_chat'] = $this->db->get_where('testimoni_chat', $this->where)->result_array();
		$data['section'] = [
			'banner' => $this->db->where('type_section', 'section_banner_testimoni')->get_where('section', $this->where)->row_array(),
			'testimonial' => $this->db->where('type_section', 'section_testimonial')->get_where('section', $this->where)->row_array(),
			'testimoni_client' => $this->db->where('type_section', 'section_testimoni_client')->get_where('section', $this->where)->row_array(),
			'testimoni_chat' => $this->db->where('type_section', 'section_testimoni_chat')->get_where('section', $this->where)->row_array(),
			'footer' => $this->db->where('type_section', 'section_footer_cara_order')->get_where('section', $this->where)->row_array(),
		];
		// var_dump($data['section']['testimonial']);die;
		loadView('templates/landing', 'landing/testimoni', $data);
	}

	public function tugas($slug = null)
	{
		if ($slug) {
			$tugas = $this->db->where('slug', $slug)->get_where('tugas', $this->where)->row_array();
			$data['title'] = "Detail Tugas ".$tugas['nama_tugas'];
			$data['breadcrumb'] = breadcrumb($data['title'], true);
			$data['data'] = $tugas;
			$data['terkait'] = $this->db->limit(5)->where(['deskripsi !=' => null, 'id_tugas !=' => $tugas['id_tugas']])->get_where('tugas', $this->where)->result_array();
			$data['section'] = [
				'banner' => $this->db->where('type_section', 'section_banner_list_tugas')->get_where('section', $this->where)->row_array(),
				'side' => $this->db->where('type_section', 'section_side_artikel')->get_where('section', $this->where)->row_array(),
			];
			loadView('templates/landing', 'landing/detail_tugas', $data);
		}else{
			$data['title'] = "List Tugas";
			$data['breadcrumb'] = breadcrumb($data['title'], true);
			$data['data'] = $this->db->get_where('tugas', $this->where)->result_array();
			$data['section'] = [
				'banner' => $this->db->where('type_section', 'section_banner_list_tugas')->get_where('section', $this->where)->row_array(),
				'tugas' => $this->db->where('type_section', 'section_list_tugas')->get_where('section', $this->where)->row_array(),
				'unggulan' => $this->db->where('type_section', 'section_tugas_unggulan')->get_where('section', $this->where)->row_array(),
				'footer' => $this->db->where('type_section', 'section_footer_cara_order')->get_where('section', $this->where)->row_array(),
			];
			// var_dump($data['section']['tugasal']);die;
			loadView('templates/landing', 'landing/tugas', $data);
		}
	}

	public function artikel($slug = null)
	{
		$data['section'] = [
			'banner' => $this->db->where('type_section', 'section_banner_artikel')->get_where('section', $this->where)->row_array(),
			'side' => $this->db->where('type_section', 'section_side_artikel')->get_where('section', $this->where)->row_array(),
			'footer' => $this->db->where('type_section', 'section_footer_cara_order')->get_where('section', $this->where)->row_array(),
		];
		if ($slug) {
			$artikel = $this->db->where('slug', $slug)->get_where('artikel', $this->where)->row_array();
			$data['terkait'] = $this->db->limit(5)->where(['kategori' => $artikel['kategori'], 'id_artikel !=' => $artikel['id_artikel']])->get_where('artikel', $this->where)->result_array();
			$data['title'] = "Detail Artikel ".$artikel['title'];
			$data['breadcrumb'] = breadcrumb($data['title'], true);
			$data['data'] = $artikel;
			loadView('templates/landing', 'landing/detail_artikel', $data);
		}else{
			$data['title'] = "List Artikel";
			$data['breadcrumb'] = breadcrumb($data['title'], true);
			$data['data'] = $this->db->get_where('artikel', $this->where)->result_array();
			
			// var_dump($data['section']['tugasal']);die;
			loadView('templates/landing', 'landing/artikel', $data);
		}
	}

}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */