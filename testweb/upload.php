<html lang="fr">
    <head>
        <title>uploaad</title>
        <link rel="stylesheet" href="css/style.css" />
    </head>
    <body>
   
   <form method="POST" action="upload.php" enctype="multipart/form-data">	
                    
               <label for="icone" >Image de présentation (JPG, PNG ou GIF | max. 15 Ko) :</label><br />
     <input type="file" name="icone" id="icone" /><br />
     <label for="mon_fichier"  >Fichier (tous formats | max. 1 Mo) :</label><br />
     <input type="hidden" name="MAX_FILE_SIZE" value="1048576" />
     <input type="file" name="mon_fichier" id="mon_fichier" /><br />
     <label for="titre"><!--Titre de la recherche/projet (max. 50 caractères) : --></label><br />
     <input type="text" name="titre" value="Titre de la recherche/projet" id="titre" /><br />
    <label for="titre"><!--Nom(max. 50 caractères) :--></label><br />
     <input type="text" name="nom" value="Nom" id="nom" /><br />
        <label for="titre"><!--Prénom(max. 50 caractères) : --></label><br />
     <input type="text" name="prenom" value="Prénom" id="prenom" /><br /><br />
       <input type="email" name="email" value="E-mail" id="email" /><br /><br />
       
     <!--    <label for="titre">Bac/Master(max. 50 caractères) : </label><br />
     <input type="text" name="bacmaster" value="Bac/Master" id="bacmaster" /><br /> -->
        
     <!--    <label for="titre">Option(max. 50 caractères) : </label><br />
     <input type="text" name="option" value="Option" id="option" />--><br />
     <label for="description"><!--Description(max. 255 caractères) : --></label><br />
     <textarea name="description">Description des recherches</textarea><br/><br/>
     <input type="submit" name="submit" value="Envoyer" />
        
    </form> 
    
        <?php
        
        if (isset($_POST['description']))
echo $_POST['description'];
        
$dossier = 'upload/';
$fichier = basename($_FILES['doc']['name']);
$taille_maxi = 100000;
$taille = filesize($_FILES['doc']['tmp_name']);
$extensions = array('.png', '.gif', '.jpg', '.jpeg');
$extension = strrchr($_FILES['doc']['name'], '.'); 
//Début des vérifications de sécurité...
if(!in_array($extension, $extensions)) //Si l'extension n'est pas dans le tableau
{
   //  $erreur = 'Erreur : Vous devez uploader un fichier de type png, gif, jpg, jpeg, txt ou doc...';
}
if($taille>$taille_maxi)
{
     $erreur = 'Le fichier est trop gros...';
}
if(!isset($erreur)) //S'il n'y a pas d'erreur, on upload
{
     //On formate le nom du fichier ici...
     $fichier = strtr($fichier, 
          'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ', 
          'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
     $fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);
     if(move_uploaded_file($_FILES['doc']['tmp_name'], $dossier . $fichier)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
     {
          echo 'Upload effectué avec succès !';
     }
     else //Sinon (la fonction renvoie FALSE).
     {
         // echo 'Echec de l\'upload !';
     }
}
else
{
     echo $erreur;
}
       
?>
        
    </body>
</html>
