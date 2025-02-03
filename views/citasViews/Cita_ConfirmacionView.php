<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmación de Alta de Cita</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h2 class="text-center">Confirmación de Alta de Cita</h2>

        <div class="alert alert-success">
            <h4 class="alert-heading">¡Cita registrada con éxito!</h4>
            <p>Se ha completado el proceso de alta de tu cita.</p>
        </div>

        <h4><strong>Resumen de la Cita:</strong></h4>

        <ul class="list-group">
            <li class="list-group-item"><strong>Fecha y hora de la cita:</strong> <?= htmlspecialchars($input_fecha_cita ?? "No disponible") ?></li>
            <li class="list-group-item"><strong>Descripción:</strong> <?= htmlspecialchars($input_descripcion ?? "No disponible") ?></li>
            <li class="list-group-item"><strong>Nombre del cliente:</strong> <?= htmlspecialchars($input_cliente ?? "No disponible") ?></li>
            <li class="list-group-item"><strong>Nombre del tatuador:</strong> <?= htmlspecialchars($tatuador_info['nombre'] ?? "No disponible") ?></li>
            <li class="list-group-item"><strong>Email del tatuador:</strong> <?= htmlspecialchars($tatuador_info['email'] ?? "No disponible") ?></li>
            <li class="list-group-item"><strong>Foto del tatuador:</strong> 
                <?php if (!empty($tatuador_info['foto'])): ?>
                    <img src="<?= htmlspecialchars($tatuador_info['foto']) ?>" alt="Foto del tatuador" class="img-fluid" style="max-height: 200px;">
                <?php else: ?>
                    <p>No hay foto disponible</p>
                <?php endif; ?>
            </li>
        </ul>

        <div class="mt-3">
            <a href="/tattooshop_php/citas/alta" class="btn btn-primary">Registrar otra cita</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

