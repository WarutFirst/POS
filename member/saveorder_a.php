<?php
include("../condb.php");
 //error_reporting( error_reporting() & ~E_NOTICE );
	session_start();

	//echo "<pre>";
	//print_r($_SESSION);
	//print_r($_SESSION['cart']);
    //echo "<br>";
    //print_r($_POST);
	//echo "</pre>";
	//exit();
	
      
$mem_id=$_SESSION['mem_id'];

if (@$_SESSION['mem_id'] == ''){

  session_destroy();

  //echo '<script>';
  //echo"alert('ไม่สำเร็จ');";
  //echo "window.location='index.php';";
  //echo'</script>';
}
?>



<!--สร้างตัวแปรสำหรับบันทึกการสั่งซื้อ -->
<?php
	$mem_id = $_REQUEST["mem_id"];
	$receive_name = 'ลูกค้าหน้าร้าน';
	
	
	$order_status = 4;
	
	$b_name = 'ชำระหน้าร้าน';
	
	$pay_amount = $_REQUEST["pay_amount"];//ยอดเงินรวม
	$pay_amount2 = $_REQUEST["pay_amount2"];//ยอดเงินที่ต้องจ่าย
	
	$order_date = Date("Y-m-d G:i:s");

	

	

	//บันทึกการสั่งซื้อลงใน order
	mysqli_query($condb, "BEGIN"); 
	$sql1	= "INSERT INTO tbl_order 
	VALUES
	(null, 
	'$mem_id',
	'$receive_name',
	
	 
	'$order_status', 
	
	'$b_name', 
	
	 
	'$pay_amount', 
	'$pay_amount2',
	
	'$order_date'
	)";
	$query1	= mysqli_query($condb, $sql1)
	or die ("Error : ".mysqlierror($sql1));

	//echo $sql1;
	//echo "<hr/>";
	// exit();

	//ฟังก์ชั่น MAX() จะคืนค่าที่มากที่สุดในคอลัมน์ที่ระบุ ออกมา หรือจะพูดง่ายๆก็ว่า ใช้สำหรับหาค่าที่มากที่สุด นั่นเอง.
	$sql2 = "SELECT MAX(order_id) as order_id 
	FROM tbl_order 
	WHERE mem_id='$mem_id'";
	$query2	= mysqli_query($condb, $sql2) or die ("Error : ".mysqlierror($sql2));
	$row = mysqli_fetch_array($query2);
	$order_id = $row["order_id"];

	//echo "order_id"." = ".$row["order_id"];
	//exit();

	foreach($_SESSION['cart'] as $p_id=>$qty)
	{
		//query3 เพื่อให้รู้ว่า ใน ตระกร้าสินค้า มีการสั่งซื้อสินค้าอะไรบ้าง เพื่อให้เอาราคาสินค้าต่อหน่วย มาคูณกับ จำนวนสั่งซื้อทั้งหมดและเก็บลงตาราง order_detail
		$sql3	= "SELECT * FROM tbl_product WHERE p_id=$p_id";
		$query3	= mysqli_query($condb, $sql3) or die ("Error : ".mysqlierror($sql3));
		$row3	= mysqli_fetch_array($query3);
		$total	= $row3['p_price']*$qty;

		$count=mysqli_num_rows($query3);//นับว่ามีการqueryได้ไหม



		//echo"<pre>";
		//print_r($row3);
		//echo"</pre>";
		//echo $total;
		//exit();
		
		$sql4	= "INSERT INTO tbl_order_detail 
				   VALUES (null,
				   '$order_id', 
				   '$p_id', 
				   '$qty', 
				   '$total'
				   )";
		$query4	= mysqli_query($condb, $sql4) or die ("Error : ".mysqlierror($sql4));
		
		//echo $sql4;

		//ตัดสต๊อก
		for($i=0; $i<$count; $i++){
			$have =  $row3['p_qty'];
			
			$stc = $have - $qty;
 
			$sql5 = "UPDATE tbl_product SET  
		     p_qty=$stc
		     WHERE  p_id=$p_id ";
		  $query5 = mysqli_query($condb, $sql5) or die ("Error : ".mysqlierror($sql5));
			
			//echo "<br>";
			//echo "ยอดคงเหลือ".$stc;
			//echo "<hr>"; 
			}
			/*   stock  */

	}

	//exit();
	//ถ้าทำงานครบตามเงื่อนไข
	if($query1 && $query4){
		mysqli_query($condb, "COMMIT");//จะ COMMIT บันทึกสำเร็จคือบันทึก sql1 กับ sql4 แล้ว
		$msg = "บันทึกข้อมูลเรียบร้อยแล้ว ";

		foreach($_SESSION['cart'] as $p_id)//วนซ้ำ $_SESSION['cart'] เพื่อเช็คเตรียมจะunset
		{	
			//unset($_SESSION['cart'][$p_id]);
			unset($_SESSION['cart']);//unset($_SESSION['cart'][$p_id]);
		}
	}
	else{
		mysqli_query($condb, "ROLLBACK");  
		$msg = "บันทึกข้อมูลไม่สำเร็จ กรุณาติดต่อเจ้าหน้าที่ค่ะ ";	
	}

?>

<script type="text/javascript">
	//alert("<?php echo $msg;?>");
	window.location ='index.php?order_id=<?php echo $order_id;?>&act=view&&save_ok=save_ok';
</script>