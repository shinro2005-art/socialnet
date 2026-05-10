<?php
include 'config.php';

if (!isset($_SESSION['username'])) {
    header("Location: signin.php");
    exit();
}

$username = $_SESSION['username'];

$sql = "SELECT * FROM account WHERE username='$username'";
$result = $conn->query($sql);
$user = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
</head>
<body>

<?php include 'menu.php'; ?>

<h2>Home Page</h2>

<p><strong>Username:</strong> <?php echo $user['username']; ?></p>
<p><strong>Fullname:</strong> <?php echo $user['fullname']; ?></p>

<h3>Other Users</h3>

<ul>
<?php
$list = $conn->query("SELECT username FROM account WHERE username != '$username'");

while ($row = $list->fetch_assoc()) {
    echo "<li><a href='profile.php?owner=" . $row['username'] . "'>" . $row['username'] . "</a></li>";
}
?>
</ul>

</body>
</html>
