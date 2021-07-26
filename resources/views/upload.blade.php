@extends('layouts.app')

@section('content')
<div class="bg-white p-4 w-2/3 mx-auto">
    <h2 class="text-center text-2xl">Upload your dog!</h2>
    <form action="{{ route('pictures.store') }}" method="post" enctype="multipart/form-data">
        <!-- Add CSRF Token -->
        @csrf
    <div class="form-group name-form">
        <input type="text" class="form-control" name="name" required placeholder="Name of dog">
    </div>
    <div class="form-group file-form">
        <input type="file" name="file" required>
    </div>
    <button class="submit-form" type="submit">Submit</button>
</form>
</div>

@endsection