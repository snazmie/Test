<?php include("config.php"); //$conn ?> 
<?php
require_once  'session_check.php';

$id = $_SESSION['staffID'];
$sql_staf = "SELECT * FROM putras.staff WHERE StaffId ='$id'";
$query_staff = $conn->query($sql_staf);

$rowstaff =$query_staff->fetch_assoc();
?>
<?php
    //get uploaded data for dynamic table
    $sql = "SELECT * FROM upload WHERE app_ID = '$app_id'";
    $query = $conn -> query($sql);
    $row = $query -> fetch_assoc();

    if(isset($_POST['nama_dokumen'])) {
        $app_id = $_SESSION["app_ID"];
        $name = $_POST["nama_dokumen"];

        //upload
        $target_dir = "upload/";
        $target_file = $target_dir . basename($_FILES["muat_naik"]["name"]);
        $uploadOk = 1;
        $fileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        
        // Allow certain file formats
        if($fileType != "doc" && $fileType != "docx" && $fileType != "pdf") {
            echo "Sorry, only doc, docx and pdf files are allowed.";
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {
            //insert upload detail into database
            $sql = "INSERT INTO upload (app_ID, name, type, file_ext, upload_date) VALUES ('$app_id', '$name', '$type', '$fileType' '$date')";
            $query = $conn -> query($sql);

            //get latest upload ID
            $sqlid = "SELECT idupload FROM upload ORDER BY idupload DESC";
            $queryid = $conn -> query($sqlid);
            $rowid = $queryid -> fetch_assoc();

            //upload file to server
            $temp = explode(".", $_FILES["muat_naik"]["name"]);
            $newfilename = $rowid["idupload"] . '.' . end($temp);
            move_uploaded_file($_FILES["muat_naik"]["tmp_name"], $target_dir . $newfilename);

            echo "<script>alert('Success message!'); window.location = 'form3.php';</script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Forms</title>

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <?php include 'header_mobile.php';?>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <?php include 'sidebar.php';?>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
         <?php include 'header.php';?>
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="row">
                                            <div class="col col-md-11"><strong>Borang Permohonan Menghadiri / Membentang Kertas Kerja</strong> Muat Naik Fail ?</div>
                                            <div class="col col-md-1" align="right"> 3 / 3 </div>
                                        </div>
                                    </div>
                                    <form action="form3.php" method="post" enctype="multipart/form-data" class="form-horizontal">
                                        <div class="card-body card-block">
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="nama_dokumen" class=" form-control-label">Nama Dokumen</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="nama_dokumen" name="nama_dokumen" placeholder="Nama Dokumen" class="form-control">
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="muat_naik" class=" form-control-label">Pilih Dokumen</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="file" id="muat_naik" name="muat_naik" class="form-control-file">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <button type="submit" class="btn btn-warning btn-sm" style="color:white">
                                                <i class="fa fa-upload"></i> Muat Naik
                                            </button>
                                    </form>
                                            <button type="submit" class="btn btn-primary btn-sm">
                                                <i class="fa fa-dot-circle-o"></i> Seterusnya
                                            </button>
                                            <button type="reset" class="btn btn-success btn-sm" onclick="window.location.href='form1.html'">
                                                <i class="fa fa-check-circle"></i> Selesai
                                            </button>
                                        </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="copyright">
                                    <p>Copyright © 2018 Colorlib. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="vendor/slick/slick.min.js">
    </script>
    <script src="vendor/wow/wow.min.js"></script>
    <script src="vendor/animsition/animsition.min.js"></script>
    <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="vendor/circle-progress/circle-progress.min.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="js/main.js"></script>

</body>

</html>
<!-- end document-->
