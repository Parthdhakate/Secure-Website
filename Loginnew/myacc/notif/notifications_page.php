<?php

session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!--  This file has been downloaded from bootdey.com @bootdey on twitter -->
    <!--  All snippets are MIT license http://bootdey.com/license -->
    <title>bs5 edit notifications page - Bootdey.com</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">


</head>
<body>

<div id="id01" class="modal">
    <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
</div>
<div class="container-xl px-4 mt-4">
    <!-- Account page navigation-->
    <a href="../../home/index.php"><i class="fas fa-angle-left"></i></a>
    <nav class="nav nav-borders">
            <li><a class="nav-link"  href="../profile/edit_profile.php" >Profile</a></li>
            <!-- <li><a class="nav-link" href="#" >Billing</a></li> -->
            <li><a class="nav-link"  href="../security/security.php" >Security</a></li>
            <li><a class="nav-link active"  href="notifications_page.php" >Notifications</a></li>
    </nav>
    <hr class="mt-0 mb-4">
    <div class="row">
        <div class="col-lg-8">
            <!-- Email notifications preferences card-->
            <div class="card card-header-actions mb-4">
                <div class="card-header">
                    Email Notifications
                    <div class="form-check form-switch">
                        <input class="form-check-input" id="flexSwitchCheckChecked" type="checkbox" checked="">
                        <label class="form-check-label" for="flexSwitchCheckChecked"></label>
                    </div>
                </div>
                <div class="card-body">
                    <form>
                        <!-- Form Group (default email)-->
                        <div class="mb-3">
                            <label class="small mb-1" for="inputNotificationEmail">Default notification email</label>
                            <input class="form-control" id="inputNotificationEmail" type="email" value="name@example.com" disabled="">
                        </div>
                        <!-- Form Group (email updates checkboxes)-->
                        <div class="mb-0">
                            <label class="small mb-2">Choose which types of email updates you receive</label>
                            <div class="form-check mb-2">
                                <input class="form-check-input" id="checkAccountChanges" type="checkbox" checked="">
                                <label class="form-check-label" for="checkAccountChanges">Changes made to your account</label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" id="checkAccountGroups" type="checkbox" checked="">
                                <label class="form-check-label" for="checkAccountGroups">Changes are made to groups you're part of</label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" id="checkProductUpdates" type="checkbox" checked="">
                                <label class="form-check-label" for="checkProductUpdates">Product updates for products you've purchased or starred</label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" id="checkProductNew" type="checkbox" checked="">
                                <label class="form-check-label" for="checkProductNew">Information on new products and services</label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" id="checkPromotional" type="checkbox">
                                <label class="form-check-label" for="checkPromotional">Marketing and promotional offers</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" id="checkSecurity" type="checkbox" checked="" disabled="">
                                <label class="form-check-label" for="checkSecurity">Security alerts</label>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- SMS push notifications card-->
            <div class="card card-header-actions mb-4">
                <div class="card-header">
                    Push Notifications
                    <div class="form-check form-switch">
                        <input class="form-check-input" id="smsToggleSwitch" type="checkbox" checked="">
                        <label class="form-check-label" for="smsToggleSwitch"></label>
                    </div>
                </div>
                <div class="card-body">
                    <form>
                        <!-- Form Group (default SMS number)-->
                        <div class="mb-3">
                            <label class="small mb-1" for="inputNotificationSms">Default SMS number</label>
                            <input class="form-control" id="inputNotificationSms" type="tel" value="123-456-7890" disabled="">
                        </div>
                        <!-- Form Group (SMS updates checkboxes)-->
                        <div class="mb-0">
                            <label class="small mb-2">Choose which types of push notifications you receive</label>
                            <div class="form-check mb-2">
                                <input class="form-check-input" id="checkSmsComment" type="checkbox" checked="">
                                <label class="form-check-label" for="checkSmsComment">Someone comments on your post</label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" id="checkSmsShare" type="checkbox">
                                <label class="form-check-label" for="checkSmsShare">Someone shares your post</label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" id="checkSmsFollow" type="checkbox" checked="">
                                <label class="form-check-label" for="checkSmsFollow">A user follows your account</label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" id="checkSmsGroup" type="checkbox">
                                <label class="form-check-label" for="checkSmsGroup">New posts are made in groups you're part of</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" id="checkSmsPrivateMessage" type="checkbox" checked="">
                                <label class="form-check-label" for="checkSmsPrivateMessage">You receive a private message</label>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <!-- Notifications preferences card-->
            <div class="card">
                <div class="card-header">Notification Preferences</div>
                <div class="card-body">
                    <form>
                        <!-- Form Group (notification preference checkboxes)-->
                        <div class="form-check mb-2">
                            <input class="form-check-input" id="checkAutoGroup" type="checkbox" checked="">
                            <label class="form-check-label" for="checkAutoGroup">Automatically subscribe to group notifications</label>
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" id="checkAutoProduct" type="checkbox">
                            <label class="form-check-label" for="checkAutoProduct">Automatically subscribe to new product notifications</label>
                        </div>
                        <!-- Submit button-->
                        <button class="btn btn-danger-soft text-danger">Unsubscribe from all notifications</button>
                    </form>
                </div>
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
<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>
</body>
</html>