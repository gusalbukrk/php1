<?php
  // return content of table named `$table`
  // only called directly when in need of content of only 1 table
  // to get content of every table, call `fetch_all`
  // (which is the only case when the third argument is needed)
  function fetch($conn, $table, &$data = []) {
    $data[$table] = array_merge(
      array('type' => $table),
      // array('rows' => $conn->query("SELECT * FROM ${table}")->fetch_all(MYSQLI_ASSOC)),
      array('rows' => $conn->query("SELECT * FROM ${table} ORDER BY rating DESC")->fetch_all(MYSQLI_ASSOC)),
    );

    return $data;
  }

  // return content of all tables
  function fetch_all($conn) {
    $data = fetch($conn, 'games');
    $data = fetch($conn, 'movies', $data);
    $data = fetch($conn, 'tv_shows', $data);

    return $data;
  }

  function print_json($table) {
    echo json_encode($table);
  }

  function print_platform($p) {
    switch ($p) {
      case "Nintendo 64":
        return "N64";
      case "Nintendo 3DS":
        return "N3DS";
      case "Nintendo Switch":
        return "NS";
      case "Super Nintendo":
        return "SNES";
      case "Playstation 2":
        return "PS2";
    }
  }

  function print_row($table, $row) {
    // echo "
    //   <tr>
    //     <td>${row['name']}</td>
    //     <td></td>
    //     <td></td>
    //     <td>${row['rating']}</td>
    //   </tr>
    // ";

    $name = $year = $duration = $rating = '';

    // $name = ($table == 'movies' || $table == 'tv_shows') ? $row['name'] : "${row['name']} (${row['platform']})";
    if ($table == 'movies' || $table == 'tv_shows') $name = $row['name'];
    else $name = $row['name'] . ' (' . print_platform($row['platform']) . ')';

    if ($table == 'movies' || $table == 'games') $year = $row['year'];
    else $year = $row['start'] . " - " . ($row['end'] == NULL ? "(present)" : $row['end']);

    if ($table == 'movies') $duration = $row['runtime'] . 'm';
    else if ($table == 'games') $duration = $row['length'] < 80 ? ('~' . $row['length'] . 'h') : ("80h+");
    else $duration = $row['episodes'] . " episodes (~" . $row['runtime'] . "m each)";

    $rating = $row['rating'];

    echo "
      <tr>
        <td>${name}</td>
        <td>${year}</td>
        <td>${duration}</td>
        <td>${rating}</td>
      </tr>
    ";
  }

  function print_data($title, $data) {
    $title = strtoupper($title);

    echo "
      <h1 class=\"mb-4 fw-bold fs-2\">${title}</h1>
      <table class=\"table table-striped\">
        <thead class=\"table-primary\">
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
  }

?>
