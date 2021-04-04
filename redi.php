<?php

require "connec.php";
$pdo= new PDO(DSN, USER,PASS);

//REQUETE PREPARER POUR SOUMETTRE FORMULAIRE ET INSERER LE NOUVEAU PERSONNAGE A L'INTERIEUR
    if (isset($_POST['firstname']) && $_POST['firstname'] != " " && isset($_POST['lastname']) && $_POST['lastname'] != " ")
    {
        $lastname = trim($_POST['lastname']);
        $firstname = trim($_POST['firstname']);

        $query="INSERT INTO friend (firstname , lastname) VALUES (:firstname, :lastname)";
        $statement = $pdo->prepare($query);
        $statement->bindValue(':firstname', $firstname, PDO::PARAM_STR);
        $statement->bindValue(':lastname', $lastname, PDO::PARAM_STR);
        $statement->execute();

        if ($statement){
            echo "<h2>Envoi ok</h2>";
            echo '<meta http-equiv="refresh" content="2;URL= index.php"">';
        } else {
            echo "<h2>Not ok</h2>";
        }
}

//header('Location : index.php'); REMPLACE PAR LE META HTTP.