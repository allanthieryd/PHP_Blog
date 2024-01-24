<!-- index.php -->

<?php include_once('header.php');?>

<br><br>
<h1 id = "articles_une">Articles à la Une</h1>
<a href = "creation.php">
  <button id = "ajout_article_button">+ Ajouter un article</button>
</a>
<?php
// Définir le chemin du dossier contenant les articles
$articles_dir = 'articles/';

// Ouvrir le dossier et récupérer la liste des fichiers
$articles_file = scandir($articles_dir, SCANDIR_SORT_DESCENDING);
$article_number=0;
?><?php
    // Vérifier si une catégorie a été sélectionnée
    if (isset($_GET['categorie']) && $_GET['categorie'] != '') {
        $selected_categorie = $_GET['categorie'];
        $articles = array();
        // Récupérer tous les articles de la catégorie sélectionnée
        foreach ($articles_file as $article) {
            if ($article != '.' && $article != '..') {
                $article_info = explode(" | ", file_get_contents($articles_dir . $article));
                $titre = $article_info[0];
                $categorie = $article_info[1];
                $contenu = $article_info[2];
                $article_number+=1;
                if ($categorie == $selected_categorie) {
                    $file_id = basename($article, ".txt");
                    $articles[] = array(
                        'titre' => $article_info[0],
                        'categorie' => $categorie,
                        'contenu' => $article_info[2],
                        'id' => $file_id,
                        'article_number' => $article_number
                    );
                }
            }
        }
    } else {
        // Si aucune catégorie n'est sélectionnée, récupérer tous les articles
        $articles = array();
        foreach ($articles_file as $article) {
            if ($article != '.' && $article != '..') {
                $article_info = explode(" | ", file_get_contents($articles_dir . $article));
                $titre = $article_info[0];
                $categorie = $article_info[1];
                $contenu = $article_info[2];
                $file_id = basename($article, ".txt");
                $article_number+=1;
                $articles[] = array(
                    'titre' => $article_info[0],
                    'categorie' => $categorie,
                    'contenu' => $article_info[2],
                    'id' => $file_id,
                    'article_number' => $article_number
                );
            }
        }
    }

?>

<?php foreach ($articles as $article): ?>
<div class = "container_articles">
    <ul>
    <div class = "article">
    <a style='text-decoration:none;' href="lecture_article.php?id=<?= $article['id'] ?>"><br>
        <div id = "article_categorie"><h1><?= $article['categorie'] ?></h1></div>
        <div id = "article_titre"><h2><?= $article['titre'] ?><h2></div>
        <div id = "article_contenu"><?= substr($article['contenu'],0,650)?>... (Lire la suite)</div>
        <?php

$articles_path = "articles/"; // chemin vers le dossier des articles
$comments_path = "comments_numbers/"; // chemin vers le dossier des nombres de commentaires

// Récupérer la liste des fichiers d'articles
$article_files = scandir($articles_path, SCANDIR_SORT_DESCENDING);
// Parcourir chaque fichier d'article
// Ouvrir le dossier et récupérer la liste des fichiers
        foreach ($article_files as $article_file) {
            $article_id = basename($article_file, ".txt");

            // Récupérer le nombre de commentaires pour cet article
            $comment_file = $comments_path . $article_id . ".txt";
            if (file_exists($comment_file)) {
                $comment_number = file_get_contents($comment_file);
                if($article_id == $article['id']){
                    // Afficher le nombre de commentaires pour cet article
                    ?><div id = "nombre_commentaires"><?php echo $comment_number;?><br></div><?php
                }else{
                    $comment_number = "";
                }
            } else {
            $comment_number = "...";
            }
    }
?>
        <a style="text-decoration:none;" href="lecture_article.php?id=<?= $article['id'] ?>"  id ="read_more">Lire la suite...</a></div></a>
    </ul>
<?php endforeach; ?>
<?php



?></div>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1.0" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <title>Discublog | Partagez vos idées !</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="icon" type="image/x-icon" href="images/DiscuBlog_logo.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@700&family=Montserrat:wght@800&display=swap" rel="stylesheet">
</head>
<body style="overflow: auto;overflow-x:hidden">
<style>
    body::-webkit-scrollbar{
        display:none
    }
</style>

</body>
</html>
<style>

    #articles_une{
        width:100%;
        text-decoration:underline;
    }

    #ajout_article_button{
        background-color:#363f93;
        color:white;
        padding:20px;
        margin-bottom:30px;
        margin-left:82%;
        border-radius:20px;
        cursor:pointer;
        font-size:20px;
        transition: opacity 1s;
        opacity:80%;
    }

    #ajout_article_button:hover{
        opacity:100%;
    }

    .container_articles{
        width:100%;
        height:min-content;
        background-color:#9ca2d0;
        padding:20px;
        padding-top:0.2px;
        padding-bottom:60px;
        margin-left:-20px;
        margin-top:20px;
    }

    .article{
        color:black;
        width:97%;
        margin-left:1,5%;
        height:min-content;
        background-color: white;
        border-radius:15px;
        font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        transition: opacity 1s;
        opacity:60%;
        padding-bottom:25px;
    }
    
    .article:hover{
        transition: opacity 1s;
        opacity:100%;
    }

    #article_categorie{
        text-align:center;
        text-decoration: none;
        font-size: 25px;
        font-family: "Montserrat";
        background-color: #363f93;
        text-transform: uppercase;
        color:black;
        margin-top:-70px;
        border-top-right-radius:15px;
        border-top-left-radius:15px;
        word-break: normal;
    }


    #article_titre{
        text-align:center;
        text-decoration: none;
        font-size: 25px;
        font-family: "Montserrat";
        color:black;
        text-transform: uppercase;
        background-color:#c9c9c9;
        height:min-content;
        padding-bottom:0px;
        padding-top:20px;
        font-size:28px;
    }


    #article_contenu{
        line-height: 200%;
        width:100%;
        color:black;
        text-decoration:overline #3c4bcf2e;
        font-size:26px;
        margin-bottom:20px;
    }

    #read_more{
        margin-left:39.37%;
        text-align: center;
        width:160px;
        background-color:#363f93;
        color:white;
        padding:15px;
        padding-right:105px;
        padding-left:105px;
        border-radius:20px;
        font-family:Georgia, 'Times New Roman', Times, serif;
        opacity:80%;
        margin-top:20px;
    }

    #message_0_result{
        margin-left: auto;
        margin-right:auto;
        width:260px;
        padding:15px;
        border-radius:30px;
        background-color:red;
        text-align: center;
        color:white;
        font-family:Georgia, 'Times New Roman', Times, serif;
    }

    #nombre_commentaires{
        background-color:white;
        line-height: 200%;
        width:100%;
        color:black;
        text-decoration:overline #3c4bcf2e;
        font-size:26px;
        margin-bottom:20px;
    }

    @media (max-width:1024px) {
        #articles_une{
            font-size:32px;
        }
    }

    @media (max-width: 1224px){
        #ajout_article_button{
            margin-left:70%;
            width:25%;
            font-size:15px;
            margin-bottom:5px;
        }
    }


    @media (max-width: 900px){
        #read_more{
            margin-left:36%;
            width:min-content;
            padding:10px;
        }
    }

    @media (max-width: 450px){
        #read_more{
            margin-left:32%;
            width:min-content;
            padding:10px;
        }
    }

    @media (max-width:601px) {
        .container_articles{
            padding-right:40px;
        }
    }

    @media (max-width: 1024px){
        .article{
            margin-top:30px;
        }
    }
    
    @media (max-width: 900px){
        .article{
            margin-left:-1%;
            margin-top:50px;
        }
    }

    @media (max-width: 600px){
        .article{
            margin-left:-3%;
            margin-top:50px;
        }
    }

    @media (max-width: 400px){
        .article{
            margin-left:-5%;
            margin-top:50px;
        }
    }


    @media (max-width:1024px) {
        #article_categorie{
        font-size: 19px;
        }
    }

    @media (max-width:850px) {
        #article_categorie{
        font-size: 80%;
        }
    }

    @media (max-width:1024px) {
        #article_titre{
        font-size: 16px;
        }
    }

    @media (max-width:850px) {
        #article_titre{
        font-size: 80%;
        }
    }

    @media (min-width: 1700px){
      #articles_une{
        margin-top:100px;
        }
    }

    @media (min-width: 1700px){
        #ajout_article_button{
            margin-left:78.5%;
            width:18%;
            font-size:180%;
            margin-bottom:5px;
        }
    }

    @media (max-width:400px) {
        #article_categorie{
        word-break:break-all;
        font-size:10.5px;
        }
    }

    @media (min-width: 2200px){
        .article{
        margin-left:0.7em;
        }
    }

    @media (min-width: 2800px){
        .article{
        margin-left:1.5em;
        }
    }

    @media (min-width: 2500px){
        #read_more{
            margin-left:44.80%;
        }
    }

</style>

<?php include_once('footer.php');?>