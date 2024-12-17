<<<<<<< HEAD
# Task Management Application

A feature-rich Task Management application built with Laravel to help users organize and manage their tasks efficiently.

---

## Features

### 1. **Task CRUD Operations**
- Add new tasks with a title and description.
- Update existing tasks directly from the task list.
- Delete tasks individually or in bulk.

### 2. **Bulk Actions**
- Select multiple tasks to mark as done or delete them in one action.

### 3. **Task Status Management**
- Easily track task statuses (Pending/Done).
- Change task status with a single click.

### 4. **User Authentication**
- Secure user authentication implemented with Laravel Breeze.

### 5. **Email Notifications**
- Sends email notifications to users upon task creation.
- Daily email reminders for users with pending tasks using Laravel’s scheduler.

### 6. **Responsive Design**
- Built with Bootstrap for a clean, responsive user interface.

### 7. **Background Job Processing**
- Emails and other heavy processes handled using Laravel Jobs and Queues.

### 8. **Task Scheduling**
- Uses Laravel's task scheduler to automate daily email notifications.

---

## Installation

Follow these steps to set up the project locally:

### Step 1: Clone the Repository
```bash
git clone git@github.com:sayedportfolio/todo_app.git
cd todo_app
```

### Step 2: Install Dependencies
```bash
composer install
npm install
```

### Step 3: Set Up Environment Variables
- Duplicate `.env.example` and rename it to `.env`.
- Update database credentials and mail settings in the `.env` file.

### Step 4: Generate Application Key
```bash
php artisan key:generate
```

### Step 5: Run Database Migrations
```bash
php artisan migrate
```

### Step 6: Compile Frontend Assets
```bash
npm run dev
```

### Step 7: Start the Development Server
```bash
php artisan serve
```

---

## Usage

1. Register and log in to the application.
2. Create tasks by adding a title and description.
3. Update tasks directly from the task list.
4. Use bulk actions to mark tasks as done or delete them.
5. Emails will be sent for new tasks and daily reminders for pending tasks.

---

## Scheduled Commands
To enable daily email reminders for pending tasks:
1. Ensure the Laravel Scheduler runs using a cron job:
   ```
   * * * * * php /path-to-your-project/artisan schedule:run >> /dev/null 2>&1
   ```
2. The scheduler will send emails automatically.

---

## Additional Notes
- Ensure the mail settings in `.env` are correctly configured for email notifications.
- Use `php artisan queue:work` to process queued jobs for sending emails.

---

## License
This project is open-source and available under the [MIT license](LICENSE).
=======
<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[WebReinvent](https://webreinvent.com/)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Jump24](https://jump24.co.uk)**
- **[Redberry](https://redberry.international/laravel/)**
- **[Active Logic](https://activelogic.com)**
- **[byte5](https://byte5.de)**
- **[OP.GG](https://op.gg)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
>>>>>>> 88941fb (Initial commit of Laravel Task Management application)
