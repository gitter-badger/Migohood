# Routes

## Routes for Main site


- GET: /

## Routes for Authentication


#### Authentication routes...

- GET: /auth/login
- POST: /auth/login
- GET: /auth/logout
- GET: /redirect

#### Registration routes...
- GET: /auth/register
- POST: /auth/register

#### Password reset link request routes...
- GET: /password/email
- POST: /password/email

#### Password reset routes...
- GET: /password/reset/{token}
```sh

  GET : /password/reset/SomeRandomString

```
- POST: /password/reset
- GET: /password/success

#### Redirect To Provider...
- GET: /auth/{provider}
```sh

  GET : /auth/facebook
  GET : /auth/google

```
#### Provider Callback...
- GET: /auth/{provider}/callback
```sh

  GET : /auth/facebook/callback
  GET : /auth/google/callback

```

## Routes for No Autenticated users


- GET: /{resource}
```sh

  GET : /spaces

  GET : /workspaces
  GET : /parkinglots
  GET : /services

```

## Routes for Autenticated users


#### Routes for Admin

- GET: /admin/panel

#### Routes for App

- GET: /create
- POST: /create/{resource}
```sh

  POST : /create/space

  POST : /create/workspace
  POST : /create/parkinglot
  POST : /create/service

```

- GET: /{resource}/{hash}/{route}
```sh

  GET : /space/hash/basics
  GET : /space/hash/description

  GET : /space/hash/location
  GET : /space/hash/photos
  GET : /space/hash/pricing
  GET : /space/hash/extras

  GET : /workspace/hash/basics
  GET : /workspace/hash/description
  GET : /workspace/hash/location
  GET : /workspace/hash/photos
  GET : /workspace/hash/pricing
  GET : /workspace/hash/extras

  GET : /parkinglot/hash/basics
  GET : /parkinglot/hash/description
  GET : /parkinglot/hash/location
  GET : /parkinglot/hash/photos
  GET : /parkinglot/hash/pricing

  GET : /service/hash/basics
  GET : /service/hash/description
  GET : /service/hash/location
  GET : /service/hash/photos
  GET : /service/hash/pricing

```

- GET: /{resource}/{hash}/{route}/{next}/update
```sh

  GET : /space/hash/basics/description/update
  GET : /space/hash/description/location/update
  GET : /space/hash/location/photos/update


```

- [GET]: /{base}/{route}
```sh

  GET : /dashboard/panel
  GET : /dashboard/reservations
  GET : /dashboard/inbox
  GET : /dashboard/myspaces
  GET : /dashboard/mywokspaces
  GET : /dashboard/myparkinglots
  GET : /dashboard/myservices
  GET : /dashboard/transactions
  GET : /dashboard/history
  GET : /dashboard/settings

```

## Laravel PHP Framework

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

### License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)
