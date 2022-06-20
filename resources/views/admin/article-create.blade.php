@extends('layouts.admin')

@section('content')
<div class="bg-white p-3 m-2 overflow-y-scroll h-screen">
    <div class="flex justify-center font-bold uppercase text-lg text-gray-500 mb-2">
        Write New Article
    </div>
    <form action="{{ route('article.create') }}" method="post" enctype="multipart/form-data" id="form">

        @csrf

        <div class="flex flex-col mb-2">
            <label class="sr-only" for="topic">Topic</label>
            <input
            type="text"
            name="topic"
            placeholder="Article topic"
            value="{{ old('topic') }}"
            class="p-2 text-gray-800 outline-none border-2 border-gray-700 rounded-md"
            required
            >
            @error('topic')
                <span class="auth-error">{{ $message }}</span>
            @enderror
        </div>

        <div class="flex flex-col mb-2">
            <label class="sr-only" for="image">Topic</label>
            <input
            type="file"
            name="image"
            accept="image/jpg, image/png/, image/png"
            hidden
            class="hidden"
            id="article-image"
            >
            <div id="article-image-repre" class="flex border-2 border-dashed border-gray-700 rounded-md px-2 py-5 justify-center items-center">
                <i class="fa fa-image text-gray-700 uppercase"> Upload Image</i>
            </div>
            <div id="upload-status" class="hidden bg-gray-700 rounded-md p-2 text-white justify-between items-center">
                <i id="upload-name" class="fa fa-image"></i>
                <span id="upload-progress"></span>
            </div>
            @error('image')
                <span class="auth-error">{{ $message }}</span>
            @enderror
            <script>
                const articleImage = document.querySelector("#article-image"),
                    representative = document.querySelector("#article-image-repre"),
                    form = document.querySelector("#form"),
                    status = document.querySelector("#upload-status"),
                    progress = document.querySelector("#upload-progress"),
                    uploadName = document.querySelector("#upload-name");
                representative.addEventListener('click', () => {
                    articleImage.click();
                });
                articleImage.addEventListener('change', ({target}) => {
                    let file = target.files[0];
                    let split = file.name.split(".");
                    let basename = split[0];
                    let extension = split[1];
                    if (basename.length > 20) {
                        basename = basename.substring(0, 20) + "...";
                    }
                    let xhr = new XMLHttpRequest();
                    xhr.upload.addEventListener('progress', ({ loaded, total }) => {
                    let fileLoaded = Math.floor((loaded / total) * 100);
                    representative.style.display = "none";
                    status.style.display = "flex";
                    uploadName.innerText = "  " + basename + "." + extension;
                        if (fileLoaded >= 99) {
                            progress.innerHTML = '<i class="fa fa-check"></i>';
                        } else {
                            progress.innerText = fileLoaded + "%";
                        }
                    });
                    xhr.open("POST", "/php/galary.php", true);
                    xhr.send(new FormData(form));
                });
            </script>
        </div>

        <div class="flex flex-col mb-2">
            <label class="sr-only" for="body">Body</label>
            <textarea
            name="body"
            cols="30"
            rows="10"
            class="p-2 text-gray-800 outline-none border-2 border-gray-700 rounded-md"
            placeholder="Write article here"
            required
            >{!! old('body') !!}</textarea>
            @error('body')
                <span class="auth-error">{{ $message }}</span>
            @enderror
        </div>

        <div class="flex flex-col mb-2">
            <select name="category" class="p-2.5 bg-white outline-none border-2 border-gray-700 rounded-md font-semibold uppercase text-gray-400">
                @foreach (categories() as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="flex flex-col mb-2">
            <select name="type" class="p-2.5 bg-white outline-none border-2 border-gray-700 rounded-md font-semibold uppercase text-gray-400">
                @foreach (articleType() as $key => $value)
                    <option value="{{ $key }}">{{ $value }}</option>
                @endforeach
            </select>
        </div>

        <div class="flex flex-col mb-2">
            <label class="sr-only" for="tags">Tags</label>
            <input
            type="text"
            name="tags"
            placeholder="Enter tags here, seperate with space eg: Space Phones Money"
            class="p-2 text-gray-800 outline-none border-2 border-gray-700 rounded-md">
            @error('tags')
                <span class="auth-error">{{ $message }}</span>
            @enderror
        </div>
        <div class="flex justify-between w-full items-center">
            <input type="submit" value="Save as draft" class="btn-primary" name="draft">
            <input type="submit" value="Publish" class="btn-primary" name="publish">
        </div>
        <script>

        </script>
    </form>
</div>
@endsection
