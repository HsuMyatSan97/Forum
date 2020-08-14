@extends('layout.app')
@section('title')

@endsection

@section('content')
 <div class="site-section">
     <div class="container">
      <div class="tutorial-item mb-4">
          <div class="d-flex justify-content-between align-item-center">
              <div>
                  <h2 class="mb-0"><strong>{{$question->title}}</strong></h2>
                 <p class="meta">
                     <span class="mb-4">{{$question->created_at->diffForHumans()}}</span>
                 </p>
              </div>
              <div class="d-flex">
                <img src="{{asset('images/person_2.jpg')}}" width="50" height="50" class="rounded-lg" alt="">
                  <div class="ml-2">
                      <h3 class="mb-0">
                          {{$question->user->name}}
                      </h3>
                    <span>{{$question->user->email}}</span>
                  </div>
              </div>
          </div>
         <p>
             {{$question->description}}
        </p>
      </div>

      @if (session('message'))
          <div class="alert alert-success">
              {{session('message')}}
          </div>
      @endif
     @foreach ( $question ->answers()->latest()->get() as $answer)
          <div class="tutorial-item mb-4">
                      <div>

                      <p>{{($answer->description)}}</p>

                        <p class="mb-0">
                          <span class="brand-react h5"></span>
                          <span class="brand-javascript h5"></span>
                        </p>
                        <p class="meta">
                        <span class="mr-2 mb-2">{{$answer->created_at->diffForHumans()}}</span>

                        </p>

                      <div class="d-flex justify-content-between align-items-center">

                        <div class="d-flex">
                            @if (Auth::user()->isLike($answer))
                        <form action="{{route('unlike',$answer->id)}}" method="POST">
                          @csrf
                          <button type="submit" style="background-color: transparent;border:none">
                            <i class="fas fa-thumbs-up fa-2x text-primary"></i>
                          </button>
                        </form>

                            @else
                              <form action="{{route('like',$answer->id)}}" method="POST">
                                @csrf
                                 <button type="submit" style="background-color: transparent;border:none">
                                    <i class="far fa-thumbs-up fa-2x text-primary"></i>
                                 </button>
                              </form>
                            @endif
                        <span class="text-primary">{{$answer->likes()->count()}}</span>


                            @can('update', $answer)
                                 <a href="{{route('answer.edit',[$question->id,$answer->id])}}" class="ml-3 mr-2">
                                    <button class="btn btn-success custom-btn">Edit</button>
                                 </a>
                            @endcan
                            @can('delete', $answer)
                              <form id="answer-delete-{{$answer->id}}" class="d-inline-block" action="{{route('answer.destroy',[$question->id,$answer->id])}}" method="POST">
                            @csrf
                            @method('DELETE')
                                <button class="btn btn-danger custom-btn" type="button"
                                onclick="if(confirm('Are you sure you want to detete?')){
                                event.preventDefault();
                                document.getElementById('answer-delete-{{$answer->id}}').submit();
                                }else{
                                event.preventDefault();
                                }">
                                Delete
                                </button>
                             </form>
                            @endcan


                        </div>
                        <div class="d-flex">
                            <img src="{{asset('images/xiao.jpg')}}" width="50" height="50" class="rounded-lg" alt="">
                                <div class="ml-2">
                                    <h3 class="mb-0">
                                        {{$answer->user->name}}
                                    </h3>
                                    <span>{{$answer->user->email}}</span>
                                </div>
                         </div>

                    </div>
                </div>
            </div>
     @endforeach

     <div class="tutorial-item">
        <h4>Submit your answer!</h4>
     <form action="{{route('answer.store',$question->id)}}" method="POST">
        @csrf
            <div class="form-group">
                <textarea name="description" rows="6" class="form-control" placeholder="Type your answer here!"></textarea>
            </div>
            <div class="d-flex">
                <input type="submit" class="btn btn-primary ml-auto" value="Submit">
            </div>
        </form>
     </div>
     </div>
 </div>
@endsection
