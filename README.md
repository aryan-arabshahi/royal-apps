# Royal Apps Take Home Assignement

The Royal Apps take home assignement.

**Demo:** **[https://royal-apps.codewithcoffee.dev](https://royal-apps.codewithcoffee.dev)**

---

## Installation

To install and run the project do the follow:
```
git clone https://github.com/aryan-arabshahi/royal-apps.git
cd royal-apps
docker compose up -d
```

## How to Run Tests
You can run the tests using:
```
docker exec -it royal-apps-laravel php artisan test
```

## How to create a new author using CLI
To do that just run:
```
docker exec -it royal-apps-laravel bash
php artisan author:create Aryan Arabshahi 2020-10-10 male Heaven "test description"
```

## Project Structure

The project has been implemented with the N-Tier architecture. There are three main layers, The **Controller Layer** which is the reuqest handler layer, The **Service Layer** which is the business logic layer and the **View Layer** which is the represent layer. To save more time, I skipped the data modeling and used the array instead but with the data modeling, there would be the MVC architecture. Generally, it's a kinda proxy for **Symphony Skeleton API** and nothing more, So, There is no **Repository Layer** which acts as the Data access layer.
