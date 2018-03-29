
-- scrip de Sistema integral de monitoreo.
create table empresa(
id integer primary key,
nombre varchar(50)
); 

create table granja (
id integer auto_increment,
id_empresa integer,
zona text,
primary key(id,id_empresa),
foreign key(id_empresa)references empresa(id)
);

create table galpon(
id integer auto_increment,
id_empresa integer,
id_granja integer,
cantidad_pollo integer,
primary key(id,id_granja,id_empresa),
foreign key(id_granja,id_empresa)references granja(id,id_empresa)
);

create table sistema_integral(
id integer auto_increment primary key,
codigo varchar(20),
revision varchar(20),
edad integer,
sexo varchar(1),
observaciones text,
imagen1 text,
imagen2 text,
imagen3 text,
imagen4 text,
imagen5 text
);

create table puntuacion(
id integer auto_increment primary key,
nombre varchar(50),
id_sistema integer,
foreign key(id_sistema)references sistema_integral(id)
);

create table detalle_puntuacion(
id integer auto_increment,
nombre varchar(50),
estado tinyint,
id_puntuacion integer,
primary key(id,id_puntuacion),
foreign key(id_puntuacion) references puntuacion(id)
);


create table peso(
id integer auto_increment primary key,
peso_corporal decimal(2,2),
pedo_bursa decimal(2,2),
peso_brazo decimal(2,2),
peso_timo decimal(2,2),
peso_higado decimal(2,2),
indice_bursal decimal(4,2),
indice_timico decimal(4,2),
indice_hepatico decimal(4,2),
bursometro decimal(4,2),
id_sistema integer,
foreign key(id_sistema)references sistema_integral(id)

);




