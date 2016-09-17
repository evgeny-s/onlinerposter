FROM 4devs/phpfpm:5.6
 
#RUN yum -y install php-pecl-mongo && yum clean all
 
#RUN yum -y install nodejs npm jpegoptim gem \
#    && npm install -g uglifycss uglify-js less \
#    && gem install sass
 
# Add global binary directory to PATH and make sure to re-export it
ENV PATH /composer/vendor/bin:$PATH
 
# Allow Composer to be run as root
ENV COMPOSER_ALLOW_SUPERUSER 1
 
ENV COMPOSER_VERSION 1.2.0
 
RUN curl -o /tmp/composer-setup.php https://getcomposer.org/installer \
  && curl -o /tmp/composer-setup.sig https://composer.github.io/installer.sig \
  && php -r "if (hash('SHA384', file_get_contents('/tmp/composer-setup.php')) !== trim(file_get_contents('/tmp/composer-setup.sig'))) { unlink('/tmp/composer-setup.php'); echo 'Invalid installer' . PHP_EOL; exit(1); }"
 
# Install Composer
RUN php /tmp/composer-setup.php --no-ansi --install-dir=/usr/local/bin --filename=composer --version=${COMPOSER_VERSION} && rm -rf /tmp/composer-setup.php
 
WORKDIR /var/www