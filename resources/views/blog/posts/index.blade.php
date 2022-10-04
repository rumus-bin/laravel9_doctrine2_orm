@extends('welcome')

@section('content')
    <section>
        @if (\Session::has('success'))
            <div class="alert alert-success">
                <ul>
                    <li>{!! \Session::get('success') !!}</li>
                </ul>
            </div>
        @endif
        @foreach($posts as $post)
            <div>
                <span>{{$post->getTitle()}}</span>
                <div>
                    {{$post->getContent()}}
                </div>
                <span>
                    Author: {{$post->getAuthor()->getName()}}
                </span>
            </div>
        @endforeach
    </section>
@endsection
