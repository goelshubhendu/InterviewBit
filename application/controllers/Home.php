<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct(){
		parent::__construct();
	}
	public function index()
	{
		$this->load->view('header');
		$this->load->view('home');
		$this->load->view('footer');
	}
	public function new()
	{

		header('Access-Control-Allow-Origin: *');
		//$this->db->query("insert into users values(5,'smsms','ssss','sss')");
		$temp="API IS EXPOSED";
		echo $temp;
	}
}
