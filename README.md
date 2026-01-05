# Symbiosis Indonesia Website

Website company profile dan manajemen konten untuk Symbiosis Indonesia - konsultan strategi bisnis berkelanjutan.

## 🚀 Tech Stack

- **Framework:** Laravel 12
- **Frontend:** Blade Templates + Bootstrap 5 + Alpine.js
- **Styling:** Custom CSS + Font Awesome 6
- **Database:** MySQL
- **Authentication:** Laravel Breeze

## 📋 Requirements

- PHP >= 8.2
- Composer
- Node.js >= 18
- MySQL 8.0+

## ⚡ Quick Setup

```bash
# 1. Clone repository
git clone <repository-url>
cd symbiosis_laravel

# 2. Install dependencies
composer install
npm install

# 3. Setup environment
cp .env.example .env
php artisan key:generate

# 4. Configure database di .env
DB_DATABASE=symbiosis_db
DB_USERNAME=root
DB_PASSWORD=

# 5. Run migrations & seed
php artisan migrate --seed

# 6. Create storage link
php artisan storage:link

# 7. Build assets
npm run build

# 8. Start server
php artisan serve
```

Atau gunakan shortcut:
```bash
composer setup
```

## 🔐 Default Login

| Role  | Email              | Password |
|-------|--------------------|----------|
| Admin | admin@symbiosis.id | password |

## 📁 Project Structure

```
├── app/
│   ├── Http/Controllers/
│   │   ├── Admin/          # Admin panel controllers
│   │   └── ContactController.php
│   └── Models/
├── resources/
│   └── views/
│       ├── admin/          # Admin panel views
│       ├── components/     # Reusable components
│       ├── layouts/        # Layout templates
│       ├── pages/          # Public pages
│       └── welcome.blade.php
├── routes/
│   └── web.php             # Application routes
└── public/
    └── assets/             # Static assets (images, css)
```

## 🎨 Features

### Public Website
- ✅ Homepage dengan hero, services, portfolio
- ✅ About, Service, Team pages
- ✅ Project listing dengan filter kategori
- ✅ Project detail dengan embed YouTube/TikTok
- ✅ News/Blog dengan detail view
- ✅ Contact form
- ✅ WhatsApp integration
- ✅ Testimonial slider

### Admin Panel
- ✅ Dashboard
- ✅ Project management (CRUD + image upload)
- ✅ News management (CRUD + WYSIWYG)
- ✅ YouTube video management
- ✅ User management
- ✅ Contact messages inbox

## 🛠 Development

```bash
# Start development server with hot reload
npm run dev

# In another terminal
php artisan serve

# Or use concurrent command
composer dev
```

## 📦 Production Build

```bash
npm run build
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

## 📝 Environment Variables

| Variable | Description | Default |
|----------|-------------|---------|
| `APP_NAME` | Nama aplikasi | Symbiosis |
| `APP_URL` | URL aplikasi | http://localhost:8000 |
| `DB_DATABASE` | Nama database | symbiosis_db_base |
| `MAIL_FROM_ADDRESS` | Email pengirim | hello@symbiosis.id |

## 📄 License

MIT License
