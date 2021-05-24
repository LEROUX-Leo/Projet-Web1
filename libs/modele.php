<?php

// inclure ici la librairie faciliant les requêtes SQL
include_once("maLibSQL.pdo.php");
include_once("maLibUtils.php");

function verifUserBdd($login,$passe)
{
	// Vérifie l'identité d'un utilisateur 
	// dont les identifiants sont passes en paramètre
	// renvoie faux si user inconnu
	// renvoie l'id de l'utilisateur si succès

	// On utilise SQLGetChamp
	// si on avait besoin de plus d'un champ
	// on aurait du utiliser SQLSelect

	$SQL ="SELECT id FROM users WHERE pseudo='$login' AND passe='$passe'"; 
	return SQLGetChamp($SQL);
}

function isAdmin($idUser)
{
	// vérifie si l'utilisateur est un administrateur
	$SQL = "SELECT admin FROM users WHERE id='$idUser'";
	return SQLGetChamp($SQL);
}

// Accueil :

// Liste des produits :
//6 FONCTIONS DE TRIS :
//1
function listerProduitsParNomASC(){
	$SQL = "SELECT P.nomProduit as 'Nom du produit', G.gamme as Gamme, P.description as 'Description du produit', P.noteProduit  
			FROM produits P, gamme G
			WHERE G.idGamme = P.gamme
			order by P.nomProduit ASC";
	return(parcoursRs(SQLSelect($SQL)));
}
//2
function listerProduitsParNomDESC(){
	$SQL = "SELECT P.nomProduit as 'Nom du produit', G.gamme as Gamme, P.description as 'Description du produit', P.noteProduit  
			FROM produits P, gamme G
			WHERE G.idGamme = P.gamme
			order by P.nomProduit DESC";
	return(parcoursRs(SQLSelect($SQL)));
}

//3
function listerProduitsParGammeASC(){
	$SQL = "SELECT P.nomProduit as 'Nom du produit', G.gamme as Gamme, P.description as 'Description du produit', P.noteProduit  
			FROM produits P, gamme G
			WHERE G.idGamme = P.gamme
			order by P.gamme DESC";
	return(parcoursRs(SQLSelect($SQL)));
}
//4
function listerProduitsParGammeDESC(){
	$SQL = "SELECT P.nomProduit as 'Nom du produit', G.gamme as Gamme, P.description as 'Description du produit', P.noteProduit  
			FROM produits P, gamme G
			WHERE G.idGamme = P.gamme
			order by P.gamme ASC";
	return(parcoursRs(SQLSelect($SQL)));
}

//5
function listerProduitsParNoteASC(){
	$SQL = "SELECT P.nomProduit as 'Nom du produit', G.gamme as Gamme, P.description as 'Description du produit', P.noteProduit  
			FROM produits P, gamme G
			WHERE G.idGamme = P.gamme
			order by P.noteProduit ASC";
	return(parcoursRs(SQLSelect($SQL)));
}
//6
function listerProduitsParNoteDESC(){
	$SQL = "SELECT P.nomProduit as 'Nom du produit', G.gamme as Gamme, P.description as 'Description du produit', P.noteProduit  
			FROM produits P, gamme G
			WHERE G.idGamme = P.gamme
			order by P.noteProduit DESC";
	return(parcoursRs(SQLSelect($SQL)));
}

//Fonction de recherche : 
function RechercherParNom($Nom){
	$SQL = "SELECT P.nomProduit as 'Nom du produit', G.gamme as Gamme, P.description as 'Description du produit', P.noteProduit  
			FROM produits P, gamme G
			WHERE G.idGamme = P.gamme
			AND nomProduit LIKE '$Nom%'";
	return(parcoursRs(SQLSelect($SQL)));		
}

//Liste tous les sites
function listerSites($type){
	$SQL = "SELECT S.nomSite AS 'Nom des sites' 
			FROM sites S, association_site A, types T
			WHERE S.idSite = A.idSite
			AND A.idType = T.id
			AND T.Types = '$type'
			order by S.nomSite ASC";
	return(parcoursRs(SQLSelect($SQL)));
}


//messages :
// Aides :
// Admin : 


?>
