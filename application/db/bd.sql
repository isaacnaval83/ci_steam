drop table if exists roles cascade;

create table roles(
  id          bigserial    constraint pk_roles primary key,
  nombre_rol  varchar(10)  not null constraint uq_roles_nombre unique
);

drop table if exists desarrolladores cascade;

create table desarrolladores(
  id                     bigserial     constraint pk_desarrolladores primary key,
  nombre_desarrollador   varchar(50)   not null 
                                  constraint uq_desarrolladores_nombre unique
);

drop table if exists generos cascade;

create table generos(
  id              bigserial   constraint pk_generos primary key,
  nombre_genero   varchar(20) not null constraint uq_generos_genero unique
);

drop table if exists sistemas_operativos cascade;

create table sistemas_operativos(
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
                            on update cascade,
  valido    boolean       default false
);

drop table if exists validaciones_pendientes cascade;

create table validaciones_pendientes(
  usuarios_id bigint      constraint fk_usuarios
                            references usuarios(id)
                            on delete cascade
                            on update cascade,
  token       char(32)    constraint pk_validaciones_pendientes primary key
);

drop table if exists juegos cascade;

create table juegos(
  id                bigserial     constraint pk_juegos primary key,
  titulo            varchar(40)   not null constraint uq_juegos_titulo unique,
  desarrollador_id  bigint        constraint fk_desarrolladores_id
                                    references desarrolladores(id)
                                    on delete no action
                                    on update cascade,     
  caratula          bigint        ,
  descripcion       text          not null,
  fecha_lanzamiento timestamp     not null default current_timestamp,
  precio            int           not null default 0
);

drop table if exists juegos_so cascade;

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
  usuarios_id   bigint  constraint fk_usuarios_id
                          references usuarios(id)
                          on delete no action
                          on update cascade,
  juegos_id     bigint  constraint fk_juegos_id
                          references juegos(id)
                          on delete no action
                          on update cascade,
  fecha_compra  timestamp not null default current_timestamp,

  constraint pk_biblioteca primary key (usuarios_id, juegos_id)
);

drop table if exists generos_juegos cascade;

create table generos_juegos(
  generos_id  bigint  constraint fk_generos_id
                        references generos(id)
                        on delete no action
                        on update cascade,
  juegos_id   bigint  constraint fk_juegos_id
                        references juegos(id)
                        on delete no action
                        on update cascade,
  constraint pk_generos_juegos primary key (generos_id, juegos_id)
);

drop table if exists multimedia cascade;

create table multimedia(
  id              bigserial     constraint pk_multimedia_id primary key,
  url             varchar(200)  not null constraint uq_multimedia_url unique,
  juegos_id       bigint        constraint fk_juegos_id 
                                  references juegos(id)
                                  on delete no action
                                  on update cascade
);

 alter table juegos
  add constraint fk_juegos_multimedia_caratula
    foreign key (caratula)
    references multimedia(id);

drop table if exists comentarios cascade;

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

drop table if exists noticias cascade;

create table noticias(
  id              bigserial     constraint pk_noticias primary key,
  cabecera        varchar(100)  not null,
  texto_noticia   text          not null,
  juegos_id       bigint        constraint fk_juegos_id
                                    references juegos(id)
                                    on delete no action
                                    on update cascade,
  fecha           timestamp     not null default current_timestamp
);
