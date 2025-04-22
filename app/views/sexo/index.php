<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Sexos</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

<div class="container mx-auto p-6">
    <h1 class="text-4xl font-bold text-center text-gray-800 mb-8">Listado de Sexos</h1>

    <!-- Botón Agregar Sexo -->
    <div class="mb-6 flex justify-end">
        <a href="/meta6b/app/views/sexo/create.php">
            <button class="bg-gradient-to-r from-purple-600 to-blue-600 text-white px-6 py-2 rounded-lg shadow-lg hover:from-purple-700 hover:to-blue-700 transition">
                Agregar Sexo
            </button>
        </a>
    </div>

    <!-- Tabla de Sexos -->
    <div class="overflow-x-auto bg-white shadow-lg rounded-lg">
        <table class="min-w-full table-auto">
            <thead>
                <tr class="bg-gradient-to-r from-purple-600 to-blue-600 text-white">
                    <th class="px-6 py-3 text-left">ID</th>
                    <th class="px-6 py-3 text-left">Nombre</th>
                    <th class="px-6 py-3 text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($sexos) && is_array($sexos)): ?>
                    <?php foreach ($sexos as $sexo): ?>
                        <tr class="border-b hover:bg-gray-50">
                            <td class="px-6 py-4"><?php echo htmlspecialchars($sexo['id']); ?></td>
                            <td class="px-6 py-4"><?php echo htmlspecialchars($sexo['nombre']); ?></td>
                            <td class="px-6 py-4 text-center">
                                <a href="/meta6b/public/sexo/edit?id=<?php echo htmlspecialchars($sexo['id']); ?>">
                                    <button class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition">Editar</button>
                                </a>
                                <a href="/meta6b/public/sexo/eliminar?id=<?php echo htmlspecialchars($sexo['id']); ?>"
                                   onclick="return confirm('¿Estás seguro de eliminar este registro?');">
                                    <button class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 transition">Eliminar</button>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="3" class="text-center text-gray-500 py-4">No hay registros disponibles.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>
