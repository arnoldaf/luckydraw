<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Auth
 * @property Ion_auth|Ion_auth_model $ion_auth        The ION Auth spark
 * @property CI_Form_validation      $form_validation The form validation library
 */
class Customer extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library(array('ion_auth', 'form_validation'));
		$this->load->helper(array('url', 'language'));

		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

		$this->lang->load('auth');
	}

	/**
	 * Redirect if needed, otherwise display the user list
	 */
	public function index()
	{


	}

	public function enquiry()
	{
		 print_r($_REQUEST);
		 $address = $_POST['address'];
     $email = $_POST['email'];
     $password = $_POST['password'];
     $cuisine = $_POST['cuisine'];
     $food = $_POST['food'];
     $foodservice = $_POST['foodservice'];
     $food_items = serialize($_POST['food_items']);
		 $special_requirements =$_POST['special_requirements'];
     $other_special_requirements =$_POST['other_special_requirements'];
     $budget = $_POST['budget'];
     $delivery_option = $_POST['delivery_option'];
     $extras = serialize($_POST['extras']);
     $comments = $_POST['comments'];
     $name = $_POST['name'];
     $contact_number = $_POST['contact_number'];
     $canContact = $_POST['canContact'];
		 $customer_address = $_POST['customer_address'];
		 //$customer_type = $_POST['customer_type'];
     $clientCategory = $_POST['clientCategory'];
     $eventType = $_POST['eventType'];
		 //$about_event = $_POST['about_event'];
     $estimated_timings = $_POST['estimated_timings'];
     $number_of_guests = $_POST['number_of_guests'];
     $number_of_children = $_POST['number_of_children'];
     $payment_term = $_POST['payment_term'];
     $booking_timeline = $_POST['booking_timeline'];


		$sql = "INSERT INTO customers set email='$email',password='$password',address='$address',
		cuisine='$cuisine',food_type='$food',	food_service='$foodservice',food_items='$food_items',
		special_requirements='$special_requirements',other_special_requirements='$other_special_requirements',
		budget='$budget',
		delivery_options='$delivery_option',extras='$extras',comments='$comments',name='$name',
		contact_number='$contact_number',customer_address='$customer_address',
		canContact='$canContact',customer_type='$clientCategory',is_birthday_wish='',
		about_event='$eventType',event_date='',
		estimated_timings='$estimated_timings',number_of_guests='$number_of_guests',
		number_of_children='$number_of_children',payment_option='$payment_term',
		booking_timeline='$booking_timeline'";
		if (!$this->db->query($sql)) {
			    echo "FALSE";
			}
			else {
			    echo "TRUE";
			}
	}



}
