<?php

use function PHPUnit\Framework\once;

session_start()
                 ?>  

<!DOCTYPE html>


<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Monoton&display=swap" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="/Association/css/style.css">
        <link rel="stylesheet" href="/Association/css/style.css">
        <title>Association</title>
    </head>
    <body>
        
        <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="index.php?action=associations">
                <img src="img/asso.png" width="100" height="100" >
                <span>Gramont</span>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                      <ul class="navbar-nav">
                        <li class="nav-item active">
                          <a class="nav-link" href="index.php?action=associations">Accueil <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="index.php?action=sports">Les sports</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="index.php?action=quartiers">Les Associations</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="index.php?action=ajouter">connexion</a>
                        </li>
                      </ul>
                   </div>
                   <?php   
                 $login = $_SESSION["login"] ='';
                 echo $_SESSION["login"];
                  $fonction = $_SESSION["fonction"] ='';
                  echo $_SESSION["fonction"];
               
                 ?>  
        </nav>
        </header>
        <main role="main" class="container">
            <div class="starter-template">
                
                <?= $content ?>   <!-- Élément spécifique de Vue -->
                
            </div>  <!-- ./starter-template --> 
        </main>
        <footer class="footer mt-auto py-3">
            <div class="container">
                <div class="row">
                    <p class="text-center">Réalisé avec HTML5 - CSS3 - PHP7.</p>
                </div>
            </div>
        </footer>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
   
    <script>
        $(document).ready(function() {
            var patternMail = /^[a-z0-9\-_.]+@[a-z0-9\-_.]+\.[a-z]{2,3}$/i;
           
            // Contrôle à la saisie de la validité de l'adresse email.
            $("#email").on("keyup", function() {
                if (!$(this).val().match(patternMail)) {
                    $(this).css({
                        backgroundColor: "#DE125C"
                    })
                } else {
                    $(this).css({
                        backgroundColor: "#22C718"
                    })
                }
            });

            // Obtenir à la saisie un nom utilisateur commençant par une majuscule et 
            // lettres minusules ensuite.
            $("#user").on("keyup", function(){
                $(this).val($(this).val().charAt(0).toUpperCase() + $(this).val().substr(1).toLowerCase());
            });


            // Disparition du BackgroudColor éventuel.
            $("#reset").on("click", function() {
                $("#email").css({
                    backgroundColor: ""
                });
            });

            // Sur la soumission du formulaire on vérifie que les champs du formulaire d'inscription
            // soient tous bien renseignés. Pour cela, dés qu'il manque au moins une valeur on bloque
            // la soumission du formulaire et on affiche le message d'erreur.
            $("#submit").on("click", function(e) {
               if($("#user").val().length ==0 || $("#pwd").val().length ==0 || $("#email").val().length==0||$("#fonction").val().length==0){
                e.preventDefault();
                var html="";
                html += "<span>Vous devez renseigner tous les champs !!!</span>";
                $("#perreur").empty();
                $("#perreur").append(html);  
               }else{
                   return true;
               }
            });

        });
    </script> 
</body>

</html>