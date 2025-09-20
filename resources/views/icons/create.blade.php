@extends('layouts.app')

@section('content')
<div class="container">
    <h2>إضافة أيقونة جديدة</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('icons.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label>اختر صورة الأيقونة</label>
            <input type="file" name="icon_file" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">حفظ الأيقونة</button>
    </form>
</div>
@endsection
