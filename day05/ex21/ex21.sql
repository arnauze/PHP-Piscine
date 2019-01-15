-- In a column named ’ft5’ display the phone_number’s MD5 of the distributor
-- with id 84. Before encripting it you’ll add 42 at the end of it and change any 7 into a 9
SELECT MD5(CONCAT('42', REPLACE(phone_number, '7', '9'))) AS ft5
FROM distrib
WHERE id_distrib = 84;