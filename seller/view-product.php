<?php
error_reporting(0);
include('header.php');



$sid=$rowuser['seller_id'];

  $sqlFol1=mysqli_query($conn, "select * from product where sid='".$sid."' ORDER BY prod_id DESC");
  
  $row = mysqli_num_rows($sqlFol1);


 
if(isset($_GET['delid']))
{
  $sqlD="delete from product where prod_id='".$_GET['delid']."'";
  $conn->exec($sqlD);
    echo '<script>window.location.href="view-product.php?sucmsg=Product Successfully Deleted"</script>';

}




?>


<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">All Products (<?php echo $row; ?>)</h4>
                        <p><a class="btn btn-primary" href="add-product.php?addid=<?php echo $rowuser['seller_id']?>">Add product</a>
                              <a class="btn btn-danger" id="deleteproduct" style="display:none" onclick="delete_product()">Delete Product </a>
                            <!--<a class="btn btn-primary" href="add_bulk_product.php">Add Bulk product</a>-->
                            <!--<a href="../seller-center/product/samplefile/upload.csv"  class="btn btn-primary" style="margin: 0px 15px;"><i class="fa fa-download" aria-hidden="true" download></i>  Download Sample File </a>-->
                            
                    
                            
                            
                            </p>
                        
                        <?php if(isset($_GET['sucmsg'])) { ?>
                          <h3 class="box-title" style="color:green;"><i class="fa fa-check"></i> <?php echo $_GET['sucmsg']; ?> </h3>
                        <?php } if(isset($errmsg)) { ?>
                            <h3 class="box-title" style="color:red"><i class="fa fa-times"></i> <?php echo $errmsg; ?> </h3>
                        <?php } ?>
                    </div>
                    <div class="card-body">
                		<div class="table-responsive">
                            <table id="example" style="min-width: 845px">
                                <thead>
                                    <td><strong>Sl No.</strong></td>
                                    <td><strong>Product Title</strong></td>
                                    <td><strong>Product Short Description</strong></td>
                                    <td><strong>Product Category</strong></td>
                                    <td><strong>Product Sub Category</strong></td>
                                    <td><strong>Product Price</strong></td>
                                    <td><strong>Sale Price</strong></td>
                                    <td><strong>Shop name , location</strong></td>
                                    <td><strong>Current Status</strong></td>
                                     <td><strong>Change Status</strong></td>
                                    <td><strong>Action</strong></td>
                                </thead>
                                
                                <tbody>
                            <?php
                            $i=1;
                            while($rowS=mysqli_fetch_assoc($sqlFol1))
                            {
        
                              if($rowS['p_status']==0)
                            {
                              $status = "<span style='color:red;'>Hide</span>"; 
                            }
                            if($rowS['p_status']==1)
                            {
                              $status = "<span style='color:green;'>Show</span>"; 
                            }
        
                            //get category 
                            $sqlFol12=mysqli_query($conn, "select * from dir_categories where category_id='".$rowS['prod_cate_id']."'");
                            
                            $row2=mysqli_fetch_assoc($sqlFol12);
                            //get sub category
                            $sqlFol13=mysqli_query($conn, "select * from dir_sub_categories where sub_category_id='".$rowS['prod_subcate_id']."'");
                            
                            $row3=mysqli_fetch_assoc($sqlFol13);
                            //get sub sub category
                            // $sqlFol14=mysqli_query($conn, "select * from sub_subcategory where sub_subcate_id='".$rowS['prod_subsub_cate_id']."'");
                            
                            // $row4=mysqli_fetch_assoc($sqlFol14);
                            
                            $sqlFolimage=mysqli_query($conn, "select * from prod_image where prod_id='".$rowS['prod_id']."' order by id asc limit 1");
                            
                            $rowimg=mysqli_fetch_assoc($sqlFolimage);
        
        
        
                              
                            ?>
                              <tr><!-- 
                     <td><input class="checkbox" value="<?php echo $rowS['prod_id'];?>" type="checkbox"> </td> -->
                              <td><?php echo $i;?>.</td>
                              
                              <td style="font-weight:bold;">
        
                              <!--<img src="upload/product/<?php echo $rowimg['image']?>" style="height:100px; width:100px" class="img-responsive thumbnail center-block" >-->
                              <img src="<?php echo $rowS['thumbnail_image']?>" style="height:100px; width:100px" class="img-responsive thumbnail center-block" >
                              <?php echo $rowS['prod_title']?> </td>
                              <td style="color:#0072C3"><?php echo $rowS['prod_desc']?></td>
                              <td style="font-weight:bold;color:#95a5a6"><?php echo $row2['category_name']?></td>
                              <td style="font-weight:bold;color:#95a5a6"><?php echo $row3['sub_category_name']?></td>
                              <td style="font-weight:bold;color:#00C700">SAR <?php echo $rowS['prod_price']?>
                              <br/>
                              </td>
                          <td style="font-weight:bold;color:#95a5a6">SAR <?php echo $rowS['sale_price'];?></td>
                              
                              <?php 
                              $cityname=mysqli_query($conn , "select * from seller where seller_id='".$sid."'");
                              $row=mysqli_num_rows($cityname);
                                 while($row=mysqli_fetch_assoc($cityname))
                            {
                             
        
        
                              ?>
                         <td style="font-weight:bold;color:#95a5a6"><?php echo $row['shop_name'];?> ,
                           <?php echo $row['city'];?>
                         </td>
                          
        
                       <?php }?>
                             <td class="my-5" style="font-weight:bold;"><?php echo $status ;?></td>
        
                           <td style="font-weight:bold;">
                          <input type="hidden" id="changestatus" value="<?php echo $rowS['p_status']?>">

                         <?php if($rowS['p_status']==1){ ?>
                         <i class="fa fa-times " style="color:red; font-size:25px;" onclick="c_status(<?php echo $rowS['prod_id']?>,'<?php echo $rowS["p_status"]?>')" id="close"></i> 
                          <?php }
                          else{ ?>
                            <i class="fa fa-check " style="color:green; font-size:25px;" onclick="c_status(<?php echo $rowS['prod_id']?>,'<?php echo $rowS["p_status"]?>')" id="right"></i>
                          <?php }?>
                        </td>
                                 
        
                              <td><a href="single-product.php?productid=<?php echo $rowS['prod_id']; ?>" class="btn btn-info">Manage</a></td>
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

    <script type="text/javascript">
 function c_status(userID,status) {


    //var status = $('#changestatus').val();
    var res = confirm('Are you sure change user Status');
  
    if(res == false){ return; }
    $.ajax({
      type: 'POST',
      url : 'product_status.php',
      data :{'status':status,'id':userID },
      success : function(data){
  
        if(status==1)
        {
           $('#ajaxResponse').html('status hide');
        }
        else
        {
           $('#ajaxResponse').html('status show');
        }
     
      $('#ajaxResponse').slideDown().delay(2000).slideUp('slow');
      setTimeout(function() {
     location.reload();
     }, 1000);
        
      }

    })


  }
 
</script>
<script>
 $('#select_all').click(function(){
    var checked1 = [];
   if(this.checked){
            $('.checkbox').each(function(){
                this.checked = true;
                checked1.push(parseInt($(this).val()));
            });
   }
   else{
     $('.checkbox').each(function(){
                this.checked = false;
        checked1.pop(parseInt($(this).val()));
            });
   }
   if(checked1.length > 0){
     $("#deleteproduct").show();
   }
   else{
     $("#deleteproduct").hide();
   }
 });
 
 $('.checkbox').on('click',function(){
   var checked1 = [];
   $("input:checkbox[class=checkbox]:checked").each(function () {
            //alert(" Value: " + $(this).val());
       checked1.push(parseInt($(this).val()));
        });
    
    if($('.checkbox:checked').length == $('.checkbox').length){
            $('#select_all').prop('checked',true);
             
        }else{
            $('#select_all').prop('checked',false);
            
            
        }
    if(checked1.length > 0){
     $("#deleteproduct").show();
    }
    else{
     $("#deleteproduct").hide();
    }
    
    //console.log(checked1);
  });
  
  function delete_product(){
    var checked1 = [];
    $("input:checkbox[class=checkbox]:checked").each(function () {
            //alert(" Value: " + $(this).val());
       checked1.push(parseInt($(this).val()));
        });
    
    $.ajax({
        type: 'POST',
        url : 'delete_product.php',
        data :{deleteproduct:'set',ids:checked1 },
        success : function(data){
  
        window.location.href="view-product.php?sucmsg=Product Deleted Successfully";
        
        }

      });
  }
</script>

<?php
include('footer.php');
?>
