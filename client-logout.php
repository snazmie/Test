<?php
   session_start();
   
   session_destroy();
      header("Location: client-sign-in.html");
   
?>