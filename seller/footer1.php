<?php
include('header.php');
include('nav.php');


	$sqlFol1=$conn->query("select * from cms  where cms_id='7' ");


$nS=$sqlFol1->rowCount();

if(isset($_GET['delid']))
{
	$sqlD=$conn->query("delete from cms where cms_id='".$_GET['delid']."'");
	
	if($sqlD)
	{
		
		echo '<script>window.location.href="view-cms.php?sucmsg=Cms Deleted"</script>';
	}
	else
	{
		$errmsg="Admin Not Deleted ! Try Again";
	}
}




?>

<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <!-- /.box -->

              <div class="box">
                <div class="box-header">
                  <h3 class="">Pages (<?php echo $nS;  ?>)</h3>
                  
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
                      <tr>
                     <td><strong>Sl No</strong></td>
                        <td><strong >Title</strong></td>
               
                   
                        
						 <td><strong>Action</strong></td>
						  
					
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                    $i=1;
					while($rowS=$sqlFol1->fetch())
					{
						
						?>
                      <tr>
                        <td><?php echo $i;?></td>
						 
                        <td style="color:red;text-align:left; text-transform:uppercase"><?php echo $rowS['cms_title']?> </td>
					
						 
						 
			
					   <td ><a href="edit-cms.php?editid=<?php echo $rowS['cms_id']?>"><i class="fa fa-edit"></i> Edit</a></td>
					   
					   
                      </tr>
                      <?php
					  $i++;
					}
					?>
                     
                    </tbody>
                    <tfoot>
                       <tr>
                     <td><strong>Sl No</strong></td>
                        <td><strong >Title</strong></td>
               
                   
                        
						 <td><strong>Action</strong></td>
						  
					
                      </tr>
                    </tfoot>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div>
     <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
  <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- DataTables -->
    
<?php
include('footer.php');
?>