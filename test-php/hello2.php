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
    $meme = '';
    $type = 0;




?>
