-- Display all the movies with an id_genre between 4 and 8 included.
-- The request will display the id_genre, the genre’s name, as well 
-- as the distributor’s id_distrib, the dis- tributor’s name as well
-- as the film’s title. You’ll therefore need the following columns
-- ’id_genre’, ’name_genre’, ’id_distrib’, ’name_distrib’ et ’title_film’.
-- The request must display the id_genre, the distributor’s id_distrib,
-- and the title even if you can’t find a genre’s name or a distributor’s name.
SELECT film.id_genre AS id_genre, genre.name AS name_genre, film.id_distrib AS id_distrib,
distrib.name AS name_distrib, film.title AS title_film FROM film
LEFT OUTER JOIN genre ON film.id_genre = genre.id_genre
LEFT OUTER JOIN distrib ON film.id_distrib = distrib.id_distrib
WHERE film.id_genre >= 4 && film.id_genre <= 8
ORDER BY film.id_genre;