@extends('layouts.app')
@section('content')
<div class="container mt-5">

    <form method="POST" action="/todoss/{{$todo->id}}" novalidate>
        @csrf
        @method('PATCH')
        <div class="form-group row">
            <label for="title" class="col-md-12 col-form-label">{{ __('Title') }}</label>
            <div class="col-md-12">
                <input id="title" type="text" class="form-control " name="title"
                    value="{{ $todo->title ?? old('title') }}" autocomplete="title">

                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

        </div>
        <div class="form-group row">
            <label for="date" class="col-md-12 col-form-label">{{ __('date') }}</label>
            <div class="col-md-12">
                <input id="date" type="datetime" class="form-control" name="date"
                    value="{{ $todo->date }}" autocomplete="date">

                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

        </div>
        <div class="form-group row">
            <label for="description" class="col-md-12 col-form-label">{{ __('Description') }}</label>

            <div class="col-md-12">
                <textarea name="description" class="form-control" id="description"
                    cols="30" rows="10">{{$todo->description ?? old('description')}}</textarea>
                @error('description')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" id="completed" name="completed" @if($todo->completed)checked
            @endif>
            <label class="form-check-label" for="completed">Completed</label>
        </div>
        <button type="submit" class="btn btn-success">Submit</button>
    </form>
</div>
@endsection