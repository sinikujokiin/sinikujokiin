<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	private $where = ['status' => "Aktif", 'deleted_at' => null];
	public function __construct()
	{
		parent::__construct();
		$this->load->model('General_Model', 'gm');
		//$this->load->driver('cache');

		
	}

	public function index()
	{
	    //$this->output->cache(86400);
		$data['title'] = "Home";
		$data['breadcrumb'] = breadcrumb($data['title'], false);
		$data['fitur'] = $this->gm->get('fitur', $this->where)->result_array();
		$data['tugas'] = $this->gm->get('tugas', $this->where, null, null, ['created_at', 'ASC'])->result_array();
		$data['faq'] = $this->gm->get('faq', $this->where)->result_array();
		$data['testimoni'] = $this->gm->get('testimoni', $this->where)->result_array();
		$data['portfolio'] = $this->gm->get('portfolio', $this->where, null, null, ['created_at', 'desc'])->result_array();
		$data['kategori'] = $this->gm->get('portfolio', ['deleted_at' => null], null,null,null,'kategori_portfolio')->result_array();
		$data['team'] = $this->gm->get('team', $this->where)->result_array();
		$data['jenis_joki'] = $this->gm->get('jenis_joki', $this->where)->result_array();
		$data['section'] = [
			'home' => $this->gm->get('section', array_merge($this->where, ['type_section' => 'section_home']))->row_array(),
			'faq' => $this->gm->get('section', array_merge($this->where, ['type_section' => 'section_faq']))->row_array(),
			'payment' => $this->gm->get('section', array_merge($this->where, ['type_section' => 'section_payment']))->row_array(),
			'jenis_joki' => $this->gm->get('section', array_merge($this->where, ['type_section' => 'section_jenis_joki']))->row_array(),
			'contact' => $this->gm->get('section', array_merge($this->where, ['type_section' => 'section_contact']))->row_array(),
			'service' => $this->gm->get('section', array_merge($this->where, ['type_section' => 'section_service']))->row_array(),
			'best_price' => $this->gm->get('section', array_merge($this->where, ['type_section' => 'section_best_price']))->row_array(),
			'portfolio' => $this->gm->get('section', array_merge($this->where, ['type_section' => 'section_portfolio']))->row_array(),
			'testimoni' => $this->gm->get('section', array_merge($this->where, ['type_section' => 'section_testimoni']))->row_array(),
			'team' => $this->gm->get('section', array_merge($this->where, ['type_section' => 'section_team']))->row_array(),
			'footer' => $this->gm->get('section', array_merge($this->where, ['type_section' => 'section_footer_home']))->row_array(),
		];
		$data['pembayaran'] = $this->db->get_where('pembayaran', $this->where)->result_array();
		loadView('templates/landing', 'landing/home', $data);
	}

	public function caraOrder()
	{
	    //$this->output->cache(86400);
		$data['title'] = "Cara Order";
		$data['breadcrumb'] = breadcrumb($data['title'], true);
		$data['data'] = $this->gm->get('cara_order', $this->where)->result_array();
		$data['pembayaran'] = $this->gm->get('pembayaran', $this->where)->result_array();
		$pembayaran = [];
		foreach ($data['pembayaran'] as $value) {
			$pembayaran[] = $value['nama_pembayaran'];
		}
		$data['list_pembayaran'] = implode(",", $pembayaran);
		$data['section'] = [
			'banner' => $this->gm->get('section', array_merge($this->where, ['type_section' => 'section_banner_cara_order']))->row_array(),
			'cara_order' => $this->gm->get('section', array_merge($this->where, ['type_section' => 'section_cara_order']))->row_array(),
			'cara_ordernya' => $this->gm->get('section', array_merge($this->where, ['type_section' => 'section_cara_ordernya']))->row_array(),
			'pembayaran' => $this->gm->get('section', array_merge($this->where, ['type_section' => 'section_pembayaran']))->row_array(),
			'footer' => $this->gm->get('section', array_merge($this->where, ['type_section' => 'section_footer_cara_order']))->row_array(),
		];
		loadView('templates/landing', 'landing/cara_order', $data);
	}

	public function testimoni()
	{
	    $this->load->driver("cache");
	    $cache_key = md5($this->uri->uri_string());
        $cache_path = $this->config->item('cache_path');
        
        if ($output = $this->cache->file->get($cache_key)) {
            $this->output->set_output($output);
            return;
        }
		$data['title'] = "Testimoni";
		$data['breadcrumb'] = breadcrumb($data['title'], true);
		$data['data'] = $this->gm->get('testimoni', $this->where)->result_array();
		$data['testimoni_chat'] = generatePaginate('testimoni_chat', $this->where);
		$data['section'] = [
			'banner' => $this->gm->get('section', array_merge($this->where, ['type_section' => 'section_banner_testimoni']))->row_array(),
			'testimonial' => $this->gm->get('section', array_merge($this->where, ['type_section' => 'section_testimonial']))->row_array(),
			'testimoni_client' => $this->gm->get('section', array_merge($this->where, ['type_section' => 'section_testimoni_client']))->row_array(),
			'testimoni_chat' => $this->gm->get('section', array_merge($this->where, ['type_section' => 'section_testimoni_chat']))->row_array(),
			'footer' => $this->gm->get('section', array_merge($this->where, ['type_section' => 'section_footer_cara_order']))->row_array(),
		];
		// var_dump($data['testimoni_chat']);die;
		$output = loadView('templates/landing', 'landing/testimoni', $data);
        $this->cache->file->save($cache_key, $output, 86400);
	}

	public function tugas($slug = null)
	{
	    //$this->output->cache(86400);
		if ($slug) {
			$tugas = $this->db->where('slug', $slug)->get_where('tugas', $this->where)->row_array();
			if($tugas){
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
			    redirect(base_url());
			}
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
	    //$this->output->cache(86400);
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
