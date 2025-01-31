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
            <li class="list-group-item"><strong>Fecha y hora de la cita:</strong> <?= htmlspecialchars($fechaCita) ?></li>
            <li class="list-group-item"><strong>Descripción:</strong> <?= htmlspecialchars($descripcion) ?></li>
            <li class="list-group-item"><strong>Nombre del cliente:</strong> <?= htmlspecialchars($nombreCliente) ?></li>
            <li class="list-group-item"><strong>Nombre del tatuador:</strong> <?= htmlspecialchars($tatuador['nombre']) ?></li>
            <li class="list-group-item"><strong>Email del tatuador:</strong> <?= htmlspecialchars($tatuador['email']) ?></li>
            <li class="list-group-item"><strong>Foto del tatuador:</strong> 
                <img src="<?= htmlspecialchars($tatuador['foto']) ?>" alt="Foto del tatuador" class="img-fluid" style="max-height: 200px;">
            </li>
        </ul>

        <div class="mt-3">
            <a href="/citas/alta" class="btn btn-primary">Registrar otra cita</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
