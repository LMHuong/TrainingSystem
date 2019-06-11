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
          $db = parse_url(getenv("DATABASE_URL"));
          $pdo = new PDO("pgsql:" . sprintf(
              "host=%s;port=%s;user=%s;password=%s;dbname=%s",
              $db["host"],
              $db["port"],
              $db["user"],
              $db["pass"],
              ltrim($db["path"], "/")
          ));
          $sql = "SELECT * FROM product";
          $stmt = $pdo->prepare($sql);
          //Thiết lập kiểu dữ liệu trả về
          $stmt->setFetchMode(PDO::FETCH_ASSOC);
          $stmt->execute();
          $resultSet = $stmt->fetchAll();

          foreach ($resultSet as $row) {

            $product_id = $row['product_id'];
            $product_name = $row['product_name'];
            $short_description = $row['short_description'];
            $price = $row['price'];
            $product_image = $row['product_image'];

            echo "
            <tr>
                <td>{$product_id}</td>
                <td>
                  <a href='edit-product.php?product_id={$product_id}'><p>{$product_name}</p></a>
                </td>
                <td>
                  <p>{$short_description}</p>
                </td>
                <td>
                  <p><span>$</span>{$price}</p>
                </td>
                <td>
                  <img src='{$product_image}' alt='{$product_name}' height='100px'>
                </td>
                <td>
                  <a onClick='confirmation()' class='btn btn-danger validate' ><span class='glyphicon glyphicon-remove'></span></a>
                </td>
            </tr>
            ";
          }
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
