-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-09-2022 a las 17:18:55
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `secofcloud`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `caso_de_estudio`
--

CREATE TABLE `caso_de_estudio` (
  `idCaso_de_estudio` int(10) NOT NULL,
  `Usuario_idPersona` int(10) NOT NULL,
  `Usuario_tipodoc` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `caso_de_estudio`
--

INSERT INTO `caso_de_estudio` (`idCaso_de_estudio`, `Usuario_idPersona`, `Usuario_tipodoc`) VALUES
(1, 1000004468, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `caso_de_estudio_has_consolidado`
--

CREATE TABLE `caso_de_estudio_has_consolidado` (
  `caso_estudio_idCaso` int(10) NOT NULL,
  `Consolidado_idConsolidado` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consolidado`
--

CREATE TABLE `consolidado` (
  `idConsolidado` int(10) NOT NULL,
  `Tamano` varchar(25) NOT NULL,
  `fecha_subida` date NOT NULL,
  `Version_` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

CREATE TABLE `departamento` (
  `idDepartamento` int(10) NOT NULL,
  `Nombre_dep` varchar(45) NOT NULL,
  `Numero_empleados` int(3) NOT NULL,
  `email` varchar(25) NOT NULL,
  `telefono` bigint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `departamento`
--

INSERT INTO `departamento` (`idDepartamento`, `Nombre_dep`, `Numero_empleados`, `email`, `telefono`) VALUES
(1, 'Ventas', 3, 'ventas@gmail.com', 7529943);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empelado`
--

CREATE TABLE `empelado` (
  `empelado_idpersona` int(10) NOT NULL,
  `empelado_tipo_documento` varchar(15) NOT NULL,
  `empelado_idDepartamento` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado_has_caso_de_estudio`
--

CREATE TABLE `empleado_has_caso_de_estudio` (
  `Empleado_id_persona` int(10) NOT NULL,
  `empelado_tipo_doc` varchar(15) NOT NULL,
  `caso_estudio_idCaso` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa_contra`
--

CREATE TABLE `empresa_contra` (
  `idempresa_contra` int(10) NOT NULL,
  `Nombre` varchar(25) NOT NULL,
  `direccion` varchar(45) NOT NULL,
  `telefono` bigint(10) NOT NULL,
  `email` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `empresa_contra`
--

INSERT INTO `empresa_contra` (`idempresa_contra`, `Nombre`, `direccion`, `telefono`, `email`) VALUES
(1, 'Exito', 'calle 8', 323323, 'nomames@misnea.edu.co'),
(2, 'Exito', 'calle 8', 323323, 'nomames@misnea.edu.co');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `id_persona` int(10) NOT NULL,
  `username` varchar(20) NOT NULL,
  `Passsword` varchar(20) NOT NULL,
  `Nom_persona` varchar(25) NOT NULL,
  `Seg_nombre` varchar(25) DEFAULT NULL,
  `apellido_per` varchar(25) NOT NULL,
  `seg_apellido` varchar(25) DEFAULT NULL,
  `direccion` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `telefono` bigint(10) NOT NULL,
  `tipo_documento_tipo_doc` varchar(15) NOT NULL,
  `fk_rol` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`id_persona`, `username`, `Passsword`, `Nom_persona`, `Seg_nombre`, `apellido_per`, `seg_apellido`, `direccion`, `email`, `telefono`, `tipo_documento_tipo_doc`, `fk_rol`) VALUES
(1000002234, 'Empleado1', '123456', 'Brayan', 'Camilo', 'Buitrago ', 'Lara', 'calle 8 A20', 'buitragolr@misena.edu.co', 3143303420, 'CC', 'Empleado'),
(1000004469, 'Admin1', '1234', 'Christian', 'Dominik', 'Lopez', 'Rico', 'Calle 4A sur N°4-31 Este', 'cdlopez964@misena.edu.co', 3053487331, 'CC', 'Administrador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `rol_usu` varchar(20) NOT NULL,
  `estado_rol` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`rol_usu`, `estado_rol`) VALUES
('Administrador', 1),
('Empleado', 1),
('ESTUDIO ACADEMICO', 1),
('VISITA DOMICILIARIA', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_documento`
--

CREATE TABLE `tipo_documento` (
  `tipo_documento` varchar(15) NOT NULL,
  `Des_tipodoc` varchar(35) NOT NULL,
  `Estado_tdoc` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipo_documento`
--

INSERT INTO `tipo_documento` (`tipo_documento`, `Des_tipodoc`, `Estado_tdoc`) VALUES
('CC', 'CEDULA DE CIUDADANIA', 1),
('CE', 'CEDULA EXTRANGERIA', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `Persona_idpersona` int(10) NOT NULL,
  `Usuario_tipo_documento` varchar(15) NOT NULL,
  `usu_idempresa_contra` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `caso_de_estudio`
--
ALTER TABLE `caso_de_estudio`
  ADD PRIMARY KEY (`idCaso_de_estudio`);

--
-- Indices de la tabla `caso_de_estudio_has_consolidado`
--
ALTER TABLE `caso_de_estudio_has_consolidado`
  ADD PRIMARY KEY (`caso_estudio_idCaso`,`Consolidado_idConsolidado`),
  ADD KEY `Consolidado_idConsolidado` (`Consolidado_idConsolidado`);

--
-- Indices de la tabla `consolidado`
--
ALTER TABLE `consolidado`
  ADD PRIMARY KEY (`idConsolidado`);

--
-- Indices de la tabla `departamento`
--
ALTER TABLE `departamento`
  ADD PRIMARY KEY (`idDepartamento`);

--
-- Indices de la tabla `empelado`
--
ALTER TABLE `empelado`
  ADD PRIMARY KEY (`empelado_idpersona`,`empelado_tipo_documento`),
  ADD KEY `empelado_ibfk_2` (`empelado_idDepartamento`);

--
-- Indices de la tabla `empleado_has_caso_de_estudio`
--
ALTER TABLE `empleado_has_caso_de_estudio`
  ADD PRIMARY KEY (`Empleado_id_persona`,`empelado_tipo_doc`,`caso_estudio_idCaso`),
  ADD KEY `empleado_has_caso_de_estudio_ibfk_2` (`caso_estudio_idCaso`);

--
-- Indices de la tabla `empresa_contra`
--
ALTER TABLE `empresa_contra`
  ADD PRIMARY KEY (`idempresa_contra`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`id_persona`,`tipo_documento_tipo_doc`),
  ADD KEY `persona_ibfk_1` (`tipo_documento_tipo_doc`),
  ADD KEY `fk_rol_2` (`fk_rol`),
  ADD KEY `id_persona` (`id_persona`),
  ADD KEY `fk_rol` (`fk_rol`) USING BTREE;

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`rol_usu`),
  ADD KEY `FK` (`rol_usu`);

--
-- Indices de la tabla `tipo_documento`
--
ALTER TABLE `tipo_documento`
  ADD PRIMARY KEY (`tipo_documento`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`Persona_idpersona`,`Usuario_tipo_documento`),
  ADD KEY `usuario_ibfk_2` (`usu_idempresa_contra`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `caso_de_estudio_has_consolidado`
--
ALTER TABLE `caso_de_estudio_has_consolidado`
  ADD CONSTRAINT `caso_de_estudio_has_consolidado_ibfk_1` FOREIGN KEY (`caso_estudio_idCaso`) REFERENCES `caso_de_estudio` (`idCaso_de_estudio`),
  ADD CONSTRAINT `caso_de_estudio_has_consolidado_ibfk_2` FOREIGN KEY (`Consolidado_idConsolidado`) REFERENCES `consolidado` (`idConsolidado`);

--
-- Filtros para la tabla `empelado`
--
ALTER TABLE `empelado`
  ADD CONSTRAINT `empelado_ibfk_1` FOREIGN KEY (`empelado_idpersona`,`empelado_tipo_documento`) REFERENCES `persona` (`id_persona`, `tipo_documento_tipo_doc`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `empelado_ibfk_2` FOREIGN KEY (`empelado_idDepartamento`) REFERENCES `departamento` (`idDepartamento`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `empleado_has_caso_de_estudio`
--
ALTER TABLE `empleado_has_caso_de_estudio`
  ADD CONSTRAINT `empleado_has_caso_de_estudio_ibfk_1` FOREIGN KEY (`Empleado_id_persona`,`empelado_tipo_doc`) REFERENCES `empelado` (`empelado_idpersona`, `empelado_tipo_documento`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `empleado_has_caso_de_estudio_ibfk_2` FOREIGN KEY (`caso_estudio_idCaso`) REFERENCES `caso_de_estudio` (`idCaso_de_estudio`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `persona`
--
ALTER TABLE `persona`
  ADD CONSTRAINT `persona_ibfk_1` FOREIGN KEY (`tipo_documento_tipo_doc`) REFERENCES `tipo_documento` (`tipo_documento`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `persona_ibfk_2` FOREIGN KEY (`fk_rol`) REFERENCES `rol` (`rol_usu`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`Persona_idpersona`,`Usuario_tipo_documento`) REFERENCES `persona` (`id_persona`, `tipo_documento_tipo_doc`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usuario_ibfk_2` FOREIGN KEY (`usu_idempresa_contra`) REFERENCES `empresa_contra` (`idempresa_contra`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
