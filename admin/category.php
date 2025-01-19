<?php 
include('inc/header.php'); 
include('../middleware/adminmiddleware.php'); 
?>
<div class="container">
    <div class="row">
     <div class="col-md-12">
        <div class="card">
            <div class="card-header">
               <h4>Categories</h4> 
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>  
                            <th>Image</th>
                            <th>Status</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $category = getAll("categories");
                            if(mysqli_num_rows($category) > 0)
                            {
                                foreach($category as $item){
                                ?>
                                    <tr>
                                        <td><?= $item['id']; ?></td>
                                        <td><?= $item['name']; ?></td>
                                        <td><img src="../uploads/<?= $item['image']; ?>" width="100px" height="100px" alt="<?= $item['name']; ?>"></td>
                                        <td><?= $item['status'] == '0'?"Visible":"Hidden" ?></td>
                                        <td>
                                            <a href="editcategory.php?id=<?= $item['id']; ?>" Class="btn btn-sm btn-primary">Edit</a>
                                        </td>
                                        <td>
                                            <form action="code.php" method="post">
                                                <input type="hidden" name="id" value="<?= $item['id']; ?>">
                                                <button onclick="return confirm('Are you Sure?');" type="submit" class="btn btn-sm btn-danger" name="delete" >Delete</button>
                                            </form>
                                        </td>
                                        
                                    </tr>
                                <?php
                                }
                            }
                            else
                            {
                                echo "No Records found";
                            }
                        ?>
                        
                    </tbody>

                </table>
            </div>
        </div>
     </div>
    </div>
  </div>
<?php include('inc/footer.php'); ?>