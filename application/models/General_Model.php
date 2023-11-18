<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class General_Model extends CI_Model {

	function get($table, $where = null, $limit =null, $offset =null, $order = null, $group = null)
	{
		if ($where) {
			$this->db->where($where);
		}
		$limit = $limit ? $limit : $this->input->get('limit');
		$offset = $offset ? $offset : $this->input->get('offset');
		if ($limit || $offset) {
			$this->db->limit($limit, $offset);
		}
		if ($order) {
			$this->db->order_by($order[0], $order[1]);
		}
		if ($group) {
			$this->db->group_by($group);
		}
		return $this->db->get($table);
	}


	function insert($table, $data)
	{
		$this->db->insert($table, $data);
		$this->session->unset_userdata('image');
		return true;
	}

	function update($table, $data, $primary)
	{
		$this->db->update($table, $data, $primary);
		$this->session->unset_userdata('image');
		return true;
	}

	function delete($table, $where)
	{
		return $this->db->delete($table, $where);
	}	

}

/* End of file General_Model.php */
/* Location: ./application/models/General_Model.php */