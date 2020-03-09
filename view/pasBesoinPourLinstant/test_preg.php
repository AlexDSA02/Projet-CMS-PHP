<?php

$i=1;
   $url = 'https://www.youtube.com/feed/trending';
   $content =(file_get_contents($url));
   $chaine='/Eva/';
   //echo $content ;
$texte=$content;
if(preg_match_all($chaine, $texte,$matches)) 
{ 
echo "Le texte contient la chaine : ".$chaine; 
//$continue='true';
//$matches[0][$i]=='UN'
while (isset($matches[0][$i])) {
	$i=$i+1;
	echo $i;
	echo '-';

}
} 
else 
{ 
echo "Le texte ne contient pas la chaine : ".$chaine; 
} 
print_r($matches);













//preg match all permet de mettre dans une vrariable matches['X'] la chaine de caractere qui correspond à la requete
//la requete se fais en 3 partie ($chaine de cara a trouvé, $Texte ou trouvé la chaine de cara, $out(je ne sais pas encore a quoi sert la dernier e partit ici out.))
//Grace a ceci: $content =(file_get_contents($url)); on la le code source en brut de la page web passer en parrametre ici URL


























?>