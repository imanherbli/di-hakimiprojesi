<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>إضافة طبيب جديد</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2 class="mb-4 text-center">إضافة طبيب جديد</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('doctor.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row mb-3">
            <div class="col-md-4">
                <label class="form-label">الاسم بالعربية</label>
                <input type="text" name="name_ar" class="form-control" required>
            </div>
            <div class="col-md-4">
                <label class="form-label">الاسم بالتركية</label>
                <input type="text" name="name_tr" class="form-control" required>
            </div>
            <div class="col-md-4">
                <label class="form-label">الاسم بالإنجليزية</label>
                <input type="text" name="name_en" class="form-control" required>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-4">
                <label class="form-label">التخصص بالعربية</label>
                <input type="text" name="specialization_ar" class="form-control" required>
            </div>
            <div class="col-md-4">
                <label class="form-label">التخصص بالتركية</label>
                <input type="text" name="specialization_tr" class="form-control" required>
            </div>
            <div class="col-md-4">
                <label class="form-label">التخصص بالإنجليزية</label>
                <input type="text" name="specialization_en" class="form-control" required>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-4">
                <label class="form-label">الوصف بالعربية</label>
                <textarea name="description_ar" class="form-control" rows="3"></textarea>
            </div>
            <div class="col-md-4">
                <label class="form-label">الوصف بالتركية</label>
                <textarea name="description_tr" class="form-control" rows="3"></textarea>
            </div>
            <div class="col-md-4">
                <label class="form-label">الوصف بالإنجليزية</label>
                <textarea name="description_en" class="form-control" rows="3"></textarea>
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label">صورة الطبيب</label>
            <input type="file" name="image" class="form-control">
        </div>



        <button type="submit" class="btn btn-primary w-100">حفظ الطبيب</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
