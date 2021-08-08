<?php
  session_start();
  $_SESSION["usertype"] = "logout";
  unset($_SESSION["usertype"]);
  echo ' <div class="div1">
         <p id="p1">You Are Logout</p>
          <a href="http://localhost/project%20internship1/website/">home--></a>
        </div>'
?>
