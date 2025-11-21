<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Antiquariais</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #0d0221, #200444, #3a0577);
            background-size: 300% 300%;
            animation: neonBg 10s ease infinite;
            color: #fff;
        }

        @keyframes neonBg {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        /* Menu estilo boate */
        nav {
            background: rgba(30, 0, 60, 0.6);
            backdrop-filter: blur(8px);
            box-shadow: 0 0 20px #8a2be2;
        }

        nav a {
            color: #e9d8ff !important;
            font-weight: 600;
            text-shadow: 0 0 5px #a020f0;
        }

        nav a:hover {
            color: #fff !important;
            text-shadow: 0 0 8px #ff00ff, 0 0 15px #9900ff;
        }

        /* Caixas internas */
        .container, .card {
            background: rgba(255, 255, 255, 0.05);
            border-radius: 12px;
            padding: 20px;
            backdrop-filter: blur(6px);
            box-shadow: 0 0 12px rgba(191, 0, 255, 0.4);
        }

        label {
            color: #e5e0ff;
            font-weight: bold;
            text-shadow: 0 0 6px #8a2be2;
        }

        .form-control {
            background: rgba(255,255,255,0.1);
            color: #fff;
            border: 1px solid #8a2be2;
        }

        .btn {
            background: linear-gradient(45deg, #8a2be2, #c300ff);
            border: none;
            box-shadow: 0 0 10px #c300ff;
        }

        .btn:hover {
            box-shadow: 0 0 20px #ff3bff;
            transform: scale(1.03);
        }
    </style>
</head>

<body>

<?php
$hiddenPage = ['login.php', 'registro.php'];
$currentPage = basename($_SERVER['PHP_SELF']);
$showMenu = !in_array($currentPage, $hiddenPage);

if ($showMenu) {
    if (file_exists(__DIR__ . '/menu.php')) {
        include __DIR__ . '/menu.php';
    }
}
?>

<div class="container mt-4">
    <div class="row">
