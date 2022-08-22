
# School managment system

Tools: 
- Laravel
- livewire
- bootstrap
## Live version
http://school-managment--system.herokuapp.com/
Multi language School managment system with four dashboards

- Admin
- Teacher
- Student
- Parents

## Admin Dashboard 

Admin can Add 
 - Grades
 - Levels
 - classrooms
 - teachers
 - students
 - School expenses
 - invoices
 -  Parents
 Also pay installments.
 
![This is an image](https://github.com/mohamedelbadawi/school-Managment-system/blob/main/admin.png?raw=true)

## Teacher Dashboard
Teacher can create zoom meeting for a specific classroom once teacher created the meeting the students in the classroom will get a notification with all details of the meeting.
Also teacher can create a quiz with multiple choice and take attendance for the class that belongs to him


![This is an image](https://github.com/mohamedelbadawi/school-Managment-system/blob/main/teacher.png?raw=true)
## Student Dashboard 
student will see the meetings,quizzes that belongs to his classroom.
Also Dashboard will show the student the days he didn't attend.
![This is an image](https://github.com/mohamedelbadawi/school-Managment-system/blob/main/student.png?raw=true)


## Parent Dashboard
![This is an image](https://github.com/mohamedelbadawi/school-Managment-system/blob/main/parent.png?raw=true)

Dashboard contain sons and their data such as attendance invoices and their results of the quizzes
###

Clone the repository

    git clone https://github.com/mohamedelbadawi/school-Managment-system.git

Switch to the repo folder

    cd Grocery-ecommerce

Install all the dependencies using composer

    composer install
    composer update

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Generate a new application key

    php artisan key:generate


Run the database migrations (**Set the database connection in .env before migrating**)

    php artisan migrate

Start the local development server

    php artisan serve

You can now access the server at http://localhost:8000


**Make sure you set the correct database connection information before running the migrations** [Environment variables](#environment-variables)

    php artisan migrate
    php artisan serve

## Database seeding

Run the database seeder and you're done

    php artisan db:seed

***Note*** : It's recommended to have a clean database before seeding. You can refresh your migrations at any point to clean the database by running the following command

    php artisan migrate:refresh
    





## to launch the server
```bash
php artisan serve
```
The  project is now up and running! Access it at http://localhost:8000.
