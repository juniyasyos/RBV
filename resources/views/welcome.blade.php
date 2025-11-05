@extends('layouts.app')

@section('title', 'Ruang Baca Virtual')

@section('content')
<!-- Hero Section -->
<section class="welcome">
    <div class="welcome-title">
        <h1>Welcome to <br><span>RUANG BACA VIRTUAL</span></h1>
    </div>
    <div class="welcome-description">
        <p>Discover Knowledge Without Limits</p>
    </div>
</section>

<!-- Trend Buku Section -->
<section class="section trend-buku">
    <h2>Trend Buku</h2>
    <div class="trend-container">
        @foreach($trendBuku as $buku)
            <div class="buku fade-in">
                <img src="{{ $buku['image_url'] }}" alt="{{ $buku['judul'] }}">
                <h3>{{ $buku['judul'] }}</h3>
            </div>
        @endforeach
    </div>
    <div class="center-button">
        <a href="#" class="tampilkan-lainnya">Tampilkan Lainnya</a>
    </div>
</section>

<!-- Grafik Section -->
<section class="grafik-section">
    <h2>Statistik Pengunjung</h2>

    <div class="grafik-box">
        <canvas id="chartKunjungan"></canvas>
    </div>

    <h3>Statistik Genre Koleksi</h3>
    <div class="grafik-box">
        <canvas id="grafikKoleksi"></canvas>
    </div>

    <h3>Statistik View Dokumen</h3>
    <div class="grafik-box">
        <canvas id="grafikDokumen"></canvas>
    </div>

    <h3>Statistik Promkes</h3>
    <div class="grafik-box">
        <canvas id="grafikPromkes"></canvas>
    </div>
</section>

<!-- Fasilitas-->
<section class="fasilitas">
    <h2>Fasilitas</h2>
    <div class="konten-fasilitas">
        <div class="balok-kanan">
            <h3><i class="icon">👓</i>Literasi Digital</h3>
            <p>Fitur ini menyediakan koleksi digital, termasuk jurnal medis, buku, dan artikel ilmiah yang mempermudah akses dan pencarian bahan pustaka secara online.</p>
        </div>
        <div class="balok-kanan">
            <h3><i class="icon">🖥️</i>Ruang Komputer</h3><br>
            <p>Area ini dilengkapi dengan perangkat komputer yang dapat digunakan pengunjung untuk mengakses informasi, mengetik dokumen, atau menjalankan program tertentu</p>
        </div>
        <div class="balok-kanan">
            <h3><i class="icon">📶</i>Zona WiFi</h3>
            <p>Zona ini menyediakan akses internet untuk mendukung aktivitas Anda secara online</p>
        </div>
    </div>
</section>

<!-- Video Section -->
<section class="video">
    <div class="video-wrapper">
        @if($video)
            <iframe 
                width="560" 
                height="315" 
                src="{{ $video['file_url'] }}" 
                frameborder="0" 
                allowfullscreen>
            </iframe>
        @else
            <p>Tidak ada video.</p>
        @endif
    </div>
</section>

<!-- Artikel Section -->
<section class="artikel-section">
    <h2>Artikel Terbaru</h2>
    <div class="artikel-container">
        @foreach($artikel as $item)
            <div class="artikel fade-in">
                <img src="{{ $item['image_url'] }}" alt="{{ $item['judul'] }}">
                <h3>{{ $item['judul'] }}</h3>
                <p>{{ $item['deskripsi'] }}</p>
            </div>
        @endforeach
    </div>
    <div class="center-button">
        <a href="#" class="tampilkan-lainnya">Tampilkan Lainnya</a>
    </div>
</section>
@endsection

@push('scripts')
<script>
    // Data untuk Chart.js dari backend
    const dataKunjungan = @json($dataKunjungan);
    const dataGenre = @json($dataGenre);
    const dataDokumen = @json($dataDokumen);
    const dataPromkes = @json($dataPromkes);

    // Chart Kunjungan
    const ctx = document.getElementById('chartKunjungan').getContext('2d');
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: dataKunjungan.map(item => item.bulan),
            datasets: [{
                label: 'Jumlah Kunjungan',
                data: dataKunjungan.map(item => item.total),
                backgroundColor: 'rgba(75, 192, 192, 0.5)'
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false
        }
    });

    // Chart Koleksi
    const ctxKoleksi = document.getElementById('grafikKoleksi').getContext('2d');
    new Chart(ctxKoleksi, {
        type: 'bar',
        data: {
            labels: dataGenre.map(item => item.genre),
            datasets: [{
                label: 'Jumlah Dibaca',
                data: dataGenre.map(item => item.total),
                backgroundColor: 'rgba(255, 159, 64, 0.6)'
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false
        }
    });

    // Chart Dokumen
    const ctxDokumen = document.getElementById('grafikDokumen').getContext('2d');
    new Chart(ctxDokumen, {
        type: 'bar',
        data: {
            labels: dataDokumen.map(item => item.tipe),
            datasets: [{
                label: 'Jumlah View',
                data: dataDokumen.map(item => item.total),
                backgroundColor: 'rgba(153, 102, 255, 0.6)'
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false
        }
    });

    // Chart Promkes
    const ctxPromkes = document.getElementById('grafikPromkes').getContext('2d');
    new Chart(ctxPromkes, {
        type: 'line',
        data: {
            labels: dataPromkes.map(item => item.bulan),
            datasets: [{
                label: 'View Promkes per Bulan',
                data: dataPromkes.map(item => item.total),
                backgroundColor: 'rgba(255, 99, 132, 0.4)',
                borderColor: 'rgba(255, 99, 132, 1)',
                fill: true
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false
        }
    });
</script>
@endpush
