<?php
include('client-session.php');
?>

<html class=" js flexbox canvas canvastext webgl no-touch geolocation postmessage websqldatabase indexeddb hashchange history draganddrop websockets rgba hsla multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients cssreflections csstransforms csstransforms3d csstransitions fontface generatedcontent video audio localstorage sessionstorage webworkers applicationcache svg inlinesvg smil svgclippaths"><!--<![endif]--><head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>Edit Offer | EZ-UI</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width">

  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/bootstrap-responsive.min.css">
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="css/sl-slide.css">

  <script src="js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>

  <!-- Le fav and touch icons -->
  <link rel="shortcut icon" href="images/ico/favicon.ico">
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
  <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head>

<body>

  <!--Header-->
  <header class="navbar navbar-fixed-top">
    <div class="navbar-inner">
      <div class="container">
        <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </a>
        <a id="logo" class="pull-left" href="index.html"></a>
        <div class="nav-collapse collapse pull-right">
          <ul class="nav">
                        <li><a href="index.html">Home</a></li>
                        
            <li class="active"><a href="client-offer-list.php">Offer List</a></li> 
            <li><a href="djobbid.html">Job History</a></li>
                        <li><a href="services.html">Developer</a></li>
                        
                      
                        <li><a href="contact-us.html">Contact </a></li>
                        <li class="login">
                            
                  <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">|&nbsp;&nbsp; <?php echo $login_session; ?> <i class="icon-angle-down"></i></a>
                  <ul class="dropdown-menu">
                    <li><a href="career.html">Account</a></li>
                    <li><a href="blog-item.html">Job Rating</a></li>
                    <li><a href="registration.html">Setting</a></li>
                    <li class="divider"></li>
                    
                    <li><a href="client-logout.php">Sign Out</a></li>
                  </ul>
                  
                </li>
                        </li>
                    </ul>        
        </div><!--/.nav-collapse -->
      </div>
    </div>
  </header>
  <!-- /header -->


  <section class="title">
    <div class="container">
      <div class="row-fluid">
        <div class="span6">
          <h1>Edit the Offer</h1>
        </div>
        
      </div>
    </div>
  </section>
  <!-- / .title -->       


  <section id="registration-page" class="container">
    <form class="center" action="client-edit-offerp.php" method="POST">
      <fieldset class="registration-form">
        <div class="control-group">

         <?php 

                                                
                        $c_id = $_SESSION['cid'];

                        $jid = $_GET['id'];

                        $sql = "SELECT * FROM job NATURAL JOIN client where job_id = '$jid'";


                        $query=mysqli_query($db,$sql);



                        $count = mysqli_num_rows($query);

                        if($count > 0)
                        {
                            while($row = mysqli_fetch_array($query,MYSQLI_ASSOC))
                            {
                            
                                                
                        ?> 

          <!-- Username -->
          <div class="controls">
            <input type="text" id="jobname" name="jobname" placeholder="Job Name" class="input-xlarge" required value="<?php echo "$row[job_name]"?>">
          </div>
        </div>

        <div class="control-group">
          <!-- E-mail -->
          <div class="controls">
            <textarea id="jobdes" name="jobd" placeholder="Job Description" class="input-xlarge" style="margin: 0px 0px 10px; width: 270px; height: 50px;" rows="3" required><?php echo "$row[job_des]"?></textarea>
          </div>
        </div>

        <div class="control-group">
          <!-- Password-->
          <div class="controls">
            <input type="text" id="password" name="jobcat" placeholder="Job category" class="input-xlarge" required value="<?php echo "$row[job_category]" ?>">
          </div>
        </div>

         <div class="control-group">
          <!-- Password -->
          <div class="controls">
            <input type="text" name="rate" placeholder="Payment" class="input-xlarge" value="<?php echo "$row[job_price]" ?>" required>
          </div>
          <input type="hidden" name="jid" value="<?php echo "$row[job_id]"?>">
        </div>
        <?php
          }
        }  

        ?>
        <div class="control-group">
          <!-- Button -->
          <div class="controls">
            <input type="submit" class="btn btn-success btn-large btn-block" value="UPDATE OFFER">
          </div>
        </div>
      </fieldset>
    </form>
  </section>
  <!-- /#registration-page -->



<!--Footer-->
<footer id="footer">
    <div class="container">
        <div class="row-fluid">
            <div class="span5 cp">
                © 2013 <a target="_blank" href="http://shapebootstrap.net/" title="Free Twitter Bootstrap WordPress Themes and HTML templates">ShapeBootstrap</a>. All Rights Reserved.
            </div>
            <!--/Copyright-->

            <div class="span6">
                <ul class="social pull-right">
                    <li><a href="#"><i class="icon-facebook"></i></a></li>
                    <li><a href="#"><i class="icon-twitter"></i></a></li>
                    <li><a href="#"><i class="icon-pinterest"></i></a></li>
                    <li><a href="#"><i class="icon-linkedin"></i></a></li>
                    <li><a href="#"><i class="icon-google-plus"></i></a></li>                       
                    <li><a href="#"><i class="icon-youtube"></i></a></li>
                    <li><a href="#"><i class="icon-tumblr"></i></a></li>                        
                    <li><a href="#"><i class="icon-dribbble"></i></a></li>
                    <li><a href="#"><i class="icon-rss"></i></a></li>
                    <li><a href="#"><i class="icon-github-alt"></i></a></li>
                    <li><a href="#"><i class="icon-instagram"></i></a></li>                   
                </ul>
            </div>

            <div class="span1">
                <a id="gototop" class="gototop pull-right" href="#"><i class="icon-angle-up"></i></a>
            </div>
            <!--/Goto Top-->
        </div>
    </div>
</footer>
<!--/Footer-->

<!--  Login form -->
<div class="modal hide fade in" id="loginForm" aria-hidden="false">
    <div class="modal-header">
        <i class="icon-remove" data-dismiss="modal" aria-hidden="true"></i>
        <h4>Login Form</h4>
    </div>
    <!--Modal Body-->
    <div class="modal-body">
        <form class="form-inline" action="index.html" method="post" id="form-login">
            <input type="text" class="input-small" placeholder="Email">
            <input type="password" class="input-small" placeholder="Password">
            <label class="checkbox">
                <input type="checkbox"> Remember me
            </label>
            <button type="submit" class="btn btn-primary">Sign in</button>
        </form>
        <a href="#">Forgot your password?</a>
    </div>
    <!--/Modal Body-->
</div>
<!--  /Login form -->

<script src="js/vendor/jquery-1.9.1.min.js"></script>
<script src="js/vendor/bootstrap.min.js"></script>
<script src="js/main.js"></script>



</body></html>