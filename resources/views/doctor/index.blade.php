@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">قائمة الدكاترة</h1>

    <a href="{{ route('doctor.create') }}" class="btn btn-success mb-3">أضف دكتور</a>

    <div class="row">
        @foreach($items as $doctor)
        <div class="col-md-4 mb-4">
            <div class="card h-100">
       @if($doctor->image)
    <img src="{{ asset($doctor->image) }}" class="card-img-top" alt="{{ $doctor->name }}">
@endif


                <div class="card-body">
                    <h5 class="card-title">{{ $doctor->name }}</h5>
                    <p class="card-text"><strong>التخصص:</strong> {{ $doctor->specialization }}</p>
                    <p class="card-text">{{ $doctor->description }}</p>
                </div>
            
                <div class="card-footer text-center">
                    <form action="{{ route('doctor.destroy', $doctor->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">حذف</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
