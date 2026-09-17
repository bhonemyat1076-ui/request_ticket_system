# Request Ticket System

A Laravel-based request and support ticket management system designed for both end users and administrators. Users can create, view, update, and track support requests, while administrators can review submissions, manage ticket status, and monitor user activity from a dedicated dashboard.

## Features

- User registration and authentication
- Email verification support
- Role-based access control for admins and regular users
- Ticket creation with title, description, priority, and attachment upload
- Ticket status workflow such as open, pending, resolved, and closed
- User dashboard with filtered ticket views
- Admin dashboard with ticket monitoring and management
- User profile management
- Responsive UI built with Laravel and Tailwind CSS

## Tech Stack

- PHP 8.2
- Laravel 12
- MySQL / SQLite / PostgreSQL compatible database
- Composer
- Node.js + Vite
- Tailwind CSS
- Breeze authentication starter

## Project Structure

- `app/` – Application logic, controllers, models, middleware
- `config/` – Laravel configuration files
- `database/migrations/` – Database schema definitions
- `database/seeders/` – Seed data for admin and application setup
- `resources/views/` – Blade templates and UI components
- `routes/` – Route definitions for admin, user, and auth flows
- `tests/` – Automated test suite

## Requirements

Before running the project, make sure you have the following installed:

- PHP 8.2 or newer
- Composer
- Node.js and npm
- A database server such as MySQL or SQLite

## Installation

1. Clone the repository:

   ```bash
   git clone <repository-url>
   cd request_ticket_system
   ```

2. Install PHP dependencies:

   ```bash
   composer install
   ```

3. Install frontend dependencies:

   ```bash
   npm install
   ```

4. Create your environment file:

   ```bash
   cp .env.example .env
   ```

5. Generate the application key:

   ```bash
   php artisan key:generate
   ```

6. Configure your database in `.env`.

   Example:

   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=request_ticket_system
   DB_USERNAME=root
   DB_PASSWORD=
   ```

7. Run the database migrations:

   ```bash
   php artisan migrate
   ```

8. Optionally seed the admin user:

   ```bash
   php artisan db:seed
   ```

9. Build the frontend assets:

   ```bash
   npm run build
   ```

10. Start the application:

   ```bash
   php artisan serve
   ```

Then open the app in your browser at:

```text
http://localhost:8000
```

## Default Admin Account

This project includes a seeded admin account in the database seeder. You can update the credentials in `database/seeders/AdminUserSeeder.php` before production use.

Default values in the current project:

- Email: `bhonemyat1076@gmail.com`
- Password: `Apple@098`

> Change these credentials before deploying to a live environment.

## Usage

### For Users

- Register or log in
- Create new support tickets
- Add relevant details and optional attachments
- Track the status of each request
- Update tickets when needed

### For Admins

- View all submitted tickets
- Filter tickets by status
- Open, review, and update requests
- Manage ticket lifecycle and user activity

## Running Tests

```bash
php artisan test
```

## Notes

This application is a practical Laravel ticket management system suitable for internal support workflows, help desk operations, or service request tracking. It can be extended to include notifications, comments, assignment rules, reporting, or email alerts.

## License

This project is open-source and uses the MIT license.
