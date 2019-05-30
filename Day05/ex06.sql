SELECT title, summary
FROM film
WHERE lower(summary) REGEXP '.*vincent.*'
ORDER BY id_film ASC;
