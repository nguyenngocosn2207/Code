<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <?php
            $loai = new loaisanpham();
            $kq = $loai->getLoaiHangHoang();
            while ($set = $kq->fetch()) :
            ?>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?action=sanpham&loai=<?php echo $set['maloai'] ?>" style="font-size: 20px;"><?php echo $set['tenloai'] ?></a>
                </li>
            <?php endwhile; ?>
        </ul>
        <li>
            <form class="form-inline" action="index.php?action=sanpham&act=timkiem" method="post">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <!-- <a href="Trangchu.php?trang=tk"> -->
                        <input class="input-group-text" style="height: 35px;" type="submit" id="btsearch" value="Tìm Kiếm" />
                        <!-- </a> -->
                        <!-- <span class="input-group-text">@</span> -->
                        <input type="text" name="txtsearch" class="form-control" placeholder="Tìm Kiếm" />
                    </div>

            </form>
        </li>

        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a href="index.php" class="nav-link">Trang Chủ</a>
            </li>
            <?php
            // if (isset($_SESSION['makh'])) 



            ?>
            <li class="nav-item">
                <a href="index.php?action=dangky" class="nav-link">Đăng Ký</a>
            </li>
            <li class="nav-item">
                <a href="index.php?action=dangnhap" class="nav-link">Đăng Nhập</a>
            </li>
            <?php  ?>
            <li class="nav-item">
                <a href="index.php?action=dangnhap&act=dangxuat" class="nav-link">Đăng Xuất</a>
            </li>
            <li class="nav-item">
                <a href="index.php?action=giohang" class="nav-link">
                    <img src="Content/imagetourdien/cartx2.png" width="30px" height="30px" alt="">
                </a>
            </li>
            <li class="nav-item">
                <p style="color: red; margin-top: 20px; margin-left: 0px;">(0)</p>
            </li>
            <?php

            if (isset($_SESSION['makh'])) {
                echo '<li>
                <p style="color: red; magin-top:20px; margin-left:0px ">' . $_SESSION['tenkh'] . '</p>
                </li>';
            } else {
                echo '<li>
                <p style="color: red; magin-top:20px; margin-left:0px "></p>
                </li>';
            }

            ?>
            <li class="nav-item">
                <p style="color: red; margin-top: 20px; margin-left: 0px;"></p>
            </li>
        </ul>
    </div>
</nav>