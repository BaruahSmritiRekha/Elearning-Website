<!--================header =================-->

<?php
include 'includes/header.php';
?>
    <!--================navbar =================-->
<?php
include 'includes/navbar.php';
?>
<!--================ register =================-->
<main>
<section class="regis_area section_gap">
    <div class="container">
        <div class="row" id="l_in">
            <div class="form-row ">
                            <div class="reg_info d-flex">

    <form action="_signup.php" class="form-signup" method="post" id="registration-form">
        <h4 class="reg"> SIGNUP </h4>

        <div class="form-row ">
            <div class="form-group col-md-5">
                <label for="firstname">Firstname</label>
                <input name="firstname" type="text" class="form-control" id="firstname" placeholder="firstname">
            </div>
            <div class="form-group col-md-5">
                <label for="lastname">lastname</label>
                <input name="lastname" type="text" class="form-control" id="lastname" placeholder="lastname">
            </div>



        </div>


            <div class="form-row">
                <div class="form-group col-md-5">
                    <label for="inputEmail4">Email</label>
                    <input name="email" type="email" class="form-control" id="inputEmail4" placeholder="Email">
                </div>
                <div class="form-group col-md-5">
                    <label for="inputPassword4">Password</label>
                    <input name="password" type="password" class="form-control" id="inputPassword4" placeholder="Password">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-5">
                <label for="inputAddress">Address</label>
                <input name="address" type="text" class="form-control" id="inputAddress" placeholder="matro pt guwahati">
            </div>
                <div class="form-group col-md-3">
                    <label>Gender</label>
                    <select name="gender" id="inputselect" class="form-control">
                        <option selected>Choose...</option>
                        <option>Male</option>
                        <option>Female</option>
                    </select>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputCity">City</label>
                    <input name="city" type="text" class="form-control" id="inputCity" placeholder="city">
                </div>
                <div class="form-group col-md-3">
                    <label for="inputState">State</label>
                    <input name="state" type="text" class="form-control" id="inputState" placeholder="state">
                </div>
                <div class="form-group col-md-2 ">
                    <label for="inputZip">Pin</label>
                    <input name="pin" type="text" class="form-control" id="inputZip" placeholder="pin">
                </div>
            </div>

        <div class="form-row">
            <div class="form-group col-md-3">
                <label for="inputbranch">Branch</label>
                <input name="branch" type="text" class="form-control" id="inputbranch" placeholder="Branch">
            </div>


        <div class="form-group col-md-3">
            <label>Select</label>
            <select name="selector" id="inputselect" class="form-control">

                <option>Teacher</option>
                <option>Student</option>
            </select>
        </div>
        </div>
            <div class="form-row pt-3 pb-2">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="gridCheck">
                    <label class="form-check-label" for="agreement">
                        I,<a href> Agree all terms & condition</a>
                    </label>
                </div>
            </div>
         <div class="form-row pt-3">
            <button type="submit" class="btn btn-primary pt-2">Sign up</button>
         </div>
        </form>



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