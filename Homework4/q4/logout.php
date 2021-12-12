<?php
// Start session
    session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Logout</title>
    <style>
        body {
            background-color: brown;
        }

        input {
            margin: 10px;
        }

        h1 {
            text-align: center;
        }

        #form {
            display: block;
            text-align: center;
            background-color: cadetblue;
            height: 400px;
            padding: 50px;
            width: 40%;
            margin: auto;
        }

        form {
            display: inline-block;
            margin-left: auto;
            margin-right: auto;
            text-align: left;
        }

        #reg {
            padding: 10px;
        }
    </style>
</head>

<body>
    <div id='form'>
        <h1>Login</h1>
        <?php
        date_default_timezone_set("America/New_York");
        $id = $_SESSION['ID'];
        $db = mysqli_connect("localhost", "root",  "@Rustynail10", "db6");

        // Find current user
        $query = "SELECT * FROM users WHERE id = '" . $id . "';";
        $result = mysqli_query($db, $query);
        $row = mysqli_fetch_assoc($result);

        // Checks to make sure something was returned
        if ($row == NULL) {
            print '<h3>invalid id/password</h3>';
        } else {
            // Updates last
            $query = 'UPDATE users SET last = \''.date('m-d-Y h:i:s a').'\' WHERE id = "'.$id.'";';
            mysqli_query($db, $query);
            $visits = $row['visits'] +1;
            // Updates visits
            $query = 'UPDATE users SET visits = \''.$visits.'\' WHERE id = "'.$id.'";';
            mysqli_query($db, $query);
            // Destroys session
            session_destroy();
        }
        ?>
        <!-- Using post to gather data -->
        <form method="post" action="login.php">
            <!-- Radio gorup for state -->
            <input name='ID' type="text">ID</input><br>
            <input name='password' type="text">password</input><br>

            <input style= "margin-left: 40%;" type="submit" value = "Login"/><br>
        </form>
        <div id='reg'>
            <a href="register.html"><button>Register</button></a>
        </div>
    </div>
</body>

</html>