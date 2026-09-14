<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Amro Blog</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500&family=Poppins:wght@600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --bs-primary: #6C5CE7;
            --bs-primary-rgb: 108, 92, 231;
            --bg-light: #F5F6FA;
        }
        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--bg-light);
            color: #2D3436;
        }
        h1, h2, h3, h4, h5, h6, .navbar-brand {
            font-family: 'Poppins', sans-serif;
        }
        .navbar-brand span {
            color: var(--bs-primary);
        }
        .btn-primary {
            background-color: var(--bs-primary);
            border-color: var(--bs-primary);
        }
        .btn-primary:hover {
            background-color: #5a4bcf;
            border-color: #5a4bcf;
        }
        .text-primary {
            color: var(--bs-primary) !important;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm py-3">
        <div class="container">
            <a class="navbar-brand fw-bold fs-4" href="/">
                <span>Amro </span>Blog
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link text-secondary" href="/">Home</a></li>
                    <li class="nav-item"><a class="nav-link text-secondary" href="/posts">Blog</a></li>
                </ul>
                <ul class="navbar-nav ms-auto align-items-center">
                    <?php if(session()->get('isLoggedIn')): ?>
                        <li class="nav-item"><a class="nav-link text-secondary" href="/dashboard">Dashboard</a></li>
                        <li class="nav-item ms-lg-3">
                            <form action="/logout" method="post" class="d-inline">
                                <?= csrf_field() ?>
                                <button type="submit" class="btn btn-primary px-4">Logout</button>
                            </form>
                        </li>
                    <?php else: ?>
                        <li class="nav-item"><a class="nav-link text-secondary" href="/login">Login</a></li>
                        <li class="nav-item ms-lg-3"><a class="btn btn-primary px-4" href="/register">Register</a></li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>
    
    <div class="container my-5">
        <?= $this->renderSection('content') ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>