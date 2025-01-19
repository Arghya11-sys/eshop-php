<?php 
include('inc/header.php'); 
include('../middleware/adminmiddleware.php'); 
?>
<div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Add Category</h4>
            </div>
            <div class="card-body">
                <form action="code.php" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6">
                            <lable for="">Name</lable>
                            <input type="text" name="name" placeholder="Enter a Category Name" class="from-control">
                        </div>
                        <div class="col-md-6">
                            <lable for="">Slug</lable>
                            <input type="text" name="slug" placeholder="Enter a slug" class="from-control">
                        </div>
                        <div class="col-md-12">
                            <lable for="">Description</lable>
                            <textarea rows="3" name="description" placeholder="Enter a Description" class="from-control"></textarea>
                        </div>
                        <div class="col-md-12">
                            <lable for="">Image</lable>
                            <input type="file" name="image" class="from-control">
                        </div>
                        <div class="col-md-12">
                            <lable for="">Meta Title</lable>
                            <input type="text" name="meta_title" placeholder="Enter a meta title" class="from-control">
                        </div>
                        <div class="col-md-12">
                            <lable for="">Meta Description</lable>
                            <textarea rows="3" name="meta_description" placeholder="Enter a meta description" class="from-control"></textarea>
                        </div>
                        <div class="col-md-12">
                            <lable for="">Meta Keywords</lable>
                            <textarea rows="3" type="text" name="meta_keywords" placeholder="Enter a meta keywords" class="from-control"></textarea>
                        </div>
                        <div class="col-md-6">
                            <lable for="">Popular</lable>
                            <input type="checkbox" name="popular">
                        </div>
                        <div class="col-md-6">
                            <lable for="">Status</lable>
                            <input type="checkbox" name="status">
                        </div>
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary" name="save">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
      </div>
    </div>
  </div>
<?php include('inc/footer.php'); ?>