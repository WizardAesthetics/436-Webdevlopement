<?php
    // Setting session cookie for status
    setcookie("status", $_POST['status']);
?>
<!DOCTYPE html>
<html>
<head>
    <title>State</title>
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
        <h1>State</h1>
        <!-- Using post to gather data -->
        <form method="post" action="calculate.php" > 
            <!-- Radio gorup for state -->
            <input checked name="state" value ='inState' type="radio">In State</input>
            <input name="state" value ='outState' type="radio">Out of State</input><br>

            <input type="submit" value="Next"/><br>
        </form>
    </div>  
</body>  
</html>