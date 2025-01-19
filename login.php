<?php 
include('inc/header.php');

?>
    <div class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                <?php if(isset($_SESSION['message'])) { ?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Hey!</strong> <?= $_SESSION['message']; ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php 
                        unset($_SESSION['message']);
                        } ?>
                    <div class="card">
                        <div class="card-header">
                            <h4>LOG IN</h4>
                        </div>
                        <div class="card-body">
                            <form action="function/authcode.php" method="POST">
                                <div class="mb-3">
                                    <label  class="form-label">Email</label>
                                    <input type="email" class="form-control" name="email" placeholder="Enter your email">
                                </div>
                                <div class="mb-3">
                                    <label  class="form-label">Password</label>
                                    <input type="password" class="form-control"  name="password" placeholder="Enter your Password">
                                </div>
                                <button type="submit" class="btn btn-success" name="login">LogIn</button>
                            </form>
                        </div>    
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include('inc/footer.php'); ?>