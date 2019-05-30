SELECT last_name, first_name
FROM user_card
WHERE
	last_name REGEXP '.+[- ].+'
	OR first_name REGEXP '.+[- ].+'
ORDER BY last_name, first_name;
