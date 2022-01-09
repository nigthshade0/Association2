
<?php
require_once 'controller.php';

try {
	if (isset($_GET['action'])) {

		switch ($_GET['action']) {

			case 'association':

				if (isset($_GET['id'])) {
					$associations = intval($_GET['id']);

					if ($association != 0)
						associations($association);

					else
						throw new Exception("Identifiant de association non valide");
				} else
					throw new Exception("Identifiant de association non défini");
				break;
                case 'suppr':
				
				if($_GET["action"]=="suppr"){
				
					if(isset($_GET["id"])){
						supprimer_association($_GET["id"]);
					}else{
						throw new Exception("<span style='color:red'>Aucun identifiant  envoyé</span>");
					}
				}
			
			break;
			case 'add':

				if ($_GET["action"] === "add") {

					if (!empty($_POST["nom"]) && (!empty($_POST["site"])  && (!empty($_POST["id"])&& (!empty($_POST["idq"]))))) {

						$nom = $_POST["nom"];
						$site = $_POST["site"];
						$id = $_POST["id"];
						$idq = $_POST["idq"];
						// Contrôle des données ici avant insertion dans la BDD
						ajout_association($nom, $site, $id,$idq);
					} else {
						// throw new Exception("Identifiant de add non défini");
						require "template/ajouter_assocication.php";
					}
				} else {

					throw new Exception("<h1>Page non trouvée !!!</h1>");
				}
				break;

			case 'modif':

				if ($_GET["action"] == "modif") {

					if (isset($_GET["id"])) {

						$associations = obtenir_association($_GET["id"]);

						if (!empty($_POST["nom"]) && (!empty($_POST["site"]))) {

							$nom = $_POST["nom"];
							$site = $_POST["site"];
							$id = $_POST["cache"];
							
							// Contrôle des données ici avant modification dans la BDD

							modifie_association($nom,$site,$id);
						} else {

							require "template/modifier_association.php";
						}
					}
				} else {

					throw new Exception("<h1>Page non trouvée !!!</h1>");
				}
				break;

			case 'sport':
				if (isset($_GET['id'])) {
					$sports = intval($_GET['id']);
					if ($sport != 0)
						sports($sport);
					else
						throw new Exception("Identifiant de sport non valide");
				} else
					throw new Exception("Identifiant de sport non défini");


				break;
				
			case 'quartier':
				if (isset($_GET['id'])) {
					$quartiers = intval($_GET['id']);
					if ($quartier != 0)
						quartiers($quartier);
					else
						throw new Exception("Identifiant de associations2 non valide");
				} else
					throw new Exception("Identifiant de associations2 non défini");
				break;

			case 'associations':
				associations();
				break;
			case 'add':
				// ajoute_association();
				break;
			case 'modifi':

				break;
			case 'sports':
				sports();
				break;
			case 'quartiers':
				quartiers();
				break;
			case 'ajouter':
				form_connection();
				break;
			case 'ajou':
				form_create();
				break;
			case 'accueil':
				accueil();
				break;
			case 'aj':
				ajout_utilisateur();
				break;
		} //fin de switch   
	} // fin de isset($_GET['action']
	else {
		// accueil();  
		form_connection();
		//throw new Exception("<h1>Page non trouvée !!!</h1>");
	}




if (!isset($_GET["action"])) {
	
} else if (isset($_GET["action"])) {

	if ($_GET["action"] === "connect") {

		if (!empty($_POST["user"]) && !empty($_POST["email"]) && (!empty($_POST["pwd"]))) {

			$pwd = $_POST["pwd"];
			$user = $_POST["user"];
			$email = $_POST["email"];
			$resultat = verifie_utilisateur($user, $email);

			if (password_verify($pwd, $resultat["pwd_user"])) {
				$_SESSION["id"] = $resultat["id_user"];
				$_SESSION["login"] = $resultat["login_user"];
				$_SESSION["fonction"] = $resultat["fonction"];
				$_SESSION["email"] = $resultat["email_user"];
				accueil();
			} else {
				throw new Exception("Mauvais identifiants");
			}
		} else {
			throw new Exception("Vous devez renseigner tous les champs du formulaire");
		}
	}


	if ($_GET["action"] === "create") {

		$pattern_user_fonction = '/^[a-zA-ZáàâäãåçéèêëíìîïñóòôöõúùûüýÿæœÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸÆŒ._\s-]{3,30}$/';
		$pattern_pwd = "#^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).{6,}$#";
		$erreurs = array();


		function test_input($data)
		{
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}

		if (isset($_POST["user"]) && isset($_POST["email"]) && isset($_POST["pwd"]) && isset($_POST["fonction"])) {

			$user = test_input($_POST["user"]);
			$pwd = test_input($_POST["pwd"]);
			$email = test_input($_POST["email"]);
			$fonction = test_input($_POST["fonction"]);

			// Contrôle des données ici avant insertion dans la BDD
			if (!empty($user) && !empty($pwd) && !empty($email) && !empty($fonction)) {

				if (!preg_match($pattern_user_fonction, $user) || !preg_match($pattern_pwd, $pwd) || !filter_var($email, FILTER_VALIDATE_EMAIL) || !preg_match($pattern_user_fonction, $fonction)) {

					if (!preg_match($pattern_user_fonction, $user)) {
						$erreurs["user"] = "Veuillez entrer un nom d'utilisateur valide.";
					}

					if (!preg_match($pattern_pwd, $pwd)) {
						$erreurs["pwd"] = "Veuillez entrer un mot de passe valide.";
					}

					if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
						$erreurs["email"] = "Veuillez entrer une adresse email valide.";
					}

					if (!preg_match($pattern_user_fonction, $fonction)) {
						$erreurs["fonction"] = "Veuillez entrer une fonction valide.";
					}
				} else {

					// Encryptage du mot de passe avant insertion dans la Base de Données.
					$pwd = password_hash($pwd, PASSWORD_BCRYPT);
					// Ecrire une fonction qui contrôle l'absence de doublon avant l'insertion ...
					if (!controle_doublon($email, $user)) {

						if (empty($erreurs)) {

							ajoute_utilisateur($email, $user, $pwd, $fonction);
						}
					} else {


						
						throw new Exception("Identifiant et Mot de Passe déja utilisés !!!");
					}
				}
		}
		
	
		} else {
			$message = "Vous devez renseigner tous les champs du formulaire";
			require "template/ajouter_utilisateur.php";

		}
}
} else {

    throw new Exception("<h1>Page non trouvée !!!</h1>");	
}
} catch (Exception $e) {
	erreur($e->getMessage());
}
?>

