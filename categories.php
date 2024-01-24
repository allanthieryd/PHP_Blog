<?php
$articles_dir = 'articles/';
$articles_file = scandir($articles_dir, SCANDIR_SORT_DESCENDING);
$categories = array();

// Récupérer toutes les catégories uniques
foreach ($articles_file as $article) {
    if ($article != '.' && $article != '..') {
        $article_info = explode(" | ", file_get_contents($articles_dir . $article));
        $categorie = $article_info[1];
        if (!in_array($categorie, $categories)) {
            $categories[] = $categorie;
        }
    }
}

// Vérifier si une catégorie a été sélectionnée
if (isset($_GET['categorie']) && $_GET['categorie'] != '') {
    $selected_categorie = $_GET['categorie'];
    $articles = array();
    // Récupérer tous les articles de la catégorie sélectionnée
    foreach ($articles_file as $article) {
        if ($article != '.' && $article != '..') {
            $article_info = explode(" | ", file_get_contents($articles_dir . $article));
            $title = $article_info[0];
            $categorie = $article_info[1];
            if ($categorie == $selected_categorie) {
                ?> <title> Catégorie sélectionnée: <?php echo mb_strtoupper($categorie)?></title> <?php
                $articles[] = array(
                    'titre' => $article_info[0],
                    'categorie' => $categorie,
                    'contenu' => $article_info[2]
                );
            }
        }
    }
} else {
    // Si aucune catégorie n'est sélectionnée, récupérer tous les articles
    ?> <title>Discublog | Partagez vos idées !</title> <?php
    $articles = array();
    foreach ($articles_file as $article) {
        if ($article != '.' && $article != '..') {
            $article_info = explode(" | ", file_get_contents($articles_dir . $article));
            $categorie = $article_info[1];
            $articles[] = array(
                'titre' => $article_info[0],
                'categorie' => $categorie,
                'contenu' => $article_info[2]
            );
        }
    }
}
?>

<!-- Afficher la liste déroulante des catégories -->
<div class = "categories_container">
<form action="index.php" method="get">
    <label for="categorie"></label>
    <select name="categorie" id="categorie_article">
        <option value="">Toutes les catégories</option>
        <?php foreach ($categories as $categorie): ?>
            <option style="text-transform: capitalize;color:white;background-color: <?php printf( "#%01X\n", mt_rand( 2455750,  2555750  )); ?>" value="<?php echo $categorie; ?>" <?php if (isset($selected_categorie) && $selected_categorie == $categorie) echo 'selected'; ?>><?php echo mb_strtoupper($categorie); ?></div></option>
        <?php endforeach; ?>
    </select>
    <button type="submit" id = "valider_categorie_button">Filtrer</button>
</form>
</div>
<!--initial -scale=l,-->
<style>

.categories_container{
        margin-left: 15%;
        margin-top:-6%;
        height:max-content;
    }

    #categorie_article{
      width:max-content;
      height:40px;
      border-radius:15px;
      padding-right:15px;
      font-size: 20px;
    }

    #valider_categorie_button{
        padding-left:20px;
        padding-right:20px;
        padding-top:15px;
        padding-bottom:15px;
        color:white;
        background-color:#363f93;
        width:180px;
        cursor: pointer;
        border-radius:20px;
        margin-left:1.3%;
        margin-top:-4%;
    }

    @media (max-width: 1200px){
        .categories_container{
            width:30%;
            margin-top:-120px;
            margin-left:180px;

        }
    }

    @media (max-width: 601px){
        .categories_container{
            width:30%;
            margin-top:-120px;
            margin-left:130px;

        }
    }

    @media (max-width: 1200px){
      #categorie_article{
            width:100%;

        }
    }

    @media (max-width: 1200px){
        #valider_categorie_button{
            width:50%;
            margin-left:-1%;
            margin-top:2%;

        }
    }

    @media (min-width: 1700px){
        .categories_container{
            margin-left: 15%;
            height:max-content;
            margin-top:-8%;

        }
    }

    @media (min-width: 2100px){
        .categories_container{
            margin-left: 15%;
            margin-top:-6%;
            height:max-content;

        }
    }

    @media (min-width: 2500px){
        #categorie_article{
            width:18%;
            font-size:x-large;
        }
    }
    
    @media (min-width: 2500px){
      #valider_categorie_button{
        width:250px;
        font-size:large;
        }
    }

    @media (min-width: 1700px){
      #valider_categorie_button{
        margin-top:30px;
        padding:25 25px;
        }
    }

    @media (min-width:1700px) {
        #categorie_article{
            height:60px;
        }
    }

    @media (max-width: 601px){
        #valider_categorie_button{
            width:max-content;
            margin-left:-1%;
            margin-top:2%;
        }
    }

    @media (max-width:750px) {
        #categorie_article{
        font-size: 50%;
        }
    }

</style>