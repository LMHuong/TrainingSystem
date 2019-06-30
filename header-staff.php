<?php require "functions.php" ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="edit-deleteport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>FPT Training System</title>

    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- Custom CSS -->
    <link href="../css/sb-admin.css" rel="stylesheet">
</head>

<body>
    <div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Mobile -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="../index.php">FPT Training System for Staff</a>

                <a class="navbar-brand text-right" href="../index.php">Logout</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
              <li>
                <?php
                    $username = $_GET['username'];
                    echo "
                      <a href='#' ><i class='fa fa-user'></i> {$username}</a>
                    ";
                ?>
              </li>
            </ul>
            <!-- Mobile -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                      <?php
                        echo "<a href='../Staff/view-category.php?username={$username}'><i class='fa fa-fw fa-table'></i> View Category</a>";
                      ?>
                    </li>
                    <li>
                      <?php
                        echo "<a href='../Staff/add-category.php?username={$username}'><i class='fa fa-fw fa-table'></i> Add Category</a>";
                      ?>
                    </li>
                    <li>
                      <?php
                        echo "<a href='../Staff/view-course.php?username={$username}'><i class='fa fa-fw fa-table'></i> View Course</a>";
                      ?>
                    </li>
                    <li>
                      <?php
                        echo "<a href='../Staff/add-course.php?username={$username}'><i class='fa fa-fw fa-table'></i> Add Course</a>";
                      ?>
                    </li>
                    <li>
                      <?php
                        echo "<a href='../Staff/view-trainer.php?username={$username}'><i class='fa fa-fw fa-table'></i> View Trainer</a>";
                      ?>
                    </li>
                    <!-- <li>
                      <?php
                        // echo "<a href='../Staff/view-trainee.php?username={$username}'><i class='fa fa-fw fa-table'></i> View Trainee</a>";
                      ?>
                    </li>
                    <li>
                      <?php
                        // echo "<a href='../Staff/add-trainee.php?username={$username}'><i class='fa fa-fw fa-table'></i> Add Trainee</a>";
                      ?>
                    </li> -->
                    <li>
                      <?php
                        echo "<a href='../Staff/add-topic.php?username={$username}'><i class='fa fa-fw fa-table'></i> Add Topic</a>";
                      ?>
                    </li>
                    <li>
                      <?php
                        echo "<a href='../Staff/view-topic.php?username={$username}'><i class='fa fa-fw fa-table'></i> View Topic</a>";
                      ?>
                    </li>
                </ul>
            </div>
        </nav>
