-- Display in a column named ’average’ the average number (rounded up to the nearest
-- unit) of seats in each cinema
SELECT ROUND(AVG(nb_seats))
FROM cinema;