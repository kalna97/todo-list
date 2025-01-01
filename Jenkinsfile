pipeline { 
    agent any  // This means the job will run on any available Jenkins agent

    stages {
        stage('Checkout') {
            steps {
                // Checkout the code from Git
                git branch: 'main',  // Specify the branch to checkout
                    url: 'https://github.com/kalna97/todo-list',
                    credentialsId: 'your-credential-id'  // Replace with your Jenkins credentials ID if needed
            }
        }

        stage('Build') {
            steps {
                // Add any build steps here (e.g., run tests or compile code)
                echo 'Building the project...'
                // Example: Run build commands
                // sh 'npm install && npm run build'
            }
        }

        stage('Deploy') {
            steps {
                // Add any deployment steps here
                echo 'Deploying the project...'
                // Example: Run deployment commands
                // sh 'scp -r build/ user@server:/var/www/html'
            }
        }
    }
}
