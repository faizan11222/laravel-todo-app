@extends('layouts.app')
@section('content')
<div class="container mt-5">

    <form method="POST" action="/todos/{{$todo->id}}" novalidate>
        @csrf
        @method('PATCH')
       

        <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" id="completed" name="completed" @if($todo->completed)checked
            @endif>
            <label class="form-check-label" for="completed">Completed</label>
        </div>
        <button type="submit" class="btn btn-success">Submit</button>
    </form>
</div>
@endsection