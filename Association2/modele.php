<?php
require("connect.php");

// Connexion à la BDD
function connect_db()
{
    $dsn = "mysql:dbname=" . BASE . ";host=" . SERVER. ";port=3306";
    try {
        $option = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
        $connexion = new PDO($dsn, USER, PASSWD,$option);
    } catch (PDOException $e) {
        printf("Echec connexion : %s\n", $e->getMessage());
        exit();
    }
    return $connexion;
}

function get_all_associations(){

    $connexion = connect_db();
    $associations = array();
    $sql = "SELECT * from  associations";

    foreach ($connexion->query($sql) as $row) {
        $associations[] = $row;
    }
    return $associations;
}


  
function get_association_by_id($id){

    $connexion = connect_db();
    $sql ="SELECT * from associations WHERE idAsso = :idAsso";
    $reponse = $connexion->prepare($sql);
    $reponse->bindParam(':idAsso', $id, PDO::PARAM_INT);
    $reponse->execute();
    return $reponse->fetch();
}


// Suppression d'un stagiaire par id
function delete_association_by_id($id){
    $connexion = connect_db();
    $sql = " DELETE FROM associations WHERE idAsso = :id ";
    $reponse = $connexion->prepare($sql);
    $reponse->bindValue(":id", intval($_GET["id"]), PDO::PARAM_INT);
    $reponse->execute();

}

function ajouter_association($nom, $site,$id,$idq){
    $connexion = connect_db();
    $sql = "INSERT INTO associations(idAsso, nom, site, idQuartier) VALUES ( :id ,:nom , :site, :idq)";
    $reponse = $connexion->prepare($sql);
    $reponse->bindParam(':nom', $nom);
    $reponse->bindParam(':site', $site);
    $reponse->bindParam(':id', $id);
    $reponse->bindParam(':idq', $idq);
   $reponse->execute();

}

function modifier_association($nom, $site, $id){
  
    $connexion = connect_db();
    $sql = "UPDATE associations SET nom = :nom , site = :site  WHERE idAsso = :id";
    $reponse = $connexion->prepare($sql);
    $reponse->bindParam(':nom', $nom);
    $reponse->bindParam(':site', $site);
    $reponse->bindParam(':id', $id, PDO::PARAM_INT);
    $reponse->execute();

}


function get_all_sports(){

    $connexion = connect_db();
    $sports = array();
    $sql = "SELECT * from sports";

    foreach ($connexion->query($sql) as $row) {
        $sports[] = $row;
    }
    return $sports;
}

function get_sports_by_id($id){

    $connexion = connect_db();
    $sql ="SELECT * from sports WHERE idSport = :id";
    $reponse = $connexion->prepare($sql);
    $reponse->bindParam(':id', $id, PDO::PARAM_INT);
    $reponse->execute();
    return $reponse->fetch();
}


function get_all_quartiers(){

    $connexion = connect_db();
    $quartiers = array();
    $sql = "SELECT * from quartiers";
  
    foreach ($connexion->query($sql) as $row) {
        $quartiers[] = $row;
    }
    return $quartiers;

}

function  get_quartier_by_nom($id){

    $connexion = connect_db();
    $sql ="SELECT * from associations WHERE nom = :id";
    $reponse = $connexion->prepare($sql);
    $reponse->bindParam(':id', $id, PDO::PARAM_INT);
    $reponse->execute();
    return $reponse->fetch();
}


function controler_doublon($email,$user){
    $connexion = connect_db();
    $requete = "SELECT * FROM utilisateurs WHERE email_user = :email_user AND login_user= :user";
    $stmt = $connexion->prepare($requete);
    $stmt->bindParam(':email_user', $email, PDO::PARAM_STR);
    $stmt->bindParam(':user', $user, PDO::PARAM_STR);
    $stmt->execute();
    $result = $stmt->rowCount();
    if ($result==0) return false;
    else return true;

}

function ajouter_utilisateur($email,$user,$pwd,$fonction){
    $connexion = connect_db();
    $requete = "INSERT INTO utilisateurs(email_user,login_user,pwd_user,fonction) VALUES (:email_user, :login_user, :pwd_user, :fonction)";
    $stmt = $connexion->prepare($requete);
    $stmt->bindParam(':email_user', $email);
    $stmt->bindParam(':login_user', $user);
    $stmt->bindParam(':pwd_user', $pwd);
    $stmt->bindParam(':fonction', $fonction);
    $stmt->execute();
  
}

function verifier_utilisateur($user,$email){
    $connexion = connect_db();
    $requete = "SELECT * FROM utilisateurs WHERE email_user = :email_user AND login_user= :user";
    $stmt = $connexion->prepare($requete);
    $stmt->bindParam(':email_user', $email, PDO::PARAM_STR);
    $stmt->bindParam(':user', $user, PDO::PARAM_STR);
    $stmt->execute();
    return $stmt->fetch();
}