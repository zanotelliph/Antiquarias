<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Antiquariais</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

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

        nav.navbar {
            background: rgba(30, 0, 60, 0.6);
            backdrop-filter: blur(8px);
            box-shadow: 0 0 20px #8a2be2;
        }

        .navbar-brand, .nav-link {
            color: #e9d8ff !important;
            font-weight: 600;
            text-shadow: 0 0 5px #a020f0;
        }

        .nav-link:hover {
            color: #fff !important;
            text-shadow: 0 0 8px #ff00ff, 0 0 15px #9900ff;
        }

        .container, .card {
            background: rgba(255, 255, 255, 0.05);
            border-radius: 12px;
            padding: 20px;
            backdrop-filter: blur(6px);
            box-shadow: 0 0 12px rgba(191, 0, 255, 0.4);
            margin-bottom: 20px;
        }

        label, th {
            color: #e5e0ff;
            font-weight: bold;
            text-shadow: 0 0 6px #8a2be2;
        }

        .form-control, .form-select {
            background: rgba(255,255,255,0.1);
            color: #fff;
            border: 1px solid #8a2be2;
        }

        .form-control::placeholder {
            color: #ccc;
        }

        .form-control:focus, .form-select:focus {
            background: rgba(255,255,255,0.2);
            color: #fff;
            box-shadow: 0 0 15px #8a2be2;
            border-color: #ff00ff;
        }

        .btn {
            border: none;
            box-shadow: 0 0 10px #c300ff;
            color: white;
        }

        .btn-primary { background: linear-gradient(45deg, #8a2be2, #c300ff); }
        .btn-success { background: linear-gradient(45deg, #00b09b, #96c93d); }
        .btn-danger { background: linear-gradient(45deg, #ff416c, #ff4b2b); }
        .btn-warning { background: linear-gradient(45deg, #f7971e, #ffd200); color: #000; }

        .btn:hover {
            box-shadow: 0 0 20px #ff3bff;
            transform: scale(1.03);
            color: white;
        }

        .table {
            color: #e0e0e0;
            --bs-table-bg: transparent;
        }
    </style>
</head>

<body>

<nav class="navbar navbar-expand-lg mb-4">
  <div class="container-fluid">
    <a class="navbar-brand ms-4" href="/site/admin/main.php">ANTIQUARIAIS</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon" style="filter: invert(1);"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto me-4">
        <li class="nav-item">
          <a class="nav-link" href="/site/admin/main.php">Menu Principal</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/site/admin/login.php?logout=true">Sair</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="container mt-4">
    <div class="row">