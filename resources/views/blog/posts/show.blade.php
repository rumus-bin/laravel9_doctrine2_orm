@extends('welcome')

@section('content')
    <section>
            <div>
                <span>{{$post->title}}</span>
                <div>
                    {{$post->content}}
                </div>
            </div>
    </section>
@endsection
