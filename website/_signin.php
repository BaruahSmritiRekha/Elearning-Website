<?php
  session_start();
  include 'signin_panel/signin_panel_design.php';

  //Accessing form data
  $email = $_POST["email"];
  $password = $_POST["password"];

 //Database connection details
  $servername ="localhost";
  $username ="root";
  $passw ="";
  $dbname="e-learning";

  //Connnecting to Server Database
  $conn = mysqli_connect($servername,$username,$passw,$dbname);

  //Checking if the User details are correct
  $query ="Select email,password from signup";
  $result =  mysqli_query($conn,$query);

  $emil = 0;
  $pass = 0;

  while($obj = mysqli_fetch_assoc($result))
  {
    if($email == $obj["email"])
    {
     $emil = 1;
    }
    if($password == $obj["password"])
    {
     $pass = 1;
    }

  }


  if($emil == 1 && $pass == 1)
  {
  // checking id for email
   $query ="Select id from signup where email ='$email'";
   $result =  mysqli_query($conn,$query);

   while($obj = mysqli_fetch_assoc($result))
   {
       $emil = $obj["id"];
   }
   // checking id for password
   $query ="Select password from signup where id ='$emil'";
   $result =  mysqli_query($conn,$query);

   while($obj = mysqli_fetch_assoc($result))
   {
        $pass = $obj["password"];
   }
   //Checking if both ids of email and password match...
   if($password == $pass)
   {
     //write code here when signin Successful...
    

     $query ="Select * from signup where email ='$email'";
     $result =  mysqli_query($conn,$query);

     while($obj = mysqli_fetch_assoc($result))
     {
       $_SESSION["adminfn"] = $obj["firstname"];
       $_SESSION["adminln"] = $obj["lastname"];
       $_SESSION["adminemail"] = $obj["email"];
       $_SESSION["adminbr"] = $obj["branch"];

       $_SESSION["usertype"] =  $obj["selector"];

     }

     include 'index.php';
   }
   else
   {
    // write code here when signin failed...

    // echo "<h1>SignIn Failed<h1><h2>...please try again<h2>";
     echo ' <div class="div1">
            <p id="p1">SIGNIN FAILED!!!</p>
            <p id="p2">please try again...</p>
           </div>';
     include 'index.php';
   }

  }
  else
  {
     // write code here when signin failed...

     // echo "<h1>SignIn Failed<h1><h2>...please try again<h2>";
     echo '<div class="div1">
            <p id="p1">SIGNIN FAILED!!!</p>
            <p id="p2">please try again...</p>
           </div>';
     include 'login.php';
  }




?>
