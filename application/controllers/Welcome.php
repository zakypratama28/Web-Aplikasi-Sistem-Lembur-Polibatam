<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct(){
		parent::__construct();
	}

	public function index()
	{
		$data['nim']='3311901031';
		$data['nama']='Fahrurzaky Nur Pratama';
		$data['jurusan']='Teknik Informatika';
		$this->load->view('welcome_message', $data);
	}
}
