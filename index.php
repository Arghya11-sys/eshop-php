<?php 
include('function/userfunctions.php');
include('inc/header.php');
include('inc/slider.php');
?>
<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="text-center fw-bold shadow">Trendung Products</h4>
                <hr>
                    <!-- <div class="row"> -->
                        <div class="owl-carousel">
                            <?php
                                    $trendingProducts = getAllTrending();
                                    if(mysqli_num_rows($trendingProducts) > 0)
                                    {
                                        foreach($trendingProducts as $item)
                                        {
                                            ?>
                                            <div class="item">
                                                <a href="productview.php?product=<?= $item['slug']; ?>">
                                                    <div class="card shadow">
                                                        <div class="card-body">
                                                            <img src="uploads/<?= $item['image']; ?>" alt="Product Image" class="w-100">

                                                            <h6 class="text-center"><?= $item['name']; ?></h6>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                                
                                            <?php
                                        }
                                    }
                            ?>
                        </div>
                    <!-- </div> -->
            </div>       
        </div>
    </div>
</div>

<div class="py-5 bg-f2f2f2">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="text-center fw-bold shadow">About Us</h4>
                <hr>
                <div class="underline"></div>
                    <p>
                    Welcome to [Your Company Name], your number one source for [products you sell, e.g., fashion, electronics, home goods]. We're dedicated to giving you the very best of [category], with a focus on quality, customer service, and uniqueness.
                    </p>
                    <p>
                    Founded in [year] by [Founder’s Name], [Your Company Name] has come a long way from its beginnings as a [start: e.g., small online store or hobby]. When [Founder’s Name] first started out, their passion for [reason: e.g., providing eco-friendly products, offering high-quality fashion] drove them to do intense research and gave them the motivation to turn hard work and inspiration into a booming online store. We now serve customers all over [locations or regions you ship to], and are thrilled to be a part of the [industry type: e.g., eco-friendly, fast-paced, fair trade] wing of the [industry: e.g., fashion, tech, lifestyle] industry.
                    </p>
                    <p>
                    We believe in providing excellent products with excellent customer service, always ensuring our customers leave satisfied. Our focus on [key selling points: quality, affordability, sustainability] sets us apart from the rest.
                    </p>
                    <p>
                    We hope you enjoy our products as much as we enjoy offering them to you. If you have any questions or comments, please don't hesitate to contact us.
                    <br>
                    Sincerely,[Founder’s Name], [Your Company Name]
                    </p>
                                    
                
            </div>       
        </div>
    </div>
</div>

<div class="py-5 bg-dark">
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                <h4 class="text-white">PHP Ecom</h4>
                <div class="underline md-2"></div>
                <a href="index.php" class="text-white"><i class="fa fa-angle-right">Home</i></a><br>
                <a href="#" class="text-white"><i class="fa fa-angle-right">About us</i></a><br>
                <a href="cart.php" class="text-white"><i class="fa fa-angle-right">My Cart</i></a><br>
                <a href="categories.php" class="text-white"><i class="fa fa-angle-right">Our Collections</i></a>
            </div> 
            <div class="col-md-2">
                    <h4 class="text-white">Address</h4>
                    <p class="text-white">
                        Royal Park,Barrackpore,
                        North 24 PGS
                        Kolkata:700121,India.
                    </p>
                    <a href="tel:+917278479075"><i class="fa fa-phone"></i>+91 7278479075</a><br>
                    <a href="mailto:sinha11arghya@gmail.com"><i class="fa fa-envelope"></i>sinha11arghya@gmail.com</a>
            </div> 
            <div class="col-md-4">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d650.36241128939!2d88.38847440678565!3d22.76519608796233!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39f89a30ecdafba9%3A0x508f743a7ddbacc9!2s97%2FA%2C%20Patulia%2C%20Kolkata%2C%20Chak%20Kanthalia%2C%20West%20Bengal%20700122!5e0!3m2!1sen!2sin!4v1726123955295!5m2!1sen!2sin" class="w-100" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>        
        </div>
    </div>
</div>
<div class="py-2 bg-danger">
    <div class="text-center">
        <p class="md-0 text-white">All rights reserved. Copyright @ Arghya Sinha</p>
    </div>
</div>


             
    <!-- Optional JavaScript; choose one of the two! -->
<?php include('inc/footer.php'); ?>

<script>
    $(document).ready(function (){
        $('.owl-carousel').owlCarousel({
            loop:true,
            margin:10,
            nav:true,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:3
                },
                1000:{
                    items:5
                }
            }
        })

    });
</script>