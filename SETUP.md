# Ruang Baca Virtual - Welcome Page

## Setup Cepat

### 1. Upload Gambar
Upload gambar ke folder berikut:
- **Logo**: `public/images/LOGO_RSCH.png`
- **Buku**: `public/images/buku/buku-1.jpeg`, `buku-2.jpeg`, `buku-3.jpeg`
- **Artikel**: `public/images/artikel/artikel-1.jpeg`, `artikel-2.jpeg`, `artikel-3.jpeg`

### 2. Jalankan Aplikasi
```bash
php artisan serve
```

Buka browser: `http://localhost:8000`

## Struktur File

### Controllers
- `app/Http/Controllers/WelcomeController.php` - Controller dengan data dummy

### Views
- `resources/views/layouts/app.blade.php` - Layout utama
- `resources/views/partials/navbar-top.blade.php` - Navbar atas
- `resources/views/partials/navbar-bottom.blade.php` - Navbar bawah
- `resources/views/partials/footer.blade.php` - Footer
- `resources/views/welcome.blade.php` - Halaman utama

### Assets (Vanilla CSS)
- `public/css/reset.css` - CSS Reset
- `public/css/style.css` - Main CSS
- `public/js/app.js` - JavaScript

### Routes
- `routes/web.php` - Hanya route index `/`

## Fitur

✅ Hero Section  
✅ Trend Buku (6 items)  
✅ Statistik dengan Chart.js (4 grafik)  
✅ Fasilitas (3 cards)  
✅ Video YouTube  
✅ Artikel Terbaru (3 items)  
✅ Responsive Design  
✅ Role-based Navigation  

## Catatan

- Semua data menggunakan **dummy data**
- Semua link menggunakan `#` (placeholder)
- Untuk integrasi database, edit `WelcomeController.php`
- CSS menggunakan **Vanilla CSS** tanpa framework
