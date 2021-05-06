-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-08-2020 a las 04:43:19
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `integral_del_nazas`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`admin`@`%localhost` PROCEDURE `PA_AGREGAR_CLIENTE` (IN `id` INT, IN `nombre` VARCHAR(100), IN `apellidos` VARCHAR(100), IN `telefono` CHAR(10), IN `correo` VARCHAR(70))  INSERT INTO clientes(clienteid, nombre, apellidos, telefono, correo) values (id, nombre, apellidos, telefono, correo)$$

CREATE DEFINER=`admin`@`%localhost` PROCEDURE `PA_AGREGAR_EMPLEADO` (IN `id` INT, IN `nombre` VARCHAR(100), IN `apellidos` VARCHAR(100), IN `telefono` CHAR(10), IN `correo` VARCHAR(70))  INSERT INTO empleados(empleadoid, nombre, apellidos, telefono, correo) values (id, nombre, apellidos, telefono, correo)$$

CREATE DEFINER=`admin`@`%localhost` PROCEDURE `PA_CITAS_CLIENTE_FECHA` (IN `fecha` DATE)  select CCF.Cliente as Cliente, CCF.Empleado as Empleado, CCF.Direccion as Direccion, CCF.Asunto as Asunto
from(
select concat(c.Nombre,' ', c.Apellidos) as Cliente, concat(e.nombre,' ',
 e.apellidos) as Empleado,
cit.direccion as Direccion, cit.asunto as Asunto 
from clientes as c inner join citas as cit on cit.clienteid=c.clienteid
inner join empleados as e on e.empleadoid=cit.empleadoid where cit.fecha=fecha) as CCF$$

CREATE DEFINER=`admin`@`%localhost` PROCEDURE `PA_CLIENTE_USUARIOS` (IN `nombre_usuario` VARCHAR(30))  SELECT clientes.Nombre as Nombre, clientes.Apellidos as Apellidos, usuarios.NombreUsuario as Usuario
from usuarios inner join clientes where clientes.clienteid=usuarios.clienteid and usuarios.nombreusuario=nombre_usuario$$

CREATE DEFINER=`admin`@`%localhost` PROCEDURE `PA_MATERIAL_PROVEEDORES` (IN `nombre_material` VARCHAR(100))  select MP.nombre as Material, MP.empresa as Proveedor, MP.tel as Telefono_Proveedor
from(
select m.nombre as nombre, p.nombreempresa as empresa, p.telefono as tel from 
materiales as m inner join material_proveedor as mp on m.materialid=mp.materialid
inner join proveedores as p on p.proveedorid=mp.proveedorid)
as MP where MP.nombre=nombre_material$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citas`
--

CREATE TABLE `citas` (
  `CitasID` int(11) NOT NULL,
  `Direccion` varchar(100) NOT NULL DEFAULT 'Sin especificar',
  `EmpleadoID` int(11) NOT NULL,
  `ClienteID` int(11) NOT NULL,
  `Fecha` date NOT NULL,
  `Hora` time DEFAULT NULL,
  `Ciudad` enum('Torreon','Matamoros','Lerdo','Gomez Palacio') NOT NULL,
  `Asunto` set('Presupuesto','Instalacion','Reparacion') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citas_pendientes`
--

CREATE TABLE `citas_pendientes` (
  `CitasID` int(11) NOT NULL,
  `Direccion` varchar(100) NOT NULL DEFAULT 'Sin especificar',
  `ClienteID` int(11) NOT NULL,
  `Fecha` date NOT NULL,
  `Hora` time DEFAULT NULL,
  `Ciudad` enum('Torreon','Matamoros','Lerdo','Gomez Palacio') NOT NULL,
  `Asunto` set('Presupuesto','Instalacion','Reparacion') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `citas_pendientes`
--

INSERT INTO `citas_pendientes` (`CitasID`, `Direccion`, `ClienteID`, `Fecha`, `Hora`, `Ciudad`, `Asunto`) VALUES
(10, 'Mariano Matamoros 265#', 8, '2020-08-05', '08:41:00', 'Torreon', 'Presupuesto'),
(11, '000000000', 8, '0001-01-01', '01:00:00', 'Torreon', 'Instalacion'),
(12, 'Geraneos 731sur', 8, '2020-08-13', '12:26:00', 'Matamoros', 'Instalacion'),
(13, 'Mariano Matamoros 265#', 11, '2020-08-06', '17:02:00', 'Gomez Palacio', 'Instalacion');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `ClienteID` int(11) NOT NULL,
  `Nombre` varchar(100) NOT NULL DEFAULT 'Sin especificar',
  `Apellidos` varchar(100) NOT NULL DEFAULT 'Sin especificar',
  `Telefono` char(10) NOT NULL DEFAULT '0000000000',
  `Correo` varchar(70) NOT NULL DEFAULT 'Ninguno',
  `UsuarioID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`ClienteID`, `Nombre`, `Apellidos`, `Telefono`, `Correo`, `UsuarioID`) VALUES
(6, 'Fulanita', 'Hernandez Barraza', '8713452000', 'Fulanita@gmail.mx', 14),
(7, 'Iram', 'Hernandez Barraza', '8713452000', 'EIram@gmail.com', 17),
(8, 'Marisol', 'Garcia Gonzales', '8713455260', 'Marisol@gmail.com', 20),
(10, 'Ashly2', 'Barraza Medina', '8713627839', 'hernandezbarrazaruben123@gmail.com', 23),
(11, 'Dulce', 'Barraza Medina', '8713455260', 'Candy@gmail.com', 24);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `EmpleadoID` int(11) NOT NULL,
  `Nombre` varchar(100) NOT NULL DEFAULT 'Sin especificar',
  `Apellidos` varchar(100) NOT NULL DEFAULT 'Sin especificar',
  `Telefono` char(10) NOT NULL DEFAULT '0000000000',
  `Correo` varchar(70) NOT NULL DEFAULT 'Ninguno',
  `UsuarioID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`EmpleadoID`, `Nombre`, `Apellidos`, `Telefono`, `Correo`, `UsuarioID`) VALUES
(1, 'Dulce', 'Barraza Medina', '8713729043', 'CandyBarraza@gmail.com', 4),
(10, 'Dulce', 'Antunez Rios', '8713627839', 'jazmin@utt.com', 16),
(11, 'Mari', 'Admin', '8713627839', 'hernandezbarrazaruben123@gmail.com', 22),
(14, 'Dulce', 'Barraza Medina', '8713629102', 'candylux@gmail.com', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materiales`
--

CREATE TABLE `materiales` (
  `MaterialID` int(11) NOT NULL,
  `Nombre` varchar(100) NOT NULL DEFAULT 'Sin especificar'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `materiales`
--

INSERT INTO `materiales` (`MaterialID`, `Nombre`) VALUES
(1, 'Cristal colores variados'),
(2, 'vidrio block'),
(3, 'Lamina de aluminio'),
(4, 'Lamina de cristal 20x20'),
(5, 'Maderas de 4mts x 20cm'),
(6, 'qweqwe');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `material_pedido`
--

CREATE TABLE `material_pedido` (
  `PedidoID` int(11) NOT NULL,
  `MaterialID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `material_proveedor`
--

CREATE TABLE `material_proveedor` (
  `MaterialID` int(11) NOT NULL,
  `ProveedorID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `material_proveedor`
--

INSERT INTO `material_proveedor` (`MaterialID`, `ProveedorID`) VALUES
(1, 1),
(3, 2),
(2, 1),
(3, 1),
(4, 3),
(5, 4);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `mostrar_clientes`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `mostrar_clientes` (
`Cliente` varchar(201)
,`Telefono` char(10)
,`Correo` varchar(70)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `mostrar_empleados`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `mostrar_empleados` (
`Empleado` varchar(201)
,`Telefono` char(10)
,`Correo` varchar(70)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `mostrar_pedidos_cliente`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `mostrar_pedidos_cliente` (
`Cliente` varchar(201)
,`Descripcion` tinytext
,`Fecha_Entrega` date
,`Costo` decimal(6,2)
,`Medidas` varchar(50)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `PedidoID` int(11) NOT NULL,
  `ClienteID` int(11) NOT NULL,
  `Descripcion` tinytext NOT NULL DEFAULT 'Sin descripcion',
  `Costo` decimal(6,2) NOT NULL DEFAULT 0.00,
  `FechaEntrega` date DEFAULT NULL,
  `Medidas` varchar(50) NOT NULL DEFAULT 'No especificado',
  `Ciudad` enum('Torreon','Matamoros','Lerdo','Gomez Palacio') NOT NULL,
  `Direccion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`PedidoID`, `ClienteID`, `Descripcion`, `Costo`, `FechaEntrega`, `Medidas`, `Ciudad`, `Direccion`) VALUES
(9, 0, 'ventanal', '0.00', '2020-08-07', '2mt x 3.5mt', 'Matamoros', 'geraneos 731'),
(10, 0, 'qqqqqqqqqqqqq', '0.00', '2020-08-01', '2mt x 3.5mt', 'Matamoros', 'qqqqq');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `ProductoID` int(11) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Descripcion` tinytext NOT NULL,
  `Categoria` enum('Cristales','Ventanas','Puertas','Decoracion','Ventanales') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`ProductoID`, `Nombre`, `Descripcion`, `Categoria`) VALUES
(12, 'Cubo Decorativo ', 'Cubo en el cual puedes dar guardar cosas importantes para mantener a salvo del polvo y la tierra. ', 'Decoracion'),
(14, 'Cancel ', 'Cancel de cristal, lujoso.\r\neste cancel puede ser adaptado a las medidas que el cliente desee.', 'Puertas'),
(15, 'Ventana de aluminio', 'ventana con marco de aluminio, deslizable para obtener respiración en la habitación.', 'Ventanas'),
(16, 'Puertas Automaticas', 'Puerta de marco de aluminio reforzado, dicha puerta incluye un motor que automatiza la entrada a los sitios.', 'Puertas'),
(17, 'Escape para baños', 'Pequeña ventana que se coloca en los baños para evitar encierros de olores .', 'Ventanas'),
(18, 'wwwww', 'wwwwwwww', 'Puertas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `ProveedorID` int(11) NOT NULL,
  `NombreEmpresa` varchar(100) NOT NULL DEFAULT 'Sin especificar',
  `Correo` varchar(100) NOT NULL DEFAULT 'Ninguno',
  `Telefono` char(10) NOT NULL DEFAULT '0000000000',
  `Direccion` varchar(100) NOT NULL DEFAULT 'Sin especificar'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`ProveedorID`, `NombreEmpresa`, `Correo`, `Telefono`, `Direccion`) VALUES
(1, 'Cristales y materias primas Joel', 'cristales_materiasp@gmail.com', '7331215', 'Zona industrial #1234 torreon, coah.'),
(2, 'Laminado y aluminios sa de cv', 'laminado_alum@gmail.com', '1231556', 'Diagonal reforma #24 cd de mexico'),
(3, 'Marisol', 'hernandezbarrazaruben123@gmail.com', '8712396011', 'mariano Matamoros 1763'),
(4, 'tttt', 'Candy@gmail.com', '8713452055', 'Materiano 77182#'),
(5, 'nuevo', 'hdyaua@gajs', '8277182771', 'dsdwdw');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `NombreUsuario` varchar(30) NOT NULL DEFAULT 'Sin Nombre de Usuario',
  `Contrasena` varchar(600) NOT NULL,
  `UsuarioID` int(11) NOT NULL,
  `TipoUsuario` enum('Empleado','Cliente','Dueno') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`NombreUsuario`, `Contrasena`, `UsuarioID`, `TipoUsuario`) VALUES
('Candy', '$2y$10$RC2ffUJ2VA6nUSnCvjSPFuGZNJ06U60sgpH6vieeMAxPRnDJbs8pK', 3, 'Empleado'),
('ADMIN', '$2y$10$JmZNrdpl8VKf2wn8QSkghu9.Y.LV6ZM6C8TMousspjESbLtsDvKoy', 4, 'Dueno'),
('Fulana3', '$2y$10$X7.Q2T61mEEYeAy1qTQpmOfsFy2h/1j3Flrr9.N6jhrvG7N.3mSjy', 14, 'Cliente'),
('JazDu', '$2y$10$VPO81MOa0YGQ/BqOAP2/ou288QzZwE417JKQF9LkQg.F/UK7F.5cq', 16, 'Empleado'),
('Alexis', '$2y$10$03I5m2znnLhe.xTo/jxOLOArmpeNE9TfXHOWJ5nzLh69dcqvqSReO', 17, 'Cliente'),
('Marisol', '$2y$10$FJ1/M9L4tyfwlqONv45X9.cpD.GckNHK2OpnxmprBvP4iY5UNM6VK', 20, 'Cliente'),
('Marisol7787', '$2y$10$2dCZ1uVrKATG.4qT3mvEBubu8goCMMXfyLGXEp7fJYAt5GRe4JfO6', 22, 'Empleado'),
('AshlyCow2', '$2y$10$UCy8HGUt4I9qZIf24WY5y.I6d8iErwkhUIFn9Z996Iab9yhHqn/rG', 23, 'Cliente'),
('Dulce', '$2y$10$LD9MoDc8uOFzSAVMguYg7.droTs5QJEGntRmp.vWMHBLkXyH7hogW', 24, 'Cliente');

-- --------------------------------------------------------

--
-- Estructura para la vista `mostrar_clientes`
--
DROP TABLE IF EXISTS `mostrar_clientes`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `mostrar_clientes`  AS  select concat(`clientes`.`Nombre`,' ',`clientes`.`Apellidos`) AS `Cliente`,`clientes`.`Telefono` AS `Telefono`,`clientes`.`Correo` AS `Correo` from `clientes` ;

-- --------------------------------------------------------

--
-- Estructura para la vista `mostrar_empleados`
--
DROP TABLE IF EXISTS `mostrar_empleados`;

CREATE ALGORITHM=UNDEFINED DEFINER=`admin`@`%localhost` SQL SECURITY DEFINER VIEW `mostrar_empleados`  AS  select concat(`empleados`.`Nombre`,' ',`empleados`.`Apellidos`) AS `Empleado`,`empleados`.`Telefono` AS `Telefono`,`empleados`.`Correo` AS `Correo` from `empleados` ;

-- --------------------------------------------------------

--
-- Estructura para la vista `mostrar_pedidos_cliente`
--
DROP TABLE IF EXISTS `mostrar_pedidos_cliente`;

CREATE ALGORITHM=UNDEFINED DEFINER=`admin`@`%localhost` SQL SECURITY DEFINER VIEW `mostrar_pedidos_cliente`  AS  select concat(`c`.`Nombre`,' ',`c`.`Apellidos`) AS `Cliente`,`p`.`Descripcion` AS `Descripcion`,`p`.`FechaEntrega` AS `Fecha_Entrega`,`p`.`Costo` AS `Costo`,`p`.`Medidas` AS `Medidas` from (`pedidos` `p` join `clientes` `c` on(`c`.`ClienteID` = `p`.`ClienteID`)) ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `citas`
--
ALTER TABLE `citas`
  ADD PRIMARY KEY (`CitasID`),
  ADD KEY `FK_CITA_EMP` (`EmpleadoID`),
  ADD KEY `FK_CITA_CLI` (`ClienteID`),
  ADD KEY `INDX_CITA_DIRECCION` (`Direccion`);

--
-- Indices de la tabla `citas_pendientes`
--
ALTER TABLE `citas_pendientes`
  ADD PRIMARY KEY (`CitasID`),
  ADD KEY `ClienteID` (`ClienteID`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`ClienteID`),
  ADD KEY `INDX_CLIENTES_NOM_AP_TEL` (`Nombre`,`Apellidos`,`Telefono`),
  ADD KEY `fk_cliente_usuario` (`UsuarioID`);
ALTER TABLE `clientes` ADD FULLTEXT KEY `INDX_Nombreclientes` (`Nombre`,`Apellidos`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`EmpleadoID`),
  ADD UNIQUE KEY `Correo` (`Correo`),
  ADD KEY `FK_empleados_usuarios` (`UsuarioID`);
ALTER TABLE `empleados` ADD FULLTEXT KEY `INDX_Nombreempleados` (`Nombre`,`Apellidos`);

--
-- Indices de la tabla `materiales`
--
ALTER TABLE `materiales`
  ADD PRIMARY KEY (`MaterialID`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`PedidoID`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`ProductoID`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`ProveedorID`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`UsuarioID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `citas`
--
ALTER TABLE `citas`
  MODIFY `CitasID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `citas_pendientes`
--
ALTER TABLE `citas_pendientes`
  MODIFY `CitasID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `ClienteID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `EmpleadoID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `materiales`
--
ALTER TABLE `materiales`
  MODIFY `MaterialID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `PedidoID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `ProductoID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `ProveedorID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `UsuarioID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
