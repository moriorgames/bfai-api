# Build command:
# docker build -t moriorgames/bfai-api .
# Run command:
# docker run -td --name bfai_api -p 5200:5200 moriorgames/bfai-api
FROM        moriorgames/php72-base
MAINTAINER  MoriorGames "moriorgames@gmail.com"

# Install some packages to create http server
RUN         apt-get -y install git apache2
RUN         echo "ServerName localhost" >> /etc/apache2/apache2.conf

# config to enable .htaccess
ADD         docker/vhost_default.conf /etc/apache2/sites-available/000-default.conf
RUN         a2enmod rewrite

# Create Application directory
RUN         mkdir -p /app && rm -fr /var/www/html && ln -s /app /var/www/html
COPY        . /app
WORKDIR     /app

# Composer variables
ENV         COMPOSER_HOME /app

# Build project
RUN     php /app/phars/composer.phar install --optimize-autoloader
RUN     chown www-data:www-data /app -R
RUN     chmod 755 -R var
RUN     chmod 755 -R public

# Expose ports
EXPOSE  5200

# Add run scripts
ADD         docker/run.sh /run.sh
RUN         chmod 755 /*.sh

ENTRYPOINT  ["/run.sh"]