@extends('layout/app')
@section('title')

<h1>The <strong>Hub</strong> Of <strong>Tutorials</strong></h1>
@endsection


@section('content')


            <div class="site-section bg-light pb-0">
              <div class="container">
                <div class="row align-items-stretch overlap">
                  <div class="col-lg-12">
                    <div>
                      <div class="d-flex tutorial-item mb-4">
                      <div class="w-100">
                      <h3><a href="{{route('question.show',$random->id)}}">{{$random->title}}</a></h3>
                      <p>{{Str::limit($random->description,250)}}</p>

                        <p class="mb-0">
                          <span class="brand-react h5"></span>
                          <span class="brand-javascript h5"></span>
                        </p>
                        <p class="meta">
                        <span class="mr-2 mb-2">{{$random->created_at->diffForHumans()}}</span>

                        </p>

                    <div class="d-flex justify-content-between align-items-center">
                        <div>

                            <a href="{{route('question.show',$random->id)}}" class="btn btn-primary custom-btn">View</a>
                            @can('update',$random)
                            <a href="{{route('question.edit',$random->id)}}" class="btn btn-success custom-btn">Edit</a>
                            @endcan

                            @can('delete',$random)
                                <form id="question-delete-{{$random->id}}" class="d-inline-block" action="{{route('question.destroy',$random->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger custom-btn" type="button"
                                onclick="if(confirm('Are you sure you want to detete?')){
                                event.preventDefault();
                                document.getElementById('question-delete-{{$random->id}}').submit();
                                }else{
                                event.preventDefault();
                                }">
                                Delete
                            </button>
                            </form>
                            @endcan

                        </div>
                        <h6>{{$random->answers()->count()}} Answers</h6>
                         <div class="d-flex">
                                <img src="{{asset('images/xiao.jpg')}}" width="50" height="50" class="rounded-lg" alt="">
                                <div class="ml-2">
                                    <h3 class="mb-0">
                                        {{$random->user->name}}
                                    </h3>
                                    <span>{{$random->user->email}}</span>
                                </div>
                            </div>
                    </div>

                    </div>
                    </div>
                  </div>

                </div>
              </div>
            </div>


            <div class="site-section">
              <div class="container">
                <div class="row">
                  <div class="col">
                    <div class="heading mb-4">
                      <span class="caption">Questions</span>
                      <h2>Choose Category</h2>
                    </div>
                  </div>
                </div>
                <div class="row align-items-stretch">
                    @foreach ($categories as $category)
                <a href="{{route('question.index',['category'=>$category->name])}}" class="btn {{Request::query('category') == $category->name ? 'btn-primary disabled' : 'btn-outline-primary'}} mx-1">{{$category->name}}</a>
                    @endforeach
                </div>
                </div>
                </div>

        <div class="site-section bg-light">
            <div class="container">
                @if (session('message'))
                    <div class="alert alert-success">{{session('message')}}</div>
                @endif

                <div class="row mb-5 align-items-center">
                  <div class="col-lg-6 mb-4 mb-lg-0">
                    <form action="#" class="d-flex search-form">
                      <span class="icon-"></span>
                      <input type="search" class="form-control mr-2" placeholder="Search subjects">
                      <input type="submit" class="btn btn-primary px-4" value="Search">
                    </form>
                  </div>
                  <div class="col-lg-6 text-lg-right">
                    <div class="d-inline-flex align-items-center ml-auto">
                    <a href="{{route('question.create')}}">
                      <button class="btn btn-primary">Ask New Question</button>
                    </a>

                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-12">
                    <div class="heading mb-4">
                      <span class="caption">Latest</span>
                      <h2>Tutorials</h2>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    @foreach ($questions as $question)
                    <div class="d-flex tutorial-item mb-4">
                      <div class="w-100">
                      <h3><a href="{{route('question.show',$question->id)}}">{{$question->title}}</a></h3>
                      <p>{{Str::limit($question->description,250)}}</p>

                        <p class="mb-0">
                         @foreach ($question->categories as $category)
                             <span class="badge badge-primary">{{$category->name}}</span>
                         @endforeach

                        </p>
                        <p class="meta">
                        <span class="mr-2 mb-2">{{$question->created_at->diffForHumans()}}</span>

                        </p>

                    <div class="d-flex justify-content-between align-items-center">
                        <div>

                            <a href="{{route('question.show',$question->id)}}" class="btn btn-primary custom-btn">View</a>
                            @can('update',$question)
                            <a href="{{route('question.edit',$question->id)}}" class="btn btn-success custom-btn">Edit</a>
                            @endcan

                            @can('delete',$question)
                                <form id="question-delete-{{$question->id}}" class="d-inline-block" action="{{route('question.destroy',$question->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger custom-btn" type="button"
                                onclick="if(confirm('Are you sure you want to detete?')){
                                event.preventDefault();
                                document.getElementById('question-delete-{{$question->id}}').submit();
                                }else{
                                event.preventDefault();
                                }">
                                Delete
                            </button>
                            </form>
                            @endcan

                        </div>

                <h6>{{$question->answers()->count()}} Answers</h6>

                         <div class="d-flex">
                                <img src="{{asset('images/xiao.jpg')}}" width="50" height="50" class="rounded-lg" alt="">
                                <div class="ml-2">
                                    <h3 class="mb-0">
                                        {{$question->user->name}}
                                    </h3>
                                    <span>{{$question->user->email}}</span>
                                </div>
                            </div>
                    </div>

                    </div>
                    </div>

                    @endforeach

                    <div>
                        {{$questions->links()}}

                    </div>
              </div>

                </div>
              </div>
            </div>

@endsection







