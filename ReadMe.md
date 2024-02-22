# THIS PROJECT WAS BUILT AND TESTED ON APACHE24, MYSQL 8 & PHP 8.
- Default Installation uses 'root' username & password is '12345678'
- Enabled PHP w/. Includes option in Apache
- administrator: 
    - username - admin
    - password - admin123

# INSTRUCTIONS TO RUN THE PROJECT
0. Copy this folder to your Apache htdocs folder
1. Open cmd
2. run mysql -u username -p -e "CREATE DATABASE movie_ticket_booking;
3. run mysql -u username -p movie_ticket_booking < C:/Apache24/htdocs/movie-ticket-dbms/src/database.sql 
4. run httpd
5. Open the URL 'localhost/movie-ticket-dbms' on your browser