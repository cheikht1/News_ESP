# Docker/db/Dockerfile
FROM mysql:5.7

# Copier le script d'initialisation
COPY mglsi_news.sql /docker-entrypoint-initdb.d/
