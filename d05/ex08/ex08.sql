SELECT `last_name`, `first_name`, DATE(`birthdate`) AS `birthdate`
FROM `user_card`
WHERE DATE_FORMAT(`birthdate`, '%Y') = 1983
ORDER BY last_name;