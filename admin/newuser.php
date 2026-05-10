<?php
$conn = new mysqli("localhost", "socialuser", "123456", "socialnet");

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $fullname = $_POST['fullname'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO account(username, fullname, password)
            VALUES('$username', '$fullname', '$password')";

    if ($conn->query($sql) === TRUE) {
        $message = "User created successfully";
    } else {
        $message = "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Create User</title>
</head>
<body>

<h2>Create New User</h2>

<form method="POST">
    Username:<br>
    <input type="text" name="username" required><br><br>

    Fullname:<br>
    <input type="text" name="fullname" required><br><br>

    Password:<br>
    <input type="password" name="password" required><br><br>

    <button type="submit">Create User</button>
</form>

<p><?php echo $message; ?></p>

</body>
</html>
