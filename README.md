# 📰 News Portal — Laravel 11 Project

News Portal adalah aplikasi berbasis web yang dikembangkan menggunakan **Laravel 11** dan **Tailwind CSS** sebagai framework frontend.  
Aplikasi ini dirancang untuk mengelola berita (articles) dengan fitur login, manajemen pengguna, kategori, dan dashboard admin yang interaktif.

---

## 🚀 Fitur Utama
- **Autentikasi Pengguna** (Login, Register, Logout)
- **Manajemen Artikel Berita** (CRUD)
- **Kategori Berita** dengan hak akses admin
- **Dashboard Admin** dengan kontrol penuh atas konten dan user
- **Profil Pengguna** (lihat dan edit data profil)
- **Tampilan Dinamis** berdasarkan penulis dan kategori
- **Editor WYSIWYG** menggunakan **TinyMCE** untuk pengelolaan konten berita

---

## 🧱 Teknologi yang Digunakan
| Kategori | Teknologi |
|-----------|------------|
| Backend | Laravel 11 (PHP ^8.3) |
| Frontend | Tailwind CSS, TinyMCE |
| Database | MySQL / SQLite (default pada `database/database.sqlite`) |
| Package Dev | Laravel Debugbar, Laravel Pint, PHPUnit, Collision |
| Tools | Vite, PostCSS |

---

## ⚙️ Instalasi & Menjalankan Aplikasi
1. **Clone repository**
   ```bash
   git clone https://github.com/alifrusdiantoo/news-portal.git
   cd news-portal
   ```

2. **Instal dependensi composer**
   ```bash
   composer install
   ```

3. **Instal dependensi NPM**
   ```bash
   npm install
   npm run build
   ```

4. **Konfigurasi environment**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

5. **Jalankan migrasi dan seeding database**
   ```bash
   php artisan migrate --seed
   ```

6. **Jalankan server lokal**
   ```bash
   php artisan serve
   ```
   Akses aplikasi di: [http://localhost:8000](http://localhost:8000)

---

## 🗂️ Struktur Proyek (Utama)
```
app/
 ├── Http/
 │   ├── Controllers/
 │   │   ├── NewsController.php
 │   │   ├── LoginController.php
 │   │   ├── RegisterController.php
 │   │   ├── DashboardController.php
 │   │   ├── DashboardArticleController.php
 │   │   ├── DashboardUsersController.php
 │   │   └── AdminCategoriesController.php
 │   └── Middleware/
 │       └── IsAdmin.php
 ├── Models/
 │   ├── Article.php
 │   ├── Category.php
 │   └── User.php
 └── View/
     ├── Components/
     │   ├── Layout.php
     │   ├── Navbar.php
     │   └── Search.php
     └── Head/
         └── tinymceConfig.php

routes/
 └── web.php

database/
 ├── migrations/
 ├── seeders/
 └── factories/
```

---

## 🧭 Daftar Route Utama
| Route | Controller | Middleware | Deskripsi |
|-------|-------------|-------------|------------|
| `/` | `NewsController@index` | – | Menampilkan daftar berita |
| `/news/{article:slug}` | `NewsController@article` | – | Menampilkan detail artikel |
| `/categories/{category:slug}` | `NewsController@articleByCategory` | – | Menampilkan artikel berdasarkan kategori |
| `/authors/{user:username}` | `NewsController@articleByAuthor` | – | Artikel berdasarkan penulis |
| `/login`, `/register` | `LoginController`, `RegisterController` | `guest` | Autentikasi pengguna |
| `/dashboard` | `DashboardController@overview` | `auth` | Halaman dashboard utama |
| `/dashboard/articles` | `DashboardArticleController` | `auth` | CRUD artikel |
| `/dashboard/categories` | `AdminCategoriesController` | `admin` | CRUD kategori (admin only) |
| `/dashboard/users` | `DashboardUsersController` | `admin` | Manajemen user (admin only) |
| `/profile/{user:username}` | `UsersController@index` | – | Profil user |
| `/profile/{user:username}/edit` | `UsersController@edit` | `auth` | Edit profil user |

---

## 🧰 Middleware
- **auth** → Mengamankan route yang membutuhkan login
- **guest** → Membatasi akses halaman login/register bagi user yang sudah login
- **admin** → Membatasi akses halaman dashboard kategori dan user hanya untuk admin

---

## 🪶 Komponen & View
Aplikasi menggunakan *Blade Components* untuk modularisasi tampilan:
- **Layout** → struktur dasar halaman
- **Navbar** → navigasi utama
- **Search** → form pencarian artikel
- **TinyMCE Editor** → komponen editor teks untuk artikel