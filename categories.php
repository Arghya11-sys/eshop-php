<?php 
include('function/userfunctions.php');
include('inc/header.php');
?>

<div class="py-3 bg-primary">
    <div class="container">
        <h6 class="text-white">Home / Collection </h6>
    </div>
</div>

<div class="py-3">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
           
            <h2>Our Collections</h2>
            <hr>
                <div class="row">
                    <?php
                        $categories = getAllActive("categories");

                        if(mysqli_num_rows($categories) > 0)
                        {
                            foreach($categories as $item)
                            {
                                ?>
                                <div class="col-md-2 md-2">
                                    <a href="products.php?category=<?= $item['slug']; ?>">
                                        <div class="card shadow">
                                            <div class="card-body">
                                                <img src="uploads/<?= $item['image']; ?>" alt="Categori Image" class="w-100">

                                                <h4 class="text-center"><?= $item['name']; ?></h4>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                    
                                <?php
                            }
                        }
                        else
                        {
                            echo "No data available";
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
             
    <!-- Optional JavaScript; choose one of the two! -->
<?php include('inc/footer.php'); ?>