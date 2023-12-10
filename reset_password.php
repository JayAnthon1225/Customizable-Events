<?php
include 'dbcon.php';

if (isset($_POST['submit'])) {
    // Get the token from the form and trim white spaces
    $token = trim($_POST['token']);
    echo "Token: $token<br>";

    // Get the new password
    $new_password = $_POST['new_password'];
    echo "New Password: $new_password<br>";

    // Check if the token exists in the database
    $query = $conn->prepare("SELECT * FROM organizer WHERE token=:token");
    $query->execute(['token' => $token]);

    if ($query->rowCount() == 0) {
        echo "Token does not exist in the database.";
        exit;
    }

    // Update the password in the database
    $query = $conn->prepare("UPDATE organizer SET password=:password WHERE token=:token");
    $query->execute(['password' => $new_password, 'token' => $token]);

    // Check if the password was updated
    if ($query->rowCount() == 0) {
        echo "Failed to update password. Please check your token and try again.<br>";
        print_r($conn->errorInfo());
        exit;
    } else {
        echo "Password updated successfully.<br>";
    }

    // Clear the token
    $query = $conn->prepare("UPDATE organizer SET token=NULL WHERE token=:token");
    $query->execute(['token' => $token]);

    // Redirect to index.php
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Reset Password</title>
    <style>
        body {
            background: linear-gradient(to bottom, #007bff, #ff8c00);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .form-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        .form-container h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .form-container form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .form-container input[type="password"],
        .form-container input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        .form-container input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            cursor: pointer;
        }

        .form-container input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Reset Password</h2>
        <form method="POST" action="">
            <input type="hidden" name="token" value="<?php echo trim($_GET['token']); ?>">
            <input type="password" name="new_password" placeholder="New Password" required>
            <input type="submit" name="submit" value="Reset Password">
        </form>
    </div>
</body>
</html>