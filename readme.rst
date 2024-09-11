==============================
CodeIgniter 3 Project Setup Guide
==============================

Welcome! This guide will help you set up the CodeIgniter 3 project on your local machine or live server.

Requirements
------------
- PHP 7.2 or above
- MySQL
- Apache/Nginx (Optional for local setup)
- Composer (Optional)

Setup Instructions
==================

1. **Download and Extract the Project**
   
   - Download the ZIP file and extract it to your desired folder (e.g., `htdocs` for XAMPP or `www` for WAMP).

2. **Database Setup**
   
   - Import the `tailwebs.sql` file using phpMyAdmin or MySQL client.
   - Create a new database and import the file.

3. **Configure `base_url`**
   
   - Open `application/config/config.php` and update:
   
     .. code-block:: php
     
        $config['base_url'] = 'http://localhost/your_project_folder/';  # Localhost example

4. **Configure Database**
   
   - Open `application/config/database.php` and set your database details:
   
     .. code-block:: php
     
        $db['default'] = array(
            'hostname' => 'localhost',
            'username' => 'your_db_username',
            'password' => 'your_db_password',
            'database' => 'your_database_name',
            'dbdriver' => 'mysqli'
        );

5. **Run the Project**

   - Open your browser and visit:

     - Localhost: `http://localhost/your_project_folder/`
     - Live Server: `https://www.yourdomain.com/`

Troubleshooting
===============
- **404 Error**: Check your `base_url`.
- **Database Connection Error**: Verify database credentials and that MySQL is running.

Now you're all set!
