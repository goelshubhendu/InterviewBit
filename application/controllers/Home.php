<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('users');
	}
	public function index()
	{
		$a['users']=$this->users->get();
		$this->load->view('header');
		$this->load->view('home',$a);
		$this->load->view('footer');
	}
	public function new()
	{

		header('Access-Control-Allow-Origin: *');
		$title=$this->input->post('title');
		$mem=$this->input->post('members');
		$tot=$this->input->post('tot');
		for($i=0;$i<$tot;$i++)
			echo $mem[$i];
		
	}
}
