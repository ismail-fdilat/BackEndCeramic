<?php require_once("config.php");

//$fetchsubcat=mysqli_query($conn,"select * from assign_size where category_id = '".$_POST['cate_id']."' AND subcategory_id = ''");
$fetchsubcat=mysqli_query($conn,"select * from assign_size where category_id = '".$_POST['cate_id']."'");


$rowSize= mysqli_fetch_assoc($fetchsubcat);
$size_ids=$rowSize['size_id'];
if(mysqli_num_rows($fetchsubcat) > 0){
$ids=explode(',', $size_ids);
}
  foreach ($ids as $key => $id) {

      $sqlFol4=mysqli_query($conn, "select * from  size where size_id ='$id'");
                             $ro4= mysqli_fetch_assoc($sqlFol4); ?>
        <div class="col_md_4">   
        <div class="m_row">
            <div class="col_md_12">
                <label class="checkbox_container">
                    <input style="width:20px;" type="checkbox" class="checksize" name="size[]" value="<?php echo $ro4['size_id'];?>" id="<?php echo $ro4['size_id'];?>" style="margin-left: 5px; margin-right: 5px;">
                    <span class="checkbox_checkmark"></span>
                    <?php echo $ro4['name'];?>
                </label>
          
          </div>
          <div class="col_md_12">
            <span  id="hide_<?php echo $ro4['size_id'];?>"> </span>
          </div>
          </div>
      </div>  
 <script>
  $( document ).ready(function() {
   
     $("#<?php echo $ro4['size_id'];?>").click(function() {
      if($(this).is(":checked")) {

          $("#hide_<?php echo $ro4['size_id'];?>").append('<input placeholder="Quantity" class="form_control" name="size_quan[]" type="number[]" id="input_<?php echo $ro4['size_id'];?>">');

      } else {

          $("#input_<?php echo $ro4['size_id'];?>").remove();
      }
  });
});
 </script>
<?php }
?>
