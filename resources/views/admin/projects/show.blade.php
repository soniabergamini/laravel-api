{{-- <pre>
    @dd($projects);
</pre> --}}
 @extends('layouts.admin')

 @section('content')
 <div class="container-fluid mt-4">
 	<div class="row justify-content-center">

        <div class="col-10 mb-3">
 		    <div class="border d-flex rounded flex-wrap">
                <div class="w-100 text-white bg-dark bg-gradient text-center py-2 rounded-top">
                    <h2><i class="fa-brands fa-codepen fa-lg me-3"></i>{{ Str::upper($project->name) }}</h2>
                </div>
 		    	<div class="d-flex align-items-center ps-3 pe-4 py-4 w-50">
                    <div class="w-100 position-relative">
                        <img src="{{ asset('/storage') .'/' . $project->image }}" alt="{{ $project->name }}" class="img-fluid object-cover rounded w-100">
                        {{-- <img src="{{ $project->image }}" alt="{{ $project->name }}" class="img-fluid object-cover rounded w-100"> --}}
                        <a href="{{ $project->link }}" class="fs-6 bg-dark bg-gradient bg-opacity-50 position-absolute link-info link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover top-0 end-0 rounded py-1 px-2">Visit Site <i class="fa-solid fa-square-arrow-up-right ms-1"></i></a>
                    </div>
                </div>
 		    	<div class="d-flex flex-column justify-content-center ps-4 pe-5 my-4 w-50 border-start">
                    <p class="mb-2"><strong>Domain:</strong><span class="text-body-secondary"> {{ $project->domain }}</span></p>
                    <p class="mb-2"><strong>Stack:</strong><span class="text-body-secondary"> {{ $project->stack }}</span></p>
                    <p class="mb-2">
                        <strong>Technologies:</strong>
                        @forelse ($project->technologies as $item)
                            <span class="text-body-secondary">{{$item->name}} </span>
                        @empty
                            <span class="text-body-secondary">N/A</span>
                        @endforelse
                    </p>
                    <p class="mb-2"><strong>Type:</strong><span class="text-body-secondary"> {{ $project->type->name ?? 'N/A' }}</span></p>
                    <p class="mb-2"><strong>Project Abstract: </strong><span class="text-body-secondary">{{ $project->description }}</span></p>
                    <p class="mb-2"><strong>Release Date:</strong><span class="text-body-secondary"> {{ Str::limit($project->date, 10, '') }}</span></p>
 		    	</div>
                <div class="w-100 text-primary text-end py-2 border-top">
                    <a class="px-2 details border-end" href="{{ route('admin.projects.edit', $project) }}"><i class="fa-solid fa-pencil me-1"></i>EDIT</a>
                    <form action="{{ route('admin.projects.destroy', $project) }}" method="post" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="DELETE" class="text-danger details px-2 bg-white border-0 text-decoration-underline">
                    </form>
                </div>
 		    </div>
 		</div>

 	</div>
 </div>
 @endsection

