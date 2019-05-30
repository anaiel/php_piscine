SELECT title Title, summary Summary, prod_year
FROM film
INNER JOIN genre ON film.id_genre = genre.id_genre
WHERE genre.name = 'erotic'
ORDER BY film.prod_year DESC; 
