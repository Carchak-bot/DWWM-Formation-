<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post">
        <input name="arret" type="text" placeholder="Nom de l'arrêt" value="" required>
        <br>
        <button type="submit">Soumettre</button>
    </form>
    <br>
    <br>
    <?php
        // Calcul de l'heure de ses morts
        $heurequejeveux=array();
        $duree = 0;
        $dt = time();
        print time();
        print "<br>";
        print "<br>";
        echo date( "Y-m-dTH:i:s+2:00", $dt);
        print "<br>";
        print "<br>";

        // Ouvrir 3 csv et les lire en même temps pour comparer des infos
        if (isset($_POST["arret"])==true) {
            if ((($handle1 = fopen("horaires-theoriques-et-arrets-du-reseau-irigo-gtfs.csv", "r")) !== FALSE) &&
            (($handle3 = fopen("bus-tram-circulation-passages.csv", "r")) !== FALSE) ) {
                while (($dataBusTramCirculationPassages = fgetcsv($handle3, 50000, ";")) !== FALSE) {
                // Le nom de la ligne, son code, sa destination

                    if ($_POST["arret"]==$dataBusTramCirculationPassages[14]) {
                        /* print "Ligne : ";
                        print "<b>";
                        print $dataBusTramCirculationPassages[9];
                        print "</b>";
                        print " ";
                        print "<i>";
                        print $dataBusTramCirculationPassages[1];
                        print "</i>";
                        print " en direction de ";
                        print "<b>";
                        print $dataBusTramCirculationPassages[10];
                        print "</b>";
                        print " à l'arrêt numéro : ";
                        print "<i>";
                        print $dataBusTramCirculationPassages[15];
                        print "</i>";
                        print "<br>";
                        print "Il arrivera vers : ";
                        print $dataBusTramCirculationPassages[4];
                        print "<br>";
                        print "<br>"; */
                    }
                }
            }
            if (($handle = fopen("https://data.angers.fr/api/explore/v2.1/catalog/datasets/bus-tram-circulation-passages/exports/csv?lang=fr&timezone=Europe%2FBerlin&use_labels=true&delimiter=%3B", "r")) !== FALSE) {
				$min=100000;
				$prochain=0;
				while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
					if ($_POST["arret"]==$data[14]) {
						$duree=strtotime($data[3])-time();
						if ($duree>0) {
							if ($duree<$min) {
								$min=$duree;
								$prochain=strtotime($data[3]);
							}
							
						}
						
					}
				}
				print date("d/m/Y H:i:s",$prochain);
				fclose($handle);
			}
                while (($dataHorairesTheoriquesEtArretsDuReseauIrigoGTFS = fgetcsv($handle1, 50000, ";")) !== FALSE) {
                    if ($_POST["arret"] == $dataHorairesTheoriquesEtArretsDuReseauIrigoGTFS[2]) {
                        // Partie pour handicapage
                        print "Adaptée Handicapé : <br>";
                        print "Arrêt numéro : ";
                        print $dataHorairesTheoriquesEtArretsDuReseauIrigoGTFS[1];
                        print "<br>";
                        if ($dataHorairesTheoriquesEtArretsDuReseauIrigoGTFS[10] == 1) {
                            print "Oui";
                        } else {
                            print "Non";
                        }
                        print "<br>";
                        print "<br>";
                    }
                }
            }
    ?>
</body>
</html>