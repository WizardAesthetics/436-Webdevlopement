<?php
    session_start();
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
        table{
            margin: auto;
            width: 40%;
            background-color: cadetblue;
            border: solid black;
            padding: 5px;
        }
        tr:hover {
            background-color: lightblue;
        }
        td{
            padding: 10px;
            text-align: left;
            border: solid black;
        }
        th{
            padding: 10px;
            text-align: center;
        }
        h1{
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>Grade</h1>
    <form method="get" action="grade.php">
        <?php
            $validUser = false;
            $completed = false;
            date_default_timezone_set("America/New_York");
            if(isset($_SESSION['ID'])&&$_SESSION['ID']!='') {
                $id = $_SESSION['ID'];
                $start = $_SESSION['start'];
                $end = $_SESSION["end"];

                $db = mysqli_connect("localhost", "root",  "@Rustynail10", "db5");

                date_default_timezone_set("America/New_York");
                $db = mysqli_connect("localhost", "root",  "@Rustynail10", "db5");
                $query = "SELECT * FROM students WHERE code = '" . $id . "';";
                $result = mysqli_query($db, $query);
                $row = mysqli_fetch_assoc($result); 

                // If the user is valid
                if ($row != null) {
                    // If they have already completed the exam then print a error
                    if ($row['complete'] == 'completed' && $row['seen'] == 'seen') {
                        print '<h3>already completed</h3>';
                    } else{
                        $currTime = time();
                        $score = 0;
                        if($currTime <= ($start+$end)){
                            // Get all the rows in the exam
                            $query = "SELECT * FROM exam;";
                            $result = mysqli_query($db, $query);
                            $num_rows = mysqli_num_rows($result);
                            print '<table>';
                            // print out the user answer and the correct answer and put their score at the bottom of the page
                            for ($i = 0; $i < $num_rows; $i++) {
                                $row = mysqli_fetch_assoc($result);
                                if(isset( $_GET[$row['id']]) && $row['correct'] == $_GET[$row['id']])
                                    $score += 1;
                                if(isset( $_GET[$row['id']]))
                                    print '<tr><td><p style = "font-size: 20px;">' . $row['question'] . '</p><p>Correct Answer: '.$row['correct'].'</p><p>Your Answer '.$_GET[$row['id']].'</p></td></tr>';
                                else {
                                    print '<tr><td><p style = "font-size: 20px;">' . $row['question'] . '</p><p>Correct Answer: '.$row['correct'].'</p><p>Your Answer " "</p></td></tr>';
                                }
                            } 
                            print '<tr><td colspan = "3" style = "text-align: center">Score: '.$score.' / '. $num_rows.' </td></tr>';
                            print '</table>';
                        } else {
                            print '<h3>Time exceeded score is 0</h3>';
                        }
                        $query = 'UPDATE students SET complete = \'completed\' WHERE code = "'.$id.'";';
                        mysqli_query($db, $query);

                        $query = 'UPDATE students SET score = \''.$score .'\' WHERE code = "'.$id.'";';
                        mysqli_query($db, $query);
                    }
                } else {
                    print '<h3>invalid passcode</h3>';
                }
            } else{
                print '<h3>No ID Set</h3>';
            }
        ?>
        <br>
    </form>
</body>

</html>
