# Gunakan image PHP resmi
FROM php:8.2-apache

# Salin semua file ke direktori Apache
COPY . /var/www/html/

# Buka port 80
EXPOSE 80
