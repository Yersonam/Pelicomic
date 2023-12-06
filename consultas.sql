ALTER TABLE peliculas ADD COLUMN peli_img TEXT AFTER peli_dire_id

UPDATE peliculas SET peli_img = 'https://www.atb.com.bo/wp-content/uploads/2023/02/2023241026142_1.jpg'


SELECT 
    pel.peli_nombre,
    pel.peli_img,
    CONCAT(dir.dire_nombres, ' ', dir.dire_apellidos) AS director,
    pel.peli_restricciones
    FROM peliculas pel
        INNER JOIN directores dir ON pel.peli_dire_id = dire_id



ALTER TABLE directores ADD COLUMN dire_img TEXT AFTER dire_id
ALTER TABLE directores ADD COLUMN dire_nacionalidad TEXT AFTER dire_img
ALTER TABLE directores ADD COLUMN dire_fechNac TEXT AFTER dire_nacionalidad


UPDATE directores SET dire_img = 'https://upload.wikimedia.org/wikipedia/commons/thumb/2/26/Jon_Watts_by_Gage_Skidmore_2.jpg/1200px-Jon_Watts_by_Gage_Skidmore_2.jpg' WHERE dire_id = 1

UPDATE directores SET dire_img = 'https://dims.apnews.com/dims4/default/f05274a/2147483647/strip/false/crop/3000x3965+0+0/resize/1124x1486!/quality/90/?url=https%3A%2F%2Fstorage.googleapis.com%2Fafs-prod%2Fmedia%2F36ced43a20dd40c18046686fd08d8d08%2F3000.jpeg' WHERE dire_id = 2

UPDATE directores SET dire_img = 'https://upload.wikimedia.org/wikipedia/commons/f/fe/James_Cameron_by_Gage_Skidmore.jpg' WHERE dire_id = 3

UPDATE directores SET dire_img = 'https://m.media-amazon.com/images/M/MV5BNjE3NDQyOTYyMV5BMl5BanBnXkFtZTcwODcyODU2Mw@@._V1_FMjpg_UX1000_.jpg' WHERE dire_id = 4

UPDATE directores SET dire_img = 'https://images.mubicdn.net/images/cast_member/1157/cache-5160-1454013789/image-w856.jpg' WHERE dire_id = 5

UPDATE directores SET dire_img = 'https://upload.wikimedia.org/wikipedia/commons/thumb/4/4a/Peter_Jackson_SDCC_2014.jpg/1200px-Peter_Jackson_SDCC_2014.jpg' WHERE dire_id = 6

UPDATE directores SET dire_nacionalidad = 'Estadounidense'

UPDATE directores SET dire_fechNac = '1981-06-28'


SELECT
    pel.peli_dire_id,
    dir.dire_id,
    dir.dire_img,
    dir.dire_nacionalidad,
    dir.dire_fechNac,
    CONCAT(dir.dire_nombres, ' ', dir.dire_apellidos) AS director
    FROM directores dir
        LEFT JOIN peliculas pel ON  pel.peli_dire_id = dire_id