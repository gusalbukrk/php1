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
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  </head>
  <body class="mx-auto mt-4 mb-5" style="width: 800px;">
    <?php
      require 'utils.php';

      // mysqli_connect(server, username, password, database);
      $conn = mysqli_connect('localhost', 'root', 'wd051017', 'entertainment');
      if (!$conn) die('ERROR: ' . mysqli_connect_error());

      // $data = fetch_all($conn);
      $data = fetch($conn, 'games');
      // print_json($data);

      print_data('games', $data);

      $conn->close();
    ?>
  </body>
</html>
