<?php 
session_start();
include 'header.php';


if (isset($_SESSION["loggedin"]) and $_SESSION["loggedin"] == TRUE) {

if (isset($_GET["message"])) {
        echo '<script>alert("' . $_GET["message"] . '");</script>';
}
?>

<!-- Content
		============================================= -->
		<section id="content">
			<div class="content-wrap">
					<div class="card divcenter noradius noborder" style="max-width: 400px;">
							<div class="card-body" style="padding: 40px;">
								<form id="login-form" name="login-form" class="nobottommargin" action="dashStudent.php" method="post">
									<h3>Update User Profile</h3>

									<div class="col_full">
										<label for="login-form-username">Name</label>
										<input type="text" id="user_email" name="user_email" class="form-control not-dark" />
									</div>
									<div class="col_full">
										<label for="login-form-username">Email</label>
										<input type="email" id="user_email" name="user_email" class="form-control not-dark" />
									</div>
									<div class="col_full">
										<label for="login-form-username">User Roll</label>
										<div class="dropdown col_full">
																	  <button class="btn btn-small dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
																	    choose user type
																	  </button>
																	  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
																	    <a class="dropdown-item" href="#">student</a>
																	    <a class="dropdown-item" href="#">Staff</a>
																	  </div>
																	</div>
									</div>

									<div class="col_full">
										<label for="login-form-username">Department</label>
										<div class="dropdown col_full">
																	  <button class="btn btn-small dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
																	    choose department
																	  </button>
																	  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
																	    <a class="dropdown-item" href="#">Science</a>
																	    <a class="dropdown-item" href="#">Arts</a>
																	    <a class="dropdown-item" href="#">Commerce</a>
																	  </div>
																	</div>
									</div>

									<div class="col_full">
										<label for="login-form-password">Password:</label>
										<input type="password" id="user_pass" name="user_pass" class="form-control not-dark" />
									</div>
									<div class="col_full">
										<label for="login-form-password">User close date:</label>
										<input type="date" id="user_pass" name="user_pass" class="form-control not-dark" />
									</div>

									<div class="col_full nobottommargin">
										<button class="button button-3d button-black nomargin" id="login-form-submit" name="login-form-submit" value="Update">Update</button>
									</div>
								</form>

								<div class="line line-sm"></div>

							</div>
						</div>

                    <?php
                    } else {
                            include 'userLoginFirst.php';
                    }

                    include 'footer.php';
                    ?>
