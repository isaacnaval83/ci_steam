drop table if exists roles cascade;

create table roles(
  id   bigserial    constraint pk_roles primary key,
  nombre_rol  varchar(10)  not null constraint uq_roles_nombre unique
);

drop table if exists desarrolladores;

create table desarrolladores(
  id                     bigserial     constraint pk_desarrolladores primary key,
  nombre_desarrollador   varchar(50)   not null 
                                  constraint uq_desarrolladores_nombre unique
);

drop table if exists generos;

create table generos(
  id              bigserial   constraint pk_generos primary key,
  nombre_genero   varchar(20) not null constraint uq_generos_genero unique
);

drop table if exists sistemas_operativos(
  id        bigserial   constraint pk_sistemas_operativos primary key,
  nombre_so varchar(50) not null constraint uq_nombre_so unique
);

drop table if exists usuarios cascade;

create table usuarios(
  id        bigserial     constraint pk_usuarios primary key,
  nick      varchar(15)   not null constraint uq_usuarios_nick unique,
  password  char(32)      not null constraint ck_password_valida
                           check (length(password) = 32),
  email     varchar(32)   not null constraint ck_email_valido
                           check (email ~* '^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+[.][A-Za-z]+$'),
  rol_id    bigint        constraint fk_roles_id
                              references roles(id) on delete no action
                              on update cascade
);

drop table if exists juegos cascade;

create table juegos(
  id                bigserial     constraint pk_juegos primary key,
  titulo            varchar(40)   not null constraint uq_juegos_titulo unique,
  desarrollador_id  bigint        constraint fk_desarrolladores_id
                                    references desarrolladores(id) on delete
                                      no action
                                    on update cascade,
  descripcion       varchar(500)  not null,
  fecha_lanzamiento timestamp     not null default current_timestamp,
  precio            int           not null default 0
);

drop table if exists juegos_so;

create table juegos_so(
  so_id       bigint  constraint fk_sistemas_operativos_id
                        references sistemas_operativos(id)
                        on delete no action
                        on update cascade,
  juegos_id   bigint  constraint fk_juegos_id
                        references juegos(id)
                        on delete no action
                        on update cascade,

  constraint pk_juegos_so primary key (so_id, juegos_id)
);

drop table if exists biblioteca cascade;

create table biblioteca(
  usuarios_id  bigint  constraint fk_usuarios_id
                        references usuarios(id)
                        on delete no action
                        on update cascade,
  juegos_id   bigint  constraint fk_juegos_id
                        references juegos(id)
                        on delete no action
                        on update cascade,

  constraint pk_biblioteca primary key (usuarios_id, juegos_id)
);

drop table if exists generos_juegos:

create table generos_juegos(
  generos_id  bigint  constraint fk_generos_id,
                        references generos(id)
                        on delete no action
                        on update cascade,
  juegos_id   bigint  constraint fk_juegos_id
                        references juegos(id)
                        on delete no action
                        on update cascade,
  constraint pk_generos_juegos primary key (generos_id, juegos_id)
);

drop table if exists fotos;

create table fotos(
  id        bigserial     constraint pk_fotos_id primary key,
  url       varchar(200)  not null constraint uq_fotos_url unique
  juegos_id bigint        constraint fk_juegos_id 
                            references juegos(id)
                            on delete no action
                            on update cascade
);

drop table if exists comentarios;

create table comentarios(
  id                bigserial     constraint pk_comentarios primary key,
  texto_comentario  varchar(500)  not null,
  juegos_id         bigint        constraint fk_juegos_id
                                    references juegos(id)
                                    on delete no action
                                    on update cascade,
  usuarios_id       bigint        constraint fk_usuarios_id
                                    references usuarios(id)
                                    on delete no action
                                    on update cascade,
  fecha             timestamp     not null default current_timestamp
);

drop table if exists noticias;

create table noticias(
  id              bigserial     constraint pk_noticias primary key,
  texto_noticia   varchar(1000) not null,
  fecha           timestamp     not null default current_timestamp
);
