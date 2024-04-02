<!--Section: Examples-->

<section id="examples" class="text-center">

    <!-- Heading -->
    <div id="demo" class="carousel slide" data-ride="carousel">

        <!-- Indicators -->
        <ul class="carousel-indicators">
            <li data-target="#demo" data-slide-to="0" class="active"></li>
            <li data-target="#demo" data-slide-to="1"></li>
            <li data-target="#demo" data-slide-to="2"></li>
        </ul>

        <!-- The slideshow -->
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="./Content/imagetourdien/h1_2.jpg" alt="Los Angeles" width="1100" height="500">
            </div>
            <div class="carousel-item">
                <img src="chicago.jpg" alt="Chicago" width="1100" height="500">
            </div>
            <div class="carousel-item">
                <img src="ny.jpg" alt="New York" width="1100" height="500">
            </div>
        </div>

        <!-- Left and right controls -->
        <a class="carousel-control-prev" href="#demo" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#demo" data-slide="next">
            <span class="carousel-control-next-icon"></span>
        </a>
    </div>

    <div class="row">
        <div class="col-lg-8 text-right">
            <h3 class="mb-5 font-weight-bold" style="color: red;">SẢN PHẨM MỚI NHẤT</h3>
        </div>
        <div class="col-lg-4 text-right mt-4">
            <a href="index.php?action=sanpham">
                <span style="color: gray;">Xem chi tiết</span>
            </a>
        </div>
    </div>
    <!--Grid row-->
    <div class="row">
        <?php


        $hh = new hanghoa();
        $result = $hh->getHangHoaNew();
        while ($set = $result->fetch()) :
        ?>
            <!--Grid column-->
            <div class="col-lg-3 col-md-4 mb-3 text-left">
                <div class="card">
                    <div class="view overlay zoom z-depth-1-half">
                        <img src="Content\imagetourdien\<?php echo $set['hinh']; ?>" class="img-fluid" alt="">
                        <div class="mask rgba-white-slight"></div>
                    </div>
                    <div class="card-body">
                        <h5 class="my-4 font-weight-bold" style="color: red;"><?php echo number_format($set['dongia']); ?><sup><u>đ</u></sup></h5>
                        <a href="index.php?action=sanpham&act=sanphamchitiet&id=<?php echo $set['mahh'] ?>">
                            <span> <?php echo $set['tenhh'] . "-" . $set['mausac']; ?></span></br>
                        </a>
                        <button class="btn btn-danger" id="may4" value="lap 4">New</button>
                        <h5>Số lượt xem: <?php echo $set['soluotxem']; ?></h5>
                    </div>
                </div>
            </div>
        <?php
        endwhile;
        ?>
    </div>
</section>
<!-- end sản phẩm mới nhất -->

<!-- sản phẩm khuyến mãi -->
<section id="examples" class="text-center">
    <!-- Heading -->
    <div class="row">
        <div class="col-lg-8 text-right">
            <h3 class="mb-5 font-weight-bold" style="color: red;">SẢN PHẨM KHUYẾN MÃI</h3>
        </div>
        <div class="col-lg-4 text-right mt-4">
            <a href="index.php?action=sanpham&act=sanphamkhuyenmai">
                <span style="color: gray;">Xem chi tiết</span>
            </a>
        </div>
    </div>
    <!--Grid row-->
    <div class="row">
        <?php
        $kq = $hh->getHangHoaSale();
        while ($set = $kq->fetch()) :
        ?>
            <!--Grid column-->
            <div class="col-lg-3 col-md-4 mb-3 text-left">
                <div class="card">
                    <div class="view overlay zoom z-depth-1-half">
                        <img src="Content\imagetourdien\<?php echo $set['hinh'] ?>" class="img-fluid" alt="">
                        <div class="mask rgba-white-slight"></div>
                    </div>
                    <div class="card-body">
                        <h5 class="my-4 font-weight-bold">
                            <font color="red"><?php echo number_format($set['giamgia']); ?><sup><u>đ</u></sup></font>
                            <strike><?php echo number_format($set['dongia']); ?></strike><sup><u>đ</u></sup>
                        </h5>
                        <a href="index.php?action=sanpham&act=sanphamchitiet&id=<?php echo $set['mahh'] ?>">
                            <span> <?php echo $set['tenhh'] . "-" . $set['mausac']; ?></span></br>
                        </a>
                        <button class="btn btn-danger" id="may4" value="lap 4">New</button>
                        <h5>Số lượt xem: <?php echo $set['soluotxem'] ?></h5>
                    </div>
                </div>
            </div>
        <?php
        endwhile;
        ?>
    </div>
    
    <!--Grid row-->
</section>
<!-- end sản phẩm khuyến mãi -->