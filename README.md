Product App

# Starting application

Clone the repository: 

`git clone https://github.com/Zoirjonovamaftuna/product-app.git product-app`

Move to the project folder

`cd product-app`

Copy .env

`cp .env.example .env`

Start application

`docker-compose up -d`

Run migrations

`docker-compose exec app php artisan migrate`

Run seeds

`docker-compose exec app php artisan db:seed`

## Ready to use

### Login Rute

Example of POST request to `http://localhost:8000/api/auth/login`

    {
        "email" : "user@example.com",
        "password" : "password"
    }

### Store product Route

Example of POST request to `http://localhost:8000/api/products`

    {
        "name" : "T-shirt",
        "description" : "Оверсайз футболка",
        "product_type_id" : 1,
        "product_attributes" : [
            {
                "attribute_id" : 1,
                "attribute_value_id" : 1
            }
        ]
    }

product_attributes - это параметры продукта типа Size, Color
так же есть attribute_value варианты значений параметра
