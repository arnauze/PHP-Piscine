-- Display all the distributors’ phone_number starting with ’05’ by removing the number
-- 0 before the 5 and by reverting the numbers, in a column named ’rebmunenohp’ (ex :
-- 0542842169 -> 961248245).
SELECT REVERSE(RIGHT(phone_number, LENGTH(phone_number) - 1)) AS rebmunenohp
FROM distrib
WHERE phone_number LIKE '05%';