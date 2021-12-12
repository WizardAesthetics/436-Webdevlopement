<?php
    // Checking to see if the name is set in the get array. Did this so that way if the user accedently loads wrong page the cookies wont be set to empty
    if(isset($_GET['name']))
        setcookie("name", $_GET['name'], time()+ (86400 * 30));
    if(isset($_GET['address']))
        setcookie("address", $_GET['address'], time()+(86400 * 30));
?>

<!DOCTYPE html>
<head>
    <title>Customer</title>
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
        tr:hover {
            background-color: lightblue;
        }
        td{
            padding: 10px;
            text-align: left;
            border: solid black;
            width: 50%;
        }
        th{
            padding: 10px;
            text-align: center;
        }
        h1, h3{
            text-align: center;
        }
    </style>
</head>

<body>
    <h1>Customer Login</h1>
    <table>
    <?php
        print '<tr><th>Item</th><th>Values</th></tr>';

        // Get the varablies
        $name = $_GET['name'];
        $card = $_GET['card'];
        $addr = $_GET['address'];
        $total = 0;

        // Print the varibles 
        print '<tr><td>Name</td><td>'.$name.'</td></tr>';
        print '<tr><td>Card</td><td>'.$card.'</td></tr>';
        print '<tr><td>Addr</td><td>'.$addr.'</td></tr>';

        // Check which food items them have selected
        if(isset($_GET['burger'])){
            print '<tr><td>Burger</td><td>$8.00</td></tr>'; // Print food item
            $burger = true; // set food item to true
            $total += 8; // add hard code price to total
        } else
            $burger = 0; // if this item wasnt selected set it to zero I did this because faluse shows as a blank in the Database and I thought it was better to see a number
        if(isset($_GET['pizza'])){
            print '<tr><td>Pizza</td><td>$10:00</td></tr>'; // Print food item
            $pizza = true; // set food item to true
            $total += 10; // add hard code price to total
        } else
            $pizza = 0;
        if(isset($_GET['soda'])){
            print '<tr><td>Soda</td><td>$3:00</td></tr>'; // Print food item
            $soda = true; // set food item to true
            $total += 3; // add hard code price to total
        } else
            $soda = 0;

        // Insert new order into the database
        $db = mysqli_connect("localhost", "root",  "@Rustynail10", "db3");
        $query = "INSERT INTO orders (name, card, address, burger, pizza, soda) Value ('".$name."', '".$card."', '".$addr."', '".$burger."', '".$pizza."', '".$soda."');"; 
        mysqli_query($db, $query);

        // Print total 
        print '<tr><td>Total</td><td>$'.$total.'.00</td></tr>';
        print '<h3>Thank you for you business</h3>';
    ?>
     </table>
</body>