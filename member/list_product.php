<?php
$menu = "product"
?>
<?php include("header.php"); ?>
<?php
$query_product = "
SELECT * FROM tbl_product as p
" or die
("Error : ".mysqlierror($query_product));
$rs_product = mysqli_query($condb, $query_product);
//echo $query_product;
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
    <h1>จัดการสินค้า</h1>
    </div><!-- /.container-fluid -->
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="card card-gray">
      <div class="card-header ">
        <h3 class="card-title">รายการสินค้า</h3>
        <div align="right">
          
          
          
          <button type="button" class="btn btn-light" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i> เพิ่มข้อมูล สินค้า</button>
          
        </div>
      </div>
      <br>
      <div class="card-body">
        <div class="row">
          
          <div class="col-md-12">
            <table id="example1" class="table table-bordered  table-hover table-striped">
              <thead>
                <tr class="danger" >
                  <th width="7%"><center>รายการสินค้าที่</th>
                  <th width="10%"><center>รูปสินค้า</th>
                  
                  <th width="20%"><center>ชื่อสินค้า</th>
                  <th width="10%"><center>ราคา</th>
                  <th width="10%"><center>จำนวน</th>
                  
                  <th width="5%" ><center>แก้ไขสินค้า</th>
                  <th width="5%"><center>ลบสินค้า</th>
                  
                </tr>
              </thead>
              <tbody>
                <?php foreach ($rs_product as $row_product) { ?>
                
                
                <tr>
                  <td align='center'><?php echo @$l+=1; ?></td>
                  <td align='center'><img src="../p_img/<?php echo $row_product['p_img']; ?>" width="100%"></td>
                  <td align='center'><?php echo $row_product['p_name']; ?></td>
                  
                  <td align='center'><?php echo $row_product['p_price']; ?></td>
                  <td align='center'><?php echo $row_product['p_qty']; ?></td>
                  
                  <td>
                    <p style="margin-bottom: 10px;">
                      <a href="product_edit.php?p_id=<?php echo $row_product['p_id']; ?>" class="btn btn-warning"><i class="fas fa-pencil-alt"></i> </a>
                    </p>
                    
                    <!-- <a href="level.php?ace=edit&l_id=<?php echo $row_product['l_id'];?>" class="btn btn-warning btn-xs"> edit</a> -->
                  </td>
                  <td><a href="product_db.php?p_id=<?php echo $row_product['p_id']; ?>&&product=del" class="del-btn btn btn-danger"><i class="fas fas fa-trash"></i> </a></td>
                  
                </tr>
                <?php
                @$total+=$row_product['p_qty'];
                }
                
                //echo $total;
                ?>
              </tbody>
            </table>
            <?php if(isset($_GET['d'])){ ?>
            <div class="flash-data" data-flashdata="<?php echo $_GET['d'];?>"></div>
            <?php } ?>
            <script>
            $('.del-btn').on('click',function(e){
            e.preventDefault();
            const href = $(this).attr('href')
            Swal.fire({
            imageUrl: '../logo_fordev22_2.png',
            imageWidth: 250,
            //imageHeight: 100,
            title: 'Are you sure to delete?',
            text: "You won't be able to revert this!",
            // icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
            if (result.value) {
            document.location.href = href;
            
            }
            })
            })
            const flashdata = $('.flash-data').data('flashdata')
            if(flashdata){
            swal.fire({
            type : 'success',
            title : 'Record Deleted',
            text : 'Record has been deleted',
            icon: 'success'
            })
            }
            </script>
            
            
            
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
      <form action="product_db.php" method="POST" enctype="multipart/form-data">
        
        <input type="hidden" name="product" value="add">
        <div class="modal-content">
          <div class="modal-header bg-dark">
            <h5 class="modal-title" id="exampleModalLabel">เพิ่มข้อมูลสินค้า</h5>
            <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-group row">
              <label for="" class="col-sm-2 col-form-label">ชื่อสินค้า </label>
              <div class="col-sm-10">
                <input  name="p_name" type="text" required class="form-control"  placeholder="สติ้กเกอร์"  minlength="3"/>
              </div>
            </div>
            
          </span>
          <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">รายละเอียดสินค้า </label>
            <div class="col-sm-10">
              <textarea name="p_detail" rows="3" placeholder="ขนาด ก x ย x ส" class="form-control"></textarea>
            </div>
          </div>
          <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">ราคาสินค้า </label>
            <div class="col-sm-10">
              <input  name="p_price" type="number" min="0" required class="form-control"  placeholder="100 บาท"  minlength="3"/>
            </div>
          </div>
          <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">จำนวน </label>
            <div class="col-sm-10">
              <input  name="p_qty" type="number" min="0" required class="form-control"  placeholder="10 ชิ้น"  minlength="3"/>
            </div>
          </div>
          <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">รูปสินค้า</label>
            <div class="col-sm-10">
              
              
              
              
              เลือกไฟล์ใหม่<br>
              <div class="custom-file">
                <input type="file" class="custom-file-input" id="p_img" name="p_img" onchange="readURL(this);" >
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
