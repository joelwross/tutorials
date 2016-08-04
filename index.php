<?php 
$title = 'Tutorials';
include 'header.php';

$tutorials = [
    "Essential HTML" => "essential-html/",
    "Essential CSS" => "essential-css/",
];

echo '<ul>';
foreach ($tutorials as $title => $url) {
    echo "<li><a href=\"$url\">$title</a></li>";
}
echo '</ul>';

include 'footer.php'; 
?>
