# Security Vulnerabilities

If you discover a security vulnerability within [Migohood](http://www.migohood.com), please send an e-mail at [developer@migohood.com](mailto:developer@migohood.com) All security vulnerabilities will be promptly addressed and recompensed.

# Routes

## Routes for Main site
```sh
GET:  /
```


## Routes for Authentication


#### Authentication routes...
```sh
GET:  /auth/login
POST: /auth/login
GET:  /auth/logout
GET:  /redirect
```

#### Registration routes...
```sh
GET:  /auth/register
POST: /auth/register
```

#### Password reset link request routes...
```sh
GET:  /password/email
POST: /password/email
```

#### Password reset routes...
```sh
GET:  /password/reset/{token}
POST: /password/reset
GET:  /password/success
```

#### Redirect To Provider...
```sh
GET:  /auth/{provider}
```

#### Provider Callback...
```sh
GET:  /auth/{provider}/callback
```


## Routes for No Authenticated users


```sh
GET:  /app/get/{resource}
```


## Routes for Authenticated users


#### Routes for Admin
```sh
GET:  /admin/panel
```

#### Routes for App
```sh
GET:  /app/create
POST: /app/create/{resource}
GET:  /app/{resource}/{hash}/{route}
GET:  /app/{resource}/{hash}/{route}/{next}/update
GET:  /app/{base}/{route}
POST: /app/thumbnail/upload/{resource}/{hash}
```

#### Routes for Maps
```sh
GET: /request/json/city/{id}
```

## Routes for Extra Functions
```sh
GET: /imgs/{folder}/{resource}/{filename}  
GET: /imgs/{folder}/{resource}/{filename}/delete  

```


# Laravel PHP Framework

[![Build Status](https://travis-ci.org/laravel/framework.svg)](https://travis-ci.org/laravel/framework)
[![Total Downloads](https://poser.pugx.org/laravel/framework/d/total.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Stable Version](https://poser.pugx.org/laravel/framework/v/stable.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Unstable Version](https://poser.pugx.org/laravel/framework/v/unstable.svg)](https://packagist.org/packages/laravel/framework)
[![License](https://poser.pugx.org/laravel/framework/license.svg)](https://packagist.org/packages/laravel/framework)

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable, creative experience to be truly fulfilling. Laravel attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as authentication, routing, sessions, queueing, and caching.

Laravel is accessible, yet powerful, providing powerful tools needed for large, robust applications. A superb inversion of control container, expressive migration system, and tightly integrated unit testing support give you the tools you need to build any application with which you are tasked.

## Official Documentation

Documentation for the framework can be found on the [Laravel website](http://laravel.com/docs).

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](http://laravel.com/docs/contributions).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell at taylor@laravel.com. All security vulnerabilities will be promptly addressed.

### Laravel License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)

### Repository License

GNU AFFERO GENERAL PUBLIC LICENSE, Version 3, 19 November 2007.
