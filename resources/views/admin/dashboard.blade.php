@extends('components.layoutmaster')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 mt-2">
                <div class="card">
                    <div class="card-header p-2 ps-3">
                        <div class="d-flex justify-content-between">
                            <div>
                                <p class="text-sm mb-0 text-capitalize">Kecamatan Menang</p>
                                <h4 class="mb-0 text-success">{{ $menang }}</h4>
                            </div>
                            <div class="icon icon-md icon-shape bg-gradient-success shadow text-center border-radius-lg">
                                <i class="material-symbols-rounded opacity-10">weekend</i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mt-2">
                <div class="card">
                    <div class="card-header p-2 ps-3">
                        <div class="d-flex justify-content-between">
                            <div>
                                <p class="text-sm mb-0 text-capitalize">Kecamatan Cukup</p>
                                <h4 class="mb-0 text-warning">{{ $cukup }}</h4>
                            </div>
                            <div
                                class="icon icon-md icon-shape bg-gradient-warning shadow text-center border-radius-lg">
                                <i class="material-symbols-rounded opacity-10">weekend</i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mt-2">
                <div class="card">
                    <div class="card-header p-2 ps-3">
                        <div class="d-flex justify-content-between">
                            <div>
                                <p class="text-sm mb-0 text-capitalize">Kecamatan Kurang</p>
                                <h4 class="mb-0 text-danger">{{ $kurang }}</h4>
                            </div>
                            <div class="icon icon-md icon-shape bg-gradient-danger shadow text-center border-radius-lg">
                                <i class="material-symbols-rounded opacity-10">weekend</i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mt-2">
                <div class="card">
                    <div class="card-header p-2 ps-3">
                        <div class="d-flex justify-content-between">
                            <div>
                                <p class="text-sm mb-0 text-capitalize">Persentase Keberhasilan</p>
                                <h4 class="mb-0 text-info">{{ $persentase }}</h4>
                            </div>
                            <div class="icon icon-md icon-shape bg-gradient-info shadow text-center border-radius-lg">
                                <i class="material-symbols-rounded opacity-10">weekend</i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mt-4">
            <div class="card-header pb-0">
                <h6>Peta Persebaran</h6>
            </div>
            <div class="card-body" style="height: 500px;">
                <div id="map" style="height:100%;"></div>
            </div>
        </div>

    </div>

    <script>
        const kecamatanData = @json($kecamatan);
        const desaData = @json($desa);

        // const map = L.map('map').setView([-6.35, 107.45], 11);
        const map = L.map('map', {
            fullscreenControl: true
        }).setView([-6.35, 107.45], 11);


        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19
        }).addTo(map);

        // Marker Kecamatan
        kecamatanData.forEach(item => {
            if (!item.koordinat_kecamatan) return;
            const [lat, lng] = item.koordinat_kecamatan.split(',').map(Number);
            if (isNaN(lat) || isNaN(lng)) return;

            L.marker([lat, lng])
                .addTo(map)
                .bindPopup(`<b>${item.nama_kecamatan}</b>`);
        });

        // Marker Desa
        desaData.forEach(item => {
            if (!item.koordinat_desa) return;
            const [lat, lng] = item.koordinat_desa.split(',').map(Number);
            if (isNaN(lat) || isNaN(lng)) return;

            L.circleMarker([lat, lng], {
                    radius: 6,
                    color: 'blue'
                })
                .addTo(map)
                .bindPopup(`<b>${item.nama_desa}</b>`);
        });

        // Map Controls
        document.getElementById('zoomIn').onclick = () => map.zoomIn();
        document.getElementById('zoomOut').onclick = () => map.zoomOut();
        document.getElementById('resetView').onclick = () => map.setView([-6.35, 107.45], 11);

        kecamatanData.forEach(item => {
            console.log('Koordinat:', item.nama_kecamatan, item.koordinat_kecamatan);
            if (!item.koordinat_kecamatan) return;
            const [lat, lng] = item.koordinat_kecamatan.split(',').map(Number);
            console.log('LatLng:', lat, lng);
            if (isNaN(lat) || isNaN(lng)) return;

            L.marker([lat, lng])
                .addTo(map)
                .bindPopup(`<b>${item.nama_kecamatan}</b>`);
        });
    </script>
@endsection
