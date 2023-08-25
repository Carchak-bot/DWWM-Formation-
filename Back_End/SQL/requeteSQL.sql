SELECT libelle_region FROM `t_regions` LEFT JOIN t_continents ON (t_regions.continent_id=t_continents.id_continent) WHERE libelle_continent LIKE 'Europe';
SELECT libelle_pays FROM `t_pays` LEFT JOIN t_continents ON (t_pays.continent_id=t_continents.id_continent) WHERE libelle_continent LIKE 'Europe';
SELECT libelle_pays FROM `t_pays` LEFT JOIN t_regions ON (t_pays.region_id=t_regions.id_region) WHERE libelle_region LIKE 'Afrique Centrale';
SELECT COUNT(libelle_pays) FROM `t_pays` LEFT JOIN t_continents ON (t_pays.continent_id=t_continents.id_continent) WHERE libelle_continent LIKE 'Océanie';
SELECT COUNT(libelle_region) FROM `t_regions` LEFT JOIN t_continents ON (t_regions.continent_id=t_continents.id_continent) WHERE libelle_continent LIKE 'Asie';
SELECT COUNT(libelle_region) FROM `t_regions` LEFT JOIN t_continents ON (t_regions.continent_id=t_continents.id_continent) WHERE libelle_continent LIKE 'Amérique Septentrionale';

/* Tentatives fausses

SELECT libelle_continent, SUM(population_pays) FROM `t_pays` LEFT JOIN t_continents ON (t_pays.continent_id=t_continents.id_continent) WHERE libelle_continent LIKE 'Afrique';

SELECT libelle_continent, SUM(population_pays) FROM `t_pays` LEFT JOIN t_continents ON (t_continents.id_continent=t_pays.continent_id) WHERE libelle_continent; */


SELECT libelle_continent,SUM(population_pays) FROM t_pays LEFT JOIN t_continents ON (t_continents.id_continent=t_pays.continent_id) GROUP BY libelle_continent;

SELECT libelle_region, SUM(population_pays) FROM t_pays LEFT JOIN t_regions ON (t_regions.id_region=t_pays.region_id) GROUP BY libelle_region;

SELECT libelle_continent,SUM(population_pays) FROM t_pays LEFT JOIN t_continents ON (t_continents.id_continent=t_pays.continent_id) GROUP BY libelle_continent ORDER BY SUM(population_pays) DESC LIMIT 1;
SELECT libelle_continent AS 'Nom du continent',SUM(population_pays) AS 'Population du continent' FROM t_pays LEFT JOIN t_continents ON (t_continents.id_continent=t_pays.continent_id) GROUP BY libelle_continent ORDER BY SUM(population_pays) DESC LIMIT 1;

SELECT libelle_region AS 'Nom de région',SUM(population_pays) AS 'Population de la région' FROM t_pays LEFT JOIN t_regions ON (t_regions.id_region=t_pays.region_id) GROUP BY libelle_region ORDER BY SUM(population_pays) DESC LIMIT 1;

SELECT libelle_continent AS 'Nom du continent',SUM(population_pays) AS 'Population du continent' FROM t_pays LEFT JOIN t_continents ON (t_continents.id_continent=t_pays.continent_id) GROUP BY libelle_continent ORDER BY SUM(population_pays) LIMIT 1;

SELECT libelle_region AS 'Nom de région',SUM(population_pays) AS 'Population de la région' FROM t_pays LEFT JOIN t_regions ON (t_regions.id_region=t_pays.region_id) GROUP BY libelle_region ORDER BY SUM(population_pays) LIMIT 1;

SELECT libelle_pays AS 'Nom Pays',esperance_vie_pays AS 'Espérance de vie' FROM t_pays WHERE esperance_vie_pays=(SELECT MAX(esperance_vie_pays) FROM t_pays);

SELECT libelle_pays AS 'Nom Pays',taux_mortalite_pays AS 'Taux de mortalite' FROM t_pays WHERE taux_mortalite_pays=(SELECT MIN(taux_mortalite_pays) FROM t_pays);

SELECT libelle_pays AS 'Nom Pays',taux_natalite_pays AS 'Taux de natalite' FROM t_pays WHERE taux_natalite_pays=(SELECT MAX(taux_natalite_pays) FROM t_pays);

SELECT libelle_pays AS 'Nom Pays',nombre_enfants_par_femme_pays AS 'Enfants par femme' FROM t_pays WHERE nombre_enfants_par_femme_pays=(SELECT MAX(nombre_enfants_par_femme_pays) FROM t_pays);
