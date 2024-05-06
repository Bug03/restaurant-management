<?php
require_once '../functions.php';
if (isset($_POST['create'])) {
    $collection = new Database("RestaurantManagement");
    $id = $_POST['category_id'];
    $name = $_POST['name'];
    $data = [
        'category_id' => $id,
        'name' => $name
    ];
    $collection->insert('Category',$data);
}
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $collection = new Database("RestaurantManagement");
    $categoryId = $_POST['category_id'];
    $name = $_POST['name'];
    $data = [
        '$set' => [
            'category_id' => $categoryId,
            'name' => $name
        ]
    ];
    $collection->update("Category", $id, $data);
}

