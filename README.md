# Spoti-fail

## Integrantes
[Jorge Luis Nievas] ([jnievas@alumnos.exa.unicen.edu.ar])

[Mariana Santana] ([msantana@alumnos.exa.unicen.edu.ar])

## Temática

Gestión de catálogo musical, artistas y sus discografías.

## Descripción

Este sitio web permite administrar un catálogo de música, almacenando información detallada de los intérpretes (solistas o bandas), incluyendo su origen, género y sello discográfico.
También almacena la lista de canciones disponibles, con datos como su duración, idioma y el álbum al que pertenecen.
Las canciones están vinculadas cada una a un intérprete responsable, permitiendo organizar la biblioteca musical de forma eficiente.

## Diagrama de entidad relación (DER)

El modelo cuenta con una relación 1:N (Uno a Muchos) entre las entidades Interprete y Cancion. Una canción pertenece a un único intérprete, mientras que un intérprete puede ser autor de múltiples canciones.

![Diagrama de Entidad Relación Spoti-fail](DER%20Spoti-fail.png)
