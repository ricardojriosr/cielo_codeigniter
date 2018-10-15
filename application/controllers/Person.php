<?php
class Person extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('person_model');
    }
    function index(){
        $this->load->view('person_view');
    }

    function person_data(){
        $data=$this->person_model->person_list();
        echo json_encode($data);
    }

    function save(){
        if ($this->validateFields()) {
            $data=$this->person_model->save_person();
            echo json_encode($data);
        }
    }

    function update(){
        if ($this->validateFields()) {
            $data=$this->person_model->update_person();
            echo json_encode($data);
        }
    }

    function delete(){
        $data=$this->person_model->delete_person();
        echo json_encode($data);
    }

    function validateFields() {
        $responseValidation = true;
        $errorsValidations = array();
        $p_name =  $this->input->post('person_name');
        $p_dob = $this->input->post('person_dob');
        $p_email = $this->input->post('person_email');
        $p_favorite = $this->input->post('person_favorite_color');
        if ($p_name == "") {
            array_push($errorsValidations,"A name is Required");
        } else {
            if (strlen($p_name) < 4) {
                array_push($errorsValidations, "A name requires more than 3 characters");
            }
        }
        if ($p_dob == "") {
            array_push($errorsValidations, "A Date of Birth is Required");
        }
        if ($p_email == "") {
            array_push($errorsValidations, "An email is Required");
        } else {
            if (!$this->isValidEmail($p_email)) {
                array_push($errorsValidations, "A valid Email is Required");
            }
        }
        if ($p_favorite == "") {
            array_push($errorsValidations, "A Favorite Color is Required");
        } else {
            if (strlen($p_favorite) < 3) {
                array_push($errorsValidations, "A favorite color requires more than 2 characters");
            }
        }
        if (count($errorsValidations) > 0) {
            $responseValidation = false;
            $data['custom_errors'] = $errorsValidations;
            $this->load->view('person_view', $data);
        }
        return $responseValidation;
    }

    function isValidEmail($email){
        return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }
}
?>
