<?php
include('header.php');

if(isset($_GET['delid']))
{
	$sqlD=mysqli_query($conn, "delete from product where prod_id='".$_GET['delid']."'");
	$sqlD=mysqli_query($conn, "delete from prod_image where prod_id='".$_GET['delid']."'");
	$sqlD=mysqli_query($conn, "delete from prod_size where prod_id='".$_GET['delid']."'");
     
	
	if($sqlD)
	{
		
		echo '<script>window.location.href="view-product.php?sucmsg=Product Deleted Successfully"</script>';
	}
	else
	{
		$errmsg="Product Not Deleted ! Try Again";
	}
}

?>
<style>
	
	.rating { 
                border: none;
                float: left;
            }
 
            .rating > input { display: none; } 
            .rating > label:before { 
                margin: 5px;
                font-size: 1.25em;
                font-family: FontAwesome;
                display: inline-block;
                content: "\f005";
            }
 
            .rating > .half:before { 
                content: "\f089";
                position: absolute;
            }
 
            .rating > label { 
                color: #ddd; 
                float: right; 
            }
 
            .rating > input:checked ~ label, 
            .rating:not(:checked) > label:hover,  
            .rating:not(:checked) > label:hover ~ label { color: #FFD700;  }
 
            .rating > input:checked + label:hover, 
            .rating > input:checked ~ label:hover,
            .rating > label:hover ~ input:checked ~ label, 
            .rating > input:checked ~ label:hover ~ label { color: #FFED85;  } 
			
	/*-----------------------*/
	
	.rating1 { 
                border: none;
                float: left;
            }
 
            .rating1 > input { display: none; } 
            .rating1 > label:before { 
                margin: 5px;
                font-size: 1.25em;
                font-family: FontAwesome;
                display: inline-block;
                content: "\f005";
            }
 
            .rating1 > .half:before { 
                content: "\f089";
                position: absolute;
            }
 
            .rating1 > label { 
                color: #ddd; 
                float: right; 
            }
 
            .rating1 > input:checked ~ label, 
            .rating1:not(:checked) > label:hover,  
            .rating1:not(:checked) > label:hover ~ label { color: #FFD700;  }
 
            .rating1 > input:checked + label:hover, 
            .rating1 > input:checked ~ label:hover,
            .rating1 > label:hover ~ input:checked ~ label, 
            .rating1 > input:checked ~ label:hover ~ label { color: #FFED85;  } 
			
			
			/*-----------------------*/
	
	.rating2 { 
                border: none;
                float: left;
            }
 
            .rating2 > input { display: none; } 
            .rating2 > label:before { 
                margin: 5px;
                font-size: 1.25em;
                font-family: FontAwesome;
                display: inline-block;
                content: "\f005";
            }
 
            .rating2 > .half:before { 
                content: "\f089";
                position: absolute;
            }
 
            .rating2 > label { 
                color: #ddd; 
                float: right; 
            }
 
            .rating2 > input:checked ~ label, 
            .rating2:not(:checked) > label:hover,  
            .rating2:not(:checked) > label:hover ~ label { color: #FFD700;  }
 
            .rating2 > input:checked + label:hover, 
            .rating2 > input:checked ~ label:hover,
            .rating2 > label:hover ~ input:checked ~ label, 
            .rating2 > input:checked ~ label:hover ~ label { color: #FFED85;  } 
			
			
			
			
		/*-----------------------*/
	
	.rating3 { 
                border: none;
                float: left;
            }
 
            .rating3 > input { display: none; } 
            .rating3 > label:before { 
                margin: 5px;
                font-size: 1.25em;
                font-family: FontAwesome;
                display: inline-block;
                content: "\f005";
            }
 
            .rating3 > .half:before { 
                content: "\f089";
                position: absolute;
            }
 
            .rating3 > label { 
                color: #ddd; 
                float: right; 
            }
 
            .rating3 > input:checked ~ label, 
            .rating3:not(:checked) > label:hover,  
            .rating3:not(:checked) > label:hover ~ label { color: #FFD700;  }
 
            .rating3 > input:checked + label:hover, 
            .rating3 > input:checked ~ label:hover,
            .rating3 > label:hover ~ input:checked ~ label, 
            .rating3 > input:checked ~ label:hover ~ label { color: #FFED85;  } 		
			
			
			
			
			
			
	
</style>


<div class="content-body">
    <div class="container-fluid">
        <div class="mb-sm-4 d-flex flex-wrap align-items-center text-head">
			<h2 class="mb-3 me-auto">Product Details</h2>
		</div>
		
		<div class="card">
		    <div class="card-body">
		        <form role="form" method="post" action="" enctype="multipart/form-data">
                    <section class="content">
                        <div class="row">
                        	<div class="col-md-12">
        			<?php
        			 if(isset($_GET['sucmsg']))
        				{
        					?>
        					<p style="color:#2ecc71; font-weight:bold" align="center"><i class="fa fa-check"></i> <?php echo $_GET['sucmsg'];?></p>	
        				<?php
                        }
        				?>
                      <!-- general form elements -->
                      <div class="box ">
                        <!-- form start -->
        			
                          <div class="row">
        				    <div class="col-xs-12  visible-xs">
        				      <!--<p style="text-align:right"><a href="single-product.php?delid=<?php echo $_GET['productid']?>" class="btn btn-danger" onclick="return confirm('Are you sure ?')"><i class="fa fa-trash-o"></i> Delete</a></p>-->
        				  </div>		
        
                            <?php
                                $fetchproductid1=mysqli_query($conn, "select * from product  where prod_id='".$_GET['productid']."'");
                                $rowproductid=mysqli_fetch_assoc($fetchproductid1);
                                $sqlFol12=mysqli_query($conn, "select * from dir_categories where category_id='".$rowproductid['prod_cate_id']."'");
                                $row2=mysqli_fetch_assoc($sqlFol12);
                                $sqlFol13=mysqli_query($conn, "select * from dir_sub_categories where sub_category_id='".$rowproductid['prod_subcate_id']."'");
                                $row3=mysqli_fetch_assoc($sqlFol13);
                                $fetchproductimg=mysqli_query($conn, "select * from prod_image  where prod_id='".$_GET['productid']."'");
                            ?>	
        
		                    <div class="col-md-9 col-sm-9">
                            <h3><?php echo $rowproductid['prod_title'] ?></h3>
                            <h4>Product Category : <span style="color:#014693"><?php echo $row2['category_name'] ?></span></h4>
                            <h4>Product Subcategory : <span style="color:#014693"><?php echo $row3['sub_category_name'] ?></span></h4>
                            <!--<h4>Per Product  : <span style="color:#014693"><?php //echo $rowproductid['qty_in_ml'] ?> </span></h4>-->
                            <!--<h4>Model Number: <span style="color:#014693"><?php //echo $rowproductid['model_number'] ?></span></h4>-->
                            <h4>Product Price : <span style="color:green">SAR <?php echo $rowproductid['prod_price'] ?></span></h4>
                            <h4>Offer Product Price : <span style="color:green">SAR <?php echo $rowproductid['sale_price'] ?></span></h4>
                            <h4>length , width , thickness : <span style="color:green">length :- <?php echo $rowproductid['length'] ?> ,width:- <?php echo $rowproductid['width']?> , thickness :- <?php echo $rowproductid['thickness']?></span></h4>
                            <!--<h4>total packet area :-<span style="color:green"><?php echo $rowproductid['packet_area'] ?> m<sup>2</sup></span></h4>-->
                            <h4>Stock :-<span style="color:green"><?php echo $rowproductid['quantity'] ?> m<sup>2</sup></span></h4>
                            <!--<h4>Product Offer : <?php // echo$rowproductid['offer_note'] ?></h4>-->
        
        			
                        
    				    </div>
        				    <div class="col-md-3 col-sm-3 hidden-xs">
            				    <p style="text-align:right">
                					<a href="edit-product.php?productid=<?php echo $_GET['productid']?>" class="btn btn-success btn-sm"><i class="fa fa-edit"></i> Edit</a>&nbsp;
                				<!--<a href="single-product.php?delid=<?php echo $_GET['productid']?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure ?')"><i class="fa fa-trash-o"></i> Delete</a>-->
            					</p>
        				    </div>
        				  </div>
        				  </div>
        				  
        				   
        				  <div class="box ">
                        <div class="box-header with-border">
                          <h3 class="box-title">Images</h3>
                        </div><!-- /.box-header -->
                        <!-- form start -->
        				
                       
                          <div class="my-4">
        				    <ul id="etalage" class="d-flex justify-content-around">
        				  	<?php while($rowproductimage=mysqli_fetch_assoc($fetchproductimg)){?>
        			<li>
        							
        			<img class="etalage_source_image" src="upload/product/<?php echo $rowproductimage['image'] ?>"  title="" style="height:100px; width:100px" />
        			<br>
        					
        							</li>
        						<?php } ?>
        					<li>	<img class="etalage_source_image" src="<?php echo $rowproductid['thumbnail_image']; ?>"  title="" style="height:100px; width:100px" />
        						
        						</li>
        							
        						</ul>
        				  </div>
        				  </div>
        				    <div class="box ">
                        <div class="box-header with-border">
                          <h3 class="box-title">Full Description</h3>
                        </div><!-- /.box-header -->
                        <!-- form start -->
        				
                       
                          <div class="box-body">
        				<?php echo $rowproductid['prod_desc'] ?>
        				  </div>
        				  </div>
        				
        			
        				
        				  </div>
        	            </div>
                    </section><!-- /.content -->
        	    </form>
		    </div>
		</div>
		
    </div>
</div>

    <div class="content-wrapper">
        
    </div>

	</div>
	</div>

	<link rel="stylesheet" href="etalage.css">
<script src="jquery.etalage.min.js"></script>
	
<script>
			jQuery(document).ready(function($){

				$('#etalage').etalage({
					thumb_image_width: 360,
					thumb_image_height: 360,
					source_image_width: 900,
					source_image_height: 900,
					show_hint: false,
					click_callback: function(image_anchor, instance_id){
						alert('Callback example:\nYou clicked on an image with the anchor: "'+image_anchor+'"\n(in Etalage instance: "'+instance_id+'")');
					}
				});

			});
		</script>
    <?php
include('footer.php');
?>