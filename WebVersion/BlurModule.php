<?php
// code pour alterer un msg en fonction de la distance
function blur ($message, $percent) # definition de la fonction d'alteration
{
	$blurredMessage = ""; // definition de la variable msg alterer comme etant vide
	$blurredChars = array ("@", "&", "#", ";", "!", "*", "µ", "£", "$", "€", ",", "'", '"', "`", "~", "^", "à", "é", "ê", "â", "ù");
	// liste des caracteres utiliser pour alterer le msg
	foreach (str_split ($message) as $c) // decoupage du msg en une liste de caracteres car php ne le fait pas automatiquement
	{
		$randFloat = rand () / getrandmax (); // divison du nb par un nombre aleatoire le + grand possible
		if ($randFloat > $percent) # on cherche a savoir si le resultat de la division est superieur au pourcentage de modification du msg
		{
			$blurredMessage = $blurredMessage . $c; // on renvoi un caractere non-modifie pour remplacer le caractère d'avant
		}
		else // cas ou le resultat de la division est inferieur ou egal au pourcentage d'alteration du msg
		{
			$randIndex = rand (0, count ($blurredChars) - 1); # on choisit un caractere aleatoire de remplacement parmi la listre au dessus
			$blurredMessage = $blurredMessage . $blurredChars [$randIndex]; # on renvoi le msg avec le caractere altéré
		}
	}
	return $blurredMessage; # renvoi du msg altéré apres que chaque caractere a verifier si il doit etre alterer ou non
}