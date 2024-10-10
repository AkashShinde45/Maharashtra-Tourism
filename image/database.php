<!DOCTYPE html>
<html>
<head>
  <title>PHP MySQL Form By Shubham Sawant</title>
</head>
<body>
  <?php
  // MySQL database connection settings
  $host = 'localhost';
  $username = 'root';
  $password = '';
  $database = 'myDB';
  // Create a connection to the MySQL database
  $connection = mysqli_connect($host, $username, $password, $database);
  if (!$connection) {
    die('Connection error: ' . mysqli_connect_error());
  }
  // Check if the form is submitted for insert, update, or delete
  if (isset($_POST['submit'])) {
    // Insert operation
    if ($_POST['submit'] == 'Insert') {
      $name = $_POST['name'];
      $email = $_POST['email'];
      $query = "INSERT INTO users (name, email) VALUES ('$name', '$email')";
      mysqli_query($connection, $query);
    }
    // Update operation
    if ($_POST['submit'] == 'Update') {
      $id = $_POST['id'];
      $name = $_POST['name'];
      $email = $_POST['email'];
      $query = "UPDATE users SET name='$name', email='$email' WHERE id='$id'";
      mysqli_query($connection, $query);
    }
    // Delete operation
    if ($_POST['submit'] == 'Delete') {
      $id = $_POST['id'];
      $query = "DELETE FROM users WHERE id='$id'";
      mysqli_query($connection, $query);
    }
  }
  ?>
  <h2>User Form</h2>
  <form method="post" action="">
    <label>Id:</label>
    <input type="text" name="id" value=""><br>
    <label>Name:</label>
    <input type="text" name="name" value=""><br>
    <label>Email:</label>
    <input type="email" name="email" value=""><br>
    <input type="submit" name="submit" value="Insert">
    <input type="submit" name="submit" value="Update">
    <input type="submit" name="submit" value="Delete">
  </form>
</body>
</html>