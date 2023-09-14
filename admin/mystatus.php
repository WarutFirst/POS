<?php 

if($st==1){
	echo '<font color="red">';
	echo 'รอชำระเงิน';
	echo '</font>';
}elseif ($st==2) {
	echo '<font color="green">';
	echo 'ชำระเงินแล้ว';
	echo '</font>';
}elseif ($st==3) {
	echo '<font color="blue">';
	echo 'ส่งของแล้ว';
	echo '</font>';
}elseif ($st==4) {
	echo '<font color="green">';
	echo 'ขายหน้าร้านรับเงินแล้ว';
	echo '</font>';
}


?>