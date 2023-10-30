FROM bitnami/laravel:8.0.1

WORKDIR /web

COPY . /web

USER root

RUN apt-get update && apt-get install -y python2

RUN composer dump-autoload
RUN composer update --no-scripts
RUN npm install
RUN php artisan migrate

EXPOSE 8000

CMD [ "php", "artisan", "serv", "--host", "0.0.0.0" ]