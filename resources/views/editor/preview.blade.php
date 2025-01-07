@extends('editor.index')

@section('form') 
<div class="row">
    @foreach($blogs as $blog) 
        <div class="col-lg-4 col-md-6 mb-4"> <!-- 3 cards per row on large screens, 2 cards per row on medium screens -->
            <div class="card mb-5 " style="width: 400px;" >
                <div class="card-header">
                    <img class="card-img-top" src="{{ asset('thumbnails/'.$blog->thumbnail) }}" alt="Card image cap">
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{ $blog->title }}</h5>
                    <p class="card-text">{{ $blog->short_description }}</p>
                </div>
                <div>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection('form')