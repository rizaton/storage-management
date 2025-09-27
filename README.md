# oil-stock-management

A Laravel application for managing oil stocks.  
Uses **Laravel Filament** for the admin panel and **Tailwind CSS** (via npm) for styling.  

---

| **Prompt (Command / Step)** | **Documentation / Result** |
|------------------------------|-----------------------------|
| `git clone https://github.com/yourusername/oil-stock-management.git` | Clone the repository |
| `cd oil-stock-management` | Navigate into the project |
| `composer install` | Install PHP dependencies |
| `cp .env.example .env` | Copy environment file and update DB settings |
| `php artisan key:generate` | Generate application key |
| `php artisan migrate --seed` | Run migrations and seeders for sample data |
| `npm install` | Install Node.js dependencies (for Tailwind) |
| `npm run build` | Build Tailwind assets |
| `php artisan serve` | Start Laravel dev server at `http://localhost:8000` |
| Login via Filament panel | Admin dashboard available at `/admin` |

---

## Features
- 🛢️ Manage oil stock records  
- 📊 Admin dashboard with **Laravel Filament**  
- 🎨 Tailwind CSS styling  
- 🗄️ Seeder for initial demo data  

---

## Requirements
- PHP 8.1+  
- Composer  
- Node.js & npm  
- MySQL / MariaDB  

---

Made using Laravel & Filament
