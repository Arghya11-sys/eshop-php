<?php 
include('inc/header.php'); 
include('../middleware/adminmiddleware.php'); 
?>
<div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Add Product</h4>
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
                                             <option value="<?= $item['id']; ?>"><?= $item['name']; ?></option>
                                        <?php
                                    }
                                  
                                }else{
                                    echo "No Category available";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <lable class="mb-0">Name</lable>
                            <input type="text" require name="name" placeholder="Enter a Category Name" class="from-control mb-2">
                        </div>
                        <div class="col-md-6">
                            <lable class="mb-0">Slug</lable>
                            <input type="text" require name="slug" placeholder="Enter a slug" class="from-control mb-2">
                        </div>
                        <div class="col-md-12">
                            <lable class="mb-0">Small Description</lable>
                            <textarea rows="3" require name="small_desciption" placeholder="Enter a Small Description" class="from-control mb-2"></textarea>
                        </div>
                        <div class="col-md-12">
                            <lable class="mb-0">Description</lable>
                            <textarea rows="3"  require name="desciption" placeholder="Enter a Description" class=" from-control mb-2"></textarea>
                        </div>
                        <div class="col-md-6">
                            <lable class="mb-0">Original Price</lable>
                            <input type="text" require name="original_price" placeholder="Enter a Original Price" class="from-control mb-2">
                        </div>
                        <div class="col-md-6">
                            <lable class="mb-0">Selling Price</lable>
                            <input type="text" require name="selling_price" placeholder="Enter a Selling Price" class="from-control mb-2">
                        </div>
                        <div class="col-md-12">
                            <lable class="mb-0">Image</lable>
                            <input type="file" require name="image" class="from-control mb-2">
                        </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <lable class="mb-0">Quantity</lable>
                                    <input type="number" require name="qty" placeholder="Enter a Quantity" class="from-control mb-2">
                                </div>
                                <div class="col-md-3">
                                    <lable class="mb-0">Trending</lable><br>
                                    <input type="checkbox" name="trending">
                                </div>
                                <div class="col-md-3">
                                    <lable class="mb-0">Status</lable><br>
                                    <input type="checkbox"  name="status">
                                </div>
                            </div>
                        <div class="col-md-12">
                            <lable class="mb-0">Meta Title</lable>
                            <input type="text" require name="meta_title" placeholder="Enter a meta title" class="from-control mb-2">
                        </div>
                        <div class="col-md-12">
                            <lable class="mb-0">Meta Description</lable>
                            <textarea rows="3" require name="meta_description" placeholder="Enter a meta description" class="from-control mb-2"></textarea>
                        </div>
                        <div class="col-md-12">
                            <lable class="mb-0">Meta Keywords</lable>
                            <textarea rows="3" require  name="meta_keywords" placeholder="Enter a meta keywords" class="from-control mb-2"></textarea>
                        </div>
                    
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary" name="addproducts">Add Products</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
      </div>
    </div>
  </div>
<?php include('inc/footer.php'); ?>s