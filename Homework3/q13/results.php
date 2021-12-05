<!DOCTYPE html>
<html>

<head>
    <title>Survey</title>
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
            width: 75%;
            background-color: cadetblue;
            border: solid black;
        }
        tr:hover {
            background-color: lightblue;
        }
        td, th{
            text-align: center;
            padding: 10px;
        }
        td{
            border: solid black;
        }
        h1{
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>Result Login</h1>
    <?php
        $validUser = false;
        if(isset($_GET['ID'])&&$_GET['ID']!='') {
            $id = $_GET['ID'];
        
            // Selecting all the passwords 
            $db = mysqli_connect("localhost", "root",  "@Rustynail10", "db2"); 
            $query = "SELECT * FROM password;"; 
            $result = mysqli_query($db, $query); 
            $num_rows = mysqli_num_rows($result);

            //running throught the list of passwords and checking if there are any that match
            for ($i=0; $i<$num_rows; $i++){
                $row = mysqli_fetch_assoc($result);
                if($row['pwd'] == $id){
                    $validUser = true; //setting the vaild user to true
                    break;
                }
            }

            //If valid user is true then grabe all the rows in survery
            if ($validUser){
                print '<table>';

                // Making the query string
                $query = "SELECT * FROM survey;";
                $result = mysqli_query($db, $query);
                $num_rows = mysqli_num_rows($result);
                print '<tr><th>QUESION</th><th>Yes</th><th>No</th></tr>';

                // running throught all thr results and printing them out
                for ($i = 0; $i < $num_rows; $i++) {
                    $row = mysqli_fetch_assoc($result);
                    $total =  $row['yes'] + $row['no'];
                    $yesaver = ($row['yes']/$total)*100; //Finding the yes %
                    $noaver = ($row['no']/$total)*100;//Finding the no  %
                    print '<tr><td>' . $row['question'] . '</td><td>'.$yesaver.'%</td><td>'.$noaver.'%</td></tr>';
                }
                print '</table>';
            } else{
                print '<h3>invalid pwd</h3>';
            }
        }
    ?>
</body>

</html>