pipeline {
    agent any

    environment {
        DOCKER_HUB_REPO = 'vinoth3108/project'
        DOCKER_HUB_CREDENTIALS_ID = 'dfc9f433-4802-4818-bead-1eff100ed7b2'
        DOCKER_IMAGE_TAG = 'first-image'
        DOCKER_USERNAME = 'vinoth3108'
        DOCKER_PASSWORD = '12345678'
    }

    stages {
        stage('Build and Push Docker Image') {
            steps {
                script {
                    // Docker login
                    withCredentials([[$class: 'UsernamePasswordMultiBinding', credentialsId: DOCKER_HUB_CREDENTIALS_ID, usernameVariable: 'DOCKER_USERNAME', passwordVariable: 'DOCKER_PASSWORD']]) {
                        sh "docker login -u $DOCKER_USERNAME -p $DOCKER_PASSWORD docker.io"
                    }

                    // Build and tag Docker image
                    def dockerImage = docker.image("${DOCKER_HUB_REPO}:${env.BUILD_NUMBER}")

                    // Build Docker image
                    dockerImage.build()

                    // Tag Docker image
                    sh "docker tag ${DOCKER_HUB_REPO}:${env.BUILD_NUMBER} ${DOCKER_HUB_REPO}:${DOCKER_IMAGE_TAG}"

                    // Push Docker image to registry
                    sh "docker push ${DOCKER_HUB_REPO}:${DOCKER_IMAGE_TAG}"
                }
            }
        }
    }
}


