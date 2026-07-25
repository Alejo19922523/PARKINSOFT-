create database parkingsoft;
use parkingsoft;

create table parkingsoft.rol(
id_rol tinyint(3) not null,
nombre_rol varchar(30)not null,
primary key(id_rol)
);

create table parkingsoft.tipo_documento(
id_tp_documento tinyint(3) not null,
nom_tp_documento varchar(40) not null,
acronimo varchar(4) not null,
primary key(id_tp_documento)
);

create table parkingsoft.tipo_membrecia(
id_membrecia int not null,
nom_membrecia varchar(30) not null,
primary key(id_membrecia)
);

create table parkingsoft.tipo_vehiculo(
id_tp_vehiculo int not null,
nom_vehiculo varchar(40) not null,
primary key(id_tp_vehiculo)
);

create table parkingsoft.tipo_bloque(
id_tp_bloque int not null,
nombre_tp_bloque varchar(40)not null,
primary key(id_tp_bloque)
);

create table parkingsoft.genero(
id_genero tinyint(3) not null,
nom_genero varchar(30) not null,
acronimo varchar(4),
primary key(id_genero)
);

create table parkingsoft.usuario(
num_documento varchar(15) not null,
pk_fk_id_tp_documento tinyint(3) not null,
fk_id_genero tinyint(3) not null,
prim_nom varchar(30) not null,
seg_nombre varchar(30),
prim_apellido varchar(30) not null,
seg_apellido varchar(30),
direccion varchar(60) not null,
telefono varchar(15) not null,
correo_electronico varchar(80) not null,
foto_avatar blob,
primary key(num_documento,pk_fk_id_tp_documento)
);

create table metodo_pago(
id_metodo_pago varchar (15) not null,
tipo_pago varchar(25) not null,
primary key(id_metodo_pago)
);

create table parkingsoft.vehiculo(
placa varchar(10) not null,
fk_num_documento varchar(15) not null,
fk_id_tp_documento tinyint(3) not null,
fk_id_tp_vehiculo int not null,
numero_modelo varchar(25) not null,
foto_vehiculo blob,
primary key(placa)
);

create table parkingsoft.bloque(
id_bloque int not null,
fk_id_tp_vehiculo int not null,
fk_id_tp_bloque int not null,
numero_bloque int(3) not null,
estado bit not null,
primary key(id_bloque)
);

create table parkingsoft.membrecia(
id_membrecia int not null,
fk_num_documento varchar(15) not null,
fk_id_tp_documento tinyint(3) not null,
fk_id_membrecia int not null,
fk_id_bloque int not null,
fecha_inicio date not null,
fecha_fin date not null,
estado bit not null,
primary key(id_membrecia)
);

create table parkingsoft.ticket(
id_ticket int not null,
fk_num_documento varchar(15) not null,
fk_id_tp_documento tinyint(3) not null,
hora_entrada time not null,
hora_salida time not null,
total_tiempo time not null,
primary key(id_ticket)
);


create table parkingsoft.ticket_bloque(
pk_fk_id_ticket int not null,
pk_fk_id_bloque int not null,
primary key(pk_fk_id_ticket,pk_fk_id_bloque)
);

create table parkingsoft.persona_rol(
pk_fk_num_documento varchar(15) not null,
pk_fk_id_tp_documento tinyint(3) not null,
pk_fk_id_rol tinyint(3) not null,
primary key(pk_fk_num_documento,pk_fk_id_tp_documento,pk_fk_id_rol)
);

create table parkingsoft.factura(
id_factura int not null,
pk_fk_num_documento varchar(15) not null,
pk_fk_id_tp_documento tinyint(3) not null,
fk_id_ticket int not null,
fk_id_membrecia int not null,
fk_id_metodo_pago varchar(15) not null,
fecha date not null,
valor_subtotal float (9,3) not null,
valor_iva float (9,3) not null,
valor_total float (9,3) not null,
primary key(id_factura,pk_fk_num_documento,pk_fk_id_tp_documento)
);

create table parkingsoft.log_error(
id_error int not null,
descripcion text not null,
fecha date not null,
hora time not null,
primary key(id_error)
);

create table parkingsoft.notificaciones(
id_notificacion int not null,
correo_electronico varchar(80) not null,
sms text not null,
primary key(id_notificacion)
);
alter table parkingsoft.usuario add constraint pk_fk_id_tp_documentoPa foreign key(pk_fk_id_tp_documento) references tipo_documento (id_tp_documento) on update cascade;
alter table parkingsoft.usuario add constraint fk_id_generoPa foreign key(fk_id_genero) references genero (id_genero) on update cascade;
alter table parkingsoft.vehiculo add constraint fk_id_num_tp_documento foreign key(fk_num_documento,fk_id_tp_documento) references usuario (num_documento,pk_fk_id_tp_documento) on update cascade;
alter table parkingsoft.vehiculo add constraint fk_id_tp_vehiculoPa foreign key(fk_id_tp_vehiculo) references tipo_vehiculo (id_tp_vehiculo) on update cascade;
alter table parkingsoft.ticket add constraint pk_fk_num_td_documento foreign key(fk_num_documento,fk_id_tp_documento) references usuario (num_documento,pk_fk_id_tp_documento) on update cascade;
alter table parkingsoft.bloque add constraint fk_id_tp_vehiculoPar foreign key(fk_id_tp_vehiculo) references tipo_vehiculo (id_tp_vehiculo) on update cascade;
alter table parkingsoft.bloque add constraint fk_id_tp_bloquePar foreign key(fk_id_tp_bloque) references tipo_bloque (id_tp_bloque) on update cascade;
alter table parkingsoft.membrecia add constraint fk_num_td_documentoPar foreign key(fk_num_documento,fk_id_tp_documento) references usuario(num_documento,pk_fk_id_tp_documento) on update cascade;
alter table parkingsoft.membrecia add constraint fk_id_membreciaPa foreign key(fk_id_membrecia) references tipo_membrecia(id_membrecia) on update cascade;
alter table parkingsoft.membrecia add constraint fk_id_bloquePa foreign key(fk_id_bloque) references bloque(id_bloque) on update cascade;
alter table parkingsoft.factura add constraint pk_fk_num_td_documetofa foreign key(pk_fk_num_documento,pk_fk_id_tp_documento) references usuario (num_documento,pk_fk_id_tp_documento) on update cascade;
alter table parkingsoft.factura add constraint fk_id_ticketFa foreign key(fk_id_ticket) references ticket (id_ticket) on update cascade;
alter table parkingsoft.factura add constraint fk_id_membreciafa foreign key(fk_id_membrecia) references membrecia (id_membrecia) on update cascade;
alter table parkingsoft.ticket_bloque add constraint pk_fk_id_tickettb foreign key(pk_fk_id_ticket) references ticket (id_ticket) on update cascade;
alter table parkingsoft.ticket_bloque add constraint pk_fk_id_bloquetb foreign key(pk_fk_id_bloque) references bloque (id_bloque) on update cascade;
alter table parkingsoft.persona_rol add constraint pk_fk_num_td_documentopr foreign key(pk_fk_num_documento,pk_fk_id_tp_documento) references usuario (num_documento,pk_fk_id_tp_documento) on update cascade;
alter table parkingsoft.persona_rol add constraint pk_fk_id_rolpr foreign key(pk_fk_id_rol) references rol (id_rol) on update cascade;

alter table parkingsoft.factura add constraint fk_id_metodo_pagopk foreign key(fk_id_metodo_pago) references metodo_pago(id_metodo_pago) on update cascade;

