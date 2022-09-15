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
    <!-- <table>
      <thead>
        <th>Name</th>
        <th>Year(s)</th>
        <th>Duration</th>
        <th>Rating</th>
      </thead>
      <tbody> -->

    <?php
      require 'utils.php';

      // mysqli_connect(server, username, password, database);
      $conn = mysqli_connect('localhost', 'root', 'wd051017', 'entertainment');
      if (!$conn) die('ERROR: ' . mysqli_connect_error());

      $data = fetch_all($conn);
      // print_json($data);

      echo "
        <table>
          <thead>
            <th>Name</th>
            <th>Year(s)</th>
            <th>Duration</th>
            <th>Rating</th>
          </thead>
          <tbody>
      ";

      foreach ($data as $table) { // table is games, movies or tv_shows
        foreach ($table['rows'] as $row) {
          print_row($table['type'], $row);
        }
      }

      echo "
          </tbody>
        </table>
      ";

      $conn->close();

      // foreach ($data as $row) {
      //   echo "${row['name']}</br>";
      // }
    ?>

  </body>
</html>

