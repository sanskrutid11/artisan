
<div id="ordersBtn" >
  <h2>Order Details</h2>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Id</th>
        <th>Customer</th>
        <th>Contact</th>
        <th>Address</th>
        <th>Email</th>
        <th>Order Notes</th>
        <th>Grand Total</th>
        
        <th>More Details</th>
     </tr>
    </thead>
     <?php
    require_once'C:\xampp\htdocs\artisian\connection.php';

// Fetch all users from the database
$sql = "SELECT * FROM orders";
$result = $conn->query($sql);
      if ($result-> num_rows > 0){
        while ($row=$result-> fetch_assoc()) {
    ?>
       <tr>
          <td><?=$row["id"]?></td>
          <td><?=$row["first_name"]?></td>
          <td><?=$row["mobile"]?></td>
          <td><?=$row["address"]?></td>
          <td><?=$row["email"]?></td>
          <td><?=$row["order_notes"]?></td>
          <td><?=$row["grand_total"]?></td>
              
        <td><a class="btn btn-primary openPopup" data-href="./adminView/viewEachOrder.php?orderID=<?=$row['id']?>" href="javascript:void(0);">View</a></td>
        </tr>
    <?php
            
        }
      }
    ?>
     
  </table>
   
</div>
<!-- Modal -->
<div class="modal fade" id="viewModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          
          <h4 class="modal-title">Order Details</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="order-view-modal modal-body">
        
        </div>
      </div><!--/ Modal content-->
    </div><!-- /Modal dialog-->
  </div>
<script>
     //for view order modal  
    $(document).ready(function(){
      $('.openPopup').on('click',function(){
        var dataURL = $(this).attr('data-href');
    
        $('.order-view-modal').load(dataURL,function(){
          $('#viewModal').modal({show:true});
        });
      });
    });
 </script>