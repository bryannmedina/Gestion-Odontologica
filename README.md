#  Gestión Odontológica MVC

Sistema web de gestión odontológica desarrollado bajo arquitectura MVC, orientado a la administración de pacientes, citas y procesos clínicos básicos.

---

#  Tecnologías Utilizadas

## Backend
- PHP
- Arquitectura MVC
- Manejo de sesiones
- Control de roles

## Frontend
- HTML
- CSS
- JavaScript

## Base de Datos
- MySQL
- phpMyAdmin

## Librerías e Integraciones
- PHPMailer
- FPDF

---

#  Funcionalidades

- Autenticación de usuarios
- Manejo de sesiones
- Gestión de pacientes
- Gestión de citas odontológicas
- Registro y consulta de información
- Generación de reportes PDF
- Envío automático de correos
- Operaciones CRUD completas
- Validaciones básicas

---

#  Objetivo del Proyecto

Desarrollar una solución web que permita optimizar la administración de procesos odontológicos mediante herramientas digitales para el control de pacientes y citas.

---

#  Arquitectura del Proyecto

El proyecto fue desarrollado utilizando el patrón MVC para mejorar la organización y separación de responsabilidades.

```bash
GestionOdontologica/
│
├── controlador/
├── modelo/
├── vista/
├── assets/
├── config/
├── librerias/
└── database/
```

---

# ⚙️ Instalación

## 1️ Clonar el repositorio

```bash
git clone https://github.com/bryannmedina/gestion-odontologica-mvc.git
```

---

## 2️ Configurar servidor local

Mover el proyecto a:

### XAMPP
```bash
htdocs/
```

### Laragon
```bash
www/
```

---

## 3️ Importar base de datos

- Abrir phpMyAdmin
- Crear una base de datos
- Importar el archivo `.sql`

---

## 4️ Configurar conexión

Editar archivo de configuración:

```php
config/conexion.php
```

Modificar:

```php
$host = "localhost";
$user = "root";
$password = "";
$database = "gestion_odontologica";
```

---

## 5 Ejecutar proyecto

Abrir en navegador:

```bash
http://localhost/GestionOdontologica
```

---

# 📸 Capturas del Sistema

##  Login
_Agregar captura aquí_

---

##  Gestión de Citas
_Agregar captura aquí_

---

##  Gestión de Pacientes
_Agregar captura aquí_

---

#  Estado del Proyecto

Proyecto académico en desarrollo y mejora continua.

---

#  Mejoras Futuras

- Mejorar validaciones backend
- Optimizar interfaz de usuario
- Implementar historial clínico
- Mejorar seguridad de autenticación
- Implementar responsive design

---

#  Aprendizajes Obtenidos

Durante el desarrollo de este proyecto fortalecí conocimientos en:

- Arquitectura MVC
- Desarrollo backend con PHP
- Manejo de sesiones y roles
- Integración con bases de datos MySQL
- Generación de PDFs
- Integración de librerías externas
- Organización de proyectos web

---

#  Autor

## Bryan Medina

Desarrollador web full stack en formación  
Aprendiz ADSO - SENA  

 medinna24hortaa@gmail.com  
 https://github.com/bryannmedina
