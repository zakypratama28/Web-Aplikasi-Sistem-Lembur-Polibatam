<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this ->load-> model('mahasiswa_model');
	}	
	public function index()
	{
		$data['data_mahasiswa']= $this->mahasiswa_model->isidata();
		
		$this->load->view('mahasiswa_view', $data);
	}
}
