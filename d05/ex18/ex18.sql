SELECT name FROM distrib
WHERE (LENGTH(`name`) - LENGTH(REPLACE(lower(`name`), 'a', ''))) = 2
OR (id_distrib = 42 OR (id_distrib >= 62 AND id_distrib < 70) OR id_distrib = 71 OR (id_distrib >= 88 AND id_distrib < 91))
LIMIT 2,5;