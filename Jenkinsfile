pipeline {
    agent any

    environment {
        // Define environment variables as needed
        DOCKER_HUB_REPO = 'vinoth3108/project'
        DOCKER_HUB_CREDENTIALS_ID = 'f1ef38fe-f8fe-4d9a-9800-4c2e2c90ce5e'
    }

    stages {
        stage('Build and Push Docker Image') {
            steps {
                script {
                    // Build Docker image
                    def dockerImage = docker.build("${DOCKER_HUB_REPO}:${env.BUILD_NUMBER}")

                    // Push Docker image to Docker Hub
                    docker.withRegistry('https://registry.hub.docker.com', DOCKER_HUB_CREDENTIALS_ID) {
                        dockerImage.push()
                    }
                }
            }
        }
    }
}
