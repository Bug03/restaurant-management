<?php
require_once '../functions.php';
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
    $collection = new Database("RestaurantManagement");
    $collection->deleteById("Category",$id);
}
?>