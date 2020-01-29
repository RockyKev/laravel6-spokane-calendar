<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## Shortcuts for Rocky

### boot up the server

Fresh install of repo?

1. npm start
2. composer install
3. php artisan key:generate
4. php artisan serve
5. make sure database is connected
6. ensure .env file exists and loads (it's the default rootpassword)
7. Create a few blog posts -- http://127.0.0.1:8000/articles/create

Kick it off?
php artisan serve

LINUX: http://localhost/phpmyadmin/
need to restart apache? sudo service apache2 restart

### make things

php artisan make:xxx -xx

### public vs resources folder?

public - you can put pure js/html/css in there
resources are things that need to be compiled down.

### compile scss into css

Get npm up and running --> npm install

Then in your webpack, modify things.

```
in webpack.mix.js
(entrypoint, and output)
FROM:
mix.js('resources/js/app.js', 'public/js')
  .sass("resources/sass/app.scss", "public/css");

TO:
mix.sass("resources/sass/app.scss", "public/css");

```

Next
npm run dev

to make it watch --
npm run watch

Finally, import it into your file.

<link rel="stylesheet" href="css/app.css">
OR use the mix function

<link rel="stylesheet" href="{{ mix('css/app.css') }}">

## Adding data rows to table

```
php artisan tinker

$prop = new App\PROP

$prop->value = "new value here"
$prop->data = "new data here"

$prop //to review

$prop->save();
```

## CRUD method for a controller

    index = show all list
    show = show single resource
    create = to create new resource
    store = save your new creation
    edit = to modify resource
    update = save your edit
    destroy = to destroy it


    php artisan make:controller THINGController -r

    //this will create the model and tie it to the controller as well.
    php artisan make:controller THINGController -r -m THING

## CRUD but for routing

http web verbs : GET, POST, PUT, DELETE

```
GET /articles
GET /articles/:id
GET /articles/:id/edit
GET /articles/create

POST /articles
PUT /articles/:id
DELETE /articles/:id

```

    REST
    Route::get('/articles', 'ArticlesController@index');
    Route::get('/articles/{article}', 'ArticlesController@show');

```
Question: How to use Restful Routing and static pages like about us together? Should I create a route like this Route::get("about-us", 'AboutUsController@index') ?

ANSWER: Don't bother. I typically create a PagesController for all static pages. So you'd have actions like PagesController@about, PagesController@contact, etc.
```

## Want to debug requests?

```
   public function store()
    {
        // die('hello'); // get something to show
        // dump(request()->all()); //show all the data

        $article = new Article();

        // pass article data over
        $article->title = request('title');
        $article->excerpt = request('excerpt');
        $article->body = request('body');

        $article->save();

        // redirect
        return redirect('/articles');
    }
```

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

-   [Simple, fast routing engine](https://laravel.com/docs/routing).
-   [Powerful dependency injection container](https://laravel.com/docs/container).
-   Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
-   Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
-   Database agnostic [schema migrations](https://laravel.com/docs/migrations).
-   [Robust background job processing](https://laravel.com/docs/queues).
-   [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 1500 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

-   **[Vehikl](https://vehikl.com/)**
-   **[Tighten Co.](https://tighten.co)**
-   **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
-   **[64 Robots](https://64robots.com)**
-   **[Cubet Techno Labs](https://cubettech.com)**
-   **[Cyber-Duck](https://cyber-duck.co.uk)**
-   **[British Software Development](https://www.britishsoftware.co)**
-   **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
-   **[DevSquad](https://devsquad.com)**
-   [UserInsights](https://userinsights.com)
-   [Fragrantica](https://www.fragrantica.com)
-   [SOFTonSOFA](https://softonsofa.com/)
-   [User10](https://user10.com)
-   [Soumettre.fr](https://soumettre.fr/)
-   [CodeBrisk](https://codebrisk.com)
-   [1Forge](https://1forge.com)
-   [TECPRESSO](https://tecpresso.co.jp/)
-   [Runtime Converter](http://runtimeconverter.com/)
-   [WebL'Agence](https://weblagence.com/)
-   [Invoice Ninja](https://www.invoiceninja.com)
-   [iMi digital](https://www.imi-digital.de/)
-   [Earthlink](https://www.earthlink.ro/)
-   [Steadfast Collective](https://steadfastcollective.com/)
-   [We Are The Robots Inc.](https://watr.mx/)
-   [Understand.io](https://www.understand.io/)
-   [Abdel Elrafa](https://abdelelrafa.com)
-   [Hyper Host](https://hyper.host)
-   [Appoly](https://www.appoly.co.uk)
-   [OP.GG](https://op.gg)

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
