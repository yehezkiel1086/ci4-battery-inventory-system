# CI4 Battery Inventory System

Sistem Manajemen Produksi & Inventaris Baterai berbasis CodeIgniter 4.

## Tujuan Proyek

Membangun aplikasi monolith berbasis CodeIgniter 4 untuk mengelola data produksi dan stok baterai. Sistem ini dirancang untuk digunakan oleh bagian produksi dan gudang di PT Century Batteries Indonesia guna memantau hasil produksi dan distribusi baterai secara efisien.

## Deskripsi Singkat

Aplikasi ini membantu perusahaan untuk:

- Mencatat hasil produksi baterai per hari dari pabrik.
- Mengelola stok baterai di gudang.
- Melacak pengiriman ke dealer atau distributor.
- Menampilkan laporan interaktif.

Aplikasi ini bersifat *monolithic*, dibangun dengan **CodeIgniter 4**, dan menggunakan **Microsoft SQL Server** sebagai database utama.

![Battery inventory system flowchart](/assets/battery_inventory_system_flowchart.png)

![Battery inventory system ERD](/assets/battery_inventory_system_erd.png)

## Fitur Utama

1.  **Dashboard**: Menampilkan ringkasan total baterai, stok tersedia, dan total pengiriman.
2.  **Manajemen Produk (CRUD)**: Mengelola data master baterai (tipe, kapasitas, voltase, dll).
3.  **Manajemen Produksi**: Mencatat data produksi harian (jumlah, shift, operator).
4.  **Manajemen Stok & Pengiriman**: Mengelola stok gudang dan mencatat pengiriman baterai. Stok akan otomatis berkurang setelah pengiriman dicatat.
5.  **Laporan & Pencarian**: Menyediakan laporan dinamis dengan fitur pencarian dan filter.

## Cara Instalasi

1.  **Clone Repository**
    ```bash
    git clone https://github.com/username/ci4-battery-inventory-system.git
    cd ci4-battery-inventory-system
    ```

2.  **Install Dependencies**
    Pastikan Anda memiliki [Composer](https://getcomposer.org/). Jalankan perintah berikut untuk menginstal dependensi PHP.
    ```bash
    composer install
    ```

3.  **Konfigurasi Environment**
    Salin file `env` menjadi `.env` dan sesuaikan konfigurasinya, terutama untuk koneksi database.
    ```bash
    cp env .env
    ```
    Buka file `.env` dan atur koneksi ke SQL Server Anda.
    ```dotenv
    #--------------------------------------------------------------------
    # DATABASE
    #--------------------------------------------------------------------

    database.default.hostname = localhost
    database.default.database = ci4_battery_inventory
    database.default.username = sa
    database.default.password = your_password
    database.default.DBDriver = SQLSRV
    database.default.port = 1433
    ```

4.  **Jalankan Migrasi Database**
    Jalankan perintah berikut untuk membuat tabel-tabel yang dibutuhkan di database Anda.
    ```bash
    php spark migrate
    ```

5. **Seed Database**
    Jalankan perintah berikut untuk generate data database anda.
    ```bash
    php spark db:seed CategorySeeder 
	php spark db:seed BatterySeeder 
	php spark db:seed ShipmentSeeder 
	php spark db:seed InventorySeeder
    ```

## Cara Menjalankan Aplikasi

Gunakan perintah `spark` dari CodeIgniter untuk menjalankan server pengembangan lokal.

```bash
php spark serve
```

Aplikasi akan berjalan dan dapat diakses melalui **http://localhost:8080**.

## Endpoints API

Berikut adalah daftar endpoint yang tersedia dalam aplikasi ini, berdasarkan file `Routes.php`.

| Method | URI | Controller Action | Deskripsi |
|:-------|:-----------------------------|:-------------------------|:------------------------------------------------|
| `GET` | `/` | `Home::index` | Menampilkan halaman dashboard utama. |
| `GET` | `/batteries` | `Batteries::index` | Menampilkan daftar semua baterai. |
| `GET` | `/batteries/show/(:num)` | `Batteries::show/$1` | Menampilkan detail satu baterai. |
| `GET` | `/batteries/new` | `Batteries::new` | Menampilkan form untuk membuat baterai baru. |
| `POST` | `/batteries/create` | `Batteries::create` | Menyimpan data baterai baru ke database. |
| `GET` | `/batteries/edit/(:num)` | `Batteries::edit/$1` | Menampilkan form untuk mengedit baterai. |
| `POST` | `/batteries/update/(:num)` | `Batteries::update/$1` | Memperbarui data baterai yang sudah ada. |
| `POST` | `/batteries/delete/(:num)` | `Batteries::delete/$1` | Menghapus data baterai. |
| `GET` | `/inventory` | `Inventory::index` | Menampilkan halaman manajemen inventaris/stok. |
| `POST` | `/inventory/update/(:num)` | `Inventory::update/$1` | Memperbarui jumlah stok baterai. |
| `GET` | `/shipments` | `Shipments::index` | Menampilkan halaman untuk membuat pengiriman baru. |
| `POST` | `/shipments/send/(:num)` | `Shipments::send/$1` | Memproses pengiriman dan mengurangi stok. |
| `GET` | `/products` | `Products::index` | Menampilkan halaman produk. |

