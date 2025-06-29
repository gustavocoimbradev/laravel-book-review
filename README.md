<img src="https://github.com/user-attachments/assets/9bb08b29-b35b-4094-b49d-6642bd7ce705" alt="Imagem" height="80">

## About the project

This is a simple book review platform built with Laravel. Created for portfolio purposes to practice Laravel basics and relationships.

#### Features

- View a list of books  
- Add reviews to existing books  

#### Technologies

- Laravel  
- PHP  
- Tailwind CSS  
- SQLite  

## Main Files

#### Routes

- [routes/web.php](routes/web.php) - Application route definitions

#### Factories

- [database/factories/BookFactory.php](database/factories/BookFactory.php) – Generates fake book data for testing/seeding  
- [database/factories/ReviewFactory.php](database/factories/ReviewFactory.php) – Generates fake review data  
- [database/factories/UserFactory.php](database/factories/UserFactory.php) – Generates fake user accounts  

#### Seeders

- [database/seeders/DatabaseSeeder.php](database/seeders/DatabaseSeeder.php) – Calls all individual seeders to populate the database  

#### Migrations

- [database/migrations/0001_01_01_000000_create_users_table.php](database/migrations/0001_01_01_000000_create_users_table.php) – Creates the `users` table  
- [database/migrations/2025_06_21_152824_create_books_table.php](database/migrations/2025_06_21_152824_create_books_table.php) – Creates the `books` table  
- [database/migrations/2025_06_21_162557_create_reviews_table.php](database/migrations/2025_06_21_162557_create_reviews_table.php) – Creates the `reviews` table  

#### Models

- [app/Models/Book.php](app/Models/Book.php) - Book model
- [app/Models/Review.php](app/Models/Review.php) - Review model
- [app/Models/User.php](app/Models/User.php) - User model

#### Views

- [resources/views/books/index.blade.php](resources/views/books/index.blade.php) – List of book reviews  
- [resources/views/books/show.blade.php](resources/views/books/show.blade.php) – Detailed view of a single book  
- [resources/views/components/button.blade.php](resources/views/components/button.blade.php) – Reusable button component  
- [resources/views/components/card.blade.php](resources/views/components/card.blade.php) – Card component for displaying book info 

#### Controllers

- [app/Http/Controllers/BookController.php](app/Http/Controllers/BookController.php) - Book controller  
- [app/Http/Controllers/ReviewController.php](app/Http/Controllers/ReviewController.php) - Review controller  