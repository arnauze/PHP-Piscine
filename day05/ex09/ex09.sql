-- Display the number of ’short films’ (with a duration
-- smaller or equal to 42) in a col- umn named ’nb_short-films’.
SELECT COUNT(*) AS 'nb_short-films' FROM film WHERE duration <= 42;