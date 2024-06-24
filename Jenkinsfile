pipeline {
    agent any
    environment {
        DOCKER_COMPOSE_VERSION = '3.8'
        DOCKER_IMAGE1 = "apache_esp_news"
        DOCKER_TAG1 = "latest"
        DOCKER_IMAGE2 = "mysql_esp_news"
        DOCKER_TAG2 = "latest"
    }
    stages {
        stage('Changer de répertoire') {
            steps {
                dir('Docker') {
                    script {
                        // bat "cd Docker"
                    }
                }
            }
        }
        stage('Créer les fichiers Image Docker') {
            steps {
                dir('Docker') {
                    script {
                        bat "docker --version" // Vérifier que Docker est accessible
                        // Lancement de Docker Compose
                        bat "docker build -t ${DOCKER_IMAGE2}:${DOCKER_TAG2} -f db.Dockerfile ."
                        bat "docker build -t ${DOCKER_IMAGE1}:${DOCKER_TAG1} -f web.Dockerfile ."
                    }
                }
            }
        }
        stage('Publier les images Docker') {
            steps {
                script {
                    bat "docker login -u cheikht -p m6rZ.uGUKpTXWkq"
                    // Pousser les images Docker vers Docker Hub
                    bat "docker tag ${DOCKER_IMAGE1}:${DOCKER_TAG1} cheikht/${DOCKER_IMAGE1}:${DOCKER_TAG1}"
                    bat "docker push cheikht/${DOCKER_IMAGE1}:${DOCKER_TAG1}"
                    bat "docker tag ${DOCKER_IMAGE2}:${DOCKER_TAG2} cheikht/${DOCKER_IMAGE2}:${DOCKER_TAG2}"
                    bat "docker push cheikht/${DOCKER_IMAGE2}:${DOCKER_TAG2}"
                }
            }
        }
    }
}
