# Creating RESTful Applications

This project explores RESTful APIs and Model-View-Controller (MVC) backend structures.

## [🔗 Backend Documentation](mvc-backend/README.md)

Core functionality:
- `Model`: A database wrapper class that handles sql queries
    - `UserModel`, `RatingModel`, `CommentModel` inherits the Model Class
- `Controller`: Handles user requests and passes them to the `Model` Class for database operations.
    - `UserController`, `RatingController`, `CommentController` inherits the `BaseController` class.
- `Route`: handles requests to 'user-friendly' urls to .php files located in `/routes`

For detailed documentation, refer to [Backend Documentation](#🔗-backend-documentation)

## [🔗 Frontend Documentation](mvc-frontend/README.md)

SPA written in React. 

For detailed documentation, refer to [Frontend Documentation](#🔗-frontend-documentation)

## 