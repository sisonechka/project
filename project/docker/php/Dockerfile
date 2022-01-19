FROM webdevops/php-apache-dev:7.4
MAINTAINER Alexandr Zabara "zabara.industry@gmail.com"
WORKDIR /tmp/

COPY ./run_script  /tmp/
CMD /tmp/run_script
RUN chmod +x run_script

WORKDIR /var/www/html
