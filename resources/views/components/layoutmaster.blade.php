<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="img/apple-icon.png">
    <link rel="icon" type="image/png" href="img/favicon.png">
    <title>
        BAPILU
    </title>
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700,900" />
    <!-- Nucleo Icons -->
    <link href="css/nucleo-icons.css" rel="stylesheet" />
    <link href="css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Material Icons -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,400,0,0" />
    <!-- CSS Files -->
    <link id="pagestyle" href="css/material-dashboard.css?v=3.2.0" rel="stylesheet" />

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />

    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/leaflet.fullscreen/1.6.0/Control.FullScreen.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet.fullscreen/1.6.0/Control.FullScreen.min.js"></script>


    <style>
        .leaflet-container:fullscreen {
            width: 100% !important;
            height: 100% !important;
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
    </style>
</head>

<body class="g-sidenav-show  bg-gray-100">
    <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-radius-lg fixed-start ms-2 bg-white my-2"
        id="sidenav-main">

        <!-- Header -->
        <div class="sidenav-header">
            <i class="fas fa-times p-3 cursor-pointer text-dark opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
                aria-hidden="true" id="iconSidenav"></i>

            <a class="navbar-brand px-4 py-3 m-0" href="#">
                <i class="fas fa-landmark me-2 text-dark"></i>
                <span class="ms-1 text-sm text-dark">NASDEM KARAWANG</span>
            </a>
        </div>

        <hr class="horizontal dark mt-0 mb-2">

        <div class="collapse navbar-collapse w-auto" id="sidenav-collapse-main">
            <ul class="navbar-nav">

                <!-- DASHBOARD -->
                <li class="nav-item">
    <a class="nav-link text-dark" href="{{ route('dashboard') }}"> 
        <i class="material-symbols-rounded opacity-5">dashboard</i>
        <span class="nav-link-text ms-2">Dashboard</span>
    </a>
</li>

                <!-- Statistik -->
              <li class="nav-item">
    <a class="nav-link text-dark" href="{{ route('statistik.index') }}"> <i class="material-symbols-rounded opacity-5">bar_chart</i>
        <span class="nav-link-text ms-2">Statistik</span>
        <span class="badge bg-success ms-auto">5</span>
    </a>
</li>

                <!-- Keanggotaan -->
                <li class="nav-item">
    <a class="nav-link text-dark" href="{{ route('anggota.index') }}"> <i class="material-symbols-rounded opacity-5">groups</i>
        <span class="nav-link-text ms-2">Keanggotaan</span>
        <span class="badge bg-info ms-auto">128</span>
    </a>
</li>

                <!-- Laporan -->
                <li class="nav-item">
                    <a class="nav-link text-dark" href="laporan.php">
                        <i class="material-symbols-rounded opacity-5">description</i>
                        <span class="nav-link-text ms-2">Laporan</span>
                        <span class="badge bg-warning ms-auto">3</span>
                    </a>
                </li>

                <!-- Divider -->
                <li class="nav-item mt-3">
                    <h6 class="ps-4 ms-2 text-uppercase text-xs text-dark font-weight-bolder opacity-5">
                        Daftar Kecamatan
                    </h6>
                </li>

                <!-- Container untuk daftar kecamatan via JS -->
                <li class="nav-item">
                    <div id="kecamatanItems" class="overflow-auto ms-4" style="max-height: 300px;">
                        <!-- akan diisi lewat JS -->
                    </div>
                </li>

            </ul>
        </div>
    </aside>

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-3 shadow-none border-radius-xl" id="navbarBlur"
            data-scroll="true">
            <div class="container-fluid py-1 px-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a>
                        </li>
                        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Dashboard</li>
                    </ol>
                </nav>
                <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                    <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                    </div>
                    <ul class="navbar-nav d-flex align-items-center justify-content-end">
                        <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                            <a href="javascript:;" class="nav-link text-body p-0 d-flex align-items-center"
                                id="iconNavbarSidenav">
                                <i class="material-symbols-rounded" style="font-size: 26px;">menu</i>
                            </a>

                    </ul>
                </div>
            </div>
        </nav>
        <!-- End Navbar -->
        <div class="container-fluid py-2">
          @yield('content')
        </div>
    </main>
    <!--   Core JS Files   -->
    <script src="js/core/popper.min.js"></script>
    <script src="js/core/bootstrap.min.js"></script>
    <script src="js/plugins/perfect-scrollbar.min.js"></script>
    <script src="js/plugins/smooth-scrollbar.min.js"></script>
    <script src="js/plugins/chartjs.min.js"></script>
    <script>
        var ctx = document.getElementById("chart-bars").getContext("2d");

        new Chart(ctx, {
            type: "bar",
            data: {
                labels: ["M", "T", "W", "T", "F", "S", "S"],
                datasets: [{
                    label: "Views",
                    tension: 0.4,
                    borderWidth: 0,
                    borderRadius: 4,
                    borderSkipped: false,
                    backgroundColor: "#43A047",
                    data: [50, 45, 22, 28, 50, 60, 76],
                    barThickness: 'flex'
                }, ],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index',
                },
                scales: {
                    y: {
                        grid: {
                            drawBorder: false,
                            display: true,
                            drawOnChartArea: true,
                            drawTicks: false,
                            borderDash: [5, 5],
                            color: '#e5e5e5'
                        },
                        ticks: {
                            suggestedMin: 0,
                            suggestedMax: 500,
                            beginAtZero: true,
                            padding: 10,
                            font: {
                                size: 14,
                                lineHeight: 2
                            },
                            color: "#737373"
                        },
                    },
                    x: {
                        grid: {
                            drawBorder: false,
                            display: false,
                            drawOnChartArea: false,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            color: '#737373',
                            padding: 10,
                            font: {
                                size: 14,
                                lineHeight: 2
                            },
                        }
                    },
                },
            },
        });


        var ctx2 = document.getElementById("chart-line").getContext("2d");

        new Chart(ctx2, {
            type: "line",
            data: {
                labels: ["J", "F", "M", "A", "M", "J", "J", "A", "S", "O", "N", "D"],
                datasets: [{
                    label: "Sales",
                    tension: 0,
                    borderWidth: 2,
                    pointRadius: 3,
                    pointBackgroundColor: "#43A047",
                    pointBorderColor: "transparent",
                    borderColor: "#43A047",
                    backgroundColor: "transparent",
                    fill: true,
                    data: [120, 230, 130, 440, 250, 360, 270, 180, 90, 300, 310, 220],
                    maxBarThickness: 6

                }],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    },
                    tooltip: {
                        callbacks: {
                            title: function(context) {
                                const fullMonths = ["January", "February", "March", "April", "May", "June",
                                    "July", "August", "September", "October", "November", "December"
                                ];
                                return fullMonths[context[0].dataIndex];
                            }
                        }
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index',
                },
                scales: {
                    y: {
                        grid: {
                            drawBorder: false,
                            display: true,
                            drawOnChartArea: true,
                            drawTicks: false,
                            borderDash: [4, 4],
                            color: '#e5e5e5'
                        },
                        ticks: {
                            display: true,
                            color: '#737373',
                            padding: 10,
                            font: {
                                size: 12,
                                lineHeight: 2
                            },
                        }
                    },
                    x: {
                        grid: {
                            drawBorder: false,
                            display: false,
                            drawOnChartArea: false,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            color: '#737373',
                            padding: 10,
                            font: {
                                size: 12,
                                lineHeight: 2
                            },
                        }
                    },
                },
            },
        });

        var ctx3 = document.getElementById("chart-line-tasks").getContext("2d");

        new Chart(ctx3, {
            type: "line",
            data: {
                labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                datasets: [{
                    label: "Tasks",
                    tension: 0,
                    borderWidth: 2,
                    pointRadius: 3,
                    pointBackgroundColor: "#43A047",
                    pointBorderColor: "transparent",
                    borderColor: "#43A047",
                    backgroundColor: "transparent",
                    fill: true,
                    data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
                    maxBarThickness: 6

                }],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index',
                },
                scales: {
                    y: {
                        grid: {
                            drawBorder: false,
                            display: true,
                            drawOnChartArea: true,
                            drawTicks: false,
                            borderDash: [4, 4],
                            color: '#e5e5e5'
                        },
                        ticks: {
                            display: true,
                            padding: 10,
                            color: '#737373',
                            font: {
                                size: 14,
                                lineHeight: 2
                            },
                        }
                    },
                    x: {
                        grid: {
                            drawBorder: false,
                            display: false,
                            drawOnChartArea: false,
                            drawTicks: false,
                            borderDash: [4, 4]
                        },
                        ticks: {
                            display: true,
                            color: '#737373',
                            padding: 10,
                            font: {
                                size: 14,
                                lineHeight: 2
                            },
                        }
                    },
                },
            },
        });
    </script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="js/material-dashboard.min.js?v=3.2.0"></script>
    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
