-- Display the title in a ’Title’ column, the summary in a ’Summary’ column
-- and the prod_year of every ’erotic’ movie ordered by descending production year.
SELECT title AS Title, summary AS Summary, prod_year
FROM film
INNER JOIN genre ON film.id_genre = genre.id_genre
WHERE genre.name='erotic'
ORDER BY prod_year DESC; 