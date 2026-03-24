# JWT Authentication pada REST API Laravel

## Deskripsi 

Project ini merupakan implementasi **JWT (JSON Web Token)** pada REST API menggunakan Laravel.
JWT digunakan untuk mengamankan endpoint API sehingga hanya user yang memiliki token yang dapat mengakses endpoint tertentu.

## Tujuan

* Memahami konsep autentikasi berbasis token (JWT)
* Mengimplementasikan JWT pada Laravel
* Mengamankan endpoint API sesuai standar REST

---

## Teknologi yang Digunakan

* PHP (Laravel Framework)
* JWT Auth (`tymon/jwt-auth`)
* MySQL (Database)
* Postman (Testing API)

---

## 📂 Struktur Project (Sederhana)

```id="0zq1xs"
app/
 ├── Http/
 │   ├── Controllers/
 │   │   ├── Api/
 │   │   │   ├── AuthController.php
 │   │   │   ├── ProductController.php
 │   ├── Middleware/
 │       ├── JwtMiddleware.php
 ├── Models/
 │   ├── User.php
 │   ├── Product.php
routes/
 ├── api.php
```

---

## Konsep JWT

JWT (JSON Web Token) adalah token yang digunakan untuk autentikasi user.

Alur:

1. User login
2. Server menghasilkan token
3. Token dikirim ke client
4. Client mengakses API dengan header:

```id="bggk33"
Authorization: Bearer <token>
```

---

## 🔄 Alur Sistem

```id="gjqehh"
User → Login → Dapat Token → Akses API → Validasi Token → Response
```

---

## Instalasi

1. Clone repository

```id="93vg8t"
git clone https://github.com/username/jwt-auth-api.git
```

2. Install dependency

```id="sptwcb"
composer install
```

3. Setup environment

```id="5h23l3"
cp .env.example .env
```

4. Generate key

```id="p7tghg"
php artisan key:generate
```

5. Generate JWT secret

```id="izx6c1"
php artisan jwt:secret
```

6. Migrasi database

```id="q1dy5p"
php artisan migrate
```

7. Jalankan server

```id="45yevt"
php artisan serve
```

---

## Endpoint Authentication

### 🔹 Register

**POST** `/api/register`

```json id="o33q4c"
{
  "name": "Azzahra",
  "email": "azzah@gmail.com",
  "password": "123456"
}
```

---

### 🔹 Login

**POST** `/api/login`

Response:

```json id="4sffk3"
{
  "status": true,
  "token": "jwt_token"
}
```

---

## Proteksi Endpoint

### NON-SAFE METHOD (Wajib Token)

| Method | Endpoint           |
| ------ | ------------------ |
| POST   | /api/products      |
| PUT    | /api/products/{id} |
| DELETE | /api/products/{id} |

---

## Testing API (Postman)

### 1. Login

* Endpoint: `/api/login`
* Ambil token

---

### 2. Gunakan Token

Tambahkan di header:

```id="3j7xzf"
Authorization: Bearer jwt_token
```

---

### 3. Akses Endpoint Protected

Contoh:

```id="7x3nqk"
POST /api/products
```

---

## Middleware

Menggunakan middleware:

```id="a1fdlu"
jwt.verify
```

Fungsi:

* Memvalidasi token JWT
* Menolak akses jika token tidak valid

---

## Contoh Response

### GET Products

```json id="bdyh3v"
[]
```

atau

```json id="v2z1t2"
[
  {
    "id": 1,
    "name": "Handphone",
    "price": 15000000
  }
]
```

---

## ⚠️ Error yang Pernah Ditemui

### ❌ 404 Not Found

Penyebab:

* Route belum dibuat

---

### ❌ Mass Assignment Error

Penyebab:

* Field belum dimasukkan ke `$fillable`

---

### ❌ Unauthorized

Penyebab:

* Token tidak ada / salah

---

## Kesimpulan

* JWT berhasil diimplementasikan pada REST API Laravel
* Endpoint POST, PUT, DELETE telah diamankan
* Endpoint GET tetap dapat diakses tanpa token
* Sistem autentikasi berjalan dengan baik

---

## 👨‍💻 Author

**Azzahra Putri**
