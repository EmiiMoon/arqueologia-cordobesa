-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 13-01-2021 a las 18:28:10
-- Versión del servidor: 5.7.24
-- Versión de PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `markers`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `markers`
--

CREATE TABLE `markers` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `info` text NOT NULL,
  `lat` float NOT NULL,
  `lng` float NOT NULL,
  `img` text,
  `video` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `markers`
--

INSERT INTO `markers` (`id`, `name`, `info`, `lat`, `lng`, `img`, `video`) VALUES
(6, 'Puente Romano de Córdoba', '<p>El puente romano de Córdoba está situado sobre el río Guadalquivir a su paso por Córdoba, y une el barrio del Campo de la Verdad con el Barrio de la Catedral.</p>', 37.8777, -4.77895, NULL, '                                                                                                                                                                                                <iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/khVZpIM1Jhs\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>                                                                                                                                                                         '),
(7, 'Minas Romanas de Calcopirita en Santa María de Trassierra', '', 37.9411, -4.88938, NULL, '                      <iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/CVzQZ4Bq8yg\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>              '),
(8, 'Puente Romano de Villa del Río', '<p>El Puente Romano de Villa del Río salva el arroyo Salado de Porcuna a pocos kilómetros de su desembocadura en el Río Guadalquivir. Se trata del monumento más antiguo de esta localidad. Desde su construcción, dio continuidad a la Vía Augusta a su paso por la antigua ciudad de Ripa, situada en los alrededores de Villa del Río.</p>', 37.9885, -4.27187, NULL, '     <iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/STDgDIWzWLU\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>                      '),
(9, 'Puente Romano sobre el Arroyo de Linares', '<p>Puente de un arco realizado con bloques de piedra caliza perfectamente labrados y ensamblados. El arco es de medio punto, tiene una flecha de 1,30 m y una luz de 2,55. El ancho de la vía es 2,26 m.&nbsp;</p>', 37.9536, -4.75887, NULL, '    <iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/nrO1gPffzo4\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>                                '),
(10, 'Acueducto Aqua Vetus Augusta de la Fuente del Elefante', '<p>El acueducto de Valdepuentes, también conocido como Aqua Vetus o Aqua Augusta, ​ era uno de los tres acueductos que, junto al Aqua Fontis Aureae y al Aqua Nova Domitiana Augusta, en época romana, suministraban agua a la ciudad de Corduba.</p>', 37.892, -4.87896, NULL, '              <iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/bn0JeMEHdSk\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>                      '),
(11, 'Acueducto Romano en la Estación de Autobuses de Córdoba', '<p>Restos integrados en el aparcamiento de la <strong>estación de autobuses de Córdoba</strong>. El Aqua Fontis Aureae es uno de los tres <strong>acueductos</strong> que, junto al Aqua Vetus y al Aqua Nova Domitiana Augusta, en época <strong>romana</strong>, suministraban agua a la ciudad de Corduba.</p>', 37.8892, -4.78961, NULL, '                    <iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/dHup4nxJISY\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>                '),
(12, 'Puente Romano sobre Arroyo Pedroches', '<p>El <strong>puente romano sobre el arroyo Pedroches</strong> en Córdoba se ubica en el camino de la Casilla de los Ciegos al Marrubial, probablemente en el trazado de la antigua Vía ad Emeritam que unía Córdoba con Mérida.</p>', 37.9043, -4.75601, NULL, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/FnrcBvxumY4\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>'),
(13, 'a', '<p>Información del marcador</p>', 1, 1, NULL, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/khVZpIM1Jhs\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>'),
(14, 'Prueba', '<p>Información del marcador</p>', 0.5, 0.5, NULL, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(6, 'admin', '$2y$10$sCEvDrODfUOEalU9KZ/Pu.fVj8dQfldYDrGtYbDLg7gS003faqvNu'),
(7, 'i52lumee', '$2y$10$C2giMA9zPy8Y3oudfS1BpelI4EESwp07y4sGqG50g17Xu3vciu18i');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `markers`
--
ALTER TABLE `markers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `markers`
--
ALTER TABLE `markers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
