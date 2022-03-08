<?php include"header.php";

$query = "select driver.*,cities.*
            from driver
            left join cities on driver.city=cities.id";
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
                                        <th>Driver Image</th>
                                        <th>Driver name</th>
                                        <th>DOB</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>City</th>
                                        <th>Company</th>
                                        <!--<th>Action</th>-->
                                    </tr>
                                </thead>
                                <tbody>
                                   
                                        <?php $i=1; while($data=mysqli_fetch_assoc($result)){?>
                                        <tr>
                                        <td><?php echo $i; ?></td>
                                        <td id=""><a href="../Driver/images/<?php echo $data['image']?>" data-exthumbimage="../Driver/images/<?php echo $data['image']?>" data-src="../Driver/images/<?php echo $data['image']?>">
                                            <img src="../Driver/images/<?php echo $data['image']?>" class="img-fluid" alt="" />
                                            </a></td>
                                        <td><?php echo $data['name'].$data['surname']?></td>
                                        <td><?php echo $data['dob']?></td>
                                        <td><?php echo $data['phone']?></td>
                                        <td><?php echo $data['email']?></td>
                                        <td><?php echo $data['city_name']?></td>
                                        <td><?php echo $data['company_name']?></td>
                                        <!--<td><button class="btn btn-info btn-md" data-bs-toggle="modal" data-bs-target="#myModal">update</button></td>-->
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