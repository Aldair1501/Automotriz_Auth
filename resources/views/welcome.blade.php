<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido</title>

    <!-- Carga TailwindCSS desde CDN para dar estilos rápidos -->
    <script src="https://cdn.tailwindcss.com"></script>
    <style>

         /* Estilo general del cuerpo: fondo degradado y fuente sans-serif */
        body {
            background: linear-gradient(135deg, #000000, #1c1c1c, #2e2e2e);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

         /* Animación de entrada suave para el contenido */
        .fade-in {
            animation: fadeIn 1s ease-in-out;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .btn-hover {
            transition: all 0.3s ease-in-out;
        }

        /* Efecto de los botones al hacer hover: levanta y genera sombra */
        .btn-hover:hover {
            transform: translateY(-3px) scale(1.05);
            box-shadow: 0 10px 25px rgba(255, 11, 85, 0.5);
        }
    </style>
</head>
<body class="min-h-screen flex flex-col justify-center items-center p-6 text-white">

    <!-- Contenedor principal -->
    <div class="fade-in text-center max-w-3xl bg-black/80 backdrop-blur-md rounded-3xl shadow-2xl p-12 border border-red-600">

      <!-- Título -->
            <h1 class="text-4xl md:text-5xl font-extrabold text-red-500 mb-4 tracking-wide hover:scale-105 transition-transform">
                🚀 Bienvenido al Sistema
            </h1>
            <p class="text-lg text-gray-300 mb-10 leading-relaxed">
                Autenticación avanzada, simulación de vulnerabilidades y protección de seguridad en la gestión de inventario automotriz.
                Plataforma 
                <span class="text-red-400 font-semibold">rápida</span>, 
                <span class="text-red-400 font-semibold">segura</span> y moderna.
                <br>Interfaz atractiva y profesional.
            </p>

        <!-- Botones -->
        <div class="flex flex-col sm:flex-row gap-6 justify-center">
            <a href="{{ route('login') }}" 
               class="btn-hover px-8 py-3 bg-gradient-to-r from-red-500 to-red-700 hover:from-red-600 hover:to-red-800 text-white font-bold rounded-xl shadow-lg flex items-center justify-center gap-2">
               🔑 Iniciar Sesión
            </a>
            <a href="{{ route('register') }}" 
               class="btn-hover px-8 py-3 bg-transparent border-2 border-red-500 hover:bg-red-700 hover:border-red-700 text-white font-bold rounded-xl flex items-center justify-center gap-2">
               📝 Registrarse
            </a>
        </div>

  
 

</body>
</html>
