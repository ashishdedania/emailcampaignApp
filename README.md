In Application all below points are done except poin 3 "Email Sending and Tracking" we can make it more better.  

(1) User Authentication:
Implement user registration and login functionalities using Laravel’s built-in features.
(2) Email Campaign Management:
Create a CRUD interface for managing email campaigns and email templates.
(3) Email Sending and Tracking:
Implement a feature to send emails and track their status (sent, delivered, opened).
Store email statuses in a MySQL database.
(4)Reporting Dashboard:
Create a dashboard to display campaign performance metrics (number of emails sent, delivered, opened).
Use a charting library like Chart.js or a similar tool to visualize the data.



Steps to install application

(1) take clone from repo

(2) create Database

(3) composer install

(4) npm install

(5) php artisan migrate

(6) npm run dev

(7) php artisan serve

(8) application will be open at http://127.0.0.1:8000/

(9)to send email run below url
	http://127.0.0.1:8000/campaigns/{campaign}/{template}/send-emails

(10)run queue by this command 
        php artisan queue:work
