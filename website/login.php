
<!--================header =================-->
<?php
include 'includes/header.php';
?>
    <!--================navbar  =================-->
<?php
include 'includes/navbar.php';
?>
<!--================ login =================-->
<main>
<section class="login_area section_gap">
    <div class="container">
        <div class="row" id="l_in">
            <div class="col-lg-offset-1">

                            <div class="login_info d-flex">

    <form action="_signin.php" class="form-signin" method="post" id="login-form">
        <h4 class="text-center"> SIGNIN </h4>
<div class="form-row my-4">
    <div class="col-lg-offset-1">
        <input type="email"  required name="email" id="email" class="form-control" placeholder="email">
    </div>

</div>

<div class="form-row my-4">

    <div class="col-lg-offset-1">
        <input type="password"  required name="password" id="password" class="form-control" placeholder="password">
    </div>
</div>



<div class="submit  my-4">
    <div class="form-row">
    <button type="submit" name="signin-submit" class="btn btn-primary">submit</button>
</div>
</div>
</div>
            </div>
        </div>
    </div>
</section>
</main>
    <!--================footer  =================-->

<?php
include 'includes/footer.php';
?>