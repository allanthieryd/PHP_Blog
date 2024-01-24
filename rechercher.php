<?php include_once('header.php');
?>
<style>


</style>
<!DOCTYPE html>
<html lang="fr">
    <head>
    <link rel="icon" type="image/x-icon" href="images/DiscuBlog_logo.png">
    <body style="overflow: auto;overflow-x:hidden">
    <meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1.0" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <div class = "container_textes">
    <link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@700&family=Montserrat:wght@800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Comic+Neue:wght@700&family=Manrope:wght@200;300;400;500;600;700;800&family=Roboto:wght@100&display=swap" rel="stylesheet">
    <title>Recherchez un contenu</title>
</head>
<body style="overflow: auto;overflow-x:hidden">
<style>
    body::-webkit-scrollbar{
        display:none
    }
</style>

<!---->

<?php

$articles_dir = 'articles/';

// Ouvrir le dossier et récupérer la liste des fichiers
$articles_file = scandir($articles_dir, SCANDIR_SORT_DESCENDING);
$articles = array();
foreach ($articles_file as $article) {
    if ($article != '.' && $article != '..') {
        $article_info = explode(" | ", file_get_contents($articles_dir . $article));
        $titre = $article_info[0];
                $categorie = $article_info[1];
                $file_id = basename($article, ".txt");
                $articles[] = array(
                    'titre' => $article_info[0],
                    'categorie' => $categorie,
                    'contenu' => $article_info[2],
                    'id' => $file_id
                );
    }
}
// Récupérer la recherche de l'utilisateur
if (isset($_POST['recherche'])) {
    $recherche = $_POST['recherche'];?>
    <h1 id = "article_search">Ces articles contiennent votre recherche</h1><?php
} else {
    $recherche = '...';
    ?><h1 id = "article_search">Actualisation des données... (Veuillez spécifier une nouvelle recherche)</h1><?php
}?>
<?php foreach ($articles as $article):
// Ouvrir le dossier contenant les fichiers .txt
$dossier = 'articles/';
if ($handle = opendir($dossier)) {
    // Parcourir tous les fichiers du dossier
    while (false !== ($fichier = readdir($handle))) {
        // Ignorer les fichiers . et ..
        if ($fichier != "." && $fichier != "..") {

            // Vérifier si le fichier contient la recherche
            $contenu = file_get_contents($dossier . $fichier);
            $article_id = basename($fichier, ".txt");
            if (strpos(strtolower($contenu), strtolower($recherche)) !== false) {
                // Afficher le nom du fichier en tant que lien
                if($article_id == $article['id']){
                ?><a id ="article_filter" href="lecture_article.php?id=<?= $article_id ?>" style = "color:#363f93;text-decoration:none;"><?=$article['titre']?></a><?php 
                }
            }
        }
    }
    // Fermer le dossier
    closedir($handle);
}?><?php endforeach; ?><div id = "NO_result"><a href ="header.php" style = "text-decoration:none;color:white;">Pas de résultat pour "<?php echo $recherche ?>" ? Faites une nouvelle recherche</a></div><?php
?></div>

<?php include_once('footer.php');?>

<style>

    body{
        background-color:#9ca2d0;
    }

    .container_textes{
        height:max-content;
        background-color:#363f93;
        padding:20px;
        padding-bottom:120px;
        margin-top:50px;
        margin-left:auto;
        margin-right:auto;
        margin-bottom:90px;
        text-align:center;
        width:95%;
        border-radius:20px;
    }

    #article_search{
        margin-left:10px;
        background-color:white;
        width:100%;
        height:min-content;
        padding:10px;
        font-size:20px;
        margin-left:-20px;
        padding-left:20px;
        padding-right:20px;
        margin-top:-20px;
        font-family:"Montserrat";
        border-top-left-radius:20px;
        border-top-right-radius:20px;
    }

    #article_filter{
        margin-left:auto;
        margin-right:auto;
        margin-bottom:15px;
        background-color:white;
        width:max-content;
        height:min-content;
        padding:10px;
        border-radius:15px;
        font-size:20px;
        line-height:50px;
        font-family:"Montserrat";
        display:inline-flex;
        flex-direction:column;
        flex: 0 0 33%;
        flex-wrap:wrap;
        margin-left:25px;
        margin-right:25px;
        margin-top:50px;
        margin-bottom:50px;
        text-transform: uppercase;
        transition: opacity 1s;
        opacity:80%;
    }

    #article_filter:hover{
        opacity:100%;
    }

    #NO_result{
        background-color:red;
        width:max-content;
        margin-top:50px;
        margin-left:auto;
        margin-right:auto;
        margin-bottom:10px;
        padding:10px;
        border-radius:15px;
        font-size:20px;
        font-family:"Montserrat";
        transition: opacity 1s;
        opacity:40%;
    }
    
    #NO_result:hover{
        transition: opacity 1s;
        opacity:100%;
    }

    @media (min-width: 1920px){
      .container_textes{
            margin-top:100px;
        }
    }

    @media (max-width: 1000px){
      .container_textes{
            width:90%;
        }
    }

    @media (max-width: 450px){
      .container_textes{
            margin-left:6px;
            width:85%;
        }
    }

    @media (max-width: 1000px){
      #article_filter{
            margin-left:10px;
            margin-right:10px;
        }
    }

    @media (max-width: 800px){
      #article_filter{
            font-size:10px;
        }
    }

    @media (max-width: 450px){
      #article_filter{
            font-size:45%;
            word-break:break-all;
        }
    }

    @media (max-width: 800px){
        #NO_result{
            font-size:75%;
        }
    }

    @media (max-width: 450px){
        #NO_result{
            font-size:50%;
        }
    }
</style>