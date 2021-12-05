<!DOCTYPE html>

<head>
    <title>Orders</title>
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
        }
        td:hover {
            background-color: lightblue;
        }
        td{
            display: block;
            padding: 10px;
            text-align: left;
            border: solid black;
            margin: 10px;
        }
        th{
            padding: 10px;
            text-align: center;
        }
        h1, h3, p{
            text-align: center;
        } 
        div{
            background-color: azure;
            width: 50%;
            padding: 5px;
            margin: auto;
        }
    </style>
</head>

<body>
    <h1>Orders</h1>
    <form method="get" action="update.php">
        <?php
        if (isset($_GET['ID']) && $_GET['ID'] != '') {
            $id = $_GET['ID'];
            $db = mysqli_connect("localhost", "root",  "@Rustynail10", "db3");

            $query = "SELECT * FROM orders;";
            $result = mysqli_query($db, $query);
            $num_rows = mysqli_num_rows($result);

            // Delete the order with the corisponding ID
            for ($i = 0; $i < $num_rows; $i++) {
                $row = mysqli_fetch_assoc($result);
                if ($row['auto_id'] == $id) {
                    $query = "DELETE FROM orders WHERE auto_id = $id;";
                    $result = mysqli_query($db, $query);
                    break;
                }
            }

            $total = 0;//Set total to 0  
            // Get all the orders
            $query = "SELECT * FROM orders;";
            $result = mysqli_query($db, $query);
            $num_rows = mysqli_num_rows($result);
            print '<table>';
            // Run throught the orders and print them out.
            for ($i = 0; $i < $num_rows; $i++) {
                $row = mysqli_fetch_assoc($result);
                print '<tr><td><p style = "font-size:large; font-weight: bold;">'.$row['auto_id'].'</p><div>';
                print '<p>-----------------------</p>';
                if($row['burger']) {
                    print '<p>'.$row['burger'].' Burger $8.00</p>';
                    $total += 8;
                }
                if($row['pizza']){
                    print '<p>'.$row['pizza'].' Pizza $10.00</p>';
                    $total += 10;
                }
                if($row['soda']){
                    print '<p>'.$row['soda'].' Soda $3.00</p>';
                    $total += 3;
                }
                print '<p>-----------------------</p>';
                print '<p>Total $'.$total.'.00</p></div><p style = "font-size:large; font-weight: bold;">'.$row['name'].'</p><p style = "font-size:large; font-weight: bold;">'.$row['card'].'</p><p style = "font-size:large; font-weight: bold;">'.$row['address'].'</p></td></tr>';
                $total = 0;
            }
            print '</table>';
        } else {
            print '<h3>No ID Set</h3>';
        }
        ?>
        <br>
        <input name='ID' type="text" />
        <input type="submit" value="Update"/>
    </form>
</body>