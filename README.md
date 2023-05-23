# Student Registration Form

This project consists of a simple student registration form implemented in HTML and PHP. It allows users to input their full name, email address, and gender and stores the data in a MySQL database. Additionally, it displays a list of registered students from the database.

## Prerequisites

To run this project locally, you need the following:

- Web server (e.g., Apache, Nginx)
- PHP interpreter
- MySQL database

#### You can use XAMPP to do all the above

## Installation and Setup

1. Clone the repository or download the source code files.
2. Set up a web server with PHP support and configure it to serve the project files.
3. Create a MySQL database named `ibp`.
4. Create a table called `students` using the following SQL command:
    ```sql
    CREATE TABLE students (
        id INT AUTO_INCREMENT PRIMARY KEY,
        full_name VARCHAR(255),
        email VARCHAR(255),
        gender ENUM('Male', 'Female')
    );
    ```
5. Modify the database connection details in the PHP code (`register.php`) if necessary.
6. Open the project in a web browser by accessing the appropriate URL.

## Usage

1. Access the registration form by opening the URL of the project in a web browser.
2. Fill in the required information: full name, email address, and gender.
3. Click the "Submit" button to register the student.
4. If the registration is successful, a success message will be displayed; otherwise, any errors will be shown.
5. To view the list of registered students, scroll down the page to find the "Student List" section. It displays the ID, full name, email, and gender of each student.

## Troubleshooting

- **Connection failed**: If you encounter connection errors, ensure that the database connection details in `register.php` are accurate and that your MySQL server is running.
- **No students found in the database**: If you don't see any students in the list, make sure that you have registered at least one student or check the database connectivity.

