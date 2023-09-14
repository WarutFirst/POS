<?php
include('../condb.php');
 //echo "<pre>";
 //print_r($_POST);
 //print_r($_FILES);
 //echo "</pre>";
 //exit();
$mem_id = mysqli_real_escape_string($condb,$_POST["mem_id"]);
	$ref_l_id = mysqli_real_escape_string($condb,$_POST["ref_l_id"]);
	
	$mem_name = mysqli_real_escape_string($condb,$_POST["mem_name"]);
	
	$mem_username = mysqli_real_escape_string($condb,$_POST["mem_username"]);
	$mem_password = mysqli_real_escape_string($condb,(sha1($_POST["mem_password"])));
	$mem_img2 = mysqli_real_escape_string($condb,$_POST['mem_img2']);

	$date1 = date("Ymd_His");
	$numrand = (mt_rand());
	$mem_img = (isset($_POST['mem_img']) ? $_POST['mem_img'] : '');
	$upload=$_FILES['mem_img']['name'];
	if($upload !='') { 

		$path="../mem_img/";
		$type = strrchr($_FILES['mem_img']['name'],".");
		$newname =$numrand.$date1.$type;
		$path_copy=$path.$newname;
		// $path_link="mem_img/".$newname;
		move_uploaded_file($_FILES['mem_img']['tmp_name'],$path_copy);  
	}else{
		$newname=$mem_img2;
	}

	$sql = "UPDATE tbl_member SET 
	ref_l_id='$ref_l_id',
	
	mem_name='$mem_name',
	
	mem_username='$mem_username',
	mem_password='$mem_password',
	mem_img='$newname'
	WHERE mem_id=$mem_id" ;

	$result = mysqli_query($condb, $sql) or die ("Error in query: $sql " . mysqli_error($condb). "<br>$sql");
	mysqli_close($condb);
	
	if($result){
	echo "<script type='text/javascript'>";
	//echo "alert('แก้ไขข้อมูลเรียบร้อย');";
	echo "window.location = 'edit_profile.php?mem_id=$mem_id&&mem_editp=mem_editp'; ";
	echo "</script>";
	}else{
	echo "<script type='text/javascript'>";
	echo "window.location = 'edit_profile.php?mem_id=$mem_id&&mem_editp_error=mem_editp_error'; ";
	echo "</script>";
	}



?>