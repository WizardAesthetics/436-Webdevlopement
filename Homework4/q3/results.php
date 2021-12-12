<!DOCTYPE html>
<html>

<head>
    <style>
        body {
            background-color: brown;
        }

        form {
            width: 100%;
            text-align: center;
        }

        table {
            margin: auto;
            width: 75%;
            background-color: cadetblue;
            border: solid black;
        }

        td {
            padding: 10px;
            text-align: left;
            border: solid black;
        }

        th {
            padding: 10px;
            text-align: center;
        }

        h1 {
            text-align: center;
        }
    </style>
</head>

<body>
    <h1>Result</h1>
    <?php
    $validUser = false;
    $completed = false;
    $id = $_GET['ID'];
    $db = mysqli_connect("localhost", "root",  "@Rustynail10", "db5");

    $query = "SELECT * FROM password WHERE pwd = '".$id."';";
    $result = mysqli_query($db, $query);
    $row = mysqli_fetch_assoc($result);
    $num_rows = mysqli_num_rows($result);

    // geting the number of the quesions this is used for the class average not need
    $query = "SELECT * FROM exam;";
    $result = mysqli_query($db, $query);
    $Question_rows = mysqli_num_rows($result);

    // If the user is valid
    if ($row != Null) {
        $score = 0;
        $completed = 0;

        // Gets all the users
        $query = "SELECT * FROM students;";
        $result = mysqli_query($db, $query);
        $num_rows = mysqli_num_rows($result);
        print '<table>';
        print '<tr><th>name</th><th>passcode</th><th>completed</th><th>score</th></tr>';

        // Prints out name, passcode, completed or not, and the score
        // At the bottom it prints out the class average
        // The background color of the row changes if the user has not completed the exam yet
        for ($i = 0; $i < $num_rows; $i++) {
            $row = mysqli_fetch_assoc($result);
            if ($row['complete'] == 'completed' || $row['seen'] == 'seen') {
                $completed += 1;
                $score += ($row['score'] / $Question_rows) * 100;
                print '<tr><td>' . $row['name'] . '</td><td>' . $row['code'] . '</td><td>Completed</td><td>' . $row['score'] . '</td></tr>';
            } else {
                print '<tr style = "background-color: lightgreen;"><td>' . $row['name'] . '</td><td>' . $row['code'] . '</td><td>not complete</td><td>no score</td></tr>';
            }
        }

        if($completed>0)
            $score = $score / $completed;
        print '<tr><td colspan = "4" style = "text-align: center">Class Average : ' . $score . ' / 100 </td></tr>';
        print '</table>';
    } else {
        print '<h3>invalid passcode</h3>';
    }
    ?>
</body>

</html>