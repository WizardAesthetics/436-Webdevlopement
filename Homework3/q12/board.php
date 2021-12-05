<!DOCTYPE html>
<html>

<head>
    <title>Message Board</title>
    <style>
        body {
            background-color: brown;
        }
        table{
            margin: auto;
            width: 75%;
        }
        td{
            text-align: center;
            background-color: cadetblue;
            padding: 10px;
        }
        td:hover
        {
            background-color:lightblue;
        }
        form{
            text-align: center;
        }
        h1{
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>Message Board</h1>
    <table>
        <?php
            // Making the connection to the database
            $db = mysqli_connect("localhost", "root",  "@Rustynail10", "db1"); 

            // Construction the query and reteriving the results
            $query = "SELECT * FROM messages;"; 
            $result = mysqli_query($db, $query); 
            $num_rows = mysqli_num_rows($result);

            //running through the rows in the database and printing them out 
            for ($i=0; $i<$num_rows; $i++){
                $row = mysqli_fetch_assoc($result);
                print '<tr><td>' .$row['date'].'<br>'.$row['message']. '</td></tr>';
            }
        ?>
    </table>

    <br>
    
    <form method="post" action="update.php"> 
        <input style="width: 30%;" name ='message' type="text" required/>
        <input type="submit"/>
    </form>

</body>

</html>