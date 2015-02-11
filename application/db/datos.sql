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
        values('/ci_steam/images/juegos/gtavcaratula.png', 1),
              ('/ci_steam/images/juegos/skyrimcaratula.png', 2),
              ('/ci_steam/images/juegos/candycrushcaratula.png', 3),
              ('/ci_steam/images/juegos/reddeadredemtioncaratula.png', 4),
              ('/ci_steam/images/juegos/farcrycaratula.png', 5);
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
        values('En Take-Two todavía no están satisfechos con las ventas de 
                  GTA V: “Hay mucho espacio todavía para crecer” ',
                'La editora de GTA V, Take-Two, ha emitido un comunicado al hilo
                  de la reciente noticia de las generosas ventas del título, que
                  ha alcanzado las 45 millones de copias vendidas en todo el 
                  mundo gracias al reciente lanzamiento de las versiones de 
                  nueva generación.

                  “Hay 45 millones de unidades vendidas, sí, pero todavía quedan 
                  miles de millones de personas en la tierra que no tienen el 
                  videojuego”, declaró Strauss Zelnick, principal ejecutivo de 
                  la editora. “Hay mucho espacio todavía para crecer”.',
                1, 
                to_timestamp('05 11 2014', 'DD MM YYYY')),
              ('Así sería un crossover entre Skyrim y LEGO', 
                'Los videojuegos de LEGO han afrontado muchas franquicias de 
                éxito, pero por ahora no les hemos visto sumergirse en la saga 
                The Elder Scrolls. El equipo de The Guildmaster Studio, en 
                cambio, ha pensado que esta sería una gran idea, y ha 
                presentado un vídeo en el que dan forma a semejante idea.

                Recrean, de hecho, la secuencia de introducción y primeros 
                minutos de The Elder Scrolls V: Skyrim con técnica stop-motion. 
                Se trata únicamente del primer episodio, y ya prometen un 
                segundo que se publicará próximamente.', 
                2,
                to_timestamp('10 11 2011', 'DD MM YYYY')),
              ('King graba el tema de Candy Crush Soda Saga con la Orquesta 
                Sinfónica de Londres en Abbey Road',
                'King, desarrolladores de Candy Crush Saga o Bubble Witch Saga, 
                ha grabado el nuevo tema de Candy Crush Soda Saga, y para ello 
                ha querido contar con los mejores músicos en el mejor estudio 
                de grabación posible. Eso les ha llevado a contratar a 65 
                músicos de la London Symphony Orchestra británica y grabarlos en
                 los estudios Abbey Road, el icónico lugar en el que los 
                 Beatles, entre otros, grabaron gran parte de sus discos.

                El compositor de King, Johan Holmstrom, ha comentado que 
                "la música grabada en Abbey Road eleva la experiencia de los 
                jugadores de Candy Crush Soda Saga y da vida a su música". 
                Según el músico de la orquesta sinfónica londinense, 
                Gareth Davies, "tener una banda sonora grabada por un grupo 
                real de músicos lleva Candy Crush Soda Saga al siguiente 
                nivel".', 3,
                to_timestamp('05 11 2014', 'DD MM YYYY')),
              ('Aumentan los rumores sobre una segunda entrega de Red Dead 
                Redemption ya en desarrollo',
                'Cuando se acercan fechas de grandes anuncios, como es el caso 
                de esta noche con los Game Awards siempre abundan los rumores, 
                aunque éste no está especialmente vinculado con este evento. 
                Hablamos de una información surgida a través de una fuente de 
                NeoGAF que ha recibido la aprobación de los moderadores, ya que 
                como el lector ya sabrá ahí no se publican rumores que no tengan
                 un mínimo de base.

              Se trata, en concreto, del usuario NoLoveForFailWheelDrive, que ha
               aireado su contacto con un miembro interno del personal de 
               Rockstar que le permite asegurar la existencia ya en desarrollo 
               de Red Dead Redemption 2.

              El juego, según él, estaría previsto para PlayStation 4 y Xbox 
              One, y estaría caracterizado por implementar una modalidad 
              cooperativa a la que sus responsables estarían prestando mucha 
              atención.

              Como es costumbre recomendamos cierta cautela con este tipo de 
              rumores, aunque cuando tienen una cierta base como es el de este 
              caso, nos vemos obligados a reflejarlos.', 4,
              to_timestamp('05 12 2014', 'DD MM YYYY')),
              ('Take Two sugiere que tendremos una nueva entrega de Red Dead 
                en el futuro',
              'Red Dead Redemption ha resultado ser sumamente rentable y exitoso
               para Take 2, pero curiosamente, a fecha de hoy, no se tiene 
               constancia oficial del desarrollo de una nueva entrega de esta 
               franquicia.

              Durante la conferencia de analistas Cowen & Company, ha estado 
              presente el director general de Take 2, Strauss Zelnick, hablando 
              de franquicias permanentes de la empresa, dejando la puerta 
              abierta al desarrollo de una nueva entrega de Red Dead.

              "Hemos lanzado una nueva franquicia de éxito cada año, y me 
              gustaría seguir haciendo lo mismo porque hablo de franquicias 
              permanentes, pero no todo van a ser sagas permanentes. Una de 
              nuestras franquicias, de forma eventual, perderá su lustre, 
              mientras que otras seguirán siendo permanentes", explica.

              El ejecutivo ha nombrado en concreto a las franquicias 
              Borderlands, GTA y Red Dead como IPs permanentes: "de forma 
              concreta te puedo decir cuáles son permanentes. Es obvio que 
              GTA es una de estas franquicias siempre permanentes, y más cuando 
              sigamos ofreciendo esta increíble calidad. Pero también parece 
              obvio que Red Dead es otra franquicia permanente, con la misma 
              salvedad, y también otras como Borderlands o NBA 2K".

              Con la reciente salida de Grand Theft Auto V y el anuncio de 
              Borderlands: The Pre-Sequel, parecería lógico pensar que el 
              próximo anuncio de una franquicia permanente podría ser el de 
              una nueva entrega de Red Dead.', 4,
              to_timestamp('30 05 2014', 'DD MM YYYY'));
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