<!-- footer.php -->
<div class="navbar">
    <img src = "images\DiscuBlog_logo.png" id = "logo_2" alt ="Logo de DiscuBlog"/>
    <meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1.0" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <a href="index.php" style="margin-top:-2%;">Accueil</a>
</div>
<style>
body {margin:0;}

#logo_2{
    width: 40px;
    margin-left:20px;
}

.navbar {
    background-color:#363f93;
    position: fixed;
    bottom: 0;
    width: 100%;
    padding-left:50px;
    margin-left:-50px;
}

.navbar a {
    font-size:30px;
    padding-top: 10px;
    padding-left: 50px;
    padding-right: 50px;
    padding-bottom: 5px;
    margin-left:40%;
    margin-right:42.8%;
    color: #f2f2f2;
    text-align: center;
    text-decoration: none;
    border-radius:20px;
    font-family: 'Times New Roman', Times, serif;
}

.navbar a:hover {
    background: #ddd;
    color: black;
}


@media (max-width: 1500px){
        .navbar a{
            width:min-content;
            margin-left:45%;
            padding:2px;
            padding-right:20px;
            padding-left:20px;
            font-size:22px;
        }
    }

    @media (max-width: 900px){
        .navbar a{
            margin-left:42.5%;
        }
    }

    @media (max-width: 600px){
        .navbar a{
            margin-left:38%;
        }
    }

    @media (max-width: 400px){
        .navbar a{
            margin-left:34%;
        }
    }

    @media (max-width: 1500px){
        .navbar{
            height:28px;
        }
    }

@media (max-width: 1500px){
    #logo_2{
        margin:0px;
        padding:0px;
        width:0px;
    }
}

@media (min-width: 1900px){
        .navbar a {
        margin-left:42%;
        margin-right:40.8%;
        }
    }

@media (min-width: 2500px){
        .navbar a {
        margin-left:44.5%;
        margin-right:39%;
        }
    }

</style>
</footer>