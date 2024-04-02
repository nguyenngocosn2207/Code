  <!-- quảng cáo -->
  <?php
    include "quangcao.php";
    ?>
  <!-- end quảng cáo -->

<?php
//b1: tổng số sản phẩm trên trang tổng số sản phẩm
 $hh=new hanghoa();
 //cách 1 : dùng truy vấn count 
//  $count=$hh->getCounthHanghoaAll(); 14
// cách 2 dùng rowcount
$count=$hh->getHangHoaALL()->rowCount();
// b2: chọn giới hạn 1 trang bao nhiêu sản phẩm
$limit=4;
//b3 xác định cáo bao nhiêu trang  và start
$trang=new page();
$page=$trang->findPage($count,$limit);//2
// lấy start
$start=$trang->findStart($limit);//8
?>
  <!-- end số lượt xem san phẩm -->
  <!-- sản phẩm-->
  <?php
    //   cùng là 1 view mà gọi nhiều dữ liệu có view giống nhau
    $ac=1;
    if(isset($_GET['action']))
    {
        if(isset($_GET['act']) && $_GET['act']=='sanphamkhuyenmai' )
        {
            $ac=2; 
        }
        else 
        {
            $ac=1;
        }
    }
      ?>

  <!--Section: Examples-->
  <section id="examples" class="text-center">

      <!-- Heading -->
      <div class="row">
          <div class="col-lg-8 text-right">
            <?php 
            if($ac==1)
            {
                echo '<h3 class="mb-5 font-weight-bold" style="color: red"TẤT CẢ SẢN PHẨM</h3>';

            }
            if($ac==2)
            {
                echo '<h3 class="mb-5 font-weight-bold" style="color: red"TẤT CẢ SẢN PHẨM KHUYẾN MÃ</h3>';

            }
            ?>
          </div>

      </div>
      <!--Grid row-->
      <div class="row">
          <?php
            $hh = new hanghoa();
            if($ac==1)
            {
            $result = $hh->getHangHoaALL();
            }
            if($ac==2)
            {
            $result = $hh->getHangHoaALLSale();
            }
             // lấy đc 8 sản phẩm sale
            // hiện thi 8 sản phẩm sale
            while ($set = $result->fetch()) : //$set =array (mahh:24,tenhh:giay....)


            ?>

              <!--Grid column-->
              <div class="col-lg-3 col-md-4 mb-3 text-left">

                  <div class="view overlay z-depth-1-half">
                      <img src="Content\imagetourdien\<?php echo $set['hinh'] ?>" class="img-fluid" alt="">
                      <div class="mask rgba-white-slight"></div>
                  </div>

                  <h5 class="my-4 font-weight-bold" style="color: red">
                      <?php echo number_format($set['dongia']) ?><sup><u>đ</u></sup><br>
                  </h5>


                  <a href="">
                      <span> <?php echo $set['tenhh'] . "-" . $set['mausac']; ?></span></br></a>
                  <button class="btn btn-danger" id="may4" value="lap 4">New</button>
                  <h5>Số lượt xem: <?php echo $set['soluotxem'] ?></h5>

              </div>
          <?php
            endwhile;
            ?>
      </div>
      
      <?php
      if($ac==1)
      {
        echo '<h5 class="my-4 font-weight-bold">
        <font color="red"> '.number_format($set['giamgia']).'<sup><u>đ</u></sup></font>
        <strike>' .number_format($set['dongia']).'</strike><sup><u>đ</u></sup>
    </h5>';
      }
      ?>
      <!--Grid row-->

  </section>


  
  <!-- end sản phẩm mới nhất -->


  <div class="col-md-6 div col-md-offset-3">
      <ul class="pagination">
            <?php
            // lấy gái trị trang hiện tại
            $current_page=isset($_GET['page'])?$_GET['page']:1;
            if($current_page>1 && $page>1)
            {
                echo '<li><a href="/index.php?action=sanpham&page='.($current_page-1).'">Prev</a></li>' ;

            }
            for($i=1;$i<=$page;$i++){

            ?>
          <li><a href=""></a></li>
            <?php
            }
            if($current_page<$page && $page>1)
            {
                echo '<li><a href="/index.php?action=sanpham&page='.($current_page+1).'">Prev</a></li>' ;
            }

            ?>
      </ul>
  </div>