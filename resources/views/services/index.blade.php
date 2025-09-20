@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">الخدمات</h1>
    <div class="row g-4">
        @foreach($services as $service)
        <div class="col-md-4">
            <div class="card h-100 shadow-sm">
                <img src="{{ asset($service->icon_path) }}" class="card-img-top" alt="{{ $service->name_ar }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $service->name_ar }}</h5>
                    <p class="card-text">
                        <strong>TR:</strong> {{ $service->name_tr }} <br>
                        <strong>EN:</strong> {{ $service->name_en }}
                    </p>
                </div>
                <div class="card-footer text-end">
<form action="{{ route('services.destroy', $service->id) }}" method="POST" class="d-inline">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-sm btn-danger">حذف</button>
</form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
