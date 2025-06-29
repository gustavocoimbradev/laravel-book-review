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