-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-08-2025 a las 05:28:53
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `el_santi`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `id_admini` int(15) NOT NULL,
  `nombre_admini` varchar(50) DEFAULT NULL,
  `contraseña_admini` varchar(20) DEFAULT NULL,
  `email_admini` varchar(40) DEFAULT NULL,
  `telefono_admini` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`id_admini`, `nombre_admini`, `contraseña_admini`, `email_admini`, `telefono_admini`) VALUES
(1, 'leoxd', '14', 'leowww@gmail.com', '5624603499');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra`
--

CREATE TABLE `compra` (
  `id_compra` int(11) NOT NULL,
  `fecha` varchar(20) DEFAULT NULL,
  `direccion` varchar(50) DEFAULT NULL,
  `id_usu` int(11) DEFAULT NULL,
  `id_producto` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `informacion`
--

CREATE TABLE `informacion` (
  `id_informacion` int(11) NOT NULL,
  `titulo` varchar(40) DEFAULT NULL,
  `contenido` varchar(200) DEFAULT NULL,
  `id_admini` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `informacion`
--

INSERT INTO `informacion` (`id_informacion`, `titulo`, `contenido`, `id_admini`) VALUES
(1, 'Manzana Roja', 'La manzana contiene fibra, vitamina C y antioxidantes. Aporta aproximadamente 52 kcal por cada 100g.', 1),
(2, 'Plátano', 'Rico en potasio, vitamina B6 y carbohidratos. Ideal para energía rápida. 89 kcal por cada 100g.', 1),
(3, 'Zanahoria', 'Buena fuente de vitamina A y antioxidantes. Mejora la visión y la piel. 41 kcal por cada 100g.', 1),
(4, 'Leche Deslactosada', 'Buena fuente de calcio y proteína. Ideal para intolerantes a la lactosa. 42 kcal por cada 100ml.', 1),
(5, 'Pan Integral', 'Contiene fibra, hierro y vitamina B. Mejora la digestión. 247 kcal por cada 100g.', 1),
(6, 'Avena', 'Alto contenido en fibra soluble. Ayuda a reducir el colesterol. 389 kcal por cada 100g.', 1),
(7, 'Yogurt Natural', 'Rico en probióticos, calcio y proteínas. Bueno para el sistema digestivo. 59 kcal por cada 100g.', 1),
(8, 'Pollo Asado', 'Fuente de proteína magra. Ideal para dietas altas en proteína. 165 kcal por cada 100g.', 1),
(9, 'Espinaca', 'Alta en hierro, calcio y antioxidantes. Fortalece huesos y sistema inmune. 23 kcal por cada 100g.', 1),
(10, 'Naranja', 'Rica en vitamina C y agua. Mejora la inmunidad y la hidratación. 47 kcal por cada 100g.', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_producto` int(11) NOT NULL,
  `nombre` varchar(30) DEFAULT NULL,
  `categoria` varchar(20) DEFAULT NULL,
  `precio` int(11) DEFAULT NULL,
  `id_admini` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `nombre`, `categoria`, `precio`, `id_admini`) VALUES
(1, 'Arroz blanco 1kg', 'Granos', 200, NULL),
(2, 'Frijoles rojos 500g', 'Granos', 200, NULL),
(3, 'Aceite vegetal 900ml', 'Aceites', 8500, NULL),
(4, 'Azúcar blanca 1kg', 'Endulzantes', 2200, NULL),
(5, 'Sal refinada 500g', 'Condimentos', 1800, NULL),
(6, 'Harina de trigo 1kg', 'Harinas', 2900, NULL),
(7, 'Pasta espagueti 500g', 'Pastas', 3100, NULL),
(8, 'Atún en lata 170g', 'Enlatados', 100, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usu` int(11) NOT NULL,
  `nombre_apellidos` varchar(80) NOT NULL,
  `nombre_usu` varchar(30) DEFAULT NULL,
  `contrasena_usu` varchar(20) DEFAULT NULL,
  `email_usu` varchar(30) DEFAULT NULL,
  `telefono_usu` varchar(15) DEFAULT NULL,
  `direccion_usu` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usu`, `nombre_apellidos`, `nombre_usu`, `contrasena_usu`, `email_usu`, `telefono_usu`, `direccion_usu`) VALUES
(1, '', 'leo', '12', 'jaimewwwleonardo@gmail.com', '5616329798', 'si'),
(2, 'layla', 'lala123', '123', 'lala', '5616329798', 'cuautitlan izcalli'),
(3, 'layla', 'pato', '123', 'xdxdxdxdd', '5616329797', 'cuautitlan izcalli');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`id_admini`);

--
-- Indices de la tabla `compra`
--
ALTER TABLE `compra`
  ADD PRIMARY KEY (`id_compra`),
  ADD KEY `id_usu` (`id_usu`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `informacion`
--
ALTER TABLE `informacion`
  ADD PRIMARY KEY (`id_informacion`),
  ADD KEY `id_admini` (`id_admini`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `id_admini` (`id_admini`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usu`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administrador`
--
ALTER TABLE `administrador`
  MODIFY `id_admini` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `compra`
--
ALTER TABLE `compra`
  MODIFY `id_compra` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `informacion`
--
ALTER TABLE `informacion`
  MODIFY `id_informacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `compra`
--
ALTER TABLE `compra`
  ADD CONSTRAINT `compra_ibfk_1` FOREIGN KEY (`id_usu`) REFERENCES `usuario` (`id_usu`),
  ADD CONSTRAINT `compra_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id_producto`);

--
-- Filtros para la tabla `informacion`
--
ALTER TABLE `informacion`
  ADD CONSTRAINT `informacion_ibfk_1` FOREIGN KEY (`id_admini`) REFERENCES `administrador` (`id_admini`);

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`id_admini`) REFERENCES `administrador` (`id_admini`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
