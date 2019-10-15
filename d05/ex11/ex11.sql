SELECT UPPER(u.last_name) AS NAME, u.first_name, S.price
FROM user_card AS u
INNER JOIN `member` AS M
ON id_user=M.id_user_card
INNER JOIN subscription AS S
ON S.id_sub=M.id_sub
WHERE S.price > 42
ORDER BY u.last_name, u.first_name;
