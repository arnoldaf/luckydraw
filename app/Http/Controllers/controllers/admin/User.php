<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->library('ion_auth');
		$this->load->library(array('session'));
		$this->load->helper(array('url'));
		$this->load->model('Client_model');
  }

  public function index()
  {
  }

  public function profile()
  {
    if(!$this->ion_auth->logged_in())
    {
      redirect('admin');
    }
    $this->data['page_title'] = 'User Profile';
    $user = $this->ion_auth->user()->row();
    $this->data['user'] = $user;
    $this->data['current_user_menu'] = '';

    $this->load->library('form_validation');
    $this->form_validation->set_rules('first_name','First name','trim');
    $this->form_validation->set_rules('last_name','Last name','trim');
    $this->form_validation->set_rules('company','Company','trim');
    $this->form_validation->set_rules('phone','Phone','trim');

    if($this->form_validation->run()===FALSE)
    {
      $this->render('admin/user/profile_view','admin_master');
    }
    else
    {
      $new_data = array(
        'first_name' => $this->input->post('first_name'),
        'last_name' => $this->input->post('last_name'),
        'company' => $this->input->post('company'),
        'phone' => $this->input->post('phone')
      );
      if(strlen($this->input->post('password'))>=6) $new_data['password'] = $this->input->post('password');
      $this->ion_auth->update($user->id, $new_data);

      $this->session->set_flashdata('message', $this->ion_auth->messages());
  redirect('admin/user/profile','refresh');
    }
  }

  public function login()
  {
    $this->data['page_title'] = 'Login';
    if($this->input->post())
    {
      $this->load->library('form_validation');
      $this->form_validation->set_rules('identity', 'Identity', 'required');
      $this->form_validation->set_rules('password', 'Password', 'required');
      $this->form_validation->set_rules('remember','Remember me','integer');
      if($this->form_validation->run()===TRUE)
      {
        $remember = (bool) $this->input->post('remember');
        if ($this->ion_auth->login($this->input->post('identity'), $this->input->post('password'), $remember))
        {
          redirect('admin', 'refresh');
        }
        else
        {
          $this->session->set_flashdata('message',$this->ion_auth->errors());
          redirect('admin/user/login', 'refresh');
        }
      }
    }
    $this->load->helper('form');
    $this->render('admin/login_view','admin_master');
  }
  
	/**
	 * register function.
	 * 
	 * @access public
	 * @return void
	 */
	public function register() {
		
		// create the data object
		$data = new stdClass();
		
		// load form helper and validation library
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		// set validation rules
		$this->form_validation->set_rules('username', 'Username', 'trim|required|alpha_numeric|min_length[4]|is_unique[users.username]', array('is_unique' => 'This username already exists. Please choose another one.'));
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');
		$this->form_validation->set_rules('password_confirm', 'Confirm Password', 'trim|required|min_length[6]|matches[password]');
		
		if ($this->form_validation->run() === false) {
			
			// validation not ok, send validation errors to the view
			$this->load->view('header');
			$this->load->view('user/register/register', $data);
			$this->load->view('footer');
			
		} else {
			
			// set variables from the form
			$username = $this->input->post('username');
			$email    = $this->input->post('email');
			$password = $this->input->post('password');
			
			if ($this->user_model->create_user($username, $email, $password)) {
				
				// user creation ok
				$this->load->view('header');
				$this->load->view('user/register/register_success', $data);
				$this->load->view('footer');
				
			} else {
				
				// user creation failed, this should never happen
				$data->error = 'There was a problem creating your new account. Please try again.';
				
				// send error to the view
				$this->load->view('header');
				$this->load->view('user/register/register', $data);
				$this->load->view('footer');
				
			}
			
		}
		
	}

  public function logout()
  {
    $this->ion_auth->logout();
    redirect('admin/user/login', 'refresh');
  }
}