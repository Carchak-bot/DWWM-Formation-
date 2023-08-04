<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
  </head>
  <body>
    <main>
      <header>
        <h1>Générateur de Voyage Warp pour la gamme FFG</h1>
      </header>
      <article>
        <form class="wrapper" action="voyage.php" method="POST">
          <div>
            <h4>Votre valeur de Force :</h4>
            <input type="text" name="s" placeholder="Force" />
            <input
              type="text"
              name="sSurnat"
              placeholder="Force surnaturelle"
            /><br />
            <h4>Votre valeur d'Endurance :</h4>
            <input type="text" name="t" placeholder="Endurance" />
            <input
              type="text"
              name="tSurnat"
              placeholder="Endurance surnaturelle"
            /><br />
            <h4>Votre valeur d'Intelligence :</h4>
            <input type="text" name="int" placeholder="Intelligence" />
            <input
              type="text"
              name="intSurnat"
              placeholder="Intelligence surnaturelle"
            /><br />
            <h4>Votre valeur de Perception :</h4>
            <input type="text" name="per" placeholder="Perception" />
            <input
              type="text"
              name="perSurnat"
              placeholder="Perception surnaturelle"
            /><br />
            <h4>Votre valeur de Force mentale :</h4>
            <input type="text" name="wp" placeholder="Force-mentale" />
            <input
              type="text"
              name="wpSurnat"
              placeholder="Force-mentale surnaturelle"
            /><br />
            <h4>Votre valeur de Sociabilité :</h4>
            <input type="text" name="soc" placeholder="Sociabilité" />
            <input
              type="text"
              name="socSurnat"
              placeholder="Sociabilité surnaturelle"
            /><br />
          </div>
          <div>
            <h4>Votre compétence de navigation Warp :</h4>
            <label for="navWarpT"></label>
            <input name="navWarp" type="radio" value="nawWarpT" required />
            Trained<br />
            <label for="navWarp+10"></label>
            <input name="navWarp" type="radio" value="navWarp+10" required />
            +10<br />
            <label for="navWarp+20"></label>
            <input name="navWarp" type="radio" value="navWarp+20" required />
            +20<br />
            <label for="navWarp+30"></label>
            <input name="navWarp" type="radio" value="navWarp+30" required />
            +30<br />
            <h4>Votre compétence de Psyniscience :</h4>
            <label for="psyniscienceT"></label>
            <input
              name="psyniscience"
              type="radio"
              value="psyniscienceT"
              required
            />
            Trained<br />
            <label for="psyniscience+10"></label>
            <input
              name="psyniscience"
              type="radio"
              value="psyniscience+10"
              required
            />
            +10<br />
            <label for="psyniscience+20"></label>
            <input
              name="psyniscience"
              type="radio"
              value="psyniscience+20"
              required
            />
            +20<br />
            <label for="psyniscience+30"></label>
            <input
              name="psyniscience"
              type="radio"
              value="psyniscience+30"
              required
            />
            +30<br />
            <h4>Champs de Geller endommagé ?</h4>
            <label for="gellarFieldDamaged"></label>
            <input
              name="gellarFieldDamaged"
              type="checkbox"
              value="yes"
            />
            Vrai<br />
            <h4>Moteur Warp endommagé ?</h4>
            <label for="warpEngineDamaged"></label>
            <input
              name="warpEngineDamaged"
              type="checkbox"
              value="yes"
            />
            Vrai<br />
            <h4>Y a t il un Navigateur à bord ( qui gère le test ) ?</h4>
            <label for="navigator"></label>
            <input
              name="navigator"
              type="checkbox"
              value="yes"
            />
            Oui<br />
            <h4>Est ce que le champs de Geller est éteins ?</h4>
            <label for="gellarFieldOffline"></label>
            <input
              name="gellarFieldOffline"
              type="checkbox"
              value="yes"
            />
            Oui<br />
          </div>
          <button type="submit">Voyager</button>
        </form>
      </article>
      <br />
    </main>
    <footer>
      <article>
        <h4>Fait par Carchak</h4>
      </article>
    </footer>
  </body>
</html>
