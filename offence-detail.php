 <?php include "sidebar.php"; ?>
 <div class="content">
 	<div class="container-fluid">

 		<div class="row">
 			<div class="col-md-8 col-md-offset-2">
 				<?php

					$id = $_GET['id'];
					$result = $db->prepare("SELECT * FROM reported_offence where id= :post_id");
					$result->bindParam(':post_id', $id);
					$result->execute();
					for ($i = 0; $row = $result->fetch(); $i++) {


					?>
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
 										<td style="background-color:#3dd;">Offense:</td>
 										<td><?php echo $row['offence']; ?></td>
 									</tr>
 									<tr>
 										<td style="background-color:#3dd;">Offense ID:</td>
 										<td><?php echo $row['offence_id']; ?></td>
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
 										<td style="background-color:#3dd;">Name of Offender:</td>
 										<td><?php echo $row['name']; ?></td>
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
 										<td><?php echo $row['amount']; ?></td>
 									</tr>
 									<tr>
 										<td style="background-color:#3dd;">Date of Offense:</td>
 										<td>
											<?php date_default_timezone_set('Asia/Kathmandu');
											echo date('l jS \of F Y h:i A');?></td>

 									</tr>
 								</tbody>
 							</table>
 						</div>

 					</div> <?php } ?>
 			</div>
 		</div>
 	</div>
 </div>
 <?php include "footer.php"; ?>