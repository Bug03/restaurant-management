<?php
require_once '../functions.php';

if(isset($_POST['create'])) {
    $collection = new Database("RestaurantManagement");
    $firstname  = $_POST['Firstname'];
    $lastname = $_POST['Lastname'];
    $email = $_POST['Email'];
    $phoneNumber = $_POST['Phone'];
    $password =sha1 ($_POST['Password']);
    $data = [
        'Firstname' => $firstname,
        'Lastname' => $lastname,
        'Email' => $email,
        'Phone Number' => $phoneNumber,
        'Password' => $password
    ];
    $collection->insert("Users",$data);
}

if(isset($_POST['update'])) {
    $id = $_POST['id'];
    $collection = new Database("RestaurantManagement");
    $firstname  = $_POST['Firstname'];
    $lastname = $_POST['Lastname'];
    $email = $_POST['Email'];
    $phoneNumber = $_POST['Phone'];
    $password =$_POST['Password'];
    $data = [
        '$set'=>[
            'Firstname' => $firstname,
            'Lastname' => $lastname,
            'Email' => $email,
            'Phone Number' => $phoneNumber,
            'Password' => $password
        ]
    ];
    $collection->update("Users",$id,$data);
}
?>