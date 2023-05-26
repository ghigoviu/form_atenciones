drop table if exists atenciones;

create table atenciones (
    id int primary key auto_increment,
    usuario varchar(50) not null,
    fecha datetime,
    coordinacion varchar(20) ,
    telefono varchar(20) ,
    email varchar(255) ,
    tipo_atencion varchar(20) ,
    asunto varchar(255) ,
    rc  varchar(20) ,
    observaciones varchar(200) 
);
