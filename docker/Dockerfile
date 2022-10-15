FROM wordpress
#RUN chown -R www-data:www-data /var/www
#RUN find /var/www/ -type d -exec chmod 0755 {} \;
#RUN find /var/www/ -type f -exec chmod 644 {} \;
#WORKDIR /var/www/wp-content
#COPY plugins plugins/

#COMPOSER
RUN curl -sS https://getcomposer.org/installer | php
RUN mv composer.phar /usr/local/bin/composer

#PHPUNIT
RUN composer global require "phpunit/phpunit"

ENV PATH /root/.composer/vendor/bin:$PATH

RUN ln -s /root/.composer/vendor/bin/phpunit /usr/bin/phpunit

WORKDIR /var/www/html