<?php
require_once __DIR__ . '/../Backend/api/api_mostrar_testimonio.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Css/test.css">
    <title>Decisión Joven - Testimonios</title>
</head>
<body>
<header>
    <h1>Decisión Joven</h1>
</header>

<nav>
    <ul>
        <li><a href="index.html">Inicio</a></li>
        <li><a href="Registro.html">Registro</a></li>
        <li><a href="acercade.html">Acerca de</a></li>
        <li><a href="testimonio.php">Testimonio</a></li>
        <li><a href="casos.html">Casos</a></li>
    </ul>
</nav>

<main>
    <section id="Comentarios">
        <p>Comparte tu experiencia vivida relacionada a las drogas, es importante para nosotros.</p>

        <form action="../Backend/api/api_usuario.php" id="testi" method="POST">
            <label for="nombre">Nombre y Apellido</label>
            <input type="text" placeholder="Rene Garcia" id="nombre" name="nombre">

            <label for="cedula">Documento:</label>
            <input type="number" placeholder="37509412" id="cedula" name="cedula">

            <label for="edad">Edad:</label>
            <input type="text" placeholder="18 años" id="edad" name="edad">

            <label for="Url"> Imagen(Opcional):</label>
            <input type="text" placeholder="https://ejemplo.com/imagen.jpg" id="Url" name="Url">
            <label for="departamento">Departamento:</label>
            <select name="departamento" id="departamento" required>
                <option value="20">ANÓNIMO</option>
                <option value="1">Artigas</option>
                <option value="2">Canelones</option>
                <option value="3">Cerro Largo</option>
                <option value="4">Colonia</option>
                <option value="5">Durazno</option>
                <option value="6">Flores</option>
                <option value="7">Florida</option>
                <option value="8">Lavalleja</option>
                <option value="9">Maldonado</option>
                <option value="10">Montevideo</option>
                <option value="11">Paysandú</option>
                <option value="12">Río Negro</option>
                <option value="13">Rivera</option>
                <option value="14">Rocha</option>
                <option value="15">Salto</option>
                <option value="16">San José</option>
                <option value="17">Soriano</option>
                <option value="18">Tacuarembó</option>
                <option value="19">Treinta y Tres</option>
            </select>

            <textarea name="testimonio" placeholder="Comparte tu testimonio aquí..." id="testimonio" required></textarea><br>

            <input id="Enviar" type="submit" value="Enviar Testimonio">
        </form>
    </section>
<?php if (!empty($testimonios)): ?>
                <?php foreach ($testimonios as $row): ?>
                    <article>
                    
                    <img src="<?= htmlspecialchars($row['imgurl']) ?>" 
                        alt="Avatar de <?= htmlspecialchars($row['nombre']) ?>" 
                        class="avatar-testimonio"
                    >
                    </div>
                        <h3>
                            <?= htmlspecialchars($row['nombre']) ?>,
                            <?= htmlspecialchars($row['edad']) ?> años,
                            <?= htmlspecialchars($row['nombre_departamento']) ?>
                        </h3>
                        <p><?= nl2br(htmlspecialchars($row['testimonio'])) ?></p>
                    </article>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No hay testimonios registrados aún.</p>
            <?php endif; ?>
            <?php if (isset($error)): ?>
                <p style="color:red;">Error: <?= htmlspecialchars($error) ?></p>
            <?php endif; ?>
    </section>
</main>

<footer>
    <p>&copy; 2025 Decisión Joven. Todos los derechos reservados.</p>
    <ul id="redes">
        <li><a href="https://www.facebook.com/?locale=es_LA"><img src="../Imagenes/facebook-boxed-svgrepo-com.svg" alt="Facebook"></a></li>
        <li><a href="https://www.whatsapp.com/?lang=es"><img src="../Imagenes/whatsapp-svgrepo-com.svg" alt="WhatsApp"></a></li>
        <li><a href="https://www.instagram.com/"><img src="../Imagenes/instagram-svgrepo-com.svg" alt="Instagram"></a></li>
    </ul>
</footer>
<script src="script_form.js"></script>
</body>
</html>
