<?php
error_reporting(0);
include('header.php');


$sqlproduct=mysqli_query($conn, "select * from product order by prod_id desc"); 
$prodcnt = mysqli_num_rows($sqlproduct);
?>

    <div class="content-body">
        <div class="container-fluid">
        <div class="mb-sm-4 d-flex flex-wrap align-items-center text-head">
			<h2 class="mb-0">All Products (<?php echo $prodcnt;?>)</h2>
		</div>
    	    <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="form-label">Select Seller</label>
                                    <select class="nice-select default-select form-control wide mb-3" id="seller_id" name="seller_id" onchange="getseller(this.value);">
                                        <option value="">Select Seller</option>
                                        <?php 
                                        $searchseller=mysqli_query($conn, "select * from seller"); 
                                        while($search= mysqli_fetch_assoc($searchseller)) { ?>
                
                                              <option value="<?php echo $search['seller_id']; ?>"><?php echo $search['sname']; ?></option>
                
                                        <?php } ?>
                                    </select>
                                </div>
                                
                                <div class="col-md-6">
                                    <label class="form-label" id="app_pro">Select Product</label>
                                    <select style="" class="nice-select default-select form-control wide mb-3" id="prod_id" name="prod_id" onchange="getproduct(this.value);">
                                        <option>select seller first</option>
                                    </select>
                                      <!-- <select class="form-control" id="prod_id" name="prod_id" onchange="getproduct(this.value);">
                                        <option value="#example1">Select Product</option>
                                        <?php 
                                        $sid=$search['seller_id'];
                
                                        $searchproduct=mysqli_query($conn, "select * from product where sid='".$sid."'"); 
                                        while($searchprd= mysqli_fetch_assoc($searchproduct)) { ?>
                
                                              <option value="<?php echo $searchprd['prod_id']; ?>"><?php echo $searchprd['prod_title']; ?></option>
                
                                        <?php } ?>
                                      
                                      </select> -->

                                </div>
                                
                        </div>
                    </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    
                                    
                                    <div class="table-responsive">
                                        <table id="example" class="display" style="min-width: 845px">
                                            <thead>
                                                <tr>
                                                    <th>S.No</th>
                                                    <th>Seller Name</th>
                                                    <th>City</th>
                                                    <th>Product Title</th>
                                                    <th>Product Price</th>
                                                    <!--<th>Product Short Description</th>-->
                                                    <th>Product Description</th>
                                                    <th>Product Category</th>
                                                    <th>Product Sub Category</th>
                                                    <th>Quantity</th>
                                                    <th>Sale Price</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $i=1;
                                                while($row21=mysqli_fetch_assoc($sqlproduct))
                                                {
                            
                                                $sqlcat=mysqli_query($conn,"select * from dir_categories where category_id='".$row21['prod_cate_id']."'");
                                                $sqlcategory=mysqli_fetch_assoc($sqlcat);
                            
                                                $sqlsubcat=mysqli_query($conn,"select * from dir_sub_categories where sub_category_id='".$row21['prod_subcate_id']."'");
                                                $sqlsubcategory=mysqli_fetch_assoc($sqlsubcat);
                            
                                                $sqlseller=mysqli_query($conn, "select * from seller where seller_id='".$row21['sid']."'");
                                                $queryseller=mysqli_fetch_assoc($sqlseller);
                              
                                                ?>  
                                                <tr>
                                                  <td><?php echo $i;?></td>
                                                  <td><?php echo $queryseller['sname'];?></td>
                                                  <td><?php echo $queryseller['city'];?></td>
                                                  <td><?php echo $row21['prod_title'];?></td>
                                                  <td>SAR <?php echo $row21['prod_price'];?> </td>
                                                  <!--<td><?php// echo $row21['prod_short_desc'];?></td>-->
                                                  <td><?php echo $row21['prod_desc'];?></td>
                                                  <td><?php echo $sqlcategory['category_name'];?></td>
                                                  <td><?php echo $sqlsubcategory['sub_category_name'];?></td>
                                                  <td><?php echo $row21['quantity'];?></td>
                                                  <td>SAR <?php echo $row21['sale_price'];?> </td>
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
    </div>
    
    
    
    
    <div class="modal in" id="ajaxResponse" style="background: green;height: 50px;font-size: 25px;color: white;padding-left: 90px;padding-top: 5px;text-align: center;"  aria-hidden="false">
   </div>

<?php
include('footer.php');
?>
<script type="text/javascript">
  
function getseller(val){
     var seller_id=$('#seller_id').val();    
     //alert(cid);
    
   $.ajax({
        type:"POST",
        url:"getseller.php",
        data:{seller_id:seller_id},
        success:function(data){ 
         //alert(data);
          // $("#append_select_pro").after('<option>bbbb</option><option>bbbb</option>');
    
          $("#example1").html(data);
          

          $.ajax({
        type:"POST",
        url:"ajax1.php",
        data:{seller_id:seller_id},
 // dataType: 'json',
        success:function(data1){ 
       
          $("#prod_id").html(data1);
          
          
         
       }
    });
          
         
       }
    });
  }

  function getproduct(val){
     var prod_id=$('#prod_id').val();    
     //alert(cid);
    
   $.ajax({
        type:"POST",
        url:"getproduct.php",
        data:{prod_id:prod_id},
        success:function(data){ 
         //alert(data);
    
          $("#example1").html(data);
         
       }
    });
  }
</script>
</script>
