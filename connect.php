<?

if (empty(getenv("DATABASE_URL"))){
<<<<<<< HEAD
    $pdo = new PDO('pgsql:host=localhost;port=5432;dbname=mydb', 'postgres', 'Candice');
=======
    $pdo = new PDO('pgsql:host=localhost;port=3306;dbname=mydb', 'postgres', '123456');
>>>>>>> cd4f28ebb489add2ea14d92d01acc0df9b2da753
}  else {
  $db = parse_url(getenv("DATABASE_URL"));
  $pdo = new PDO("pgsql:" . sprintf(
      "host=%s;port=%s;user=%s;password=%s;dbname=%s",
      $db["host"],
      $db["port"],
      $db["user"],
      $db["pass"],
      ltrim($db["path"], "/")
  ));
}
?>
