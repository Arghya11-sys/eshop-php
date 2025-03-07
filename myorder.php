<?php 

include('function/userfunctions.php');
include('inc/header.php');
include('authencticate.php');
?>

<div class="py-3 bg-primary">
    <div class="container">
        <h6 class="text-white">
            <a href="index.php" class="text-white">
                Home /
            </a>
            <a href="myorder.php" class="text-white">
                 My Order
            </a>
            
    
        </h6>
    </div>
</div>

<div class="py-5">
    <div class="container">
        <div class="">
            <div class="row">
                <div class="col-md-12">
                    <div class="table">
                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tracking No</th>
                                <th>Price</th>
                                <th>Date</th>
                                <th>View</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $orders = getOrders();

                                    if(mysqli_num_rows($orders) > 0)
                                    {
                                        foreach($orders as $item){
                                            ?>
                                                <tr>
                                                    <td><?= $item['id']; ?></td>
                                                    <td><?= $item['tracking_no']; ?></td>
                                                    <td><?= $item['total_price']; ?></td>
                                                    <td><?= $item['created_at']; ?></td>
                                                    <td>
                                                        <a href="viewOrder.php?t=<?= $item['tracking_no']; ?>" class="btn btn-primary">View Detials</a>
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