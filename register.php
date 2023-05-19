<?php

$conn = mysqli_connect("127.0.0.1:3306", "root", "", "ibp");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];

    $errors = [];
    if (empty($full_name)) {
        $errors[] = "Full Name is required";
    }
    if (empty($email)) {
        $errors[] = "Email Address is required";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid Email Address";
    }
    if (empty($gender)) {
        $errors[] = "Gender is required";
    }

    if (empty($errors)) {
        $query = "INSERT INTO students (full_name, email, gender) VALUES ('$full_name', '$email', '$gender')";
        if (mysqli_query($conn, $query)) {
            echo "Registration successful!";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        foreach ($errors as $error) {
            echo $error . "<br>";
        }
    }
}

$query = "SELECT * FROM students";
$result = mysqli_query($conn, $query);

if ($result) {
    if (mysqli_num_rows($result) > 0) {
        echo "<h2>Student List:</h2>";
        echo "<table style='border-collapse: collapse;'>";
        echo "<tr style='background-color: #ccc;'><th>ID</th><th>Full Name</th><th>Email</th><th>Gender</th></tr>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td style='border: 1px solid #000; padding: 5px;'>" . $row['id'] . "</td>";
            echo "<td style='border: 1px solid #000; padding: 5px;'>" . $row['full_name'] . "</td>";
            echo "<td style='border: 1px solid #000; padding: 5px;'>" . $row['email'] . "</td>";
            echo "<td style='border: 1px solid #000; padding: 5px;'>" . $row['gender'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No students found in the database.";
    }
} else {
    echo "Error: " . mysqli_error($conn);
}

mysqli_close($conn);
