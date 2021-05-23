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
function listerProduits(){
	$SQL = "SELECT P.nomProduit as 'Nom du produit', G.gamme as Gamme, P.description as 'Description du produit', P.noteProduit  
			FROM produits P, gamme G
			WHERE G.idGamme = P.gamme
			order by P.nomProduit ASC";
	return(parcoursRs(SQLSelect($SQL)));
}

// Liste des produits :
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
