<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CMS</title>
</head>
<body>
<h1>Hello PGM!</h1>
<h2>Les OOP</h2>

<pre>
<?php
    require_once 'models/User.php';
    require_once 'models/Teacher.php';

    //Maak een nieuwe Teacher aan
    $user = new Teacher('Michael', 'Vanderpoorten');
    //Onderstaande properties moeten we niet meer toekennen omdat ze worden ingevuld via de construct method
    //$user->firstname = "Michael";
    //$user->lastname = "Vanderpoorten";

    //Teacher heeft een extra property courses tov de User Class
    $user->courses = ["@Work1", "PGM 6"];
    print_r($user);
    echo('Volledige naam: ' . $user->getFullName());
    echo $user->getCoursesString(); 
    
    //extra newline toevoegen
    echo PHP_EOL . 'Hieronder staat een user die opgehaald is via een static method' . PHP_EOL;
    
    //Static function aanroepen
    $dieter = User::getUserById(1);
    print_r($dieter);
?>
</pre>
</body>
</html>