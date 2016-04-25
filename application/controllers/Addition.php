<?php

class Addition extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->helper("url");
        $this->load->library("form_validation");
        $this->load->library("session");
    }
    
    public function index() {
        $this->load("", false, "");
    }
    public function add($a, $b) {
      //  $c = $a + $b;
        $c = $this->uri->segment(3) + $this->uri->segment(4);
        $arr = array(
            "title" => "Addition", 
            "page" => "addition", 
            "result" => $c
        );
        $this->load->view("templates/page", $arr);
    }
    
    public function add2() {
        $a = $this->input->post("br1");
        $b = $this->input->post("br2");
        $this->form_validation->set_rules("br1", "Broj1", "trim|required|numeric|callback_check");
        $this->form_validation->set_rules("br2", "Broj2", "trim|required|numeric|callback_check");
        if ($this->form_validation->run()) {
        $c = $a + $b;
        $this->load($c, false, "");
        }
        else {
            $this->load("", true, validation_errors());
        }
    }
    
    public function check($a) {
        if ($a >= 0) 
            return true;
        else {
            $this->form_validation->set_message("check", "%s je manji od 0!");
            return false;
        }
    }
    
    public function load($result, $flag, $errors) {
        $arr = array(
            "title" => "Addition", 
            "page" => "form", 
            "result" => $result
        );
        if ($flag) {
            $arr["errors"] = $errors;
        }
        $this->load->view("templates/page", $arr);
    }
}
?>