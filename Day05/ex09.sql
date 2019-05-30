SELECT count(*) `nb_short-films`
FROM film
INNER JOIN genre ON film.id_genre = genre.id_genre
WHERE
	genre.name = 'adventure'
	AND film.duration <= 42;
