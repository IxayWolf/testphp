<?php

class Email extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->library("email");
        $this->load->model("model");
        $this->load->library("session");
        $this->load->helper("url");
    }
    
    public function send($id) {
        $data = $this->model->getById($id);  
        $this->email->set_newline("\r\n"); 
        $this->email->from('si2veb@gmail.com', 'Sofija');
        $this->email->to($data["email"]); 
        $this->email->subject('Email CI');
        $this->email->message("Radi sve OK, ".$data["name"]);               
        if ($this->email->send()) {
           // echo "Uspesno poslat email!";
            $this->session->set_flashdata("ok", "Uspesno poslat email!");
            redirect("controller");
        }
        else {
            $items = $this->model->getData();
            $arr = array(
            "items" => $items,
            "title" => "Session", 
            "page" => "sessForm", 
            "errors" => $this->email->print_debugger()
        );
        $this->load->view("templates/page", $arr);
        }

    }
}
?>
