SELECT `title` as `Title`, `summary` as `Summary`, prod_year FROM `film` f, `genre` g
	WHERE f.id_genre=g.id_genre AND g.name='erotic'
		ORDER BY prod_year DESC;