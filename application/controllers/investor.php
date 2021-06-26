<?php
defined('BASEPATH') OR exit('No direct script access allowed');
ini_set('display_errors', 0);
ini_set('display_startup_errors', 1);
error_reporting(0);

class Investor extends CI_Controller {

    public $front="";
    public $back="";
#Constructor
    public function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/Kuwait');
        //$this->load->model('Usermodel');
    }
#Function to call index page
    public function index(){
    
        $this->load->view('index');
    }


    

# Logout users
	public function logout() {
	    $this->checkLogin();
		$this->session->sess_destroy();
		return redirect('../Users/index');
	}
}
