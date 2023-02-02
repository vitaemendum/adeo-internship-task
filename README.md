<a name="readme-top"></a>
<details>
  <summary>Table of Contents</summary>
  <ol>
    <li>
      <a href="#about-the-project">About The Project</a>
      <ul>
        <li><a href="#requirements">Requirements</a></li>
        <li><a href="#suggestions">Suggestions</a></li>
        <li><a href="#built-with">Built With</a></li>
      </ul>
    </li>
    <li>
      <a href="#getting-started">Getting Started</a>
      <ul>
        <li><a href="#prerequisites">Prerequisites</a></li>
        <li><a href="#installation">Installation</a></li>
      </ul>
    </li>
    <li><a href="#user-interface">User interface</a></li>
    <li>
      <a href="#api-specification">API Specification</a>
      <ul>
        <li><a href="#get-apiproducts">GET api/products</a></li>
        <li><a href="#get-apiproductssku">GET api/products/{sku}</a></li>
        <li><a href="#post-apiproducts">POST api/products</a></li>
        <li><a href="#put-apiproductssku">PUT api/products/{sku}</a></li>
        <li><a href="#delete-apiproductssku">DELETE api/products/{sku}</a></li>
        <li><a href="#get-apiproductsrecommendedsku">GET api/products/recommended/{sku}</a></li>
      </ul>
    </li>
    <li><a href="#roadmap">Roadmap</a></li>
  </ol>
</details>

## About The Project

### Internship task for adeo web:
- Create a service, which returns product recommendations depending on the weather forecast;

### Requirements
 - Use **GIT** properly - just like you will do in production;
 - Store your product data in the database;
 - Service should be realized using REST API principles. Request and response should be handled in JSON format;
 - Integrate third-party API to get the current weather information in any Lithuania city. We recommend using the LHMT API: https://api.meteo.lt/ .  (Note, that this API requires you to inform the user about the source of the data, which is LHMT).
 - Use cache for all requests (for 5 min.).
 
 <p align="right">(<a href="#readme-top">back to top</a>)</p>
 
### Suggestions
 - It should use the most occurring weather type;
 - Host it somewhere (e.g. Heroku, Google) or provide us with the ability to launch your app (include the command that would start it, bonus if you include docker-compose.yml);
 - Fill the README.md file as you would do for a production application. Include challenge description, used technologies, setup guide and usage examples.

<p align="right">(<a href="#readme-top">back to top</a>)</p>

### Built With 
 - PHP 7+ version;
 - MySQL;
 - Laravel framework;
 - Tailwindcss;
 - alpine js;

<p align="right">(<a href="#readme-top">back to top</a>)</p>

## Getting Started
Please check the official laravel installation guide for server requirements before you start. [Official Documentation](https://laravel.com/docs/8.x/installation)

### Prerequisites

#### XAMPP setup

#### Step 1. Edit httpd.conf

Click on Config -> Apache (httpd.conf) Or you can find the file here 
`C:\XAMPP\apache\conf\httpd.conf`

Change the line

```
Listen 80
```

To 8666 or other free port 
( accordingly you will need to change `http://adeoweather.com:8666` to `http://adeoweather.com:{your chosen numbers}` in file `app\Htpp\Controllers\view\ProductViewController` `submit` method, located at the end of the file  )

```
Listen 8666
```

<p align="right">(<a href="#readme-top">back to top</a>)</p>

#### Step 2. Setting Virtual host

Open `httpd-vhosts.conf` file located in `C:\XAMPP\apache\conf\extra\httpd-vhosts.conf` and add
```
<VirtualHost *:8666>
    DocumentRoot "C:/xampp/htdocs/join_Matas_Bendikas/laravel/public"
    ServerName adeoWeather.cpm
    ServerAlias www.adeoWeather.com
    ErrorLog "logs/adeoWeather.log"
    CustomLog "logs/custom.adeoWeather.log" combined
    <Directory "C:/xampp/htdocs/join_Matas_Bendikas/laravel/public">
		Options -Indexes +FollowSymLinks
        AllowOverride All
        Require all granted
	</Directory>
</VirtualHost>
```

Find `vhost` file in `C:\Windows\System32\drivers\etc` and add 
```
127.0.0.1                   adeoWeather.com
```

Start/Re-start your Apache and MySQL again

<p align="right">(<a href="#readme-top">back to top</a>)</p>

### Installation
1. Clone the repo in `C:\XAMPP\htdocs\`

   ```sh
   git clone https://github.com/joinAdeoWeb/join_Matas_Bendikas.git
   ```
2. Switch to the repo folder

    ```sh
    cd join_Matas_Bendikas/laravel
    ```
3. Install all the dependencies using composer

    ```sh
    composer install
    ```
4. Copy the example env file and make the required configuration changes in the .env file

    ```sh
    cp .env.example .env
    ```
5. Generate a new application key

    ```sh
    php artisan key:generate
    ```
6. Run the database migrations (**Set the database connection in .env before migrating**)

    ```sh
    php artisan migrate
    ```
7. Install packages for alpine js./tailwindcss
    ```sh
    npm install
    ```
**TL;DR command list**

    git clone https://github.com/joinAdeoWeb/join_Matas_Bendikas.git
    cd join_Matas_Bendikas/laravel
    composer install
    cp .env.example .env
    php artisan key:generate
    php artisan migrate
    npm install
    
<p align="right">(<a href="#readme-top">back to top</a>)</p>

## User interface

<p align="center">
  <img alt="home page" src="/laravel/user_interface_pictures/home_page.png">
  <p align="center"> 1 Pav. Sistemos adeoWeather "Wardrobe" langas </p>
</p>
<p align="center">
  <img alt="product" src="/laravel/user_interface_pictures/product.png">
  <p align="center"> 2 Pav. Sistemos adeoWeather "product" langas </p>
</p>
<p align="center">
  <img alt="product edit" src="/laravel/user_interface_pictures/product_edit.png">
  <p align="center"> 3 Pav. Sistemos adeoWeather "edit product" langas </p>
</p>
<p align="center">
  <img alt="product create" src="/laravel/user_interface_pictures/product_create.png">
  <p align="center"> 4 Pav. Sistemos adeoWeather "create product" langas </p>
</p>
<p align="center">
  <img alt="recommendations" src="/laravel/user_interface_pictures/recommendations.png">
  <p align="center"> 5 Pav. Sistemos adeoWeather "What to wear" langas </p>
</p>
<p align="center">	
  <img alt="submited_recommendation" src="/laravel/user_interface_pictures/submited_recommendation.png">
  <p align="center"> 6 Pav. Sistemos adeoWeather "What to wear" langas kai pateikas miestas </p>
</p>
 
<p align="right">(<a href="#readme-top">back to top</a>)</p>

## API Specification

### GET api/products

Returns product list

#### Method URL

`https://adeoweather.com:8666/api/products`

#### Answer example

```json
{
  "data": [
    {
      "sku": "UM-3",
      "name": "Kepurė",
      "price": "10.99",
      "for_weather_forecasts": "sunny,rainy"
    },
    {
      "sku": "UM-17",
      "name": "Paltas",
      "price": "100.00",
      "for_weather_forecasts": "sleet,windy"
    },
    {
      "sku": "UM-18",
      "name": "Šalikas",
      "price": "5.00",
      "for_weather_forecasts": "sleet"
    }
  ]
}
```

<p align="right">(<a href="#readme-top">back to top</a>)</p>

### GET api/products/{sku}

Returns product by id(sku)

#### Method URL

`https://adeoweather.com:8666/api/products/3`

#### Answer example

```json
{
  "data": {
    "sku": "UM-3",
    "name": "Kepurė",
    "price": "10.99",
    "for_weather_forecasts": "sunny,rainy"
  }
}
```

<p align="right">(<a href="#readme-top">back to top</a>)</p>

### POST api/products

Create new product listing

#### Method URL

`https://adeoweather.com:8666/api/products`

#### Request example

```json
{
    "name": "Lietpaltis",
    "price": 30.00,
    "for_weather_forecasts": "rainy"
}
```

#### Answer example

```json
{
    "data": {
        "sku": "UM-20",
        "name": "Lietpaltis",
        "price": 30,
        "for_weather_forecasts": "rainy"
    }
}
```

<p align="right">(<a href="#readme-top">back to top</a>)</p>

### PUT api/products/{sku}

Update product

#### Method URL

`https://adeoweather.com:8666/api/products/3`

#### Product before update:

```json
{
  "data": {
    "sku": "UM-3",
    "name": "Kepurė",
    "price": "10.99",
    "for_weather_forecasts": "sunny,rainy"
  }
}
```

#### Request example

```json
{
    "name": "Kepurė su pašiltinimu",
    "price": "15.99",
    "for_weather_forecasts": "sunny,rainy"
}
```

#### Answer example

`status code: 200 OK`

GET `https://adeoweather.com:8666/api/products/3`

```json
{
    "data": {
        "sku": "UM-3",
        "name": "Kepurė su pašiltinimu",
        "price": "15.99",
        "for_weather_forecasts": "sunny,rainy"
    }
}
```

<p align="right">(<a href="#readme-top">back to top</a>)</p>

### DELETE api/products/{sku}

Delete product by id(sku)

#### Method URL

`https://adeoweather.com:8666/api/products/20`

#### Answer example

```json
{
    "data": {
        "success": true
    }
}
```

<p align="right">(<a href="#readme-top">back to top</a>)</p>

### GET api/products/recommended/{sku}

Get product recommendations by weather forecast for 3 days including current one. It may return from 0 to 2 products, depending on products added to your wardrobe.

#### Method URL

`adeoweather.com:8666/api/products/recommended/vilnius`

#### Answer example

```json
{
  "city": "Vilnius",
  "recommendations": [
    {
      "weather_forecast": "cloudy",
      "date": "2023-01-30",
      "products": [
        {
          "sku": "UM-21",
          "name": "Megztinis",
          "price": "20.00"
        },
        {
          "sku": "UM-22",
          "name": "Striukė",
          "price": "50.99"
        }
      ]
    },
    {
      "weather_forecast": "clear",
      "date": "2023-01-31",
      "products": [
        {
          "sku": "UM-23",
          "name": "Maikė ilgomis rankovėmis",
          "price": "15.00"
        }
      ]
    },
    {
      "weather_forecast": "cloudy",
      "date": "2023-02-01",
      "products": [
        {
          "sku": "UM-21",
          "name": "Megztinis",
          "price": "20.00"
        },
        {
          "sku": "UM-22",
          "name": "Striukė",
          "price": "50.99"
        }
      ]
    }
  ]
}
```

<p align="right">(<a href="#readme-top">back to top</a>)</p>

## Roadmap

- [x] Create a service, which returns product recommendations depending on the weather forecast;
- [x] Store your product data in the database;
- [x] Integrate third-party API to get the current weather information in any Lithuania city. We recommend using the LHMT API: https://api.meteo.lt/ . (Note, that this API requires you to inform the user about the source of the data, which is LHMT);
- [x] Use cache for all requests (for 5 min.);
- [ ] Host it somewhere (e.g. Heroku, Google) or provide us with the ability to launch your app (include the command that would start it, bonus if you include docker-compose.yml);

<p align="right">(<a href="#readme-top">back to top</a>)</p>
