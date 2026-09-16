# Sistem Point of Sale (POS) & Inventori Pengolahan Garam

Aplikasi Point of Sale (POS) dan manajemen rantai pasok garam yang dibangun menggunakan **Laravel Blade**, **Material Design**, dan **Docker**.

## Spesifikasi Environment

- **Web Server**: Apache 2.4 (Debian container `php:8.5.10-apache`, `mod_rewrite` aktif, DocumentRoot: `/var/www/html/public`)
- **Database**: MariaDB 10.4.32 (`mariadb:10.4.32`)
- **PHP**: PHP 8.5.10 (`php:8.5.10-apache` + PEAR + PECL)
- **Database Management Tool**: phpMyAdmin 5.2.1 (`phpmyadmin:5.2.1`)
- **Frontend**: Laravel Blade, Vanilla CSS Material Design, Vanilla JavaScript (tanpa Tailwind, React, Vue, Inertia, Livewire, atau SPA)

---

## Alur Bisnis Utama

1. **Barang Mentah Masuk**:
   - Pencatatan berat garam mentah dalam satuan dasar **gram** untuk komputasi internal.
   - Format tampilan dinamis otomatis:
     - `< 1 kg` (< 1.000 gram) → ditampilkan dalam **gram** (contoh: `500 gram`).
     - `>= 1 kg` dan `< 1.000 kg` (1.000 - 999.999 gram) → ditampilkan dalam **kg** (contoh: `2,5 kg`, `30 kg`).
     - `>= 1.000 kg` (>= 1.000.000 gram) → ditampilkan dalam **ton** (contoh: `1,5 ton`).
2. **Faktur Pembelian**:
   - Pembuatan dan pencetakan faktur pembelian dari supplier garam mentah lengkap dengan rincian tonase, harga, dan tanda tangan.
3. **Proses Produksi**:
   - Standar produk jadi: **1 bungkus = 300 gram**.
   - Rumus otomatis: `Pengurangan garam mentah = Jumlah bungkus × 300 gram`.
   - Mengurangi stok bahan mentah dan menambah stok garam bungkus secara atomik (`DB::transaction`).
   - Mencegah produksi jika stok bahan mentah tidak mencukupi (anti-stok negatif).
4. **Transaksi Penjualan (POS Kasir)**:
   - Kasir cepat untuk garam kemasan bungkus.
   - Hitung total tagihan, pembayaran, dan kembalian secara otomatis.
   - Stok barang jadi berkurang otomatis saat penjualan berhasil disimpan.
   - Mencegah penjualan jika stok barang jadi tidak mencukupi.
5. **Cetak Dokumen**:
   - **Nota Penjualan**: Format struk kasir thermal (compact).
   - **Faktur Penjualan**: Format faktur resmi A4.
   - **Faktur Pembelian**: Format faktur pengadaan bahan mentah resmi A4.
6. **Role & Akses**:
   - **Admin**: Akses operasional penuh (input pembelian, produksi, kasir penjualan, master data, pengaturan).
   - **Owner**: Akses monitoring eksekutif (dashboard, monitoring stok, laporan penjualan, pembelian, produksi, dan analisis laba kotor).

---

## Port Akses Layanan

- **Aplikasi Web POS**: [http://localhost:8000](http://localhost:8000)
- **phpMyAdmin**: [http://localhost:8081](http://localhost:8081)
- **MariaDB Database**: `localhost:3306` (Database: `pos_garam`, User: `pos_user`, Password: `pos_password`)

---

## Akun Default Sistem

| Role | Email | Password | Hak Akses |
|---|---|---|---|
| **Admin** | `admin@posgaram.com` | `password123` | Operasional lengkap, input produksi, kasir, master data, pengaturan |
| **Owner** | `owner@posgaram.com` | `password123` | Monitoring dashboard, stok, produksi, penjualan, laporan laba rugi |

---

## Perintah Pengoperasian Docker

### Menjalankan Seluruh Container
```bash
docker compose up -d
```

### Menghentikan Container
```bash
docker compose down
```

### Menjalankan Ulang Migrasi & Seeder Awal
```bash
docker compose exec app php artisan migrate:fresh --seed
```

### Menjalankan Test Otomatis
```bash
docker compose exec app php artisan test
```
# Sistem-Penjualan-Garam
