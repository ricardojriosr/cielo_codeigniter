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
        $data=$this->person_model->save_person();
        echo json_encode($data);
    }

    function update(){
        $data=$this->person_model->update_person();
        echo json_encode($data);
    }

    function delete(){
        $data=$this->person_model->delete_person();
        echo json_encode($data);
    }
}
?>
