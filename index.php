<?php
session_start();


?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blogs</title>
    <link rel="stylesheet" href="public/css/index.css">
    <link rel="stylesheet" href="public/css/validation.css">
</head>
<body>
<?php 

if(isset($_GET["empty"]) && $_GET["empty"]=="empty"){
    print("<p class='formEmpty' id=emptyCamp>No puede haber campos vacios</p>");
}
if(isset($_GET["go"]) && $_GET["go"]=="go"){
    print("<p class='goForm' id=emptyCamp>Articulo publicado correctamente!</p>");
   
}


?>
 
    <?php 

        include "php/model/model.php";
        $statementUser = "SELECT * from userRoot";
        $queryUser = mysqli_query($conection, $statementUser);
        $conector = false;


        while($user=mysqli_fetch_array($queryUser)){
            if($user["username"]=="jere21000" && $user["passuser"]=="jere21000"){
                $conector = true;
            }
        }
        if( ($conector) == true){
     
            print("<div class=form__container id=form__container> 
                <h1 class=titlecontainer>Publicar un articulo</h1>
                <form action='php/validating.php' method=post class=form__publish id=form__publish enctype='multipart/form-data'>
                   
                <input type='text'  placeholder='Titulo de mi articulo' name=title class=title__article id=titleArticle>

                        <textarea name='text' class='textPublish' placeholder='Descripcion de mi articulo' id='textPublish' cols='30' rows='10'></textarea>
                            
                        <p class=containerPhoto>
                            <input type='file' name=photo id=photo class=photo >
                        </p>

                        <button class='button__publish' id=button__publish>Publicar articulo</button>

                </form>
                
            </div>");
}

//mostrado de elementos

$statementpublication = "SELECT * FROM blogspot";

$queryPublication = mysqli_query($conection, $statementpublication);

while($publication=mysqli_fetch_array($queryPublication)){
    print(
        "<section class=publication id=publication>
            
            <span class='time__blog'>$publication[blogDateTime]</span>
            <article class='articleBlog' id='articleBlog'>
                <h1 class='titleArticle'>$publication[blogTitle]</h1>
                <div class=containerimg>
                <img src='php/uploads/blogsimg/$publication[blogImage]' class='imageArticle' id='imageArticle' />
                </div>
                <div class='containerDescription'>
                <p class='descriptionArticle' id='descriptionArticle'> 
                   $publication[blogDescription]
                </p>
                </div>
            </article>

        </section>
        "
    );
    
}








?>
<script src="public/js/validation.js"></script>
</body>
</html>


