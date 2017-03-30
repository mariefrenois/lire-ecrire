<?php
    
//pour page d'acceuil
    $db = new PDO('mysql:host=localhost;dbname=lireecrire', 'root', 'root');
    
    
//pour envoie du formulaire
    //faire une requête pour insérer un élément dans la db
    $requete = $db->prepare('INSERT INTO article (titre, date, description, cover, auteur, mail, liens, ref, type) VALUES (:titre, :date, :description, :cover, :auteur, :mail, :liens, :ref, :type)');
    
    $requete->bindParam(':titre', $titre);

    $requete->bindParam(':date', $date );
    $requete->bindParam(':description',  $description);

    $requete->bindParam(':cover',  $meme);
    $requete->bindParam(':auteur', $meme);
    $requete->bindParam(':mail',  $meme);
    $requete->bindParam(':liens',  $meme);
    $requete->bindParam(':ref',  $meme);
    $requete->bindParam(':type', $type);
    
    try{
        $requete->execute();
    }catch(PDOException $e){
        echo $e;
    }
        echo 'coucou';



?>
<html>
    <head>
        <title>Hello World en PHP</title>
    </head>
    <body>
        <p>
            <?php echo 'Hello World !'; ?>
        </p>
    </body>
</html>