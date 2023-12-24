pipeline {
    agent any

    environment {
        DOCKER_HUB_REPO = 'vinoth3108/project'
        DOCKER_REGISTRY_URL = 'https://registry.hub.docker.com'
        DOCKER_HUB_CREDENTIALS_ID = 'dfc9f433-4802-4818-bead-1eff100ed7b2'
    }

    stages {
        stage('Build and Push Docker Image') {
            steps {
                script {
                    // Docker login
                    withDockerRegistry(credentialsId: DOCKER_HUB_CREDENTIALS_ID, url: DOCKER_REGISTRY_URL) {
                        // Build and tag Docker image
                        def dockerImage = docker.image("${DOCKER_HUB_REPO}:${env.BUILD_NUMBER}")

                        // Build Docker image
                        dockerImage.build()

                        // Push Docker image to registry
                        dockerImage.push()
                    }
                }
            }
        }
    }
}
