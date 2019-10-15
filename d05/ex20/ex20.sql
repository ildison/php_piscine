SELECT G.id_genre, G.name AS name_genre, D.id_distrib, D.name AS name_distrib, F.title AS title_film
FROM film AS F
LEFT JOIN distrib AS D
ON D.id_distrib=F.id_distrib
LEFT JOIN genre AS G
ON F.id_genre=G.id_genre
WHERE G.id_genre BETWEEN 4 AND 8;