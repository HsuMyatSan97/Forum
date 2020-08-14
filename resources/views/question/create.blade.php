@extends('layout/app')
@section('title')
    <h1>Ask Your Questions!</h1>
@endsection
@section('content')

    <div class="site-section bg-light" id="contact-section">
      <div class="container">

        <div class="row justify-content-center">
          <div class="col-lg-8 mb-5" >
              <h4>If you have any question,contact me!</h4>
          <form action="{{route('question.store')}}" method="post">
              @csrf
              <div class="form-group row">
                <div class="col-md-12">
                  <input type="text" class="form-control" name="title" placeholder="Enter your title here">
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-12">
                    <label for="">Category</label><br>

                            @foreach ($categories as $category)
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" name="category[]" type="checkbox" id="category-{{$category->id}}" value="{{$category->id}}">
                                <label class="form-check-label" for="category-{{$category->id}}">{{$category->name}}</label>
                                </div>
                            @endforeach

                </div>
              </div>

              <div class="form-group row">
                <div class="col-md-12">
                  <textarea name="description" id="" class="form-control" placeholder="Explain your question here! " cols="30" rows="10"></textarea>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-4 ml-auto">
                  <input type="submit" class="btn btn-block btn-primary text-white py-2 px-5" value="Submit Question">
                </div>
              </div>
            </form>
          </div>

        </div>
      </div>
    </div>

@endsection
