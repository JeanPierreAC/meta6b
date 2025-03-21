<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Mejorado</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex items-center justify-center min-h-screen bg-gray-100">

    <form action="../../controllers/SexoController.php?action=create" method="POST" 
          class="bg-white p-6 rounded-lg shadow-md w-80">
        <h2 class="text-xl font-semibold mb-4 text-center">Crear nuevo sexo</h2>

        <label for="nombre" class="block text-gray-700 mb-1">Nombre:</label>
        <input type="text" name="nombre" id="nombre" required 
               class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400">
        
        <button type="submit" 
                class="w-full mt-4 bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700 transition">
            Crear
        </button>
    </form>

</body>
</html>
