<?php
include 'config.php';

if (!isset($_SESSION['username'])) {
    header("Location: signin.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>About</title>
</head>
<body>

<?php include 'menu.php'; ?>

<h2>About</h2>

<p>Student Name: YOUR NAME</p>
<p>Student Number: YOUR STUDENT NUMBER</p>

</body>
</html>
