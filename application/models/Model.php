<?php

class Model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
        $this->load->library("session");
    }
    
    public function getData() {
        return $this->session->userdata("user");
    }
    
    public function delete() {
        $this->session->unset_userdata("user");
       // $this->session->sess_destroy();
    }
    
    public function addItem($item) {
        $arr = $this->getData();
        if (empty($arr)) {
            $arr = array();
            $item["id"] = 1;
        }
        else {
            $last = $arr[count($arr)-1];
            $item["id"] = $last["id"] + 1;
        }
        array_push($arr, $item);
        $this->session->set_userdata("user", $arr);
    }
    
    public function getById($id) {
        $arr = $this->getData();
        $data = array();
        foreach ($arr as $item) {
            if ($item["id"] == $id) {
                $data["name"] = $item["name"];
                $data["email"] = $item["email"];
                break;
            }
            
        }
        return $data;
    }
}
?>