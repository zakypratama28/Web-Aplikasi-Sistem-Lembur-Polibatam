<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_data extends CI_Model {
		
	public function get_data()
	{
		return $this->db->get('dosen')->result_array();
	}
	//input data kedalam tabel
	function insertDosen($data){
		$this->db->insert('dosen', $data);
		return;
	}

	function get_data_by_id($table, $kode){
		$this->db->where('nidn', $kode);
		return $this->db->get($table);
	}

	function update($table, $kode, $data){
		$this->db->where('nidn', $kode);
		return $this->db->update($table, $data);
	}
		
	function del_by_id($table, $kode) {
		$this->db->where('nidn', $kode);
		$this->db->delete($table);
	}
}
?>