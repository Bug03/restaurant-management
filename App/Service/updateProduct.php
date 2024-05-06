<?php
require_once '../functions.php';
//var_dump($_POST);
//var_dump(isset($_POST['update']));
//var_dump($_FILES);
if (isset($_POST['update'])) {
    var_dump($_POST);
    $id = $_POST['id'];
    $collection = new Database("RestaurantManagement");
    $name = $_POST['name'];
    $price = $_POST['price'];
    $status = $_POST['status'];
    $category = $_POST['category'];
    $description = $_POST['description'];
//    $file_tmp = $_POST['file_tmp'];
    $data = [
        '$set' => [
            'name' => $name,
            'price' => $price,
            'status' => $status,
            'category' => $category,
            'description' => $description,
//            'fileName'    => $file_tmp
        ]
    ];
    if(isset($_FILES['file']) && $_FILES['file']['error'] !== UPLOAD_ERR_NO_FILE) {
        $uploaddir = '../upload/';
        $uploadfile = $uploaddir . basename($_FILES['file']['name']);
        // Kiểm tra xem file đã tồn tại hay chưa
        if (file_exists($uploadfile)) {
            // File đã tồn tại, xử lý tùy ý (ở đây tôi chỉ in ra một thông báo)
            var_dump("File already exists.");
            $data['$set']['fileName'] = $_FILES['file']['name'];
        } else {
            if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {
                $data['$set']['fileName'] = $_FILES['file']['name'];
            } else {
                var_dump("Failed to upload file.");
                var_dump($uploadfile);
                die();
            }

        }
    }
    $collection->update("Food", $id, $data);
}
?>