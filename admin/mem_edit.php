<?php 
$menu = "member"
?>
<?php include("header.php"); ?>

<?php 

$mem_id = $_GET['mem_id'];

$query_member = "SELECT * FROM tbl_member WHERE mem_id = $mem_id"  
or die("Error : ".mysqlierror($query_member));
$rs_member = mysqli_query($condb, $query_member);
$row=mysqli_fetch_array($rs_member);
//echo $row['mem_name'];
//echo ($query_member);//test query




?>

<script src="http://code.jquery.com/jquery-latest.js"></script>
      <script type="text/javascript">
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
</script>


    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <h1>Member</h1>
      </div><!-- /.container-fluid -->
    </section>



    <!-- Main content -->
    <section class="content">

    <div class="card card-gray">
            <div class="card-header ">
              <h3 class="card-title">แก้ไขข้อมูลส่วนตัว</h3>
              
            </div>
            <br>
            <div class="card-body">

              <div class="row">
                 
                 <div class="col-md-8">
                   <form action="member_db.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="member" value="edit">
                    <input type="hidden" name="mem_id" value="<?php echo $row['mem_id'];?>">
                    <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">ระดับการใช้งาน </label>
                    <div class="col-sm-10">
                      <select class="form-control select2" name="ref_l_id" id="ref_l_id" required>
                        <option value="<?php echo $row['ref_l_id'];?>">-- <?php if ($row['ref_l_id']==1) {
                          echo "ผู้ดูแลระบบ(Admin)";
                        }else{
                          echo "พนักงาน";
                        } ?> --</option>



                          <option value="">-- เลือกประเภท --</option>
                         
                          <option value="1">ผู้ดูแลระบบ(Admin)</option>
                          <option value="2">พนักงาน</option>
                          

                        </select>
                      
                    </div>
                  </div>


                  <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">ชื่อ </label>
                    <div class="col-sm-10">
                      <input type="text" name="mem_name" class="form-control" id="mem_name" placeholder="" value="<?php echo $row['mem_name'];?>">
                    </div>
                  </div>


                  <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">ชื่อผู้ใช้ </label>
                    <div class="col-sm-10">
                      <input type="text" name="mem_username" class="form-control" id="mem_username" placeholder="" value="<?php echo $row['mem_username']; ?>">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">รหัสผ่าน </label>
                    <div class="col-sm-10">
                      <input type="password" name="mem_password" class="form-control" id="mem_password" placeholder="ใส่รหัสผ่านก่อนกดบันทึก" required="" value="" required>
                    </div>
                  </div>


                  <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">รูปโปรไฟล์</label>
                    <div class="col-sm-10">
                                    
                        <img src="../mem_img/<?php echo $row['mem_img'];?>" width="300px">
                        <input type="hidden" name="mem_img2" value="<?php echo $row['mem_img'];?>">
                        <br><br>


                   

                    </div>
                  </div>



                  <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">รูปที่ต้องการเปลี่ยน</label>
                    <div class="col-sm-10">
                     
                  
                  
            
                  เลือกไฟล์ใหม่<br>


                  <div class="custom-file">
                          <input type="file" class="custom-file-input" id="mem_img" name="mem_img" onchange="readURL(this);" >
                          <label class="custom-file-label" for="file">เลือกรูป</label>
                        </div>
                        <br><br>


                    <img id="blah" src="#" alt="" width="300" />


                    </div>
                  </div>




                  <button type="submit" class="btn btn-danger btn-block">ยืนยัน</button>



                  </form>

                    

                  
                 
            
                    
                 </div>
                 
              </div>


            </div>
            <div class="card-footer">
                     
            </div>


              
    </div>



          

          
        

          



    </section>
    <!-- /.content -->





    

    
<?php include('footer.php'); ?>

<script>
  $(function () {
    $(".datatable").DataTable();
    // $('#example2').DataTable({
    //   "paging": true,
    //   "lengthChange": false,
    //   "searching": false,
    //   "ordering": true,
    //   "info": true,
    //   "autoWidth": false,
    // http://fordev22.com/
    // });
  });
</script>
  
</body>
</html>


<!-- http://fordev22.com/ -->