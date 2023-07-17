@extends('layouts.admin')

@section('content')

<div class="container-fluid mt-4">
    <div class="row justify-content-between">
        <div class="w-100 text-white bg-dark bg-gradient text-center py-2 rounded mb-4">
            <h2><i class="fa-solid fa-folder-plus fa-lg me-3"></i>ADD NEW PROJECT</h2>
        </div>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route("admin.projects.update", $project) }}" method="post" class="needs-validation post-crud" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <label for="name">Name</label>
            <input type="text" name="name" id="name" value="{{ old("name") ?? $project->name }}" class="form-control mb-4 @error('name') is-invalid @enderror">
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror

            <label for="domain">Domain</label>
            <input type="text" name="domain" id="domain" value="{{ old("domain") ?? $project->domain }}" class="form-control mb-4 @error('domain') is-invalid @enderror">
            @error('domain')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror

            <label for="link">URL Link</label>
            <input type="text" name="link" id="link" value="{{ old("link") ?? $project->link }}" class="form-control mb-4 @error('link') is-invalid @enderror">
            @error('link')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror

            <label for="description">Description</label>
            <textarea name="description" id="description" cols="30" rows="10" class="form-control mb-4 @error('description') is-invalid @enderror">{{ old("description") ?? $project->description }}</textarea>
            @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror

            {{-- INPUT FOR IMAGE UPLOAD --}}
            <label for="image">Upload Image</label>
            <div class="d-flex align-items-center p-2 mb-4 gap-2">
                @if ($project->image)
                    <img id="preview" src="{{ asset('/storage') .'/' . $project->image }}" alt="{{$project->name}}" width="50" height="50" class="object-fit-cover rounded">
                @else
                    <img id="preview" src="{{ asset('/storage') . '/placeholder/placeholder-img.png'}}" alt="img" width="50" height="50" class="object-fit-cover rounded">
                @endif
                <input type="file" name="image" id="imgUp" class="form-control @error('image') is-invalid @enderror">
            </div>
            @error('image')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror

            {{-- JS UPLOAD IMG PREVIEW --}}
            <script>
                imgUp.onchange = evt => {
                    const [file] = imgUp.files
                    if (file) {
                        preview.src = URL.createObjectURL(file)
                    }
                }
            </script>

            {{-- INPUT FOR URL IMAGE --}}
            {{-- <label for="image">URL Image</label>
            <input type="text" name="image" id="image" value="{{ old("image") ?? $project->image }}" class="form-control mb-4 @error('image') is-invalid @enderror">
            @error('image')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror --}}

            <label for="date">Release Date</label>
            <input type="date" name="date" id="date" value="{{ old("date") ?? $project->date }}" class="form-control mb-4 @error('date') is-invalid @enderror">
            @error('date')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror

            <label for="stack">Stack</label>
            <select id="stack" name="stack" class="form-select mb-4" aria-label="Select">
                <option value="" @selected(!old('stack', $project)) disabled hidden>Select Stack</option>
                @foreach ($allStack as $item)
                    <option value="{{ $item->stack }}" @selected(old('stack', $project) == $item->id)>{{ $item->stack }}</option>
                @endforeach
            </select>
            @error('stack')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror

            <label for="type_id">Type</label>
            <select id="type_id" name="type_id" class="form-select mb-4" aria-label="Select Type">
                <option value="" @selected(!old('type_id', $project)) disabled>Select Type</option>
                @foreach ($types as $item)
                    <option value="{{ $item->id }}" @selected(old('type_id', $project) == $item->id)>{{ $item->name }}</option>
                @endforeach
            </select>
            @error('type_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror

            @foreach ($technologies as $i => $item)
            <div class="form-check">
                <input type="checkbox" name="technologies[]" id="technologies{{$i}}" value="{{$item->id}}" class="form-check-input" @checked(in_array($item->id, old('technologies') ?? $project->technologies->pluck('id')->toArray()))>
                <label for="technologies{{$i}}" class="form-check-label">{{$item->name}}</label>
            </div>
            @endforeach
            @error('technologies')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror

            <input type="submit" class="btn btn-primary form-control my-4" value="ADD PROJECT">

        </form>
    </div>
</div>

@endsection
