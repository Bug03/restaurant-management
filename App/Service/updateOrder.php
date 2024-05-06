<?php
require_once '../functions.php';
if (isset($_POST['id']) && !empty($_POST['id'])) {
    $id = $_POST['id'];
    $collection = new Database("RestaurantManagement");
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $userName = $_POST['username'];
    $data = [
        '$set' => [
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'address' => $address,
            'username' => $userName
        ]
    ];
    $collection->update("Customer", $id, $data);
}
?>