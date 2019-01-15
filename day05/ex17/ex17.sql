-- Display the number of offered suscribtion in a column named ’nb_susc’, as well
-- as the average subscription price, rounded to the unit (below) in a column named
-- ’av_susc’. There must be a third colum named ’ft’ displaying the sum of modulo 42
-- subscribtion lengths.
SELECT COUNT(*) as nb_susc, FLOOR(AVG(price)) AS av_susc, SUM(MOD(duration_sub, 42)) AS ft
FROM subscription;