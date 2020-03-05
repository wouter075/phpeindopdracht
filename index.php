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

//print_r($all);
foreach ($all as $a) {
    if (is_file($cwd . '/' . $a)) {
        echo '<a href="index.php?dir=' . $cwd .'&file=' . $a . '">' . $a . '</a><br>';
    } else {
        echo '<a href="index.php?dir=' . $cwd .'/' . $a . '">' . $a . '</a><br>';
    }
}



