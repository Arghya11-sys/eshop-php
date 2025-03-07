<?php 
include('function/userfunctions.php');
include('inc/header.php');

if(isset($_GET['category'])){
$category_slug = $_GET['category'];
$category_data = getSlugActive("categories",$category_slug);
$category = mysqli_fetch_array($category_data);
if($category)
{


$cid = $category['id'];

?>
<div class="py-3 bg-primary">
    <div class="container">
        <h6 class="text-white">
            <a href="categories.php" class="text-white">
                 Home / 
            </a>
            <a href="categories.php" class="text-white">
                 Collection /
            </a>
            <?= $category['name']; ?> </h6>
    </div>
</div>
<div class="py-3">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
           
            <h2><?= $category['name']; ?> </h2>
            <hr>
                <div class="row">
                    <?php
                        $products = getProdByCategory($cid);

                        if(mysqli_num_rows($products) > 0)
                        {
                            foreach($products as $item)
                            {
                                ?>
                                <div class="col-md-2 md-2">
                                    <a href="productview.php?product=<?= $item['slug']; ?>">
                                        <div class="card shadow">
                                            <div class="card-body">
                                                <img src="uploads/<?= $item['image']; ?>" alt="Product Image" class="w-100">

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
<?php
} 
else
{
    echo "Something Went Wrong";
}
} 
else
{
    echo "Something Went Wrong";
}
 include('inc/footer.php'); 
 ?>