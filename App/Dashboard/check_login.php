<?php
require_once '../functions.php';
session_start();
if (!isset($_SESSION['Firstname'])) {
    header('Location: ' . 'login.php');
};
session_start();
if (!isset($_SESSION['Firstname'])) {
    header('Location: ' . 'login.php');
};
$collection = new Database("RestaurantManagement");
if (isset($_POST['signin'])){
    $email = $_POST['email'];
    $password = sha1($_POST['password']);
    $user = $collection->findbyEmail("Users", $email);
    $count = iterator_count($user);
    $user2 = $collection->findbyEmail("Users", $email);
    if ($count > 0) {
        foreach ($user2 as $rs) {
            if($rs['Password'] != $password ) {
                $message = "Sai Mật Khẩu!! Vui lòng đăng nhập lại";
                header('Location: ' . $_SERVER['HTTP_REFERER'] . '?Message=' . $message);
                die();
            }else {
                $message = "Hello " . $rs['Firstname'];
                $_SESSION['Firstname'] = $rs['Firstname'];
                header('Location: index.php' . '?Message= ' . $message);
            }
        }
    }else {
        $message = "Không tìm thấy email!! Vui lòng đăng nhập lại";
        header('Location: ' . $_SERVER['HTTP_REFERER'] . '?Message=' . $message);
        die();
    }

}