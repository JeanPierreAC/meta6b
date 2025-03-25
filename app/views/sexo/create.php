<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Mejorado</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex items-center justify-center min-h-screen bg-gradient-to-r from-blue-400 to-purple-500">

    <form action="../../controllers/SexoController.php?action=create" method="POST"
          class="bg-white p-8 rounded-2xl shadow-2xl w-96 border border-gray-200 relative">
        <div class="absolute -top-6 left-1/2 transform -translate-x-1/2 bg-purple-600 text-white px-4 py-2 rounded-full shadow-md text-sm font-semibold">
            Nuevo Registro
        </div>
        <h2 class="text-3xl font-extrabold mb-6 text-center text-gray-800">Crear Nuevo Sexo</h2>

        <label for="nombre" class="block text-gray-700 font-semibold mb-2">Nombre:</label>
        <input type="text" name="nombre" id="nombre" required
               class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 shadow-sm">

        <button type="submit"
                class="w-full mt-6 bg-gradient-to-r from-purple-600 to-blue-600 text-white py-3 rounded-lg hover:from-purple-700 hover:to-blue-700 transition duration-300 shadow-md font-semibold">
            Crear
        </button>
    </form>

</body>
</html>
