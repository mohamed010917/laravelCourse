@extends('layout')

@section('content')

<div class="max-w-4xl mx-auto bg-white shadow-lg rounded-xl p-6">

    <h1 class="text-3xl font-bold mb-4 text-gray-800">
        {{ $post->title }}
    </h1>

    @if($post->img)
        <img
            src="{{ asset('storage/'.$post->img) }}"
            class="w-full max-h-[400px] object-cover rounded-lg mb-6"
        >
    @endif

    <p class="text-gray-700 text-lg mb-4">
        {{ $post->content }}
    </p>

    <p class="text-gray-500 mb-4">
        {{ $post->discrption }}
    </p>

    <p class="text-sm text-gray-400 mb-6">
        {{ $post->created_at->diffForHumans() }}
    </p>


    {{-- COMMENTS --}}

    <h2 class="text-xl font-bold border-t pt-4 mb-4">
        Comments
    </h2>


    {{-- Add --}}
    <form method="POST" action="{{ route('comments.store') }}">
        @csrf

        <input type="hidden" name="post_id" value="{{ $post->id }}">

        <textarea
            name="comment"
            class="w-full border rounded p-2 mb-2"
        ></textarea>

        <button class="bg-blue-600 text-white px-4 py-2 rounded">
            Add
        </button>

    </form>



    {{-- LIST --}}
    @foreach($post->comments as $comment)

        <div class="border rounded p-3 mt-4">

            <p>{{ $comment->comment }}</p>

            <p class="text-xs text-gray-400">
                {{ $comment->created_at->diffForHumans() }}
            </p>


            <div class="flex gap-3 mt-2">

                {{-- edit button --}}
                <button
                    onclick="openEdit({{ $comment->id }},'{{ $comment->comment }}')"
                    class="text-blue-600"
                >
                    Edit
                </button>


                {{-- delete button --}}
                <button
                    onclick="openDelete({{ $comment->id }})"
                    class="text-red-600"
                >
                    Delete
                </button>

            </div>

        </div>

    @endforeach

</div>



{{-- ================= EDIT MODAL ================= --}}

<div id="editModal"
class="hidden fixed inset-0 bg-black/50 flex items-center justify-center">

    <div class="bg-white p-6 rounded w-96">

        <h2 class="font-bold mb-3">Edit Comment</h2>

        <form method="POST" id="editForm">
            @csrf
            @method("PUT")

            <textarea
                id="editInput"
                name="comment"
                class="w-full border p-2 mb-3"
            ></textarea>

            <div class="flex gap-2">

                <button
                    class="bg-blue-600 text-white px-3 py-1 rounded"
                >
                    Save
                </button>

                <button
                    type="button"
                    onclick="closeEdit()"
                    class="bg-gray-400 px-3 py-1 rounded"
                >
                    Cancel
                </button>

            </div>

        </form>

    </div>

</div>



{{-- ================= DELETE MODAL ================= --}}

<div id="deleteModal"
class="hidden fixed inset-0 bg-black/50 flex items-center justify-center">

    <div class="bg-white p-6 rounded w-80">

        <h2 class="mb-4">
            Are you sure ?
        </h2>

        <form method="POST" id="deleteForm">
            @csrf
            @method("DELETE")

            <div class="flex gap-2">

                <button
                    class="bg-red-600 text-white px-3 py-1 rounded"
                >
                    Yes
                </button>

                <button
                    type="button"
                    onclick="closeDelete()"
                    class="bg-gray-400 px-3 py-1 rounded"
                >
                    No
                </button>

            </div>

        </form>

    </div>

</div>



<script>

function openEdit(id, text)
{
    document.getElementById("editModal").classList.remove("hidden")

    document.getElementById("editInput").value = text

    document.getElementById("editForm").action =
        "/comments/" + id
}

function closeEdit()
{
    document.getElementById("editModal").classList.add("hidden")
}


function openDelete(id)
{
    document.getElementById("deleteModal").classList.remove("hidden")

    document.getElementById("deleteForm").action =
        "/comments/" + id
}

function closeDelete()
{
    document.getElementById("deleteModal").classList.add("hidden")
}

</script>


@endsection