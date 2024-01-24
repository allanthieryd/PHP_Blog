<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@700&family=Montserrat:wght@800&display=swap" rel="stylesheet">
<link rel="icon" type="image/x-icon" href="images/DiscuBlog_logo.png">
<meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1.0" />
<meta name="apple-mobile-web-app-capable" content="yes" />

<?php include_once('header.php');
?>
<style>


</style>
<?php
// Vérifier si l'id de l'article a été fourni dans la requête HTTP
if (!isset($_GET['id'])) {
   ?><a href = "index.php" style = "text-decoration:none;"><div style = "font-size:25px;margin-left:33%;margin-top:20px;width:max-content;background-color:red;color:white;padding:15px;border-radius:30px;font-family:Georgia, 'Times New Roman', Times, serif">Tu n'as pas fourni l'identifiant de l'article...</div></a><?php
  exit();
}

// Récupérer l'id de l'article depuis la requête HTTP
$id = $_GET['id'];

// Vérifier si le fichier de l'article existe
$file = "articles/$id.txt";
if (!file_exists($file)) {
  ?><a href = "index.php" style = "text-decoration:none;"><div style = "font-size:25px;margin-left:33%;margin-top:20px;width:max-content;background-color:red;color:white;padding:15px;border-radius:30px;font-family:Georgia, 'Times New Roman', Times, serif">Heuu, désolé mais cet article n'existe pas.</div></a><?php
  exit();
}

// Lire le contenu du fichier de l'article
$content = file_get_contents($file);

// Extraire les informations de l'article
list($title, $category, $body) = explode("|", $content, 3);
?><div class = "article_container"><?php
// Afficher le titre, la catégorie et le contenu de l'article
?><div id ="titre_article"><?php echo "<h1>$title</h1>";?></div><?php
?><div id ="categorie"><?php echo "<h1>$category</h1>";?></div><?php
?><div id ="contenu_article"><?php echo "<p>$body</p>";?></div></div><?php


// Afficher l'espace commentaire avec un formulaire pour poster de nouveaux commentaires
?><div class = "espace_commentaires_container"><?php
?><div id = "titre_espace_commentaires"><?php echo "<h3>Espace commentaires</h3>";?></div><?php
if (isset($_POST['comment'])) {
  // Récupérer le commentaire posté par l'utilisateur
  $comment = $_POST['comment'];

  // Écrire le commentaire dans le fichier de commentaires pour cet article
  $comment_file = "comments/$id.txt";
  file_put_contents($comment_file, "$comment\n", FILE_APPEND);
}

// Lire les commentaires existants pour cet article
$comments = [];
if (file_exists("comments/$id.txt")) {
  $comments = file("comments/$id.txt", FILE_IGNORE_NEW_LINES);
}


// Afficher le formulaire pour poster un nouveau commentaire

?><div class ="form_container"><?php echo "<form method='POST'>";
echo "<br>";
echo "<textarea id='commentaire_zone' name='comment' placeholder = 'Ecrivez ici votre joli commentaire'></textarea>";
echo "<br>";?>
<input id="post_zone" type='submit' value='Je poste mon commentaire'><?php
echo "</form>";
?></div><?php

echo "<ul>";
$number_comment = 0;
$comment_number_file = "comments_numbers/$id.txt";
foreach ($comments as $comment) {
   if(strlen($comment) < 500) {
      if(strlen($comment) > 0) {
         $number_comment +=1;
         echo "<span><u>Un utilisateur a écrit:</u> $comment</span>";?><br><br><br><?php
      }else{
         ?><p id = "error_comment" style = "width:max-content;background-color:red;color:white;padding:30px;border-radius:15px;font-family:Montserrat;margin-left:1<0px;">(> 0 et < de 500 caractères pls)</p><?php
      }
   }else{
      ?><p id = "error_comment" style = "width:max-content;background-color:red;color:white;padding:30px;border-radius:15px;font-family:Montserrat;margin-left:1<0px;">(> 0 et < de 500 caractères pls)</p><?php
   }
}
if(file_exists($comment_number_file)){
   unlink($comment_number_file);
}
file_put_contents($comment_number_file, "$number_comment commentaire(s) sur\n '$title'", FILE_APPEND);
?><div id = "number_zone" style = "border-radius:8px;"><a href ="#titre_espace_commentaires" style = "text-decoration:none;"><?php
echo "<number>Il y a ",$number_comment," commentaire(s)</number>";
?></a></div><?php
?> <br><br> <?php echo "</ul><br>";
?></div>
<style>
    
   body{
      background-color: #afb5e9;
      overflow: auto;
      overflow-x: hidden;
   }

   body::-webkit-scrollbar{
        display:none
   }
   
   #error_comment{
      transition: opacity 1s;
      opacity:60%;
   }

   #error_comment:hover{
      opacity:100%;
      transition: opacity 1s;
   }

   #titre_article{
      margin-top:50px;
      text-align: center;
      text-decoration: none;
      font-size: 50px;
      color:#323232;
      font-family: "Montserrat";
      text-transform: uppercase;
      word-break: normal;
   }

   #contenu_article{
      font-family: "Montserrat";
      font-weight: bold;
      text-align: left;
      width: 95%;
      margin-left:2.5%;
      font-size:20px;
      color:#323232;
      line-height: 200%;
   }

   .article_container{
      width:97%;
      margin-left:1.5%;
      height:min-content;
      background-color: white;
      border-radius:15px;
      font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
      padding-bottom:3%;
      margin-top:30px;
   }

   #categorie{
      width:100%;
      opacity:80%;
      font-family: "Montserrat";
      background-color: #363f93;
      color:white;
      text-transform: uppercase;
      padding-top:0.1px;
      padding-bottom:0.1px;
      text-align:center;
   }


   #titre_espace_commentaires{
      color:white;
      background-color:#5e65a8;
      margin-top:-30px;
      border-top-left-radius: 15px;
      border-top-right-radius: 15px;
      text-transform: uppercase;
      font-family: "Montserrat";
      padding-top:5px;
      padding-bottom:5px;
      text-align:center;
      font-size:25px;
   }

   .espace_commentaires_container{
      padding-top:10px;
      width:97%;
      background-color:white;
      margin-left:auto;
      margin-right:auto;
      border-radius: 15px;
      height:max-content;
      padding-bottom:62px;
      margin-top:60px;
      margin-bottom:80px;
   }

   .form_container{
      margin-left: 20px;
      margin-top:30px;
   }

   #commentaire_zone{
      opacity:80%;
      width:100%;
      padding:20px;
      padding-bottom:100%;
      background-color:black;
      color:white;
      padding:10px;
      border-radius: 5px;
      min-width:190px;
      min-height:90px;
      width:250px;
      height:120px;
      max-width: 70%;
      max-height: 280px;
      font-size:18px;
   }

   span{
      padding:10px;
      border-radius: 5px;
      -webkit-box-decoration-break: clone;
      box-decoration-break: clone;
      background-color:#363f93;
      opacity:80%;
      color:white;
      margin-left:20px;
      text-decoration:none;
      line-height:50px;
      font-size:18px;
      width:min-content;
      font-family: "Montserrat";
      word-break: normal;
      box-decoration-break: clone;
      padding-right:0px;
   }

   span:link{
      color:white;
      text-decoration:none;
   }

   u{
      background-color:#5e65a9;
      padding:10px;
      color:white;
      border-top-right-radius:8px;
      border-top-left-radius:8px;
      text-decoration:none;
      margin-left:-15px;
      margin-right:10px;
      font-family: "Montserrat";
      box-decoration-break: clone;
   }

   #number_zone{
      margin-top:10px;
      padding:30px;
      border-radius:15px;
      background-color:#363f93;
      color:white;
      cursor:pointer;
      opacity: 80%;
      margin-bottom:2%;
      font-family:'Montserrat';
      width:240px;
   }

   number{
      padding:10px;
      color:white;
      border-radius:8px;
      text-decoration:none;
      font-family: "Montserrat";
      box-decoration-break: clone;
   }

   #post_zone{
      margin-top:10px;
      padding:30px;
      border-radius:15px;
      background-color:#363f93;
      color:white;
      cursor:pointer;
      opacity: 80%;
      margin-bottom:2%;
      font-family:'Montserrat';
      width:max-content;
   }

   .commentaires_container{
      margin-top:30px;
      margin-left:20px;
      background-color:#a1a1a1;
      line-height: 300%;
      width:95%;
      border-radius:20px;
   }

   @media (max-width: 1000px){
      #titre_article{
            font-size:20px;
        }
    }

    @media (max-width: 500px){
      #titre_article{
            word-break: normal;
            font-size:13px;
        }
    }

    @media (max-width: 500px){
      #categorie{
            word-break: normal;
            font-size:11px;
        }
    }

    @media (max-width: 500px){
      #titre_espace_commentaires{
            word-break: normal;
            font-size:18px;
        }
    }

    @media (max-width: 500px){
      #number_zone{
            margin-left:-15px;
            margin-right:15px;
        }
    }
    @media (max-width: 800px){
      u{
            margin-left: -15px;
        }
    }

    @media (max-width: 800px){
      span{
            font-size: 12px;
            width:max-content;
            word-break:break-all;
            box-decoration-break: clone;
            line-height:40px;
            margin-left: -15px;
            margin-right: 15px;
            padding-right:0px;
        }
    }

    @media (max-width: 440px){
      span{
            font-size: 12px;
            width:max-content;
            word-break:break-all;
            box-decoration-break: clone;
            line-height:40px;
            margin-left: -15px;
            margin-right: 15px;
            padding:10px;
            padding-right:0px;
        }
    }


    @media (max-width: 440px){
      #error_comment{
            font-size: 14px;
            word-break:all;
            margin-left:-18px;
        }
    }
</style>
<title><?php echo mb_strtoupper($category)?>- <?php echo $title ?></title>
<?php include_once('footer.php');