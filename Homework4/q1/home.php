<!DOCTYPE html>
<head>
    <title>Home</title>
    <style>
        body{
            background-color: brown;
        }
        input {
            margin: 10px;
        }
        h1,h3{
            text-align: center;
        }
        #main
        {
            display: block;
            text-align: center;
            background-color: cadetblue;
            height: 500px;
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
        #menu{
            text-align: center;
        }
    </style>
</head>

<body>
    <div id="main">
        <h1>Customer Login</h1>
        <form method="get" action="customer.php">
            <h3>Menu</h3>
            <div id="menu">
                <input name ='burger' type="checkbox">Burger $8.00</input><br>
                <input name ='pizza' type="checkbox">Pizza $10:00</input><br>
                <input name ='soda' type="checkbox">Soda $3:00</input><br>
            </div>
            <h3>User Info</h3>
            <?php
                //Checking to see if the name cookie hasbe set or not
                if(isset($_COOKIE["name"]))
                    print '<input name =\'name\' type="text" value="'.$_COOKIE["name"].'" required>Name</input><br>';
                else
                    print '<input name =\'name\' type="text"  required>Name</input><br>';
                
                //Checking to see if the address cookie was set
                if(isset($_COOKIE["address"]))
                    print '<input name =\'address\' type="text" value="'.$_COOKIE["address"].'" required>Addr</input><br>';
                else
                    print '<input name =\'address\' type="text" required>Addr</input><br>';

                // Printint the other elements like normal
                print '<input name =\'card\' type="text" required>Card</input><br>';
                print '<input type="submit"/>';
            ?>
        </form>
    </div>
</body>
        
