<?php require "function.php" ?>
<!DOCTYPE php>
<php lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="edit-deleteport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ATN Admin</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">
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
                <a class="navbar-brand" href="index.php">ATN Cloud System</a>

                <a class="navbar-brand text-right" href="index.php">Logout</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
              <li>
                <?php
                  if (isset($_POST['username'])) {
                    $username = $_POST['username'];
                    echo "
                      <a href='#' ><i class='fa fa-user'></i> {$username}</a>
                    ";
                  }
                ?>
              </li>
            </ul>
            <!-- Mobile -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="view-product.php"><i class="fa fa-fw fa-table"></i> View Products</a>
                    </li>
                    <li>
                        <a href="add-product.php"><i class="fa fa-fw fa-wrench"></i> Add Product</a>
                    </li>
                </ul>
            </div>
        </nav>
