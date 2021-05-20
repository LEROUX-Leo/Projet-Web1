<?php


if (basename($_SERVER["PHP_SELF"]) != "index.php")
{
	header("Location:../index.php?view=accueil");
	die("");
}
echo"
Afficher les meilleurs 3 meilleurs sites selon les types
Afficher les 5 meilleurs sites que l'on a visités peut importe le type
";
?>





