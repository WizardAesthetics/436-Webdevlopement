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
        tr{
            margin-top: 5px;
        }
        th{
            padding: 10px;
            text-align: center;
        }
        h1{
            text-align: center;
        }
        p{
            font-size: 20px;
        }
    </style>
</head>
<body>
    <h1>Exam</h1>
    <form method="get" action="grade.php">
        <?php
            $validUser = false;
            $completed = false;
            if(isset($_GET['ID'])&&$_GET['ID']!='') {
                $id = $_GET['ID'];
                $db = mysqli_connect("localhost", "root",  "@Rustynail10", "db4");

                $query = "SELECT * FROM students;";
                $result = mysqli_query($db, $query);
                $num_rows = mysqli_num_rows($result);

                // Checks if the user exist and if they have completed the exam or not
                for ($i = 0; $i < $num_rows; $i++) {
                    $row = mysqli_fetch_assoc($result);
                    if($row['code'] == $id){
                        $validUser = true;
                        if($row['complete'] == 'completed')
                            $completed = true;
                        break;
                    }
                }

                // If the user is valid
                if($validUser){
                    // If they have already completed the exam then print a error
                    if ($completed){
                        print '<h3>already completed</h3>';
                    } else{
                        // Get all the rows in the exam
                        $query = "SELECT * FROM exam;";
                        $result = mysqli_query($db, $query);
                        $num_rows = mysqli_num_rows($result);
                        print '<table>';
                        // run through the exam table and print out the exam 
                        for ($i = 0; $i < $num_rows; $i++) {
                            $row = mysqli_fetch_assoc($result);
                            print '<tr><td><p>' . $row['question'] . '</p><input name = "'.$row['id'].'" value = "'.$row['answer1'] .'" type="radio" />'.$row['answer1'].'<br><input value = "'.$row['answer2'] .'" name = "'.$row['id'].'" type="radio" />'.$row['answer2'].'<br><input name = "'.$row['id'].'" value = "'.$row['answer3'] .'" type="radio" />'.$row['answer3'].'<br><input value = "'.$row['answer4'] .'" name = "'.$row['id'].'" type="radio" />'.$row['answer4'].'</td></tr>';
                        } 
                        print '</table>';
                    }
                } else {
                    print '<h3>invalid passcode</h3>';
                }
            } else{
                print '<h3>No ID Set</h3>';
            }
        ?>
        <br>
        <input name ='ID' type="text"/>
        <input type="submit"/>
    </form>
</body>

</html>
        