<?php
$validUser = false;
$seen = false;
$id = $_GET['ID'];
$db = mysqli_connect("localhost", "root",  "@Rustynail10", "db5");

$query = "SELECT * FROM students WHERE code = '" . $id . "';";
$result = mysqli_query($db, $query);
$row = mysqli_fetch_assoc($result);

if ($row != NULL && $row['seen'] != 'seen' && $row['complete'] != 'completed') {
    session_start();
}


?>

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
            width: 40%;
            background-color: cadetblue;
            border: solid black;
            padding: 5px;
        }

        tr:hover {
            background-color: lightblue;
        }

        td {
            padding: 10px;
            text-align: left;
            border: solid black;
        }

        tr {
            margin-top: 5px;
        }

        th {
            padding: 10px;
            text-align: center;
        }

        h1 {
            text-align: center;
        }

        p {
            font-size: 20px;
        }
    </style>
</head>

<body>
    <h1>Exam</h1>
    <form method="get" action="grade.php">
        <?php
        date_default_timezone_set("America/New_York");
        $db = mysqli_connect("localhost", "root",  "@Rustynail10", "db5");
        $query = "SELECT * FROM students WHERE code = '" . $id . "';";
        $result = mysqli_query($db, $query);
        $row = mysqli_fetch_assoc($result);

        // If the user is valid
        if ($row != null) {
            // If they have already completed the exam then print a error
            if ($row['complete'] == 'completed' || $row['seen'] == 'seen') {
                print '<h3>already completed</h3>';
            }else {
                // Get all the rows in the exam
                $query = "SELECT * FROM exam;";
                $result = mysqli_query($db, $query);
                $num_rows = mysqli_num_rows($result);
                print '<table>';
                // run through the exam table and print out the exam 
                for ($i = 0; $i < $num_rows; $i++) {
                    $row = mysqli_fetch_assoc($result);
                    print '<tr><td><p>' . $row['question'] . '</p><input name = "' . $row['id'] . '" value = "' . $row['answer1'] . '" type="radio" />' . $row['answer1'] . '<br><input value = "' . $row['answer2'] . '" name = "' . $row['id'] . '" type="radio" />' . $row['answer2'] . '<br><input name = "' . $row['id'] . '" value = "' . $row['answer3'] . '" type="radio" />' . $row['answer3'] . '<br><input value = "' . $row['answer4'] . '" name = "' . $row['id'] . '" type="radio" />' . $row['answer4'] . '</td></tr>';
                }
                print '</table>';

                $_SESSION["ID"] = $id;
                $_SESSION["start"] = time();
                $_SESSION["end"] = $num_rows * 60;

                print '<p>Start Time: ' . date('h:i:s:a') . '</p>';
                print '<p>Time to Complete: ' . $num_rows . ' mins</p>';
                print  '<input type="submit" />';
            }
        } else {
            print '<h3>invalid passcode</h3>';
        }
        $query = 'UPDATE students SET seen = \'seen\' WHERE code = "' . $id . '";';
        mysqli_query($db, $query);

        $query = 'UPDATE students SET score = \'0\' WHERE code = "'.$id.'";';
        mysqli_query($db, $query);
        ?>
        <br>
    </form>
</body>

</html>