<?php
include 'config.php';

if (!isset($_SESSION['username'])) {
    header("Location: signin.php");
    exit();
}

$owner = $_SESSION['username'];

if (isset($_GET['owner'])) {
    $owner = $_GET['owner'];
}

$sql = "SELECT * FROM account WHERE username='$owner'";
$result = $conn->query($sql);
$user = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Profile</title>
</head>
<body>

<?php include 'menu.php'; ?>

<h2>Profile Page</h2>

<p><strong>Owner:</strong> <?php echo $user['username']; ?></p>

<h3>Description</h3>

<p><?php echo nl2br($user['description']); ?></p>

</body>
</html>
