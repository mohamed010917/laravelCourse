<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Posts Dashboard</title>

<script src="https://cdn.tailwindcss.com"></script>

</head>

<body class="bg-gray-100">

<!-- Navbar -->
<nav class="bg-white shadow mb-8">
<div class="max-w-7xl mx-auto px-6 py-4 flex justify-between">

<a href="/" class="text-xl font-bold text-gray-800">
Posts Dashboard
</a>

<a href="{{ route('posts.create') }}"
class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
Create Post
</a>

</div>
</nav>

<div class="max-w-7xl mx-auto px-6">

@if(session('status'))
<div class="bg-green-100 text-green-700 p-4 rounded mb-6">
{{ session('status') }}
</div>
@endif

@yield('content')

</div>

</body>
</html>