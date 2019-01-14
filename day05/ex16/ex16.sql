-- Display the total number of movies watched between 10/30/2006 and 07/27/2007 in
-- a column named ’movies’ counting also the number of movies watched on Christmas Eve
-- (December 24th every year).
SELECT (COUNT(*)) AS movies
FROM member_history
WHERE DATE(`date`) > '2006-10-30' AND DATE(`date`) < '2007-07-27'
OR MONTH(`date`) = 12 AND DAY(`date`) = 24;