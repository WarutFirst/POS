<?php
$order_id = mysqli_real_escape_string($condb,$_GET['order_id']);
//echo $order_id;
		$sqlpay = "SELECT d.* , p.* ,
				m.mem_name,o.order_date,o.order_status,o.pay_amount2
				FROM tbl_order_detail AS d
				INNER JOIN tbl_product AS p ON d.p_id=p.p_id
				INNER JOIN tbl_order AS o ON d.order_id=o.order_id
				INNER JOIN tbl_member as m ON o.mem_id=m.mem_id
				WHERE d.order_id=$order_id";

				$querypay = mysqli_query($condb, $sqlpay) 
				or die("Error : ".mysqli_error($sqlpay));

				$rowmember=mysqli_fetch_array($querypay);
				$st=$rowmember['order_status'];




?>


<center>
	<h4>รายการสั่งซื้อ<br>
		Order Id : <?php echo $order_id; ?> </br>
		ว/ด/ป : <?php echo date('d/m/y',strtotime($rowmember['order_date'])); ?></br>
	ผู้ทำรายการ : <?php echo $rowmember['mem_name']; ?> <br/>สถานะ :
	<?php include('mystatus.php');?>
	</h4>
</center>

  <table border="0" align="center" class="table table-hover table-bordered table-striped">
    
    <tr>
  <td width="5%" align="center">ลำดับสินค้า</td>
      <td width="10%" align="center">img</td>
      <td width="35%" align="center">สินค้า</td>
      <td width="10%" align="center">ราคา/หน่วย</td>
      <td width="10%" align="center">จำนวน</td>
      <td width="15%" align="center">รวม(บาท)</td>
     
    </tr>
<?php
		
				$total=0;

	
	foreach($querypay as $rspay)
	{
		
		
		$total += $rspay['total']; //ราคารวม ทั้ง ตระกร้า
		echo "<tr>";
		echo "<td>" . @$i+=1 . "</td>";
		echo "<td>"."<img src='../p_img/".$rspay['p_img']."' width='100%'>"."</td>";
		echo "<td>" . $rspay["p_name"] . "</td>";
		echo "<td align='right'>" .number_format($rspay["p_price"],2) . "</td>";
		echo "<td align='right'>"; 



		
		echo "<input type='number' name='p_c_qty' value='$rspay[p_c_qty]' size='2'class='form-control' disabled/></td>";


		echo "<td align='right'>".number_format($rspay['total'],2)."</td>";
	
	
	}
	include('../convertnumtothai.php');
	?>

	<tr>
	
	<td></td>
	
  	<td  align='right' colspan="3">
  		<b>ราคารวม 
  			( <?php echo Convert($total);?> )

  		</b>

  		<br>

  		<b>ยอดเงินที่รับชำระ 
  			( <?php echo Convert($rowmember['pay_amount2']);?> )

  		</b>

  		<br>
  		<?php 
		$pay_amount3 = $rowmember['pay_amount2'] - $total;
		//echo $pay_amount3;
	?>
  		<b>เงินทอน 
  			( <?php echo Convert($pay_amount3);?> )

  		</b>

    </td>


  	<td align='right'colspan='2'>


  		<b><?php echo number_format($total,2);?> Baht</b>

  		<br>
  			<b><?php echo number_format($rowmember['pay_amount2'],2);?> Baht</b>
  		<br>
  			<b><?php echo number_format($pay_amount3,2);?> Baht</b>



  	</td>
  	
	</tr>


	

	

</table>
<br>

<a href="#" target="" class="btn btn-success" onclick="window.print()">Print</a>