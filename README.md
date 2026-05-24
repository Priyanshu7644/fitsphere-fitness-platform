# FitSphere - Premium Fitness & Gym Management Platform

FitSphere is a modern, comprehensive web application built with Laravel and Tailwind CSS for managing fitness centers, trainers, users, and e-commerce. Designed with a sleek, premium UI (inspired by platforms like Cult.fit), it provides everything needed to run a professional fitness business.

![FitSphere Dashboard Overview](public/images/hero-bg.jpg)

## 🌟 Key Features

### For Users
- **Browse Programs & Live Sessions:** Discover and enroll in yoga, HIIT, strength training, and more.
- **E-Commerce Store:** Shop for fitness gear, supplements, and apparel with a sleek, sliding AJAX cart.
- **Gym Passes & Physical Centers:** Buy elite, pro, and home passes, and locate physical gym centers.
- **User Dashboard:** Track enrolled programs, live sessions, and view purchased passes.

### For Trainers
- **Program Management:** Create and manage fitness programs, including nested Workouts and Diet Plans.
- **Live Sessions:** Schedule and host live interactive fitness sessions.
- **Trainer Dashboard:** Monitor enrollments and manage their schedules directly.

### For Admins
- **Complete Platform Control:** Manage users, assign trainer roles, and oversee all platform activities.
- **E-Commerce Inventory:** Add and manage products, stock levels, and categories.
- **Passes & Centers:** Manage the pricing tiers for passes and the locations of physical centers.

## 🚀 Tech Stack

- **Backend:** Laravel 11.x (PHP 8.2+)
- **Frontend:** Tailwind CSS, Blade Templates, Vanilla JS (AJAX)
- **Database:** SQLite (Default for easy setup) / MySQL / PostgreSQL
- **Icons & Fonts:** Heroicons, Google Fonts (Inter, Outfit)

## 📦 Installation & Setup

Follow these steps to get the project running locally.

### 1. Clone the repository
```bash
git clone https://github.com/your-username/fitsphere.git
cd fitsphere
```

### 2. Install PHP & Node Dependencies
```bash
composer install
npm install
npm run build
```

### 3. Environment Configuration
Copy the example environment file and generate your application key:
```bash
cp .env.example .env
php artisan key:generate
```

### 4. Database Setup
The project is configured to use SQLite by default. Run the migrations and seed the database with mock data, products, and users:
```bash
php artisan migrate:fresh --seed
```

> **Note:** The seeder will automatically create an Admin, a Trainer, and a regular User for you, along with mock products, programs, and passes.

### 5. Start the Application
Run the local development server:
```bash
php artisan serve
```

Your application will be available at `http://localhost:8000`.

## 🔐 Default Test Accounts

Use these credentials to test different roles (password for all is `password`):

- **Admin:** `admin@fitsphere.com`
- **Trainer:** `trainer@fitsphere.com`
- **User:** `user@fitsphere.com`

## 📁 Directory Structure Highlights

- `app/Http/Controllers/` - Contains all business logic (Dashboard, Store, Programs, etc.)
- `resources/views/` - All Blade templates, beautifully styled with Tailwind CSS.
  - `layouts/` - Master layouts including public and authenticated dashboards.
  - `store/` - E-commerce pages including the sliding AJAX cart.
- `public/images/` - Local assets for mock products, hero banners, and centers.
- `routes/web.php` - Cleanly organized web routes with Role-Based Access Control middleware.

## 🤝 Contributing

Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

## 📄 License

[MIT](https://choosealicense.com/licenses/mit/)
