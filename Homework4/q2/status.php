<?php
    // Setting session cookie for credits
    setcookie("credits", $_POST['credits']);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Status</title>
    <style>
        body{
            background-color: brown;
        }
        input {
            margin: 10px;
        }
        h1{
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
        form
        {
            display: inline-block;
            margin-left: auto;
            margin-right: auto;
            text-align: left;
        }
    </style>
</head>

<body>
    <div>
        <h1>Student Status</h1>
        <!-- Using post to gather data -->
        <form method="post" action="state.php" > 
            <!-- Radido group for status -->
            <input checked name="status" value ='UnderGrad' type="radio">UnderGrad</input>
            <input name="status" value ='Graduate' type="radio"></input>Graduate<br>

            <input type="submit" value="Next"/><br>
        </form>
    </div>  
</body>  
</html>