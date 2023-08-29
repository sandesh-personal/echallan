<?php include "alluser_sidebar.php" ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All User</title>

    </script>
    <script src="assets/js/script.js"></script>
    </script>

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
    <h2>&nbsp;&nbsp;Search Your Offence ID Here</h2>
    <form action="alluser.php" method="post">
        <label for="id">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
        <input type="text" id="myInput" name="id">


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
                                            <td>
                                            <?php date_default_timezone_set('Asia/Kathmandu');
											echo date('l jS \of F Y h:i A');?></td>
                                        </tr>
                                        <tr>
                                            <td style="background-color:#3dd;">Pay Online:</td>
                                            <td><?php echo '<button id="payment-button">Pay with Khalti</button>'; ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div id="payment-status"></div>
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
    <script src="https://khalti.s3.ap-south-1.amazonaws.com/KPG/dist/2020.12.17.0.0.0/khalti-checkout.iffe.js"></script></script>
    <script>
        var config = {
            // replace the publicKey with yours
            "publicKey": "test_public_key_04d7d58897db4e159f83a66949d0d52c",
            "productIdentity": "1234567890",
              "productName": "Test Product",
              "productUrl": "http://example.com/test-product",
              "paymentPreference": [
                "KHALTI",
              ],
              "eventHandler": {
                onSuccess(payload) {
                  // Handle successful payment
                  console.log(payload);
                  // Update the payment status message
                  document.getElementById('payment-status').innerHTML = 'Payment successful!';
                },
                onError(error) {
                  // Handle payment error
                  console.log(error);
                  // Update the payment status message
                  document.getElementById('payment-status').innerHTML = 'Payment failed.';
                },
                onClose() {
                  // Handle checkout widget close event
                  console.log('Widget closed');
                }
                
              }
            };

            var checkout = new KhaltiCheckout(config);
            var btn = document.getElementById("payment-button");
            btn.onclick = function() {
              // Show the Khalti checkout widget when the user clicks on the payment button
              checkout.show({amount: 1000}); // Replace 1000 with your actual payment amount in paisa
// Replace 1000 with your actual payment amount in paisa
            };
</script>
<div id="payment-status" style="color: green; font-weight: bold; font-size: 18px;"></div>
<style>
    #payment-status {
        color: green;
        font-weight: bold;
        font-size: 20px;
        justify-content: center;
        align-items: center;
    }
</style>
<div id="payment-status"></div>

</body>
</html>
