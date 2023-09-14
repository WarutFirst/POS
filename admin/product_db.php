<?php 
include('../condb.php');



if (isset($_POST['product']) && $_POST['product']=="add") {

   

     $p_name = mysqli_real_escape_string($condb,$_POST["p_name"]);
	$p_detail = mysqli_real_escape_string($condb,$_POST["p_detail"]);

	$p_price = mysqli_real_escape_string($condb,$_POST["p_price"]);
	$p_qty = mysqli_real_escape_string($condb,$_POST["p_qty"]);



	$date1 = date("Ymd_His"); 
	$numrand = (mt_rand());
	$p_img = (isset($_POST['p_img']) ? $_POST['p_img'] : '');
	$upload=$_FILES['p_img']['name'];
	if($upload !='') { 

		$path="../p_img/";
		$type = strrchr($_FILES['p_img']['name'],".");
		$newname =$numrand.$date1.$type;
		$path_copy=$path.$newname;
		// $path_link="../p_img/".$newname;
		move_uploaded_file($_FILES['p_img']['tmp_name'],$path_copy);  
	}else{
		$newname='';
	}

    
	$sql = "INSERT INTO tbl_product

	(
	 p_name, p_detail, p_price, p_qty, p_img
	)
	VALUES
	(
	'$p_name',
	'$p_detail',
	'$p_price',
	'$p_qty',
	'$newname'
	)";

	$result = mysqli_query($condb, $sql) or die ("Error in query: $sql " . mysqli_error($condb). "<br>$sql");

	
	//exit();
	//mysqli_close($condb);

	if($result){
	echo "<script type='text/javascript'>";
	//echo "alert('เพิ่มข้อมูลเรียบร้อย');";
	echo "window.location = 'list_product.php?product_add=product_add'; ";
	echo "</script>";
	}else{
	echo "<script type='text/javascript'>";
	echo "window.location = 'list_product.php?product_add_error=product_add_error'; ";
	echo "</script>";
	}

} 

elseif (isset($_POST['product']) && $_POST['product']=="edit") {

   //echo "Edit";
   //echo "<pre>";
   //print_r($_POST);
   //print_r($_FILES);
   //echo "</pre>";
   //exit();

   $p_id = mysqli_real_escape_string($condb,$_POST["p_id"]);
	
	$p_name = mysqli_real_escape_string($condb,$_POST["p_name"]);
	$p_detail = mysqli_real_escape_string($condb,$_POST["p_detail"]);

	$p_price = mysqli_real_escape_string($condb,$_POST["p_price"]);
	$p_qty = mysqli_real_escape_string($condb,$_POST["p_qty"]);

	$file1 = $_POST['file1'];//รับไฟล์เดิม

	$date1 = date("Ymd_His");
	$numrand = (mt_rand());
	$p_img = (isset($_POST['p_img']) ? $_POST['p_img'] : '');
	$upload=$_FILES['p_img']['name'];
	if($upload !='') { 

		$path="../p_img/";
		$type = strrchr($_FILES['p_img']['name'],".");
		$newname =$numrand.$date1.$type;
		$path_copy=$path.$newname;
		// $path_link="../p_img/".$newname;
		move_uploaded_file($_FILES['p_img']['tmp_name'],$path_copy);  
	}else{
		$newname=$file1;
	}




	
	$sql = "UPDATE tbl_product SET 
			  p_name = '$p_name', 
              p_detail = '$p_detail', 
              p_price = '$p_price', 
              p_qty = '$p_qty',  
              p_img = '$newname'
	
	
	WHERE p_id=$p_id" ;

	$result = mysqli_query($condb, $sql) or die ("Error in query: $sql " . mysqli_error($condb). "<br>$sql");
	mysqli_close($condb);
	
	if($result){
	echo "<script type='text/javascript'>";
	//echo "alert('แก้ไขข้อมูลเรียบร้อย');";
	echo "window.location = 'product_edit.php?p_id=$p_id&&product_edit=product_edit'; ";
	echo "</script>";
	}else{
	echo "<script type='text/javascript'>";
	echo "window.location = 'product_edit.php?p_id=$p_id&&product_edit_error=product_edit_error'; ";
	echo "</script>";
	}




}

elseif (isset($_GET['product']) && $_GET['product']=="del"){ 

 //echo "del";
 //echo "<pre>";
 //print_r($_GET);
 //echo "</pre>";
 //exit();

	
	
  $p_id  = mysqli_real_escape_string($condb,$_GET["p_id"]);
  $sql = "DELETE FROM tbl_product WHERE p_id=$p_id";
  $result = mysqli_query($condb, $sql) or die ("Error in query: $sql " . mysqli_error());	
  //mysqli_close($condb);
  
  
  echo "<script type='text/javascript'>";
  echo "window.location = 'list_product.php?product_del=product_del'; ";
  echo "</script>";
	
}else{
          echo "<script type='text/javascript'>";
	  echo "window.location = 'list_product.php?product_no=product_no';";
	  echo "</script>";
  
}
 
?>