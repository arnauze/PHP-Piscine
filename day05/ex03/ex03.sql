-- You’ll select the users with an ’a’ in their last_name from the table user_card. The selected
-- login must be copied only if their size is strictly less than 9 characters. You must order them
-- alphabetically in ascending order of their last_name and limit the number of copied users to 10.
-- The last_name and birthdate will serve as login and creation_date. You’ll insert these users in
-- the ’other’ group.
INSERT INTO ft_table (login, `group`, creation_date)
SELECT last_name, 'other', birthdate
FROM user_card
WHERE CHAR_LENGTH(last_name) < 9 AND last_name LIKE '%a%' ORDER BY last_name ASC LIMIT 10; 
