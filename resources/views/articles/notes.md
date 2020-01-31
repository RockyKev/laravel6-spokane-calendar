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

## Eloquent Syntax

```
    public function projects()
    {
        //Select * from project where user_id = X
        return $this->hasMany(Project::class);
    }
```

Essentially - this is a sql query. The table does need a user_id

Eloquent Collection
//$user = User::find(1); //select * from user where id = 1
//$user->projects; //select \* from projects where user_id = $user->id
//$user->projects->split(3)->first(1)->last(1)->groupBy(x)

//\$project->user
//it's referenced as a property, NOT a method.
//SELECT \* from USER where Project_ID = x
//It's translated to the approptate SQL query

//hasOne
//hasMany
//belongsTo
//belongsToMany
//morphMany
//MorphToMany

## Relationships

an article has many tags. And tags can have many articles.
if you have a tag

Article is Learn Laravel
so tags may be - php, laravel, work, education

## Model definition

```
class Article extends Model {

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
```

So this Article Model, when you call it's method - will return who owns this Article.
It does this by looking for a user_id, because of how the function was named.

But what if stakeholders doesn't want users, but authors?

'public function author()' will not work.

When you explore the belongsTo property, you can find other params that it accepts. user_id is one.

```
    public function author() {
        return $this->belongsTo(User::class, 'user_id');
    }
```
