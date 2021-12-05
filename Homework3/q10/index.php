<!DOCTYPE html>
<html>
<head>
    <title>Compound Interest</title>
    <style>
        body{
            background-color: brown;
        }
        tr:hover {
            background-color: lightblue;
        }
        table{
            width: 40%;
            background-color: cadetblue;
        }
        td,th{
            font-size: large;
        }
    </style>

</head>

<body>
    <?php
        // Getting all the variables from the URL using GET 
        $princable = $_GET['Princable'];
        $interest = $_GET['Interest'];
        $Years = $_GET['Years'];
        $ans = 0;

        //Print all the variables and setting up the table
        print '<h1 style = "text-align: center; ">Interst Breakdown</h1>';
        print '<h3 style = "text-align: center">Princable: '.$princable.'</h3>';
        print '<h3 style ="text-align: center">Interest: '.$interest.'</h3>';
        print '<h3 style ="text-align: center">Years: '.$Years.'</h3>';
        print '<table style = "border: solid black; margin: auto; padding: 10px;">';
        print '<tr><th style = "padding: 5px;">Year</th><th style = "padding: 5px;">Money</th></tr>';

        // calculating the interst year by year and printing it in a table
        for($i=0; $i< $Years+1; $i++){
            $ans = $princable * pow((1 + $interest / 100), $i);
            print '<tr><td style = "padding: 5px; border: solid black;">Year '. $i . '</td><td style = "padding: 5px; border: solid black;">$' . $ans . '</td></tr>';
        }
        print '</table>';
    ?>
</body>

</html>