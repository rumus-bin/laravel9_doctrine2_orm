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
            <div>
                <h3>Leave comment</h3>
                <form action="{{ route('post-comments.store') }}" method="post">
                    <input type='hidden' name="post_id" value="{{ $post->getId() }}">
                    <textarea name="content" id="" cols="30" rows="10"></textarea>
                    <button type="submit">Comment</button>
                </form>
            </div>
            <div>
                <h3>Comments</h3>
                @foreach($post->getComments() as $comment)
                    <div>
                        <span>{{$comment->getContent()}}</span>
                        Commented by: <span>{{$comment->getAuthor()->getName()}}</span>
                    </div>
                @endforeach
            </div>
        @endforeach
    </section>
@endsection
