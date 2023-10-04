FROM mysql:8.0
WORKDIR /app
RUN chown -R admin:admin /var/lib/mysql
RUN chmod 755 /var/lib/mysql
USER admin 
