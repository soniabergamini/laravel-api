{{-- <pre>
    @dd($projects);
</pre> --}}
 @extends('layouts.admin')

 @section('content')
 <div class="container-fluid mt-4">
    <div class="w-100 text-white bg-dark bg-gradient text-center py-2 rounded mb-4">
        <h2><i class="fa-solid fa-laptop-code fa-lg me-3"></i>ALL PROJECTS</h2>
    </div>
    <div class="w-100 text-primary text-end py-2 border-bottom mb-4">
        <a href="{{ route('admin.projects.create') }}"><i class="fa-solid fa-folder-plus me-2"></i>ADD</a>
    </div>
 	<div class="row justify-content-center align-items-stretch">

        @foreach ($projects as $item)
            <div class="col-12 col-md-6 col-lg-3 mb-3">
 			    <div class="card h-100">
 			    	<div class="card-header p-0 d-flex justify-content-center position-relative">
                        <a href="{{ route('admin.projects.show', $item) }}" class="w-100">
                            <img src="{{ asset('/storage') .'/' . $item->image }}" class="img-fluid object-cover w-100 rounded-top">
                            {{-- <img src="{{ $item->image }}" alt="{{ $item->name }}" class="img-fluid object-cover w-100 rounded-top"> --}}
                        </a>
                        <a href="{{ route('admin.projects.show', $item) }}" class="details bg-dark bg-gradient bg-opacity-50 position-absolute link-info link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover top-0 start-0 rounded py-1 px-2"><i class="fa-solid fa-circle-info me-1"></i>Details</a>
                        <a href="{{ $item->link }}" class="details bg-dark bg-gradient bg-opacity-50 position-absolute link-info link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover top-0 end-0 rounded py-1 px-2">Visit Site <i class="fa-solid fa-square-arrow-up-right ms-1"></i></a>
                    </div>

 			    	<div class="card-body text-center">
 			    		<h6 class="text-primary mb-1">{{ Str::upper($item->name) }}</h6>
                        <span class="text-body-secondary fst-italic">( {{ $item->stack }} )</span>
 			    	</div>
 			    </div>
 		    </div>
        @endforeach

 	</div>
 </div>
 @endsection

