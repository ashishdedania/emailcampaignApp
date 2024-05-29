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
