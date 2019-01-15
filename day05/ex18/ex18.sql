-- Display the distributors who have the following id_distrib 42, 62, 63, 64, 65, 66, 67,
-- 68, 69, 71, 88, 89 and 90 as well as distibutors with ’y’ or ’Y’ twice in their name. The
-- final list will be a sample of 5 results starting at the third result.
SELECT * FROM distrib
WHERE (id_distrib = 42
OR (id_distrib > 61 AND id_distrib < 70)
OR id_distrib = 71
OR (id_distrib > 87 AND id_distrib < 91)
OR name LIKE '%y%y%' OR name LIKE '%Y%Y%')
LIMIT 3, 5;