<?php 
 class User extends CI_controller{
    function index(){
        // Load the User_model
        $this->load->model('User_model');
        // Retrieve all users from the model
        $users = $this->User_model->all();
         // Prepare data to pass to the view
        $data=array();
        $data['users']=$users;
        $this->load->view('list', $data);
    }
    function create(){
        $this->load->model('User_model');
        $this->form_validation->set_rules('name','Name','required');
        // $this->form_validation->set_rules('email','Email','required valid_email');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');


        if($this->form_validation->run()== false){
            $this->load->view('create');
        } else{
            // save user data to database
            $formArray=array();
            $formArray['name']=$this->input->post('name');
            $formArray['email']=$this->input->post('email');
            $formArray['created_at'] = date('Y-m-d');
            $this->User_model->create($formArray);
            $this->session->set_flashdata('success','Record added successfully!');
            redirect(base_url().'index.php/user/index');
        }    
         
    }

    function edit($userid){
        // Load the User_model
        $this->load->model('User_model');
         // Retrieve the user data from the model
        $user= $this->User_model->getUser($userid);
        // Initialize data array
        $data=array();
        // Assign the user data to the 'user' key in the data array
        $data['user']=$user;

        $this->form_validation->set_rules('name','Name','required');
        // $this->form_validation->set_rules('email','Email','required valid_email');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');

        if(  $this->form_validation->run()==false){
            $this->load->view('edit',$data);
        }else{
            //  update user record
            $formArray=array();
            $formArray['name']= $this->input->post('name');
            $formArray['email']= $this->input->post('email');
            $this->User_model->updateUser($userid,$formArray);
            $this->session->set_flashdata('success','Record updated successfully');
            redirect(base_url().'index.php/user/index');
        }

       
    }

    function delete($userId){
        $this->load->model("User_model");
        $this->User_model->getUser($userId);

        if(empty($userId)){
            $this->session->set_flashdata('failure','Record not found in database');
            redirect(base_url().'index.php/user/index');
        }

        $this->User_model->deleteUser($userId);
        $this->session->set_flashdata('success','Record deleted successfully');
        redirect(base_url().'index.php/user/index');
        
    }
 }
?>