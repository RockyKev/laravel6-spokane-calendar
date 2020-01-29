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
