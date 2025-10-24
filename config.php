<?php
session_start();
include 'db_connect.php'; // must create $conn as a mysqli instance

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = isset($_POST['username']) ? trim($_POST['username']) : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    if ($username === '' || $password === '') {
        echo "<script>alert('Please enter username and password');</script>";
        exit;
    }

    // Prepare statement (prevents SQL injection)
    $stmt = $conn->prepare("SELECT password FROM users WHERE username = ?");
    if (! $stmt) {
        error_log("Prepare failed: " . $conn->error);
        echo "<script>alert('An error occurred. Please try again later.');</script>";
        exit;
    }

    $stmt->bind_param("s", $username);

    if (! $stmt->execute()) {
        error_log("Execute failed: " . $stmt->error);
        echo "<script>alert('An error occurred. Please try again later.');</script>";
        $stmt->close();
        exit;
    }

    // Fetch hashed password (works with or without mysqlnd)
    $hashedPassword = null;
    if (method_exists($stmt, 'get_result')) {
        $result = $stmt->get_result();
        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $hashedPassword = $row['password'];
        }
    } else {
        // fallback for environments without get_result()
        $stmt->bind_result($hashedPasswordFromDb);
        if ($stmt->fetch()) {
            $hashedPassword = $hashedPasswordFromDb;
        }
    }

    $stmt->close();

    if ($hashedPassword === null) {
        echo "<script>alert('Invalid Username or Password');</script>";
        exit;
    }

    if (password_verify($password, $hashedPassword)) {
        session_regenerate_id(true); // prevent session fixation
        $_SESSION['username'] = $username;
        header("Location: LandingPage.php");
        exit;
    } else {
        echo "<script>alert('Invalid Username or Password');</script>";
        exit;
    }
}

$conn->close();
?>
