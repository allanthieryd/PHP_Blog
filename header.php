<!-- header.php -->

<meta charset="UTF-8">
<meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1.0" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<div class = "bandeau">
<style>
  .bandeau{ 
  background-color:#363f93;
  margin: -10px;
  padding:10px;
  padding-right:400px;
  margin-top:-5px;
}

.bandeau img{
  margin-left:20px;
  width:150px;
  margin-top:25px;
}
</style>
<a href="index.php">
    <img id = "logo" src="images/DiscuBlog_logo.png" alt ="Logo de DiscuBlog" />
    <link rel="stylesheet" type="text/css" href="style.css">
</a>
</div>
<?php include_once('categories.php'); ?>


<form action="rechercher.php" method="post" class = "search_bar_container">
    <div id = "search_bar"><input type="search" name="recherche" placeholder="Rechercher..." style="font-size:90%;padding:12px;border-radius:10px;background-color:whitesmoke;width:100%;text-align:center;margin-left:1%;color:#363f93;height:35%;"></div>
    <div class = "valider_recherche_container"><input id = "valider_recherche" type="submit" value="Rechercher"></div>
</form>

<style>
  .search_bar_container{
      margin-left: 60%;
      width:400px;
      margin-top:-10%;
      padding:20px;
      position:absolute;
  }

  #search_bar{
      margin-left:-5%;
      padding:20px;
      padding-right:30px;
      padding-bottom:52px;
      background-color: #7e83b9;
      border-radius:20px;
  }

  #valider_recherche{
    padding-left:15px;
    padding-right:15px;
    padding-top:10px;
    padding-bottom:10px;
    color:white;
    background-color:#363f93;
    width:380px;
    cursor: pointer;
    border-radius:20px;

  }

  .valider_recherche_container{
    margin-top: -11%;
    margin-left:2px;
  }

  #logo{
    width: 150px;
    }



  @media (max-width: 1350px){
        .search_bar_container{
            width:23%;
            margin-top:-145px;
            margin-left:68%;
            height:110px;
            padding-top:0px;

        }
    }

    @media (max-width: 601px){
        .search_bar_container{
            width:28%;
            margin-top:-125px;
            margin-left:68%;
            height:60px;
            padding-top:0px;

        }
    }

    @media (max-width: 400px){
        .search_bar_container{
            width:25%;
            margin-top:-135px;
            margin-left:68%;
            height:60px;
            padding-top:0px;

        }
    }

    @media (max-width: 1350px){
      #search_bar{
            width:80%;
            padding-bottom:70px;
            font-size:70%;
        }
    }

    @media (max-width: 601px){
      #search_bar{
            padding-left:5px;
            padding-right:10px;
            padding-top:15px;
            padding-bottom:70px;
        }
    }

    @media (max-width: 1350px){
        #valider_recherche{
            width:80%;
            margin-top:-35px;
            margin-left:6px;

        }
    }

    @media (max-width: 900px){
        #valider_recherche{
            width:82%;
            margin-top:-35px;
            margin-left:8px;

        }
    }

    @media (max-width: 601px){
        #valider_recherche{
            height:40px;
            width:100px;
            margin-top:-45px;
            margin-left:auto;
            margin-right:auto;
            padding:5px;
            padding-bottom:10px;
            padding-top:10px;
            font-size:9px;

        }
    }

    @media (max-width: 400px){
        #valider_recherche{
            margin-left:-1px;
            width:70px;

        }
    }

    @media (max-width: 330px){
        #valider_recherche{
            margin-left:-5px;
            margin-top:-55px;
        }
    }

    @media (max-width: 400px){
      #search_bar{
            padding-left:5px;
            padding-right:5px;
            padding-top:15px;
            padding-bottom:70px;
            font-size:7px;
        }
    }

    @media (max-width: 601px){
        #logo{
            width:110px;
            margin-top:30px;
            margin-left:10px;

        }
    }

    @media (min-width: 1700px){
        .bandeau{
            margin: -10px;
            padding:10px;
            padding-top:50px;
            padding-right:400px;
            margin-top:-5px;
        }
    }

    @media (min-width: 1700px){
        .search_bar_container{
            margin-left: 60%;
            width:500px;
            margin-top:-9%;
            padding:20px;
            position:absolute;
            height:max-content;
        }
    }

    @media (min-width: 1700px){
        #valider_recherche{
            width:480px;
            margin-top:2%;
            margin-left:-3px;
        }
    }

    @media (min-width: 2100px){
        .search_bar_container{
            margin-top:-7%;
        }
    }

    @media (min-width: 2500px){
        .search_bar_container{
            margin-top:-180px;
            width:20%;
            height:260px;
            padding-bottom:150px;
        }
    }

    @media (min-width: 2300px){
        #search_bar{
            padding-bottom:70px;
            font-size:150%;
        }
    }

    @media (min-width: 2300px){
        #valider_recherche{
            font-size:120%;
            margin-top:1%;
        }
    }

    @media (min-width: 2500px){
        #valider_recherche{
            width:97%;
        }
    }

    @media (min-width: 1700px){
        #logo{
            width:200px;
            margin-bottom:15px;
            margin-left:35px;
        }
    }

</style>