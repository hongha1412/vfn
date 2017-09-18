<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-col-sm-4">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Thông Tin Thành Viên</h4>
        </div>
        <div class="modal-body">
        <div class="form-group">
            <p><li class="list-group-item">ID Thành Viên : <b style="color:red">#<?php echo $_SESSION['user']; ?></b>
            </li></p>
            <p><li class="list-group-item">Tên Đầy Đủ : <b style="color:red"><?php echo $user['fullname']; ?></b>
            </li></p>
            <p><li class="list-group-item">E-mail : <b style="color:red"><?php echo $user['mail']; ?></b>
            </li></p>	
            <p><li class="list-group-item">Số Điện Thoại : <b style="color:red"><?php echo $user['sdt']; ?></b>
            </li></p>
			<p><li class="list-group-item">Số Dư : <b style="color:red"><?php echo number_format($user['vnd'], 0, ',', ','); ?> VNĐ</b>
            </li></p>			
			<p><li class="list-group-item">Tài Khoản : <b style="color:red"><?php echo $user['username']; ?></b>
            </li></p>
			</div>
		<div class="form-group">
		<p><li class="list-group-item"><a href="/canhan/doimk.php"><b style="color:red"><i class="fa fa-file-text" aria-hidden="true"></i> Đổi Mật Khẩu</b></a></li></p>	
		</div>		
		</div>		
		
		
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
        </div>
      </div>
    </div>
  </div>
  
  
        <div class="modal fade" id="BangGia" role="dialog">
    <div class="modal-dialog modal-col-sm-4">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Nạp Tiền Ví Điện Tử & Banking</h4>
        </div>
<div class="panel-body">
<table class="table table-bordered">
<thead>
<tr class="active">
<th><center>Ngân hàng</center></th>
<th><center><font color="red">Thông tin chuyển khoản</font></center></th></tr></thead><tbody>

<tr><td><center><b>AGRIBANK</b><br><img src="https://i.imgur.com/z6ItYSP.jpg"></center></td><td><b>- Số tài khoản: <font color="blue">3712205097986</font></b><br>
- Tên : <font color="blue">LE TU ANH</font><br>
- Chi nhánh: <font color="blue">Chi Nhánh Hà Tĩnh</font><br>
- Nội Dung Chuyển Khoản: <font color="blue"><b>[Taikhoancuaban] or [ID Cần Mua VIP] Nap Tien Mua Vip</b></font><br>
</td></tr>


<tr><td><center><b>MEGACARD</b><br><img src="https://megacard.vn/images/logo.png"></center></td><td><b>- Tài khoản: <font color="red">anhkey2299@gmail.com</font></b><br>
- Tên : <font color="red">LÊ DUY ÁNH</font><br>
- Nội Dung Chuyển Khoản: <font color="red"><b>[Taikhoancuaban] or [ID Cần Mua VIP] Nap Tien Mua Vip</b></font><br>
</td></tr>

<tr><td><center><b>THẺ CÀO SIÊU RẺ</b><br><img src="https://thecaosieure.com/images/logo.png" height="35px" weight="32px"></center></td><td><b>- Tài khoản: <font color="red">anhkey</font></b><br>
- Tên : <font color="red">LÊ DUY ÁNH</font><br>
- Nội Dung Chuyển Khoản: <font color="red"><b>[Taikhoancuaban] or [ID Cần Mua VIP] Nap Tien Mua Vip</b></font><br>
</td></tr>
</tbody></table>
</div>    
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
        </div>
      </div>
  </div>
</div>

  <div class="modal fade" id="DANGNHAP" role="dialog">
    <div class="modal-dialog modal-col-sm-4">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Đăng Nhập Hệ Thống</h4>
        </div>
        <div class="modal-body">
        <div class="form-group">
      <div class="form-group">
  <label for="usr">Tên tài khoản:</label><star>*</star>
  <input type="text" class="form-control" id="username" name="username">
</div>
<div class="form-group">
  <label for="pwd">Mật khẩu:</label><star>*</star>
  <input type="password" class="form-control" id="password" name="password">
</div>
<div class="footer text-center">

<button id="postdata2" class="btn btn-rounded btn-primary" name="dangnhap" onclick="dangnhap()"><i class="fa fa-sign-in"></i> Đăng Nhập</button>

          </div></div>	</div>	
		
		<div id="ketqua"></div>

        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
        </div>
<script>
function dangnhap() {
if(!$('#username').val()) {
toastr.error('Vui Lòng Nhập Tên Đăng Nhập', 'Thông báo lỗi');
}else if(!$('#password').val()) {
toastr.error('Vui Lòng Nhập Mật Khẩu', 'Thông báo lỗi');
}else {
xuly2();
}
}

   function xuly2(){
      $('#postdata').html('<i class="fa fa-spinner fa-spin"></i> Đang Xử Lý');
                $.ajax({
                    url : "../like_modun/xuly_dangnhap.php",
                    type : "post",
                    dateType:"text",
                    data : {
                         username : $('#username').val(), 
                         password : $('#password').val()
                    },
                    success : function (result){
                        $('#ketqua').html(result);
   $('#postdata2').html('Đăng Nhập');
                    }
                });
            }

</script>
      </div>
    </div>
  </div>

<div class="modal fade" id="giacmt" role="dialog">
    <div class="modal-dialog modal-col-sm-4">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">BẢNG GIÁ COMMENT</h4>
        </div>
        <div class="modal-body">
<table class="table table-bordered"><thead><tr class="active"><th><center>Tên Gói Vip</center></th><th><center><font color="red">VNĐ / Tháng</font></center></th></tr></thead><tbody>									
				<tr><td><center>15 Comment</center></td><td><center><?php echo number_format(30000); ?> VNĐ</center></td></tr>
				<tr><td><center>20 Comment</center></td><td><center><?php echo number_format(60000); ?> VNĐ</center></td></tr>
				<tr><td><center>25 Comment</center></td><td><center><?php echo number_format(100000); ?> VNĐ</center></td></tr>
				<tr><td><center>30 Comment</center></td><td><center><?php echo number_format(140000); ?> VNĐ</center></td></tr>
				<tr><td><center>35 Comment</center></td><td><center><?php echo number_format(170000); ?> VNĐ</center></td></tr>
				<tr><td><center>40 Comment</center></td><td><center><?php echo number_format(200000); ?> VNĐ</center></td></tr>
				<tr><td><center>45 Comment</center></td><td><center><?php echo number_format(250000); ?> VNĐ</center></td></tr>
		  </tbody></table>

</div>
<div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
        </div>
    </div>
  </div>
</div>
  </div>

<div class="modal fade" id="gialike" role="dialog">
    <div class="modal-dialog modal-col-sm-4">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">BẢNG GIÁ VIP LIKE</h4>
        </div>
        <div class="modal-body">
<table class="table table-bordered"><thead><tr class="active"><th><center>Tên Gói Vip</center></th><th><center><font color="red">VNĐ / Tháng</font></center></th></tr></thead><tbody>									
				<tr><td><center>150 Like</center></td><td><center><?php echo number_format(30000); ?> VNĐ</center></td></tr>
				<tr><td><center>300 Like</center></td><td><center><?php echo number_format(50000); ?> VNĐ</center></td></tr>
				<tr><td><center>500 Like</center></td><td><center><?php echo number_format(80000); ?> VNĐ</center></td></tr>
				<tr><td><center>700 Like</center></td><td><center><?php echo number_format(120000); ?> VNĐ</center></td></tr>
				<tr><td><center>1000 Like</center></td><td><center><?php echo number_format(170000); ?> VNĐ</center></td></tr>
				<tr><td><center>1500 Like</center></td><td><center><?php echo number_format(250000); ?> VNĐ</center></td></tr>
				<tr><td><center>2000 Like</center></td><td><center><?php echo number_format(340000); ?> VNĐ</center></td></tr>
		  </tbody></table>

</div>
<div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
        </div>
    </div>
  </div>

