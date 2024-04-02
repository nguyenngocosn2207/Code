<div class="container">
  <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-6 well well-sm col-md-offset-3">
      <legend><a href="http://hocwebgiare.com/"><i class="glyphicon glyphicon-globe"></i></a> Đăng ký thành viên!</legend>
      <form action="index.php?action=dangky&act=dangky_action" method="post" class="form registration-form" role="form">
        <div class="form-group row">
          <label for="txttenkh" class="col-xs-4 col-md-4">Tên Khách Hàng:</label>
          <div class="col-xs-8 col-md-8">
            <input class="form-control" name="txttenkh" placeholder="Tên khách hàng" required="" autofocus="" type="text">
          </div>
        </div>

        <div class="form-group row">
          <label for="txtdiachi" class="col-xs-4 col-md-4">Địa chỉ:</label>
          <div class="col-xs-8 col-md-8">
            <input class="form-control" name="txtdiachi" placeholder="Địa chỉ khách hàng" required="" autofocus="" type="text">
          </div>
        </div>

        <div class="form-group row">
          <label for="txtsodt" class="col-xs-4 col-md-4">Số Điện Thoại:</label>
          <div class="col-xs-8 col-md-8">
            <input class="form-control" name="txtsodt" placeholder="Số điện thoại khách hàng" required="" autofocus="" type="text">
          </div>
        </div>

        <div class="form-group row">
          <label for="txtusername" class="col-xs-4 col-md-4">Tên Đăng Nhập:</label>
          <div class="col-xs-8 col-md-8">
            <input class="form-control" name="txtusername" placeholder="Tên đăng nhập" required="" type="text">
          </div>
        </div>

        <div class="form-group">
          <label for="txtemail">Email:</label>
          <input class="form-control" name="txtemail" placeholder="Email" type="email">
        </div>

        <div class="form-group">
          <label for="txtpass">Mật khẩu:</label>
          <input class="form-control" name="txtpass" placeholder="Mật khẩu" type="password">
        </div>

        <div class="form-group">
          <label for="retypepassword">Nhập lại mật khẩu:</label>
          <input class="form-control" name="retypepassword" placeholder="Nhập lại mật khẩu" type="password">
        </div>

        <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Đăng ký</button>
      </form>
    </div>
  </div>
</div>