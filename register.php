<?php
// create the connection with  Database
$servername = "localhost";
$Username = "root";
$password = "";
$database = "ilac_college";

// CREATing database
$conn = new mysqli($servername, $username, $password, $database);


//checking the connected is establised
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // storing the variables
    $username = $_POST['username'];
    $password =password_hash($_POST['password'],PASSWORD_DEFAULT);

    // Insert data into table
    $sql = "INSERT INTO students_ilac (name, password) VALUES('$username','$password')";

    if ($conn->query($sql) === TRUE) {
        echo "Registration successful!";

    }
    //taking back to home page in three seconds
    header("refresh:3; url=Home.html");           // header("Location: Home.html");
    exit;

}


