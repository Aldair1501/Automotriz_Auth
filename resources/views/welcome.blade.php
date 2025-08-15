<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            background: linear-gradient(135deg, #000000ff, #2e2e2e);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .fade-in {
            animation: fadeIn 1.2s ease-in-out;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(15px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .btn-hover {
            transition: all 0.3s ease-in-out;
        }
        .btn-hover:hover {
            transform: translateY(-2px) scale(1.05);
            box-shadow: 0 8px 25px rgba(230, 57, 70, 0.5);
        }
    </style>
</head>
<body class="min-h-screen flex flex-col justify-center items-center p-6 text-white">

    <!-- Contenedor principal -->
    <div class="fade-in text-center max-w-3xl bg-white/10 backdrop-blur-lg rounded-2xl shadow-2xl p-10 border border-red-600">
        
        <!-- Título -->
        <h1 class="text-4xl md:text-5xl font-extrabold text-red-500 mb-4 hover:scale-105 transition-transform">
            🚀 Bienvenido a Nuestro Sistema
        </h1>
        <p class="text-lg text-gray-300 mb-8 leading-relaxed">
            Gestiona todo de forma <span class="text-red-400 font-semibold">rápida</span>, 
            <span class="text-red-400 font-semibold">segura</span> y moderna.  
            Disfruta de una experiencia fluida y atractiva.
        </p>

        <!-- Botones -->
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('login') }}" 
               class="btn-hover px-6 py-3 bg-gradient-to-r from-red-500 to-red-700 hover:from-red-600 hover:to-red-800 text-white font-bold rounded-lg shadow-lg flex items-center gap-2">
               🔑 Iniciar Sesión
            </a>
            <a href="{{ route('register') }}" 
               class="btn-hover px-6 py-3 bg-transparent border border-red-500 hover:bg-red-700 hover:border-red-700 text-white font-bold rounded-lg flex items-center gap-2">
               📝 Registrarse
            </a>
        </div>
    </div>

    <!-- Footer -->
   <!-- <footer class="mt-8 text-gray-500 text-sm">
    
    </footer>
-->
</body>
</html>
