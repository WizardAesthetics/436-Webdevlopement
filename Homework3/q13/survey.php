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
    <h1>Survey</h1>
    <form method="get" action="update.php">
        <table>
            <?php
                $db = mysqli_connect("localhost", "root",  "@Rustynail10", "db2");

                // Grabing all the rows in survey and displaying them
                $query = "SELECT * FROM survey;";
                $result = mysqli_query($db, $query);
                $num_rows = mysqli_num_rows($result);
                print '<tr><th>QUESION</th><th>Yes</th><th>No</th></tr>';
                for ($i = 0; $i < $num_rows; $i++) {
                    $row = mysqli_fetch_assoc($result);
                    print '<tr><td>' . $row['question'] . '</td><td><input name = "'.$row['id'].'" value = "yes" type="radio" /></td><td><input value = "no" name = "'.$row['id'].'" type="radio" /></td></tr>';
                }
            ?>
        </table>
        <br>
        <input name='ID' type="text" />
        <input type="submit" />
    </form>
</body>

</html>