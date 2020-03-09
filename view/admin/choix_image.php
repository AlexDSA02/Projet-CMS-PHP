<?php
require_once('C:\wamp64\www\test_bootstrap\controller\bdd.php');	
require_once('C:\wamp64\www\test_bootstrap\model/Image.php');
require_once('C:\wamp64\www\test_bootstrap\controller/ImageManager.php');
require_once('C:\wamp64\www\test_bootstrap\model/Para.php');
require_once('C:\wamp64\www\test_bootstrap\controller/ParaManager.php');


$localisation=$_GET['localisation'];
$id_bloc=$_GET['id_bloc'];
echo $id_bloc;


echo ' <link rel="stylesheet" href="bouton_radio.css" />';
$image = new ImageManager();
$para = new ParaManager();
$TableauDeToutesLesImages=$image->getListImage();
$nombreImage=$image->GetNombreImage();
$i=$nombreImage-1;

echo '<form  id="id_formulaire_image" novalidgdate method="post">';
for ($i;$i>=0;$i--)
	{	
		$nomImage=$TableauDeToutesLesImages[$i]->nom();
		$extensionImage=$TableauDeToutesLesImages[$i]->extension();
		$nomCompletImage=$nomImage.'.'.$extensionImage;
		echo '<input type="radio" name="postNomCompletImage" value="'.$nomCompletImage.'" checked id="radio-choice-'.$i.'"> ';
		echo '<label for="radio-choice-'.$i.'"><img src="../../img/'.$nomCompletImage.'" alt="" height="125px"/></label>  ';

	}

	echo '<input type="submit" name="paraok">'; 


if (isset($_POST['paraok']))
{
	$para->modifPara($id_bloc, $localisation, 'image', $_POST['postNomCompletImage'] );
	echo '<SCRIPT>javascript:window.close()</SCRIPT>';
	$try=$para->returnPara($id_bloc, $localisation, 'image');
	echo $try;

}


?>