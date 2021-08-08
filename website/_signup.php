<?php

include 'signup_panel/signup_design.php';

 //Accessing form data
  $firstname = $_POST["firstname"];
  $lastname = $_POST["lastname"];
  $email = $_POST["email"];
  $password = $_POST["password"];
  $address = $_POST["address"];
  $gender = $_POST["gender"];
  $city = $_POST["city"];
  $state = $_POST["state"];
  $pin = $_POST["pin"];
  $branch = $_POST["branch"];
  $selector = $_POST["selector"];

  //Database connection details
  $servername ="localhost";
  $username ="root";
  $pass ="";
  $dbname="e-learning";

  //Connnecting to Server Database
  $conn = mysqli_connect($servername,$username,$pass,$dbname);

  //Checking if the User already exist
  $query ="Select firstname,lastname,email from signup";
  $result =  mysqli_query($conn,$query);

  // 0 in the below variables means that data that user submitted does not exist in the Database...
  // 1 in the below variables means that data that user submitted already exist in the Database...
  $fname = 0;
  $lname = 0;
  $emil = 0;

  while($obj = mysqli_fetch_assoc($result))
  {
    if($firstname == $obj["firstname"])
    {
      $fname = 1;
    }
    if($lastname == $obj["lastname"])
    {
      $lname = 1;
    }
    if($email == $obj["email"])
    {
      $emil = 1;
    }
  }

  if($fname == 0 || $lname == 0)
  {
     if($emil == 0)
     {
        // Write your code here since this user submitted data does not exist till now...
        $id = mysqli_num_rows($result);
        $id = $id + 1;

        $query2 ="INSERT INTO signup VALUES ('$id','$firstname','$lastname','$email','$password','$address','$gender','$city','$state','$pin','$branch','$selector');";
        $result2 =  mysqli_query($conn,$query2);
        $a = mysqli_affected_rows($conn);

        if($a == 1)//Write code here if sign up is Successful...
        {
            echo '<div class="sA">SiGN UP   SUCCESSFUL</div>';
            include 'login.php';
        }
        else//Write code here if sign up is Failed...
        {
            echo '<div class="sB">SIGN UP FAILED!!!</div>';
            include 'register.php';
        }
     }
     else
     {
       echo '<div  class="sB">This user already exist... pls try again with another email </div>';
       include 'register.php';
     }
  }
  else
  {
     //Write your code here to show user a error message to let them know there exist a user already with the same data submitted by this user..
     echo '<div  class="sB">This user already exist... pls try again with another firsname or lastname </div>';
     include 'register.php';
  }



  ?>
