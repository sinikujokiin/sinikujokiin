<?php 
	

	function getMenu($parent = 0, $tipe)
	{
		$CI = &get_instance();
		$role_id = $CI->session->userdata('userData')['role_id'];
		return $CI->db->join('users_access', 'users_access.menu_id = menus.id_menu')->order_by('sort', 'ASC')->get_where('menus', ['menu_parent' => $parent, 'role_id' => $role_id,'type' => $tipe, 'menus.deleted_at' => null])->result_array();
	}

	function logs($title)
	{
		$CI = &get_instance();
		$ip = $CI->input->ip_address();
		$segs = $CI->uri->segment_array();
		$totalSegs = count($segs);
		$link = base_url();
		if ($segs) {
			for ($i = 1; $i <= $totalSegs; $i++) {
			    if ($segs[$i] === $segs[$totalSegs]) {
			        $link .= $segs[$i];
			    } else {
			        $link .= $segs[$i] . "/";
			    }
			}
		}
		$data = [
			'ip_address' => $ip,
			'url' => $link,
		];
		$CI->load->library('user_agent');

		if ($CI->agent->is_browser()){
	        $agent = $CI->agent->browser().' '.$CI->agent->version();
		}elseif ($CI->agent->is_robot()){
	        $agent = $CI->agent->robot();
		}elseif ($CI->agent->is_mobile()){
	        $agent = $CI->agent->mobile();
		}else{
	        $agent = 'Unidentified User Agent';
		}
		$platform = $CI->agent->platform();
		// var_dump($agent);die;
		$cek = $CI->db->get_where('logs', $data)->row_array();
		if ($cek) {
			$CI->db->update('logs', [
				'jumlah' => intval($cek['jumlah'])+1, 
				'deskripsi' => 'Mengakses halaman '.$title.' pada '.date("d-m-Y H:i:s"),
				'platform' => $cek['platform'] && is_array($cek['platform']) ? json_encode(array_push(json_decode($cek['platform']), $platform)) : json_encode([$platform]),
				'user_agent' => $cek['user_agent'] && is_array($cek['user_agent']) ? json_encode(array_push(json_decode($cek['user_agent']), $agent)) : json_encode([$agent]),
			], $data);
		}else{
			$data['jumlah'] = 1;
			$data['deskripsi'] = 'Mengakses halaman '.$title.' pada '.date("d-m-Y H:i:s");
			$data['platform'] = json_encode([$platform]);
			$data['user_agent'] = json_encode([$agent]);
			$CI->db->insert('logs', $data);
		}
	}
	function getErrorValidation()
	{
		$CI = &get_instance();

		$forms = $CI->input->post();
		// var_dump($forms);die;
		$response = [];
		foreach ($forms as $key => $value) {
			if ($key != 'id') {
				$response[$key] = form_error($key);
			}
		}
		return $response;
	}

	function softDelete($table, $where)
	{
		$CI = &get_instance();
		$fields = $CI->db->list_fields($table);
		$by = false;
		foreach ($fields as $key => $value) {
			if ($value == 'deleted_by') {
				$by = true;
			}
		}
		$data = ['deleted_at' => date('Y-m-d H:i:s')];
		if ($by) {
			$data['deleted_by'] = $CI->session->userdata('userData')['id_user'];
		}
		return $CI->db->update($table, $data, $where);

	}

	function encrypt_decrypt($action, $string) {
		    $output = false;
		    $encrypt_method = "AES-256-CBC";
		    $secret_key = '888living';
		    $secret_iv = 'nymgo';
		    // hash
		    $key = hash('sha256', $secret_key);

		    // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
		    $iv = substr(hash('sha256', $secret_iv), 0, 16);
		    if ($action == 'encrypt'){
		        $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
		        $output = base64_encode($output);
		    } else if($action == 'decrypt') {
		        $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
		    }
		    return $output;
		}

	function get_query_string($remove = '')
	{
	    $query_string = $_GET;
	    if ($remove) {
	        if (is_array($remove)) {
	            foreach ($remove as $key => $value) {
	                unset($query_string[$value]);
	            }
	        } else {
	            unset($query_string[$remove]);
	        }
	    }
	    if ($query_string) {
	        return '?'.http_build_query($query_string);
	    }
	    return '';
	}

	function dateIndonesia($date){
        if($date != '0000-00-00'){
            $date = explode('-', $date);
  
            $data = $date[2] . ' ' . bulan($date[1]) . ' '. $date[0];
        }else{
            $data = 'Format tanggal salah';
        }
  
        return $data;
    }
  
    function bulan($bln) {
        $bulan = $bln;
  
        switch ($bulan) {
            case 1:
                $bulan = "Januari";
                break;
            case 2:
                $bulan = "Februari";
                break;
            case 3:
                $bulan = "Maret";
                break;
            case 4:
                $bulan = "April";
                break;
            case 5:
                $bulan = "Mei";
                break;
            case 6:
                $bulan = "Juni";
                break;
            case 7:
                $bulan = "Juli";
                break;
            case 8:
                $bulan = "Agustus";
                break;
            case 9:
                $bulan = "September";
                break;
            case 10:
                $bulan = "Oktober";
                break;
            case 11:
                $bulan = "November";
                break;
            case 12:
                $bulan = "Desember";
                break;
        }
        return $bulan;
    }

    function hari($hari){
 
	switch($hari){
		case 'Sun':
			$hari = "Minggu";
		break;
 
		case 'Mon':			
			$hari = "Senin";
		break;
 
		case 'Tue':
			$hari = "Selasa";
		break;
 
		case 'Wed':
			$hari = "Rabu";
		break;
 
		case 'Thu':
			$hari = "Kamis";
		break;
 
		case 'Fri':
			$hari = "Jumat";
		break;
 
		case 'Sat':
			$hari = "Sabtu";
		break;
		
		default:
			$hari = "Tidak di ketahui";		
		break;
	}
 
	return $hari;
 
}


function breadcrumb($title, $is_bread = true)
{
	$breadcrumb = '
	<section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>'.$title.'</h2>
          <ol>
            <li><a href="'.base_url().'">Home</a></li>
            <li>'.$title.'</li>
          </ol>
        </div>

      </div>
    </section>
	';
	if ($is_bread == FALSE) {
		$breadcrumb = '';
	}
	return $breadcrumb;
}

function loadView($template, $view, $data)
{
	$CI = &get_instance();
	$data['web'] = $CI->db->get('setting')->row_array();
	// var_dump($data['web']);die;
	logs($data['title']);
	$CI->template->load($template, $view,$data, FALSE);
}

	function uploadFTP($linkLocal,$linkRemote,$filename)
	{
		$CI = &get_instance();
		
		$linkLocal = $linkLocal.$filename;
		$linkRemote = $linkRemote.$filename;
		$config = configFTP();
		$CI->ftp->connect($config);
		// var_dump($linkLocal,$linkRemote);die;
		// $CI->ftp->mirror($linkLocal, $linkRemote);
		$CI->ftp->upload($linkLocal, $linkRemote, 'ascii', 0775);
		$CI->ftp->close();
	}

	function uploadFTPPBN($linkLocal,$linkRemote,$filename, $host, $user, $pass)
	{
		$CI = &get_instance();
			
		$urlRemote = $linkRemote;
		$linkLocal = $linkLocal.$filename;
		$linkRemote = $linkRemote.$filename;

		$CI->load->library('ftp');

		$config['hostname'] = $host;
		$config['username'] = $user;
		$config['password'] = $pass;
		$config['debug']    = TRUE;
		$CI->ftp->connect($config);
		// var_dump($linkRemote);
		// var_dump($linkLocal);die;
		// $CI->ftp->mirror($linkLocal, $urlRemote);
		$list = $CI->ftp->list_files($urlRemote);
		if ($list == FALSE) {
			$CI->ftp->mkdir($urlRemote, 0755);
		}
		$upload = $CI->ftp->upload($linkLocal, $linkRemote, 'ASCII', 0775);
		$CI->ftp->close();
	}

	function deleteFTP($url,$filename, $host, $user, $pass)
	{
		$CI = &get_instance();

		$config = $CI->configFTPPBN($host, $user, $pass);
		$CI->ftp->connect($config);
		$list = $CI->ftp->list_files($url.$filename);
		if ($list) {
			$CI->ftp->delete_file($url.$filename);
		}
		$CI->ftp->close();
	}

	function configFTP()
	{
		$CI = &get_instance();

		$CI->load->library('ftp');

		$config['hostname'] = 'ftp.kssholding.digital';
		$config['username'] = 'u923262879.888living';
		$config['password'] = 'Nymgo888living';
		$config['debug']    = TRUE;
		
		return $config;	
	}


	function configFTPPBN($host,$user, $pass)
	{
		$CI = &get_instance();

		$CI->load->library('ftp');

		$config['hostname'] = $host;
		$config['username'] = $user;
		$config['password'] = $pass;
		$config['debug']    = TRUE;
		
		return $config;	
	}

	function linkFrontEnd()
	{
		return "http://888living.kssholding.digital/";
	}

	function resizeImage($filename, $path, $thumbnail)
    {
		$CI = &get_instance();
		// var_dump($thumbnail);die;
    	$source_path = $path . $filename;
    	$target_path = $thumbnail;

    	if (!is_dir($target_path)) {
		    mkdir($target_path, 0777, TRUE);
		}

    	$config_manip = array(
          'image_library' => 'gd2',
          'source_image' => $source_path,
          'new_image' => $target_path,
          'maintain_ratio' => TRUE,
          // 'thumb_marker' => '_thumb',
          'width' => 500,
    	);
   
		$CI->load->library('image_lib', $config_manip);
		if (!$CI->image_lib->resize()) {
          echo $CI->image_lib->display_errors();
      	}
    	$CI->image_lib->clear();
    }


    function covertToWebp($url = null, $file = null)
    {
    	$slug = explode(".", $file);
    	$slug = $slug[0];
    	// var_dump($url.$file);die;
    	$image = imagecreatefromstring(file_get_contents($url.$file));
		ob_start();
		imagejpeg($image,NULL,100);
		$cont = ob_get_contents();
		ob_end_clean();
		imagedestroy($image);
		$content = imagecreatefromstring($cont);
		$output = $url.$slug.'.webp';
		imagewebp($content,$output);
		unlink($url.$file);
		imagedestroy($content);
		return $slug.'.webp';
    }


    function generatePaginate($table,$where, $offset = 0)
    {
		$CI = &get_instance();
    	$CI->load->model('General_Model', 'gm');
    	$CI->load->library('pagination');
    	$config['base_url'] = base_url('testimoni');
        $config['total_rows'] = $CI->gm->get($table, $where)->num_rows(); // Change this with your model method to get total records
        $config['per_page'] = 10; // Number of items to show per page

        // Bootstrap pagination styling
        $config['full_tag_open'] = '<nav aria-label="Page navigation"><ul class="pagination text-center">';
        $config['full_tag_close'] = '</ul></nav>';
        $config['first_link'] = FALSE;
        $config['last_link'] = FALSE;
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '&laquo;';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&raquo;';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';
        $config['attributes'] = array('class' => 'page-link');
        // Initialize pagination
        $config['reuse_query_string'] = TRUE;
        $config['page_query_string'] = TRUE;
        $config['query_string_segment'] = 'page';

        $config['use_page_numbers'] = TRUE;

        $CI->pagination->initialize($config);
        $offset = ($CI->input->get('page')) ? ($CI->input->get('page')) : 0;;
        // Get data for the current page
        return $CI->gm->get($table,$where,$config['per_page'], $offset)->result_array();
    }
 ?>