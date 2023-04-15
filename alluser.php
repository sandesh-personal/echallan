<?php include "alluser_sidebar.php" ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All User</title>

    <!--   Core JS Files   -->
    <script src="assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
    <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

    <!--  Charts Plugin -->
    <script src="assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
    <script src="assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>

    <!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
    <script src="assets/js/demo.js"></script>

    </script>
    <script src="assets/js/script.js"></script>
    </script>
    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet" />

    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet" />


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />
    <link rel="stylesheet" href="styles.css">
    <style>
        input[type=submit] {
            background-color: #0ddbaf;
            border: none;
            color: white;
            padding: 14px 30px;
            text-decoration: none;

            margin: 4px 2px;
            cursor: pointer;
        }
    </style>

</head>

<body>
    <h2>&nbsp;&nbsp;Search by Offence Id</h2>
    <form action="alluser.php" method="post">
        <label for="id">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
        <input type="text" id="myInput" name="id">
        <!-- <label for="filter">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>  -->
        <!-- <input type="text" name="filter" value="" id="myInput" placeholder="Search with Offence Id" /> -->

        <input type="submit" value="Search">
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get the input from the form
        $id = $_POST["id"];

        // Connect to your database
        $conn = new mysqli("localhost", "root", "", "tos");

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Query the database
        $sql = "SELECT * FROM reported_offence WHERE offence_id = '$id'";
        $stmt = $conn->prepare($sql);

        $stmt->execute();
        $result = $stmt->get_result();

        // Check if any rows are returned
        if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) { ?>
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="card">
                            <div class="header text-center">
                                <h4 class="title">Offense Detail</h4>
                                <br>
                                <div class="mapouter">
                                    <div class="gmap_canvas"><iframe width="690px" height="294px" id="gmap_canvas" src="https://maps.google.com/maps?q=<?php echo $row['address']; ?>
							&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://www.webdesign-muenchen-pb.de"></a></div>
                                    <style>
                                        .mapouter {
                                            text-align: right;
                                            height: 294px;
                                            width: 690px;
                                        }

                                        .gmap_canvas {
                                            overflow: hidden;
                                            background: none !important;
                                            height: 294px;
                                            width: 690px;
                                        }
                                    </style><small></small>
                                </div>
                            </div>


                            <div class="content table-responsive table-full-width table-upgrade">
                                <table class="table">

                                    <tbody>
                                        <tr>
                                            <td style="background-color:#3dd;">Offense ID:</td>
                                            <td><?php echo $row['offence_id']; ?></td>
                                        </tr>
                                        <tr>
                                            <td style="background-color:#3dd;">Name of Offender:</td>
                                            <td><?php echo $row['name']; ?></td>
                                        </tr>


                                        <tr>
                                            <td style="background-color:#3dd;">Vehicle Reg. No:</td>
                                            <td><?php echo $row['vehicle_no']; ?></td>
                                        </tr>
                                        <tr>
                                            <td style="background-color:#3dd;">Driver's Licence:</td>
                                            <td><?php echo $row['driver_license']; ?></td>
                                        </tr>
                                        <tr>
                                            <td style="background-color:#3dd;">Offense:</td>
                                            <td><?php echo $row['offence']; ?></td>
                                        </tr>
                                        <tr>
                                            <td style="background-color:#3dd;">Sex of Offender:</td>
                                            <td><?php echo $row['gender']; ?></td>
                                        </tr>
                                        <tr>
                                            <td style="background-color:#3dd;">Reported By:</td>
                                            <td><?php echo $row['officer_reporting']; ?></td>
                                        </tr>
                                        <tr>
                                            <td style="background-color:#3dd;">Location of Offense:</td>
                                            <td><?php echo $row['address']; ?></td>
                                        </tr>
                                        <tr>
                                            <td style="background-color:#3dd;">Fine Amount:</td>
                                            <td><?php echo "Rs " . $row['amount']; ?></td>
                                        </tr>
                                        <tr>
                                            <td style="background-color:#3dd;">Date of Offense:</td>
                                            <td><?php echo date('l jS \of F Y h:i:s A'); ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div> <?php
                    }
                } else {
                    echo "No data found.";
                }
                // Close the database connection
                $conn->close();
            } ?>


    <!-- <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Offence Table</h4>
                            <p class="category">Here is a list of all Offences</p>
                        </div>
                        <div class="content table-responsive table-full-width">

                            <label for="filter">&nbsp;&nbsp;&nbsp;</label> <input type="text" name="filter" value="" id="myInput" placeholder="Search with offence ID" onkeyup="myFunction()" />


                            <table class="table table-hover table-striped" id="myTable">
                                <thead>
                                    <th>Offence ID</th>
                                    <th>Offence</th>
                                    <th>Offender</th>
                                    <th>Reporter</th>
                                    <th>Address</th>

                                </thead>
                                <tbody>
                                    //php
                                    //$result = $db->prepare("SELECT * FROM reported_offence ORDER BY id DESC");
                                    $result->execute();
                                    for ($i = 0; $row = $result->fetch(); $i++) {
                                    ?>
                                        <tr>
                                            <td><php echo $row['offence_id']; ?></td>
                                            <td><a title="Click to view details" href="offence-detail.php?id=<php echo $row['id']; ?>"><php echo $row['offence']; ?></a></td>
                                            <td><php echo $row['name']; ?></td>
                                            <td><php echo $row['officer_reporting']; ?></td>
                                            <td><php echo $row['address']; ?></td>


                                        </tr>
                                    ?php } ?>
                                </tbody>
                            </table>


                        </div>
                    </div>


                </div>
            </div>
        </div>


    </div>
    </div>
    </div> -->
    <footer class="footer">
        <div class="container-fluid">

            <p class="copyright pull-right">
                &copy; <script>
                    document.write(new Date().getFullYear())
                </script> <a href="#">FYP</a>, Hearld College Kathmandu
            </p>
        </div>
    </footer>

    </div>
    </div>


</body>

</html>