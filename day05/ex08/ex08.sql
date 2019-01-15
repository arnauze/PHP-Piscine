-- Display the last_name, first_name and birthdate (only the date, not the time)
-- from the table user_card in a column named ’birthdate’ of everyone born in 1989,
-- or- dered alphabetically by last_name.
SELECT first_name, last_name, DATE(birthdate) AS birthdate
FROM user_card
WHERE YEAR(birthdate) = 1978
ORDER BY last_name ASC;