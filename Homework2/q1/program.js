// Question 1
function middle(num1, num2, num3) {
    if (num1 > num2) {
        if (num2 > num3)
            return num2;
        else if (num1 > num3)
            return num3;
        else
            return num1;
    }
    else {
        if (num1 > num3)
            return num1;
        else if (num2 > num3)
            return num3;
        else
            return num2;
    }
}

// Question 2
function factors(num) {
    var ans = '';
    for (let i = 1; i <= num; i++) {
        if (num % i == 0) {
            ans += i + ', ';
        }
    }
    return ans;
}

// Question 3
function tax(status, income) {
    if(status != null){
        if(status.toString().toUpperCase() == 'SINGLE'){
            if(income>30000){
                return "25%";
            }else{
                return "20%";
            }
        } else if (status.toString().toUpperCase() == "MARRIED") {
            if(income>50000){
                return "15%";
            }else{
                return "10%";
            }
        }
    }
}

// Question 4
function stdDev(set) {
    total = 0;
    temp =0;
    if(set.length>=2){
        for (var i = 0; i < set.length; i++) {
            total += parseFloat(set[i]);
        }
        total = total/set.length;
        for (var i = 0; i < set.length; i++) {
            temp += Math.pow((parseFloat(set[i])-total), 2);
        }
        return Math.sqrt(temp/set.length);

    } else {
        return 0;
    }
}

// Question 5
function compoundInterest(princable, interest, years) {
    ans = princable*Math.pow((1 + interest / 100), years);
    return ans;
}

// Question 6
function charType(char) {
    if(char >= '0' && char <= '9')
        return 'DIGIT';
    else if(char==char.toLowerCase() && char>='a' && char<='z')
        return 'LOWER';
    else if (char==char.toUpperCase()&& char>='A' && char<='Z')
        return 'UPPER';
    else 
        return 'OTHER';
}

// Question 7
function createIdPassword(fname, lname) {
    fname = fname.toUpperCase();
    lname = lname.toUpperCase();
    var obj = {
        username:  fname.substring(0,1) + lname,
        password: fname.substring(0,1) + fname.substring(fname.length-1,fname.length) + lname.substring(0,3) + fname.length +lname.length

    }
    return obj;
}

// Question 8
function removeDuplicates(input) {
    unique = [];
    isUnique = true;
    for (let i = 0; i<input.length; i++){
        for (let j = 0; j<unique.length; j++){
            if(input[i] == unique[j]){
                isUnique = false;
                break;
            }
            else {
                isUnique = true;    
            }
        }
        if(isUnique){
            unique.push(input[i]);
        }
    }
    return unique;
}

// Question 9
function mySort(array1, array2, array3) {
    for (i = 0; i < array1.length - 1; i++) {
        for (j = i + 1; j < array1.length; j++) {
            if (array1[j] < array1[i]) {
                temp = array1[i];
                array1[i] = array1[j];
                array1[j] = temp;

                temp = array2[i];
                array2[i] = array2[j];
                array2[j] = temp;

                temp = array3[i];
                array3[i] = array3[j];
                array3[j] = temp;
            }
        }
    }
}

// Question 10
function myReverse(input) {
    temp = '';
    for (let i = input.length; i >=0; i--) {
        temp += input.charAt(i);
    }
    return temp;
}

// Question 11
function f(num){
    return Math.pow(num, 2);
}

function ApplyFunctionToArray(f, p){
    for (i=0;i<p.length;i++){
        p[i] = f(p[i]);
    }
}

// Question 12
class Student{
    constructor(name, gpa){
        this.name = name;
        this.gpa = gpa;
    }

    getGPA(){
        return this.gpa;
    }

    getName(){
        return this.name;
    }

    setGPA(gpa){
        this.gpa = gpa;
    }

    setName(name){
        this.name = name;
    }

    isHonors(){
        if(this.gpa >3)
            return true;
        return false;
    }

    toString(){
        return this.name +' '+ this.gpa;
    }
}

// Question 13
function university(name){
    if(name.search(/^E\-0[0-9][0-9][a-z]\-9[a-z][a-z][0-9]$/) == 0){
        return true;
    }
    return false;
}

function phone(name){
    if(name.search(/^(313|248|734)\-[0-9][0-9][0-9]\-[0-9][0-9][0-9][0-9]$/) == 0){
        return true;
    }
    return false;
    
}

// Question 14
function fullName(name){
    if(name.search(/^M[RSrs]+\s+[A-Z][a-z]+\s+[A-Z]\.\s+[A-Z][a-z]+\s*$/) == 0){
        return true;
    }
    return false;
    
}