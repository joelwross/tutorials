<?php
$tutorials = [
    "Essential HTML" => "essential-html/",
    "Essential CSS" => "essential-css/",
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta charset="UTF-8">
    <title>Tutorials</title>
    <link rel="icon" href="img/favicon.png">
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/main.css">
</head>
<body class="container">
    <header class="page-header">
        <h1>Tutorials</h1>
    </header>

    <main>
        <ul>
            <?php foreach ($tutorials as $title => $url) : ?>
            <li><a href="<?=$url?>"><?=$title?></a></li>
            <?php endforeach ?>
        </ul>
    </main>

    <footer>
        <p>
            <small>
                &copy; 2016, 
                <a href="https://ischool.uw.edu/people/faculty/dlsinfo">Dave Stearns</a>, 
                <a href="https://ischool.uw.edu/">The Information School</a>, 
                <a href="http://www.washington.edu/">University of Washington</a>
            </small>
        </p>
    </footer>    
</body>
</html>
