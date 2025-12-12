# 🚀 Professional Portfolio Website

A modern, production-ready portfolio website built with **Laravel**, **Blade**, **Tailwind CSS**, and **MySQL**. Features a complete admin panel for managing projects with file uploads, responsive design, and SEO optimization.

![Laravel](https://img.shields.io/badge/Laravel-11.x-red)
![PHP](https://img.shields.io/badge/PHP-8.2+-blue)
![MySQL](https://img.shields.io/badge/MySQL-8.0+-orange)
![Tailwind](https://img.shields.io/badge/TailwindCSS-3.x-cyan)

---

## ✨ Features

### Public Features
- 🏠 **Modern Homepage** - Hero section with featured projects
- 📄 **About Page** - Skills, experience, and education sections
- 📁 **Projects Portfolio** - Grid view with pagination
- 🔍 **Project Details** - Full project descriptions with tech stack
- 📥 **File Downloads** - ZIP file downloads for projects
- 🔗 **External Links** - GitHub and live demo links
- 📱 **Fully Responsive** - Mobile-first design
- 🎨 **Beautiful UI** - Modern design with Tailwind CSS
- 🚀 **SEO Optimized** - Meta tags and Open Graph support

### Admin Features
- 🔐 **Secure Authentication** - Laravel Breeze integration
- ➕ **Create Projects** - Rich form with validation
- ✏️ **Edit Projects** - Update project details and files
- 🗑️ **Delete Projects** - Safe deletion with confirmation
- 📸 **Image Upload** - Cover images with preview
- 📦 **ZIP Upload** - Project files up to 50MB
- ⭐ **Featured Projects** - Mark projects as featured
- 🔢 **Project Ordering** - Control display order
- 📊 **Admin Dashboard** - Manage all projects

---

## 🛠️ Tech Stack

- **Backend:** Laravel 11.x
- **Frontend:** Blade Templates + Tailwind CSS
- **Database:** MySQL 8.0+
- **Authentication:** Laravel Breeze
- **File Storage:** Local Storage
- **Validation:** Form Requests
- **Security:** Middleware, CSRF Protection

---

## 📋 Requirements

- PHP >= 8.2
- Composer
- MySQL >= 8.0
- Node.js & NPM (optional)

---

## 🚀 Quick Start

### 1. Clone Repository

```bash
git clone https://github.com/yourusername/portfolio.git
cd portfolio
```

### 2. Install Dependencies

```bash
composer install
```

### 3. Environment Setup

```bash
cp .env.example .env
php artisan key:generate
```

Update `.env` with your database credentials:

```env
DB_DATABASE=portfolio
DB_USERNAME=root
DB_PASSWORD=your_password
```

### 4. Database Setup

```bash
php artisan migrate
php artisan db:seed --class=ProjectSeeder
```

### 5. Storage Link

**IMPORTANT:** Create symbolic link for file uploads:

```bash
php artisan storage:link
```

### 6. Create Admin User

```bash
php artisan tinker
```

Then run:

```php
$user = new App\Models\User();
$user->name = 'Admin';
$user->email = 'admin@example.com';
$user->password = bcrypt('password123');
$user->is_admin = true;
$user->save();
```

### 7. Start Server

```bash
php artisan serve
```

Visit: **http://127.0.0.1:8000**

---

## 📁 Project Structure

```
portfolio/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── HomeController.php
│   │   │   ├── ProjectController.php
│   │   │   └── Admin/
│   │   │       └── AdminProjectController.php
│   │   ├── Middleware/
│   │   │   └── IsAdmin.php
│   │   └── Requests/
│   │       ├── StoreProjectRequest.php
│   │       └── UpdateProjectRequest.php
│   └── Models/
│       └── Project.php
├── database/
│   ├── migrations/
│   └── seeders/
│       └── ProjectSeeder.php
├── resources/
│   └── views/
│       ├── layouts/
│       ├── components/
│       ├── home.blade.php
│       ├── about.blade.php
│       ├── projects/
│       └── admin/
├── routes/
│   └── web.php
└── storage/
    └── app/
        └── public/
            └── projects/
                ├── images/
                └── zips/
```

---

## 🔑 Default Login

- **Email:** admin@example.com
- **Password:** password123

**⚠️ Change these immediately in production!**

---

## 🎨 Customization

### Update Personal Info

1. Edit `resources/views/components/navbar.blade.php` - Logo & name
2. Edit `resources/views/components/footer.blade.php` - Social links
3. Edit `resources/views/home.blade.php` - Hero content
4. Edit `resources/views/about.blade.php` - Bio, skills, experience

### Change Colors

Edit `resources/views/layouts/app.blade.php`:

```javascript
tailwind.config = {
    theme: {
        extend: {
            colors: {
                primary: '#3b82f6',    // Your primary color
                secondary: '#1e40af',  // Your secondary color
            }
        }
    }
}
```

---

## 📝 Usage Guide

### Creating a Project

1. Login as admin
2. Go to `/admin/projects`
3. Click "Add New Project"
4. Fill in project details:
   - Title (required)
   - Short description (max 500 chars)
   - Full description (min 50 chars)
   - Tech stack (comma-separated)
   - GitHub link (optional)
   - Live demo link (optional)
   - Cover image (JPEG, PNG, max 2MB)
   - ZIP file (max 50MB)
   - Featured status
   - Display order
5. Click "Create Project"

### File Upload Specifications

- **Cover Image:** JPEG, PNG, JPG, WEBP (max 2MB)
- **ZIP File:** ZIP archive (max 50MB)
- Files stored in: `storage/app/public/projects/`

---

## 🔒 Security Features

- CSRF Protection on all forms
- Authentication middleware
- Admin role verification
- File upload validation
- SQL injection protection (Eloquent ORM)
- XSS protection (Blade auto-escaping)
- Secure password hashing (bcrypt)

---

## 🚀 Deployment

### Production Checklist

- [ ] Set `APP_ENV=production`
- [ ] Set `APP_DEBUG=false`
- [ ] Update database credentials
- [ ] Change admin password
- [ ] Run optimization commands:

```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan optimize
```

- [ ] Set file permissions (755/644)
- [ ] Enable HTTPS
- [ ] Configure backups
- [ ] Set up monitoring

### Increase Upload Limits

Edit `php.ini`:

```ini
upload_max_filesize = 50M
post_max_size = 50M
max_execution_time = 300
```

---

## 🐛 Troubleshooting

### Images not showing?
```bash
php artisan storage:link
chmod -R 775 storage/app/public
```

### File upload fails?
```bash
chmod -R 775 storage/app/public/projects
```

### 403 on admin routes?
Ensure user has `is_admin = true` in database

---

## 📚 Documentation

- [Laravel Documentation](https://laravel.com/docs)
- [Tailwind CSS](https://tailwindcss.com/docs)
- [Installation Guide](INSTALLATION.md)

---

## 🤝 Contributing

Contributions are welcome! Please feel free to submit a Pull Request.

---

## 📄 License

This project is open-source and available under the [MIT License](LICENSE).

---

## 👨‍💻 Author

**Your Name**
- GitHub: [@shoh-27](https://github.com/shoh-27)

---

## ⭐ Show Your Support

Give a ⭐️ if this project helped you!

---

## 📧 Contact

For questions or support, email: shoh.nizmov.dev@gmail.com
