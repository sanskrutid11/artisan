pipeline {
    agent any

    stages {

        stage('Clone Repository') {
            steps {
                git branch: 'main', 
                url: 'https://github.com/sanskrutid11/artisan.git'
            }
        }

        stage('Check PHP Syntax') {
            steps {
                bat 'for /r %%f in (*.php) do php -l "%%f"'
            }
        }

        stage('Clean Old Deployment') {
            steps {
                bat 'rmdir /S /Q C:\\xampp\\htdocs\\artisan || exit 0'
            }
        }

        stage('Deploy to XAMPP') {
            steps {
                bat 'xcopy /E /Y /I * C:\\xampp\\htdocs\\artisan'
            }
        }
    }
}
