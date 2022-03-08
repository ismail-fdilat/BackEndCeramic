<?php include"header.php";

$query = "select * from contact_us";
$result = mysqli_query($conn, $query);

?>
<style>
    #example img {
        width: auto;
        height: 50px;
        border-radius: 50px;
    }
</style>
<div class="content-body">
    <div class="container-fluid">
		<div class="row">
	        <h2 class="mb-3 me-auto">Drivers list</h2>
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
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Message</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   
                                        <?php $i=1; while($data=mysqli_fetch_assoc($result)){?>
                                        <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $data['name']?></td>
                                        <td><?php echo $data['email']?></td>
                                        <td><?php echo $data['phone']?></td>
                                        <td><?php echo $data['message']?></td>
                                        </tr>
                                    <?php $i++; } ?>
                                 
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
 
 
<?php include"footer.php";?>