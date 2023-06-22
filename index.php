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

// breadcrumbs:
$crumbs = str_replace(getcwd(), "", $cwd);
$crumbs = ltrim($crumbs, DIRECTORY_SEPARATOR);
$crumbs = explode(DIRECTORY_SEPARATOR, $crumbs);

// one liner:
// $crumbs = explode(DIRECTORY_SEPARATOR, ltrim(str_replace(getcwd(), "", $cwd), DIRECTORY_SEPARATOR));

$link = getcwd();
echo '<a href="index.php">home</a> ' . DIRECTORY_SEPARATOR . " ";
foreach ($crumbs as $crumb) {
    $link .= DIRECTORY_SEPARATOR . $crumb;
    echo '<a href="index.php?dir=' . $link . '">' . $crumb . '</a> ' . DIRECTORY_SEPARATOR . " ";
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

if (isset($_GET['file'])) {
    $file = $_GET['file'];
    $full_path = $cwd . DIRECTORY_SEPARATOR . $file;

    echo "<hr>";
    echo "Er is een bestand aangeklikt.<br>";
    echo "file: " . $file . "<br>";
    echo "full_path: " . $full_path . "<br>";
}



