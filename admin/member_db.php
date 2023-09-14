<?php 
include('../condb.php');
//echo "<pre>";
//print_r($_POST);
//print_r($_FILES);
//echo "</pre>";
// exit();

if (isset($_POST['member']) && $_POST['member']=="add") {

    $ref_l_id = mysqli_real_escape_string($condb,$_POST["ref_l_id"]);
  
    $mem_name = mysqli_real_escape_string($condb,$_POST["mem_name"]);
    $mem_username = mysqli_real_escape_string($condb,$_POST["mem_username"]);
    $mem_password = mysqli_real_escape_string($condb,(sha1($_POST["mem_password"])));
    
  
    $date1 = date("Ymd_His");
    $numrand = (mt_rand());
    $mem_img = (isset($_POST['mem_img']) ? $_POST['mem_img'] : '');
    $upload=$_FILES['mem_img']['name'];
    if($upload !='') { 
  
      $path="../mem_img/";
      $type = strrchr($_FILES['mem_img']['name'],".");
      $newname =$numrand.$date1.$type;
      $path_copy=$path.$newname;
      // $path_link="../mem_img/".$newname;
      move_uploaded_file($_FILES['mem_img']['tmp_name'],$path_copy);  
    }else{
      $newname='';
    }
  
    $check = "
    SELECT mem_username 
    FROM tbl_member  
    WHERE mem_username = '$mem_username'
    ";
      $result1 = mysqli_query($condb, $check) or die(mysqli_error());
      $num=mysqli_num_rows($result1);
  
      if($num > 0)
      {
        echo "<script>";
        
        echo "window.location = 'list_mem.php?mem_error=mem_error'; ";
        echo "</script>";
      }else{
  
      
    $sql = "INSERT INTO tbl_member
    (
    ref_l_id,
    
    mem_name,
    mem_username,
    mem_password,
    mem_img
    )
    VALUES
    (
    '$ref_l_id',
    '$mem_name',
    '$mem_username',
    '$mem_password',
    '$newname'
    )";
  
    $result = mysqli_query($condb, $sql) or die ("Error in query: $sql " . mysqli_error($condb). "<br>$sql");
  
    }
    //exit();
    //mysqli_close($condb);
  
    if($result){
    echo "<script type='text/javascript'>";
    //echo "alert('เพิ่มข้อมูลเรียบร้อย');";
    echo "window.location = 'list_mem.php?mem_add=mem_add'; ";
    echo "</script>";
    }else{
    echo "<script type='text/javascript'>";
    echo "window.location = 'list_mem.php?mem_add_error=mem_add_error'; ";
    echo "</script>";
    }



} 

elseif (isset($_POST['member']) && $_POST['member']=="edit") {

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
	echo "window.location = 'mem_edit.php?mem_id=$mem_id&&mem_edit=mem_edit'; ";
	echo "</script>";
	}else{
	echo "<script type='text/javascript'>";
	echo "window.location = 'mem_edit.php?mem_id=$mem_id&&mem_edit_error=mem_edit_error'; ";
	echo "</script>";
	}




}


elseif (isset($_GET['member']) && $_GET['member']=="del"){	

   $mem_id  = mysqli_real_escape_string($condb,$_GET["mem_id"]);
	
   $sql_del = "DELETE FROM tbl_member WHERE mem_id=$mem_id";
	
  $result_del = mysqli_query($condb, $sql_del) or die ("Error Query: ".mysqli_error());

  mysqli_close($condb);
  echo "<script type='text/javascript'>";
  echo "window.location = 'list_mem.php?mem_del=mem_del' ;";
  echo "</script>";


}

else{  
  echo "<script type='text/javascript'>";
  echo "window.location = 'list_mem.php?mem_no=mem_no' ;";
  echo "</script>";

}

?>