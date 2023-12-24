pipeline {
    agent any

    environment {
        // Define environment variables as needed
        DOCKER_HUB_REPO = 'vinoth3108/project'
        DOCKER_HUB_CREDENTIALS_ID = 'dfc9f433-4802-4818-bead-1eff100ed7b2'
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
