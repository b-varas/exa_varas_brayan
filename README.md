# VentasFix - Backoffice y API

Examen transversal - Desarrollo de Software Web I
Instituto Profesional San Sebastián

**Alumno:** Brayan Varas
**Framework:** Laravel 11
**Lenguaje:** PHP 8.3
**Base de datos:** MySQL

## Descripción

Sistema de backoffice para la empresa VentasFix, que permite administrar Usuarios, Productos y Clientes desde una interfaz web, y también desde una API REST autenticada con JWT, para la integración con aplicaciones de terceros (sistema de gestión Softland).

## Tecnologías utilizadas

- Laravel 11.9
- PHP 8.3
- MySQL
- Laravel Breeze (scaffolding de autenticación web, incluido en el template)
- tymon/jwt-auth (autenticación API)
- Template de administración: Approx (Bootstrap 5)
- Vite (compilación de assets)

## Estructura del proyecto

- `app/Http/Controllers/` — Controladores del sistema web (Usuario, Producto, Cliente, Dashboard)
- `app/Http/Controllers/Api/` — Controladores de la API REST (Auth, Usuario, Producto, Cliente)
- `app/Models/` — Modelos Eloquent (User, Producto, Cliente)
- `database/migrations/` — Migraciones de las tablas `users`, `productos`, `clientes`
- `resources/views/` — Vistas Blade del sistema web (auth, dashboard, usuarios, productos, clientes)
- `routes/web.php` — Rutas del sistema web
- `routes/api.php` — Rutas de la API REST

## Instalación

1. Clonar el repositorio:
```
git clone https://github.com/b-varas/exa_varas_brayan.git
cd exa_varas_brayan
```

2. Instalar dependencias:
```
composer install
npm install
```

3. Configurar el entorno:
```
copy .env.example .env
php artisan key:generate
php artisan jwt:secret
```

4. Crear la base de datos `ventasfix` en MySQL (por ejemplo, vía consola):
```
mysql -u root -e "CREATE DATABASE ventasfix CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;"
```

5. Migrar las tablas:
```
php artisan migrate
```

6. Habilitar el almacenamiento de imágenes:
```
php artisan storage:link
```

7. Compilar los assets del frontend:
```
npm run build
```

8. Levantar el servidor:
```
php artisan serve
```

9. Acceder al sistema en `http://127.0.0.1:8000/login`, o registrarse en `http://127.0.0.1:8000/register` con un correo `@ventasfix.cl`.

## Módulos del sistema web

- **Login / Registro / Logout**: autenticación con sesión, contraseñas cifradas con bcrypt.
- **Dashboard**: muestra el conteo total de usuarios, productos y clientes registrados.
- **Usuarios**: CRUD completo (listar, crear, editar, eliminar). Email obligatorio `@ventasfix.cl`. No permite que un usuario elimine su propia cuenta mientras está conectado.
- **Productos**: CRUD completo, con subida de imagen y cálculo automático del precio de venta (precio neto + 19% IVA).
- **Clientes**: CRUD completo de clientes empresa.

## API REST

Todas las rutas de la API (excepto `/api/login`) requieren autenticación vía JWT, enviando el token en el header:
```
Authorization: Bearer {token}
```

### Autenticación

| Método | Endpoint | Descripción |
|---|---|---|
| POST | `/api/login` | Inicia sesión y devuelve el token JWT |
| GET | `/api/me` | Devuelve los datos del usuario autenticado |
| POST | `/api/logout` | Invalida el token actual |
| POST | `/api/refresh` | Genera un nuevo token a partir del actual |

### Usuarios / Productos / Clientes

Cada entidad expone las siguientes rutas (reemplazar `{recurso}` por `usuarios`, `productos` o `clientes`):

| Método | Endpoint | Descripción | Código de éxito |
|---|---|---|---|
| GET | `/api/{recurso}` | Lista todos los registros | 200 |
| GET | `/api/{recurso}/{id}` | Obtiene un registro por ID | 200 / 404 si no existe |
| POST | `/api/{recurso}` | Crea un nuevo registro | 201 |
| PUT | `/api/{recurso}/{id}` | Actualiza un registro por ID | 200 / 404 si no existe |
| DELETE | `/api/{recurso}/{id}` | Elimina un registro por ID | 200 / 404 si no existe |

### Ejemplo: Login

```json
POST /api/login
{
    "email": "usuario@ventasfix.cl",
    "password": "contraseña"
}
```

Respuesta:
```json
{
    "access_token": "...",
    "token_type": "bearer",
    "expires_in": 3600,
    "user": { ... }
}
```

## Notas de seguridad

- Las contraseñas se almacenan cifradas con bcrypt (cast `hashed` de Laravel).
- El correo de todos los usuarios del sistema debe terminar en `@ventasfix.cl` (validación `ends_with`).
- Todas las rutas del backoffice (excepto login/registro) están protegidas con el middleware `auth` (sesión web) o `auth:api` (JWT), según corresponda.
