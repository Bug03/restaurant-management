<?php
require_once '../functions.php';

if (isset($_POST['create'])) {
    $collection = new Database("RestaurantManagement");
    $name = $_POST['name'];
    $price = $_POST['price'];
    $status = $_POST['status'];
    $category = $_POST['category'];
    $description = $_POST['description'];
    $data = [
        'name'        => $name,
        'price'       => $price,
        'status'      => $status,
        'category'    => $category,
        'description' => $description,
        'fileName'    => ''
    ];
    $uploaddir = '../upload/';
    $uploadfile = $uploaddir . basename($_FILES['file']['name']);
    if($_FILES['file']) {
        if(move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {
            $data['fileName'] = $_FILES['file']['name'];
        } else {
            var_dump( "Failed to upload file.");
            var_dump($uploadfile);
            die();
        }
    }
    $collection->insert('Food',$data);
}
