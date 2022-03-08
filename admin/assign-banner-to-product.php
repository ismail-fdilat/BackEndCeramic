<?php
	include('header.php');
	
	// $dat = date('d-m-Y');
	// $dat = strtotime(date('d-m-Y'));
	$dat = strtotime(date('d-m-Y'));

	$sqlFol1=mysqli_query($conn, "select * from banner ");
//$sqlFol1=mysqli_query($conn, "select * from deal where end_date_str >= '$dat'");

	if(isset($_POST['submit']))
	{
		$deals=$_POST['deals'];
		$product=$_POST['product'];
	  	//$offerprice = $_POST['offerprice'];	
	
		
		$sqlDeal =mysqli_query($conn, "select start_date,end_date,start_time,end_time from deal where deal_id = '$deals'");
		$fetchDeal = mysqli_fetch_assoc($sqlDeal); 
		
	   // $startstr = strtotime($fetchDeal['start_date']);
        //$endstr = strtotime($fetchDeal['end_date']);
        
        $startstr = 0;
        $endstr = 0;
        $fetchDeal['start_date'] = 0;
        $fetchDeal['end_date'] = 0;
        $fetchDeal['start_time'] = 0;
        $fetchDeal['end_time'] = 0;
		$i = 0;
		$erroroffer = 0;
	/*	for($k = 0;$k < count($product); $k++){
			//echo $offerprice[$i];
			//echo !is_numeric($offerprice[$i]); die;
			
			if(!is_numeric($_POST['offerprice'.$product[$k]]) && $_POST['offerprice'.$product[$k]] == 0 ){
				$msg1 = "Please add price";
				$erroroffer = 1;
				
			}
		}*/
		if($erroroffer == 0){
			
		
		for($i = 0;$i < count($product); $i++){
		    $offerprice = 0;
		   	$insertuser = "INSERT INTO `assigned_deals_to_product`(`deal_id`,`product_id`,`start_date`,`end_date`,`start_time`,`end_time`,`offer_price`,`start_date_str`,`end_date_str`)VALUES ('".$deals."','".$product[$i]."','".$fetchDeal['start_date']."','".$fetchDeal['end_date']."','".$fetchDeal['start_time']."','".$fetchDeal['end_time']."','".$offerprice."','$startstr','$endstr')"; 
			$insertuser1=mysqli_query($conn,$insertuser);
			
			$update = "update product set offer_price = '".$offerprice."',startDate = '".$fetchDeal['start_date']."',start_time='".$fetchDeal['start_time']."',endDate = '".$fetchDeal['end_date']."',end_time='".$fetchDeal['end_time']."',deal_id = '".$deals."',`start_date_pstr`='".$startstr."',`end_date_pstr`='".$endstr."' where prod_id = '".$product[$i]."'";
	
			mysqli_query($conn,$update);
			
		} 
		
		
	//	$insertuser1=mysqli_query($conn,$insertuser);
			
			if($insertuser1)
			{
				echo '<script>window.location.href="assign-banner-to-product.php?sucmsg=Banner Assigned successfully"</script>';
			}
			else
			{
			
			$msg1="Assigned Slider not Added";
			}
		  }
	   
	}
	
	




?>


<script>
function subcategoryget(str){
	//alert('hi');
	$.post("ajax_subcategory.php", {cate_id: str}, function(result){
         if(result != 0){
         $("#subcat_div").show();
         $("#subcategory").prop('required',true);
        $("#subcategory").html(result);


      }else{
        $("#subcategory").prop('required',false);
         $("#subcat_div").hide();
      }
    });
}
</script>

<script>
function subcategoryget1(str){
	//alert(str);
	$.post("ajax_subcategory1.php", {cate_id: str}, function(result){
        $("#subsubcategory1").html(result);
    });
}
</script>
	<style type="text/css">
		.multiselect {
  width: 200px;
}

.selectBox {
  position: relative;
}

.selectBox select {
  width: 100%;
  font-weight: bold;
}

.overSelect {
  position: absolute;
  left: 0;
  right: 0;
  top: 0;
  bottom: 0;
}

#checkboxes {
  display: none;
  border: 1px #dadada solid;
  padding-bottom: 20px;
}

#checkboxes label {
  display: block;
}

	</style>
	
	
	
<div class="content-body">
    <div class="container-fluid">
		<div class="row">
	        <h2 class="mb-3 me-auto">Add Banner To Products</h2>
                <?php
              if(isset($_GET['sucmsg']))
			  {
			  ?>
              <h3 class="box-title" style="color:green;"><i class="fa fa-check"></i> <?php echo $_GET['sucmsg'];  ?> </h3>
              <?php
			  }
			  if(isset($errmsg))
			  {
				  ?>
                  <h3 class="box-title" style="color:red"><i class="fa fa-times"></i> <?php echo $errmsg;  ?> </h3>
                  <?php
			  }
			  ?>
			  <?php if(isset($msg1))
				{
				?>
					<p style="color:#e74c3c; font-weight:bold" align="center"><i class="fa fa-times"></i> <?php echo $msg1;?></p>
				<?php
				}
				if(isset($sucmsg))
					{
				?>
					<p style="color:#2ecc71; font-weight:bold" align="center"><i class="fa fa-check"></i> <?php echo $sucmsg;?></p>
				<?php
					}
			  ?>
  	    </div>
	    
	    <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="basic-form">
                            <form role="form" method="post" action="" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                       	<label for="exampleInputEmail1">Banners</label>
                    					<select  class="default-select form-control wide" id="exampleInputEmail1" name="deals" required>
                    						
                    						<?php $rowS= mysqli_fetch_assoc($sqlFol1);?>
                    						<option value="<?php echo $rowS['b_id']; ?>">Banner</option>
                    						<?php 
                    						
                    						$sql="SELECT banner.b_id, assigned_deals_to_product.* 
                                                    from assigned_deals_to_product 
                                                    LEFT JOIN banner on banner.b_id=assigned_deals_to_product.deal_id 
                                                    WHERE banner.b_id=".$rowS['b_id']."";

                                            $result=mysqli_query($conn,$sql);
                    						$checkarr=array();
                                                while($results=mysqli_fetch_assoc($result)){
                                                 $checkarr[]=$results['product_id'];  
                                                }
                                                $valu[$rowS['deal_id']] = $checkarr;
                                            print_r($checkarr); 
                    						?>
                    					</select>
                                    </div>
                                    
                                    <div class="col-md-12 mb-3">
                                        <div class="form-group">
						<div class="selectBox" onclick="showCheckboxes()">
						
						<select class="form-control">
						<option>Select an option</option>
						</select>
						<div class="overSelect"></div>
					</div>
                    </div>
					 <div id="checkboxes" class="col-md-12">
					  <?php 
					   $sqlpro =  mysqli_query($conn, "select * from product join dir_sub_categories on dir_sub_categories.sub_category_id = product.prod_subcate_id where end_date_pstr < '".strtotime(date('d-m-Y'))."' or end_date_pstr = 0"); 
					  // $sqlpro =  mysqli_query($conn, "select * from product where end_date_pstr < '".strototime(date('d-m-Y'))."' or endDate = 0"); 
                	  while($prorow = mysqli_fetch_assoc($sqlpro)){
                	  ?>
                	  <div style="margin-top:20px; margin-bottom:20px;">
                	 
                	  <div class="col-md-8">
                      <label for="one<?php echo $prorow['prod_id'];?>">
                        <input <?php if(in_array($prorow['prod_id'], $checkarr)){ echo 'checked';} ?> name="product[]" value="<?php echo $prorow['prod_id'];?>"  type="checkbox" id="one<?php echo $prorow['prod_id'];?>" /><?php echo $prorow['prod_title'];?> ( <?php echo $prorow['sub_category_name'];?> )</label>
                	   </div>
                	  <!-- <div class="col-md-2">
                        <input type="text" name="price" class="form-control" value="<?php echo $prorow['prod_price']?>" readonly/>
                		</div>
                		<div class="col-md-2">
                        <input type="text"  class="form-control" name="offerprice<?php echo $prorow['prod_id'];?>"/>
                        </div>-->
                       </div>		
                		<div class="clearfix"></div>
                	  <?php }?>
	 
		
        
		
                     </div>
                                    </div>
                                </div>
                                
                                <button type="submit" class="btn btn-primary mt-3" name="submit">Add Offer</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
	
	
	


<?php
include('footer.php');

?>
<script>
	var expanded = false;

function showCheckboxes() {
  var checkboxes = document.getElementById("checkboxes");
  if (!expanded) {
    checkboxes.style.display = "block";
    expanded = true;
  } else {
    checkboxes.style.display = "none";
    expanded = false;
  }
}
	</script>