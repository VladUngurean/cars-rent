<?php
include "config.php";

$result = $conn->query('CALL GetManagersAndCouriers()');

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

        $data[] = array(
            'userRole' => $row['user_role'],
            'firstName' => $row['first_name'],
            'lastName' => $row['last_name'],
            'email' => $row['email'],
            'phone' => $row['phone'],
        );
    }

    if (!empty($data)) {
      echo '<script>';
      echo 'let managersAndCouriersData = ' . json_encode($data) . ';';
      echo '</script>';
  }
} else {
    echo '<script>';
    echo 'let managersAndCouriersData = "";';
    echo '</script>';
}

  $conn->next_result();
?>