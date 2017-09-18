<meta charset="utf-8" />
<title>Tổng Token - VIPFBNOW.COM</title>

$q = "SELECT id,time,idfb FROM VIP";
$rows = $db->query($q);
foreach($rows as $time){
    if($time[1] <= time()){
        $sql = "DELETE FROM VIP WHERE id=$time[0]";
        $db->exec($sql); 
      echo 'Đã Xóa ID <font color="red"><b>'.$time[2].'</b></font> <b>VIP Like</b> Hết Hạn<br>';
    }else{
       echo 'ID: <font color="green"><b>'.$time[2].'</b></font> <b>VIP LIKE</b> Vẫn Còn Hiệu Lực<br>';
}
}
$q1 = "SELECT id,time,idfb FROM vipcmt";
$rows1 = $db->query($q1);
foreach($rows1 as $time1){
    if($time1[1] <= time()){
        $sql = "DELETE FROM vipcmt WHERE id=$time1[0]";
        $db->exec($sql);
        echo 'Đã Xóa ID <font color="red"><b>'.$time1[2].'</b></font> <b>VIP COMMENT</b> Hết Hạn<br>';
    }else{
       echo 'ID: <font color="green"><b>'.$time1[2].'</b></font> <b>VIP COMMENT</b> Vẫn Còn Hiệu Lực<br>';
}
}
$q2 = "SELECT id,time,idfb FROM vipshare";
$rows2 = $db->query($q2);
foreach($rows2 as $time2){
    if($time2[1] <= time()){
        $sql = "DELETE FROM vipshare WHERE id=$time2[0]";
        $db->exec($sql);
        echo 'Đã Xóa ID <font color="red"><b>'.$time2[2].'</b></font> <b>VIP SHARE</b> Hết Hạn<br>';
    }else{
       echo 'ID: <font color="green"><b>'.$time2[2].'</b></font> <b>VIP VIP SHARE</b> Vẫn Còn Hiệu Lực<br>';
}
}
$q3 = "SELECT id,time,name FROM CAMXUC";
$rows3 = $db->query($q3);
foreach($rows3 as $time3){
    if($time3[1] <= time()){
        $sql = "DELETE FROM vipshare WHERE id=$time3[0]";
        $db->exec($sql);
        echo 'Đã Xóa ID <font color="red"><b>'.$time3[2].'</b></font> <b>BOT CẢM XÚC</b> Hết Hạn<br>';
    }else{
       echo 'ID: <font color="green"><b>'.$time3[2].'</b></font> <b>BOT CẢM XÚC</b> Vẫn Còn Hiệu Lực<br>';
}
}
?>