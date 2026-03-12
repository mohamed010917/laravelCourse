@extends('layout')

@section('content')

<div class="bg-white p-6 rounded shadow max-w-3xl">

<h1 class="text-2xl font-bold mb-4">
{{ $post->title }}
</h1>

@if($post->img)
<img src="{{ asset('storage/'.$post->img) }}"
class="mb-6 rounded">
@endif

<p class="text-gray-700 mb-4">
{{ $post->content }}
</p>

<p class="text-gray-500">
{{ $post->discrption }}
</p>

</div>

@endsection