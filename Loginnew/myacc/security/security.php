<?php

session_start();
ob_start();
include '../../connection/db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!--  This file has been downloaded from bootdey.com @bootdey on twitter -->
    <!--  All snippets are MIT license http://bootdey.com/license -->
    <title>Security page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <link href ="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

</head>
<body>
<div class="container-xl px-4 mt-4">
        <!-- Account page navigation-->
        <a href="../../home/index.php"><i class="fas fa-angle-left" style="height:25px; width:25px; border-radius: 50%; display: inline-block;"></i></a>
        <nav class="nav nav-borders">
            <li><a class="nav-link"  href="../profile/edit_profile.php" >Profile</a></li>
            <!-- <li><a class="nav-link" href="#" >Billing</a></li> -->
            <li><a class="nav-link active"  href="security.php" >Security</a></li>
            <li><a class="nav-link"  href="../notif/notifications_page.php" >Notifications</a></li>
        </nav>
        <hr class="mt-0 mb-4">
        <div class="row">
            <div class="col-lg-8">
                <!-- Change password card-->
                <div class="card mb-4">
                    <div class="card-header">Change Password</div>
                    <div class="card-body">
                        <form action="Udpass.php"
                        method="POST"
                        enctype="multipart/form-data"
                        >
                        <?php             
                                          
                                    $currentUser = $_SESSION['email'];
                                    $sql = "SELECT * FROM base WHERE email ='$currentUser'";
                            
                                $gotResuslts = mysqli_query($con,$sql);
                                    if($gotResuslts){
                                        if(mysqli_num_rows($gotResuslts)>0){
                                            while($row = mysqli_fetch_array($gotResuslts)){
                                                //print_r($row['user_name']);
                                 ?>
                            <input type="hidden" name="Id" value="<?php echo $row['Id'];?>">
                            <!-- Form Group (current password)-->
                            <div class="mb-3">
                                <label class="small mb-1" for="currentPassword">Current Password</label>
                                <input class="form-control" id="currentPassword" type="password" name="Opassword" placeholder="Enter current password">
                            </div>
                            <!-- Form Group (new password)-->
                            <div class="mb-3">
                                <label class="small mb-1" for="newPassword">New Password</label>
                                <input class="form-control" id="newPassword" type="password" name="Npassword" placeholder="Enter new password">
                            </div>
                            <!-- Form Group (confirm password)-->
                            <div class="mb-3">
                                <label class="small mb-1" for="confirmPassword">Confirm Password</label>
                                <input class="form-control" id="confirmPassword" type="password" name="Cpassword" placeholder="Confirm new password">
                            </div>
                            <button class="btn btn-primary" type="update" name="update">Save</button>
                        <?php
                                            }
                                        }
                                    }
                                
                        ?>                      
                        <!-- <script src="../../js/security.js"></script> -->
                        </form>
                    </div>
                </div>
                <!-- Security preferences card-->
                <div class="card mb-4">
                    <div class="card-header">Security Preferences</div>
                    <div class="card-body">
                        <!-- Account privacy optinos-->
                        <h5 class="mb-1">Account Privacy</h5>
                        <p class="small text-muted">By setting your account to private, your profile information and posts will not be visible to users outside of your user groups.</p>
                        <form>
                            <div class="form-check">
                                <input class="form-check-input" id="radioPrivacy1" type="radio" name="radioPrivacy" checked="">
                                <label class="form-check-label" for="radioPrivacy1">Public (posts are available to all users)</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" id="radioPrivacy2" type="radio" name="radioPrivacy">
                                <label class="form-check-label" for="radioPrivacy2">Private (posts are available to only users in your groups)</label>
                            </div>
                        </form>
                        <hr class="my-4">
                        <!-- Data sharing options-->
                        <h5 class="mb-1">Data Sharing</h5>
                        <p class="small text-muted">Sharing usage data can help us to improve our products and better serve our users as they navigation through our application. When you agree to share usage data with us, crash reports and usage analytics will be automatically sent to our development team for investigation.</p>
                        <form>
                            <div class="form-check">
                                <input class="form-check-input" id="radioUsage1" type="radio" name="radioUsage" checked="">
                                <label class="form-check-label" for="radioUsage1">Yes, share data and crash reports with app developers</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" id="radioUsage2" type="radio" name="radioUsage">
                                <label class="form-check-label" for="radioUsage2">No, limit my data sharing with app developers</label>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <!-- Two factor authentication card-->
                <div class="card mb-4">
                    <div class="card-header">Two-Factor Authentication</div>
                    <div class="card-body">
                        <p>Add another level of security to your account by enabling two-factor authentication.</p>
                        <form >
                            <div class="form-check">
                                <input class="form-check-input" id="twoFactorOn" type="checkbox" name="twoFactor" checked="" style="margin-top: 10px;">
                                <label class="form-check-label" for="twoFactorOn">Two factor</label>
                                <butto n class="btn btn-danger-soft text-danger" type="submit" name="submit"><a href="two-factor/options.html" style="text-decoration: none; color:#DD585A;">Confirm</a></button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Delete account card-->
                <div class="card mb-4">
                    <form action="../delete.php"
                    method="POST">
                    <div class="card-header">Delete Account</div>
                    <div class="card-body">
                        <p>Deleting your account is a permanent action and cannot be undone. If you are sure you want to delete your account, select the button below.</p>
                        <button  class="btn btn-danger-soft text-danger" type="submit" name="submit">I understand, delete my account</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<style type="text/css">
body{margin-top:20px;
background-color:#f2f6fc;
color:#69707a;
}
.img-account-profile {
    height: 10rem;
}
.rounded-circle {
    border-radius: 50% !important;
}
.card {
    box-shadow: 0 0.15rem 1.75rem 0 rgb(33 40 50 / 15%);
}
.card .card-header {
    font-weight: 500;
}
.card-header:first-child {
    border-radius: 0.35rem 0.35rem 0 0;
}
.card-header {
    padding: 1rem 1.35rem;
    margin-bottom: 0;
    background-color: rgba(33, 40, 50, 0.03);
    border-bottom: 1px solid rgba(33, 40, 50, 0.125);
}
.form-control, .dataTable-input {
    display: block;
    width: 100%;
    padding: 0.875rem 1.125rem;
    font-size: 0.875rem;
    font-weight: 400;
    line-height: 1;
    color: #69707a;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #c5ccd6;
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    border-radius: 0.35rem;
    transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
}

.nav-borders .nav-link.active {
    color: #0061f2;
    border-bottom-color: #0061f2;
}
.nav-borders .nav-link {
    color: #69707a;
    border-bottom-width: 0.125rem;
    border-bottom-style: solid;
    border-bottom-color: transparent;
    padding-top: 0.5rem;
    padding-bottom: 0.5rem;
    padding-left: 0;
    padding-right: 0;
    margin-left: 1rem;
    margin-right: 1rem;
}

.btn-danger-soft {
    color: #000;
    background-color: #f1e0e3;
    border-color: #f1e0e3;
}

</style>

<script type="text/javascript">

</script>
</body>
</html>