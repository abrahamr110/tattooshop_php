<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./public/css/styles_formularioPlantilla.css">
    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- FLATPICKR -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <title>Alta</title>
</head>

<body>

    <main class="body__main">
        <form class="main__form-plantilla" action="****CAMBIAR ACTION*****" method="post">
            <div class="form-plantilla__container">
                <div class="form-group">
                    <label for="input_id">Id</label>
                    <input type="text"
                        class="shadow form-control "
                        id="input_id" name="input_id"
                        aria-describedby="id"
                        placeholder="Introduce el id">
                </div>
                <div class="form-group">
                    <label for="input_nombre">Nombre</label>
                    <input type="text"
                        class="shadow form-control "
                        id="input_nombre"
                        name="input_nombre"
                        aria-describedby="nombre"
                        placeholder="Introduce tu nombre">
                </div>
                <div class="form-group">
                    <label for="input_descripcion">Email</label>
                    <input type="text"
                        class="shadow form-control "
                        id="input_email"
                        name="input_email"
                        aria-describedby="email"
                        placeholder="Introduce tu email">
                </div>
                <div class="form-group">
                    <label for="input_password">Contraseña</label>
                    <input type="text"
                        class="shadow form-control "
                        id="input_password"
                        name="input_fecha_cita"
                        aria-describedby="password"
                        placeholder="Introduce tu contraseña">
                </div>
                <div class="form-group">
                    <label for="input_foto">Foto</label>
                    <input type="text"
                        class="shadow form-control "
                        id="input_foto"
                        name="input_foto"
                        placeholder="Foto">
                </div>
                <div class="form-group">
                    <label for="input_tatuador">Creado en</label>
                    <input type="time"
                        class="shadow form-control "
                        id="input_creado_en"
                        name="input_ctrado_en"
                        placeholder="Creado en">
                </div>
                <div class="form-group container__btns-form">
                    <button type="submit" class="btn btn-primary btns-form__btn-enviar">Enviar</button>
                    <button type="reset" class="btn btn-danger">Borrar</button>
                </div>
            </div>
        </form>
    </main>
</body>

</html>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="./public/js/datepickerinitialzr.js"></script>