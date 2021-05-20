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
// Comparer un produit :
// Produits comparés :
// Blog :
// Liste des sites :
function listerSites(){
	$SQL = "SELECT Name AS 'Nom des sites' 
			FROM sites
			order by Name ASC";

	return(parcoursRs(SQLSelect($SQL)));
}
// Aides :
// Admin : 


?>
