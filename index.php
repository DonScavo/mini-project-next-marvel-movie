<?php
const API_URL = 'https://whenisthenextmcufilm.com/api';
// Inicializar una nueva sessión de cURL, $ch = curl handle
$ch = curl_init(API_URL);
// Indicar que queremos recibir el resultado de la petición y no mostrarla en pantalla
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// Ejecutar la petición y guardamos resultado
$result = curl_exec($ch);
$data = json_decode($result, true);
// cerrar ejecucion de curl
curl_close($ch);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>¿Cuál es la próxima película de Marvel?</title>
    <meta name="description" content="Averigua la próxima película de Marvel.">

    <!-- Centered viewport -->
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.min.css">

    <style>
        :root {
            color-scheme: light dark;
        }

        h1 {
            text-align: center;
        }

        section {
            text-align: center;
        }

        hgroup {
            text-align: center;
        }

        img {
            display: block;
        }
    </style>
</head>

<body>
    <main>
        <!-- <pre style="font-size: 16px; overflow:scroll; height:400px;">
    <?= var_dump($data); ?>    
    </pre>  -->

        <section>
            <h1>Próxima película de Marvel</h1>
            <p>Faltan <?= $data['days_until'] ?> días</p>
            <img src="<?= $data['poster_url']; ?>" alt="Poster de <?= $data['title']; ?>" style="border-radius: 16px; height: 500px; margin:auto;">
        </section>

        <hgroup>
            <h2><?= $data['title']; ?></h2>
            <p style="margin: 16px 0;">Fecha de estreno: <?= $data['release_date']; ?></p>
            <div style="max-width: 500px; margin:auto;">
                <p>Descripción: <?= $data['overview']; ?></p>
            </div>
            <p>El siguiente estreno es: <?= $data['following_production']['title'] . ' - ' . $data['following_production']['type']; ?></p>
        </hgroup>
    </main>
</body>

</html>