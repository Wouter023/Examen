<body>
<head>
    <link rel="stylesheet" href="css/css.css"
</head>
<header>
    <h2><?php if (isset($_GET['map'])){
        echo 'Home > '. $_GET['map'];
    }
    else{
        echo 'Home >';
    }
    ?>
    </h2>
</header>
<nav>
    <ul>

        <?php

        $homemenu = scandir('../phpopdrachten');
        $homemenu = array_slice($homemenu, 3);
        $sidemenu = [];
        if(isset($_GET['map'])){
            $sidemenu = scandir('../phpopdrachten/'. $_GET['map']);
        }
        $sidemenu = array_slice($sidemenu,2);
        $file = [];
        $map = [];
        $sidemap = [];
        $sidefile = [];
        ?>

        <h3>
            Mappen/Bestanden
        </h3>

        <?php
        foreach ($homemenu as $menuitem){
            if(is_dir($menuitem)){
                array_push($map, $menuitem);
            }
            else{
                array_push($file, $menuitem);
            }
        }
        foreach ($sidemenu as $menuitem){
            if(is_dir($menuitem)){
                array_push($sidemap, $menuitem);
            }
            else{
                array_push($sidefile, $menuitem);
            }
        }

        if (isset($_GET['map'])){
            foreach ($sidemap as $menuitem) { ?>
                <li><a href="eindopdracht.php?map=<?php echo ($_GET['map'])?>&sidemap=<?php echo $_GET['sidemap']; ?>"><?php echo $menuitem; ?></a></li>
                <?php
            }
            foreach ($sidefile as $menuitem) { ?>
                <li><a href="eindopdracht.php?map=<?php echo ($_GET['map'])?>&file=<?php echo $menuitem; ?>"><?php echo $menuitem; ?></a></li>
                <?php
            }
        }
        elseif(1 ==2){

        }
        else{
            foreach ($map as $menuitem) { ?>
                <li><a href="eindopdracht.php?map=<?php echo $menuitem; ?>"><?php echo $menuitem; ?></a></li>
                <?php
            }
            foreach($file as $menuitem){?>
                <li><a href="eindopdracht.php?file=<?php echo $menuitem; ?>"><?php echo $menuitem; ?></a></li>
                <?php
            }
        }
        ?>
    </ul>
</nav>
<p1>

</p1>
</body>

