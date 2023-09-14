<?php 
$menu = "product"
?>


<?php include("header.php"); ?>

<?php 
$p_id = $_GET['p_id'];

$query_product = "SELECT * FROM tbl_product 

WHERE p_id = $p_id"  
or die("Error : ".mysqlierror($query_product));
$rs_product = mysqli_query($condb, $query_product);
$row=mysqli_fetch_array($rs_product);
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
        <h1>สินค้า</h1>
      </div><!-- /.container-fluid -->
    </section>



    <!-- Main content -->
    <section class="content">

    <div class="card card-gray">
            <div class="card-header ">
              <h3 class="card-title">แก้ไขสินค้า</h3>
              
            </div>
            <br>
            <div class="card-body">

              <div class="row">
                 
                 <div class="col-md-8">
                   <form action="product_db.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="product" value="edit">
                    <input type="hidden" name="p_id" value="<?php echo $row['p_id'];?>">
                    <input name="file1" type="hidden" id="file1" value="<?php echo $row['p_img']; ?>" />
                   

                  <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">ชื่อสินค้า </label>
                    <div class="col-sm-10">
                      <input  name="p_name" type="text" required class="form-control"  placeholder="" value="<?php echo $row['p_name']; ?>"  minlength="3"/>
                    </div>
                  </div>


                  <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">รายละเอียด </label>
                    <div class="col-sm-10">
                      <textarea name="p_detail" class="form-control"><?php echo $row['p_detail']; ?></textarea>
                    </div>
                  </div>



                  <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">ราคา </label>
                    <div class="col-sm-10">
                      <input  name="p_price" type="number" min="0" required class="form-control"  placeholder="Price" value="<?php echo $row['p_price']; ?>"  minlength="3"/>
                    </div>
                  </div>


                  <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">จำนวน </label>
                    <div class="col-sm-10">
                      <input  name="p_qty" type="number" min="0" required class="form-control"  placeholder="Qty" value="<?php echo $row['p_qty']; ?>"  minlength="3"/>
                    </div>
                  </div>


                  <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">รูปสินค้า</label>
                    <div class="col-sm-10">
                     
                  
                  
            
                  รูปเดิม<br>

                        <img src="../p_img/<?php echo $row['p_img'];?>" width="150px">
                        <input type="hidden" name="mem_img2" value="<?php echo $row['p_img'];?>">
                        <br><br>


                   

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


                    <img id="blah" src="#" alt="your image" width="300" />


                    </div>
                  </div>




                  <button type="submit" class="btn btn-danger btn-block">อัพเดต</button>



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