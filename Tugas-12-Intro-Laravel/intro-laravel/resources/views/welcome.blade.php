<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tugas 1 - Berlatih HTML</title>
    </head>
    <body>
    <div class="container">
        <div class="title">
        <h1>SanberBook</h1>
        <h3>Social Media Developer Santai Berkualitas</h3>
        <p>Belajar dan Berbagi agar hidup ini semakin santai berkualitas</p>
        </div>
        <div class="main-content">
        <h4>Benefit Join di SanberBook</h4>
        <ul>
            <li>Mendapatkan motivasi dari sesama developer</li>
            <li>Sharing knowledge dari para mastah Sanber</li>
            <li>Dibuat oleh calon web developer terbaik</li>
        </ul>
        <h4>Cara Bergabung ke SanberBook</h4>
        <ol>
            <li>Mengunjungi Website ini</li>
            <li>
            Mendaftar di <span><a href="{{ route('register') }}">Form Sign Up</a></span>
            </li>
            <li>Selesai</li>
        </ol>
        </div>
    </div>
    </body>
</html>
