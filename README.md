# 🚗 Sistema de Autenticación con Gestión de Inventario Automotriz

## 📌 Descripción del Proyecto
Este proyecto consiste en el desarrollo de un **sistema web en Laravel** que implementa diferentes **métodos de autenticación** bajo una arquitectura **cliente-servidor**, en el contexto de la gestión de un **inventario automotriz**.  
El objetivo es **simular vulnerabilidades de seguridad** y aplicar **técnicas de protección** para reforzar la seguridad en aplicaciones reales.  

---

## 🔐 Métodos de Autenticación Implementados
El sistema incluye **tres métodos de autenticación**:

1. **Login con contraseñas planas (no encriptadas)**  
   - Ejemplo de mala práctica de seguridad.  
   - Se utiliza para mostrar cómo las contraseñas almacenadas sin protección son vulnerables a ataques.  

2. **Login con contraseñas encriptadas con Bcrypt**  
   - Laravel incluye por defecto el **algoritmo bcrypt** para el hashing de contraseñas.  
   - Este método demuestra las **mejores prácticas** para proteger credenciales.  

3. **Inicio de sesión con Google (OAuth 2.0)**  
   - Se implementa utilizando **Laravel Socialite**.  
   - Permite autenticación mediante cuentas externas de Google, agregando un nivel adicional de seguridad y comodidad para el usuario.  

---

## 🛠️ Tecnologías Implementadas
- **Framework Backend:** Laravel 10  
- **Lenguaje de programación:** PHP 8+  
- **Base de datos:** MySQL  
- **Frontend:** Blade + Bootstrap  
- **Servidor Web:** Apache / Nginx  

---

## 📚 Librerías o Frameworks Empleados
- [Laravel](https://laravel.com/) → Framework principal.  
- [Laravel UI](https://github.com/laravel/ui) → Login básico y registro.  
- [Laravel Socialite](https://laravel.com/docs/socialite) → Autenticación con Google OAuth.  
- [Bootstrap 5](https://getbootstrap.com/) → Estilos y diseño responsivo.  

---

## 🗄️ Sistema de Gestión de Base de Datos
- **Motor:** MySQL  
- **Herramienta de administración:** phpMyAdmin o MySQL Workbench  

---

## 🔒 Herramientas de Cifrado Utilizadas
- **Contraseñas planas:** sin cifrado (para demostrar vulnerabilidad).  
- **Bcrypt:** hashing de contraseñas con el método por defecto de Laravel.  
- **Google OAuth 2.0:** autenticación delegada mediante tokens seguros.  

---

## 🖼️ Capturas de Pantalla
*(Aquí se deben agregar las imágenes del sistema en funcionamiento. Por ejemplo:)*  

- **Pantalla de login con contraseñas planas**  
  ![Login básico](docs/images/login-planas.png)  

- **Pantalla de login con Bcrypt**  
  ![Login seguro con Bcrypt](docs/images/login-bcrypt.png)  

- **Pantalla de login con Google**  
  ![Login con Google](docs/images/login-google.png)  

---

## 🎥 Demostración Visual de Cada Método
Se recomienda incluir **GIFs o capturas de pantalla** para demostrar cada inicio de sesión en acción:  

- **Login inseguro con contraseñas planas**: ejemplo de vulnerabilidad.  
- **Login con Bcrypt**: demostración del cifrado seguro.  
- **Login con Google**: redirección y autenticación mediante OAuth.  

---

## 📌 ¿Cómo agregar imágenes al README?
Para agregar imágenes al README debes:  

1. Crear una carpeta en tu proyecto llamada **`docs/images/`** (o la ruta que prefieras).  
2. Guardar dentro de ella las imágenes o capturas.  
3. Insertarlas en el README con la sintaxis de Markdown:  

```markdown
![Texto alternativo](docs/images/nombre-de-la-imagen.png)
