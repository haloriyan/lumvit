# Routes


## Defining route
You have to define all of your routes in /routes.php file. If you open it up, you will see some value of array kind of this

```php
$routes = [
    'PATH' => 'CALLBACK'
];
```

The key of $routes is URI path of your request. For an example, you want to http://localhost/hotel/public/user/login to handle login, so here the code must written

```php
$routes = [
    'user/login' => 'CALLBACK'
];
```

and for the callback, you have two options, it can be a closure to run a process directly, or a format to calling your controller.

```php
// with closure
$routes = [
    'user/login' => function() {
        return view('loginPage');
    }
];

// with controller
$routes = [
    'user/login' => "GET:UserController@loginPage"
];
```

as you can see, it had written in 3 sections with 2 separators. "GET" is mean the request will use GET method. If you need to use POST, then write "POST". And second is name of your controller that you call. In example we use UserController, that located in /app/Controllers/. The last is method in UserController that will called.

## Calling Route

When you need to call your in view, you can use route() function, and use route path as it value.

```php
<form action="<?= route('user/register') ?>" method="POST">
    <-- Form element -->
</form>


