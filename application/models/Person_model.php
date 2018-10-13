<?php
class Person_model extends CI_Model{

    function person_list(){
        $hasil=$this->db->get('person');
        return $hasil->result();
    }

    function save_person(){
        $data = array(
                'name'  => $this->input->post('person_name'),
                'DOB' => $this->input->post('person_dob'),
                'email' => $this->input->post('person_email'),
                'favorite_color' => $this->input->post('person_favorite_color'),
            );
        $result=$this->db->insert('person',$data);
        return $result;
    }

    function update_person(){
        $person_id=$this->input->post('person_id');
        $person_name=$this->input->post('person_name');
        $person_dob=$this->input->post('person_dob');
        $person_email=$this->input->post('person_email');
        $person_favorite=$this->input->post('person_favorite_color');

        $this->db->set('name', $person_name);
        $this->db->set('DOB', $person_dob);
        $this->db->set('email', $person_email);
        $this->db->set('favorite_color', $person_favorite);
        $this->db->where('id', $person_id);
        $result=$this->db->update('person');
        //return $result;
        return json_encode(array(
            'id' => $person_id,
            'name' => $person_name,
            'DOB' => $person_dob,
            'email' => $person_email,
            'favorite' => $person_favorite
        ));
    }

    function delete_person(){
        $person_code=$this->input->post('person_id');
        $this->db->where('id', $person_code);
        $result=$this->db->delete('person');
        return $result;
    }

}
?>
