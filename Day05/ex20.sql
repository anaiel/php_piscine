SELECT
	film.id_genre id_genre,
	genre.name name_genre,
	film.id_distrib id_distrib,
	distrib.name name_distrib,
	film.title title_film
FROM film
LEFT JOIN genre ON film.id_genre = genre.id_genre
LEFT JOIN distrib ON film.id_distrib = distrib.id_distrib
WHERE film.id_genre >= 4 AND film.id_genre <= 8 
