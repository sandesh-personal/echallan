# E-Challan System

A web-based traffic violation management system built with PHP and MySQL. Officers can report offences, manage users, and view violation records through a dashboard.

## Features

- Officer login and authentication
- Report and manage traffic offences
- User (officer) management — add, update, delete
- View offence history and details
- Site settings configuration
- Email notifications via PHPMailer

## Tech Stack

- **Backend:** PHP (PDO)
- **Database:** MySQL
- **Frontend:** HTML, CSS, SCSS, JavaScript, Bootstrap
- **Mail:** PHPMailer

## Requirements

- PHP 7.4+
- MySQL 5.7+
- XAMPP / WAMP or any Apache server

## Setup

1. Clone the repository:
   ```bash
   git clone https://github.com/sandesh-personal/echallan.git
   ```

2. Move the folder to your server root (e.g. `C:/xampp/htdocs/`).

3. Import the database:
   - Open phpMyAdmin
   - Create a database named `tos`
   - Import the SQL file from the `INSTALL/` folder

4. Configure the database connection:
   ```bash
   cp connect.example.php connect.php
   ```
   Edit `connect.php` with your database credentials.

5. Open in browser:
   ```
   http://localhost/echallan/
   ```

## Project Structure

```
echallan/
├── assets/          # CSS, JS, images
├── INSTALL/         # Database SQL file
├── PHPMailer/       # Mail library
├── pagenotfound/    # 404 page
├── connect.php      # DB config (not committed — see connect.example.php)
├── index.php        # Dashboard
├── login.php        # Login page
└── ...              # Page and action files
```

## Security Note

`connect.php` contains your database credentials. **Never commit it to version control.** Use `connect.example.php` as a template and keep `connect.php` in `.gitignore`.

## License

MIT
