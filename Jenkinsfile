pipeline {
    agent any  // This means the job will run on any available Jenkins agent
    
    stages {
        stage('Checkout') {
            steps {
                // Checkout the code from Git
                git 'https://github.com/kalna97/todo-list'  // Replace with your repo URL
            }
        }

        stage('Build') {
            steps {
                // Add any build steps here (e.g., run tests or compile code)
                echo 'Building the project...'
            }
        }

        stage('Deploy') {
            steps {
                // Add any deployment steps here
                echo 'Deploying the project...'
            }
        }
    }
}
