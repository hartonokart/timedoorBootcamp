# timedoorBootcamp
Timedoor Backend Programming Exam 2024  

# Step by Step

1. First you need to have laravel, PHP, and Xampp(for Windows) or Mammp(for IOS) to make this website work
2. You can get all the program in google and i'm using laravel 10, php 8.
3. After you get all the program that you need, you need to download all this files and folders and put it in xampp/htdocs/bookshop
4. After you copy the folder to the directory, you need to seed and migrate the database first to get the fake data
5. To seed the data you just need to open the Terminal or Command prompt and change the directory to xampp/htdocs/bookshop then type php artisan migrate:fresh --seed
6. After that, you just need to run the laravel first by using php artisan serve
7. And you will get the https://"ip number":"port number", just copy it and run it in web browser

# Notes:
in case you haven't read in the form that i'm submit

1. The data that im using is not:
- 1000 fakes author
- 3000 fakes book category
- 100.000 fakes books
- 500.000 fakes rating
Because my laptop can't handle that many data, i've tried and waited for 30 minutes and it doesn't show anything in command prompt so i assumed it crashed

2. The search in homepage is for book name and i don't how to make it search book name and author name
3. I know it's wrong but, in insert rating page i just input the book and the rating into database so it won't affect author
4. At list shown option in homepage i cannot make it work
5. A little brief about database that i make:
- I made 4 databases: Author, Book, Category, Rating
- Author (One to Many)-> Book
- Book (One to One) -> Author
- Book (One to One) -> Category
- Category(One to Many) -> Book
- Book (One to Many) -> Rating
- Rating (One to Many) -> Book