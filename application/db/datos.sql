--------------------------------------------------------------------------ROLES
insert into roles (nombre_rol)
          values('admin'), ('usuario');
----------------------------------------------------------------------FIN ROLES

----------------------------------------------------------------DESARROLLADORES
insert into desarrolladores (nombre_desarrollador)
          values('Techland'), ('Rockstar'), ('Valve'), ('Bethesda'), 
                ('Id Software'), ('UbiSoft'), ('King Games');
------------------------------------------------------------FIN DESARROLLADORES

------------------------------------------------------------------------GENEROS
insert into generos (nombre_genero)
          values('Rol'), ('Acción'), ('Multijugador'), ('Aventuras'), 
                ('Plataformas'), ('Indie'), ('Ocasional'), ('Estrategia'), 
                ('Deportes');
--------------------------------------------------------------------FIN GENEROS

------------------------------------------------------------SISTEMAS OPERATIVOS
insert into sistemas_operativos (nombre_so)
          values('Windows'), ('MacOS'), ('SteamOS');
--------------------------------------------------------FIN SISTEMAS OPERATIVOS

-----------------------------------------------------------------------USUARIOS
insert into usuarios(nick, password, email, rol_id, valido)
          values('admin', md5('admin'), 'admin@admin.com', 1, true),
                ('farlopio', md5('farlopio'), 'farlopio@farlopio.com', 2, true),
                ('pepe', md5('pepe'), 'pepe@pepe.com', 2, true),
                ('juan', md5('juan'), 'juan@juan.com', 2, false),
                ('maria', md5('maria'), 'maria@maria.com', 2, false),
                ('antuan', md5('antuan'), 'antuan@antuan.com', 2, true);                
-------------------------------------------------------------------FIN USUARIOS

-------------------------------------------------------------------------JUEGOS
insert into juegos(titulo, desarrollador_id, descripcion, fecha_lanzamiento,
                   precio, destacado)
          values('GTA V', 2, 'Juego mu chulo de matar', 
              to_timestamp('05 11 2014', 'DD MM YYYY'), 60, true),
                ('Skyrim', 4, 'Maravilla de la tecnología',
              to_timestamp('11 11 2011', 'DD MM YYYY'),40, false),
                ('Candy Crush Online', 7, 'omg mac',
              to_timestamp('05 07 2014', 'DD MM YYYY'), 2, true),
                ('Red Dead Redemption', 2, 'Sandbox ambientado en el lejano Oeste', 
                to_timestamp('05 05 2013', 'DD MM YYYY'), 39, true),
                ('Far Cry', 6, 'Videojuego de disparos en primera persona', 
                to_timestamp('05 05 2004', 'DD MM YYYY'), 14, false);
---------------------------------------------------------------------FIN JUEGOS

----------------------------------------------------------------------JUEGOS_SO
insert into juegos_so(so_id, juegos_id)
        values(1,1), (2,1), (3,1),
              (1,2), (3,2),
              (2,3),
              (1,4), (2,4), (3,4),
              (1,5), (2,5);
------------------------------------------------------------------FIN JUEGOS_SO

---------------------------------------------------------------------BIBLIOTECA
insert into biblioteca(usuarios_id, juegos_id, fecha_compra)
        values(2, 1, to_timestamp('06 11 2014', 'DD MM YYYY')),
              (3, 3, to_timestamp('06 11 2004', 'DD MM YYYY')),
              (4, 4, to_timestamp('06 06 2013', 'DD MM YYYY'));
-----------------------------------------------------------------FIN BIBLIOTECA

-----------------------------------------------------------------GENEROS_JUEGOS
insert into generos_juegos(generos_id, juegos_id)
        values(2, 1), (3, 1), (4, 1),
              (1, 2), (4, 2),
              (7, 3),
              (1, 4), (2, 4), (3, 4), (4, 4),
              (1, 5), (2, 5), (3, 5), (4, 5);
-------------------------------------------------------------FIN GENEROS_JUEGOS

---------------------------------------------------------------------MULTIMEDIA
insert into multimedia(url, juegos_id)
        values('/images/juegos/gtavcaratula.png', 1),
              ('/images/juegos/skyrimcaratula.png', 2),
              ('/images/juegos/candycrushcaratula.png', 3),
              ('/images/juegos/reddeadredemtioncaratula.png', 4),
              ('/images/juegos/farcrycaratula.png', 5);
-----------------------------------------------------------------FIN MULTIMEDIA

------------------------------------------------------------------- COMENTARIOS
insert into comentarios(texto_comentario, juegos_id, usuarios_id, fecha)
        values('buah cohone wapizimo', 1, 2, 
              to_timestamp('06 12 2014', 'DD MM YYYY')),
              ('Como se sale de Helgen?', 2, 3,
              to_timestamp('12 11 2014', 'DD MM YYYY')),
              ('iraaa... si no sale indios ni na', 2, 4, 
              to_timestamp('03 10 2013', 'DD MM YYYY'));
----------------------------------------------------------------FIN COMENTARIOS

-----------------------------------------------------------------------NOTICIAS
insert into noticias(cabecera, texto_noticia, juegos_id, fecha)
        values('Salió el GTA V ', 'El GTA V salió', 1, 
                to_timestamp('05 11 2014', 'DD MM YYYY')),
              ('Skyrim sale mañana', 'Sale mañana Skyrim', 2,
                to_timestamp('10 11 2011', 'DD MM YYYY'));
-------------------------------------------------------------------FIN NOTICIAS

-------------------------------------------------------------------VALIDACIONES
insert into validaciones_pendientes(usuarios_id, token)
        values(4, md5('juan@juan.com'   || (floor(random() * 1000)))),
              (5, md5('maria@maria.com' || (floor(random() * 1000))));
---------------------------------------------------------------FIN VALIDACIONES

--UPDATES
update juegos set caratula = 1 where id = 1;

update juegos set caratula = 2 where id = 2;

update juegos set caratula = 3 where id = 3;

update juegos set caratula = 4 where id = 4;

update juegos set caratula = 5 where id = 5;