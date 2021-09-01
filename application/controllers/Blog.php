<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {

	private $model = 'Model_blog';

	public function __construct(){
		parent::__construct();

		$this->load->model($this->model);
	}

	public function index()
	{
		$articles = $this->{$this->model}->get_all();
		$this->load->view('header');
		$this->load->view('blog_list', $articles);
		$this->load->view('footer');
	}

	public function add(){
		print_r('add');
	}

	public function edit($id = null){
		print_r('edit '.$id);
	}

	public function create(){
		print_r('create');
	}

	public function remove($id = null){
		print_r('remove '.$id);
	}
}
