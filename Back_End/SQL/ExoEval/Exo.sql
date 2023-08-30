CREATE VIEW Exo1 AS SELECT name AS 'Catégorie' FROM category
// Liste les catégories 

                        EXO 1 

Final :
SELECT name AS "Catégorie", COUNT(film.film_id) AS "Nombre de films"
FROM category 
LEFT JOIN film_category ON (category.category_id=film_category.category_id) 
LEFT JOIN film ON (film_category.category_id=film.film_id) 
GROUP BY name;

// tout bon

                        EXO 2
Moi :
SELECT store_id AS 'Numéro de Magasin',name AS "Catégorie", COUNT(title) AS "Nombre de films"
FROM film
INNER JOIN film_category ON (film.film_id=film_category.film_id)
INNER JOIN category ON (category.category_id=film_category.category_id) 
INNER JOIN inventory ON (inventory.film_id=film.film_id)
GROUP BY store_id,name

// tout bon

                        EXO 3
Moi :
SELECT title AS "Titre du film", COUNT(actor_id) AS "Nombre d'acteurs"
FROM film
INNER JOIN film_actor ON (film.film_id=film_actor.film_id)
GROUP BY title;

// tout bon

                        EXO 4
Moi :
SELECT title AS "Titre du film", COUNT(rental.rental_id) AS "Nombre de locations"
FROM film
INNER JOIN inventory ON (film.film_id=inventory.film_id)
INNER JOIN rental ON (inventory.inventory_id=rental.inventory_id)
GROUP BY title
ORDER BY COUNT(rental_id) DESC LIMIT 10;

// tout bon

                        EXO 5
Moi :
SELECT store.store_id AS 'Numéro de Magasin',city AS "Ville", COUNT(customer_id) AS "Nombre de clients"
FROM store
INNER JOIN customer ON (store.store_id=customer.store_id)
INNER JOIN address ON (address.address_id=customer.address_id)
INNER JOIN city ON (city.city_id=address.city_id)
GROUP BY store.store_id

// tout bon

                        EXO 6
Moi :
SELECT store.store_id AS 'Numéro de Magasin', SUM(payment.amount) AS "Revenus des locations"
FROM store
LEFT JOIN staff ON (store.store_id = staff.store_id)
LEFT JOIN rental ON (staff.staff_id = rental.staff_id)
LEFT JOIN payment ON (rental.rental_id = payment.rental_id)
GROUP BY store.store_id

// bon chiffre

                        EXO 7
Moi :
SELECT customer.first_name AS 'Prénom', customer.last_name AS 'Nom', customer.email AS 'Courriel'
FROM customer
INNER JOIN address ON (customer.address_id=address.address_id)
INNER JOIN city ON (address.city_id=city.city_id)
INNER JOIN country ON (city.country_id=country.country_id)
WHERE country LIKE 'Canada' AND active=1

// tout bon