<?php 
session_start();
if(isset($_SESSION['user_role']) && $_SESSION['user_role'] != 4){
        include 'userRestrict.php';
}else{
include 'header.php';


if (isset($_SESSION["loggedin"]) and $_SESSION["loggedin"] == TRUE) {

?>

<!-- Content
		============================================= -->

<?php
$user_id = $_GET['user_id'];
include 'connect-db.php';

// $sql = "SELECT * FROM user WHERE user_id=$user_id";

$sql = "SELECT * FROM `user`, `department`, `user_role`
WHERE user.user_role = user_role.user_role
AND user.department_id =department.department_id
AND user.user_id=$user_id";
$record = $conn->query($sql);


foreach($record as $row){
        $user_name  	    = $row['user_name'];
        $user_email 	    = $row['user_email'];
        $user_role_name 	= $row['user_role_name'];
        $department_name 	= $row['department_name'];
        $user_address 	    = $row['user_address'];
        $user_phone 	    = $row['user_phone'];
}

?>
		<section id="content">
			<div class="content-wrap">
					<div class="card divcenter noradius noborder" style="max-width: 400px;">
							<div class="card-body" style="padding: 40px;">
								<form id="login-form" name="login-form" class="nobottommargin" action="userUpdateSQL.php" method="post">
									<h3>Update User Profile</h3>

									<div class="col_full">
                                        <input type="hidden" value="<?php if (isset($user_id)){echo $user_id; }?>" name="user_id">

										<label for="login-form-username">Name</label>
										<input type="text" id="user_name" name="user_name"
                                               value="<?php if(isset($user_name)) {echo $user_name ;} ?>" class="form-control not-dark" />
									</div>
									<div class="col_full">
										<label for="login-form-username">Email</label>
										<input type="email" id="user_email" name="user_email"
                                               value="<?php if(isset($user_email)) {echo $user_email ;} ?>" class="form-control not-dark" />
									</div>
                                    <div class="col_full">
                                        <label for="login-form-username">Role</label>
                                        <input type="text" id="user_address" name="user_address" disabled
                                               value="<?php if(isset($user_role_name)) {echo $user_role_name ;} ?>" class="form-control not-dark" />
                                    </div>
                                    <div class="col_full">
                                        <label for="login-form-username">Department</label>
                                        <input type="text" id="user_address" name="user_address" disabled
                                               value="<?php if(isset($department_name)) {echo $department_name ;} ?>" class="form-control not-dark" />
                                    </div>
                                    <div class="col_full">
                                        <label for="login-form-username">Address</label>
                                        <input type="text" id="user_address" name="user_address"
                                               value="<?php if(isset($user_address)) {echo $user_address ;} ?>" class="form-control not-dark" />
                                    </div>
                                    <div class="col_full">
                                        <label for="login-form-username">Phone</label>
                                        <input type="text" id="user_phone" name="user_phone"
                                               value="<?php if(isset($user_phone)) {echo $user_phone ;} ?>" class="form-control not-dark" />
                                    </div>

									<div class="col_full nobottommargin">
										<button class="button button-3d button-black nomargin" id="login-form-submit"
                                                name="login-form-submit" value="Update">Update</button>
									</div>
								</form>

								<div class="line line-sm"></div>

							</div>
						</div>

                    <?php
                    } else {
                            include 'userLoginFirst.php';
                    } }

                    include 'footer.php';
                    ?>
