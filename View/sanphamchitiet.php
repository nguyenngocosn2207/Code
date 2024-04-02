<style>
    .product-details {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .comment-section {
        text-align: center;
    }

    .comment-avatar {
        margin-right: 10px;
    }

    .input-field {
        width: 100%;
    }

    #submitButton {
        margin-top: 10px;
    }
</style>

<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h3 class="mb-5 font-weight-bold">CHI TIẾT SẢN PHẨM</h3>
            </div>
        </div>

        <article class="col-12">
            <div class="container-fluid">
                <div class="row">
                    <form action="index.php?action=giohang&act=giohang_action" method="post">
                        <div class="col-md-6">
                            <div class="tab-content">
                                <?php
                                // điều phối truyền id
                                if (isset($_GET['id'])) {
                                    $id = $_GET['id'];
                                    $hh = new HangHoa();
                                    $sp = $hh->getHangHoaId($id);
                                    $tenhh = $sp['tenhh'];
                                    $mota = $sp['mota'];
                                    $dongia = $sp['dongia'];
                                }
                                ?>
                                <?php
                                $hinh = $hh->getHangHoaHinh($id);
                                $set = $hinh->fetch();

                                ?>
                                <div class="tab-pane active text-center" id="">
                                    <img src="Content/imagetourdien/<?php echo $set['hinh']; ?>" alt="" class="img-fluid" style="max-width: 100%;">
                                </div>
                            </div>
                            <ul class="preview-thumbnail nav nav-tabs">
                                <?php
                                while ($img = $hinh->fetch()) :
                                ?>
                                    <li class="active">
                                        <a href="#<?php echo $img['hinh']; ?>" data-toggle="tab">
                                            <img src="Content/imagetourdien/<?php echo $img['hinh']; ?>" alt="Học thiết kế web bán hàng Online" class="img-fluid">
                                        </a>
                                    </li>
                                <?php
                                endwhile;
                                ?>
                            </ul>
                        </div>

                        <div class="col-md-6">
                            <input type="hidden" name="mahh" value="<?php echo $id; ?>" />
                            <h3 class="product-title"><?php echo $tenhh; ?></h3>
                            <div class="rating">
                                <div class="pstar" data-pid="<?=$id?>">
                                Your Rating:
                                <?php
                                    for ($i = 1; $i <= 5; $i++) {
                                        $img = $i <= $rating ? "star" : "star-blank";
                                        echo "<img src='Content/imagetourdien/$img.png' style='width:20px;cursor:pointer;' data-set='$i'>";
                                    }
                                ?>

                                </div>
                            </div>
                            <p class="product-description"><?php echo $mota; ?></p>
                            <h4 class="price">Giá bán: <?php echo number_format($dongia); ?> đ</h4>

                            <div class="colors">
                                <label>Màu:</label>
                                <select name="mymausac" class="form-control" style="width:150px;">
                                    <?php
                                    $mau = $hh->getHangHoaMau($id);
                                    while ($set = $mau->fetch()) :
                                    ?>
                                        <option value="<?php echo $set['idmau']; ?>"><?php echo $set['mausac']; ?></option>
                                    <?php endwhile; ?>
                                </select>
                            </div>

                            <div class="sizes">

                                <?php
                                $size = $hh->getHangHoaSize($id);
                                $set = $size->fetch()
                                ?>

                                <input type="hidden" name="size" id="size" value="<?php echo $set['size']; ?>" />
                                <label>Kích Thước:</label>

                                <button type="button" name="" onclick="chonsize('<?php echo $set['size']; ?>')" class="btn btn-default-hong btn-circle" id="hong" value="<?php echo $set['idsize']; ?>">
                                    <?php echo $set['size']; ?>
                                </button>

                                <?php
                                while ($set = $size->fetch()) :
                                ?>
                                    <button type="button" name="" onclick="chonsize('<?php echo $set['size']; ?>')" class="btn btn-default-hong btn-circle" id="hong" value="<?php echo $set['idsize']; ?>">
                                        <?php echo $set['size']; ?>
                                    </button>
                                <?php endwhile; ?>
                            </div>

                            <div class="quantity">
                                <label>Số Lượng:</label>
                                <input type="number" id="soluong" name="soluong" min="1" max="100" value="1" size="10" />
                            </div>

                            <div class="action">
                                <button class="add-to-cart btn btn-default" type="submit" data-toggle="modal" data-target="#myModal">
                                    MUA NGAY
                                </button>
                                <a href="http://hocwebgiare.com/" target="_blank">
                                    <button class="like btn btn-default" type="button"><span class="fa fa-heart"></span></button>
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </article>
          <!-- hidden để hiển thị star -->
    <form id="ninForm_2" method="post" target="_self">
        <input type="hidden" name="pid" id="ninPdt">
        <input type="hidden" name="stars" id="ninStar">
    </form>
    </div>

    <!-- ... (phần mã trước không thay đổi) ... -->

    <div class="container">
        <div class="comment-section">
            <p class="float-left"><b>Bình luận </b></p>
            <hr>

            <form action="index.php$action=binhluan" method="post">
                <div class="row">
                    <input type="hidden" name="txtmahh" value="<?php echo $id?>" />
                    <img src="Content/imagetourdien/people.png" width="50px" height="50px" class="comment-avatar" />
                    <textarea class="input-field" type="text" name="comment" rows="2" cols="70" id="comment" placeholder="Thêm bình luận"></textarea>
                    <input type="submit" name="sumbit" class="btn btn-primary float-right" id="submitButton" value="Bình Luận" />
                </div>
            </form>

            <div class="row">
                <p class="float-left"><b>Các bình luận</b></p>
                  <?php
                  $bl=new binhluan();
                  $noidung=$bl->selectBinhLuan($id);
                  while($set=$noidung->fetch()): 
                  ?>                  
            </div>
            <div class="col-12">
                <div class="row">
                    <img src="Content/imagetourdien/people.png" alt="" width="30px" height="30px">
                    <p>
                        <?php echo '<b>' . $set['username'] . '</b>:' . $set['content']; ?>
                    </p>
                </div>
            </div>
            <?php
           endwhile;
            ?>
        </div>
        </div>
    </div>

</section>



<script>
    var stars = {
        init: function () {
            for (let docket of document.getElementsByClassName("pstar")) {
                for (let star of docket.getElementsByClassName("img")) {
                    star.addEventListener("click", stars.click);
                }
            }
        },
        click: function () {
            let all = this.parentElement.getElementsByTagName("img"),
                set = this.dataset.set,
                i = 1;
            for (let star of all) {
                star.src = i <= set ? "star.png" : "star-blank.png";
                i++;
            }
            document.getElementById("ninPdt").value = this.parentElement.dataset.pid;
            document.getElementById("ninStar").value = this.dataset.set;
            document.getElementById("ninForm_2").submit();  // Fixed typo in 'submit'
        }
    }
    window.addEventListener("DOMContentLoaded", stars.init);  // Fixed typo in 'DOMContentLoaded'
</script>
<script type="text/javascript">
    function chonsize(a) {
        document.getElementById("size").value = a;
    }
</script>
