<?php

echo"</br>Electroménager";
$type = "Electroménager";
$listeElec = listerSites($type);
mkTable($listeElec);

echo"</br>Informatique";
$type = "Informatique";
$listeInfo = listerSites($type);
mkTable($listeInfo);

echo"</br>Jeux vidéos";
$type = "Jeux vidéos";
$listeJeVid = listerSites($type);
mkTable($listeJeVid);

echo"</br>High-Tech";
$type = "High-Tech";
$listeHiTe = listerSites($type);
mkTable($listeHiTe);

?>
