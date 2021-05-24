<?php
if (basename($_SERVER["PHP_SELF"]) != "index.php")
{
	header("Location:../index.php?view=accueil");
	die("");
}

mkForm("controleur.php");
	echo"
	<select>
		<option>Par nom ASC</option>
		<option>Par nom DESC</option>
		<option>Par gamme ASC</option>
		<option>Par gamme DESC</option>
		<option>Par note ASC</option>
		<option>Par note DESC</option>
		<option>Par nom ASC</option>
	</select>";

	mkInput("submit", "action","Trier");
	echo"</br>";
endForm();

mkForm("controleur.php");
	mkInput("text", "action");
	mkInput("submit", "action","Rechercher");
	echo"</br>";
endForm();

//Liste globale triée par Nom Alphabétiquement
 $listeProduit = listerProduitsParNomASC();
 mkProduits($listeProduit);

//Fonction de recherche
// $ListeRecherchee = RechercherParNom("R");
// mkProduits($ListeRecherchee);


?>

