<?php
function blur ($message, $percent)
{
	$blurredMessage = "";
	$blurredChars = array ("@", "&", "#", ";", "!", "*", "µ", "£", "$", "€", ",", "'", '"', "`", "~", "^", "à", "é", "ê", "â", "ù");
	foreach (str_split ($message) as $c)
	{
		$randFloat = rand () / getrandmax ();
		if ($randFloat > $percent)
		{
			$blurredMessage = $blurredMessage . $c;
		}
		else
		{
			$randIndex = rand (0, count ($blurredChars) - 1);
			$blurredMessage = $blurredMessage . $blurredChars [$randIndex];
		}
	}
	return $blurredMessage;
}