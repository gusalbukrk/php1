<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>LAMP Stack</title>
      <style>
        h1 { font-family: sans-serif; }
      </style>
  </head>
  <body>
    <?php
      require 'utils.php';

      // mysqli_connect(server, username, password, database);
      $conn = mysqli_connect('localhost', 'root', 'wd051017', 'entertainment');
      if (!$conn) die('ERROR: ' . mysqli_connect_error());

      // $data = fetch_all($conn);
      $data = fetch($conn, 'tv_shows');
      print_json($data);

      $conn->close();
    ?>
  </body>
</html>
