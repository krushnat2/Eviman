<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Common extends BD_Controller {
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->auth();
        $this->load->model('M_common');
    }
	
    //User type details fetch
	public function userstype_get()
	{
       $userstype= $this->M_common->get_user_type()->result(); 
          if ($userstype)
            {
                // Set the response and exit
                $this->response($userstype, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
            }
            else
            {
                // Set the response and exit
                $this->response([
                    'status' => FALSE,
                    'message' => 'No users type were found'
                ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
            }
        
	}
//User status details fetch
    public function userstatus_get()
    {
       $userstatus= $this->M_common->get_user_status()->result(); 
          if ($userstatus)
            {
                // Set the response and exit
                $this->response($userstatus, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
            }
            else
            {
                // Set the response and exit
                $this->response([
                    'status' => FALSE,
                    'message' => 'No users status were found'
                ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
            }
        
    }

    //Vehicle brand details fetch
    public function vehicle_brand_get()
    {
       $userstatus= $this->M_common->get_vehicle_brand()->result(); 
          if ($userstatus)
            {
                // Set the response and exit
                $this->response($userstatus, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
            }
            else
            {
                // Set the response and exit
                $this->response([
                    'status' => FALSE,
                    'message' => 'No Vehicle brand were found'
                ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
            }
        
    }

    //Vehicle Model details fetch
    public function vehicle_model_get()
    {
       $userstatus= $this->M_common->get_vehicle_model()->result(); 
          if ($userstatus)
            {
                // Set the response and exit
                $this->response($userstatus, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
            }
            else
            {
                // Set the response and exit
                $this->response([
                    'status' => FALSE,
                    'message' => 'No Vehicle Model were found'
                ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
            }
        
    }

     //Vehicle Status details fetch
    public function vehicle_status_get()
    {
       $userstatus= $this->M_common->get_vehicle_status()->result(); 
          if ($userstatus)
            {
                // Set the response and exit
                $this->response($userstatus, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
            }
            else
            {
                // Set the response and exit
                $this->response([
                    'status' => FALSE,
                    'message' => 'No Vehicle Status were found'
                ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
            }
        
    }
     //Vehicle Model details fetch
    public function vehicle_type_get()
    {
       $userstatus= $this->M_common->get_vehicle_type()->result(); 
          if ($userstatus)
            {
                // Set the response and exit
                $this->response($userstatus, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
            }
            else
            {
                // Set the response and exit
                $this->response([
                    'status' => FALSE,
                    'message' => 'No Vehicle Type were found'
                ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
            }
        
    }


    

}
