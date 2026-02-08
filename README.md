# Laravel-JWT-BasicAuth-API
Request and Verify JWT Basic Authentication Api 

Note : No Database Needed for Testing

<p align="center">
    <a href="https://laravel.com" target="_blank">
        <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400">
    </a>
   
</p>

# LARAVEL 8

## Note
• copy .env.example to .env

## Modules

1. Request Token - Post Request
2. Verify Token - Post Request
3. Verify Token via Middleware - Get Request

## To Test

1. Run php artisan serve
2. Request Token
(import in Postman)
- curl -X POST "http://127.0.0.1:8000/api/v1/jwt/token" \
  -u jpsd_jwt_id:jpsd_jwt_secret

3. Verify Token
(import in Postman)
- curl --location --request POST 'http://127.0.0.1:8000/api/v1/jwt/verification' \
--header 'Authorization: Bearer <YOUR TOKEN HERE>'

4. Verify Token via Middleware - Get Request
(import in Postman)
- curl --location 'http://127.0.0.1:8000/api/verify' \
--header 'Authorization: Bearer <YOUR TOKEN HERE>'

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
