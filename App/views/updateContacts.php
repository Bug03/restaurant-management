<?php
require_once '../functions.php';
if (isset($_POST['_id']) && !empty($_POST['_id'])) {
    $id = $_POST['_id'];
    $collection = new Database("Lab10");
    $name = $_POST['name'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $data = [
        '$set'=>[
            'name' => $name,
            'email' => $email,
            'number' => $number,
        ]
    ];
    $collection->update("Contacts",$id,$data);
}

?>