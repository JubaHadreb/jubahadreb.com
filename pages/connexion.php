<?php

$hote = '127.0.0.1';
$base = 'u190287139_jubahadreb';
$utilisateur = 'u190287139_jubahadreb';
$passe = 'Amgmrc/11';

$connexion = new PDO('mysql:host='.$hote.';dbname='.$base, $utilisateur, $passe);

$connexion->exec('set names utf8');

?>