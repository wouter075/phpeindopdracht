<?php
// huidige map van index.php
$cwd = getcwd();

// hebben we een map aangeklikt
if (isset($_GET['dir'])) {
    $cwd = $_GET['dir'];
}

// path opschonen:
$cwd = realpath($cwd);

// ophalen alle bestanden en mappen
$all = scandir($cwd);

// breadcrums:
$crumbs = str_replace(getcwd(), "", $cwd);
$crumbs = ltrim($crumbs, DIRECTORY_SEPARATOR);
$crumbs = explode(DIRECTORY_SEPARATOR, $crumbs);

$link = getcwd();
echo '<a href="index.php">home</a> ' . DIRECTORY_SEPARATOR . " ";
foreach ($crumbs as $crum) {
    $link .= DIRECTORY_SEPARATOR . $crum;
    echo '<a href="index.php?dir=' . $link . '">' . $crum . '</a> ' . DIRECTORY_SEPARATOR . " ";
}
echo "<br>";

//print_r($all);
foreach ($all as $a) {
    if (is_file($cwd . '/' . $a)) {
        echo '<a href="index.php?dir=' . $cwd .'&file=' . $a . '">' . $a . '</a><br>';
    } else {
        echo '<a href="index.php?dir=' . $cwd . DIRECTORY_SEPARATOR . $a . '">' . $a . '</a><br>';
    }
}



