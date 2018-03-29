create table compania(
id integer auto_increment primary key,
nombre varchar(50)
);
create table tecnico(
id integer auto_increment primary key,
nombre varchar(50)
);

create table maquina(
id integer auto_increment primary key,
nombre varchar(50)
);

create table servicio_mantenimiento(
id integer auto_increment primary key,
fecha timestamp default CURRENT_TIMESTAMP,
hora_ingreso time,
hora_salidas time,
codigo varchar(20),
revision varchar(20),
firma_jefe_planta text,
firma_invetsa text,
id_maquina integer,
id_tecnico integer,
id_compania integer,
foreign key (id_maquina)references maquina(id),
foreign key(id_tecnico)references tecnico(id),
foreign key(id_compania)references compania(id)
);


create table inspeccion_visual(
id integer auto_increment primary key,
observaciones text,
piesas_cambiadas text,
id_servicio integer,
foreign key(id_servicio)references servicio_mantenimiento(id)
);


create table detalle_inspeccion_visual(
id integer auto_increment,
id_inspeccion integer,
codigo_sistema varchar(10),
codigo_proveedor varchar(10),
descripcion text,
estado tinyint,
primary key(id,id_inspeccion),
foreign key(id_inspeccion) references inspeccion_visual(id)
);

create table inspeccion_funcionamiento(
id integer auto_increment primary key,
observaciones text,
frecuencia_de_uso text,
id_servicio integer,
foreign key(id_servicio)references servicio_mantenimiento(id)
);


create table detalle_inspeccion_funcionamiento(
id integer auto_increment,
id_inspeccion integer,
criterio_evaluacion text,
estado tinyint,
primary key(id,id_inspeccion),
foreign key(id_inspeccion) references inspeccion_funcionamiento(id)
);

create table limpieza(
id integer auto_increment primary key,
observaciones text,
cantidad_aves_vacunadas text,
id_servicio integer,
foreign key(id_servicio)references servicio_mantenimiento(id)
);


create table detalle_limpieza(
id integer auto_increment,
id_inspeccion integer,
criterio_evaluacion text,
estado tinyint,
primary key(id,id_inspeccion),
foreign key(id_inspeccion) references limpieza(id)
);

