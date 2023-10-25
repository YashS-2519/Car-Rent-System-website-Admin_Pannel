<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "car rental system";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
  echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Alert!</strong> Some technical issue occur. <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
  die("Connection failed: " . $conn->connect_error);
}