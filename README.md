# Land Registration and Transfer System based on  PHP MVC Framework 

A secure and efficient platform for registering, transferring, and managing land properties. This system allows users to register property details, transfer ownership, and authenticate transactions using advanced technologies such as QR codes and blockchain. With seamless integration and data encryption, it ensures transparency, security, and ease of use for all stakeholders involved.
## Features
- **AutoLoader**: Simplifies class management by automatically loading required files.
- **Log Class**: Tracks programming errors and debugging information.
- **Request Class**: Processes HTTP requests and retrieves parameters.
- **Response Class**: Handles HTTP responses and headers.
- **Router Class**: Maps URLs to controllers and actions.
- **View Class**: Renders dynamic views with templating support.
- **Session Class**: Manages user sessions securely and efficiently.
- **Hash Class**: Provides utilities for creating and verifying hashes for security purposes.
- **Validation Class**: Facilitates data validation with customizable rules to ensure data integrity.

## Getting Started
1. Clone this repository:
   ```bash
   git clone https://github.com/GhaithAlmomani/LandRegistrysystem.git 
   ```
2. Navigate to the project directory and set up your server environment.
3. Ensure that the following files have write permissions:
   - `storage/log`
   - `storage/session`
4. Start building your application using the provided structure.

## Running the Script in Steps

### Windows
1. **Download PHP**:
   - Download PHP version 8.3 VS16 X64 Thread Safe via the following link:  
     [https://windows.php.net/download#php-8.3](https://windows.php.net/download#php-8.3)
   - After downloading PHP, move it to the correct path, preferably `C:/php`.

2. **Download Apache**:
   - Download Apache 2.4.6 Win64 via the link:  
     [https://www.apachelounge.com/download/](https://www.apachelounge.com/download/)
   - After downloading Apache, move it to the correct path, preferably `C:/apache24`.

3. **Prepare the Wise Project**:
   - Move the Wise project to the `htdocs` folder inside your Apache directory.
   - Open the Apache configuration file: `C:/Apache24/conf/httpd.conf`.
   - Modify the `DocumentRoot` and `<Directory>` sections to point to `htdocs/wise/public`. For example:
     ```
     DocumentRoot "C:/Apache24/htdocs/LandRegistrysystem/public"
     <Directory "C:/Apache24/htdocs/LandRegistrysystem/public">
         AllowOverride All
         Require all granted
     </Directory>
     ```
   - Change `AllowOverride None` to `AllowOverride All` in the `<Directory>` section.
   - Change `DirectoryIndex index.html` to `DirectoryIndex index.php`.
   - Update the `ServerName` directive Change from: ``#ServerName www.example.com:80`` To:
     ```
     ServerName localhost:80
     ```
     Ensure you remove the `#` from the `ServerName` line.

4. **Link PHP with Apache**:
   - Ensure Apache is not running and open its configuration file: `C:/Apache24/conf/httpd.conf`.
   - Add the following lines to the bottom of the file:
     ```
     # PHP8 module
     PHPIniDir "C:/php"
     LoadModule php_module "C:/php/php8apache2_4.dll"
     AddType application/x-httpd-php .php
     ```
   - Enable rewrite mode in `httpd.conf` by uncommenting the following line (remove the `#` at the beginning):
     ```
     #LoadModule rewrite_module modules/mod_rewrite.so
     ```
   - Save the file after making this change.

5. **Run Apache**:
   - Open CMD and navigate to the Apache folder.
   - Run the following commands:
     ```
     C:/Apache24/bin/httpd.exe -k install
     C:/Apache24/bin/httpd.exe -k start
     ```
6. **Enable the PDO MySQL & MySQLi Extension**:
   - Open your php.ini file. This file is usually located in the PHP installation directory, for example:
     ```C:\php\php.ini```
      - Search for the following line:
         ```
        ;extension=pdo_mysql
        ;extension=mysqli
          ```
         - Remove the semicolon (;) at the beginning of the line to uncomment it:
        ```
        extension=pdo_mysql
        extension=mysqli
        ```
         - Restart Apache
           ```C:/Apache24/bin/httpd.exe -k restart```
7. **Download MySQL**
   - Download MySQL Installer 8.0 via the link:  
     [https://dev.mysql.com/downloads/installer/](https://dev.mysql.com/downloads/installer/)
   - After downloading MySQL, Install **MySQL Server** & **MySQL Workbench**

### Linux (Ubuntu)
- Explanation will be added soon.

## Contributions
Contributions are welcome! Feel free to fork this repository and submit pull requests.

## License
All rights reserved to https://github.com/xdayeh

Free to use without restrictions.
