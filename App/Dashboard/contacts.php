<?php
require_once '../functions.php';
session_start();
if (!isset($_SESSION['Firstname'])) {
    header('Location: ' . 'login.php');
};
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome-all.min.css">
    <link rel="stylesheet" href="css/charts.min.css">
    <link rel="stylesheet" href="css/datatables.min.css">
    <link rel="stylesheet" href="css/jvector-map.css">
    <link rel="stylesheet" href="css/slickslider.min.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1><?php
    if (isset($_GET['Message'])) {
        echo $_GET['Message'];
    }

    ?>
    </h1>

    <?php
    $collection = new Database("Lab10");
    $id = "656d7cfa083e74e87c85861f";
    $result = $collection->findById("Contacts",$id );
    // foreach($result as $rs) {
    //     var_dump($rs);
    // }
    ?>
    <div class="sherah-page-inner sherah-border sherah-basic-page sherah-default-bg mg-top-25 p-0">
        <form class="sherah-wc__form-main" enctype="multipart/form-data" action="../Service/addProduct.php" method="Post">
            <div class="row">
                <div class="col-12">
                    <!-- Product Info -->
                    <div class="product-form-box sherah-border mg-top-30">
                        <h4 class="form-title m-0">Thông tin món ăn</h4>
                        <div class="col-12">
                            <div class="form-group">
                                <label class="sherah-wc__form-label">Tên món ăn</label>
                                <div class="form-group__input">
                                    <input style="color:#333" class="sherah-wc__form-input" placeholder="Nhập tên món ăn" type="text" name="name">
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label class="sherah-wc__form-label">Giá bán</label>
                                <div class="form-group__input">
                                    <input style="color:#333" class="sherah-wc__form-input" placeholder="Nhập giá món ăn" type="number" name="price">
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label class="sherah-wc__form-label">Trạng thái</label>
                                <div class="form-group__input">
                                    <select style="color:#333" class="form-group__input" aria-label="Default select example" name="status">
                                        <option selected value="Sẵn sàng">Sẵn sàng</option>
                                        <option value="Tạm ngưng">Tạm ngưng</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label class="sherah-wc__form-label">Category*</label>
                                <select style="color:#333" class="form-group__input" aria-label="Default select example" name="category">
                                    <?php
                                    $collectionCategory = new Database("RestaurantManagement");
                                    $Category = $collectionCategory->findAll("Category");
                                    foreach ($Category as $item)
                                    {
                                        if ($item['name'] == "Pizza"){?>
                                            <option selected value="<?=$item['name']?>"> <?=$item['name']?> </option>
                                            <?php
                                        } else {
                                            ?>
                                            <option value="<?=$item['name']?>"><?=$item['name']?></option>
                                            <?php
                                        }
                                    }
                                    ?>

                                </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label class="sherah-wc__form-label">Mô tả món ăn</label>
                                <div class="form-group__input">
                                    <textarea style="color:#333" class="form-control" id="exampleFormControlTextarea1" name="description" rows="3"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <!-- MAX_FILE_SIZE must precede the file input field -->
                                <input type="hidden" name="MAX_FILE_SIZE" value="3000000"/>
                                <label class="sherah-wc__form-label">Hình ảnh món ăn</label>
                                <div class="form-group__input">
                                    <input style="padding:15px" type="file" class="form-control-file" name="file">
                                </div>
                            </div>
                        </div>
                        <!-- End Product Info -->
                    </div>
                </div>

                <div class=" mg-top-40 sherah-dflex sherah-dflex-gap-30 justify-content-end">
                    <button type="submit" class="sherah-btn sherah-btn__primary" name="create">Tạo Món Ăn Mới</button>
                    <button  class="sherah-btn sherah-btn__third">Cancel</button>
                </div>
        </form>
    </div>
    </div>

</body>
<!-- Include jQuery - see http://jquery.com -->
<script type="text/javascript">
    $('.confirmation').on('click', function () {
        return confirm('Are you sure?');
    });
</script>
</html>