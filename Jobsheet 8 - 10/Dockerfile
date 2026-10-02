# Dockerfile ini memberi tahu Render cara menjalankan website PHP ini.
# Kamu tidak perlu mengerti isinya secara mendalam -- cukup ikuti panduan,
# file ini sudah siap pakai, tidak perlu diedit.

FROM php:8.3-apache

# Ekstensi PHP yang dibutuhkan untuk konek ke PostgreSQL
RUN docker-php-ext-install pdo pdo_pgsql

# Izinkan file .htaccess (dipakai untuk mengunci folder includes/ & database/
# supaya tidak bisa dibuka langsung lewat browser)
RUN sed -i 's/AllowOverride None/AllowOverride All/g' /etc/apache2/apache2.conf

# Salin semua file project ke folder web Apache
COPY . /var/www/html/

EXPOSE 80
CMD ["apache2-foreground"]
