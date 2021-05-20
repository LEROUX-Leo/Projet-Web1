<?php


if (basename($_SERVER["PHP_SELF"]) != "index.php")
{
	header("Location:../index.php?view=accueil");
	die("");
}

?>
<html>
<head> 
<style>
@import url('https://fonts.googleapis.com/css2?family=Montserrat&display=swap');


.all{
	font-family: 'Montserrat', sans-serif;
	position : absolute;
	width:1100px;
	height:800px;
	top:62px;
	
}

.top{
	background-color: #ffffff;
	padding: 10px 25px 25px 25px;
    position: absolute;
    width: 750px;
	height:575px;
}

.right1{
	background-color: #ffffff;
	padding: 10px 25px 25px 25px;
    position: absolute;
    width: 375px;
	height:575px;
	left :775px;
	text-align : center;
}

.bottom{
	background-color: #ffffff;
	padding: 10px 25px 25px 25px;
    position: absolute;
    top:600px;
    width:1150px;
    height: 200px;	
} 


</style>
</head>

<body>

<!--<img class="background" src="./ressources/ecole1" alt="Arrire plan de l'ecole"/>
-->

<div class='all'>
	<div class='top'>

		<h1><strong>Le comparateur2i ressence les meilleurs sites par type d'achats</strong></h1>
		</br>
		<p>Je vais répertorier, décrire et comparer les meilleurs sites de vente en ligne, tout simplement !</p>
		<p>C'est vraiment <strong>trop nul de perdre autant de temps</strong> à chercher et comparer les prix sur tous les sites lorsque l'on commande en ligne.</p>
		<p>On veut que tu gagnes le plus de temps possible et que tu trouves <strong>LE site le plus avantageux pour ton achat.</strong></p>
		<p>Ce site répertorie les sites commerçants selon <strong>les types d'achats, types de transaction, neuf ou d'occasion.</strong></p>
		<p>Tu n’as plus rien à faire, <strong>je passe tout au crible pour toi afin de t’aider à faire ton choix.</strong></p>
		<p>Bonne lecture !</p>
	</div>

	<div class='right1'>
		<h2><strong>L'équipe</strong></h2>
		<img src="./ressources/leo.png" alt="Photo de LEROUX Léo" style="width: 220px;"/>
		<img src="./ressources/alexandre.png" alt="Photo de Caby Alexandre" style="width: 200px;"/>


	
		<h2><strong>Mails :</strong></h2>
		<p>leo.leroux@ig2i.centralelille.fr</br>
		alexandre.caby@ig2i.centralelille.fr</p>
		<img class='centrale' src='./ressources/logo.png' alt='logo'>
	</div>

	<div class='bottom'>
		<h1><strong>Comment m'utiliser ?</strong></h1>
		<p>- Pour commencer une comparaison, tu dois te rendre dans l'onglet : <strong>comparer un produit</strong></br>
		- En allant sur l'onglet <strong>Produits comparés</strong>, tu vas pouvoir voir les produits que tu as déjà comparés.</br>
		- Si tu veux voir les meilleurs sites selon leur type, va sur <strong>Meilleurs sites.</strong></br>
		- Tu veux donner ton avis sur un site précis ? L'onglet <strong>Blog</strong> t'attend !</p>


		


	</div>
</div>


</body>
</html>




