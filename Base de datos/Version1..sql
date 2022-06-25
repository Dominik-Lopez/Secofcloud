Create database Secofcloud;
use Secofcloud;

    Create table tipo_documento(
        tipo_documento Varchar(15) not null,
        Des_tipodoc Varchar(35) not null,
        Estado_tdoc BOOLEAN  not null,
        primary key (tipo_documento)
    );

        Create table Persona(
            id_persona int(10) not null,
            Nom_persona Varchar(25) not null,
            Seg_nombre Varchar(25) null,
            apellido_per Varchar(25) not null,
            seg_apellido Varchar(25) null,
            direccion Varchar(45) not null,
            email Varchar(45) not null,
            telefono BIGINT(10) not null,
            tipo_documento_tipo_doc Varchar(15) not null,
            primary key(id_persona,tipo_documento_tipo_doc)
        );

            Alter table Persona
            add foreign key (tipo_documento_tipo_doc)
            references tipo_documento(tipo_documento);


        Create table Empresa_contra(
            idempresa_contra int(10) null,
            Nombre Varchar(25) not null,
            direccion Varchar(45) not null,
            telefono BIGINT(10) not null,
            email Varchar(45) not null,
            primary key(idempresa_contra)
        );


        Create table Usuario(
            Persona_idpersona int(10) not null,
            Usuario_tipo_documento Varchar(15) not null,
            usu_idempresa_contra int(10) not null,
            primary key(Persona_idpersona,Usuario_tipo_documento)
        );



        Create table empelado(
            empelado_idpersona int(10) not null,
            empelado_tipo_documento Varchar(15) not null,
            empelado_idDepartamento int(10) not null,
            primary key (empelado_idpersona,empelado_tipo_documento)
        );


        Create table  Departamento(
            idDepartamento int(10) not null,
            Nombre_dep Varchar(45) Not null,
            Numero_empleados int(3) not null,
            email Varchar(25) not null,
            telefono BIGINT(10) not null,
            primary key (idDepartamento)
        ); 


        




        Create table Empleado_has_caso_de_estudio(
           Empleado_id_persona int(10) not null, 
           empelado_tipo_doc Varchar(15) not null,
           caso_estudio_idCaso int(10) not null,
           primary key(Empleado_id_persona,empelado_tipo_doc,caso_estudio_idCaso)
        );

        
        Create table Caso_de_estudio(
            idCaso_de_estudio int(10) not null,
            Usuario_idPersona int(10) not null,
            Usuario_tipodoc Varchar(15) not null,
            primary key(idCaso_de_estudio)
        );


       


        Create table Consolidado(
            idConsolidado int(10) not null,
            Tamano Varchar(25) not null,
            fecha_subida date not null,
            Version_ Varchar(5) not null,
            primary key(idConsolidado)
        );


        Create table Caso_de_estudio_has_consolidado(
             caso_estudio_idCaso int(10) not null,
             Consolidado_idConsolidado int(10) not null,
             primary key(caso_estudio_idCaso,Consolidado_idConsolidado)
        );

        Create table login(
        Usuario Varchar(25) not null,
        Contraseña Varchar(25) not null,
        Usuario ¡_idPersona Varchar(15)not null,
        Usuario_Tipo_Doc Varchar (15) not null,
        primary key(Usuario_idPersona,Usuario_Tipo_Doc)
        );
        
        alter table login
        add foreign key (Usuario_idPersona,Usuario_Tipo_Doc)
        references Persona (id_persona,tipo_documento_tipo_doc);
       
        Alter table Usuario
        add foreign key (Persona_idpersona,Usuario_tipo_documento)
        references Persona (id_persona,tipo_documento_tipo_doc);

        alter table Usuario
        add foreign key (usu_idempresa_contra)
        references Empresa_contra (idempresa_contra);

        Alter table empelado
        add foreign key (empelado_idpersona,empelado_tipo_documento)
        references Persona(id_persona,tipo_documento_tipo_doc);

        Alter table empelado
        add foreign key (empelado_idDepartamento)
        references Departamento(idDepartamento);

        Alter table Empleado_has_caso_de_estudio
        add foreign key (Empleado_id_persona,empelado_tipo_doc)
        references empelado (empelado_idpersona,empelado_tipo_documento);

        Alter table Empleado_has_caso_de_estudio
        add foreign key (caso_estudio_idCaso)
        references Caso_de_estudio (idCaso_de_estudio);


        alter table Caso_de_estudio_has_consolidado
        add foreign key (caso_estudio_idCaso)
        references Caso_de_estudio (idCaso_de_estudio);

        alter table Caso_de_estudio_has_consolidado
        add foreign key (Consolidado_idConsolidado)
        references Consolidado(idConsolidado);


    

    


