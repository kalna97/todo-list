pipeline { 
    agent any  

    stages {
        stage('Checkout') {
            steps {
                
                git branch: 'main',  
                    url: 'https://github.com/kalna97/todo-list',
                    credentialsId: 'your-credential-id'  
            }
        }

        stage('Build') {
            steps {
                
                echo 'Building the project...'
                
            }
        }

        stage('Deploy') {
            steps {
                
                echo 'Deploying the project...'
                
            }
        }
    }
}
