<?php 
include('inc/header.php'); 
include('../middleware/adminmiddleware.php'); 
?>
<div class="container">
    <div class="row">
      <div class="col-md-12">
        <?php
        if(isset($_GET['id'])){
            $id =$_GET['id'];
            $category = getByID("categories",$id);
            if(mysqli_num_rows($category)>0){
                $data = mysqli_fetch_array($category);
        ?>
            <div class="card">
                <div class="card-header">
                    <h4>Edit Category
                    <a href="category.php" class="btn btn-primary float-end">Back</a>
                    </h4>
                </div>
                <div class="card-body">
                    <form action="code.php" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <input type="hidden" name="id" value="<?= $data['id']?>">
                            <div class="col-md-6">
                                <lable for="">Name</lable>
                                <input type="text" name="name" value="<?= $data['name']?>" placeholder="Enter a Category Name" class="from-control">
                            </div>
                            <div class="col-md-6">
                                <lable for="">Slug</lable>
                                <input type="text" name="slug"  value="<?= $data['slug']?>" placeholder="Enter a slug" class="from-control">
                            </div>
                            <div class="col-md-12">
                                <lable for="">Description</lable>
                                <textarea rows="3" name="description"  placeholder="Enter a Description" class="from-control"><?= $data['description']?></textarea>
                            </div>
                            <div class="col-md-12">
                                <lable for="">Image</lable>
                                <input type="file" name="image" class="from-control">
                                <lable for="">Current Image</lable>
                                <input type="hidden" name="old_image" value="<?= $data['image']?>">
                                <img src="../uploads/<?= $data['image']?>" width="100px" height="100px" alt="<?= $data['name']?>">
                            </div>
                            <div class="col-md-12">
                                <lable for="">Meta Title</lable>
                                <input type="text" name="meta_title" value="<?= $data['meta_title']?>" placeholder="Enter a meta title" class="from-control">
                            </div>
                            <div class="col-md-12">
                                <lable for="">Meta Description</lable>
                                <textarea rows="3" name="meta_description"  placeholder="Enter a meta description" class="from-control"><?= $data['meta_description']?></textarea>
                            </div>
                            <div class="col-md-12">
                                <lable for="">Meta Keywords</lable>
                                <textarea rows="3" name="meta_keywords" placeholder="Enter a meta keywords" class="from-control"><?= $data['meta_keywords']?></textarea>
                            </div>
                            <div class="col-md-6">
                                <lable for="">Popular</lable>
                                <input type="checkbox" <?= $data['popular'] ? "checked":""?> name="popular">
                            </div>
                            <div class="col-md-6">
                                <lable for="">Status</lable>
                                <input type="checkbox" <?= $data['status'] ? "checked":""?> name="status">
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary" name="category_update">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        <?php 
        }
        else{
            echo "Category not found";
        }
        }else{
            echo "ID Missing from url";
        }
        ?>
      </div>
    </div>
  </div>
<?php include('inc/footer.php'); ?>