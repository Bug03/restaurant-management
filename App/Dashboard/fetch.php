<?php
require_once '../functions.php';
session_start();
if (!isset($_SESSION['Firstname'])) {
    header('Location: ' . 'login.php');
};
$limit = 4;
$page = 0;
$display = "";

if (isset($_POST['page'])) {
    $page = $_POST['page'];
}else {
    $page = 1;
}
$skip = ($page - 1) * $limit;
//$start_form = $page * $limit;
$collection = new Database("RestaurantManagement");
$result = $collection->findLimit('Food',$limit,$skip);
$total_rows =iterator_count($collection->findAll("Food")); //12 san pham
//foreach ($result as $rs) {
//    var_dump($rs);
//}
$count =  0;
foreach($result as $rs)
{
if($count == 0) {
    $display.= ' <div class="row">';
}
$count++;
$display .= '
    <div class="col-xxl-3 col-lg-3 col-md-6 col-12">
    <!-- Single Product -->
    <div class="sherah-product-card sherah-product-card__v2  sherah-default-bg sherah-border mg-top-30">
        <!-- Card Image -->
        <div class="sherah-product-card__img">
            <a href="./product-details.php?id='.$rs['_id'].'"><img src="../upload/'.$rs['fileName'].'"></a>
        </div>
        <!-- Card Content -->
        <div class="sherah-product-card__content sherah-dflex-column sherah-flex-gap-5">
            <h4 class="sherah-product-card__title">
                <a href="product-detail.html" class="sherah-pcolor">'.$rs["name"].'</a>
            </h4>
        <div class="sherah-border-btm pd-top-10 mg-btm-10"></div>
        <div class="sherah-product__bottom">
            <div class="sherah-product__bottom--single">

        ';
$display.=  sprintf(' <h5 class="sherah-product-card__price">%s VND</h5>', number_format($rs['price'], 0, '', ','));
if ($rs['status'] == "Sẵn sàng") {
    $display.='  
         <div class="sherah-product-card__meta sherah-dflex sherah-flex-gap-30">
            </div>
        </div>
        <div  class="sherah-table__status sherah-color3__bg--opactity">
            <p class="sherah-color3">'.$rs['status'].'</p>
        </div>
    </div>
</div>
</div>
<!-- End Single Product -->
</div>
';
}else {
    $display.='  
         <div class="sherah-product-card__meta sherah-dflex sherah-flex-gap-30">
            </div>
        </div>
        <div  class="sherah-table__status sherah-color2__bg--opactity">
            <p class="sherah-color2">'.$rs['status'].'</p>
        </div>
    </div>
</div>
</div>
<!-- End Single Product -->
</div>
';
}


    if($count > 3) {
        $display.= '</div>';
        $count = 0;
    }
}
if ($count != 0) {
    $display.= "</div>";
}
//echo $display;



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
    if ($i == $page){
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
echo $display;
?>
