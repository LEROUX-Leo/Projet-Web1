<?php

// V1.0 du 18 mai 2018

/*
Ce fichier définit diverses fonctions permettant de faciliter la production de mises en formes complexes : 
tableaux, formulaires, ...
*/
// Exemple d'appel :  mkLigneEntete($data,array('pseudo', 'couleur', 'connecte'));
function mkLigneEntete($tabAsso,$listeChamps=false)
{
	// Fonction appelée dans mkTable, produit une ligne d'entête
	// contenant les noms des champs à afficher dans mkTable
	// Les champs à afficher sont définis à partir de la liste listeChamps 
	// si elle est fournie ou du tableau tabAsso

	if (!$listeChamps)	// listeChamps est faux  : on utilise le not : '!'
	{
		// tabAsso est un tableau associatif dont on affiche TOUTES LES CLES
		echo "\t<tr>\n";
		foreach ($tabAsso as $cle => $val)	
		{
			echo "\t\t<th>$cle</th>\n";
		}
		echo "\t</tr>\n";
	}
	else		// Les noms des champs sont dans $listeChamps 	
	{
		echo "\t<tr>\n";
		foreach ($listeChamps as $nomChamp)	
		{
			echo "\t\t<th>$nomChamp</th>\n";
		}
		echo "\t</tr>\n";
	}
}

function mkLigne($tabAsso,$listeChamps=false)
{
	// Fonction appelée dans mkTable, produit une ligne 	
	// contenant les valeurs des champs à afficher dans mkTable
	// Les champs à afficher sont définis à partir de la liste listeChamps 
	// si elle est fournie ou du tableau tabAsso

	if (!$listeChamps)	// listeChamps est faux  : on utilise le not : '!'
	{
		// tabAsso est un tableau associatif
		echo "\t<tr>\n";
		foreach ($tabAsso as $cle => $val)	
		{
			echo "\t\t<td>$val</td>\n";
		}
		echo "\t</tr>\n";
	}
	else	// les champs à afficher sont dans $listeChamps
	{
		echo "\t<tr>\n";
		foreach ($listeChamps as $nomChamp)	
		{
			echo "\t\t<td>$tabAsso[$nomChamp]</td>\n";
		}
		echo "\t</tr>\n";
	}
}

// Exemple d'appel :  mkTable($users,array('pseudo', 'couleur', 'connecte'));	
function mkTable($tabData,$listeChamps=false)
{

	// Attention : le tableau peut etre vide 
	// On produit un code ROBUSTE, donc on teste la taille du tableau
	if (count($tabData) == 0) return;

	echo "<table border=\"1\">\n";
	// afficher une ligne d'entete avec le nom des champs
	mkLigneEntete($tabData[0],$listeChamps);

	//tabData est un tableau indicé par des entier
	foreach ($tabData as $data)	
	{
		// afficher une ligne de données avec les valeurs, à chaque itération
		mkLigne($data,$listeChamps);
	}
	echo "</table>\n";

	// Produit un tableau affichant les données passées en paramètre
	// Si listeChamps est vide, on affiche toutes les données de $tabData
	// S'il est défini, on affiche uniquement les champs listés dans ce tableau, 
	// dans l'ordre du tableau
	
}

// Produit un menu déroulant portant l'attribut name = $nomChampSelect

// Produit les options d'un menu déroulant à partir des données passées en premier paramètre
// $champValue est le nom des cases contenant la valeur à envoyer au serveur
// $champLabel est le nom des cases contenant les labels à afficher dans les options
// $selected contient l'identifiant de l'option à sélectionner par défaut
// si $champLabel2 est défini, il indique le nom d'une autre case du tableau 
// servant à produire les labels des options

// exemple d'appel : 
// $users = listerUtilisateurs("both");
// mkSelect("idUser",$users,"id","pseudo");
// TESTER AVEC mkSelect("idUser",$users,"id","pseudo",2,"couleur");

function mkSelect($nomChampSelect, $tabData,$champValue, $champLabel,$selected=false,$champLabel2=false){

	$multiple=""; 
	if (preg_match('/.*\[\]$/',$nomChampSelect)) 
		$multiple =" multiple =\"multiple\" ";

	echo "<select $multiple name=\"$nomChampSelect\">\n";
	foreach ($tabData as $data)
	{
		$sel = "";	// par défaut, aucune option n'est préselectionnée 
		// MAIS SI le champ selected est fourni
		// on teste s'il est égal à l'identifiant de l'élément en cours d'affichage
		// cet identifiant est celui qui est affiché dans le champ value des options
		// i.e. $data[$champValue]
		if ( ($selected) && ($selected == $data[$champValue]) )
			$sel = "selected=\"selected\"";

		echo "<option $sel value=\"$data[$champValue]\">\n";
		echo  $data[$champLabel] . "\n";
		if ($champLabel2) 	// SI on demande d'afficher un second label
			echo  " ($data[$champLabel2])\n";
		echo "</option>\n";
	}
	echo "</select>\n";
}

function mkForm($action="",$method="get"){
	// Produit une balise de formulaire NB : penser à la balise fermante !!
	echo "<form action=\"$action\" method=\"$method\" >\n";
}
function endForm(){
	// produit la balise fermante
	echo "</form>\n";
}

function mkInput($type,$name,$value=""){
	// Produit un champ formulaire
	echo "<input type=\"$type\" name=\"$name\" value=\"$value\"/>\n";
}

function mkRadioCb($type,$name,$value,$checked=false){
	// Produit un champ formulaire de type radio ou checkbox
	// Et sélectionne cet élément si le quatrième argument est vrai
	$selectionne = "";	
	if ($checked) 
		$selectionne = "checked=\"checked\"";
	echo "<input type=\"$type\" name=\"$name\" value=\"$value\"  $selectionne />\n";
}

function mkLien($url,$label, $qs=""){
	echo "<a href=\"$url?$qs\">$label</a>\n";
}

function mkLiens($tabData,$champLabel, $champCible, $urlBase=false, $nomCible=""){

	foreach ($tabData as $nextData) {	
		if ($urlBase) {
			// Une URL de base : on l'utilise et on la complète 
			// par un paramètre supplémentaire venant de tabData
			$url = "$urlBase&$nomCible=" . urlencode($nextData[$champCible]);
		} 
		else {
			// pas de $urlBase : on utilise le champ $champCible comme url
			$url = $nextData[$champCible]; 
		}
		echo "<a href=\"$url\" >\n"; 
		echo $nextData[$champLabel]; 
		echo "</a> <br />\n";
	}
}

function mkUnProduit($tabAsso,$listeChamps=false)
{
	foreach ($tabAsso as $cle => $val){
		if($cle == "Nom du produit"){
				echo"<div class='produit'>\n";
			echo"<div class='top'>\n";
				echo"<img class='imgProd' src='./produits/Disque dur 1To.png' alt='$val'>";
			echo"</div>";

			echo"<div class='nom'>";
				echo"<a href='index.php?view=produits&nomProduit=$val'><strong>$val</strong></a>";
			echo"</div>";
		}
			
		else if($cle == "Gamme"){
			if($val=="Bas de gamme"){
				echo"<div class='gamme1'>";
					echo"<p><strong>$val</strong></p>";
				echo"</div>";
			}
			else if($val=="Milieu de gamme"){
				echo"<div class='gamme2'>";
					echo"<p><strong>$val</strong></p>";
				echo"</div>";
			}
			else if($val=="Haut de gamme"){
				echo"<div class='gamme3'>";
					echo"<p><strong>$val</strong></p>";
				echo"</div>";
			}
		}
		
		else if($cle == "Description du produit"){
			echo"<div class='description'>";
				echo"<p>$val</p>";
			echo"</div>";
		}
	
		else if($cle == "noteProduit"){
			echo"<div class='note'>";
			if($val == 0){
				echo"<p>☆ ☆ ☆ ☆ ☆</p>";
			}
			else if($val == 1){
				echo"<p>★ ☆ ☆ ☆ ☆</p>";
			}
			else if($val == 2){
				echo"<p>★ ★ ☆ ☆ ☆</p>";
			}
			else if($val == 3){
				echo"<p>★ ★ ★ ☆ ☆</p>";
			}
			else if($val == 4){
				echo"<p>★ ★ ★ ★ ☆</p>";
			}
			else if($val == 5){
				echo"<p>★ ★ ★ ★ ★</p>";
			}
		echo"</div>"; //fin div noteProduit
		echo"</div>"; //fin div produit
		}
	}	
}

function mkProduits($tabData){

	foreach ($tabData as $data){
		mkUnProduit($data);
	}	
}
?>






