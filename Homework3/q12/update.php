<!DOCTYPE html>
<html>

<head>
    <title>Message Board</title>
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
        h1, h4{
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>Message Board</h1>
    <table>
        <?php
            date_default_timezone_set("America/New_York");
            // making the connection to the database
            $db = mysqli_connect("localhost", "root",  "@Rustynail10", "db1");

            //checking if the message is set and greater than null
            if(isset($_POST['message']) && $_POST['message'] != '' && strlen($_POST['message'])<=100){
                //makeing the query string to insert
                $query = "INSERT INTO messages(message, date) values ('".$_POST['message']."' , '". date("Y-m-d"). "');"; 
                mysqli_query($db, $query); 
            } else {
                print '<h4>messge to long</h4>';
            }

            // Make the query string to get all the messgaes in the table
            $query = "SELECT * FROM messages;"; 
            $result = mysqli_query($db, $query); 
            $num_rows = mysqli_num_rows($result);

            //Displaying all the rows in the data base
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

