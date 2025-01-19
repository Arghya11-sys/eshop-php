<?php 
include('inc/header.php'); 
include('../middleware/adminmiddleware.php');
?>
<div class="container">
    <div class="row">
     <div class="col-md-12">
        <div class="card">
            <div class="card-header">
               <h4>Orders</h4> 
            </div>
                    <div class="table">
                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>User</th>
                                <th>Tracking No</th>
                                <th>Price</th>
                                <th>Date</th>
                                <th>View</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $orders = getAllOrders();

                                    if(mysqli_num_rows($orders) > 0)
                                    {
                                        foreach($orders as $item){
                                            ?>
                                                <tr>
                                                    <td><?= $item['id']; ?></td>
                                                    <td><?= $item['name']; ?></td>
                                                    <td><?= $item['tracking_no']; ?></td>
                                                    <td><?= $item['total_price']; ?></td>
                                                    <td><?= $item['created_at']; ?></td>
                                                    <td>
                                                        <a href="view_order.php?t=<?= $item['tracking_no']; ?>" class="btn btn-primary">View Detials</a>
                                                    </td>

                                                </tr>
                                            <?php

                                        }

                                    }else{
                                        ?>
                                            <tr>
                                                <td colspan="5">No Orders Yet</td>
                                            </tr>
                                        <?php
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
             
    <!-- Optional JavaScript; choose one of the two! -->
<?php include('inc/footer.php'); ?>