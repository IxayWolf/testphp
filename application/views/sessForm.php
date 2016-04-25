<?php
//$this->load->helper("url");
echo "<ul>";
if (!empty($items)) {
    foreach ($items as $item) {
        echo "<li>".$item["id"]." ".$item["name"]." ".$item["email"]." ";
        echo anchor("email/send/".$item["id"], "Salji");
        echo "</li>";
    }
}
echo "</ul>";

$this->load->helper("form_helper");

echo form_open("controller/addItem");
echo form_label("Ime: ");
$arr = array(
    "name" => "name", 
    "type" => "text", 
    "value" => set_value("name")
);
echo form_input($arr);
echo form_label("Email: ");
$arr = array(
    "name" => "email", 
    "type" => "text", 
    "value" => set_value("email")
);
echo form_input($arr);
echo "<br/><br/>";
if (!empty($errors)) 
    echo $errors;
echo "<br/><br/>";
echo form_submit("", "Dodaj");
echo "<br/><br/>";
echo form_close();
echo form_open("controller/delete");
echo form_submit("", "Brisi");
echo form_close();

?>