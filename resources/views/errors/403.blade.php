<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>403 - Akses Ditolak</title>
    <style>
        body {
            background: #f8fafc;
            color: #2d3748;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            text-align: center;
            padding: 100px;
        }
        h1 {
            font-size: 72px;
            margin-bottom: 0;
        }
        p {
            font-size: 24px;
            margin-top: 0;
        }
        a {
            display: inline-block;
            margin-top: 20px;
            color: #3182ce;
            text-decoration: none;
            font-weight: 600;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h1>403</h1>
    <p>Maaf, akses kamu ditolak karena kamu bukan admin.</p>
    <a href="{{ url('/') }}">Kembali ke Beranda</a>
</body>
</html>
