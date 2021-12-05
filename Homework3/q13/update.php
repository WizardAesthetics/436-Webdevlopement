<!DOCTYPE html>
<html>

<head>
    <title>Survey</title>
    <style>
        body {
            background-color: brown;
        }
        h1, h3{
            text-align: center;
        }
        div
        {
            display: block;
            text-align: center;
            background-color: cadetblue;
            height: 400px;
            padding: 50px;
            width: 40%;
            margin: auto;
        }
    </style>
</head>
<body>
    <div>
        <h1>Survey</h1>
        <?php
            $validUser = false;
            $completed = false;
            if(isset($_GET['ID'])&&$_GET['ID']!='') {
                $id = $_GET['ID'];
                $db = mysqli_connect("localhost", "root",  "@Rustynail10", "db2");

                // Grabbing all the passcodes from the databse
                $query = "SELECT * FROM passcode;";
                $result = mysqli_query($db, $query);
                $num_rows = mysqli_num_rows($result);

                // Running throught all the passcodes
                for ($i = 0; $i < $num_rows; $i++) {
                    $row = mysqli_fetch_assoc($result);
                    if($row['code'] == $id){
                        $validUser = true; //if all of the codes match the passes ID set vaild to true
                        if($row['complete'] == 'completed')
                            $completed = true; //If the the user has already completed the survey then set complete to true
                        break;
                    }
                }

                if($validUser){
                    // If already completed then dispaly a error
                    if ($completed){
                        print '<h3>already completed</h3>';
                    } else{
                        // Mark the user as completed
                        $query = 'UPDATE passcode SET complete = \'completed\' WHERE code = "'.$id.'";';
                        mysqli_query($db, $query);

                        // Get all the rows from the survey
                        $query = "SELECT * FROM survey;";
                        $result = mysqli_query($db, $query);
                        $num_rows = mysqli_num_rows($result);

                        // Run throught the questions and set the yes now values
                        for ($i = 0; $i < $num_rows; $i++) {
                            $row = mysqli_fetch_assoc($result);
                            if(isset($_GET[$row['id']])){
                                if ($_GET[$row['id']] == 'yes'){
                                    $query = 'UPDATE survey SET yes = "'.$row['yes'] + 1 .'" WHERE id = "'.$row['id'].'";';
                                    mysqli_query($db, $query);
                                } else if ($_GET[$row['id']] == 'no'){
                                    $query = 'UPDATE survey SET no = "'.$row['no'] + 1 .'" WHERE id = "'.$row['id'].'";';
                                    mysqli_query($db, $query);
                                }
                            }
                        }
                        print '<h3>Thank you for taking our survey</h3>';
                    }
                } else {
                    print '<h3>invalid passcode</h3>';
                }
            } else{
                print '<h3>No ID Set</h3>';
            }
        ?>
    </div>
</body>

</html>
        