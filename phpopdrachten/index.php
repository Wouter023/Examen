<body>
<head>
    <link rel="stylesheet" href="css/css.css"
</head>
<div id="header">
    <?php

    $cwd = getcwd();

    if (isset($_GET['dir'])) {
        $cwd = $_GET['dir'];
    }

    $cwd = realpath($cwd);

    $e = explode("\\", $cwd);

    $crumbs = array_splice($e, 4);
    $crumblink = "";
    $crumbpath = '<a href="index.php?dir=' . getcwd() . '">' . "Home" . '</a>';

    foreach ($crumbs as $crumb) {
        $crumblink = $crumblink . "\\" . $crumb;
        $crumbpath = $crumbpath . " - " . '<a href="index.php?dir=' . getcwd() . "\\" . $crumblink . '">' . $crumb . '</a>';
    }

    echo $crumbpath;
    ?>
</div>
<nav>
    <ul>
        <?php


        if (strpos($cwd, getcwd()) === false) {
            echo "Je bevind je buiten de toegestane map<br>" .
                "<a href='index.php'>Ga terug naar de home pagina</a>";
            $cwd = getcwd();
            $all = scandir($cwd);
            $all = array_splice($all, 1);

            $map = [];
            $file = [];
        } else {
            $all = scandir($cwd);
            $all = array_splice($all, 1);

            $map = [];
            $file = [];

        }
        foreach ($all as $item) {
            if (is_dir($item)) {
                array_push($map, $item);
            } else {
                array_push($file, $item);
            }
        }

        foreach ($map as $item) {
            if (is_file($cwd . '\\' . $item)) {
                echo '<a href="index.php?dir=' . $cwd . '&file=' . $item . '">' . $item . '</a><br>';
            } else {
                echo '<a href="index.php?dir=' . $cwd . '\\' . $item . '">' . $item . '</a><br>';
            }
        }

        foreach ($file as $item) {
            if (is_file($cwd . '\\' . $item)) {
                echo '<a href="index.php?dir=' . $cwd . '&file=' . $item . '">' . $item . '</a><br>';
            } else {
                echo '<a href="index.php?dir=' . $cwd . '\\' . $item . '">' . $item . '</a><br>';
            }
        }
        ?>
    </ul>
</nav>

<?php
if (isset($_GET['file'])) {
    function human_filesize($bytes, $decimals = 2)
    {
        $size = array('B', 'kB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB');
        $factor = floor((strlen($bytes) - 1) / 3);
        return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) . @$size[$factor];
    }

    $file = $_GET['file'];
    $filelocation = $cwd . '\\' . $file;
    $size = human_filesize(filesize($filelocation));
    $write = is_writeable($filelocation);
    setlocale(LC_TIME, 'NL_nl');
    $editdate = strftime("%e %B %Y om %H:%M:%S", filemtime($filelocation));
    $mime = explode('\\', mime_content_type($filelocation))[0];

    echo "Bestand: " . $file . "<br>";
    echo "Grootte: " . $size . "<br>";
    echo 'Schrijfbaar: ' . ($write ? 'Ja' : 'Nee') . '<br>';
    echo "Laatst aangepast: " . $editdate . "<br>";

    $typearray = explode('/', $mime);
    $type = $typearray[0];
    if ($type == "text") {
        if ($_SERVER["REQUEST_METHOD"] == 'POST') {
            file_put_contents($filelocation, $_POST['tekst']);
        }
        $inhoud = htmlentities(file_get_contents($filelocation));

        echo '<form action="index.php?dir=' . $cwd . '&file=' . $file . '"></a><br>';
        echo '<textarea name="tekst" cols="40" rows="20">' . htmlspecialchars($inhoud) . '</textarea>';
        echo '<input type="submit" value="Verzenden">';
        echo '</form>';
    } elseif ($type == "image") {
        $imgloc = str_replace(getcwd(), "", $filelocation);
        $imgloc = substr($imgloc, 1);
        echo "<img src='" . $imgloc . "'>";
    } else {
        echo "Dit type bestand kan niet worden weergegeven: " . $type;
    }
}
?>

</body>