<?php
// Starts session
    session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Home</title>
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
        <h1>Home</h1>
        <?php
        $id = $_SESSION['ID'];
        $db = mysqli_connect("localhost", "root",  "@Rustynail10", "db6");

        // Finids the current user
        $query = "SELECT * FROM users WHERE id = '" . $id . "';";
        $result = mysqli_query($db, $query);
        $row = mysqli_fetch_assoc($result);

        // Checks to see if user was returned
        if ($row == NULL) {
            print '<h3>invalid id/password</h3>';
        } else {
            // Prints welecome message
            print '<h3>Welcome to Our Website ' . $row['name'] . '</h3>';
        }
        ?>
        <!-- 3 buttons logoug, Home, Profile -->
        <div id='reg'>
            <a href="logout.php"><button>Logout</button></a>
            <a href="Home.php"><button>Home</button></a>
            <a href="profile.php"><button>profile</button></a>
        </div>
    </div>
</body>

</html>