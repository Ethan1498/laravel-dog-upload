@extends('layouts.app')

@section('content')
<div class="bg-white p-4 w-2/3 mx-auto">
    <h2 class="text-center text-2xl">Upload your dog!</h2>
    <form action="{{ route('pictures.store') }}" method="post" enctype="multipart/form-data">
        <!-- Add CSRF Token -->
        @csrf
    <div class="form-group">
        <input type="text" class="form-control" name="name" required>
    </div>
    <div class="form-group">
        <input type="file" name="file" required>
    </div>
    <button type="submit">Submit</button>
</form>
</form>
</div>

@endsection