<!DOCTYPE html> 
<html lang="fr"> 
    <head>
        <meta charset="utf-8">
        <title>Formulaire</title>
    </head>
    <body> 
		<!-- action : où on l'envoit si vide même fichier -->
		<!-- method : méthode d'envoi par défaut GET, valeurs possibles : GET,POST -->
		<form action="recup.php" method="POST">
			<input type="text" pattern="[A-Za-z]{3}" title="Minimum trois caractères" name="nom" placeholder="Votre Nom" required><br>
			<input type="email" name="email" placeholder="Votre email"><br>
			<input type="password" name="pass">
			Votre choix :
			Html : <input name="pref" type="checkbox" value="html">
			Css : <input name="pref" type="checkbox" value="css">
			<br>
			<label for="homme">Homme:</label><input id="homme" name="genre" type="radio" value="homme">
			<label for="femme">Femme:</label><input id="femme" name="genre" type="radio" value="femme" checked>
			<input name="couleur" type="color">
			<input type="date">
			<input type="datetime-local">
			<input type="file">
			<input type="range">
			<input type="number">
			<textarea></textarea>
			<select>
				<option value="chef">Chef de projet</option>
				<option value="dev" selected>Développeur</option>
			</select>
			
			
			<!-- html 4 -->
			<!-- Compliqué à stylisé surtout le contenu textuel -->
			<input type="submit" value="Envoyer">
			<input type="button" value="Sans soumission">
			<!-- html 5 -->
			<button type="submit">Envoyer</button>
			<button type="button">Sans soumission</button>
			
		</form>
	
	</body>
</html>