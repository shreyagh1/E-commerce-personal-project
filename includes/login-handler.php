<?php
include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) === 1) {
        $user = mysqli_fetch_assoc($result);

        if (password_verify($password, $user['password'])) {
            session_start();
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['name'] = $user['name'];
            echo "<script>
                    alert('Login successful!');
                    window.location.href='../public/index.php';
                  </script>";
        } else {
            echo "<script>
                    alert('Invalid password! Please try again.');
                    window.location.href='../public/login.php';
                  </script>";
        }
    } else {
        echo "<script>
                alert('No account found with this email!');
                window.location.href='../public/login.php';
              </script>";
    }
}

mysqli_close($conn);
?>
