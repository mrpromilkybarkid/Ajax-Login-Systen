<?php

    include('db.php');

    if (isset($_POST['username']) && isset($_POST['password'])) {
        $username = mysqli_real_escape_string($db, $_POST['username']);
        $password = mysqli_real_escape_string($db, $_POST['password']);

        $result = mysqli_query($db, "SELECT * FROM users WHERE username='$username' AND password='$password'");
        $count = mysqli_num_rows($result);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

        if ($count == 1) {
            session_start();
            $_SESSION['login_user'] = $row['uid'];
            $_SESSION['login_username'] = $row['username'];
            echo $row['uid'];
        }
    }

?>
