<?php
include('connect.php');

?>
<!doctype html>
<html lang="en">

<head>

    <!-- combination of HTML and PHP -->
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <!-- encoding, favicon, and compatibility settings for the web page -->
    <?php
    $result = $db->prepare("SELECT * FROM site_settings WHERE id=1");
    $result->execute();
    for ($i = 0; $row = $result->fetch(); $i++) {
    ?>

        <!-- retrieving the site settings from a database using select query -->
        <title><?php echo $row['site_name']; ?></title>

        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
        <meta name="viewport" content="width=device-width" />
        <meta name="keywords" content="Traffic" />
        <meta name="description" content="<?php echo $row['site_desc']; ?>">
        <meta name="author" content="">

        <!-- Bootstrap core CSS     -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

        <!-- Animation library for notifications   -->
        <link href="assets/css/animate.min.css" rel="stylesheet" />

        <!--  Light Bootstrap Table core CSS    -->
        <link href="assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet" />


        <!--  CSS for Demo Purpose, don't include it in your project     -->
        <link href="assets/css/demo.css" rel="stylesheet" />

        <script src="assets/js/jeffartagame.js" type="text/javascript" charset="utf-8"></script>
        <script src="assets/js/lib/jquery.js" type="text/javascript"></script>
        <script src="assets/js/facebox.js" type="text/javascript"></script>


        <script src="js/application.js" type="text/javascript" charset="utf-8"></script>

        <!--     Fonts and icons     -->
        <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
        <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />

</head>

<body>

    <div class="wrapper">
        <div class="sidebar" data-color="green" data-image="assets/img/sidebar-5.jpg">


            <div class="sidebar-wrapper">
                <div class="logo">
                    <a href="#" class="simple-text">
                        <?php echo $row['site_name']; ?>
                    </a>
                </div>
            <?php } ?>


            <ul class="nav">

                <li>
                    <a href="alluser.php">
                        <i class="pe-7s-note2"></i>
                        <p>Offense List</p>
                    </a>
                </li>

            </ul>



            </div>
        </div>
        <div class="main-panel">
            <nav class="navbar navbar-default navbar-fixed">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="collapse navbar-collapse">

                        <ul class="nav navbar-nav navbar-right">
                            <li>
                                <a href="login.php">
                                    <p>Login</p>
                                </a>
                            </li>
                            <li class="separator hidden-lg hidden-md"></li>
                        </ul>
                    </div>
                </div>
            </nav>