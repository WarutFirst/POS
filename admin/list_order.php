<?php 
 
$query_my_order = "SELECT o.* ,m.mem_name
FROM tbl_order as o
INNER JOIN tbl_member as m ON o.mem_id=m.mem_id

WHERE o.order_status=4
ORDER BY o.order_id DESC
"  
or die
("Error : ".mysqlierror($query_my_order));
$rs_my_order = mysqli_query($condb, $query_my_order);
//echo ($query_my_order);//test query




?>



<table id="example1" class="table table-bordered  table-hover table-striped">
  <thead>
    <tr class="danger">
      <th width="7%"><center>No.</center></th>
      <th width="20%">พนักงานขาย</th>
      <th width="20%">Status</th>
      
      <th width="10%">date</th>
      <th width="10%">จัดการ</th>
      
    </tr>
  </thead>
  <tbody>
    <?php foreach ($rs_my_order as $rs_order) { ?>
     
    
    <tr>

     <td><?php echo $rs_order['order_id']; ?></td>
     <td><?php echo $rs_order['mem_name']; ?>
        
     </td>

     <td>

      <?php $st= $rs_order['order_status']; 
            include('mystatus.php');
      ?>
       

     </td>
     
     <td><?php echo date('d/m/y H:i:s',strtotime($rs_order['order_date'])); ?></td>
     <td>

      <a href="index.php?order_id=<?php echo $rs_order['order_id'];?>&act=view" target="_blank" class="btn btn-success btn-xs"><i class="nav-icon fas fa-clipboard-list"></i> เปิดดูรายการ</a>



       


     </td>
     
    </tr>

  <?php }?>
  </tbody>
</table>