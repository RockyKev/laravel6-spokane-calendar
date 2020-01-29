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
