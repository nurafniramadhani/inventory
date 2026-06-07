# Inventory System API v1
Base URL: http://localhost:8000/api/v1

## Auth

### POST /api/v1/register
* Description: Mendaftarkan user baru ke dalam sistem.
* Headers: Accept: application/json
* Body (JSON):
{
  "name": "Nama User",
  "email": "user@mail.com",
  "password": "password123",
  "password_confirmation": "password123"
}
* Response (201 Created):
{
  "success": true,
  "data": {
    "user": {
      "id": 1,
      "name": "Nama User",
      "email": "user@mail.com"
    },
    "token": "1|abcdefg..."
  },
  "message": "User registered"
}

### POST /api/v1/login
* Description: Melakukan login untuk mendapatkan token akses.
* Headers: Accept: application/json
* Body (JSON):
{
  "email": "user@mail.com",
  "password": "password123"
}
* Response (200 OK):
{
  "success": true,
  "data": {
    "token": "1|abcdefg..."
  },
  "message": "Login successful"
}

---

## Categories

### GET /api/v1/categories
* Description: Mengambil semua data kategori.
* Headers: Authorization: Bearer {token}, Accept: application/json
* Response (200 OK):
{
  "success": true,
  "data": [
    {
      "id": 1,
      "name": "Elektronik"
    }
  ],
  "message": "Data berhasil ditampilkan"
}

### POST /api/v1/categories
* Description: Menambahkan kategori baru.
* Headers: Authorization: Bearer {token}, Accept: application/json
* Body (JSON):
{
  "name": "Elektronik"
}
* Response (201 Created):
{
  "success": true,
  "data": {
    "id": 1,
    "name": "Elektronik"
  },
  "message": "Kategori dibuat"
}

### GET /api/v1/categories/{id}
* Description: Mengambil detail satu kategori berdasarkan ID.
* Headers: Authorization: Bearer {token}, Accept: application/json
* Response (200 OK):
{
  "success": true,
  "data": {
    "id": 1,
    "name": "Elektronik"
  },
  "message": "Data berhasil ditampilkan"
}

### PUT /api/v1/categories/{id}
* Description: Mengubah data kategori berdasarkan ID.
* Headers: Authorization: Bearer {token}, Accept: application/json
* Body (JSON):
{
  "name": "Elektronik Perubahan"
}
* Response (200 OK):
{
  "success": true,
  "data": {
    "id": 1,
    "name": "Elektronik Perubahan"
  },
  "message": "Kategori diperbarui"
}

### DELETE /api/v1/categories/{id} (admin only)
* Description: Menghapus kategori berdasarkan ID (Hanya untuk Admin).
* Headers: Authorization: Bearer {token}, Accept: application/json
* Response (204 No Content):
{
  "success": true,
  "data": null,
  "message": "Kategori dihapus"
}

---

## Items

### GET /api/v1/items
* Description: Mengambil semua data item/barang.
* Headers: Authorization: Bearer {token}, Accept: application/json
* Response (200 OK):
{
  "success": true,
  "data": [
    {
      "id": 1,
      "name": "Laptop",
      "quantity": 10,
      "price": 5000000,
      "category_id": 1
    }
  ],
  "message": "Data berhasil ditampilkan"
}

### POST /api/v1/items
* Description: Menambahkan item baru (dilengkapi sistem sanitasi input).
* Headers: Authorization: Bearer {token}, Accept: application/json
* Body (JSON):
{
  "name": "Laptop",
  "quantity": 10,
  "price": 5000000,
  "category_id": 1
}
* Response (201 Created):
{
  "success": true,
  "data": {
    "id": 1,
    "name": "Laptop",
    "quantity": 10,
    "price": 5000000,
    "category_id": 1
  },
  "message": "Item dibuat"
}

### GET /api/v1/items/{id}
* Description: Mengambil detail satu item berdasarkan ID.
* Headers: Authorization: Bearer {token}, Accept: application/json
* Response (200 OK):
{
  "success": true,
  "data": {
    "id": 1,
    "name": "Laptop",
    "quantity": 10,
    "price": 5000000,
    "category_id": 1
  },
  "message": "Data berhasil ditampilkan"
}

### PUT /api/v1/items/{id}
* Description: Mengubah data item berdasarkan ID.
* Headers: Authorization: Bearer {token}, Accept: application/json
* Body (JSON):
{
  "name": "Laptop Gaming",
  "quantity": 8,
  "price": 15000000,
  "category_id": 1
}
* Response (200 OK):
{
  "success": true,
  "data": {
    "id": 1,
    "name": "Laptop Gaming",
    "quantity": 8,
    "price": 15000000,
    "category_id": 1
  },
  "message": "Item diperbarui"
}

### DELETE /api/v1/items/{id} (admin only)
* Description: Menghapus item berdasarkan ID (Hanya untuk Admin).
* Headers: Authorization: Bearer {token}, Accept: application/json
* Response (204 No Content):
{
  "success": true,
  "data": null,
  "message": "Item dihapus"
}