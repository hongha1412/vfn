<?php
if(($_GET['cmt']) && ($_GET['ngay'])){
if ($_GET['ngay'] == 30){
$vnd = array(0, 30000, 60000, 100000, 140000, 170000, 200000, 250000);
echo number_format($vnd[$_GET['cmt']]);
} elseif ($_GET['ngay'] == 60){
$vnd = array(0, 90000, 120000, 200000, 240000, 340000, 400000, 500000);
echo number_format($vnd[$_GET['cmt']]);
} elseif ($_GET['ngay'] == 90){
$vnd = array(0, 190000, 180000, 400000, 480000, 510000, 600000, 750000);
echo number_format($vnd[$_GET['cmt']]);
} else {
echo 'Không Rõ Kết Quả';
}
} 
?>