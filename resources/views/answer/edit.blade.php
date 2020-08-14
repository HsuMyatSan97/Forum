@extends('layout/app')
@section('title')
    <h4>Edit your answer!</h4>
@endsection

@section('content')
    <div class="site-section">
        <div class="container">
            <div class="tutorial-item">
        <h4>edit your answer!</h4>
     <form action="{{route('answer.update',[$question->id,$answer->id])}}" method="POST">
        @csrf
        @method('PATCH')
            <div class="form-group">
            <textarea name="description" rows="6" class="form-control" placeholder="Type your answer here!">{{$answer->description}}</textarea>
            </div>
            <div class="d-flex">
                <input type="submit" class="btn btn-primary ml-auto" value="Edit">
            </div>
        </form>
        </div>

    </div>
     
</div>
@endsection