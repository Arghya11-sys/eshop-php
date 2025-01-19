<?php
session_start();
include('../function/myfunctions.php');
include('C:\xampp_pro\htdocs\shop\admin\config\db.php');


if(isset($_POST['save']))
{
    $name = $_POST['name'];
    $slug = $_POST['slug'];
    $description = $_POST['description'];
    $meta_title = $_POST['meta_title'];
    $meta_description=$_POST['meta_description'];
    $meta_keywords=$_POST['meta_keywords'];
    $popular = isset($_POST['popular']) ? '1':'0';
    $status = isset($_POST['status']) ? '1':'0';

    $image = $_FILES['image']['name'];
    $path = "../uploads";
    $image_ext = pathinfo($image, PATHINFO_EXTENSION);
    $filename = time().'.'.$image_ext;

    $ins="INSERT INTO categories 
    (name,slug,description,meta_title,meta_description,meta_keywords,popular,status,image)
    VALUES ('$name','$slug', '$description','$meta_title','$meta_description','$meta_keywords','$popular','$status','$filename')";
    $con->query($ins);
    if($con)
    {
        move_uploaded_file($_FILES['image']['tmp_name'], $path.'/'.$filename);
        redirect("addcategory.php" , "Category Added Successfully");
    }
    else
    {
        redirect("addcategory.php" , "Something Went Wrong");
    }
}
else if(isset($_POST['category_update']))
{
    $category_id = $_POST['id'];
    $name = $_POST['name'];
    $slug = $_POST['slug'];
    $description = $_POST['description'];
    $meta_title = $_POST['meta_title'];
    $meta_description=$_POST['meta_description'];
    $meta_keywords=$_POST['meta_keywords'];
    $popular = isset($_POST['popular']) ? '1':'0';
    $status = isset($_POST['status']) ? '1':'0';

    $new_image = $_FILES['image']['name'];
    $old_image = $_POST['old_image'];

    if($new_image != "")
    {
        $update_filename = $new_image;
       
    }
    else{
        $update_filename = $old_image;
    }
    $path = "../uploads";
    $update_query = "UPDATE categories SET name='$name' ,slug='$slug', description='$description', meta_title='$meta_title',
    meta_description='$meta_description',meta_keywords='$meta_keywords',popular='$popular', 
    status='$status',image='$update_filename' WHERE id='$category_id'";
    $update_query_run = mysqli_query($con, $update_query);

    if($update_query_run){
        if($_FILES['image']['name'] != "")
        {
            move_uploaded_file($_FILES['image']['tmp_name'], $path.'/'.$new_image);
            if(file_exists("../uploads/".$old_image))
            {
                unlink("../uploads/".$old_image);
            }
        }
            redirect("editcategory.php?id=$category_id","Category Update Successfully");
   } 
   else{
            redirect("editcategory.php?id=$category_id","Something Went Wrong");
   }
}
else if(isset($_POST['delete']))
{
    $did= mysqli_real_escape_string($con, $_POST['id']);

    $category_query= "SELECT * FROM categories WHERE id='$did'";
    $category_query_run = mysqli_query($con, $category_query);
    $category_data = mysqli_fetch_array($category_query_run);
    $image=$category_data['image'];

    $delete_query ="DELETE FROM categories WHERE id='$did'";
    $delete_query_run = mysqli_query($con, $delete_query);

    if($delete_query_run)
    {
        if(file_exists("../uploads/".$image))
        {
            unlink("../uploads/".$image);
        }
        redirect("category.php","Category deleted Successfully");

    }
    else
    {
        redirect("category.php","Something Went wrong");
    }

}
else if(isset($_POST['addproducts']))
{
    $category_id = $_POST['category_id'];
    $name = $_POST['name'];
    $slug = $_POST['slug'];
    $small_desciption = $_POST['small_desciption'];
    $desciption = $_POST['desciption'];
    $original_price = $_POST['original_price'];
    $selling_price = $_POST['selling_price'];
    $qty = $_POST['qty'];
    $meta_title = $_POST['meta_title'];
    $meta_description=$_POST['meta_description'];
    $meta_keywords=$_POST['meta_keywords'];
    $trending = isset($_POST['trending']) ? '1':'0';
    $status = isset($_POST['status']) ? '1':'0';

    $image = $_FILES['image']['name'];
    $path = "../uploads";
    $image_ext = pathinfo($image, PATHINFO_EXTENSION);
    $filename = time().'.'.$image_ext;

    if($name !="" && $slug !="" && $desciption !="")
    {

        $product_query="INSERT INTO products (category_id,name,slug,small_desciption,desciption,original_price,selling_price,
        image,qty,status,trending,meta_title,meta_keywords,meta_description)
        VALUES 
        ('$category_id','$name','$slug','$small_description','$desciption','$original_price','$selling_price','$filename','$qty',
        '$meta_title','$meta_description','$meta_keywords','$trending','$status')";

        $product_query_run = mysqli_query($con, $product_query);

        if($product_query_run){
            move_uploaded_file($_FILES['image']['tmp_name'], $path.'/'.$filename);
            redirect("addproduct.php" , "Product Added Successfully");
        }
        else{
            redirect("addproduct.php" , "Something went to wrong");
        }

    }else{
        redirect("addproduct.php" , "All fields are mandatory");
    }
    
}
else if(isset($_POST['updateproducts']))
{
    $product_id = $_POST['id'];
    $category_id = $_POST['category_id'];
    $name = $_POST['name'];
    $slug = $_POST['slug'];
    $small_desciption = $_POST['small_desciption'];
    $desciption = $_POST['desciption'];
    $original_price = $_POST['original_price'];
    $selling_price = $_POST['selling_price'];
    $qty = $_POST['qty'];
    $meta_title = $_POST['meta_title'];
    $meta_description=$_POST['meta_description'];
    $meta_keywords=$_POST['meta_keywords'];
    $trending = isset($_POST['trending']) ? '1':'0';
    $status = isset($_POST['status']) ? '1':'0';

    $path = "../uploads";
    $new_image = $_FILES['image']['name'];
    $old_image = $_POST['old_image'];

    if($new_image != "")
    {
        $image_ext = pathinfo($new_image, PATHINFO_EXTENSION);
        $update_filename =time().'.'.$image_ext;
       
    }
    else{
        $update_filename = $old_image;
    }
    $update_product_query="UPDATE products SET name='$name' ,slug='$slug',small_desciption='$small_desciption', desciption='$desciption',
    original_price='$original_price',selling_price='$selling_price',qty='$qty', meta_title='$meta_title', meta_description='$meta_description',
    meta_keywords='$meta_keywords',trending='$trending', status='$status',image='$update_filename' WHERE id='$product_id'";

    $update_product_query_run = mysqli_query($con, $update_product_query);
    
    if($update_product_query)
   {
        if($_FILES['image']['name'] !="")
        {
            move_uploaded_file($_FILES['image']['tmp_name'],$path.'/'.$update_filename);
            if(file_exists("../uploads/".$old_image))
            {
                unlink("../uploads/".$old_image);

            }
        }
        redirect("editproduct.php?id=$product_id","Product Update Successfully");
   }
   else
   {
     redirect("editproduct.php?id=$product_id","Something went wrong");
   }
}
else if(isset($_POST['delete_product']))
{
    $product_id= mysqli_real_escape_string($con, $_POST['id']);

    $product_query= "SELECT * FROM products WHERE id='$product_id'";
    $product_query_run = mysqli_query($con, $product_query);
    $product_data = mysqli_fetch_array($product_query_run);
    $image=$product_data['image'];

    $delete_query ="DELETE FROM products WHERE id='$product_id'";
    $delete_query_run = mysqli_query($con, $delete_query);

    if($delete_query_run)
    {
        if(file_exists("../uploads/".$image))
        {
            unlink("../uploads/".$image);
        }
        redirect("product.php","Product deleted Successfully");
        

    }
    else
    {
       redirect("product.php","Something Went wrong");

    }
    
}
else if(isset($_POST['update_Order_Btn'])){
    $track_no = $_POST['tracking_no'];
    $order_status = $_POST['order_status'];

    $updateOrder_query = "UPDATE orders SET status='$order_status' WHERE tracking_no='$track_no'";
    $updateOrder_query_run = mysqli_query($con, $updateOrder_query);
    
    redirect("view_order.php?t=$track_no","Order status update successfully");

}
else
{
    header('location: ../index.php');
}

?>