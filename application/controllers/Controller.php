<?php

class Controller extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model("model");
        $this->load->helper("url");
        $this->load->library("form_validation");
        $this->load->helper("security");
    }
    
    public function index() {
        echo $this->session->flashdata("ok");
        $items = $this->model->getData();
        $arr = array(
            "items" => $items,
            "title" => "Session", 
            "page" => "sessForm"
        );
        $this->load->view("templates/page", $arr);
    }
    
    public function addItem() {
        $ime = $this->input->post("name");
        $email = $this->input->post("email");
        $this->form_validation->set_rules("name", "Ime", "required|xss_clean|min_length[4]");
        $this->form_validation->set_rules("email", "Email", "required|xss_clean|valid_email");
        if ($this->form_validation->run()) {
        $this->model->addItem(array("name" => $ime, "email" => $email));
        redirect("controller");       
        }
        else {
            $items = $this->model->getData();
        $arr = array(
            "items" => $items,
            "title" => "Session", 
            "page" => "sessForm", 
            "errors" => validation_errors()
        );
        $this->load->view("templates/page", $arr);
        }
    }
    
    public function delete() {
        $this->model->delete();
        redirect("controller");
    }
}
?>