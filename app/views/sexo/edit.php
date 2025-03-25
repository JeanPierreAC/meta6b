<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Sexo</title>

    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #e9ecef;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            max-width: 400px;
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
        }
        .header {
            background: #007bff;
            color: white;
            padding: 10px;
            text-align: center;
            border-radius: 10px 10px 0 0;
            font-size: 18px;
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
            transition: 0.3s;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        .btn-outline-secondary {
            transition: 0.3s;
        }
        .btn-outline-secondary:hover {
            background-color: #6c757d;
            color: white;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="header">Editar Sexo</div>
    
    <form action="/sexo/public/sexo/update" method="POST" class="mt-3">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($sexo['id']); ?>">

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre:</label>
            <input type="text" class="form-control" name="nombre" id="nombre" 
                   value="<?php echo htmlspecialchars($sexo['nombre']); ?>" required>
        </div>          
      
        <button type="submit" class="btn btn-primary w-100">Actualizar</button>                           
    </form> 

    <div class="text-center mt-3">
        <a href="index.php" class="btn btn-outline-secondary w-100">Volver al listado</a>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
