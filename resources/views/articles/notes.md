# For error checking:

## Checking conditionals

@if ($errors->has('title'))
    <p class="help is-danger">{{ $errors->first('title') }}</p>
@endif

is the exact same as:

@error('title')

<p class="help is-danger">{{ $errors->first('title') }}</p>
@enderror

## OPTION 2

{{$errors->has('title') ? 'is-danger' : '' }}

is also

@error('title') is-danger @enderror

# For Finding ids of posts:

Doesn't work with slugs.
So articles/1 is valid
articles/my-first-blogpost is not.

    ```
    public function show($id)
    {
        $article = Article::findOrFail($id);

        // Show json
        // return $article;

        return view('articles.show', ['article' => $article]);
    }

```
This is the same as the one below it.

```

    public function show(Article $article)
    {
        return view('articles.show', ['article' => $article]);
    }

# For cleaning up data

```
        $article = new Article();

        $article->title = request('title');
        $article->excerpt = request('excerpt');
        $article->body = request('body');

        $article->save();

```

```
        Article::create([
            'title' => request('title'),
            'excerpt' => request('excerpt'),
            'body' => request('body'),
        ]);
```

GOTCHA -> Note, that you will get a error because 'fillable' data can be dangerous.
So open up the Article Model and add some safeguards.

```
protected $fillable = ['title', 'excerpt', 'body'];
```

Overall, they can change data like turning themselves into an admin, since the database is open.
Using the protected will ensure that they can't.

## SUPER CLEANUP

```
        request()->validate([
            'title' => ['required', 'min:3', 'max:255'],
            'excerpt' => 'required',
            'body' => 'required'
        ]);

        Article::create([
            'title' => request('title'),
            'excerpt' => request('excerpt'),
            'body' => request('body'),
        ]);
```

Is the same as

```
        $validatedAttributes = request()->validate([
            'title' => ['required', 'min:3', 'max:255'],
            'excerpt' => 'required',
            'body' => 'required'
        ]);

        Article::create($validatedAttributes);
```
