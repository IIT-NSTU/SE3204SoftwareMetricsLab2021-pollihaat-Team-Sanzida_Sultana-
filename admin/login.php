<?php
include "includes/autoloader.inc.php";
//start session
session_start();

//redirect if logged in
if (isset($_SESSION['user'])) {
    header('location:admin_home.php');
}

?>


<!DOCTYPE html>
<html>

<head>

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h2 style="font-weight:550" class="page-header text-center">এডমিন/উদ্দ্যোক্তা লগিন</h2>
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div style="border-color:#993721" class="login-panel panel panel-primary">
                    <div class="panel-heading" style="background-color:#993721;border-color:#993721 ;">
                        <h3 class="panel-title"><span class="glyphicon glyphicon-lock"></span style=font-weight:600> লগ
                            ইন
                        </h3>
                    </div>
                    <div class="panel-body">
                        <form method="POST" action="includes/login.inc.php">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="নাম লিখুন" type="text" name="username"
                                        autofocus required>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="পাসওয়ার্ড দিন" type="password"
                                        name="password" required>
                                </div>
                                <button style="background-color:#993721;border-color:#993721" type="submit" name="login"
                                    class="btn btn-lg btn-primary btn-block"><span style="padding:0 10px"
                                        class="glyphicon glyphicon-log-in"></span>লগ ইন</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
                <?php
if (isset($_SESSION['message'])) {
    ?>
                <div class="alert alert-info text-center">
                    <?php echo $_SESSION['message'];

    ?>

                </div>
                <?php

    unset($_SESSION['message']);
}
?>
            </div>
        </div>
    </div>