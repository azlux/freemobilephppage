<!DOCTYPE html>
<html>
<head>
    <title>hach hash sha</title>
    <meta charset="utf-8"/>
    <style>
    #center {
		margin-top: 100px;
    }
	#center form {
		margin: auto;
		width: 300px;
	}

    </style>
</head>
<body>
<div id="center">
<?php
if (!empty($_POST['pass'])) {
	echo hash('sha512', $_POST['pass']);
}
else {
	echo '
	<form action="" method="POST" >
		<label for="pass" >Password to hash : </label>
		<input type="password" name="pass" id="pass" autocomplete="off"/> <br />
		<input type="submit" value="Hash moi ça en steack" />
	</form>
		';
}
?>
</div>
</body>
</html>