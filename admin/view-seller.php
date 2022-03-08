<?php
include('header.php');
	
// $seller=mysqli_query($conn, "select * from seller order by seller_id desc");
$seller=mysqli_query($conn, "select seller.*, cities.city_name,cities.id 
                        from seller
                        join cities on seller.city=cities.id order by seller_id DESC");
 $sellercnt=mysqli_num_rows($seller);

?>
<style>
    span.overflow-span {
    display: block;
    overflow-wrap: break-word;
    max-width: 200px;
    height: 100px;
    overflow: auto;
}
    a.btn.btn-primary, a.btn.btn-danger {
        padding: 3px 10px;
        margin: 3px;
    }
    
</style>


<div class="content-body">
    <div class="container-fluid">
		<div class="mb-sm-4 d-flex flex-wrap align-items-center text-head">
			<h2 class="mb-3 me-auto">Seller (<?php echo $sellercnt;?>)</h2>
			
		</div>	
		
		<div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header justify-content-end">
                        <h3 class="mb-3 me-auto"> <?php if(isset($_SESSION['msg2'])){echo $_SESSION['msg2']; session_unset($_SESSION['msg2']); }?> </h3>
                        <a class="btn btn-primary" href="add_seller.php">Add Seller</a><br><br>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>SR No</th>
                                        <th>Seller Unique ID</th>
                                        <th>Seller Name</th>
                                        <th>Seller Email</th>
                                        <th>Phone Number</th>
                                        <th>City</th>
                                        <th>Shop name</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $i=1;
                                        while($rows11= mysqli_fetch_assoc($seller))
                                        {
                                    ?>  
                                    <tr id="seller_id_<?php echo $rows11['seller_id']; ?>">
                                        <td><?php echo $i;?></td>
                                        <td><?php echo $rows11['seller_uid'];?></td>
                                        <td><?php echo $rows11['sname'];?></td>
                                        <td><?php echo $rows11['semail'];?></td>
                                        <td><?php echo $rows11['phone'];?></td>
                                        <td><?php echo $rows11['city_name'];?></td>
                                        <td><?php echo $rows11['shop_name'];?></td>
                                        <td style="font-weight:bold;">
                                          <?php
                                          if($rows11['status']==0)
                                          {
                                            echo "<span style='color:red;'>Hide</span>"; 
                                          }
                                          if($rows11['status']==1)
                                          {
                                            echo "<span style='color:green;'>Show</span>"; 
                                          }
                                          ?>
                                        </td>
                                        <td>
                                        <?php if($rows11['status']==0){ ?>  
                                          <a class="btn btn-primary" href="seller_action.php?sellerid=<?php echo $rows11['seller_id']; ?>&status=<?php echo $rows11['status']; ?>&email=<?php echo $rows11['semail']; ?>">Active</a>
                                        <?php }else{ ?>
                                          <a class="btn btn-danger" href="seller_action.php?sellerid=<?php echo $rows11['seller_id']; ?>&status=<?php echo $rows11['status']; ?>">Deactive</a>
                                        <?php } ?>  
                
                                        <a class="btn btn-primary" href="edit_seller.php?seller_id=<?php echo $rows11['seller_id']; ?>"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                         <a class="btn btn-danger" onclick="delete_seller('<?php echo $rows11['seller_id']; ?>')" href="javascript:void(0)"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                        </td>
                                    </tr>
                                    <?php 
                                      $i++;
                                    } 
                                    ?> 
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
		</div>
				
    </div>
</div>


      <script>
         function delete_seller(sid)
         {
            confirm('Are you sure?')
            {
              $.ajax({
                url: "common.php",
                type: "post",
                data: {seller_id:sid} ,
                success: function (response) {
                  if(response == 1)
                  {
                     $("#seller_id_"+sid).hide();
                     
                  }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                   console.log(textStatus, errorThrown);
                }
              });
            }
             
         }
      </script>
<?php
include('footer.php');
?>