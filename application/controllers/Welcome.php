<?php
// Source Code by : I Gede Widhi Pratama
// email : widhipratama52@gmail.com
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	var $API = "";
	function __construct()
	{
		parent::__construct();
		$this->API="http://localhost/web-rest-api-ascii/api/webserver";
		$this->load->library('session');
		$this->load->library('curl');
		$this->load->helper('form');
		$this->load->helper('url');
	}

	public function index()
	{
		$data['plaintext'] = json_decode($this->curl->simple_get($this->API.'?value='.str_replace(' ', '', $this->input->get('codeascii'))));
		
		$this->load->view('welcome_message', $data);
	}
}
