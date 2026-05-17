# Spoti-fail

## Integrantes
- Jorge Luis Nievas (jnievas@alumnos.exa.unicen.edu.ar)
- Mariana Santana (msantana@alumnos.exa.unicen.edu.ar)

## Temática
Gestión de catálogo musical, artistas y sus discografías.

## Descripción
Sitio web dinámico que permite visualizar y administrar un catálogo de música. 
Los usuarios públicos pueden navegar el listado de intérpretes y canciones. 
El administrador puede gestionar el contenido completo mediante un sistema de ABM.

## Funcionalidades
### Acceso público
- Listado de canciones con detalle individual
- Listado de intérpretes con detalle individual

### Acceso administrador
- Login con usuario y contraseña
- ABM de canciones (agregar, editar, eliminar)
- ABM de intérpretes (agregar, editar, eliminar)

## Diagrama de Entidad Relación (DER)
El modelo cuenta con una relación 1:N entre las entidades Interprete y Cancion.
Una canción pertenece a un único intérprete, mientras que un intérprete puede tener múltiples canciones.
La entidad Usuarios almacena las credenciales de acceso para la administración del sitio.

![Diagrama de Entidad Relación Spoti-fail](DER%20Spoti-fail.png)

## Cómo desplegar el sitio

### Requisitos
- Apache y MySQL (recomendado XAMPP)
- PHP 8.0 o superior

### Pasos
1. Clonar el repositorio dentro de la carpeta `htdocs` de XAMPP:
git clone https://github.com/JNievas87/Spoti-fail_WEB2_TUDAI

2. Iniciar Apache y MySQL desde XAMPP

3. Acceder a `http://localhost/<nombre-de-la-carpeta>/` reemplazando `<nombre-de-la-carpeta>` por el nombre de la carpeta donde se clonó el repositorio (por defecto `Spoti-fail_WEB2_TUDAI`)

> La base de datos se crea y se llena con datos iniciales automáticamente en el primer acceso.  
> Si se desea usar una base de datos distinta, editar las constantes en `config.php`.

## Usuario administrador
- **Usuario:** webadmin
- **Contraseña:** admin