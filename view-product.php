<?php require 'header-admin.php'; ?>

<div class="container-fluid">
  <div class="row">
    <table class="table table-hover">
        <thead>
          <tr>
            <th>ID</th>
            <th>Product Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Image</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody>
          <?php
          // $db = parse_url(getenv("DATABASE_URL"));
          // $pdo = new PDO("pgsql:" . sprintf(
          //     "host=%s;port=%s;user=%s;password=%s;dbname=%s",
          //     $db["host"],
          //     $db["port"],
          //     $db["user"],
          //     $db["pass"],
          //     ltrim($db["path"], "/")
          // ));
            viewTrainer();
          ?>
      </tbody>
    </table>
  </div>
</div>
<script type="text/javascript">
  function confirmation() {
    var confirmmessage = "Are you sure to delete this product?";
    var message = "Action Was Cancelled";
    if (confirm(confirmmessage)) {
      $(".validate").attr("href", "delete-product.php?product_id=<?php echo "{$product_id}"; ?>");
    } else {
         alert(message);
    }
  }
</script>
<!-- href='delete-user.php?user_id={$user_id}' -->
<?php require 'footer-admin.php' ?>
