<?php
$menu = "report_p5"
?>
<?php include("header.php"); ?>

<?php

$query_my_order = "SELECT p.p_name, SUM(o.total) AS totol
FROM tbl_order_detail as o
INNER JOIN tbl_product as p ON p.p_id=o.p_id
INNER JOIN tbl_order as ord ON ord.order_id=o.order_id
WHERE ord.order_status =4
GROUP BY o.p_id ORDER BY  totol DESC LIMIT 5
"
or die
("Error : ".mysqlierror($query_my_order));
$rs_my_order = mysqli_query($condb, $query_my_order);
//echo ($query_my_order);//test query
//exit();


//ดักการเข้าถึง path
if($_SESSION["ref_l_id"]=="1"){ 
  //echo "Are Your Admin";
  //exit();
  Header("Location: admin/");

}
else{
echo "<script>";
  echo "alert(\" ไม่สามารถเข้าถึงหน้านี้ได้\");"; 
  echo "window.history.back()";
echo "</script>";
}
?>


?>

<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/data.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>

<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <h1>Dashboard</h1>
    </div><!-- /.container-fluid -->
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="card card-gray">
      <div class="card-header ">
        <h3 class="card-title">Report Top 5</h3>
        
      </div>
      <br>
      <div class="card-body">
        <div class="row">
          
          <div class="col-md-12">
          <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
          
          
          
          <table class="table" id="datatable" >
              <thead>
                <tr>
                  
                  <th>ชื่อสินค้า</th>
                  <th>จำนวนยอดขาย</th>
                  
                </tr>
              </thead>
              <tbody>
                <?php
                foreach($rs_my_order as $rs_order){
                echo"<tr>";
                  echo "<td>".$rs_order['p_name']."</td>";
                  echo "<td>".$rs_order['totol']."</td>";
                  
                  
                echo"</tr>";
                }
                ?>
                
              </tbody>
            </table>
            
            
            
          </div>
          
        </div>
        
      </div>
    </div>


    <div class="card-footer">
      
    </div>
    
  </div>
  
</section>
<!-- /.content -->

<script>

$(function () {

$('#container').highcharts({
data: {
table: 'datatable',
},

chart: {
type: 'column', 
},
title: {
text: 'รายงานภาพรวมยอดขาย 5 อันดับแรก ที่ขายดี',
style: {

}
},
plotOptions: {
series: {
colorByPoint: true, 

borderWidth: 2,
dataLabels: {
enabled: true,

style: {

},
}
}
},

xAxis: {
//gridLineWidth: 1,
labels: {
style: {

font: '11px Trebuchet MS, Verdana, sans-serif'
}
},
title: {
text: 'สินค้า',
style: {

fontWeight: 'bold',
fontSize: '12px',
fontFamily: 'Trebuchet MS, Verdana, sans-serif'
}
}
},
yAxis: {
labels: {
style: {

font: '11px Trebuchet MS, Verdana, sans-serif'
}
},
allowDecimals: false,
title: {
text: 'ยอดขาย',
style: {


}

}
},
legend: {
itemStyle: {

fontWeight: 'bold'
}
},


tooltip: {
formatter: function () {
return '<b>' + this.series.name + '</b><br/>' +
this.point.y + ' ' + this.point.name.toLowerCase();
}
}
});
});

</script>

<?php include('footer2.php'); ?>


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