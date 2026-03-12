@extends('layout')

@section('content')

<div class="grid md:grid-cols-3 gap-6">

@foreach($posts as $post)

<div class="bg-white shadow rounded-lg overflow-hidden">

@if($post->img)
<img src="{{ asset('storage/'.$post->img) }}"
class="h-48 w-full object-cover">
@endif

<div class="p-5">

<h2 class="text-lg font-bold mb-2">
{{ $post->title }}
</h2>

<p class="text-gray-600 text-sm mb-4">
{{ Str::limit($post->content,100) }}
</p>

<div class="flex gap-2">

<a href="{{ route('posts.show',$post->id) }}"
class="bg-blue-500 text-white px-3 py-1 rounded text-sm">
View
</a>

<a href="{{ route('posts.edit',$post->id) }}"
class="bg-yellow-400 text-white px-3 py-1 rounded text-sm">
Edit
</a>

<form action="{{ route('posts.delete',$post->id) }}" method="POST">
@csrf
@method('DELETE')

<button
class="bg-red-500 text-white px-3 py-1 rounded text-sm">
Delete
</button>

</form>

</div>

</div>

</div>

@endforeach

</div>

@endsection