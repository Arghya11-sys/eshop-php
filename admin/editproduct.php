<?php 
include('inc/header.php'); 
include('../middleware/adminmiddleware.php'); 
?>
<div class="container">
    <div class="row">
      <div class="col-md-12">
        <?php
            if(isset($_GET['id']))
            {
                $id =$_GET['id'];

                $products = getByID("products",$id);
                if(mysqli_num_rows($products)>0)
                {
                    $data = mysqli_fetch_array($products);
                    ?>
                        <div class="card">
                            <div class="card-header">
                                <h4>Edit Product
                                    <a href="product.php" class="btn btn-primary float-end">Back</a>
                                </h4>
                            </div>
                            <div class="card-body">
                                <form action="code.php" method="POST" enctype="multipart/form-data">
                                    <div class="row">
                                    <div class="col-md-12">
                                            <lable for="">Select Category</lable>
                                            <select class="form-select mb-2" name="category_id">
                                                <option selected>Select Category</option>
                                                <?php 
                                                $categories = getAll("categories");
                                                if(mysqli_num_rows($categories) > 0)
                                                {
                                                    foreach ($categories as $item ){
                                                        ?>
                                                            <option value="<?= $item['id']; ?>"<?= $data['category_id'] == $item['id']?'selected':'' ?>><?= $item['name']; ?></option>
                                                        <?php
                                                    }
                                                
                                                }else{
                                                    echo "No Category available";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <input type="hidden" name="id" value="<?= $data['id']; ?>">
                                        <div class="col-md-6">
                                            <lable class="mb-0">Name</lable>
                                            <input type="text" require name="name" value="<?= $data['name']; ?>" placeholder="Enter a Category Name" class="from-control mb-2">
                                        </div>
                                        <div class="col-md-6">
                                            <lable class="mb-0">Slug</lable>
                                            <input type="text" require name="slug" value="<?= $data['slug']; ?>" placeholder="Enter a slug" class="from-control mb-2">
                                        </div>
                                        <div class="col-md-12">
                                            <lable class="mb-0">Small Description</lable>
                                            <textarea rows="3" require name="small_desciption" placeholder="Enter a Small Description" class="from-control mb-2"><?= $data['small_desciption'];?></textarea>
                                        </div>
                                        <div class="col-md-12">
                                            <lable class="mb-0">Description</lable>
                                            <textarea rows="3"  require name="desciption" placeholder="Enter a Description" class="from-control mb-2"><?= $data['desciption'];?></textarea>
                                        </div>
                                        <div class="col-md-6">
                                            <lable class="mb-0">Original Price</lable>
                                            <input type="text" require name="original_price" value="<?= $data['original_price']; ?>" placeholder="Enter a Original Price" class="from-control mb-2">
                                        </div>
                                        <div class="col-md-6">
                                            <lable class="mb-0">Selling Price</lable>
                                            <input type="text" require name="selling_price" value="<?= $data['selling_price']; ?>" placeholder="Enter a Selling Price" class="from-control mb-2">
                                        </div>
                                        <div class="col-md-12">
                                            <lable class="mb-0">Image</lable>
                                            <input type="hidden" name="old_image" value="<?= $data['image']; ?>">
                                            <input type="file"  name="image" class="from-control mb-2">
                                            <lable class="mb-0">Current Image</lable>
                                            <img src="../uploads/<?= $data['image']; ?>" alt="Product image" height="100px" width="100px">

                                        </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <lable class="mb-0">Quantity</lable>
                                                    <input type="number" require name="qty" value="<?= $data['qty']; ?>" placeholder="Enter a Quantity" class="from-control mb-2">
                                                </div>
                                                <div class="col-md-3">
                                                    <lable class="mb-0">Trending</lable><br>
                                                    <input type="checkbox" name="trending"<?= $data['trending'] == '0'?'':'checked'?>>
                                                </div>
                                                <div class="col-md-3">
                                                    <lable class="mb-0">Status</lable><br>
                                                    <input type="checkbox"  name="status" <?= $data['status'] == '0'?'':'checked'?>>
                                                </div>
                                            </div>
                                        <div class="col-md-12">
                                            <lable class="mb-0">Meta Title</lable>
                                            <input type="text" require name="meta_title" value="<?= $data['meta_title']; ?>" placeholder="Enter a meta title" class="from-control mb-2">
                                        </div>
                                        <div class="col-md-12">
                                            <lable class="mb-0">Meta Description</lable>
                                            <textarea rows="3" require name="meta_description" placeholder="Enter a meta description" class="from-control mb-2"><?= $data['meta_description']?></textarea>
                                        </div>
                                        <div class="col-md-12">
                                            <lable class="mb-0">Meta Keywords</lable>
                                            <textarea rows="3" require  name="meta_keywords" placeholder="Enter a meta keywords" class="from-control mb-2"><?= $data['meta_keywords']?></textarea>
                                        </div>
                                    
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-primary" name="updateproducts">Add Products</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <?php 
                }
                else{
                    echo "Product not found for given id";
                }
        
            }
            else{
                echo "Id missing from url";
            }
        ?>
      </div>
    </div>
  </div>
<?php include('inc/footer.php'); ?>s