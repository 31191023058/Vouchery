<?php
    session_start();
    require_once($_SERVER['DOCUMENT_ROOT']."/dashboard/Vouchery/controllers/product_controller.php");
    $productcontroller = new ProductController();
    $productcontroller->addProduct();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Mobile Planet - Cửa hàng di động hàng đầu</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/ulg/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/dashboard/vouchery/styles/style.css">
    <link rel="stylesheet" href="/dashboard/vouchery/styles/form_style.css">
    <script src="/scripts/script.js"></script>
</head>

<body>
    <div class="wrapper">
        <header class="header">
            <div class="dynamic-container">
                <a href="index.php" style="color: black;">
                    <h3 class="my-title">mobileplanet.com</h3>
                </a>
                <div class="menu-group">
                    <form class="form-group form-outline float-left" action="search.php" method="$_GET">
                        <div class="form-group form-outline float-left">
                            <input type="text" id="search" name="keyword" class="form-control float-left"
                                placeholder="Tìm kiếm sản phẩm..." />
                        </div>
                        <button type="submit" class="btn my-button float-left">
                            <i class="bi-search"></i>
                            <span class="top-button-text">Tìm kiếm</span>
                        </button>
                    </form>
                    <button type="button" class="btn my-button float-left">
                        <i class="bi-cart"></i>
                        <a href="cart_invoke.php">
                            <span class="top-button-text">Giỏ hàng</span>
                        </a>
                    </button>
                    <button type="button" class="btn my-button float-left">
                        <i class="bi-person"></i>
                        <a href="user_invoke.php">
                            <span class="top-button-text">Tài khoản</span>
                        </a>
                    </button>
                </div>
            </div>
        </header>

        <nav class="nav-bar">
            <div class="dynamic-container">
                <div class="row">
                    <div class="col-6 col-lg-3 nav-element">
                        <i class="bi-phone"></i>
                        <label>ĐIỆN THOẠI DI ĐỘNG</label>
                        <a href="phone_category.php" class="stretched-link"></a>
                    </div>
                    <div class="col-6 col-lg-3 nav-element">
                        <i class="bi-tablet"></i>
                        <label>MÁY TÍNH BẢNG</label>
                        <a href="tablet_category.php" class="stretched-link"></a>
                    </div>
                    <div class="col-6 col-lg-3 nav-element">
                        <i class="bi-laptop"></i>
                        <label>MÁY TÍNH XÁCH TAY</label>
                        <a href="laptop_category.php" class="stretched-link"></a>
                    </div>
                    <div class="col-6 col-lg-3 nav-element">
                        <i class="bi-headphones"></i>
                        <label>PHỤ KIỆN</label>
                        <a href="accessories_category.php" class="stretched-link"></a>
                    </div>
                </div>
            </div>
        </nav>

        <main class="content dynamic-container">
            <section class="h-100" style="margin-bottom: 3rem;">
                <div class="container h-100">
                    <div class="row h-100 justify-content-start">
                        <div class="border-end col-3" id="sidebar-wrapper">
                            <div class="list-group list-group-flush">
                                <a class="list-group-item list-group-item-action p-3 " href="user_invoke.php">Tài
                                    khoản</a>
                                <a class=" list-group-item list-group-item-action p-3" href="add_product.php">Bán
                                    Voucher</a>
                                <a class=" list-group-item list-group-item-action p-3"
                                    href="add_product_category.php">Thêm
                                    Category</a>
                                <a class=" list-group-item list-group-item-action p-3" href="add_product_type.php">Thêm
                                    Type</a>
                                <a class=" list-group-item list-group-item-action p-3" href="manage_product.php">All
                                    Products
                                </a>
                            </div>
                        </div>
                        <div class="card-wrapper col-6" style="padding: 0px;">
                            <div class="card fat">
                                <div class="card-body">
                                    <h4 class="card-title " style="width:800px; margin:0 auto;">Thêm sản phẩm</h4>
                                    <form method="POST">
                                        <div class="form-group">
                                            <label for="product_name">Tên Voucher</label>
                                            <input id="product_name" type="text" class="form-control"
                                                name="product_name" required autofocus>
                                        </div>

                                        <div class="form-group">
                                            <label for="product_price">Giá tiền</label>
                                            <input id="product_price" type="number" class="form-control"
                                                name="product_price" required autofocus>
                                        </div>

                                        <div class="form-group">
                                            <label for="place_id">Category</label>
                                            <select name="place_id" class="form-control">
                                                <option value="" selected>Category</option>
                                                <?php
                                                    require_once($_SERVER['DOCUMENT_ROOT']."/dashboard/vouchery/controllers/product_controller.php");
                                                    $controller = new ProductController();
                                                    $controller->getProductCategory();
                                                ?>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="type_id">Type</label>
                                            <select name="type_id" class="form-control">
                                                <option value="" selected>Type</option>
                                                <?php
                                                    require_once($_SERVER['DOCUMENT_ROOT']."/dashboard/vouchery/controllers/product_controller.php");
                                                    $controller = new ProductController();
                                                    $controller->getProductType();
                                                ?>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="product_details">Details</label>
                                            <input id="product_details" type="text" class="form-control"
                                                name="product_details" required autofocus>
                                        </div>

                                        <div class="form-group">
                                            <label for="product_thumbnail">Thumbnail</label>
                                            <input id="product_thumbnail" type="text" class="form-control"
                                                name="product_thumbnail" required autofocus>
                                        </div>

                                        <div class="form-group">
                                            <label for="product_instruction">Instruction</label>
                                            <input id="product_instruction" type="text" class="form-control"
                                                name="product_instruction" required autofocus>
                                        </div>

                                        <div class="form-group m-0">
                                            <button type="submit" name="add_product" class="btn btn-primary btn-block"
                                                value="add">
                                                Add
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>

        <footer class="footer">
            <div class="dynamic-container">
                <div class="float-left">
                    <h6>CÔNG TY CỔ PHẦN HÀNH TINH DI ĐỘNG</h6>
                    <label>123 - 124 Nguyễn Văn A, Phường 2, Quận 10, TP. Hồ Chí Minh</label>
                    <h6>Liên hệ:</h6>
                    <label>0901 0000 - 0902 0000</label><br />
                    <label>cskh@mobileplanet.com</label><br />
                </div>
                <div id="social-media-logo" class="float-right">
                    <a class="mr-2" href="https://www.facebook.com/" target="_blank">
                        <i class="bi-facebook" style="color: black; font-size: 1.5rem;"></i>
                    </a>
                    <a class="mr-2" href="https://twitter.com/" target="_blank">
                        <i class="bi-twitter" style="color: black; font-size: 1.5rem;"></i>
                    </a>
                    <a href="https://www.youtube.com/" target="_blank">
                        <i class="bi-youtube" style="color: black; font-size: 1.5rem;"></i>
                    </a>
                </div>
            </div>
        </footer>

    </div>
</body>

</html>