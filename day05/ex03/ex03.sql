INSERT INTO other (login,creation_date)
SELECT last_name,birthdate
FROM user_card
WHERE CHAR_LENGTH(last_name='%a%') < 9 ORDER BY last_name ASC LIMIT 10; 