<?php
  // return content of table named `$table`
  // only called directly when in need of content of only 1 table
  // to get content of every table, call `fetch_all`
  // (which is the only case when the third argument is needed)
  function fetch($conn, $table, &$data = []) {
    $data[$table] = array_merge(
      array('type' => $table),
      array('rows' => $conn->query("SELECT * FROM ${table}")->fetch_all(MYSQLI_ASSOC)),
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
?>