<?php


if(!isset($_POST["cv"]))
{
    header("location: search.php?error=formerror");
    exit();
}

$doctorid = $_POST["id"];

$dom = new DOMDocument();
$dom->formatOutput=TRUE;
$racine=$dom->createElement('infos');
$dom->appendChild($racine);

$user=$dom->createElement('info');
$racine->appendChild($user);

$domElement1 = $dom->createElement("form1", isset($_POST["form1"])? $_POST["form1"] : "");
$user->appendChild($domElement1);

$domElement2 = $dom->createElement("ob1", isset($_POST["ob1"])? $_POST["ob1"] : "");
$user->appendChild($domElement2);

$domElement3 = $dom->createElement("form2", isset($_POST["form2"])? $_POST["form2"] : "");
$user->appendChild($domElement3);

$domElement4 = $dom->createElement("ob2", isset($_POST["ob2"])? $_POST["ob2"] : "");
$user->appendChild($domElement4);

$domElement5 = $dom->createElement("ex1", isset($_POST["ex1"])? $_POST["ex1"] : "");
$user->appendChild($domElement5);

$domElement6 = $dom->createElement("duree1", isset($_POST["duree1"])? $_POST["duree1"] : "");
$user->appendChild($domElement6);

$domElement7 = $dom->createElement("ex2", isset($_POST["ex2"])? $_POST["ex2"] : "");
$user->appendChild($domElement7);

$domElement8 = $dom->createElement("duree2", isset($_POST["duree2"])? $_POST["duree2"] : "");
$user->appendChild($domElement8);

$path = "xml/".$doctorid.".xml";
$dom->save($path);


header("location: search.php?error=xmlnone");
exit();

 
   //le fichier xml est au même niveau que le fichier PHP qui le manipule