 <?php
include('header.php');
include('nav.php');


	$sqlFol1=mysqli_query($conn,"select * from users  order by id desc");
	$nS=mysqli_num_rows($sqlFol1);
	
	
//   $seller_id = $_SESSION['seller_id'];
//   $seller_query= "select users.user_fname,users.user_lname,users.email,users.mobile from users inner join book_order on users.id=book_order.user_id  where FIND_IN_SET ($seller_id,book_order.seller_id)  order by book_order.id desc";
// 	$nS=mysqli_num_rows($sqlFol1);




?>
 
<style>
.btn-change{
    background-color: #605ca8;
    border-color: #605ca8;
    color:white;
}
.btn-change:hover {
   background-color: #605ca8;
    border-color: #605ca8;
    color:white;
}
.label-pending
{
background-color: #f39c12;
}
</style>
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <!-- /.box -->

              <div class="box">
                <div class="box-header">
                  <h3 class="">Customers(<?php echo $nS;  ?>)</h3>
               
                  <?php
				     
                  if(isset($_GET['sucmsg']))
				  {
				  ?>
                  <center><h3 class="box-title" style="color:green;"><i class="fa fa-check"></i> <?php echo $_GET['sucmsg'];  ?> </h3></center>
                  <?php
				  }
				  if(isset($errmsg))
				  {
					  ?>
                      <center><h3 class="box-title" style="color:red"><i class="fa fa-times"></i> <?php echo $errmsg;  ?> </h3></center>
                      <?php
				  }
				  ?>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive">
                  <table id="example1" class="table table-bordered table-striped" style="text-align:center">
                    <thead>
                      <tr style="font-weight:bold">
                                               		<td style="width: 46px;">#</td>
                         			 
							      <td>Username</td>
                                  <td>Name</td>
                                  <td>Email</td>
                                  <td>Mobile no.</td>
                                  <td>Address</td>
                                  <td>Gender</td>
                                  <td>DOB</td>
							                      
						                      	
                        </tr>
                    </thead>
                    <tbody>
                   <?php 
                   $i=1;
                   while($rowOrder=mysqli_fetch_assoc($sqlFol1))
					  {
						  
						  
						  
					
						  ?>
                        <tr id="row<?php echo $i?>">
                        <td><span  ><?php echo $i;?> </span></td>
      
                          <td><?php echo $rowOrder['username']?></td>
	<td><?php echo $rowOrder['user_fname']?> <?php echo $rowOrder['userl_name']?></td>	
  <td><?php echo $rowOrder['email']?> </td>
	<td><?php echo $rowOrder['mobile']?> </td>
	<td><span>Add.:- <?php echo $rowOrder['address'];?>&nbsp <?php echo $rowOrder['city'];?>&nbsp<?php echo $rowOrder['zipcode'];?> &nbsp<?php echo $rowOrder['state'];?>&nbsp <?php echo $rowOrder['country']?></span></td>
	
  <td><?php echo $rowOrder['gender'];?></td>
  <td><?php echo $rowOrder['dob']?></td>
  		

                        </tr>
                        <?php
					$i++;	
					  }
					  ?>
                    </tbody>
                    <tfoot>
                    <tr style="font-weight:bold">
                         				<td>#</td>
                         			 	<td>Username</td>
                                  <td>Name</td>
                                  <td>Email</td>
                                    <td>Mobile no.</td>
                                    <td>Address</td>
                                    <td>Gender</td>
                                    <td>DOB</td>
                                    
                                    
                                  </tr>
                    </tfoot>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
     <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
  <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- DataTables -->
    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables/dataTables.bootstrap.min.js"></script> 
    <script>
      $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
      });
    </script>   
    
    
    

<?php
include('footer.php');
?>