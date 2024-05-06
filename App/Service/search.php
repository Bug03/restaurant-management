<?php
require_once '../functions.php';
$collection = new Database("RestaurantManagement");

$regex = '';

if (isset($_POST['search']) && $_POST['search'] != '') {
    $tenSP = $_POST['search'];
    $regex = new \MongoDB\BSON\Regex($tenSP);
}

if (isset($_POST['filter'])) {
    $filter = $_POST['filter'];
//    var_dump($filter);
}


$result = $collection->findByRegex("Food", "name", $regex, $filter);
$count = 0;
$display = "";
foreach ($result as $rs) {
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
        
    if($count > 3) {
            $display.= '</div>';
            $count = 0;
        }
    }
    if ($count != 0) {
        $display.= "</div>";
    }
    echo $display;
