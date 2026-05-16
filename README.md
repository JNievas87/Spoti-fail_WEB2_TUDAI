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

## Diagrama de Entidad Relación (DER)
El modelo cuenta con una relación 1:N entre las entidades Interprete y Cancion. 
Una canción pertenece a un único intérprete, mientras que un intérprete puede tener múltiples canciones.

![Diagrama de Entidad Relación Spoti-fail](DER%20Spoti-fail.png)

## Cómo desplegar el sitio
URL de acceso http://localhost/Spoti-fail_WEB2_TUDAI/home

### Requisitos
- Apache y MySQL (recomendado XAMPP)
- PHP 8.0 o superior

### Pasos
1. Clonar el repositorio dentro de la carpeta `htdocs` de XAMPP:
```
git clone https://github.com/JNievas87/Spoti-fail_WEB2_TUDAI
```
2. Crear una base de datos en MySQL
3. Importar el archivo `db/spoti-fail-web2.sql` en la base de datos creada
4. Configurar el archivo `config.php` con los datos de la base de datos:
```php
   define('BD_HOST', 'localhost');
   define('BD_USER', 'root');
   define('BD_PASS', '');
   define('BD_DB', 'spoti-fail-web2');
```
5. Iniciar Apache y MySQL desde XAMPP
6. Acceder a `http://localhost/Spoti-fail_WEB2_TUDAI/`

## Usuario administrador
- **Usuario:** webadmin
- **Contraseña:** admin

