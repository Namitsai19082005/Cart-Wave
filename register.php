<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{

    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $username = $_POST['username'];
    $user_password = $_POST['password']; // Use a different variable name to avoid conflict

    // Connect to MySQL database
    $servername = "localhost";
    $db_username = "root"; // Use a different variable name to avoid conflict
    $db_password = ""; // Use a different variable name to avoid conflict
    $dbname = "registeruser";

    $conn = new mysqli($servername, $db_username, $db_password, $dbname);

    if ($conn->connect_error) 
    {
        die("Connection failed: " . $conn->connect_error);
    }

    // Store password in plain text (not recommended for production)
    $plaintext_password = $user_password;

    $sql = "INSERT INTO signup (email, phone, username, password)
            VALUES (?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $email, $phone, $username, $plaintext_password); // Bind the plaintext password

    if ($stmt->execute())   
    {
        $stmt->close();
        $conn->close();
        echo "<script>alert('Registered Successfully'); window.location.href = 'login.html';</script>";
    } else
    {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
