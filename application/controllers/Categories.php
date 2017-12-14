<?php
	class Categories extends CI_Controller{
		var $resource = "resource/user/";
		public function index(){
			if(!$this->session->userdata('logged_in')){
				redirect('admin/login');
			}
			$data['title'] = 'Categories';

			$data['categories'] = $this->category_model->get_categories();
			$this->load->view('templates/header',['res'=>$this->resource]);
			$this->load->view('categories/index', $data);
			$this->load->view('templates/footer');
		}
		public function create(){
			if(!$this->session->userdata('logged_in')){
				redirect('admin/login');
			}
			$data['title'] = 'Create Category';

			$this->form_validation->set_rules('name', 'Name', 'required');

			if($this->form_validation->run() === FALSE){
				$this->load->view('templates/header',['res'=>$this->resource]);
				$this->load->view('categories/create', $data);
				$this->load->view('templates/footer');
			} else {
				$this->category_model->create_category();
				redirect('categories');
			}
		}
		public function posts($id){
			if(!$this->session->userdata('logged_in')){
				redirect('admin/login');
			}
			$data['title'] = $this->category_model->get_category($id)->name;

			$data['posts'] = $this->post_model->get_posts_by_category($id);
			$this->load->view('templates/header',['res'=>$this->resource]);
			$this->load->view('posts/index', $data);
			$this->load->view('templates/footer');
		}
	}