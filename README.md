# Movie Booking System

This is a simple **Movie Booking System** built with **PHP** and **MySQL**. It allows users to book movie tickets online. The system supports multiple users, allowing them to view movie shows and make bookings easily.

## Features
- View available movies and showtimes.
- Book movie tickets.
- Store booking information in a MySQL database.
- Admin panel to manage movie listings and bookings.

## Requirements

- **PHP** (>=7.0)
- **MySQL** or **MariaDB**
- Web server like **Apache** or **Nginx**
- PHP **cURL** extension (for making HTTP requests)
- A database for storing booking details.

## Setup Instructions

### 1. Clone the repository
First, clone the project repository to your local machine.

```bash
git clone https://github.com/yourusername/movie-booking.git

### This **README.md** includes:
1. **Installation and Setup** for cloning, configuring the database, and setting up the project.
2. **Database Configuration**: Complete instructions for creating and configuring the `booking` database and tables.
3. **Web Server Configuration** for setting up Apache or Nginx with PHP.
4. **Running the Application** to access the site locally.
5. **Admin Panel Instructions** to manage movies and bookings.
6. **Project File Structure** for easy navigation.
7. **License** section (MIT license by default).

You can just copy and paste this complete content into your `README.md` file, and it should provide all the instructions needed to set up and run the **Movie Booking System**. Let me know if you need any further changes!
2. Configure the Database
2.1 Create the MySQL database:

    Open your MySQL or PHPMyAdmin and create a new database named booking. You can run the following SQL command to create the database:

CREATE DATABASE booking;

2.2 Configure the database connection:

    Navigate to the /Classes/connection.php file in your project directory.
    Update the database connection settings with your database credentials. In particular, update the following values:

$host_name = 'localhost'; // Hostname for the database server (use 'localhost' for local setup)
$user_name = 'root'; // Database username (use 'root' for local MySQL setup or your custom username)
$password = ''; // Database password (leave empty for default local MySQL setup, else provide your password)
$db_name = 'booking'; // Database name ('booking' should match the database you created)

Note:

    If you're using a remote server for MySQL, you will need to replace 'localhost' with the server's hostname or IP address.
    If your MySQL server uses a custom username or password, make sure to update those fields accordingly.

2.3 Create the necessary tables:

    Once the database is created, you'll need to create the tables. You can run the following SQL script to set up the required tables for storing movies and bookings.

USE booking;

CREATE TABLE movies (
    movie_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT,
    release_date DATE
);

CREATE TABLE bookings (
    booking_id INT AUTO_INCREMENT PRIMARY KEY,
    movie_id INT,
    customer_name VARCHAR(255) NOT NULL,
    customer_email VARCHAR(255),
    customer_phone VARCHAR(50),
    seats INT NOT NULL,
    booking_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (movie_id) REFERENCES movies(movie_id)
);

You can also add movie records in the movies table manually or through an admin interface in your system.
3. Configure the Web Server

    If you're using Apache, make sure to enable mod_rewrite for clean URLs.
    Ensure that your server has PHP and MySQL installed.
    Point your web server’s root directory to the project folder.

4. Run the Application

    Navigate to your project directory on the browser by accessing the corresponding URL (e.g., http://localhost/movie-booking/).
    The main page will allow users to view available movies and book tickets.

5. Admin Panel

To manage movies and bookings, navigate to the admin section of the website (URL depends on how you set up your app). You’ll need to add functionality to allow administrators to manage the movies and view the booking history.
File Structure

/Movie-Booking
│
├── /Classes/              # PHP classes for database connection and other functions
│   └── connection.php     # Database connection configuration
│
├── /database/             # Database setup scripts
│   └── schema.sql         # SQL schema for creating tables
│
├── /pages/                # Pages for the frontend
│   └── index.php          # Homepage
│
├── /assets/               # Static assets like CSS, JavaScript, Images
│   └── /css/              # CSS files
│   └── /js/               # JavaScript files
│   └── /images/           # Image files (e.g., movie posters)
│
└── README.md              # Project documentation

License

This project is open source and available under the MIT License.
