<?php
//header('Access-Control-Allow-Origin: *');
require APPPATH . 'libraries/Format.php';
require APPPATH . 'libraries/RestController.php';
use chriskacerguis\RestServer\RestController;
defined('BASEPATH') OR exit('No direct script access allowed');
class WebApi extends RestController {
    public $reset_token=null;

   function __construct() {
        parent::__construct();
       $this->load->model('web_model'); 
       $this->load->helper(array('token_helper'));
    //     // $this->chat_logo_path = base_url() . "assets/images/chatlogo/";
    //     // $this->chat_icon_theme = base_url() . "assets/images/";
    //     // $this->allowedFile =  array('png','jpg','jpeg');
    //     // $this->fileUploadSize = 2048000;
     }
    
    public function login_post() {
        if(verify_user()){
            $data1['status']='true';
            $data1['message']='You already been Logged In Successfully !'; 
        }else{
            $data1 = array();
            $data['customer_email']    = trim($_REQUEST['email']);
            $data['customer_password'] = md5(trim($_REQUEST['password']));// print_r($data); die;
                $result = $this->web_model->get_customer_info($data);
                if ($result) {
                    $reset_token = insert_refresh_token($data);
                    $data1['status']='true';
                    $data1['message']='Logged In Successfully !';
            }else{
                    $data1['status']='false';
                    $data1['message']='Either E-mail or Password incorrect !';
            }
        }
        echo json_encode($data1);
    }
    public function logout_post(){
        if(verify_user()){
            $this->load->helper(array('token'));
            $data['reset_token']=$reset_token;
            delete_refresh_token($data);
            $reset_token = null;
            $data1['status']='true';
            $data1['message']='You Logged Out Successfully !';
        }else{
            $data1['status']='false';
            $data1['message']='You already been Logged Out !';
        }
        echo json_encode($data1);
    }
    public function customerRegister_post()
    {
        $data                      = array();
        $data['customer_name']     = trim($_REQUEST['customer_name']);
        $data['customer_email']    = trim($_REQUEST['customer_email']);
        $data['customer_password'] = md5(trim($_REQUEST['customer_password']));
        $data['customer_address']  = trim($_REQUEST['customer_address']);
        $data['customer_city']     = trim($_REQUEST['customer_city']);
        $data['customer_country']  = trim($_REQUEST['customer_country']);
        $data['customer_phone']    = trim($_REQUEST['customer_phone']);
        $data['customer_zipcode']  = trim($_REQUEST['customer_zipcode']);

        $this->form_validation->set_rules('customer_name', 'Customer Name', 'trim|required');
        $this->form_validation->set_rules('customer_email', 'Customer Email', 'trim|required|valid_email|is_unique[tbl_customer.customer_email]');
        $this->form_validation->set_rules('customer_password', 'Customer Password', 'trim|required');
        $this->form_validation->set_rules('customer_address', 'Customer Address', 'trim|required');
        $this->form_validation->set_rules('customer_city', 'Customer City', 'trim|required');
        $this->form_validation->set_rules('customer_country', 'Customer Country', 'trim|required');
        $this->form_validation->set_rules('customer_phone', 'Customer Phone', 'trim|required');
        $this->form_validation->set_rules('customer_zipcode', 'Customer Zipcode', 'trim|required');

        if ($this->form_validation->run() == true) {
            $result = $this->web_model->save_customer_info($data);
            if ($result) {
                $this->session->set_flashdata('customer_name', $data['customer_name']);
                $this->session->set_flashdata('customer_email', $data['customer_email']);
                redirect('register/success');
            } else {
                $this->session->set_flashdata('message', 'Customer Registration Fail');
            }
        } else {
            print_r(validation_errors());
        }
    }

}
?>