<?php
  // Retrieve the data sent from the JavaScript AJAX request
  $data_to_send = $_POST['data_to_send'];

  // Do something with the data, such as store it in a database
  // ...

  // Return a response to the JavaScript AJAX request
  echo "Data received: $data_to_send";
?>