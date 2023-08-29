CREATE VIEW Exo1 AS SELECT name AS 'Catégorie' FROM category
// Liste les catégories 

SELECT name AS 'Catégorie' FROM category LEFT JOIN COUNT(film_id) ON category.category_id = film_category.category_id ;
SELECT name AS 'Catégorie' FROM category LEFT JOIN film_category AS 'Total' ON  ;