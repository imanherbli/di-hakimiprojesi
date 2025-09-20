<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>إضافة فيديو</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>إضافة فيديو جديد</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('videolar.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">عنوان الفيديو</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>

        <div class="mb-3">
            <label for="url" class="form-label">رابط الفيديو</label>
            <input type="url" class="form-control" id="url" name="url" required>
        </div>

        <div class="mb-3">
            <label for="thumbnail" class="form-label">الصورة المصغرة</label>
            <input type="file" class="form-control" id="thumbnail" name="thumbnail" accept="image/*" required>
        </div>

        <button type="submit" class="btn btn-primary">حفظ الفيديو</button>
    </form>
</div>
</body>
</html>
