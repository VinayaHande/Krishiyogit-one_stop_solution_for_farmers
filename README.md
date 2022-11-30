# Krishiyogit-one_stop_solution_for_farmers
# Installation

- Clone the repository with `git clone`
- Copy `.env.example` file to `.env` and edit database credentials there
- Run `composer install`
- Run `php artisan key:generate`
- Run `php artisan migrate:fresh`
- Run `php artisan serve`
- Register 3 users for farmer, vendor & admin and change user type in users table to FARMER, VENDOR, ADMIN respectivly
- That's it


## Troubleshooting
- `php artisan optimize` if you feel everything is correct but still errors are there

