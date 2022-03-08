 <?php
include('header.php');

$query = "select * from product_taxrate";
$result = mysqli_query($conn, $query);
$row = $result->fetch_assoc();
?>

 <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">-->
 <style>
     .modal-backdrop.fade.in {
        display: none !important;
    }
 </style> 
 
 
<div class="content-body">
    <div class="container-fluid">
		<div class="row">
	        <h2 class="mb-3 me-auto">Tax</h2>
	    </div>
	    
	    <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>S.no</th>
                                        <th>Tax</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td><?php echo $row['tax'];?> %</td>
                                        <td><button class="btn btn-info btn-md" data-bs-toggle="modal" data-bs-target="#myModal">update</button></td>
                                    </tr>
                                </tbody>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
 
 
 
 
 
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Change Tax</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                    </button>
                </div>
                <div class="modal-body">
                    <span><strong>Tax in %</strong></span><br>
                    <div class="row">
                        <div class="col-md-8">
                            <input class="form-control" type="number" id="tax1" value="<?php echo $row['tax'];?>">
                            <input type="hidden" id="id1" value="<?php echo $row['tax_id'] ?>" >
                        </div>
                        
                        <div class="col-md-4">
                            <button  class="btn btn-info btn-md" onclick="update()">Update</button>
                        </div>
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    

 <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>-->
  <!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>-->
     <!--<link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">-->
  <!--<script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>-->
    <!-- Bootstrap 3.3.5 -->
    <!--<script src="bootstrap/js/bootstrap.min.js"></script>-->
    <!-- DataTables -->
    <!--<script src="plugins/datatables/jquery.dataTables.min.js"></script>-->
    <!--<script src="plugins/datatables/dataTables.bootstrap.min.js"></script> -->
    
    <script>
        function update()
        {
            var id=$("#id1").val();
            var tax=$("#tax1").val();
           
              $.ajax({
            url: "update_tax.php",
            type: "POST",
            data: {id:id, tax:tax},
            success: function (data) {
                if(data==1){
              location.reload();
              }}
                });
           
        }
        
    </script>
    
<?php include('footer.php');?>