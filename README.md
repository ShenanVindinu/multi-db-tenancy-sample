# 📍 Places: A Multi-Tenant Laravel Application

**Places** is a sample Laravel 12 application that demonstrates a powerful **multi-database tenancy** setup using [stancl/tenancy](https://github.com/stancl/tenancy). Each tenant has its own dedicated database to manage a list of places, ensuring complete data isolation and scalability.

This project is perfect for developers who want a clear, step-by-step implementation of robust multi-tenancy in Laravel.

---

## ✨ Features

- 🔐 **Full Authentication** – Laravel Breeze-powered login and registration
- 🏢 **Multi-Database Tenancy** – Each tenant gets their own database (`tenant_acme`, `tenant_globex`, etc.)
- 🌐 **Automatic Domain Identification** – Tenant is detected via domain/subdomain (e.g., `acme.core-app.test`)
- 🚀 **Tenant Database Automation** – Databases and migrations run automatically when a new tenant is created
- 📍 **Places CRUD** – Tenants can create and manage their own places
- 🎨 **Sleek UI** – Tailwind CSS with dark mode support

---

## 🛠️ Tech Stack

- **Backend:** Laravel 12  
- **Tenancy:** [stancl/tenancy](https://github.com/stancl/tenancy)  
- **Frontend:** Blade, Tailwind CSS  
- **Authentication:** Laravel Breeze  
- **Database:** MySQL  

---

## 🚀 Installation and Setup

Follow these steps to run the application locally:

### 1. Clone the Repository

```bash
git clone https://github.com/your-username/your-repo-name.git
cd your-repo-name
```

### 2. Install Dependencies

```bash
# PHP dependencies
composer install

# JavaScript dependencies
npm install
```

### 3. Environment Setup

```bash
cp .env.example .env
php artisan key:generate
```

### 4. Configure Central Database

Edit your `.env` file:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=core_app
DB_USERNAME=root
DB_PASSWORD=
```

Create the `core_app` database manually using a tool like TablePlus, DBeaver, etc.

### 5. Run Central Migrations

```bash
php artisan migrate
```

### 6. Compile Frontend Assets

```bash
npm run dev
```

---

## 🎉 Creating Your First Tenant

### 1. Use Tinker to Create Tenant

```bash
php artisan tinker
```

Then run:

```php
$tenant = App\Models\Tenant::create(['id' => 'acme']);
$tenant->domains()->create(['domain' => 'acme.core-app.test']);
```

### 2. Update Hosts File

Edit your system's `hosts` file:

- **Windows**: `C:\Windows\System32\drivers\etc\hosts`  
- **macOS/Linux**: `/etc/hosts`

Add this line:

```
127.0.0.1 acme.core-app.test
```

### 3. Register and Start Using

Open your browser:

```
http://acme.core-app.test/register
```

Register a user, log in, and start adding places! All your data will be saved in the `tenant_acme` database.

---

## ➕ Add Another Tenant

Repeat the process:

```php
$tenant = App\Models\Tenant::create(['id' => 'globex']);
$tenant->domains()->create(['domain' => 'globex.core-app.test']);
```

And in your `hosts` file:

```
127.0.0.1 globex.core-app.test
```

---

## 📄 License

This project is open-source and available under the [MIT license](LICENSE).
