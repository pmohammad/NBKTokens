<?php
defined('BASEPATH') OR exit('No direct script access allowed');
ini_set('display_errors', 'ON');
error_reporting(1);

class Company extends CI_Controller {

    
#Constructor
    public function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/Kuwait');
        //$this->load->model('Usermodel');
    }
#Function to call index page
    public function index(){
        $this->load->view('CompanyViews/index');
    }


# Function to verify USers
	function checkLogin() {
	    if(!$this->session->is_user) {
			# Okay, you ain't clear to go, back to login now
			$this->session->set_flashdata('error',"Session Expired");
			return redirect('Company/index');
		}
	}

#Function to register company
    public function register_company(){
        $this->load->library('form_validation');
        $data['registrar_name'] = $_POST['pname'];
        $data['username'] = $_POST['uname'];
        $data['email_id'] = $_POST['bemail'];
        $data['mobile_number'] = $_POST['mnumber'];
        $data['civilid_number'] = $_POST['civilno'];
        $data['company_name'] = $_POST['bname'];
        $pass = $_POST['password'];
        $data['password'] = sha1($pass);
        $data['status'] = 1;
        
        $path = realpath(APPPATH.'../user-assets/ljhkbn/');
        if($_FILES['comm_lic']['name']!=""){
            $config['upload_path'] = $path;
    		$config['allowed_types'] = 'jpg|png|jpeg';
    		$config['remove_spaces'] = true;
    		$this->load->library('upload');
            $this->upload->initialize($config);
		    if(!$this->upload->do_upload('comm_lic')) {
		        $this->session->set_flashdata('type', 'danger');
			    $this->session->set_flashdata('error', 'Commercial License Image Upload Failed');
		    } else {
		        $this->upload->data();
			    $data['commercial_license'] = $this->upload->data('file_name');
		    }
        }
        
    	if($data['commercial_license']==''){
    	    $this->session->set_flashdata('error', 'Files are not uploaded correctly.. Please try again.');
    	    return redirect('../NBKTokens/Company/index');
    	}else{
        	$query = $this->db->insert('company_registration', $data);
        	$message = $this->db->error();
        	if($query){
        	    $this->session->set_flashdata('message', 'Your response is added. You can start your listing.');
        	    return redirect('../NBKTokens/Company/index');
        	}else{
        	    $this->session->set_flashdata('error', $message['message']);
        	    return redirect('../NBKTokens/Company/index');
        	}
    	}
    }


#Function to do login 
    public function login_company(){
        $email = $this->input->post('uname');
        $pass = sha1($this->input->post('password'));
        $validate = $this->db->where('username', $email)->where('password', $pass)->where('status', 1)->get('company_registration');
        $rows = $validate->num_rows();
        if($rows==1){
            $data = $validate->row_array();
			$this->session->set_userdata('company_id',$data['company_id']);
            $this->session->set_userdata('is_user', true);
            return redirect('../NBKTokens/Company/dashboard');
        }else{
            $this->session->set_flashdata('error',"Wrong Credentials");
            return redirect('../NBKTokens/Company/index');
        }
    }

#Function to get dashboard
    public function dashboard(){
        $this->checkLogin();
        $this->load->view('CompanyViews/dashboard');
    }
    

#Function to create listing
    public function create_listing(){
        $this->checkLogin();
        $this->load->view('CompanyViews/create-listing');
    }

#Function to add listing
    public function add_list(){
        $this->checkLogin();
        $this->load->library('form_validation');
        $data['company_id'] = $this->session->company_id;
        $data['username'] = $_POST['fname'];
        $data['mobile'] = $_POST['phone'];
        $data['email'] = $_POST['email'];
        $data['civilid'] = $_POST['civilno'];
        $data['current_valuation'] = $_POST['com_val'];
        $data['expected_funding'] = $_POST['fund_amt'];
        $data['bid_amount'] = $_POST['bid_amt'];
        $data['min_share'] = $_POST['min_share'];
        $data['max_share'] = $_POST['max_share'];
        $data['bid_dt'] = $_POST['bid_date'];
        $data['expiry_dt'] = $_POST['end_date'];
        $data['status'] = 1;
        
        $path = realpath(APPPATH.'../user-assets/ljhkbn/');
        if($_FILES['image']['name']!=""){
            $config['upload_path'] = $path;
    		$config['allowed_types'] = 'jpg|png|jpeg';
    		$config['remove_spaces'] = true;
    		$this->load->library('upload');
            $this->upload->initialize($config);
		    if(!$this->upload->do_upload('image')) {
		        $this->session->set_flashdata('type', 'danger');
			    $this->session->set_flashdata('error', 'Listing Image upload failed');
		    } else {
		        $this->upload->data();
			    $data['list_img'] = $this->upload->data('file_name');
		    }
        }
        
    	if($data['list_img']==''){
    	    $this->session->set_flashdata('error', 'Files are not uploaded correctly.. Please try again.');
    	    return redirect('../NBKTokens/Company/create_listing');
    	}else{
        	$query = $this->db->insert('company_listings', $data);
        	$message = $this->db->error();
        	if($query){
        	    $this->session->set_flashdata('message', 'Your Listing is added and it will start on time.');
        	    return redirect('../NBKTokens/Company/create_listing');
        	}else{
        	    $this->session->set_flashdata('error', $message['message']);
        	    return redirect('../NBKTokens/Company/create_listing');
        	}
    	}
    }
    

#Function to get listing status
    public function listing_status(){
        $this->checkLogin();
        $res = $this->db->where('company_id',$this->session->company_id)->get('company_listings');
        $data['members'] = $res->result_array();
        $this->load->view('CompanyViews/listing-status',$data);
    }

# Logout users
	public function logout() {
	    $this->checkLogin();
		$this->session->sess_destroy();
		return redirect('../Users/index');
	}
}
