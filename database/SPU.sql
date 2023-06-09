USE superhero;

SELECT * FROM superhero; -- 750
SELECT * FROM gender;
SELECT * FROM race;
SELECT * FROM gender;
SELECT * FROM alignment;


DELIMITER $$
CREATE PROCEDURE spu_superhero_list(IN _publisher_id INT)
BEGIN
	SELECT 
		superhero.id,
		superhero.`superhero_name`,
		superhero.`full_name`,
		gender.`gender`,
		c1.`colour` 'eye_colour',
		c2.`colour` 'hair_colour',
		c3.`colour` 'skin_colour',
		race.`race`,
		publisher.`publisher_name`,
		alignment.`alignment`,
		superhero.`height_cm`,
		superhero.`weight_kg`
		FROM superhero
		INNER JOIN gender ON gender.id = superhero.gender_id
		INNER JOIN colour c1 ON c1.id = superhero.eye_colour_id
		INNER JOIN colour c2 ON c2.id = superhero.hair_colour_id
		INNER JOIN colour c3 ON c3.id = superhero.skin_colour_id
		LEFT JOIN race ON race.id = superhero.race_id
		LEFT JOIN publisher ON publisher.`id` = superhero.`publisher_id`
		LEFT JOIN alignment ON alignment.`id` = superhero.`alignment_id`
		WHERE superhero.`publisher_id` = _publisher_id
		ORDER BY superhero.id;
END $$

CALL spu_superhero_list(1);

SELECT * FROM publisher;

DELIMITER $$
CREATE PROCEDURE spu_filtrar_superheros
(
	IN _race_id 			INT, 
	IN _gender_id			INT,
	IN _alignment_id 	INT
)
BEGIN
	SELECT 
		superhero.`id`,
		superhero.`superhero_name`,
		c1.colour 'hair_colour',
		publisher.`publisher_name`,
		superhero.`weight_kg`,
		race.`race`,
		gender.`gender`,
		alignment.`alignment`
	FROM superhero
		INNER JOIN colour c1 ON c1.`id`=superhero.`hair_colour_id`
		LEFT JOIN publisher ON publisher.`id` = superhero.`publisher_id`
		LEFT JOIN race ON race.id=superhero.`race_id`
		INNER JOIN gender ON gender.`id`= superhero.`gender_id`
		LEFT JOIN alignment ON alignment.`id`= superhero.`alignment_id`
		WHERE race.`id` = _race_id AND gender.`id`=_gender_id AND alignment.`id`= _alignment_id;
END $$
	

CALL spu_filtrar_superheros(1,1,1);

SELECT * FROM superhero WHERE race_id = 1 AND gender_id = 1 AND alignment_id = 1;


DELIMITER $$
CREATE PROCEDURE spu_superhero_graphic()
BEGIN
	SELECT 	alignment.`id`, 
				alignment.`alignment`, 
				COUNT(*) 'amount'
		FROM superhero
		LEFT JOIN alignment ON `alignment`.`id` = superhero.`alignment_id`
		GROUP BY alignment.`id`, alignment.`alignment`;
END $$
	
SELECT * FROM superhero WHERE alignment_id IS NULL


-- GRAFICOS EJERCICIOS
-- GRAFICO 1
DELIMITER $$
CREATE PROCEDURE spu_superhero_grafico01(IN _publisher_id INT)
BEGIN
	SELECT  	alignment.`id`, 
				alignment.`alignment`, 
				COUNT(*) 'amount'
		FROM superhero
		LEFT JOIN alignment ON `alignment`.`id` = superhero.`alignment_id`
		WHERE superhero.`alignment_id` IN ('1', '2') AND superhero.`publisher_id` = _publisher_id
		GROUP BY alignment.`id`, alignment.`alignment`;
END $$

CALL spu_superhero_grafico01(4)

-- GRAFICO 2
DELIMITER $$
CREATE PROCEDURE spu_superhero_grafico02()
BEGIN
	SELECT 	superhero.`publisher_id`,
		publisher.`publisher_name`,
		superhero.`eye_colour_id`,
		colour.`colour`, 
	COUNT(*) AS 'amount'
	FROM superhero
	LEFT JOIN colour ON colour.`id` = superhero.`eye_colour_id`
	LEFT JOIN publisher ON publisher.`id` = superhero.`publisher_id`
	WHERE publisher.`publisher_name` IN ('DC Comics', 'Marvel Comics')
	GROUP BY publisher.`publisher_name`, superhero.`eye_colour_id`
	ORDER BY 4, 2 DESC;
END $$

CALL spu_superhero_grafico02();

-- GRAFICO 3
DELIMITER $$
CREATE PROCEDURE spu_superhero_grafico03()
BEGIN 
	SELECT 	superhero.`publisher_id`, 
		publisher.`publisher_name`, 
		alignment.`alignment`,
		COUNT(alignment.`id`) 'amount'
		FROM superhero
		LEFT JOIN publisher ON publisher.`id` = superhero.`publisher_id`
		LEFT JOIN alignment ON alignment.`id` = superhero.`alignment_id`
		WHERE publisher.`id` IN ('2', '5', '11', '18', '24')
		GROUP BY publisher.`publisher_name`, alignment.`alignment`
		ORDER BY publisher.`id`, `alignment`.`id`;
END $$

CALL spu_superhero_grafico03();

-- GRAFICO 4
DELIMITER $$
CREATE PROCEDURE spu_superhero_grafico04()
BEGIN
	SELECT 	alignment.`id`,
		alignment.`alignment`,
		gender.`gender`,
		COUNT(*) 'amount'
		FROM superhero
		INNER JOIN gender ON gender.`id` = superhero.`gender_id`
		LEFT JOIN alignment ON alignment.`id` = superhero.`alignment_id`
		GROUP BY alignment.`id`, alignment.`alignment`, gender.`gender`
		ORDER BY superhero.`alignment_id`, superhero.`gender_id`;
END $$

CALL spu_superhero_grafico04();

-- GRAFICO 5
DELIMITER $$
CREATE PROCEDURE spu_superhero_grafico05()
BEGIN
	SELECT race.`id`, race.`race`, COUNT(*) 'amount' 
		FROM superhero
		LEFT JOIN race ON race.`id` = superhero.`race_id`
		GROUP BY race.`id`, race.`race`;
END $$


SELECT * FROM superhero WHERE alignment_id IS NULL AND gender_id = 3

SELECT * FROM superhero WHERE gender_id = 3
SELECT * FROM race