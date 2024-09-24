<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Laravel REST API Project

Laravel REST API Project ini berupa Sistem Gudang yang di dalamnya terdapat 3 Model yaitu User, Barang dan Mutasi yang mampu mengoperasikan beberapa fungsi diantaranya Register dan Login dengan Generate Token serta Operasi CRUD terhadap setiap model. Selain Itu juga mampu menampilkan histori mutasi untuk tiap user maupun barang dan dalam bentuk output data berupa JSON. Project ini dapat di deploy ke server menggunakan DockerFile dan disertakan pula link Workspace yang terpublish pada Pengujian di PostMan. Berikut ini merupakan cara install dan run projectnya:


## Cara Install Project

- **Clone Repository ini ke Perangkat anda [https://github.com/MuflihunAzis/IDGrowProject](https://github.com/MuflihunAzis/IDGrowProject)**
- **Masuk ke Repository anda [CD repo-name]**
- **Install Dependensi Project [composer install]**
- **Buat File .env lalu salin .env.example ke .env. Sesuaikan konfigurasi database di .env**
- **Generate Key Project [php artisan key:generate]**
- **Migrasi Database [php artisan migrate]**
- **Jalankan Server Project [php artisan serve]**
- **Optimasi Server Project [php artisan optimize]**


## Dokumentasi Penggunaan Endpoint REST API Menggunakan Postman

Untuk Menjalankan dan menguji fungsi Project ini, Gunakan Postman untuk mengakses REST API. Berikut daftar Endpoint REST API dari masing-masing Model. Kunjungi Address berikut :


- **Register [http://localhost:8000/api/register](http://localhost:8000/api/register)**
- **Login [http://localhost:8000/api/login](http://localhost:8000/api/login)**
- **CreateBarang [http://localhost:8000/api/barang](http://localhost:8000/api/barang)**
- **GetBarang [http://localhost:8000/api/barang/id-barang](http://localhost:8000/api/barang)**
- **UpdateBarang [http://localhost:8000/api/barang/id-barang](http://localhost:8000/api/barang/id-barang)**
- **DeleteBarang [http://localhost:8000/api/barang/id-barang](http://localhost:8000/api/barang/id-barang)**
- **CreateMutasi [http://localhost:8000/api/mutasi](http://localhost:8000/api/mutasi)**
- **GetMutasi [http://localhost:8000/api/mutasi](http://localhost:8000/api/mutasi)**
- **UpdateMutasi [http://localhost:8000/api/mutasi/id-mutasi](http://localhost:8000/api/mutasi/id-mutasi)**
- **DeleteMutasi [http://localhost:8000/api/mutasi/id-mutasi](http://localhost:8000/api/mutasi/id-mutasi)**
- **History Mutasi For Barang [http://localhost:8000/api/barang/barang-id/mutasi](http://localhost:8000/api/barang/barang-id/mutasi)**
- **History Mutasi For User [http://localhost:8000/api/barang/user-id/mutasi](http://localhost:8000/api/barang/user-id/mutasi)**

## Link Workspace Pengujian REST API Pada Postman

Berikut ini merupakan link workspace Pengujian REST API Pada Postman Link Berikut https://api.postman.com/collections/38200941-b5067686-1215-4255-a248-3f91b45d81f3?access_key=PMAT-01J8JWNQBJDK7ZZXZXXTY86JEJ.

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
