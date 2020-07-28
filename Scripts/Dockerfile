FROM moelk/laravel

# Install cron
USER bitnami
RUN rm  composer.lock
RUN sudo apt-get update && sudo apt-get install -y cron

EXPOSE 80
