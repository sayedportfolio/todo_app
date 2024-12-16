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
