-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-05-2026 a las 15:05:27
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
-- Base de datos: `spoti_fail-_web2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cancion`
--

CREATE TABLE `cancion` (
  `ID_Cancion` int(11) NOT NULL,
  `Titulo` varchar(45) NOT NULL,
  `Duracion` int(40) NOT NULL,
  `Genero` varchar(40) NOT NULL,
  `Idioma` varchar(40) NOT NULL,
  `Album` varchar(45) NOT NULL,
  `Portada` varchar(255) NOT NULL,
  `Año` year(4) NOT NULL,
  `ID_Interprete` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cancion`
--

INSERT INTO `cancion` (`ID_Cancion`, `Titulo`, `Duracion`, `Genero`, `Idioma`, `Album`, `Portada`, `Año`, `ID_Interprete`) VALUES
(1, 'Arrancármelo', 183, 'Balada', 'Español', 'Oscuro Éxtasis', 'https://www.tiempoar.com.ar/wp-content/uploads/2021/11/web-wos-oscuro-extasis-wos-.jpg', '2022', 1),
(2, 'Melancolía', 215, 'Urbano', 'Español', 'Descartable', 'https://is1-ssl.mzstatic.com/image/thumb/Music211/v4/7b/ad/46/7bad4664-9f0b-a267-120e-fa1cf586dc2b/197190906325.jpg/1200x1200bf-60.jpg', '2024', 1),
(3, 'Canguro', 210, 'Hip Hop', 'Español', 'Caravana', 'https://i.discogs.com/qh-4Ts5P4EIPt-8oJMOZNWqqftSzG7rzP03i5-1dDgE/rs:fit/g:sm/q:90/h:600/w:592/czM6Ly9kaXNjb2dz/LWRhdGFiYXNlLWlt/YWdlcy9SLTE1NTkw/NTUwLTE1OTQxNDkx/MjYtNTM0NC5qcGVn.jpeg', '2019', 1),
(4, 'Terraza', 195, 'Urbano', 'Español', 'Caravana', 'https://i.discogs.com/qh-4Ts5P4EIPt-8oJMOZNWqqftSzG7rzP03i5-1dDgE/rs:fit/g:sm/q:90/h:600/w:592/czM6Ly9kaXNjb2dz/LWRhdGFiYXNlLWlt/YWdlcy9SLTE1NTkw/NTUwLTE1OTQxNDkx/MjYtNTM0NC5qcGVn.jpeg', '2019', 1),
(5, 'Culpa', 202, 'Rock', 'Español', 'Oscuro Éxtasis', 'https://www.tiempoar.com.ar/wp-content/uploads/2021/11/web-wos-oscuro-extasis-wos-.jpg', '2021', 1),
(6, 'Que se mejoren', 198, 'Rock', 'Español', 'Oscuro Éxtasis', 'https://www.tiempoar.com.ar/wp-content/uploads/2021/11/web-wos-oscuro-extasis-wos-.jpg', '2021', 1),
(7, 'Andrómeda', 188, 'Hip Hop', 'Español', 'Single', 'https://tse1.mm.bing.net/th/id/OIP.HxvxZRvTU_8IvULXsxm7PgHaHa?rs=1&pid=ImgDetMain&o=7&rm=3', '2018', 1),
(8, 'Goteo', 170, 'Trap', 'Español', 'Caravana', 'https://i.discogs.com/qh-4Ts5P4EIPt-8oJMOZNWqqftSzG7rzP03i5-1dDgE/rs:fit/g:sm/q:90/h:600/w:592/czM6Ly9kaXNjb2dz/LWRhdGFiYXNlLWlt/YWdlcy9SLTE1NTkw/NTUwLTE1OTQxNDkx/MjYtNTM0NC5qcGVn.jpeg', '2019', 1),
(9, 'Púrpura', 185, 'Hip Hop', 'Español', 'Single', 'https://i.musicaimg.com/letras/max/2402815.jpg', '2018', 1),
(10, 'Quema', 200, 'Urbano', 'Español', 'Descartable', 'https://is1-ssl.mzstatic.com/image/thumb/Music211/v4/7b/ad/46/7bad4664-9f0b-a267-120e-fa1cf586dc2b/197190906325.jpg/1200x1200bf-60.jpg', '2024', 1),
(11, 'She Dont Give a FO', 210, 'Trap', 'Español', 'Single', 'https://tse2.mm.bing.net/th/id/OIP.-x90N0hdj3I3Akcn9J1OMgHaHa?rs=1&pid=ImgDetMain&o=7&rm=3', '2017', 2),
(12, 'Goteo', 180, 'Trap', 'Español', 'Súper Sangre Joven', 'https://tse4.mm.bing.net/th/id/OIP.Sab5XVjDOSbd0EPAXkR1QgHaHa?rs=1&pid=ImgDetMain&o=7&rm=3', '2019', 2),
(13, 'Givenchy', 185, 'Trap', 'Español', 'Temporada de Reggaetón 2', 'https://tse2.mm.bing.net/th/id/OIP.eRLzcKv7QbEWxJkvl6tztAHaHa?rs=1&pid=ImgDetMain&o=7&rm=3', '2022', 2),
(14, 'Malbec', 190, 'Trap', 'Español', 'Desde el Fin del Mundo', 'https://ik.imagekit.io/loudcave/wp-content/uploads/2021/05/4ab07de8032ab00b91b04061a687ad00.1000x1000x1.png', '2021', 2),
(15, 'Rockstar', 195, 'Trap', 'Español', 'Single', 'https://i.scdn.co/image/ab67616d0000b2732f405d5d63a07b98ced1521a', '2018', 2),
(16, 'Harakiri', 175, 'Trap', 'Español', 'Antes de Ameri', 'https://www.lahiguera.net/musicalia/artistas/duki/disco/12974/duki_antes_de_ameri-portada.jpg', '2023', 2),
(17, 'Hello Cotto', 205, 'Trap', 'Español', 'Single', 'https://images.genius.com/402b312287a62f5bd941431b569c1d8e.632x632x1.png', '2017', 2),
(18, 'Top 5', 182, 'Reggaetón', 'Español', 'Temporada de Reggaetón', 'https://tse2.mm.bing.net/th/id/OIP.eRLzcKv7QbEWxJkvl6tztAHaHa?rs=1&pid=ImgDetMain&o=7&rm=3', '2021', 2),
(19, 'Si te sentís sola', 190, 'Trap', 'Español', 'Single', 'https://i1.sndcdn.com/artworks-000300289377-5iicuz-t500x500.jpg', '2018', 2),
(20, 'Apollo 13', 188, 'Trap', 'Español', 'Antes de Ameri', 'https://www.lahiguera.net/musicalia/artistas/duki/disco/12974/duki_antes_de_ameri-portada.jpg', '2023', 2),
(21, 'Shakira Session 53', 210, 'Pop', 'Español', 'BZRP Music Sessions', 'https://is1-ssl.mzstatic.com/image/thumb/Music116/v4/a1/93/2b/a1932b39-a892-6705-1afe-1c4908fa1a3f/197187714988.jpg/1200x1200bf-60.jpg', '2023', 3),
(22, 'Quevedo Session 52', 195, 'Dance', 'Español', 'BZRP Music Sessions', 'https://tse4.mm.bing.net/th/id/OIP.Mr8k6dPSbagbSUB5zc1j8wHaHa?rs=1&pid=ImgDetMain&o=7&rm=3', '2022', 3),
(23, 'Nathy Peluso Session 36', 188, 'Hip Hop', 'Español', 'BZRP Music Sessions', 'https://tse3.mm.bing.net/th/id/OIP.Wr1LyDGn7O7YozvUycKcAQHaHa?rs=1&pid=ImgDetMain&o=7&rm=3', '2020', 3),
(24, 'Residente Session 49', 520, 'Hip Hop', 'Español', 'BZRP Music Sessions', 'https://tse2.mm.bing.net/th/id/OIP.lzC13nbTOgsMbfzBZzGOAQHaHa?rs=1&pid=ImgDetMain&o=7&rm=3', '2022', 3),
(25, 'Villano Antillano Session 51', 185, 'Trap', 'Español', 'BZRP Music Sessions', 'https://is1-ssl.mzstatic.com/image/thumb/Music122/v4/d1/40/36/d14036a6-324e-44a3-4358-37d2aa95389a/196925145725.jpg/1200x1200bf-60.jpg', '2022', 3),
(26, 'Peso Pluma Session 55', 190, 'Corrido', 'Español', 'BZRP Music Sessions', 'https://is1-ssl.mzstatic.com/image/thumb/Music126/v4/48/ae/19/48ae19a6-e68f-8777-e424-5be61ea23653/197188923617.jpg/1200x1200bf-60.jpg', '2023', 3),
(27, 'Snow Tha Product Session 39', 175, 'Rap', 'Español', 'BZRP Music Sessions', 'https://tse2.mm.bing.net/th/id/OIP.gWcsMvMLp8r1nigzlYx6vQHaHa?rs=1&pid=ImgDetMain&o=7&rm=3', '2021', 3),
(28, 'Tiago PZK Session 48', 182, 'Reggaetón', 'Español', 'BZRP Music Sessions', 'https://is1-ssl.mzstatic.com/image/thumb/Music122/v4/25/23/60/2523601c-1932-5a43-b6bb-e641d9e2605f/190296288906.jpg/1200x1200bf-60.jpg', '2021', 3),
(29, 'Trueno Session 6', 170, 'Freestyle', 'Español', 'BZRP Music Sessions', 'https://images.genius.com/b36890d26b648ca4e85982e6095442d8.800x800x1.png', '2019', 3),
(30, 'Milo J Session 57', 188, 'Urbano', 'Español', 'BZRP Music Sessions', 'https://i1.sndcdn.com/artworks-aW8th19cq4EF-0-t500x500.jpg', '2023', 3),
(31, 'Spaghetti del rock', 215, 'Rock', 'Español', 'Narigón del siglo', 'https://th.bing.com/th/id/R.f1c8d8055bde43f948e21d67afe68951?rik=rAqBvrzdiCVDiA&pid=ImgRaw&r=0', '2000', 4),
(32, '¿Qué ves?', 245, 'Rock', 'Español', 'La era de la boludez', 'https://is1-ssl.mzstatic.com/image/thumb/Music118/v4/32/e1/f1/32e1f132-c679-fee6-0839-5c6c948e667c/00602498229484.rgb.jpg/1200x1200bf-60.jpg', '1993', 4),
(33, 'El 38', 150, 'Rock', 'Español', 'La era de la boludez', 'https://is1-ssl.mzstatic.com/image/thumb/Music118/v4/32/e1/f1/32e1f132-c679-fee6-0839-5c6c948e667c/00602498229484.rgb.jpg/1200x1200bf-60.jpg', '1993', 4),
(34, 'Ala Delta', 320, 'Rock', 'Español', 'Acariciando lo áspero', 'https://www.tiempoar.com.ar/wp-content/uploads/2021/11/web-disco-divididos-acariciando-lo-aspero.jpg', '1991', 4),
(35, 'Amapola del 66', 360, 'Rock', 'Español', 'Amapola del 66', 'https://tse4.mm.bing.net/th/id/OIP.Q103W1x4OeMke3yanxXktwHaHa?rs=1&pid=ImgDetMain&o=7&rm=3', '2010', 4),
(36, 'Par Mil', 195, 'Rock', 'Español', 'Narigón del siglo', 'https://th.bing.com/th/id/R.f1c8d8055bde43f948e21d67afe68951?rik=rAqBvrzdiCVDiA&pid=ImgRaw&r=0', '2000', 4),
(37, 'Haciendo cosas raras', 188, 'Rock', 'Español', '40 dibujos ahí en el piso', 'https://studio15.com.ar/wp-content/uploads/2025/08/Divididos-40-Dibujos-Ahi-En-El-Piso.jpg', '1989', 4),
(38, 'Cielito Lindo', 210, 'Rock', 'Español', 'La era de la boludez', 'https://is1-ssl.mzstatic.com/image/thumb/Music118/v4/32/e1/f1/32e1f132-c679-fee6-0839-5c6c948e667c/00602498229484.rgb.jpg/1200x1200bf-60.jpg', '1993', 4),
(39, 'Paisano de Hurlingham', 240, 'Rock', 'Español', 'Otroletravaladna', 'https://is1-ssl.mzstatic.com/image/thumb/Music128/v4/1d/37/a6/1d37a6ba-be7a-a9f4-7bf8-73be515d46be/00731452940421.rgb.jpg/1200x630bf-60.jpg', '1995', 4),
(40, 'Salir a comprar', 212, 'Rock', 'Español', 'La era de la boludez', 'https://is1-ssl.mzstatic.com/image/thumb/Music118/v4/32/e1/f1/32e1f132-c679-fee6-0839-5c6c948e667c/00602498229484.rgb.jpg/1200x1200bf-60.jpg', '1993', 4),
(41, 'La Triple T', 165, 'Pop', 'Español', 'Cupido', 'https://tse4.mm.bing.net/th/id/OIP.XcI4sco3piTkhQibDYZF7gHaHa?rs=1&pid=ImgDetMain&o=7&rm=3', '2022', 5),
(42, 'Cupido', 172, 'Pop', 'Español', 'Cupido', 'https://tse4.mm.bing.net/th/id/OIP.XcI4sco3piTkhQibDYZF7gHaHa?rs=1&pid=ImgDetMain&o=7&rm=3', '2023', 5),
(43, 'Miénteme', 160, 'Pop', 'Español', 'Cupido', 'https://tse4.mm.bing.net/th/id/OIP.XcI4sco3piTkhQibDYZF7gHaHa?rs=1&pid=ImgDetMain&o=7&rm=3', '2021', 5),
(44, 'Posta', 180, 'Pop', 'Español', 'Un mechón de pelo', 'https://popupmag.es/wp-content/uploads/2024/04/un-mechon-de-pelo-tracklist-tini.jpg', '2024', 5),
(45, 'Pa', 190, 'Balada', 'Español', 'Un mechón de pelo', 'https://popupmag.es/wp-content/uploads/2024/04/un-mechon-de-pelo-tracklist-tini.jpg', '2024', 5),
(46, 'Fresa', 165, 'Pop', 'Español', 'Tini Tini Tini', 'https://images.genius.com/e8b3481b57821ae704e826570ed2db5b.1000x1000x1.jpg', '2019', 5),
(47, 'Bar', 178, 'Cumbia', 'Español', 'Cupido', 'https://tse4.mm.bing.net/th/id/OIP.XcI4sco3piTkhQibDYZF7gHaHa?rs=1&pid=ImgDetMain&o=7&rm=3', '2021', 5),
(48, 'Carne y Hueso', 175, 'Balada', 'Español', 'Cupido', 'https://tse4.mm.bing.net/th/id/OIP.XcI4sco3piTkhQibDYZF7gHaHa?rs=1&pid=ImgDetMain&o=7&rm=3', '2022', 5),
(49, 'Oye', 170, 'Balada', 'Español', 'Tini Tini Tini', 'https://images.genius.com/e8b3481b57821ae704e826570ed2db5b.1000x1000x1.jpg', '2019', 5),
(50, 'Te Olvidaré', 192, 'Pop', 'Español', 'Tini Tini Tini', 'https://images.genius.com/e8b3481b57821ae704e826570ed2db5b.1000x1000x1.jpg', '2020', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `interprete`
--

CREATE TABLE `interprete` (
  `ID_Interprete` int(11) NOT NULL,
  `Nombre` varchar(45) NOT NULL,
  `Genero` varchar(40) NOT NULL,
  `Tipo` varchar(40) NOT NULL,
  `Pais_Origen` varchar(40) NOT NULL,
  `SelloDiscografico` varchar(45) NOT NULL,
  `Imagen` varchar(255) NOT NULL,
  `SitioWeb` varchar(255) NOT NULL,
  `FechaInicio` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `interprete`
--

INSERT INTO `interprete` (`ID_Interprete`, `Nombre`, `Genero`, `Tipo`, `Pais_Origen`, `SelloDiscografico`, `Imagen`, `SitioWeb`, `FechaInicio`) VALUES
(1, 'Wos', 'Urbano', 'Solista', 'Argentina', 'Dogui Records', 'https://thisis-images.scdn.co/37i9dQZF1DZ06evO3wwWQu-default.jpg', 'https://wos.com.ar', '2017-01-01'),
(2, 'Duki', 'Trap', 'Solista', 'Argentina', 'SSJ Records', 'https://tse1.mm.bing.net/th/id/OIP.Y-J0X0rsdSxsdfuG35LxFAHaHa?pid=ImgDet&w=474&h=474&rs=1&o=7&rm=3', 'https://duki.com.ar', '2016-01-01'),
(3, 'Bizarrap', 'Electronic', 'Productor', 'Argentina', 'Dale Play Records', 'https://i.scdn.co/image/ab67706c0000bebb23f95270c26a4262ff1c67a5', 'https://bizarrap.com', '2018-01-01'),
(4, 'Divididos', 'Rock', 'Banda', 'Argentina', 'Pelo Music', 'https://thisis-images.spotifycdn.com/37i9dQZF1DZ06evO48uy5O-default.jpg', 'https://divididos.com.ar', '1988-01-01'),
(5, 'Tini', 'Pop', 'Solista', 'Argentina', 'Sony Music', 'https://thisis-images.scdn.co/37i9dQZF1DZ06evO4rTB3W-large.jpg', 'https://tinistoessel.com', '2011-01-01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `ID_Usuario` int(11) NOT NULL,
  `user` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`ID_Usuario`, `user`, `password`) VALUES
(1, 'webadmin', 'admin');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cancion`
--
ALTER TABLE `cancion`
  ADD PRIMARY KEY (`ID_Cancion`),
  ADD KEY `ID_Iterprete` (`ID_Interprete`);

--
-- Indices de la tabla `interprete`
--
ALTER TABLE `interprete`
  ADD PRIMARY KEY (`ID_Interprete`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`ID_Usuario`),
  ADD UNIQUE KEY `user` (`user`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cancion`
--
ALTER TABLE `cancion`
  MODIFY `ID_Cancion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT de la tabla `interprete`
--
ALTER TABLE `interprete`
  MODIFY `ID_Interprete` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID_Usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cancion`
--
ALTER TABLE `cancion`
  ADD CONSTRAINT `cancion_ibfk_1` FOREIGN KEY (`ID_Interprete`) REFERENCES `interprete` (`ID_Interprete`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
