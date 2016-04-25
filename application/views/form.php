<?php
$this->load->helper("form_helper");

echo form_open("addition/add2");
echo form_label("Prvi broj: ");
$arr = array(
    "name" => "br1", 
    "type" => "text", 
    "value" => set_value("br1")
);
echo form_input($arr);
echo form_label("Drugi broj: ");
$arr = array(
    "name" => "br2", 
    "type" => "text", 
    "value" => set_value("br2")
);
echo form_input($arr);
echo "<br/><br/>";
echo form_submit("", "Racunaj");
echo "<br/><br/>";
echo form_close();
if (!empty($result)) {
    echo "Rezultat je ".$result.".";
}
if (!empty($errors)) {
    echo $errors;
}
?>