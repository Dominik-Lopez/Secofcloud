Create database Secofcloud_finalv1;
use Secofcloud_finalv1; 


         Create table usuario(
            id_usuario int(10) not null AUTO_INCREMENT,
            Documento int(10) not null,
            username varchar (20) not null,
            Passsword varchar(25) not null,
            Nom_persona Varchar(25) not null,
            Seg_nombre Varchar(25) null,
            apellido_per Varchar(25) not null,
            seg_apellido Varchar(25) null,
            direccion Varchar(45) not null,
            correo Varchar(45) not null,
            telefono BIGINT(10) not null,
            fk_id_departamento int(10) not null,
            primary key  (id_usuario,fk_id_departamento)
        );

        Create table Departamentos(
            id_departamento int(10) not null AUTO_INCREMENT,
            cod_departamento varchar (10) not null,
           Nombre_dep Varchar(30)  not null,
           desc_Departamento Varchar(30) not null,
            email Varchar(25) not null,
            telefono BIGINT(10) not null,
           primary key (id_departamento)
        );


        Create table Permisos(
           id_permiso int (10) AUTO_INCREMENT not null,
           Documento int (10) not null,
           fk_id_rol int (10) not null,
           primary key (id_permiso,fk_id_rol)
        );


        Create table caso_estudio(
            id_caso_estudio int(5)  AUTO_INCREMENT not null,
            documento varchar(200)  NOT NULL,
            nombrepdf varchar(200)   NOT NULL,
            descripcion varchar(50) not null,
            fk_id_departamento int(10) not null,
            primary key (id_caso_estudio,fk_id_departamento)
        );

            Create table observaciones(
                id_observaciones int (10) AUTO_INCREMENT not null,
                observacion varchar(50) not null,
                fk_id_caso_estudio int(10) not null,
                primary key (id_observaciones,fk_id_caso_estudio)
            );


            Create table roles(
                id_rol int(2) not null AUTO_INCREMENT,
                rol varchar(20) not null,
                primary key (id_rol)
            );





