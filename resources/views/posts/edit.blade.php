@extends('layout')

@section('content')

    <div class="bg-white p-6 rounded shadow max-w-xl m-auto">

        <h2 class="text-xl font-bold mb-6">
        Edit Post
        </h2>

        <form action="{{ route('posts.update',$post->id) }}"
            method="POST"
            enctype="multipart/form-data">

            @csrf
            @method('PUT')

            <input name="title"
            value="{{ $post->title }}"
            class="w-full border p-3 rounded mb-4">

            @if($post->img)
            <img src="{{ asset('storage/'.$post->img) }}"
            class="h-40 mb-4 rounded">
            @endif

            <input type="file"
            name="img"
            class="w-full border p-3 rounded mb-4">

            <textarea name="content"
            class="w-full border p-3 rounded mb-4">
            {{ $post->content }}
            </textarea>

                <select name="user_id" class="w-full border p-3 rounded mb-4">

                    @foreach($users as $user)

                    <option  @selected($user->id == $post->user_id) value="{{ $user->id }}">
                    {{ $user->name }}
                    </option>

                    @endforeach

                </select>

            <textarea name="discrption"
            class="w-full border p-3 rounded mb-4">
            {{ $post->discrption }}
            </textarea>

            <button
            class="bg-green-500 text-white px-6 py-2 rounded hover:bg-green-600">
            Update
            </button>

        </form>

    </div>

@endsection