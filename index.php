<?php 
$title = 'Tutorials';
include 'header.php';

$tutorials = [
    "Essential HTML" => "essential-html.php",
    "Essential CSS" => "essential-css.php",
];

echo '<ul>';
foreach ($tutorials as $title => $url) {
    echo "<li><a href=\"$url\">$title</a></li>";
}
echo '</ul>';

include 'footer.php'; 
?>
