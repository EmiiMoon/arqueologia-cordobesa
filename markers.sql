-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3307
-- Tiempo de generación: 22-04-2021 a las 15:52:18
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
  `lng` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `markers`
--

INSERT INTO `markers` (`id`, `name`, `info`, `lat`, `lng`) VALUES
(6, 'Puente Romano de Córdoba', '<h4>Puente romano</h4><p>El puente romano de Córdoba está situado sobre el río Guadalquivir a su paso por Córdoba, y une el barrio del Campo de la Verdad con el Barrio de la Catedral.</p><p>&nbsp;</p><figure class=\"media\"><div data-oembed-url=\"https://www.youtube.com/watch?v=khVZpIM1Jhs\"><div style=\"position: relative; padding-bottom: 100%; height: 0; padding-bottom: 56.2493%;\"><iframe src=\"https://www.youtube.com/embed/khVZpIM1Jhs\" style=\"position: absolute; width: 100%; height: 100%; top: 0; left: 0;\" frameborder=\"0\" allow=\"autoplay; encrypted-media\" allowfullscreen=\"\"></iframe></div></div></figure><p>&nbsp;</p>', 37.8777, -4.77895),
(7, 'Minas Romanas de Calcopirita en Santa María de Trassierra', '<h4>Minas Romanas de Calcopirita en Santa María de Trassierra</h4><p>&nbsp;</p><figure class=\"media\"><div data-oembed-url=\"https://www.youtube.com/watch?v=CVzQZ4Bq8yg\"><div style=\"position: relative; padding-bottom: 100%; height: 0; padding-bottom: 56.2493%;\"><iframe src=\"https://www.youtube.com/embed/CVzQZ4Bq8yg\" style=\"position: absolute; width: 100%; height: 100%; top: 0; left: 0;\" frameborder=\"0\" allow=\"autoplay; encrypted-media\" allowfullscreen=\"\"></iframe></div></div></figure><p>&nbsp;</p>', 37.9411, -4.88938),
(8, 'Puente Romano de Villa del Río', '<h4>Puente Romano de Villa del Río</h4><p>El Puente Romano de Villa del Río salva el arroyo Salado de Porcuna a pocos kilómetros de su desembocadura en el Río Guadalquivir. Se trata del monumento más antiguo de esta localidad. Desde su construcción, dio continuidad a la Vía Augusta a su paso por la antigua ciudad de Ripa, situada en los alrededores de Villa del Río.</p><p>&nbsp;</p><figure class=\"media\"><div data-oembed-url=\"https://www.youtube.com/watch?v=STDgDIWzWLU\"><div style=\"position: relative; padding-bottom: 100%; height: 0; padding-bottom: 56.2493%;\"><iframe src=\"https://www.youtube.com/embed/STDgDIWzWLU\" style=\"position: absolute; width: 100%; height: 100%; top: 0; left: 0;\" frameborder=\"0\" allow=\"autoplay; encrypted-media\" allowfullscreen=\"\"></iframe></div></div></figure><p>&nbsp;</p>', 37.9885, -4.27187),
(9, 'Puente Romano sobre el Arroyo de Linares', '<h4>Puente Romano sobre el Arroyo de Linares</h4><p>Puente de un arco realizado con bloques de piedra caliza perfectamente labrados y ensamblados. El arco es de medio punto, tiene una flecha de 1,30 m y una luz de 2,55. El ancho de la vía es 2,26 m.&nbsp;</p><p>&nbsp;</p><figure class=\"media\"><div data-oembed-url=\"https://www.youtube.com/watch?v=nrO1gPffzo4\"><div style=\"position: relative; padding-bottom: 100%; height: 0; padding-bottom: 56.2493%;\"><iframe src=\"https://www.youtube.com/embed/nrO1gPffzo4\" style=\"position: absolute; width: 100%; height: 100%; top: 0; left: 0;\" frameborder=\"0\" allow=\"autoplay; encrypted-media\" allowfullscreen=\"\"></iframe></div></div></figure><p>&nbsp;</p>', 37.9536, -4.75887),
(10, 'Acueducto Aqua Vetus Augusta de la Fuente del Elefante', '<h4>Acueducto Aqua Vetus Augusta de la Fuente del Elefante</h4><p>El acueducto de Valdepuentes, también conocido como Aqua Vetus o Aqua Augusta, ​ era uno de los tres acueductos que, junto al Aqua Fontis Aureae y al Aqua Nova Domitiana Augusta, en época romana, suministraban agua a la ciudad de Corduba.</p><p>&nbsp;</p><figure class=\"media\"><div data-oembed-url=\"https://www.youtube.com/watch?v=bn0JeMEHdSk\"><div style=\"position: relative; padding-bottom: 100%; height: 0; padding-bottom: 56.2493%;\"><iframe src=\"https://www.youtube.com/embed/bn0JeMEHdSk\" style=\"position: absolute; width: 100%; height: 100%; top: 0; left: 0;\" frameborder=\"0\" allow=\"autoplay; encrypted-media\" allowfullscreen=\"\"></iframe></div></div></figure><p>&nbsp;</p>', 37.892, -4.87896),
(11, 'Acueducto Romano en la Estación de Autobuses de Córdoba', '<h4>Acueducto Romano en la Estación de Autobuses de Córdoba</h4><p>Restos integrados en el aparcamiento de la <strong>estación de autobuses de Córdoba</strong>. El Aqua Fontis Aureae es uno de los tres <strong>acueductos</strong> que, junto al Aqua Vetus y al Aqua Nova Domitiana Augusta, en época <strong>romana</strong>, suministraban agua a la ciudad de Corduba.</p><p>&nbsp;</p><figure class=\"media\"><div data-oembed-url=\"https://www.youtube.com/watch?v=dHup4nxJISY\"><div style=\"position: relative; padding-bottom: 100%; height: 0; padding-bottom: 56.2493%;\"><iframe src=\"https://www.youtube.com/embed/dHup4nxJISY\" style=\"position: absolute; width: 100%; height: 100%; top: 0; left: 0;\" frameborder=\"0\" allow=\"autoplay; encrypted-media\" allowfullscreen=\"\"></iframe></div></div></figure><p>&nbsp;</p>', 37.8892, -4.78961),
(12, 'Puente Romano sobre Arroyo Pedroches', '<h4>Puente Romano sobre Arroyo Pedroches</h4><p>El <strong>puente romano sobre el arroyo Pedroches</strong> en Córdoba se ubica en el camino de la Casilla de los Ciegos al Marrubial, probablemente en el trazado de la antigua Vía ad Emeritam que unía Córdoba con Mérida.</p><p>&nbsp;</p><figure class=\"media\"><div data-oembed-url=\"https://www.youtube.com/watch?v=FnrcBvxumY4\"><div style=\"position: relative; padding-bottom: 100%; height: 0; padding-bottom: 56.2493%;\"><iframe src=\"https://www.youtube.com/embed/FnrcBvxumY4\" style=\"position: absolute; width: 100%; height: 100%; top: 0; left: 0;\" frameborder=\"0\" allow=\"autoplay; encrypted-media\" allowfullscreen=\"\"></iframe></div></div></figure><p>&nbsp;</p>', 37.9043, -4.75601),
(17, 'Templo Romano de Córdoba', '<h4>Templo Romano de Córdoba</h4><p>El <strong>templo romano de Córdoba</strong> está ubicado en la ciudad homínima, en España, y fue descubierto en 1951 durante la ampliación del ayuntamiento. Se encuentra situado en el ángulo formado por las calles Claudio Marcelo y Capitulares. No es el único templo que tuvo la ciudad, pero sí fue posiblemente el más importante de todos, así como el único conocido por excavación arqueológica. Es un templo pseudoperíptero, hexástilo y de orden corintio de 32 metros de largo por 16 de ancho.</p><p>&nbsp;</p><figure class=\"media\"><div data-oembed-url=\"https://www.youtube.com/watch?v=n5bKlHi3Ksc\"><div style=\"position: relative; padding-bottom: 100%; height: 0; padding-bottom: 56.2493%;\"><iframe src=\"https://www.youtube.com/embed/n5bKlHi3Ksc\" style=\"position: absolute; width: 100%; height: 100%; top: 0; left: 0;\" frameborder=\"0\" allow=\"autoplay; encrypted-media\" allowfullscreen=\"\"></iframe></div></div></figure><p>&nbsp;</p>', 37.8849, -4.77651),
(18, 'Palacio del Emperador Romano  Maximiano Herculeo', '<h4>Palacio del Emperador Romano Maximiano Herculeo</h4><p>El denominado <strong>palacio de Maximiano Hercúleo</strong> se localiza en el yacimiento arqueológico de Cercadilla en Córdoba. Las investigaciones más rigurosas y científicas han podido demostrar que se trata de un edificio construido por el emperador Maximiano en la época de la primera tetraquía (entre los años 293 y 305), como consecuencia de la dispersión de los centros de poder del imperio romano, por un lado, y debido a las incursiones de piratería franca en la zona del estrecho de Gibraltar, por otro.</p><p>&nbsp;</p><figure class=\"media\"><div data-oembed-url=\"https://www.youtube.com/watch?v=xP-lodzY4bs\"><div style=\"position: relative; padding-bottom: 100%; height: 0; padding-bottom: 56.2493%;\"><iframe src=\"https://www.youtube.com/embed/xP-lodzY4bs\" style=\"position: absolute; width: 100%; height: 100%; top: 0; left: 0;\" frameborder=\"0\" allow=\"autoplay; encrypted-media\" allowfullscreen=\"\"></iframe></div></div></figure><p>&nbsp;</p>', 37.8878, -4.79253),
(19, 'Anfiteatro Romano o Coliseo de Córdoba', '<h4>Anfiteatro Romano o Coliseo de Córdoba</h4><p>El <strong>anfiteatro de Córdoba</strong> es un antiguo anfiteatro romano situado en la ciudad de Córdoba (España). Construido en el siglo I, es el anfiteatro más grande conocido de Hispania y el tercero más grande de todo el imperio tras el Coliseo y el anfiteatro de Cartago, aunque en el momento de su construcción fue el más grande nunca construido. El anfiteatro estuvo en activo hasta principios del siglo IV.​</p><p>En los últimos años se ha planteado la construcción de un centro de interpretación del anfiteatro en la parte trasera de los terrenos del rectorado de la Universidad de Córdoba, lugar en el cual se halla el yacimiento donde se ha encontrado una porción del anfiteatro.</p><p>&nbsp;</p><figure class=\"media\"><div data-oembed-url=\"https://www.youtube.com/watch?v=cSC5D9xgq2M\"><div style=\"position: relative; padding-bottom: 100%; height: 0; padding-bottom: 56.2493%;\"><iframe src=\"https://www.youtube.com/embed/cSC5D9xgq2M\" style=\"position: absolute; width: 100%; height: 100%; top: 0; left: 0;\" frameborder=\"0\" allow=\"autoplay; encrypted-media\" allowfullscreen=\"\"></iframe></div></div></figure><p>&nbsp;</p>', 37.8843, -4.7889),
(20, 'Puente Romano sobre el Arroyo Rabanales', '<h4>Puente Romano sobre el Arroyo Rabanales</h4><p>Se localiza en el Polígono Industrial “Las Quemadas”, entre la calle Noruega y la N-IVa. Debió dar servicio a la Via Augusta en el tramo Alio Itinere a Corduba Castulone, salvando el arroyo de Rabanales. Actualmente fuera de servicio.</p><p>Está construido con sillería de muy buena manufactura y consta de cinco6 bóvedas de medio punto de 3,80 m de luz con igual ancho de pilas. El tímpano presenta pilastras adosadas, que refuerzan el aspecto de solidez, presenta una rasante horizontal y una clara modulación. El puente se encuadraría en el Modelo I de la tipología de puentes romanos de Hispania.</p><p>&nbsp;</p><figure class=\"media\"><div data-oembed-url=\"https://www.youtube.com/watch?v=g491bRwjkjg\"><div style=\"position: relative; padding-bottom: 100%; height: 0; padding-bottom: 56.2493%;\"><iframe src=\"https://www.youtube.com/embed/g491bRwjkjg\" style=\"position: absolute; width: 100%; height: 100%; top: 0; left: 0;\" frameborder=\"0\" allow=\"autoplay; encrypted-media\" allowfullscreen=\"\"></iframe></div></div></figure><p>&nbsp;</p>', 37.903, -4.73228);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
