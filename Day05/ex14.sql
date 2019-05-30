SELECT floor_number floor, sum(nb_seats) seats
FROM cinema
GROUP BY floor_number
ORDER BY sum(nb_seats) DESC;
