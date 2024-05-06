<?php
require_once '../functions.php';
session_start();
if (!isset($_SESSION['Firstname'])) {
    header('Location: ' . 'login.php');
};
$limit = 5;
$page = 0;
$display = "";

if (isset($_POST['page'])) {
    $page = $_POST['page'];
}else {
    $page = 2;
}

$start_form = ($page - 1) * $limit;
$collection = new Database("RestaurantManagement");
$result = $collection->findLimit('Food',$limit,$start_form);
var_dump($result);
$total_rows =iterator_count($collection->findAll("Food"));


$count =  0;

//    pagination
$total_pages = ceil($total_rows/$limit);
$display .= '
    <ul class="pagination">';

    if($page > 1) {
        $previous = $page - 1;
        $display .= '<li class="page-item" id="1"><span class="page-link">First Page</span></li>';
        $display .= '<li class="page-item" id="'.$previous.'"></li>';
    }

    for($i = 1; $i <=$total_pages;$i++) {
        $active_class ="";
        if ($i = $page){
            $active_class ="active";
        }
        $display.= '
        <li class="page-item '.$active_class.'" id ="'.$i.'"><span class="page-link">'.$i.'</span></li>
        ';
    }

    if($page<$total_pages){
        $page++;
        $display .= '<li class="page-item" id="'.$page.'"></li>';
        $display .= '<li class="page-item" id="'.$total_pages.'"><span class="page-link">Last Page</span></li>';
    }
    $display.= '</ul>';
  echo "<h1>Danh cute</h1>"
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

</body>
</html>
