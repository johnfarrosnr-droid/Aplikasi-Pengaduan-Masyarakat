# Aplikasi Pengaduan Masyarakat

Aplikasi Pengaduan Masyarakat adalah aplikasi berbasis web yang dibuat menggunakan framework **Laravel** untuk memudahkan masyarakat dalam menyampaikan laporan atau pengaduan kepada pihak berwenang secara online. Aplikasi ini dirancang agar proses pelaporan menjadi lebih cepat, transparan, dan terdokumentasi dengan baik.

---

## ✨ Fitur Utama

* 📢 **Pengaduan Online**
  Masyarakat dapat mengirimkan laporan pengaduan lengkap dengan deskripsi dan bukti pendukung.

* 👤 **Manajemen Pengguna**
  Sistem login & registrasi untuk masyarakat dan admin.

* 🗂 **Manajemen Laporan**
  Admin dapat melihat, memverifikasi, dan menindaklanjuti laporan yang masuk.

* 📊 **Status Pengaduan**
  Setiap laporan memiliki status (terkirim, diproses, selesai).

* 🔔 **Notifikasi**
  Pemberitahuan status pengaduan kepada pelapor.

---

## 🛠️ Teknologi yang Digunakan

* **Framework**: Laravel
* **Bahasa**: PHP
* **Database**: MySQL
* **Frontend**: Blade Template, HTML, CSS, JavaScript
* **Web Server**: Apache / Nginx (Laragon direkomendasikan)

---

## 🚀 Cara Install & Menjalankan Project

1. **Clone repository**

   ```bash
   git clone https://github.com/johnfarrosnr-droid/aplikasi-pengaduan-masyarakat.git
   ```

2. **Masuk ke folder project**

   ```bash
   cd aplikasi-pengaduan-masyarakat
   ```

3. **Install dependency**

   ```bash
   composer install
   npm install
   npm run dev
   ```

4. **Copy file environment**

   ```bash
   cp .env.example .env
   ```

5. **Generate application key**

   ```bash
   php artisan key:generate
   ```

6. **Atur konfigurasi database**
   Edit file `.env` dan sesuaikan:

   ```
   DB_DATABASE=nama_database
   DB_USERNAME=username
   DB_PASSWORD=password
   ```

7. **Migrasi database**

   ```bash
   php artisan migrate
   ```

8. **Jalankan server**

   ```bash
   php artisan serve
   ```

Buka di browser:
👉 `http://127.0.0.1:8000`

---

## 👥 Role Pengguna

* **Masyarakat**
  Dapat mendaftar, login, dan mengirimkan pengaduan.

* **Admin**
  Dapat mengelola dan memproses pengaduan yang masuk.

---

## 📌 Tujuan Project

Project ini dibuat untuk:

* Meningkatkan kemudahan masyarakat dalam menyampaikan aspirasi dan laporan.
* Membantu instansi dalam mengelola pengaduan secara terpusat.
* Sebagai media pembelajaran dan portofolio pengembangan aplikasi web berbasis Laravel.

---

## 📷 Screenshot (Opsional)

Tambahkan screenshot aplikasi di sini agar repository terlihat lebih menarik.

---

## 🤝 Kontribusi

Kontribusi sangat terbuka!

1. Fork repository ini
2. Buat branch baru (`git checkout -b fitur-baru`)
3. Commit perubahan (`git commit -m 'Menambahkan fitur baru'`)
4. Push ke branch (`git push origin fitur-baru`)
5. Buat Pull Request

---

## 📄 Lisensi

Project ini menggunakan lisensi **MIT**.

---

## 📬 Kontak

Dikembangkan oleh: **Johnfarros**
GitHub: [https://github.com/johnfarrosnr-droid](https://github.com/johnfarrosnr-droid)

---

⭐ Jangan lupa beri star jika project ini bermanfaat!
