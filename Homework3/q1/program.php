<!-- Question 1 -->
<?php
    function factors($num){
        $factors = array(); //Makes and array to store factors
        for($i =1; $i<=$num; $i++){ //running through all the numbers for num to 0
            if($num % $i == 0) //checks if the starting number can be divided evenly by i
                $factors[] = $i; //puts i in the array if true
        }
        if(count($factors)>0) //checks to see if there are any factores
            return implode(",", $factors); //returns the array as a string 
    }
?>

<!-- Question 2 -->
<?php
    function tax($status, $income) {
        if(strtoupper($status) == 'SINGLE'){ //checks to see if the status is single
            if($income>=30000){ //checks to see if the income is greater that 30,000
                return "25%";
            }else{
                return "20%";
            }
        } else if (strtoupper($status) == "MARRIED") { //checks to see if the status is married 
            if($income>=50000){ //checks to see if the income is greater than 50,000
                return "15%";
            }else{
                return "10%";
            }
        }

    }
?>

<!-- Question 3 -->
<?php
    function stdDev($set) {
        $total = 0; //setting the total to zero
        $temp =0; //setting a temp value to zero
        if(count($set)>=2){ //checks to see if the number is at least 2 
            for ($i = 0; $i < count($set); $i++) //runs through the set of numbers
                $total += $set[$i];//adds all the numbers together

            $total = $total/count($set); //get the average of the numbers

            for ($i = 0; $i < count($set); $i++) //runs through the set of numbers
                $temp += pow(($set[$i]-$total), 2); //get a number from the set subtracts the total and squars it and saves it to temp

            return sqrt($temp/count($set)); //Takes the calulated number in temp and divides it by the size of set
                                            // then taks the squar root of the number and returns it 

        } else {
            return 0; //else returns zero
        }
    }
?>

<!-- Question 4 -->
<?php
    function compoundInterest($princable, $interest, $years) {
        $ans = $princable*pow((1 + $interest / 100), $years);
        return $ans;
    }
?>

<!-- Question 5 -->
<?php
    function createIdPassword($fname, $lname) {
        $fname = strtoupper($fname);//Turns fname to upper case
        $lname = strtoupper($lname);//Turns lname to upper case

        $cerdentials = array("id" => substr($fname,0,1) . $lname,  //sets id to the first letter of the fname and the whole last name 
                    "password" => substr($fname,0,1) . substr($fname, strlen($fname)-1,strlen($fname)) 
                    . substr($lname, 0,3) . strlen($fname) . strlen($lname)); //sets the password to the first and last letter of fname, the first 3 letters of the lname and the size of both fname and lname

        return $cerdentials; //returns the dependency array
    }
?>

<!-- Question 6 -->
<?php
    function removeDuplicates($input) {
        $unique = array(); //makes and empty array
        $isUnique = true; //sets a flag varaible 
        for ($i = 0; $i<count($input); $i++){ // runs form size of the input to 0
            for ($j = 0; $j<count($unique); $j++){ //runs from isUnique to 0
                if($input[$i] == $unique[$j]){ // checks to see if the current input index is anyware in the unique array
                    $isUnique = false; //if true then the value is not unique so set flag to false
                    break; //stop running 
                }
                else 
                    $isUnique = true; //else set it back to true
            }
            if($isUnique)
                $unique[] = $input[$i]; //if the flag variable is still true then put the input value in the array
        }
        return $unique; //return the filters array
    }
?>

<!-- Question 7 -->
<?php
    class Student{
        private   $name; //setting class attrubte
        private   $gpa; //setting class attrubte

        //constructor
        public function __construct($name, $gpa) { 
            $this->name = $name; 
            $this->gpa = $gpa; 
        } 

        //get function for gpa 
        public function getGPA(){
            return $this->gpa;
        }

        //get functon for name
        public function getName(){
            return $this->name;
        }

        //set function for gpa
        public function setGPA($gpa){
            $this->gpa = $gpa;
        }

        //set function for name 
        public function setName($name){
            $this->name = $name;
        }

        //checks to see if the student is in honors
        public function isHonors(){
            if($this->gpa >3) //checks to see if the gpa is greater than 3
                return true; 
            return false;
        }

        // tostring function
        public function toString(){
            return 'Name: ' . $this->name .' GPA: '. $this->gpa;
        }
    }
?>

<!-- Question 8 -->
<?php
    function university($name){
        if(preg_match('/^E\-0[0-9][0-9][a-z]\-9[a-z][a-z][0-9]$/', $name)== 1){ //checks E-0 then if there is 2 numbers 0-9 and a lower case a-z
                                                                                //then checks for 9 2 lowercase letters a-z and 1 number 0-9
            return true;
        }
        return false;
    }

    function phone($name){
        if(preg_match('/^\d{3}-\d{3}-\d{4}$/', $name) == 1){ //checks to see if ther is 3 numbers (0-9) - 3 numbers (0-9) - 4 number (0-9)
            return true;
        }
        return false;
    }
?>