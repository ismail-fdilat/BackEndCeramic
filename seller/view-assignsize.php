<?php
include('header.php');
include('nav.php');
$sqlFol1=mysqli_query($conn, "select * from  assign_size ");

$row= mysqli_num_rows($sqlFol1);



//$nS=mysql_num_rows($sqlFol1);

if(isset($_GET['delid']))
{
  $sqlD="delete from assign_size where id='".$_GET['delid']."'";
    mysqli_query($conn,$sqlD);

    echo '<script>window.location.href="view-assignsize.php?sucmsg=Successfully Deleted"</script>';


}

?>
<script>
function deleteconfirm(){
  var a = window.confirm("Are you sure?");
  if(a==true){
    return true;
  } else {
    return false;
  }
}
</script>
<div class="content-wrapper">
        <!-- Content Header (Page header) -->


        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <!-- /.box -->

              <div class="box">
                <div class="box-header">
                  <h3 class="">All Size(<?php echo ($row);  ?>)</h3>
                  <p><a class="btn btn-primary" href="add-assignsize.php">Assign Sizes</a></p>

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
                     <td><strong >Category Name</strong></td>
                      <td><strong >Sub Category Name</strong></td>
                       <td><strong >Sizes Name</strong></td>
                      <td><strong>Action</strong></td>


                      </tr>
                    </thead>
                    <tbody>
                    <?php
                    $i=1;
          while($rowS= mysqli_fetch_assoc($sqlFol1))
          {
            $cat=$rowS['category_id'];
            $subcat=$rowS['subcategory_id'];

            $sqlFol2=mysqli_query($conn, "select * from  dir_categories where category_id='$cat'");
             $ro2= mysqli_fetch_assoc($sqlFol2);
            
             $sqlFol3=mysqli_query($conn, "select * from  dir_sub_categories where sub_category_id='$subcat'");
             $ro3= mysqli_fetch_assoc($sqlFol3);

          $size_ids=$rowS['size_id'];
           $ids=explode(',', $size_ids);

            
          //print_r($rowS);
            ?>
                      <tr>
                        <td><?php echo $i;?></td>
                        <td style="font-weight:bold;"><?php echo $ro2['category_name']; ?> </td>
                        <td style="font-weight:bold;"><?php echo $ro3['sub_category_name']; ?> </td>
                          <td style="font-weight:bold;">

                        <?php  foreach ($ids as $key => $id) {
                           $sqlFol4=mysqli_query($conn, "select * from  size where size_id ='$id'");
                             $ro4= mysqli_fetch_assoc($sqlFol4);
                             echo $ro4['name'].'<br>';
                          }
                             ?>
                             

                           </td>
  <td>
   <a  href="assignsize_edit.php?editid=<?php echo $rowS['id']; ?>">Edit</a>| 
  <a onclick="return confirm('Are you sure ?')" href="view-assignsize.php?delid=<?php echo $rowS['id']; ?>">Delete</a></td>
                      </tr>
                      <?php
            $i++;
          }
          ?>

                    </tbody>
                    <tfoot>
                     <tr>
                     <td><strong>Sl No</strong></td>
                     <td><strong >Category Name</strong></td>
                      <td><strong >Sub Category Name</strong></td>
                       <td><strong >Sizes Name</strong></td>
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
