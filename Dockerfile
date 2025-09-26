# ใช้ PHP 8.1 ร่วมกับ Apache
FROM php:8.1-apache

# ติดตั้งส่วนขยาย (Extensions) ที่จำเป็นสำหรับการเชื่อมต่อฐานข้อมูล MySQL/MariaDB
RUN docker-php-ext-install pdo_mysql

# ตั้งค่าสิทธิ์ให้ Apache สามารถอ่าน/เขียนไฟล์ในโฟลเดอร์ src ได้
RUN chown -R www-data:www-data /var/www/html

CMD ["apache2-foreground"]