<?php include "connect.php"?>
<?php
  function viewTrainer(){
    $sql = "SELECT * FROM product";
    $stmt = $GLOBALS['pdo']->prepare($sql);
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
  }


  //this is for security purpose
  function sanitizeString($str) {
      global $connection;
      $str = strip_tags($str); //remove html tags
      $str = htmlentities($str); //encode html (for special characters)
      if (get_magic_quotes_gpc()){
          $str = stripslashes($str); //Don't use the magic quotes
      }
      //Avoid MYSQL Injection
      $str = $connection->real_escape_string($str);
      return $str;
  }

  //Convert password into encrypted form
  function passwordToToken($password){
      global $salt1;
      global $salt2;
      $token = hash ("ripemd128", "$salt1$password$salt2");
      return $token;
  }
?>
