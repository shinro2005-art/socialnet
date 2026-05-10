<?php
include 'config.php';

if (!isset($_SESSION['username'])) {
    header("Location: signin.php");
    exit();
}

$username = $_SESSION['username'];
$message = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $description = $_POST['description'];

    $sql = "UPDATE account SET description='$description'
            WHERE username='$username'";

    if ($conn->query($sql) === TRUE) {
        $message = "Profile updated";
    }
}

$result = $conn->query("SELECT description FROM account WHERE username='$username'");
$user = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Setting</title>
</head>
<body>

<?php include 'menu.php'; ?>

<h2>Setting Page</h2>

<form method="POST">
    Description:<br>
    <textarea name="description" rows="6" cols="50"><?php echo $user['description']; ?></textarea><br><br>

    <button type="submit">Save</button>
</form>

<p><?php echo $message; ?></p>

</body>
</html>
