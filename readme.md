# SIPG - Sistem Informasi Penjadwalan Sekolah

Aplikasi web untuk mengelola dan menyusun jadwal pelajaran sekolah secara terstruktur, dibangun dengan **Laravel** dan **MySQL**. Aplikasi ini membantu pihak sekolah mengatur data guru, kelas, mata pelajaran, dan jadwal, serta mengurangi risiko jadwal yang bentrok akibat penyusunan manual.

>
## Fitur Utama

> **[ISI]** Sesuaikan daftar di bawah dengan fitur yang benar-benar ada di aplikasi. Hapus yang tidak ada, tambahkan yang belum tertulis.

- Autentikasi pengguna dan pembagian hak akses (misalnya admin dan guru)
- Manajemen data guru
- Manajemen data kelas
- Manajemen data mata pelajaran
- Manajemen jam pelajaran dan hari
- Penyusunan jadwal pelajaran per kelas dan per guru
- Validasi jadwal bentrok (guru atau kelas yang sama pada waktu yang sama)
- Tampilan jadwal dan cetak/ekspor jadwal

## Teknologi

| Bagian | Teknologi |
|---|---|
| Backend | Laravel (PHP) **[ISI versi, lihat composer.json]** |
| Database | MySQL |
| Frontend | Blade, HTML, CSS, JavaScript **[ISI: Bootstrap/jQuery/dll jika dipakai]** |
| Build asset | Laravel Mix (Webpack) |
| Testing | PHPUnit |

## Tangkapan Layar



| Halaman | Gambar |
|---|---|
| Login | ![Login](docs/screenshots/login.png) |
| Dashboard | ![Dashboard](docs/screenshots/dashboard.png) |
| Penyusunan Jadwal | ![Jadwal](docs/screenshots/jadwal.png) |

## Struktur Database


![ERD](docs/erd.png)

| Tabel | Fungsi |
|---|---|
| `users` | Data akun dan hak akses |
| `guru` | **[ISI]** |
| `kelas` | **[ISI]** |
| `mapel` | **[ISI]** |
| `jadwal` | **[ISI]** relasi ke guru, kelas, mapel, hari, dan jam |

> Sesuaikan nama tabel dengan folder `database/migrations`.

## Persyaratan Sistem

- PHP **[ISI versi minimum sesuai composer.json]**
- Composer
- MySQL / MariaDB
- Node.js dan npm (untuk build asset)

## Instalasi

1. Clone repository

   ```bash
   git clone https://github.com/Baratamudha/sipg-project.git
   cd sipg-project
   ```

2. Install dependensi PHP dan JavaScript

   ```bash
   composer install
   npm install
   ```

3. Salin file environment dan buat application key

   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. Buat database MySQL (misalnya `sipg`), lalu atur koneksi di file `.env`

   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=sipg
   DB_USERNAME=root
   DB_PASSWORD=
   ```

5. Jalankan migrasi (dan seeder jika tersedia)

   ```bash
   php artisan migrate
   php artisan db:seed
   ```

6. Build asset dan jalankan aplikasi

   ```bash
   npm run dev
   php artisan serve
   ```

7. Buka `http://localhost:8000` di browser.

## Akun Demo

> **[ISI]** Jika ada seeder akun, tuliskan di sini. Gunakan akun demo saja, jangan akun asli.

| Peran | Email / Username | Password |
|---|---|---|
| Admin | **[ISI]** | **[ISI]** |

## Pengujian

```bash
php artisan test
```

## Struktur Folder Utama

```
app/         Logika aplikasi (Models, Controllers, dll.)
database/    Migration dan seeder
resources/   View (Blade) dan asset sumber
routes/      Definisi route (web.php, api.php)
tests/       Pengujian otomatis
```

## Rencana Pengembangan

> **[ISI]** Opsional, tapi menunjukkan Anda berpikir ke depan. Contoh:

- [ ] Penyusunan jadwal otomatis
- [ ] REST API untuk aplikasi mobile
- [ ] Ekspor jadwal ke PDF/Excel

## Pengembang

**Achmad Randi Ma'ruf Haryono**
Email: randiachmad32@gmail.com
LinkedIn: [linkedin.com/in/achmad-randi](https://linkedin.com/in/achmad-randi)

## Lisensi

Proyek ini bersifat open-source di bawah lisensi [MIT](https://opensource.org/licenses/MIT).
