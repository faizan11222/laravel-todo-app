@extends('layouts.app')
@section('content')
<div class="container mt-5">

    <form method="POST" action="/todoss" novalidate>
        @csrf
        <div class="form-group row">
            <label for="title" class="col-md-12 col-form-label">{{ __('Title') }}</label>

            <div class="col-md-12">
                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title"
                    value="{{ old('title') }}" autocomplete="title">

                @error('title')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

        </div>
        <div class="form-group row">
            <label for="date" class="col-md-12 col-form-label">{{ __('Date') }}</label>

            <div class="col-md-12">
                <input id="date" type="datetime-local" class="form-control @error('date') is-invalid @enderror" name="date"
                    value="{{ old('date') }}" autocomplete="date">

                @error('date')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

        </div>
        <div class="form-group row">
            <label for="description" class="col-md-12 col-form-label">{{ __('Description') }}</label>

            <div class="col-md-12">
                <textarea name="description" class="form-control @error('description') is-invalid @enderror"
                    id="description" cols="30" rows="10">{{old('description')}}</textarea>
                @error('description')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <a type="submit" href="/todoshow"  class="btn btn-success mt-4  ">Show all tasks</a>
</div>
@endsection