<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Sexo</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex items-center justify-center min-h-screen bg-gradient-to-r from-blue-400 to-purple-500">
    <form action="/meta6b/sexo/delete" method="POST"
          class="bg-white p-8 rounded-2xl shadow-2xl w-96 border border-gray-200 relative animate-fadeIn">
        <div class="absolute -top-6 left-1/2 transform -translate-x-1/2 bg-red-600 text-white px-4 py-2 rounded-full shadow-md text-sm font-semibold">
            Eliminar Registro
        </div>
        <h2 class="text-3xl font-extrabold mb-4 text-center text-gray-800">Eliminar Sexo</h2>
        <p class="text-center text-red-500 font-semibold mb-4">⚠ Esta acción no se puede deshacer</p>
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($sexo['id']); ?>">
        <div class="mb-4">
            <label for="nombre" class="block text-gray-700 font-semibold mb-2">Nombre:</label>
            <input type="text" name="nombre" id="nombre" value="<?php echo htmlspecialchars($sexo['nombre']); ?>" 
                   class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 shadow-sm bg-gray-100" disabled>
        </div>          
        <button type="submit"
                class="w-full mt-6 bg-gradient-to-r from-red-600 to-red-800 text-white py-3 rounded-lg hover:from-red-700 hover:to-red-900 transition duration-300 shadow-md font-semibold">
            Eliminar
        </button>
    </form>
    <script>
        document.querySelector("form").addEventListener("submit", function(event) {
            if (!confirm("¿Estás seguro de que deseas eliminar este registro?")) {
                event.preventDefault();
            }
        });
    </script>
</body>
</html>
