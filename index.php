<!DOCTYPE html>
<html>
<head>
    <title>Azlux's SMS</title>
    <link rel="stylesheet" href="apifree.css" />
    <meta charset="utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1" />
</head>
<body>
	<?php
	$all_pass = array("76ea49d7966dab8f0373c0bf6108132cfeb73d9d34fb55011318bae56072fc51212a27500e0232c50a684fb24ce04984e7d5a0ec63d0c02f647e7369c125b24d" => "Azlux");
	if (!empty($_POST["sms"]) && !empty($_POST["password"])) {
		$sha_pass = hash('sha512', $_POST["password"]);
		if (array_key_exists($sha_pass,$all_pass)) {
			$message = "sms de " . $all_pass[$sha_pass] . " : " . $_POST["sms"];
			
		$url = 'https://smsapi.free-mobile.fr/sendmsg?';
		$access = "user=*******&pass=**********&msg=";

			$headers = get_headers($url.$access.urlencode($message));

			$http_code = substr($headers[0], 9, 3);
			if ($http_code == 200) {
				echo "<div class='center gr'> Le message \"  " . $_POST["sms"] . "  \" vient d'être envoyé.<br/>Retour dans 6s !</div><meta http-equiv=\"refresh\" content=\"6; URL='https://azlux.fr.nf/sms/'\" />";
			}
			elseif ($http_code == 400 || $http_code == 403) {
				echo  "<div class='center re'>Un parametre est manquant, veuillez contacter l'administrateur qui à mal fait son boulot.</div>";
			}
			elseif ($http_code == 402) {
				echo "<div class='center re'>Trop de SMS ont été envoyés en trop peu de temps. T'aurais pas un PEU exagéré là ?</div>";
			}
			elseif ($http_code == 500) {
				echo "<div class='center re'>Il y a un pb mais c'est pas ma faute promis !</div>";
			}
			else {
				echo "<div class='center re'>sms non envoyé, mais je sais pas pourquoi !</div>";
			}
		}
		else {
			echo "<div class='center re'>Mauvais mot de passe ! Dommage, tu n'auras pas la joie de contacter le <i>beau</i> Azlux</div>";
		}
	}
	else {
	?>
	<div class="carte">
	<table align="center" valign="MIDDLE">
		<caption>
			<h1>Contacte le grand<br/>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Azlux !</h1>
		</caption>
		<tr>
			<td>
				<form action="" method="POST" >
						<label for="pass">Password : </label>
						<input id="pass" type="password" name="password" /> <br />
						<label for="sms">Contenu du sms:</br></label>
					<div class="message">
						<textarea  name="sms" rows="6" cols="40" id="sms"></textarea> <br />
					</div>
					<div class="envoyer">
						<input type="submit" value="Envoyer le sms au Azlux" />
					</div>
				</form>
			</td>
		</tr>
	</table>
	</div>
<?php
}
?>
</body>
</html>
