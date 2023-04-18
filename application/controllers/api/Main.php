<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends BD_Controller {
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->auth();
        $this->load->model('M_main');
    }
	
	public function test_post()
	{
       
         $theCredential = $this->user_data;
        $this->response($theCredential, 200); // OK (200) being the HTTP response code
        
	}

    public function users_get()
    {
        // Users from a data store e.g. database
        /*$users = [
            ['id' => 1, 'name' => 'John', 'email' => 'john@example.com', 'fact' => 'Loves coding'],
            ['id' => 2, 'name' => 'Jim', 'email' => 'jim@example.com', 'fact' => 'Developed on CodeIgniter'],
            ['id' => 3, 'name' => 'Jane', 'email' => 'jane@example.com', 'fact' => 'Lives in the USA', ['hobbies' => ['guitar', 'cycling']]],
        ];*/
        $users= $this->M_main->get_users()->result(); 

        $id = $this->get('id');

        // If the id parameter doesn't exist return all the users

        if ($id === NULL)
        {
            // Check if the users data store contains users (in case the database result returns NULL)
            if ($users)
            {
                // Set the response and exit
                $this->response($users, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
            }
            else
            {
                // Set the response and exit
                $this->response([
                    'status' => FALSE,
                    'message' => 'No users were found'
                ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
            }
        }

        // Find and return a single record for a particular user.

        $id = (int) $id;

        // Validate the id.
        if ($id <= 0)
        {
            // Invalid id, set the response and exit.
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // BAD_REQUEST (400) being the HTTP response code
        }

        // Get the user from the array, using the id as key for retrieval.
        // Usually a model is to be used for this.

        $user = NULL;

        if (!empty($users))
        {
            foreach ($users as $key => $value)
            {
                if (isset($value['id']) && $value['id'] === $id)
                {
                    $user = $value;
                }
            }
        }

        if (!empty($user))
        {
            $this->set_response($user, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
        }
        else
        {
            $this->set_response([
                'status' => FALSE,
                'message' => 'User could not be found'
            ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
        }
    }

    public function users_delete()
    {
        $id = (int) $this->get('id');

        // Validate the id.
        if ($id <= 0)
        {
            // Set the response and exit
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // BAD_REQUEST (400) being the HTTP response code
        }

        // $this->some_model->delete_something($id);
        $message = [
            'id' => $id,
            'message' => 'Deleted the resource'
        ];

        $this->set_response($message, REST_Controller::HTTP_NO_CONTENT); // NO_CONTENT (204) being the HTTP response code
    }
//User details fetch from db
    public function user_details_get()
    {
        
        $users= $this->M_main->get_user_details()->result(); 

        $id = $this->get('id');

        // If the id parameter doesn't exist return all the users

        if ($id === NULL)
        {
            // Check if the users data store contains users (in case the database result returns NULL)
            if ($users)
            {
                // Set the response and exit
                $this->response($users, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
            }
            else
            {
                // Set the response and exit
                $this->response([
                    'status' => FALSE,
                    'message' => 'No users details were found'
                ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
            }
        }

        // Find and return a single record for a particular user.

        $id = (int) $id;

        // Validate the id.
        if ($id <= 0)
        {
            // Invalid id, set the response and exit.
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // BAD_REQUEST (400) being the HTTP response code
        }

        // Get the user from the array, using the id as key for retrieval.
        // Usually a model is to be used for this.

        $user = NULL;

        if (!empty($users))
        {
            foreach ($users as $key => $value)
            {
                if (isset($value['id']) && $value['id'] === $id)
                {
                    $user = $value;
                }
            }
        }

        if (!empty($user))
        {
            $this->set_response($user, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
        }
        else
        {
            $this->set_response([
                'status' => FALSE,
                'message' => 'User details could not be found'
            ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
        }
    }
//Driver details fetch from db
    public function drivers_get()
    {
        
        $users= $this->M_main->get_drivers()->result(); 

        $id = $this->get('id');

        // If the id parameter doesn't exist return all the users

        if ($id === NULL)
        {
            // Check if the users data store contains users (in case the database result returns NULL)
            if ($users)
            {
                // Set the response and exit
                $this->response($users, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
            }
            else
            {
                // Set the response and exit
                $this->response([
                    'status' => FALSE,
                    'message' => 'No Drivers were found'
                ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
            }
        }

        // Find and return a single record for a particular user.

        $id = (int) $id;

        // Validate the id.
        if ($id <= 0)
        {
            // Invalid id, set the response and exit.
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // BAD_REQUEST (400) being the HTTP response code
        }

        // Get the user from the array, using the id as key for retrieval.
        // Usually a model is to be used for this.

        $user = NULL;

        if (!empty($users))
        {
            foreach ($users as $key => $value)
            {
                if (isset($value['id']) && $value['id'] === $id)
                {
                    $user = $value;
                }
            }
        }

        if (!empty($user))
        {
            $this->set_response($user, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
        }
        else
        {
            $this->set_response([
                'status' => FALSE,
                'message' => 'Driver could not be found'
            ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
        }
    }

    //Driver vehicle  details fetch from db
    public function drivers_vehicle_get()
    {
        
        $users= $this->M_main->get_drivers_vehicle()->result(); 

        $id = $this->get('id');

        // If the id parameter doesn't exist return all the users

        if ($id === NULL)
        {
            // Check if the users data store contains users (in case the database result returns NULL)
            if ($users)
            {
                // Set the response and exit
                $this->response($users, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
            }
            else
            {
                // Set the response and exit
                $this->response([
                    'status' => FALSE,
                    'message' => 'No Drivers vehicles were found'
                ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
            }
        }

        // Find and return a single record for a particular user.

        $id = (int) $id;

        // Validate the id.
        if ($id <= 0)
        {
            // Invalid id, set the response and exit.
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // BAD_REQUEST (400) being the HTTP response code
        }

        // Get the user from the array, using the id as key for retrieval.
        // Usually a model is to be used for this.

        $user = NULL;

        if (!empty($users))
        {
            foreach ($users as $key => $value)
            {
                if (isset($value['id']) && $value['id'] === $id)
                {
                    $user = $value;
                }
            }
        }

        if (!empty($user))
        {
            $this->set_response($user, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
        }
        else
        {
            $this->set_response([
                'status' => FALSE,
                'message' => 'Driver vehicle could not be found'
            ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
        }
    }

    //user details save data by krushna
    public function user_deatils_post()
    {
        $user_id = $this->post('user_id'); 
        $additionalinfo = $this->post('additionalinfo'); 

        $data['user_id']=$user_id;
        $data['additionalinfo']=$additionalinfo;
        
         if($this->M_main->user_deatils_insert($data))
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
    //driver details save data
    public function driver_deatils_post()
    {
        $user_id = $this->post('user_id'); 
        $additionalinfo = $this->post('additionalinfo'); 

        $data['user_id']=$user_id;
        $data['additionalinfo']=$additionalinfo;
        
         if($this->M_main->driver_deatils_insert($data))
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

    //driver vehicle details save data
    public function driver_vehicle_deatils_post()
    {

        $data['driver_id']=$this->post('driver_id');
        $data['vehicle_model_id']=$this->post('vehicle_model_id');
        $data['regd_number']=$this->post('regd_number');
        $data['regd_date']=$this->post('regd_date');
        $data['engine_number']=$this->post('engine_number');
        $data['chasis_number']=$this->post('chasis_number');
        $data['polution_valid_upto']=$this->post('polution_valid_upto');
        $data['regd_expiry_date']=$this->post('regd_expiry_date');
        $data['insurance_valid_upto']=$this->post('insurance_valid_upto');
        $data['vehicle_image']=$this->post('vehicle_image');
        $data['vehicle_colour']=$this->post('vehicle_colour');
        $data['created_by']=$this->post('created_by');
        $data['created_at']=$this->post('created_at');
        $data['vehicle_status_id']=$this->post('vehicle_status_id');
        
         if($this->M_main->driver_vehicle_deatils_insert($data))
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

//Change user status
    public function users_status_update_put()
    {
        $id = (int) $this->put('id');
        $data['user_status_id']=$this->put('user_status_id');

        // Validate the id.
        if ($id <= 0)
        {
            // Set the response and exit
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // BAD_REQUEST (400) being the HTTP response code
        }
        else{

            if ($data['user_status_id'])
            {
               $update = $this->M_main->user_status_update($data, $id);
                if($update)
                {
                    $details = ['status' => TRUE,'message' => 'status update successfully'];
                    $this->set_response($details, REST_Controller::HTTP_OK);  // OK (200) being the HTTP response code
                }
                else{
                     $this->response([
                    'status' => FALSE,
                    'message' => 'Could not update the user status'
                ], REST_Controller::HTTP_INTERNAL_SERVER_ERROR); // INTERNAL_SERVER_ERROR (500) being the HTTP response code
                }
            }
            else
            {
                // Set the response and exit
                $this->response([
                    'status' => FALSE,
                    'message' => 'No status data found'
                ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
            }
            
            
        }

        

    }

    //Change driver vehicle status
    public function driver_vehicle_status_update_put()
    {
        $id = (int) $this->put('id');
        $data['vehicle_status_id']=$this->put('vehicle_status_id');

        // Validate the id.
        if ($id <= 0)
        {
            // Set the response and exit
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // BAD_REQUEST (400) being the HTTP response code
        }
        else{

            if ($data['vehicle_status_id'])
            {
               $update = $this->M_main->driver_vehicle_status_update($data, $id);
                // $this->some_model->update_something($id);
                if($update)
                {
                    $details = ['status' => TRUE,'message' => 'status update successfully'];
                    $this->set_response($details, REST_Controller::HTTP_OK);  // OK (200) being the HTTP response code
                }
                else{
                     $this->response([
                    'status' => FALSE,
                    'message' => 'Could not update the user status'
                ], REST_Controller::HTTP_INTERNAL_SERVER_ERROR); // INTERNAL_SERVER_ERROR (500) being the HTTP response code
                }
            }
            else
            {
                // Set the response and exit
                $this->response([
                    'status' => FALSE,
                    'message' => 'No status data found'
                ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
            }
            
            
        }

        

    }

    //Change user status
    public function users_status_update_by_uid_put()
    {
        $id = (int) $this->put('user_id');
        $data['user_status_id']=$this->put('user_status_id');

        // Validate the id.
        if ($id <= 0)
        {
            // Set the response and exit
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // BAD_REQUEST (400) being the HTTP response code
        }
        else{

            if ($data['user_status_id'])
            {
               $update = $this->M_main->user_status_update_by_userid($data, $id);
                if($update)
                {
                    $details = ['status' => TRUE,'message' => 'status update successfully'];
                    $this->set_response($details, REST_Controller::HTTP_OK);  // OK (200) being the HTTP response code
                }
                else{
                     $this->response([
                    'status' => FALSE,
                    'message' => 'Could not update the user status'
                ], REST_Controller::HTTP_INTERNAL_SERVER_ERROR); // INTERNAL_SERVER_ERROR (500) being the HTTP response code
                }
            }
            else
            {
                // Set the response and exit
                $this->response([
                    'status' => FALSE,
                    'message' => 'No status data found'
                ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
            }
            
            
        }

        

    }

    //Change driver vehicle status by driver id
    public function driver_vehicle_status_update_bydid_put()
    {
        $id = (int) $this->put('driver_id');
        $data['vehicle_status_id']=$this->put('vehicle_status_id');

        // Validate the id.
        if ($id <= 0)
        {
            // Set the response and exit
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // BAD_REQUEST (400) being the HTTP response code
        }
        else{

            if ($data['vehicle_status_id'])
            {
               $update = $this->M_main->driver_vehicle_status_update_by_driverid($data, $id);
                // $this->some_model->update_something($id);
                if($update)
                {
                    $details = ['status' => TRUE,'message' => 'status update successfully'];
                    $this->set_response($details, REST_Controller::HTTP_OK);  // OK (200) being the HTTP response code
                }
                else{
                     $this->response([
                    'status' => FALSE,
                    'message' => 'Could not update the user status'
                ], REST_Controller::HTTP_INTERNAL_SERVER_ERROR); // INTERNAL_SERVER_ERROR (500) being the HTTP response code
                }
            }
            else
            {
                // Set the response and exit
                $this->response([
                    'status' => FALSE,
                    'message' => 'No status data found'
                ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
            }
            
            
        }

        

    }

     // user update data by id
    public function user_update_data_put()
    {
        $id = (int) $this->put('id');

         // Validate the id.
        if ($id <= 0)
        {
            // Set the response and exit
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // BAD_REQUEST (400) being the HTTP response code
        }
        else{

            
            $data['user_mobile']=$this->put('user_mobile');
            $data['user_mail']=$this->put('user_mail');
            $data['user_dob']=$this->put('user_dob');
            $data['user_logo']=$this->put('user_logo');
            $data['user_address']=$this->put('user_address');
            $data['user_image']=$this->put('user_image');
            $data['user_gender']=$this->put('user_gender');
            $data['user_state']=$this->put('user_state');
            $data['user_city']=$this->put('user_city');
            $data['user_lat']=$this->put('user_lat');
            $data['user_lang']=$this->put('user_lang');
            
             if($this->M_main->user_data_update($data,$id))
             {
                $details = ['status' => TRUE,'message' => 'user data update successfully'];
                $this->set_response($details, REST_Controller::HTTP_OK);  // OK (200) being the HTTP response code
            }
            else{
                $this->response([
                    'status' => FALSE,
                    'message' => 'Could not update the data'
                ], REST_Controller::HTTP_INTERNAL_SERVER_ERROR); // INTERNAL_SERVER_ERROR (500) being the HTTP response code
            }
        }
        
        
    }

    //user details save data by krushna
    public function user_deatils_update_put()
    {
        $id = (int) $this->put('id');

         // Validate the id.
        if ($id <= 0)
        {
            // Set the response and exit
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // BAD_REQUEST (400) being the HTTP response code
        }
        else{
            $user_id = $this->put('user_id'); 
            $additionalinfo = $this->put('additionalinfo'); 

            $data['user_id']=$user_id;
            $data['additionalinfo']=$additionalinfo;
            
             if($this->M_main->user_deatils_update($data,$id))
             {
                $details = ['status' => TRUE,'message' => 'user details update successfully'];
                $this->set_response($details, REST_Controller::HTTP_OK);  // OK (200) being the HTTP response code
            }
            else{
                $this->response([
                    'status' => FALSE,
                    'message' => 'Could not update the data'
                ], REST_Controller::HTTP_INTERNAL_SERVER_ERROR); // INTERNAL_SERVER_ERROR (500) being the HTTP response code
            }
        }
        
        
    }
    //driver details save data
    public function driver_deatils_update_put()
    {
        $id = (int) $this->put('id');

         // Validate the id.
        if ($id <= 0)
        {
            // Set the response and exit
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // BAD_REQUEST (400) being the HTTP response code
        }
        else{
            $user_id = $this->put('user_id'); 
            $additionalinfo = $this->put('additionalinfo'); 

            $data['user_id']=$user_id;
            $data['additionalinfo']=$additionalinfo;
            
             if($this->M_main->driver_deatils_insert($data))
             {
                $details = ['status' => TRUE,'message' => 'driver details update successfully'];
                $this->set_response($details, REST_Controller::HTTP_OK);  // OK (200) being the HTTP response code
            }
            else{
                $this->response([
                    'status' => FALSE,
                    'message' => 'Could not update the data'
                ], REST_Controller::HTTP_INTERNAL_SERVER_ERROR); // INTERNAL_SERVER_ERROR (500) being the HTTP response code
            }
        }
        
        
    }

    //driver vehicle details update data
    public function driver_vehicle_update_put()
    {
        $id = (int) $this->put('id');

         // Validate the id.
        if ($id <= 0)
        {
            // Set the response and exit
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // BAD_REQUEST (400) being the HTTP response code
        }
        else{

            $data['driver_id']=$this->put('driver_id');
            $data['vehicle_model_id']=$this->put('vehicle_model_id');
            $data['regd_number']=$this->put('regd_number');
            $data['regd_date']=$this->put('regd_date');
            $data['engine_number']=$this->put('engine_number');
            $data['chasis_number']=$this->put('chasis_number');
            $data['polution_valid_upto']=$this->put('polution_valid_upto');
            $data['regd_expiry_date']=$this->put('regd_expiry_date');
            $data['insurance_valid_upto']=$this->put('insurance_valid_upto');
            $data['vehicle_image']=$this->put('vehicle_image');
            $data['vehicle_colour']=$this->put('vehicle_colour');
            $data['created_by']=$this->put('created_by');
            $data['created_at']=$this->put('created_at');
            $data['vehicle_status_id']=$this->put('vehicle_status_id');
            
             if($this->M_main->driver_vehicle_deatils_insert($data))
             {
                $details = ['status' => TRUE,'message' => 'driver vehicle details update successfully'];
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


}
