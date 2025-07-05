<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Homepage extends CI_Controller {
    public function index()
	{
		$this->load->model('User_model');
		$data['stats'] = $this->User_model->getPengaduanStats();
		$this->load->view('home', $data);
	} 

	public function corona()
	{
		$this->load->view('templates/corona');
	} 
}