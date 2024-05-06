<?php
require_once '../functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    var_dump($_POST);
    $collection = new Database("Lab10");
    $name = $_POST['name'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $data = [
            'name' => $name,
            'email' => $email,
            'number' => $number,
        ];
    $collection->insert("Contacts",$data);
}   
?>