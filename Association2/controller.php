<?php

require_once 'modele.php';

function   associations(){
    $associations = get_all_associations();
    require "template/gramont.php";
}
// Affiche une erreur dans une vue qui centralise toutes les levées d'Exceptions 
function erreur($msgErreur) {
    require 'template/erreur.php';
}
function obtenir_association($id){

    return get_association_by_id($id);

}
// function ajoute_association(){

//     $associations  = get_all_associations();
//     require "template/ajouter_assocication.php";
  
// }

function supprimer_association($id){

    delete_association_by_id($id);
    $associations = get_all_associations();
    require "template/gramont.php";

}

function ajout_association($nom, $site ,$id,$idq){

    ajouter_association($nom, $site,$id,$idq);
    $associations  = get_all_associations();
    require "template/gramont.php";
   
}


// function modifi_association(){
//     $associations  = get_all_associations();
//     require "template/gramont.php";
//     // require "template/modifier_association.php";
   
// }



function modifie_association($nom,$site,$id){

    modifier_association($nom,$site,$id);
    $associations  = get_all_associations();
    
    require "template/gramont.php";

}

function   sports(){
    $sports = get_all_sports();
    require "template/sports.php";
}

function obtenir_sports($id){

    return get_sports_by_id($id);

}

function  quartiers(){
    $quartiers = get_all_quartiers();
    require "template/associations.php";
}
function obtenir_quartiers($id){

    return get_quartier_by_nom($id);

}
function form_connection(){
    require "template/connexion.php";
}
function form_create(){
    require "template/ajouter_utilisateur.php";
}
function accueil(){
    require "template/accueil.php";
}
function controle_doublon($user, $email){
    return controler_doublon($user,$email);
}

function verifie_utilisateur($user,$email){
    return verifier_utilisateur($user,$email);
}

function ajoute_utilisateur($email,$user,$pwd,$fonction){
  
    ajouter_utilisateur($email,$user,$pwd,$fonction);
    // require "template/ajouter_utilisateur.php"; 
    require "template/connexion.php";

   
}
function   ajout_utilisateur(){
   
    
    require "template/ajouter_utilisateur.php";
}

?>
