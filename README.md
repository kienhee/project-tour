<!-- Các bước chạy dự án. -->

Bước 1: Copy file .env.example đổi thành .env
Bước 2: đổi trường DB_DATABASE, Tài khoản, Mật khẩu ddataabase theo ý mình.
Bước 3: chạy 3 câu lệnh sau : php artisan key:generate, php artisan migrate, php artisan db:seed
Bứớc 4 : Vào Providers/AuthServiceProvider.php -> Mở comment để chạy phân quyền Gate.

<!-- Câu lệnh chạy sass -->

sass --watch ./public/client/scss/style.scss ./public/client/css/style.css
