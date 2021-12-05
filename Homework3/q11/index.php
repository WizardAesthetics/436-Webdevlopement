<!DOCTYPE html>
<html>
<head>
    <title>Tution Cost</title>
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
            width: 50%;
        }
    </style>
</head>

<body>
    <?php
        // Useing post to get the information
        // Checking to see if the credits are 0-18
        if($_POST['credits']>0 && $_POST['credits']<=18){
            $credits = $_POST['credits'];
            $status = $_POST['status'];
            $state = $_POST['state'];

            // Printing out the title, and setting up the table
            print '<h1 style ="text-align: center;">Tution Cost</h1>';
            print '<table style = "width: 30%; border: solid black; margin: auto; padding: 10px;">';
            print '<tr><th style = "padding: 5px;">Item</th><th style = "padding: 5px;">Values</th></tr>';
            print '<tr><td style = "padding: 5px; border: solid black;">Credits</td><td style = "padding: 5px; border: solid black;">' . $credits . '</td></tr>';

            $ans = 0;
            //Chekcing the status of the stdent
            if($status == 'UnderGrad'){   
                // Print the status 
                print '<tr><td style = "padding: 5px;  border: solid black;">Academic Status</td><td style = "padding: 5px;  border: solid black;">Under Graduate</td></tr>';    
                
                // Checking if the student is instate or not
                if($state=='inState'){
                    // Print instate
                    print '<tr><td style = "padding: 5px;  border: solid black;">State Status</td><td style = "padding: 5px;  border: solid black;">In State</td></tr>';
                    $ans += 200*$credits;
                    // Printing out the tution amount
                    print '<tr><td style = "padding: 5px;  border: solid black;">Tuition</td><td style = "padding: 5px;  border: solid black;">$'.$ans.'</td></tr>';
                } else if($state=='outState'){
                    // Print out of state
                    print '<tr><td style = "padding: 5px;  border: solid black;">State Status</td><td style = "padding: 5px;  border: solid black;">Out of State</td></tr>';
                    $ans += 400*$credits;
                    // Printing out the tution amount
                    print '<tr><td style = "padding: 5px;  border: solid black;">Tuition</td><td style = "padding: 5px;  border: solid black;">$'.$ans.'</td></tr>';
                }

                // Checking if dorm is set
                if(isset($_POST['dorm'])){
                    print '<tr><td style = "padding: 5px; border: solid black;">Dorm</td><td style = "padding: 5px; border: solid black;">$1000</td></tr>';
                    $ans += 1000;
                }
                
                // Checking if dining is set
                if(isset($_POST['dining'])){
                    print '<tr><td style = "padding: 5px; border: solid black;">Dining</td><td style = "padding: 5px; border: solid black;">$500</td></tr>';
                    $ans += 500;
                }
                
                // Checking if parking is set
                if(isset($_POST['parking'])){
                    print '<tr><td style = "padding: 5px; border: solid black;">Parking</td><td style = "padding: 5px; border: solid black;">$200</td></tr>';
                    $ans += 200;
                }
                
            } else if($status == 'Graduate'){
                print '<tr><td style = "padding: 5px; border: solid black;">Academic Status</td><td style = "padding: 5px; border: solid black;">Graduate</td></tr>'; 
                if($state=='inState'){
                    // Print instate
                    print '<tr><td style = "padding: 5px; border: solid black;">State Status</td><td style = "padding: 5px; border: solid black;">In State</td></tr>';
                    $ans += 300*$credits;
                    // Printing out the tution amount
                    print '<tr><td style = "padding: 5px; border: solid black;">Tuition</td><td style = "padding: 5px; border: solid black;">$'.$ans.'</td></tr>';
                } else if($state=='outState'){
                    // Print out of state
                    print '<tr><td style = "padding: 5px; border: solid black;">State Status</td><td style = "padding: 5px; border: solid black;">Out of State</td></tr>';
                    $ans += 600*$credits;
                    // Printing out the tution amount
                    print '<tr><td style = "padding: 5px; border: solid black;">Tuition</td><td style = "padding: 5px; border: solid black;">$'.$ans.'</td></tr>';
                }
                
                // Checking if dorm is set
                if(isset($_POST['dorm'])){
                    print '<tr><td style = "padding: 5px; border: solid black;">Dorm</td><td style = "padding: 5px; border: solid black;">$1000</td></tr>';
                    $ans += 1000;
                }
                
                // Checking if dining is set
                if(isset($_POST['dining'])){
                    print '<tr><td style = "padding: 5px; border: solid black;">Dining</td><td style = "padding: 5px; border: solid black;">$500</td></tr>';
                    $ans += 500;
                }
                
                // Checking if parking is set
                if(isset($_POST['parking'])){
                    print '<tr><td style = "padding: 5px; border: solid black;">Parking</td><td style = "padding: 5px; border: solid black;">$200</td></tr>';
                    $ans += 200;
                }
            }
            
            // Printing total cost
            print '<tr><td style = "padding: 5px; border: solid black;">Total Cost</td><td style = "padding: 5px; border: solid black;">$' . $ans . '</td></tr>';
            print '</table>';
        }
        else{
            print '<h1 style ="text-align: center;">Tution Cost</h1>';
            print '<h1 style ="text-align: center;">Credits needs to be between 0-18</h1>';
        }

    ?>
</body>
</html>