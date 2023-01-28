<?php 
// Create your own page that is capable of receiving three GET parameters:
// 1) firstname
// 2) lastname
// 3) age
// Your page should output two sentences:
// 1) “Hello, my name is [firstname] [lastname].”
// 2) This statement is conditional based on the [age] parameter.
// “I am [age] years old and... 
// a) if greater than or equal to 18… “I am old enough to vote in the United States.”
// b) if less than 18… “I am not old enough to vote in the United States.”
// 3) Calculate the days based on the number given for age (3rd sentence)
// 4) Add the current date to your page with PHP 
// You do not need to create a form. You can test your app by appending the GET parameters directly to the URL in your browser address bar.
// Use the appropriate built-in PHP functions to clean the input parameters before writing to your page (to prevent XSS attacks)
// Output a message if the required parameters are not submitted (see examples)
// Avoid errors if the parameters are empty OR do not even exist
// Practice your CSS design skills by trying to emulate or improve upon my example
// Push your PHP file to a GitHub repository
// Submit the link to your GitHub repository in Blackboard by clicking the assignment title above. (Note the image detailing where to put the link when you submit)
// Please ask questions if you need to.
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lesson 2 HW Andrew Bish</title>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
    <header>
        <?php
            $firstName = filter_input(INPUT_GET, "firstName", FILTER_SANITIZE_STRING);
            htmlspecialchars($firstName);
            $lastName = filter_input(INPUT_GET, "lastName", FILTER_SANITIZE_STRING);
            htmlspecialchars($lastName);
            $age = filter_input(INPUT_GET, "age", FILTER_SANITIZE_STRING);
            htmlspecialchars($age);
            
        ?>
        <h1>
            <?php
            if(!empty($firstName) && !empty($lastName)){
                include('./greetings/userGreetings.php');
            } else {
                include('./greetings/visitorGreetings.php');
            }
            
            ?>
        </h1>
    </header>
    <main>
        <h2>
            <?php
            $myAge = "I am {$age} years old";
            if($age >= 18){
                $voting = "I am old enough to vote in the United States.";
            } else {
                $voting = "I am not old enough to vote in the United States.";
            }
            echo $myAge .".\n". $voting;
            ?>
        </h2>
        <br>
        <h2>
            <?php
            $daysOld = $age * 365;
            $myDaysOld = "I am {$daysOld} days old.";
            echo $myDaysOld;
            ?>
        </h2>
    </main>
    <footer>
        <h3>
        <?php
            echo "Today is " . date("m/d/Y") .".";
        ?>
        </h3>
    </footer>
    
    
</body>
</html>