<?php
	class Posts extends CI_Controller{
		var $resource = "resource/user/";
		public function index(){
			if(!$this->session->userdata('logged_in')){
				redirect('admin/login');
			}
			$data['title'] = 'Latest Post';

			$data['posts'] = $this->post_model->get_posts();
			$this->load->view('templates/header',['res'=>$this->resource]);
			$this->load->view('posts/index', $data);
			$this->load->view('templates/footer');
		}
		public function view($slug = NULL){
			if(!$this->session->userdata('logged_in')){
				redirect('admin/login');
			}
			$data['post'] = $this->post_model->get_posts($slug);
			if(empty($data['post'])){
				show_404();
			}

			$data['title'] = $data['post']['title'];
			$this->load->view('templates/header',['res'=>$this->resource]);
			$this->load->view('posts/view', $data);
			$this->load->view('templates/footer');
		}
		public function create(){
			if(!$this->session->userdata('logged_in')){
				redirect('admin/login');
			}
			$data['title'] = 'Create Post';
			$data['categories'] = $this->post_model->get_categories();
			$this->form_validation->set_rules('title', 'Title', 'required');
			$this->form_validation->set_rules('body', 'Body', 'required');
			if($this->form_validation->run() === FALSE){
				$this->load->view('templates/header',['res'=>$this->resource]);
				$this->load->view('posts/create', $data);
				$this->load->view('templates/footer');
			} else {
				//Upload Image
				$config['upload_path'] = 'C:/xampp/htdocs/gdsa/resource/images/posts/';
				$config['allowed_types'] = 'png|jpg';
				$config['max_size'] = '0';
				$config['max_width'] = '0';
				$config['max_height'] = '0';
				$this->load->library('upload', $config);

				if(!$this->upload->do_upload()){
					$errors = array('error' => $this->upload->display_errors());
					$post_image = 'noimage.jpg';
				} else {
					$data = array('upload_data' => $this->upload->data());
					$post_image = $_FILES['userfile']['name'];
				}
				$this->post_model->create_posts($post_image);			
				redirect('posts');	
			}
		}
		public function delete($id){
			if(!$this->session->userdata('logged_in')){
				redirect('admin/login');
			}
			$this->post_model->delete_post($id);
			redirect('posts');	
		}
		public function edit($slug){
			if(!$this->session->userdata('logged_in')){
				redirect('admin/login');
			}
			$data['post'] = $this->post_model->get_posts($slug);
			$data['categories'] = $this->post_model->get_categories();
			if(empty($data['post'])){
				show_404();
			}

			$data['title'] = 'Edit Post';
			$this->load->view('templates/header',['res'=>$this->resource]);
			$this->load->view('posts/edit', $data);
			$this->load->view('templates/footer');
		}
		public function update($id){
			if(!$this->session->userdata('logged_in')){
				redirect('admin/login');
			}
			$this->post_model->update_post($id);	
			redirect('posts');	
		}
	}