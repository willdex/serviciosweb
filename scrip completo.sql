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
id_sqlite integer,
imei varchar(18),
foreign key (id_maquina)references maquina(id),
foreign key(id_tecnico)references tecnico(id),
foreign key(id_compania)references compania(id)
);


create table inspeccion_visual(
id integer not null,
observaciones text,
piesas_cambiadas text,
id_servicio integer,
imei varchar(18),
primary key(id,id_servicio),
foreign key(id_servicio)references servicio_mantenimiento(id)
);


create table detalle_inspeccion_visual(
id integer auto_increment,
id_inspeccion integer,
codigo varchar(10),
descripcion text,
estado tinyint,
imei varchar(18),
id_servicio integer,
primary key(id,id_inspeccion,id_servicio),
foreign key(id_inspeccion,id_servicio) references inspeccion_visual(id,id_servicio)
);

create table inspeccion_funcionamiento(
id integer ,
observaciones text,
frecuencia_de_uso text,
id_servicio integer,
imei varchar(18),
primary key(id,id_servicio),
foreign key(id_servicio)references servicio_mantenimiento(id)
);


create table detalle_inspeccion_funcionamiento(
id integer auto_increment,
id_inspeccion integer,
criterio_evaluacion text,
estado tinyint,
imei varchar(18),
id_servicio integer,
primary key(id,id_inspeccion,id_servicio),
foreign key(id_inspeccion,id_servicio) references inspeccion_funcionamiento(id,id_servicio)
);

create table limpieza(
id integer,
observaciones text,
cantidad_aves_vacunadas text,
id_servicio integer,
imei varchar(18),
primary key(id,id_servicio),
foreign key(id_servicio)references servicio_mantenimiento(id)
);


create table detalle_limpieza(
id integer,
id_inspeccion integer,
criterio_evaluacion text,
bueno integer,
malo integer,
imei varchar(18),
id_servicio integer,
primary key(id,id_inspeccion,id_servicio),
foreign key(id_inspeccion,id_servicio) references limpieza(id,id_servicio)
);




-- scrip de Sistema integral de monitoreo.
create table empresa(
id integer  auto_increment primary key,
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
fecha date,
nro_pollos integer,
imagen1 text,
imagen2 text,
imagen3 text,
imagen4 text,
imagen5 text,
id_galpon integer,
id_granja integer,
id_empresa integer,
id_sqlite varchar(18),
imei varchar(18),
firma_invetsa text,
firma_empresa text,
id_tecnico integer,
foreign key(id_tecnico)references tecnico (id),
foreign key (id_galpon,id_granja,id_empresa)references galpon(id,id_granja,id_empresa)
);

create table puntuacion(
id integer not null,
nombre varchar(50),
id_sistema integer not null,
imei varchar(18),
primary key(id,id_sistema),
foreign key(id_sistema)references sistema_integral(id)
);

create table detalle_puntuacion(
id integer not null,
nombre varchar(50),
estado tinyint,
id_puntuacion integer not null,
id_sistema integer not null,
imei varchar(18),
primary key(id,id_puntuacion,id_sistema),
foreign key(id_puntuacion,id_sistema) references puntuacion(id,id_sistema)
);


create table peso(
id integer not null,
peso_corporal decimal(2,2),
pedo_bursa decimal(2,2),
peso_brazo decimal(2,2),
peso_timo decimal(2,2),
peso_higado decimal(2,2),
indice_bursal decimal(4,2),
indice_timico decimal(4,2),
indice_hepatico decimal(4,2),
bursometro decimal(4,2),
id_sistema integer not null,
imei varchar(18),
primary key(id,id_sistema),
foreign key(id_sistema)references sistema_integral(id)

);



--Scrio de la base de datos de HOJA DE VERIFICACION.
create table unidad (
id integer auto_increment,
id_empresa integer,
nombre text,
primary key(id,id_empresa),
foreign key(id_empresa)references empresa(id)
);

create table hoja_verificacion(
id integer auto_increment primary key,
hora_ingreso time,
hora_salida time,
codigo varchar(20),
revision varchar(20),
firma_invetsa text,
firma_empresa text,
productividad decimal(4,2),
sumatoria_manipulacion_vacuna decimal(10,2),
promedio_mantenimiento decimal(10,2),
puntaje_control_indice decimal(10,2),
id_unidad integer,
id_empresa integer,
id_sqlite integer,
imei varchar(18),
fecha date,
id_tecnico integer,
imagen_jefe text,
responsable_invetsa text,
responsable_incubadora text,
total_vc decimal(10,2),
puntaje_total decimal(10,2),
foreign key(id_tecnico)references tecnico(id),
foreign key (id_unidad,id_empresa)references unidad(id,id_empresa)
);

create table vacunador(
id integer auto_increment primary key,
nombre varchar(50)
);

create table accion(
id integer not null,
nombre varchar(50),
id_hoja_verificacion integer,
imei varchar(18),
primary key(id,id_hoja_verificacion),
foreign key(id_hoja_verificacion)references hoja_verificacion(id)
);

create table detalle_accion(
id integer not null,
esperado varchar(50),
encontrado varchar(50),
id_accion integer,
id_hoja_verificacion integer not null,
imei varchar(18),
primary key(id,id_accion,id_hoja_verificacion),
foreign key(id_accion,id_hoja_verificacion) references accion(id,id_hoja_verificacion)
);

create table mantenimiento_limpieza(
id integer auto_increment primary key,
nro_twin_shot_zootec integer,
irregularidades integer,
id_hoja_verificacion integer,
id_vacunador integer,
foreign key(id_hoja_verificacion)references hoja_verificacion(id),
foreign key(id_vacunador)references vacunador(id)
);

create table mantenimiento_limpieza(
 id integer not null,
 nro_maquina integer,
 irregularidades integer,
 id_hoja_verificacion integer,
 id_vacunador integer,
 imei text,
 primary key(id,id_vacunador,id_hoja_verificacion),
 foreign key(id_hoja_verificacion) references hoja_verificacion(id),
 foreign key(id_vacunador)references vacunador(id)
 );

create table control_indice(
id integer not null,
nro_pollos_vacunado integer default 0,
puntaje integer default 0,
nro_pollos_controlados integer default 0,
nro_pollos_no_vacunados integer default 0,
nro_heridos integer default 0,
nro_mojados integer default 0,
nro_mala_posicion integer default 0,
nro_pollos_vacunados_correctamente integer default 0,
id_hoja_verificacion integer,
id_vacunador integer,
imei varchar(18),
primary key(id,id_hoja_verificacion),
foreign key(id_hoja_verificacion)references hoja_verificacion(id),
foreign key(id_vacunador)references vacunador(id)
);

create table manipulacion_dilucion(
id integer not null,
descripcion text,
puntaje decimal(2,2),
id_hoja_verificacion integer,
imei varchar(18),
primary key(id,id_hoja_verificacion),
foreign key(id_hoja_verificacion)references hoja_verificacion(id)
);


 create table viabilidad_celular(
                id integer not null,
                antibiotico text,
                dosis text,
                tiempo text,
                vc decimal(10,2),
                id_hoja_verificacion integer not null,
                primary key(id,id_hoja_verificacion),
                foreign key(id_hoja_verificacion)references hoja_verificacion(id)
                )

create table linea_genetica(
id integer not null,
descripcion text,
cobb text,
ross text,
hybro text,
id_hoja_verificacion integer not null,
primary key(id,id_hoja_verificacion),
foreign key(id_hoja_verificacion)references hoja_verificacion(id)
)
















