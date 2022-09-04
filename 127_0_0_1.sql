-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-04-2022 a las 16:56:39
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `clinicos_helpdesk1`
--
CREATE DATABASE IF NOT EXISTS `clinicos_helpdesk1` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;
USE `clinicos_helpdesk1`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `td_documento`
--

CREATE TABLE `td_documento` (
  `doc_id` int(11) NOT NULL,
  `tick_id` int(11) NOT NULL,
  `doc_nom` varchar(400) COLLATE utf8_spanish_ci NOT NULL,
  `fech_crea` datetime NOT NULL,
  `est` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `td_documento`
--

INSERT INTO `td_documento` (`doc_id`, `tick_id`, `doc_nom`, `fech_crea`, `est`) VALUES
(8, 113, 'c clinicos.PNG', '2022-02-24 21:23:16', 1),
(9, 143, 'GASTOS MES.xlsx', '2022-03-21 14:50:30', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `td_ticketdetalle`
--

CREATE TABLE `td_ticketdetalle` (
  `tickd_id` int(11) NOT NULL,
  `tick_id` int(11) NOT NULL,
  `usu_id` int(11) NOT NULL,
  `tickd_descrip` mediumtext COLLATE utf8_spanish_ci NOT NULL,
  `fech_crea` datetime NOT NULL,
  `est` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `td_ticketdetalle`
--

INSERT INTO `td_ticketdetalle` (`tickd_id`, `tick_id`, `usu_id`, `tickd_descrip`, `fech_crea`, `est`) VALUES
(7, 79, 194, 'no hay pruebas<br>', '2022-02-21 08:46:34', 1),
(8, 84, 22, 'cerrar prueba<br>', '2022-02-21 09:44:44', 1),
(9, 99, 22, 'Ticket Cerrado...', '2022-02-21 16:07:10', 1),
(10, 100, 22, 'Ticket Cerrado...', '2022-02-21 16:17:36', 1),
(11, 101, 22, 'Ticket Cerrado...', '2022-02-21 19:58:11', 1),
(12, 102, 22, 'Ticket Cerrado...', '2022-02-21 20:02:21', 1),
(13, 103, 22, 'Ticket Cerrado...', '2022-02-22 13:07:53', 1),
(14, 104, 22, 'Ticket Cerrado...', '2022-02-22 17:37:56', 1),
(15, 105, 22, 'Ticket Cerrado...', '2022-02-22 17:38:57', 1),
(16, 106, 22, 'Se escala con proveedor<br>', '2022-02-24 16:00:52', 1),
(17, 106, 22, 'Ticket Cerrado...', '2022-02-25 09:46:40', 1),
(18, 109, 22, 'Ticket Cerrado...', '2022-02-25 12:27:48', 1),
(19, 107, 22, 'se escal a proveedor<br>', '2022-02-25 16:34:45', 1),
(20, 118, 0, 'Ticket Cerrado...', '2022-02-27 12:36:48', 1),
(21, 120, 22, 'Ticket Re-Abierto...', '2022-02-27 13:19:00', 1),
(22, 117, 22, 'Ticket Re-Abierto...', '2022-03-16 13:55:22', 1),
(23, 122, 22, 'actualizacion', '2022-03-17 18:10:06', 1),
(24, 122, 22, '<p>no tengo datos</p><p><br></p>', '2022-03-17 18:10:26', 1),
(25, 122, 22, 'actualiacion', '2022-03-17 18:10:52', 1),
(26, 123, 194, 'sdfsdfsefwf', '2022-03-17 18:12:25', 1),
(27, 123, 194, 'sdfsdsdgsf', '2022-03-17 18:32:42', 1),
(28, 122, 22, '<p>ergergerg</p><p><br></p>', '2022-03-17 18:35:33', 1),
(29, 125, 194, 'ayudaaaaaaaaaa', '2022-03-17 18:36:58', 1),
(30, 129, 194, '&lt;dasdasdas', '2022-03-20 18:31:51', 1),
(31, 133, 22, 'Ticket Cerrado...', '2022-03-20 18:57:31', 1),
(32, 136, 22, 'Ticket Cerrado...', '2022-03-21 13:51:53', 1),
(33, 136, 22, 'Ticket Re-Abierto...', '2022-03-21 13:55:28', 1),
(34, 141, 22, 'Ticket Cerrado...', '2022-03-21 14:00:58', 1),
(35, 133, 22, 'Ticket Re-Abierto...', '2022-03-21 14:03:32', 1),
(36, 134, 22, 'Ticket Re-Abierto...', '2022-03-21 14:03:35', 1),
(37, 135, 22, 'Ticket Re-Abierto...', '2022-03-21 14:03:37', 1),
(38, 133, 22, 'Ticket Re-Abierto...', '2022-03-21 14:11:38', 1),
(39, 133, 22, 'Ticket Re-Abierto...', '2022-03-21 14:13:35', 1),
(40, 133, 22, 'Ticket Re-Abierto...', '2022-03-21 14:14:19', 1),
(41, 133, 22, 'Ticket Re-Abierto...', '2022-03-21 14:20:14', 1),
(42, 133, 22, 'Ticket Re-Abierto...', '2022-03-21 14:21:11', 1),
(43, 133, 22, 'Ticket Re-Abierto...', '2022-03-21 14:22:29', 1),
(44, 133, 22, 'Ticket Re-Abierto...', '2022-03-21 14:23:19', 1),
(45, 134, 22, 'ceraddo solucionado<br>', '2022-03-21 14:24:33', 1),
(46, 134, 22, 'Ticket Cerrado...', '2022-03-21 14:24:50', 1),
(47, 135, 22, 'Ticket Cerrado...', '2022-03-21 14:25:47', 1),
(48, 133, 22, 'Ticket Re-Abierto...', '2022-03-21 14:26:02', 1),
(49, 134, 22, 'Ticket Re-Abierto...', '2022-03-21 14:29:00', 1),
(50, 135, 22, 'Ticket Re-Abierto...', '2022-03-21 14:29:07', 1),
(51, 136, 22, 'Ticket Re-Abierto...', '2022-03-21 14:29:09', 1),
(52, 138, 22, 'Ticket Re-Abierto...', '2022-03-21 14:29:13', 1),
(53, 137, 22, 'Ticket Re-Abierto...', '2022-03-21 14:29:17', 1),
(54, 138, 22, 'Ticket Cerrado...', '2022-03-21 14:31:05', 1),
(55, 139, 22, 'Ticket Re-Abierto...', '2022-03-21 14:39:19', 1),
(56, 142, 22, 'Ticket Re-Abierto...', '2022-03-21 14:46:33', 1),
(57, 142, 194, 'solucion', '2022-03-21 14:48:10', 1),
(58, 144, 22, 'Ticket Re-Abierto...', '2022-03-21 14:56:16', 1),
(59, 4, 22, 'Buen dias se procedera a realizar revision del digiturno.<br>', '2022-03-22 09:14:21', 1),
(60, 4, 22, 'Ticket Cerrado...', '2022-03-22 09:16:14', 1),
(61, 4, 22, 'Ticket Re-Abierto...', '2022-03-22 09:17:39', 1),
(62, 4, 22, 'Se revisa punto de red. y se valida correcto funcionamiento.<br>', '2022-03-22 09:17:58', 1),
(63, 4, 22, 'Ticket Cerrado...', '2022-03-22 09:18:02', 1),
(64, 4, 22, 'Ticket Re-Abierto...', '2022-03-22 09:18:30', 1),
(65, 4, 22, 'Se realiza revision<br>', '2022-03-22 09:18:49', 1),
(66, 4, 22, 'Ticket Cerrado...', '2022-03-22 09:18:56', 1),
(67, 4, 22, 'Ticket Re-Abierto...', '2022-03-22 09:33:22', 1),
(68, 4, 22, 'kjashfkjashfkjHSFKJhfdkjhSKJ', '2022-03-22 09:33:30', 1),
(69, 4, 22, 'Ticket Cerrado...', '2022-03-22 09:33:40', 1),
(70, 4, 22, 'Ticket Re-Abierto...', '2022-03-22 09:33:58', 1),
(71, 4, 22, 'Ticket Cerrado...', '2022-03-22 13:01:31', 1),
(72, 5, 22, 'Ticket Cerrado...', '2022-03-22 13:01:45', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tm_categoria`
--

CREATE TABLE `tm_categoria` (
  `cat_id` int(255) NOT NULL,
  `cat_nom` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `est` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tm_categoria`
--

INSERT INTO `tm_categoria` (`cat_id`, `cat_nom`, `est`) VALUES
(1, 'Equipos de computo', 1),
(2, 'Accesorios', 1),
(3, 'Digiturno', 1),
(4, 'Impresion', 1),
(5, 'Correo', 1),
(6, 'One Drive', 1),
(7, 'Sharepoint', 1),
(8, 'Teams', 1),
(9, 'Gomedisys', 1),
(10, 'SAP', 1),
(11, 'Novasoft', 1),
(12, 'Facture', 1),
(13, 'Mipres', 1),
(14, 'Data Rutas', 1),
(15, 'Teams Health', 1),
(16, 'Pagina Web', 1),
(17, 'PBX', 1),
(18, 'Software', 1),
(19, 'Analitica', 1),
(20, 'Pilar', 1),
(21, 'Red - Networking', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tm_impacto`
--

CREATE TABLE `tm_impacto` (
  `impa_id` int(255) NOT NULL,
  `impa_nom` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `est` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tm_impacto`
--

INSERT INTO `tm_impacto` (`impa_id`, `impa_nom`, `est`) VALUES
(1, 'Media', 1),
(2, 'Baja', 1),
(3, 'Alta', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tm_prioridad`
--

CREATE TABLE `tm_prioridad` (
  `pri_id` int(11) NOT NULL,
  `pri_nom` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `est` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tm_prioridad`
--

INSERT INTO `tm_prioridad` (`pri_id`, `pri_nom`, `est`) VALUES
(1, 'Alta', 1),
(2, 'Media', 1),
(3, 'Baja', 1),
(4, 'Urgente', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tm_reportes`
--

CREATE TABLE `tm_reportes` (
  `report_id` int(10) NOT NULL,
  `report_nom` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `est` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tm_sede`
--

CREATE TABLE `tm_sede` (
  `sedcat_id` int(11) NOT NULL,
  `sedcat_nom` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `est` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tm_sede`
--

INSERT INTO `tm_sede` (`sedcat_id`, `sedcat_nom`, `est`) VALUES
(1, 'Americas', 1),
(2, 'Calle 98', 1),
(3, 'Cartagena', 1),
(4, 'Duitama', 1),
(5, 'Bulevar', 1),
(6, 'San Martin', 1),
(7, 'Sogamoso', 1),
(8, 'Trabajo en casa', 1),
(9, 'Tunja', 1),
(10, 'Administrativa', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tm_subcategoria`
--

CREATE TABLE `tm_subcategoria` (
  `subcat_id` int(255) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `subcat_nom` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `est` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tm_subcategoria`
--

INSERT INTO `tm_subcategoria` (`subcat_id`, `cat_id`, `subcat_nom`, `est`) VALUES
(1, 1, 'Entrega de equipos de computo', 1),
(2, 2, 'Entrega cambio de mouse', 1),
(3, 1, 'Mantenimiento correctivo equipos de computo', 1),
(4, 1, 'Repotenciación equipo de computo', 1),
(5, 1, 'Mantenimiento preventivo equipo de computo', 1),
(6, 1, 'Cambio equipo de computo', 1),
(7, 2, 'Entrega y/o cambio de mouse y teclado', 1),
(8, 2, 'Entrega y/o cambio de diadema', 1),
(9, 2, 'Entrega y/o cambio de cableado de audio, video , red, energia otros', 1),
(10, 2, 'Entrega y/o cambio de adaptadores audio, video, red', 1),
(11, 1, 'Otros', 1),
(12, 2, 'Entrega y/o cambio de pantallas', 1),
(13, 2, 'Falla con teléfono IP físico', 1),
(14, 2, 'Falla con teléfono IP físico', 1),
(15, 2, 'Entrega y/o cambio de tablet', 1),
(16, 2, 'Entrega y/o cambio de Tv', 1),
(17, 4, 'Falla en bandejas', 1),
(18, 4, 'Falla en puerto de red', 1),
(19, 4, 'Falla con puerto de energía', 1),
(20, 4, 'Falla en escaner', 1),
(21, 4, 'Solicitud de repuestos', 1),
(22, 4, 'Falla por atascos', 1),
(23, 4, 'Solicitud de consumibles', 1),
(24, 3, 'Falla en puerto de red', 1),
(25, 3, 'Falla con puerto de energía', 1),
(26, 3, 'Falla en funcionamiento táctil de atril', 1),
(27, 3, 'Falla en periféricos Atril', 1),
(28, 3, 'Falla visualizador', 1),
(29, 3, 'Falla en cableado video, red, audio, otros', 1),
(30, 21, 'Infraestructura de red', 1),
(31, 21, 'Caída general de red', 1),
(32, 21, 'Falla Wiffi ', 1),
(33, 21, 'Caída general de internet', 1),
(34, 21, 'Falla de internet en equipo de computo', 1),
(35, 21, 'Falla en pagina web', 1),
(36, 21, 'Caída servidor de plataforma', 1),
(37, 21, 'Falla VPN', 1),
(38, 21, 'Otros', 1),
(39, 4, 'Solicitud impresora nueva', 1),
(40, 4, 'Traslado impresora', 1),
(41, 4, 'Instalación de impresora', 1),
(42, 4, 'Cambio o reparación de partes', 1),
(43, 4, 'Fallas en la configuración', 1),
(44, 4, 'Capacitación', 1),
(45, 4, 'Falla al imprimir', 1),
(46, 5, 'Creación cuenta de correo', 1),
(47, 4, 'Otros', 1),
(48, 2, 'Otros', 1),
(49, 5, 'Eliminación cuenta de correo', 1),
(50, 5, 'Creación de Backup', 1),
(51, 5, 'Cambio de contraseña', 1),
(52, 5, 'Creación de grupo', 1),
(53, 5, 'Renombrar cuenta de correo', 1),
(54, 5, 'Asignación de licencia', 1),
(55, 5, 'Crear lista de distribución', 1),
(56, 5, 'Eliminar lista de distribucion', 1),
(57, 5, 'Sincronizar cuenta directorio activo', 1),
(58, 5, 'Redireccionar correo', 1),
(59, 5, 'Fallas en envío y recepción de correos', 1),
(60, 6, 'Falla en carga y descarga de información', 1),
(61, 5, 'Otros', 1),
(62, 6, 'Falla en permisos de acceso', 1),
(63, 6, 'Falla al compartir información', 1),
(64, 6, 'Restaurar información', 1),
(65, 6, 'Migración de información', 1),
(66, 6, 'Otros', 1),
(67, 7, 'Creación de flujo', 1),
(68, 7, 'Automatización de procesos', 1),
(69, 7, 'Creación de herramienta', 1),
(70, 7, 'Falla en carga y descarga de información', 1),
(71, 7, 'Falla al sincronizar información', 1),
(72, 7, 'Fallas de configuración', 1),
(73, 7, 'Otros', 1),
(74, 8, 'Falla en audio y video', 1),
(75, 8, 'Falla calendario', 1),
(76, 8, 'Falla en reuniones y eventos en vivo', 1),
(77, 8, 'Bloqueo aplicativo', 1),
(78, 8, 'Falla con notificaciones', 1),
(79, 8, 'Falla en grabaciones', 1),
(80, 8, 'Falla en ingreso', 1),
(81, 8, 'Otros', 1),
(82, 8, 'Falla con envío y recepción de mensajería', 1),
(83, 9, 'Creación de usuarios', 1),
(84, 9, 'Deshabilitar Usuarios', 1),
(85, 9, 'Cambio de datos de pacientes', 1),
(86, 9, 'Falla con ingreso de pacientes', 1),
(87, 9, 'Egresos e ingresos masivos', 1),
(88, 9, 'Reporte de Lentitud', 1),
(89, 9, 'Asignación de permisos a usuarios', 1),
(90, 9, 'Asignación de reportes a usuarios', 1),
(91, 9, 'Creación formato de historia clínica', 1),
(92, 9, 'Agendas médicos', 1),
(93, 9, 'Asignación de citas', 1),
(94, 9, 'Ingreso de pacientes', 1),
(95, 9, 'Solicitud de mejora modulo', 1),
(96, 9, 'Facturación', 1),
(97, 9, 'Transacciones pendientes', 1),
(98, 9, 'Parametrización de módulos', 1),
(99, 9, 'Activación de pacientes', 1),
(100, 9, 'Restablecimientos de contraseñas', 1),
(101, 9, 'Descarga de historia clínica', 1),
(102, 9, 'Falla historia clínica', 1),
(103, 9, 'Capacitación usuarios', 1),
(104, 9, 'Otros', 1),
(105, 10, 'Asignación de licencias', 1),
(106, 10, 'Asignación de permisos a usuarios', 1),
(107, 10, 'Asignación de reportes a usuarios', 1),
(108, 10, 'Orden de compra', 1),
(109, 10, 'Fallas en la interfaz', 1),
(110, 10, 'Solicitud de mejora', 1),
(111, 10, 'Falla de acceso al sistema', 1),
(112, 10, 'Creación de artículos', 1),
(113, 10, 'Creación de terceros', 1),
(114, 10, 'Capacitación usuarios', 1),
(115, 10, 'Reporte de Lentitud', 1),
(116, 10, 'Otros', 1),
(117, 11, 'Ejecución de empaquetado', 1),
(118, 11, 'Backup de base de datos', 1),
(119, 11, 'Falla en plataforma', 1),
(120, 11, 'Reporte de Lentitud', 1),
(121, 11, 'Actualización de versión', 1),
(122, 11, 'Otros', 1),
(123, 12, 'Validación credenciales de acceso', 1),
(124, 12, 'Falla en plataforma', 1),
(125, 12, 'Escalamiento a proveedor', 1),
(126, 12, 'Actualización Normativa', 1),
(127, 12, 'Otros', 1),
(128, 13, 'Activación de usuarios', 1),
(129, 13, 'Inactivación de usuarios', 1),
(130, 13, 'Otros', 1),
(131, 15, 'Parametrización de agendas', 1),
(132, 15, 'Capacitación de usuarios', 1),
(133, 15, 'Asociación de médicos', 1),
(134, 15, 'Configuración de permisos', 1),
(135, 15, 'Otros', 1),
(136, 16, 'Validaciones con el proveedor', 1),
(137, 16, 'Otros', 1),
(138, 17, 'Configuración de extensión', 1),
(139, 17, 'Caída servidor PBX', 1),
(140, 17, 'Falla de audio', 1),
(141, 17, 'Falla en el IVR', 1),
(142, 17, 'No ingresan llamadas', 1),
(143, 17, 'No salen llamadas', 1),
(144, 17, 'Fallas Asterisk', 1),
(145, 17, 'Falla en reportes Asterisk', 1),
(146, 17, 'Capacitaciones plataforma PBX', 1),
(147, 17, 'Instalación de aplicativos PBX', 1),
(148, 17, 'Configuración IVR', 1),
(149, 17, 'Otros', 1),
(150, 18, 'Instalación de aplicativos', 1),
(151, 18, 'Configuración de aplicativos', 1),
(152, 18, 'Falla en aplicativos', 1),
(153, 18, 'Mantenimiento lógico de equipo', 1),
(154, 18, 'Conexión a servidor FTP', 1),
(155, 18, 'Acceso a carpetas compartidas', 1),
(156, 18, 'Otros', 1),
(157, 3, 'Falla en descarga de reportes', 1),
(158, 3, 'Creación de usuarios', 1),
(159, 3, 'Creación de módulos y servicios', 1),
(160, 3, 'Falla en visualización de turnos', 1),
(161, 3, 'Falla en llamado de turnos', 1),
(162, 3, 'Falla en Atril', 1),
(163, 3, 'Bloqueo de visualizador', 1),
(164, 3, 'Falla en impresión de turno', 1),
(165, 3, 'Otros', 1),
(166, 20, 'Creación de usuarios', 1),
(167, 20, 'Falla de configuración', 1),
(168, 20, 'Fallas de plataforma', 1),
(169, 20, 'Creación de tablero de control', 1),
(170, 20, 'Modificaciones tableros de control', 1),
(171, 20, 'Configuración de permisos', 1),
(172, 20, 'Lentitud en plataforma', 1),
(173, 20, 'Bloqueo de plataforma', 1),
(174, 20, 'Eliminación de usuarios', 1),
(175, 20, 'Solicitud de reportes', 1),
(176, 20, 'Otros', 1),
(177, 19, 'Capacitación', 1),
(178, 19, 'Consultoría', 1),
(179, 19, 'Construcción de solución', 1),
(180, 19, 'Otros', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tm_ticket`
--

CREATE TABLE `tm_ticket` (
  `tick_id` int(11) NOT NULL,
  `usu_id` int(11) DEFAULT NULL,
  `cat_id` int(11) DEFAULT NULL,
  `tick_titulo` varchar(250) COLLATE utf8_spanish_ci DEFAULT NULL,
  `tick_descrip` mediumtext COLLATE utf8_spanish_ci DEFAULT NULL,
  `tick_estado` varchar(15) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fech_crea` datetime DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `usu_asig` int(11) DEFAULT NULL,
  `fech_asig` date DEFAULT NULL,
  `tick_estre` int(11) DEFAULT NULL,
  `tick_comment` varchar(300) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fech_cierre` datetime DEFAULT NULL,
  `pri_id` int(30) DEFAULT NULL,
  `est` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tm_tiposolicitud`
--

CREATE TABLE `tm_tiposolicitud` (
  `tiposol_id` int(11) NOT NULL,
  `tiposol_nom` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `est` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tm_tiposolicitud`
--

INSERT INTO `tm_tiposolicitud` (`tiposol_id`, `tiposol_nom`, `est`) VALUES
(1, 'Solicitud', 1),
(2, 'Incidencia', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tm_usuario`
--

CREATE TABLE `tm_usuario` (
  `usu_id` int(11) NOT NULL,
  `usu_nom` varchar(150) COLLATE utf8_spanish_ci DEFAULT NULL,
  `usu_ape` varchar(150) COLLATE utf8_spanish_ci DEFAULT NULL,
  `usu_correo` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `usu_pass` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `rol_id` int(11) DEFAULT NULL,
  `fech_crea` datetime DEFAULT NULL,
  `fech_modi` datetime DEFAULT NULL,
  `fech_elim` datetime DEFAULT NULL,
  `est` int(11) NOT NULL,
  `primera_vez` int(10) NOT NULL,
  `recuperar_pass` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Tabla Mantenedor de Usuarios';

--
-- Volcado de datos para la tabla `tm_usuario`
--

INSERT INTO `tm_usuario` (`usu_id`, `usu_nom`, `usu_ape`, `usu_correo`, `usu_pass`, `rol_id`, `fech_crea`, `fech_modi`, `fech_elim`, `est`, `primera_vez`, `recuperar_pass`) VALUES
(1, 'thanya', 'lozano', 'tlozano@clinicos.com.co', '25f9e794323b453885f5181f1b624d0b', 2, '2022-02-04 08:17:36', NULL, '2022-02-25 16:23:37', 1, 1, 0),
(2, 'Alfredo', 'Bohorquez García', 'abohorquez@clinicos.com.co', 'e10adc3949ba59abbe56e057f20f883e', 2, '2022-03-20 15:34:46', NULL, NULL, 1, 1, 0),
(3, 'Cristian Arley ', 'Cárdenas Linares', 'ccardenas@clinicos.com.co', 'e10adc3949ba59abbe56e057f20f883e', 2, '2022-03-20 15:38:03', NULL, NULL, 1, 1, 0),
(4, 'Cristian David', 'Casasbuenas Rodríguez', 'ccasasbuenas@clinicos.com.co', 'e10adc3949ba59abbe56e057f20f883e', 2, '2022-03-20 15:39:33', NULL, NULL, 1, 1, 0),
(5, 'Jefrey ', 'Ríos Calderon', 'jrios@clinicos.com.co', 'e10adc3949ba59abbe56e057f20f883e', 2, '2022-03-20 15:40:09', NULL, NULL, 1, 1, 0),
(6, 'Martha Yanet', 'Camacho Ojeda', 'mcamacho@clinicos.com.co', 'e10adc3949ba59abbe56e057f20f883e', 1, '2022-03-20 15:42:50', NULL, NULL, 1, 0, 0),
(7, 'Carlos Damian', 'Morales Olivera', 'cmorales@clinicos.com.co', 'e10adc3949ba59abbe56e057f20f883e', 2, '2022-03-20 15:43:26', NULL, NULL, 1, 1, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `td_documento`
--
ALTER TABLE `td_documento`
  ADD PRIMARY KEY (`doc_id`);

--
-- Indices de la tabla `td_ticketdetalle`
--
ALTER TABLE `td_ticketdetalle`
  ADD PRIMARY KEY (`tickd_id`);

--
-- Indices de la tabla `tm_categoria`
--
ALTER TABLE `tm_categoria`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indices de la tabla `tm_impacto`
--
ALTER TABLE `tm_impacto`
  ADD PRIMARY KEY (`impa_id`);

--
-- Indices de la tabla `tm_prioridad`
--
ALTER TABLE `tm_prioridad`
  ADD PRIMARY KEY (`pri_id`);

--
-- Indices de la tabla `tm_reportes`
--
ALTER TABLE `tm_reportes`
  ADD PRIMARY KEY (`report_id`);

--
-- Indices de la tabla `tm_sede`
--
ALTER TABLE `tm_sede`
  ADD PRIMARY KEY (`sedcat_id`);

--
-- Indices de la tabla `tm_subcategoria`
--
ALTER TABLE `tm_subcategoria`
  ADD PRIMARY KEY (`subcat_id`);

--
-- Indices de la tabla `tm_ticket`
--
ALTER TABLE `tm_ticket`
  ADD PRIMARY KEY (`tick_id`);

--
-- Indices de la tabla `tm_tiposolicitud`
--
ALTER TABLE `tm_tiposolicitud`
  ADD PRIMARY KEY (`tiposol_id`);

--
-- Indices de la tabla `tm_usuario`
--
ALTER TABLE `tm_usuario`
  ADD PRIMARY KEY (`usu_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `td_documento`
--
ALTER TABLE `td_documento`
  MODIFY `doc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `td_ticketdetalle`
--
ALTER TABLE `td_ticketdetalle`
  MODIFY `tickd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT de la tabla `tm_categoria`
--
ALTER TABLE `tm_categoria`
  MODIFY `cat_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `tm_prioridad`
--
ALTER TABLE `tm_prioridad`
  MODIFY `pri_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tm_reportes`
--
ALTER TABLE `tm_reportes`
  MODIFY `report_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tm_sede`
--
ALTER TABLE `tm_sede`
  MODIFY `sedcat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `tm_subcategoria`
--
ALTER TABLE `tm_subcategoria`
  MODIFY `subcat_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=181;

--
-- AUTO_INCREMENT de la tabla `tm_ticket`
--
ALTER TABLE `tm_ticket`
  MODIFY `tick_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tm_tiposolicitud`
--
ALTER TABLE `tm_tiposolicitud`
  MODIFY `tiposol_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tm_usuario`
--
ALTER TABLE `tm_usuario`
  MODIFY `usu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=209;
--
-- Base de datos: `phpmyadmin`
--
CREATE DATABASE IF NOT EXISTS `phpmyadmin` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `phpmyadmin`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__bookmark`
--

CREATE TABLE `pma__bookmark` (
  `id` int(10) UNSIGNED NOT NULL,
  `dbase` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `user` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `label` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `query` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Bookmarks';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__central_columns`
--

CREATE TABLE `pma__central_columns` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_type` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_length` text COLLATE utf8_bin DEFAULT NULL,
  `col_collation` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_isNull` tinyint(1) NOT NULL,
  `col_extra` varchar(255) COLLATE utf8_bin DEFAULT '',
  `col_default` text COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Central list of columns';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__column_info`
--

CREATE TABLE `pma__column_info` (
  `id` int(5) UNSIGNED NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `column_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `comment` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `mimetype` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `input_transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `input_transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Column information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__designer_settings`
--

CREATE TABLE `pma__designer_settings` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `settings_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Settings related to Designer';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__export_templates`
--

CREATE TABLE `pma__export_templates` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `export_type` varchar(10) COLLATE utf8_bin NOT NULL,
  `template_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `template_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved export templates';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__favorite`
--

CREATE TABLE `pma__favorite` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Favorite tables';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__history`
--

CREATE TABLE `pma__history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp(),
  `sqlquery` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='SQL history for phpMyAdmin';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__navigationhiding`
--

CREATE TABLE `pma__navigationhiding` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `item_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `item_type` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Hidden items of navigation tree';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__pdf_pages`
--

CREATE TABLE `pma__pdf_pages` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `page_nr` int(10) UNSIGNED NOT NULL,
  `page_descr` varchar(50) CHARACTER SET utf8 NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='PDF relation pages for phpMyAdmin';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__recent`
--

CREATE TABLE `pma__recent` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Recently accessed tables';

--
-- Volcado de datos para la tabla `pma__recent`
--

INSERT INTO `pma__recent` (`username`, `tables`) VALUES
('root', '[{\"db\":\"clinicos_helpdesk1\",\"table\":\"tm_usuario\"},{\"db\":\"clinicos_helpdesk1\",\"table\":\"tm_ticket\"},{\"db\":\"clinicos_helpdesk1\",\"table\":\"tm_sede\"},{\"db\":\"clinicos_helpdesk1\",\"table\":\"tm_prioridad\"},{\"db\":\"clinicos_helpdesk1\",\"table\":\"tm_categoria\"},{\"db\":\"clinicos_helpdesk1\",\"table\":\"tm_subcategoria\"},{\"db\":\"clinicos_helpdesk1\",\"table\":\"tm_impacto\"},{\"db\":\"clinicos_helpdesk1\",\"table\":\"td_ticketdetalle\"},{\"db\":\"clinicos_helpdesk1\",\"table\":\"tm_tiposolicitud\"},{\"db\":\"clinicos_helpdesk1\",\"table\":\"td_documento\"}]');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__relation`
--

CREATE TABLE `pma__relation` (
  `master_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Relation table';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__savedsearches`
--

CREATE TABLE `pma__savedsearches` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved searches';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__table_coords`
--

CREATE TABLE `pma__table_coords` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `pdf_page_number` int(11) NOT NULL DEFAULT 0,
  `x` float UNSIGNED NOT NULL DEFAULT 0,
  `y` float UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table coordinates for phpMyAdmin PDF output';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__table_info`
--

CREATE TABLE `pma__table_info` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `display_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__table_uiprefs`
--

CREATE TABLE `pma__table_uiprefs` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `prefs` text COLLATE utf8_bin NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tables'' UI preferences';

--
-- Volcado de datos para la tabla `pma__table_uiprefs`
--

INSERT INTO `pma__table_uiprefs` (`username`, `db_name`, `table_name`, `prefs`, `last_update`) VALUES
('root', 'clinicos_helpdesk1', 'td_documento', '{\"sorted_col\":\"`tick_id`  DESC\"}', '2022-02-09 13:09:17'),
('root', 'clinicos_helpdesk1', 'tm_subcategoria', '{\"CREATE_TIME\":\"2022-02-05 18:01:10\",\"col_order\":[0,1,2,3],\"col_visib\":[1,1,1,1]}', '2022-02-25 15:49:22'),
('root', 'clinicos_helpdesk1', 'tm_ticket', '{\"sorted_col\":\"`tick_id`  DESC\",\"CREATE_TIME\":\"2022-02-22 14:49:17\"}', '2022-03-23 19:09:47'),
('root', 'clinicos_helpdesk1', 'tm_usuario', '{\"sorted_col\":\"`tm_usuario`.`primera_vez` ASC\"}', '2022-03-20 23:05:13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__tracking`
--

CREATE TABLE `pma__tracking` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `version` int(10) UNSIGNED NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `schema_snapshot` text COLLATE utf8_bin NOT NULL,
  `schema_sql` text COLLATE utf8_bin DEFAULT NULL,
  `data_sql` longtext COLLATE utf8_bin DEFAULT NULL,
  `tracking` set('UPDATE','REPLACE','INSERT','DELETE','TRUNCATE','CREATE DATABASE','ALTER DATABASE','DROP DATABASE','CREATE TABLE','ALTER TABLE','RENAME TABLE','DROP TABLE','CREATE INDEX','DROP INDEX','CREATE VIEW','ALTER VIEW','DROP VIEW') COLLATE utf8_bin DEFAULT NULL,
  `tracking_active` int(1) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Database changes tracking for phpMyAdmin';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__userconfig`
--

CREATE TABLE `pma__userconfig` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `config_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User preferences storage for phpMyAdmin';

--
-- Volcado de datos para la tabla `pma__userconfig`
--

INSERT INTO `pma__userconfig` (`username`, `timevalue`, `config_data`) VALUES
('root', '2022-04-01 14:56:07', '{\"Console\\/Mode\":\"collapse\",\"lang\":\"es\",\"DefaultConnectionCollation\":\"utf8_spanish_ci\",\"NavigationWidth\":388}');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__usergroups`
--

CREATE TABLE `pma__usergroups` (
  `usergroup` varchar(64) COLLATE utf8_bin NOT NULL,
  `tab` varchar(64) COLLATE utf8_bin NOT NULL,
  `allowed` enum('Y','N') COLLATE utf8_bin NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User groups with configured menu items';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__users`
--

CREATE TABLE `pma__users` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `usergroup` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Users and their assignments to user groups';

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pma__central_columns`
--
ALTER TABLE `pma__central_columns`
  ADD PRIMARY KEY (`db_name`,`col_name`);

--
-- Indices de la tabla `pma__column_info`
--
ALTER TABLE `pma__column_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `db_name` (`db_name`,`table_name`,`column_name`);

--
-- Indices de la tabla `pma__designer_settings`
--
ALTER TABLE `pma__designer_settings`
  ADD PRIMARY KEY (`username`);

--
-- Indices de la tabla `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_user_type_template` (`username`,`export_type`,`template_name`);

--
-- Indices de la tabla `pma__favorite`
--
ALTER TABLE `pma__favorite`
  ADD PRIMARY KEY (`username`);

--
-- Indices de la tabla `pma__history`
--
ALTER TABLE `pma__history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`,`db`,`table`,`timevalue`);

--
-- Indices de la tabla `pma__navigationhiding`
--
ALTER TABLE `pma__navigationhiding`
  ADD PRIMARY KEY (`username`,`item_name`,`item_type`,`db_name`,`table_name`);

--
-- Indices de la tabla `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  ADD PRIMARY KEY (`page_nr`),
  ADD KEY `db_name` (`db_name`);

--
-- Indices de la tabla `pma__recent`
--
ALTER TABLE `pma__recent`
  ADD PRIMARY KEY (`username`);

--
-- Indices de la tabla `pma__relation`
--
ALTER TABLE `pma__relation`
  ADD PRIMARY KEY (`master_db`,`master_table`,`master_field`),
  ADD KEY `foreign_field` (`foreign_db`,`foreign_table`);

--
-- Indices de la tabla `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_savedsearches_username_dbname` (`username`,`db_name`,`search_name`);

--
-- Indices de la tabla `pma__table_coords`
--
ALTER TABLE `pma__table_coords`
  ADD PRIMARY KEY (`db_name`,`table_name`,`pdf_page_number`);

--
-- Indices de la tabla `pma__table_info`
--
ALTER TABLE `pma__table_info`
  ADD PRIMARY KEY (`db_name`,`table_name`);

--
-- Indices de la tabla `pma__table_uiprefs`
--
ALTER TABLE `pma__table_uiprefs`
  ADD PRIMARY KEY (`username`,`db_name`,`table_name`);

--
-- Indices de la tabla `pma__tracking`
--
ALTER TABLE `pma__tracking`
  ADD PRIMARY KEY (`db_name`,`table_name`,`version`);

--
-- Indices de la tabla `pma__userconfig`
--
ALTER TABLE `pma__userconfig`
  ADD PRIMARY KEY (`username`);

--
-- Indices de la tabla `pma__usergroups`
--
ALTER TABLE `pma__usergroups`
  ADD PRIMARY KEY (`usergroup`,`tab`,`allowed`);

--
-- Indices de la tabla `pma__users`
--
ALTER TABLE `pma__users`
  ADD PRIMARY KEY (`username`,`usergroup`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pma__column_info`
--
ALTER TABLE `pma__column_info`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pma__history`
--
ALTER TABLE `pma__history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  MODIFY `page_nr` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Base de datos: `test`
--
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `test`;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
