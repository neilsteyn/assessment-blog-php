<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {

	private $model = 'Model_blog';
	public $view = '';

	public function __construct(){
		parent::__construct();
		$this->load->model($this->model);
	}

	public function index()
	{
		$articles = $this->{$this->model}->get_all();
		$this->load->view('header');
		$this->load->view('blog_list', array(
			'articles' => $articles
		));
		$this->load->view('footer');
	}

	public function add(){
		$session = $this->session->userdata();
		$data = $this->input->post();

		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('description', 'Description', 'required');
		$this->form_validation->set_rules('content', 'Content', 'required');

		if ($this->form_validation->run() !== FALSE){
			$data['user_id'] = $session['id'];
			$inserted_id = $this->{$this->model}->create($data);
			if ($inserted_id){
				redirect(base_url('/user'));
			}
		}

		$this->load->view('header');
		$this->load->view('blog_form', array(
			'data' => (object)$data
		));
		$this->load->view('footer');
	}

	public function edit($id = null){
		$data = $this->input->post();
		$article = $this->{$this->model}->get_article_by_id($id);
		if (!empty($data)){
			$article->title = $data['title'];
			$article->description = $data['description'];
			$article->content = $data['content'];

			$this->{$this->model}->update((array)$article);
			redirect(base_url('/user'));
		}

		if ($article){
			$this->view = 'edit';
			$this->load->view('header');
			$this->load->view('blog_form', array(
				'data' => $article
			));
			$this->load->view('footer');
		}
	}

	public function remove($id = null){
		$article = $this->{$this->model}->get_article_by_id($id);

		if ($article){
			$this->{$this->model}->delete($id);
		}

		redirect(base_url('/user'));
	}
}
