<?php
include 'db_connect.php';
session_start();
if($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if($password !== $confirm_password){
        echo "<script>alert('Passwords do not match!);</script>";
    } else {
        $check_user = "SELECT * FROM users WHERE username='$username'";
        $result = $conn->query($check_user);

        if($result->num_rows > 0) {
            echo "<script>alert('User already exist!');</script>";
        } else {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            $sql = "INSERT INTO users (username,password) values ('$username','$hashed_password')";

            if($conn->query($sql) === TRUE) {
                echo "<script>alert('Registration successful! Redirecting to login...');</script>";
                echo "<script>window.location = 'Login.php';</script>";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    }
}
$conn->close();
?>
