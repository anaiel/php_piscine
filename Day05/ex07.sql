SELECT title, summary
FROM film
WHERE
	title REGEXP '.*42.*'
	OR summary REGEXP '.*42.*'
ORDER BY duration ASC;
