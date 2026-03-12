@extends('layout')

@section('content')

    <div class="bg-white p-6 rounded m-auto shadow max-w-xl">

        <h2 class="text-xl font-bold mb-6">
        Create Post
        </h2>

        <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">

            @csrf

            <input name="title"
            placeholder="Title"
            class="w-full border p-3 rounded mb-4">
            <select name="user_id" class="w-full border p-3 rounded mb-4">

                @foreach($users as $user)

                <option value="{{ $user->id }}">
                {{ $user->name }}
                </option>

                @endforeach

            </select>

            <input type="file"
            name="img"
            class="w-full border p-3 rounded mb-4">

            <textarea name="content"
            placeholder="Content"
            class="w-full border p-3 rounded mb-4"></textarea>



            <textarea name="discrption"
            placeholder="Description"
            class="w-full border p-3 rounded mb-4"></textarea>

            <button
            class="bg-blue-500 text-white px-6 py-2 rounded hover:bg-blue-600">
            Save
            </button>

        </form>

    </div>

@endsection