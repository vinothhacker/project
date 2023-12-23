pipeline {
    agent {
        docker {
            // Use an official PHP image with Composer installed
            image 'php:7.4'
        }
    }
    
    environment {
        // Customize environment variables if needed
        COMPOSER_HOME = "${env.WORKSPACE}/.composer"
        AWS_ACCESS_KEY_ID     = credentials('AKIA4AKDZ5BLGGALZ4OU')
        AWS_SECRET_ACCESS_KEY = credentials('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')
        AWS_DEFAULT_REGION    = 'ap-south-1'
        ECR_REPO_URL          = 'public.ecr.aws/e8e9p4c4/aws_ecs_docker'
    }

    stages {
        stage('Checkout') {
            steps {
                git branch: 'main', url: 'https://github.com/vinothhacker/project.git'
            }
        }

        stage('Install Dependencies') {
            steps {
                // Install Composer dependencies
                sh 'apt-get update && apt-get install -y'
                sh 'composer require php-mysqli'
                sh 'composer require ext-pdo'
                sh 'composer require ext-mysqli'
            }
        }

        stage('Run Tests') {
            steps {
                // Run PHPUnit tests
                sh 'vendor/bin/phpunit'
            }
        }

        stage('Build and Deploy') {
            steps {
                // Build Docker image
                script {
                    def dockerImage = docker.build("public.ecr.aws/e8e9p4c4/aws_ecs_docker:latest")
                }

                // Authenticate Docker client with AWS ECR
                script {
                    docker.withRegistry("https://${AWS_DEFAULT_REGION}.dkr.ecr.${AWS_DEFAULT_REGION}.amazonaws.com", "ecr:credentials") {
                        // Push Docker image to ECR
                        dockerImage.push()
                    }
                }
            }
        }
    }

    post {
        always {
            // Clean up after the build, for example, removing temporary files
        }
    }
}
