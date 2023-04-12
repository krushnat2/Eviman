<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends REST_Controller {
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->model('M_main');
    }

	
    //driver user create save data
    public function driver_user_create_post()
    {

        $data['user_type_id']='3';
        $data['user_name']=$this->post('user_name');
        $data['password']=sha1($this->post('password'));
        $data['user_mobile']=$this->post('user_mobile');
        $data['user_mail']=$this->post('user_mail');
        $data['user_dob']=$this->post('user_dob');
        $data['user_logo']=$this->post('user_logo');
        $data['user_address']=$this->post('user_address');
        $data['user_image']=$this->post('user_image');
        $data['user_gender']=$this->post('user_gender');
        $data['user_state']=$this->post('user_state');
        $data['user_city']=$this->post('user_city');
        $data['user_lat']=$this->post('user_lat');
        $data['user_lang']=$this->post('user_lang');
        $data['user_status_id']=$this->post('user_status_id');
        
         if($this->M_main->user_registeration_insert($data))
         {
            $details = ['status' => TRUE,'message' => 'Insert successfully'];
            $this->set_response($details, REST_Controller::HTTP_OK);  // OK (200) being the HTTP response code
        }
        else{
            $this->response([
                'status' => FALSE,
                'message' => 'Could not save the data'
            ], REST_Controller::HTTP_INTERNAL_SERVER_ERROR); // INTERNAL_SERVER_ERROR (500) being the HTTP response code
        }
        
        
    }
    //Customer user create save data
    public function customer_user_create_post()
    {

        $data['user_type_id']='2';
        $data['user_name']=$this->post('user_name');
        $data['password']=sha1($this->post('password'));
        $data['user_mobile']=$this->post('user_mobile');
        $data['user_mail']=$this->post('user_mail');
        $data['user_dob']=$this->post('user_dob');
        $data['user_logo']=$this->post('user_logo');
        $data['user_address']=$this->post('user_address');
        $data['user_image']=$this->post('user_image');
        $data['user_gender']=$this->post('user_gender');
        $data['user_state']=$this->post('user_state');
        $data['user_city']=$this->post('user_city');
        $data['user_lat']=$this->post('user_lat');
        $data['user_lang']=$this->post('user_lang');
        $data['user_status_id']=$this->post('user_status_id');
        
         if($this->M_main->user_registeration_insert($data))
         {
            $details = ['status' => TRUE,'message' => 'Insert successfully'];
            $this->set_response($details, REST_Controller::HTTP_OK);  // OK (200) being the HTTP response code
        }
        else{
            $this->response([
                'status' => FALSE,
                'message' => 'Could not save the data'
            ], REST_Controller::HTTP_INTERNAL_SERVER_ERROR); // INTERNAL_SERVER_ERROR (500) being the HTTP response code
        }
        
        
    }

}
