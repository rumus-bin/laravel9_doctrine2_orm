@extends('welcome')

@section('content')
    <section>
        <form action="{{ route('posts.store') }}" method="post">
            @csrf
            <label>
                <input type="text" name="title">
            </label>
            <label>
                <textarea name="content"></textarea>
            </label>

            <button type="submit">Submit</button>
        </form>
    </section>
@endsection
