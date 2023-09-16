<?php
$menu = "member"
?>


<?php include("header.php"); ?>
<?php
$query_member = "SELECT * FROM tbl_member" or die
("Error : ".mysqlierror($query_member));
$rs_member = mysqli_query($condb, $query_member);
//echo ($query_level);//test query



//ดักการเข้าถึง path
if($_SESSION["ref_l_id"]=="1"){ 
  //echo "Are Your Admin";
  //exit();
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
    <h1>จัดการสมาชิก</h1>
    </div><!-- /.container-fluid -->
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="card card-gray">
      <div class="card-header ">
        <h3 class="card-title">รายการสมาชิก</h3>
        <div align="right">
          
          
          
          <button type="button" class="btn btn-light" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i> เพิ่มข้อมูลสมาชิก</button>
          
        </div>
      </div>
      <br>
      <div class="card-body">
        <div class="row">
          
          <div class="col-md-6">
            <table id="example1" class="table table-bordered  table-hover table-striped">
              <thead>
                <tr class="danger">
                  <th width="5%"><center>รายการที่</th>
                  <th width="10%"><center>รูปภาพ</th>
                  <th width="5%"><center>ชื่อ</th>
                  <th width="5%"><center>แก้ไข</th>
                  <th width="5%"><center> ลบ</th>
                  
                </tr>
              </thead>
              <tbody>
                
                <?php foreach ($rs_member as $row_member) { ?>
                
                
                <tr>
                  <td align="center"><?php echo @$l+=1; ?></center></td>
                  <td align="center"><img src="../mem_img/<?php echo $row_member['mem_img']; ?>" width="50%"></td>
                  <td align="center"><?php echo $row_member['mem_name']; ?></td>
                  <td align="center">
                    <p style="margin-bottom: 10px;">
                      <a href="mem_edit.php?mem_id=<?php echo $row_member['mem_id'];?>" class="btn btn-warning">แก้ไข <i class="fas fa-pencil-alt"></i></a>
                    </p>
                    
                    <!-- <a href="level.php?ace=edit&l_id=<?php echo $row_level['l_id'];?>" class="btn btn-warning btn-xs"> edit</a> -->
                  </td align="center">
                  <td align="center"><a href="member_db.php?mem_id=<?php echo $row_member['mem_id']; ?>&&member=del" class="del-btn btn btn-danger" onclick="return confirm('ต้องการลบข้อมูลนี้ใช่หรือไม่?')">ลบ <i class="fas fas fa-trash"></i> </a></td>
                  
                </tr>
                <?php }?>
              </tbody>
            </table>
            
            
            
          </div>
          
        </div>
      </div>
      <div class="card-footer">
        
      </div>
      
    </div>
    
    
    
    
  </section>
  <!-- /.content -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <form action="member_db.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="member" value="add">
        <div class="modal-content">
          <div class="modal-header bg-dark">
            <h5 class="modal-title" id="exampleModalLabel">เพิ่มข้อมูล สมาชิก</h5>
            <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-group row">
              <label for="" class="col-sm-2 col-form-label">ระดับการใช้งาน </label>
              <div class="col-sm-10">
                <select class="form-control select2" name="ref_l_id" id="ref_l_id" required>
                  <option value="">-- เลือกประเภท --</option>
                  
                  <option value="1">ผู้ดูแลระบบ</option>
                  <option value="2">พนักงาน</option>
                  
                </select>
                
              </div>
            </div>
            
            <div class="form-group row">
              <label for="" class="col-sm-2 col-form-label">ชื่อ </label>
              <div class="col-sm-10">
                <input type="text" name="mem_name" class="form-control" id="mem_name" placeholder="" value="">
              </div>
            </div>
            
          </span>
          <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">ชื่อผู้ใช้ </label>
            <div class="col-sm-10">
              <input type="text" name="mem_username" class="form-control" id="mem_username" placeholder="" value="">
            </div>
          </div>
          <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">รหัสผ่าน </label>
            <div class="col-sm-10">
              <input type="password" name="mem_password" class="form-control" id="mem_password" placeholder="ใส่รหัสผ่านก่อนกดบันทึก" value="" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">รูปโปรไฟล์</label>
            <div class="col-sm-10">
              
              
              
              
              เลือกไฟล์ใหม่<br>
              <div class="custom-file">
                <input type="file" class="custom-file-input" id="mem_img" name="mem_img" onchange="readURL(this);" >
                <label class="custom-file-label" for="file">เลือกไฟล์</label>
              </div>
              <br><br>
              <img id="blah" src="#" alt="" width="300" />
            </div>
          </div>
          
          
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
          <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> ยืนยัน</button>
        </div>
      </div>
    </form>
  </div>
</div>

<?php }
else{
echo "<script>";
  echo "alert(\" ไม่สามารถเข้าถึงหน้านี้ได้\");"; 
  echo "window.history.back()";
echo "</script>";
}

include('footer.php'); ?>
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