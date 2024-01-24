<!-- creation.php -->
<link rel="icon" type="image/x-icon" href="images/DiscuBlog_logo.png">
<meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1.0" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<title>Créez votre article</title>
<body style="overflow: auto;overflow-x:hidden">
<?php include_once('header.php');
?>
<style>


</style>

<?php
$titre = $_POST['titre'] ?? '';
$contenu = $_POST['contenu'] ?? '';
$categorie = $_POST['categorie'] ?? '';

// Définir le nom du fichier TXT à utiliser (par exemple, "articles.txt")
$article_id = uniqid();
$file = "articles/$article_id.txt";

// Vérifier si le fichier existe, sinon le créer
if (!file_exists($file)) {
    $fp = fopen($file, "w");
    fclose($fp);
}


// Ouvrir le fichier en mode ajout pour ajouter le nouvel article
$fp = fopen($file, "a");

// Écrire l'article dans le fichier TXT avec le titre, le contenu et la catégorie
fwrite($fp, "" . $titre . " | " . $categorie . " | " . $contenu);

// Fermer le fichier
fclose($fp);
?>

<form method="POST" class = "container_redaction">
<div>
    <input type="text" id="titre" name="titre" placeholder="Veuillez entrer un titre" value="<?= htmlspecialchars($titre) ?>">
</div>

<div>
    <textarea id="contenu" name="contenu" placeholder="Veuillez entrer un contenu"><?=htmlspecialchars($contenu)?></textarea>
</div>

<div>
    <input type="text" id="categorie" name="categorie" placeholder="Veuillez entrer une catégorie" value="<?= htmlspecialchars($categorie) ?>">
</div>

<button type="submit" style="margin-top:10px;padding:30px; border-radius: 15px; background-color:#363f93; color:white; cursor:pointer; opacity: 80%; width:200px; margin-bottom:55px;">Publier</button>


<?php
	if(isset($_POST['titre'], $_POST['contenu'], $_POST['categorie'])) {
        if (!empty($titre) && !empty($contenu) && !empty($categorie)) {  
            if(!empty($_POST['titre']) && !empty($_POST['contenu']) && !empty($_POST['categorie'])) {
                if(strlen($titre) < 58) {
                    if(strlen($categorie) < 28) {
                        $message = "<span style='background-color:#363f93;color:white;padding:20px;border-top-right-radius:15px;border-bottom-right-radius:15px;font-family:Montserrat;margin-left:-18px;'>BRAVO, tu as réussi à poster ton article !</span>";
                        ?><div id = "message_post"><br><br><?php if(isset($message)) { echo $message; } ?></div><?php
                    }else{
                        ?><span style = "background-color:red;color:white;padding:30px;border-radius:15px;font-family:Montserrat;margin-left:50px;"><?php echo "Ta catégorie(<28) est trop longue !";
                        unlink($file);?></span><?php
                    }
                }else{
                    ?><span style = "background-color:red;color:white;padding:30px;border-radius:15px;font-family:Montserrat;margin-left:50px;"><?php echo "Ton titre(<58) est trop long !";
                    unlink($file);?></span><?php
                }
            }else{
                ?><span style = "background-color:red;color:white;padding:30px;border-radius:15px;font-family:Montserrat;margin-left:50px;"><?php echo "Il faut remplir les champs";?></div><?php
                unlink($file);
            }
        }else{
            ?><span style = "background-color:red;color:white;padding:30px;border-radius:15px;font-family:Montserrat;margin-left:50px;"><?php echo "Il faut remplir les champs";?></div><?php
            unlink($file);
        }
    }else{
        unlink($file);
    }
?>

</form>
</body>
</html>


<style>
        #titre{
            background-color:black; opacity:80%; width:100%; padding:20px; padding-bottom:100%;background-color:black;color:white;padding:10px; border-radius: 5px;width:200px;
        }

        #contenu{
            background-color:black; opacity:80%; width:100%; padding:20px; padding-bottom:100%;background-color:black;color:white;padding:10px; border-radius: 5px;min-width:120px;min-height:50px;width:200px;height:80px;max-width: 70%;max-height: 280px;
        }

        #categorie{
            background-color:black; opacity:80%; width:100%; padding:20px; padding-bottom:100%;background-color:black;color:white;padding:10px; border-radius: 5px;width:200px;
        }

        .container_redaction{
            margin-top:40px;
            margin-left:20px;
        }

</style>

<?php include_once('footer.php'); ?>