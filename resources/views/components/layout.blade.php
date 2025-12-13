<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Peta Kabupaten Karawang</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Maps API -->
    {{-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB7u0WwJAdeSJJ6POkvK1NUYVayIA6tgsY&callback=initMap" async
        defer></script> --}}
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />

    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <!-- Custom CSS -->
    <style>
        :root {
            --primary: #2c3e50;
            --secondary: #34495e;
            --success: #27ae60;
            --warning: #f39c12;
            --danger: #e74c3c;
            --info: #3498db;
            --light: #ecf0f1;
            --dark: #2c3e50;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
            overflow-x: hidden;
        }

        /* Sidebar Styles */
        .sidebar {
            width: 280px;
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            color: white;
            transition: all 0.3s ease;
            position: fixed;
            height: 100vh;
            z-index: 1000;
            box-shadow: 3px 0 15px rgba(0, 0, 0, 0.1);
        }

        .sidebar.collapsed {
            width: 80px;
        }

        .sidebar .logo {
            padding: 20px 15px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            text-align: center;
        }

        .sidebar .logo h1 {
            font-size: 1.2rem;
            font-weight: 700;
            margin: 0;
            transition: all 0.3s ease;
        }

        .sidebar.collapsed .logo h1 {
            display: none;
        }

        .sidebar .nav-link {
            color: rgba(255, 255, 255, 0.8);
            padding: 12px 20px;
            margin: 5px 10px;
            border-radius: 8px;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .sidebar .nav-link:hover,
        .sidebar .nav-link.active {
            background: rgba(255, 255, 255, 0.1);
            color: white;
            transform: translateX(5px);
        }

        .sidebar .nav-link i {
            width: 20px;
            text-align: center;
            font-size: 1.1rem;
        }

        .sidebar.collapsed .nav-link span {
            display: none;
        }

        .sidebar .nav-link .badge {
            margin-left: auto;
        }

        .sidebar.collapsed .nav-link .badge {
            display: none;
        }

        /* Kecamatan List */
        .kecamatan-list {
            padding: 15px;
            margin-top: 20px;
        }

        .kecamatan-list h6 {
            color: rgba(255, 255, 255, 0.9);
            margin-bottom: 15px;
            font-weight: 600;
        }

        .sidebar.collapsed .kecamatan-list {
            display: none;
        }

        .kecamatan-item {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 8px 12px;
            margin-bottom: 5px;
            border-radius: 6px;
            cursor: pointer;
            transition: all 0.2s ease;
            color: rgba(255, 255, 255, 0.8);
            font-size: 0.9rem;
        }

        .kecamatan-item:hover {
            background: rgba(255, 255, 255, 0.1);
            color: white;
        }

        .status-dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            flex-shrink: 0;
        }

        .status-menang {
            background-color: var(--success);
        }

        .status-cukup {
            background-color: var(--warning);
        }

        .status-kurang {
            background-color: var(--danger);
        }

        /* Main Content */
        .main-content {
            margin-left: 280px;
            transition: all 0.3s ease;
            min-height: 100vh;
        }

        .sidebar.collapsed~.main-content {
            margin-left: 80px;
        }

        /* Header */
        .navbar {
            background: white;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 15px 25px;
        }

        .navbar-brand {
            font-weight: 700;
            color: var(--primary);
        }

        .user-info img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            border: 2px solid var(--light);
        }

        /* Map Container 3D */
        .map-container {
            background: white;
            border-radius: 20px;
            box-shadow:
                0 25px 50px rgba(0, 0, 0, 0.25),
                0 15px 30px rgba(0, 0, 0, 0.1),
                inset 0 1px 0 rgba(255, 255, 255, 0.6);
            margin: 20px;
            overflow: hidden;
            height: calc(100vh - 120px);
            position: relative;
            transform-style: preserve-3d;
            perspective: 1000px;
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        #map {
            width: 100%;
            height: 100%;
            border-radius: 20px;
            transform: translateZ(20px);
            transition: all 0.3s ease;
        }

        /* Efek hover 3D pada map container */
        .map-container:hover {
            transform: translateY(-5px) rotateX(5deg);
            box-shadow:
                0 35px 60px rgba(0, 0, 0, 0.3),
                0 25px 40px rgba(0, 0, 0, 0.15),
                inset 0 1px 0 rgba(255, 255, 255, 0.6);
        }

        /* Map Controls 3D */
        .map-controls {
            position: absolute;
            top: 20px;
            right: 20px;
            z-index: 1000;
            transform-style: preserve-3d;
        }

        .map-controls .btn {
            width: 50px;
            height: 50px;
            border-radius: 12px;
            margin-bottom: 12px;
            box-shadow:
                0 8px 20px rgba(0, 0, 0, 0.3),
                0 4px 10px rgba(0, 0, 0, 0.2);
            border: none;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            transition: all 0.3s ease;
            transform: translateZ(30px);
            backdrop-filter: blur(10px);
            background: rgba(255, 255, 255, 0.95);
        }

        .map-controls .btn:hover {
            transform: translateY(-3px) translateZ(40px) scale(1.05);
            box-shadow:
                0 12px 25px rgba(0, 0, 0, 0.4),
                0 6px 15px rgba(0, 0, 0, 0.3);
        }

        .map-controls .btn:active {
            transform: translateY(0) translateZ(25px) scale(0.98);
        }

        .map-controls .btn-primary {
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            border: 2px solid rgba(255, 255, 255, 0.3);
        }

        .map-controls .btn-light {
            background: rgba(255, 255, 255, 0.95);
            border: 2px solid rgba(255, 255, 255, 0.5);
        }

        /* Legend 3D */
        .legend {
            position: absolute;
            bottom: 20px;
            left: 20px;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(15px);
            border-radius: 15px;
            padding: 20px;
            box-shadow:
                0 15px 35px rgba(0, 0, 0, 0.2),
                0 8px 20px rgba(0, 0, 0, 0.1);
            z-index: 1000;
            min-width: 220px;
            transform: translateZ(25px);
            border: 1px solid rgba(255, 255, 255, 0.4);
        }

        .legend h6 {
            color: var(--dark);
            margin-bottom: 15px;
            font-weight: 600;
            font-size: 1rem;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.1);
        }

        .legend-item {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 10px;
            padding: 5px 0;
        }

        .legend-color {
            width: 18px;
            height: 18px;
            border-radius: 5px;
            box-shadow: 0 3px 8px rgba(0, 0, 0, 0.2);
            border: 2px solid rgba(255, 255, 255, 0.8);
        }

        .legend-item span {
            font-weight: 600;
            font-size: 0.85rem;
            color: var(--dark);
        }

        /* Stats Cards */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin: 20px;
        }

        .stat-card {
            background: white;
            border-radius: 15px;
            padding: 25px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
            border-left: 4px solid var(--primary);
            transition: transform 0.3s ease;
        }

        .stat-card:hover {
            transform: translateY(-5px);
        }

        .stat-card.success {
            border-left-color: var(--success);
        }

        .stat-card.warning {
            border-left-color: var(--warning);
        }

        .stat-card.danger {
            border-left-color: var(--danger);
        }

        .stat-card.info {
            border-left-color: var(--info);
        }

        .stat-icon {
            width: 60px;
            height: 60px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            margin-bottom: 15px;
        }

        .stat-card.success .stat-icon {
            background: rgba(39, 174, 96, 0.1);
            color: var(--success);
        }

        .stat-card.warning .stat-icon {
            background: rgba(243, 156, 18, 0.1);
            color: var(--warning);
        }

        .stat-card.danger .stat-icon {
            background: rgba(231, 76, 60, 0.1);
            color: var(--danger);
        }

        .stat-card.info .stat-icon {
            background: rgba(52, 152, 219, 0.1);
            color: var(--info);
        }

        .stat-number {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 5px;
        }

        .stat-label {
            color: #6c757d;
            font-size: 0.9rem;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
            }

            .sidebar.collapsed {
                width: 100%;
                height: 70px;
            }

            .main-content {
                margin-left: 0;
            }

            .sidebar.collapsed~.main-content {
                margin-left: 0;
            }

            .map-container {
                height: 400px;
                margin: 10px;
            }

            .stats-grid {
                grid-template-columns: 1fr;
                margin: 10px;
            }

            .map-controls .btn {
                width: 45px;
                height: 45px;
            }

            .legend {
                min-width: 180px;
                padding: 15px;
            }
        }

        /* Custom Scrollbar */
        .sidebar ::-webkit-scrollbar {
            width: 5px;
        }

        .sidebar ::-webkit-scrollbar-track {
            background: rgba(255, 255, 255, 0.1);
        }

        .sidebar ::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, 0.3);
            border-radius: 10px;
        }

        .sidebar ::-webkit-scrollbar-thumb:hover {
            background: rgba(255, 255, 255, 0.5);
        }

        /* Animasi untuk marker 3D */
        @keyframes floatMarker {

            0%,
            100% {
                transform: translateY(0px) translateZ(0px);
            }

            50% {
                transform: translateY(-5px) translateZ(10px);
            }
        }

        .marker-3d {
            animation: floatMarker 3s ease-in-out infinite;
        }
    </style>
</head>

<body>

    <div class="d-flex">
        <!-- Sidebar -->
        <div class="sidebar" id="sidebar">
            <div class="logo">
                <h1 class="text-white">
                    <i class="fas fa-landmark me-2"></i>
                    NASDEM KARAWANG
                </h1>
            </div>

            <nav class="nav flex-column mt-3">
                <a class="nav-link active" href="#">
                    <i class="fas fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
                <a class="nav-link" href="statistik.php">
                    <i class="fas fa-chart-bar"></i>
                    <span>Statistik</span>
                    <span class="badge bg-success ms-auto">5</span>
                </a>
                <a class="nav-link" href="anggota.php">
                    <i class="fas fa-users"></i>
                    <span>Keanggotaan</span>
                    <span class="badge bg-info ms-auto">128</span>
                </a>
                <a class="nav-link" href="laporan.php">
                    <i class="fas fa-file-alt"></i>
                    <span>Laporan</span>
                    <span class="badge bg-warning ms-auto">3</span>
                </a>
            </nav>

            <div class="kecamatan-list">
                <h6 class="text-uppercase">
                    <i class="fas fa-map-marker-alt me-2"></i>
                    Daftar Kecamatan
                </h6>
                <div id="kecamatanItems" class="overflow-auto" style="max-height: 300px;">
                    <!-- Kecamatan akan dimuat melalui JavaScript -->
                </div>
            </div>

            <button class="btn btn-light position-absolute top-50 end-0 translate-middle-y rounded-pill"
                id="toggleSidebar" style="width: 25px; height: 60px;">
                <i class="fas fa-chevron-left"></i>
            </button>
        </div>

        <!-- Main Content -->
        {{ $slot }}

    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


</body>

</html>
