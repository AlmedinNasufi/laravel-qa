@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h2>All Questions</h2>
                            <div class="ml-auto">
                                <a href="{{ route('questions.create') }}" class="btn btn-outline-secondary">Ask a question</a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        @include('layouts._message')
                       @foreach($questions as $question)
                           <div class="media">
                               <div class="d-flex flex-column counters">
                                   <div class="vote">
                                       <strong>{{ $question->votes }}</strong> {{Str::plural('vote', $question->votes)}}
                                   </div>
                                   <div class="status {{ $question->status }}">
                                       <strong>{{ $question->answers }}</strong> {{Str::plural('answer', $question->votes)}}
                                   </div>
                                   <div class="view">
                                       {{ $question->views ." ". Str::plural('view', $question->votes)}}
                                   </div>
                               </div>
                               <div class="media-body">
                                   <h3 class="mt-0"><a href="{{$question->url}}">{{$question->title}}</a></h3>
                                   <p class="lead">
                                    Asked By:
                                       <a href="{{$question->user->url}}">{{$question->user->name}}</a>
                                       <small class="text-muted">
                                           {{$question->created_date}}
                                       </small>
                                   </p>
                                   {{ Str::limit($question->body , 250) }}
                               </div>
                           </div>
                            <hr>
                       @endforeach


                    </div>
                    {{$questions->links('pagination::bootstrap-4')}}
                </div>
            </div>
        </div>
    </div>
@endsection