<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>قائمة الفيديوهات</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-5">

<div class="container">
    <h1 class="mb-4">قائمة الفيديوهات</h1>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('videolar.create') }}" class="btn btn-success mb-4">إضافة فيديو جديد</a>

    <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach ($videos as $video)
            <div class="col">
                <div class="card h-100">
                    <!-- صورة الفيديو -->
<img src="{{ asset($video->thumbnail) }}" class="card-img-top" alt="Thumbnail">

                    <div class="card-body">
                        <h5 class="card-title">{{ $video->title }}</h5>
                        <p class="card-text">
                            <a href="{{ $video->url }}" target="_blank" class="btn btn-primary btn-sm">شاهد الفيديو</a>
                        </p>
                    </div>

                    <div class="card-footer">
                        <form action="{{ route('videolar.destroy', $video->id) }}" method="POST" onsubmit="return confirm('هل أنت متأكد من الحذف؟');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm w-100">حذف الفيديو</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

</body>
</html>
