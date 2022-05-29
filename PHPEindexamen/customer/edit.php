<?php
    include_once '../inc.db.php';
    include_once 'functions.php';


//Aanpassen
if($_SERVER['REQUEST_METHOD'] === "POST"){
    //gepost!
    //check voor invoer op alle velden
    if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['phone'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $id = $_GET['id'];

        //check of er wel een waarde is:
        if(empty($name) OR empty($email) OR empty($phone)){
            echo "Alle velden zijn verplicht!<br>";
        }else{
            $update = updateCustomer($pdo, $id, $name, $email, $phone);
            //echo $id;
            if(is_numeric($update)){
                echo "Klant gewijzigd!<br>";
            }else{
                echo "Daar ging iets fout: ". $update . "<br>";
            }
        }
    }
}

    //Ophalen
    if(isset($_GET['id'])){
    $id = $_GET['id'];

    $c = readCustomer($pdo, $id);
    //var_dump($c);
}
?>

<form method="post" action="edit.php?id=<?= $id ?>">
    Name: <input type="text" name="name" value ="<?= $c['name'] ?>"><br>
    Email: <input type="text" name="email" value ="<?= $c['email'] ?>"><br>
    Phone:<input type="text" name="phone" value ="<?= $c['phone'] ?>"><br>
    <input type="submit" value="Save">
</form>
