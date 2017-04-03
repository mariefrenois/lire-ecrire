<?php
    
//pour page d'acceuil
    $db = new PDO('mysql:host=localhost;dbname=lireecrire', 'root', 'root');
    
    //faire une requête pour récupérer des éléments de la db
    foreach($db->query('SELECT titre, cover FROM article') as $result){
        echo '<h1>'.$result['titre'].'</h1>';
        echo $result['cover'];
        
    }
    
    $titre = $_POST['titre'];
    $date = date('Y-m-d');
    $description =$_POST['description'];
    $meme = ''; //=$_POST['']; ?
    $type = 0;
    
    
//pour envoie du formulaire
    //faire une requête pour insérer un élément dans la db
    $requete = $db->prepare('INSERT INTO article (titre, date, description, cover, auteur, mail, liens, ref, type) VALUES (:titre, :date, :description, :cover, :auteur, :auteurlire, :mail, :liens, :ref, :type, :tags)');
    
    $requete->bindParam(':titre', $titre);

    $requete->bindParam(':date', $date );
    $requete->bindParam(':description',  $description);

    $requete->bindParam(':cover',  $meme);
    $requete->bindParam(':auteur', $meme);
    $requete->bindParam(':auteurlire', $meme);
    $requete->bindParam(':mail',  $meme);
    $requete->bindParam(':liens',  $meme);
    $requete->bindParam(':ref',  $meme);
    $requete->bindParam(':type', $type);
    $requete->bindParam(':tags', $type);
    
    try{
        $requete->execute();
    }catch(PDOException $e){
        echo $e;
    }
        echo 'hello';




?>
<html>
    <head>
        <title>FLUX</title>
    </head>
    <body>
        <p>
            <?php echo 'FLUX!'; 
            
            
            ?>
            
            
        </p>
    </body>
</html>
