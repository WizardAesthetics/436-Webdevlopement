<!DOCTYPE html>
<html>

<head>
    <title>Tution Cost</title>
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
    </style>
</head>

<body>
    <div id='form'>
        <h1>Register</h1>
        <?php
        date_default_timezone_set("America/New_York");
        $id = $_POST['ID'];
        $db = mysqli_connect("localhost", "root",  "@Rustynail10", "db6");

        // Gets current user
        $query = "SELECT * FROM users WHERE id = '" . $id . "';";
        $result = mysqli_query($db, $query);
        $row = mysqli_fetch_assoc($result);

        // Checks to make sure something was returned
        if ($row == NULL) {
            // Inserts new users with defualt visit count as 0
            $query = "INSERT INTO  users VALUES ('" . $id . "', '" . $_POST['Password'] . "', '" . $_POST['Name'] . "', '" . $_POST['Email'] . "', '0', '" . date('m-d-Y h:i:s a') . "');";
            mysqli_query($db, $query);
            print '<h3>You have successfully be Register</h3>';
        } else {
            print '<h3>ID already exists</h3>';
        }
        ?>
        <div id='reg'>
            <a href="login.html"><button>login</button></a>
        </div>
    </div>
</body>

</html>