# 📊 SalesOrderApp — CRUD PHP Native + Bootstrap

Sebuah aplikasi manajemen data **Employees** dan **Customers** berbasis PHP Native, menggunakan pendekatan **MVC sederhana**, serta didesain dengan **Bootstrap 5** agar tampil elegan, ringan, dan responsive.

---

## 🚀 Fitur Utama

- CRUD (Create, Read, Update, Delete) untuk:
  - ✅ Employees
  - ✅ Customers (dengan relasi ke Employees sebagai Sales Rep)
- 🔍 Pagination otomatis (5 data per halaman)
- 🌗 Dark/Light Mode toggle
- ⚠️ Alert notifikasi setelah tambah/edit/hapus
- 🧱 Struktur folder modular (config, controllers, models, views)
- 💡 Desain responsif menggunakan Bootstrap 5

---

## 📁 Struktur Folder

salesorder/
├── config/ # Koneksi database
├── controllers/ # Logika kontrol tiap entitas
├── models/ # Query SQL per entitas
├── views/
│ ├── layouts/ # Header, footer, navbar, dll
│ ├── employees/ # CRUD view untuk employees
│ └── customers/ # CRUD view untuk customers
├── assets/
│ ├── bootstrap.min.css # Bootstrap 5
│ └── css/style.css # Custom CSS (dark mode, animasi, dsb)
├── index.php # Halaman utama + router
└── .htaccess # (Opsional) clean URL untuk Apache

👨‍💻 Developer
Imam Ikhlasul Jihad
📫 GitHub: @Rdx11
