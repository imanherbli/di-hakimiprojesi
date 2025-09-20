<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إضافة خدمة جديدة</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .icon-grid {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }
        .icon-item {
            border: 1px solid #ddd;
            padding: 5px;
            cursor: pointer;
            text-align: center;
        }
        .icon-item.selected {
            border-color: #0d6efd;
            background-color: #e7f1ff;
        }
        .icon-item img {
            max-width: 50px;
            max-height: 50px;
            display: block;
            margin: auto;
        }
    </style>
</head>
<body>
<div class="container py-5">
    <h2>إضافة خدمة جديدة</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('services.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label>اسم الخدمة (عربي)</label>
            <input type="text" name="name_ar" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>اسم الخدمة (إنكليزي)</label>
            <input type="text" name="name_en" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>اسم الخدمة (تركي)</label>
            <input type="text" name="name_tr" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>اختر أيقونة</label>
            <input type="hidden" name="icon" id="icon_input" required>
            <div class="icon-grid">
                @foreach ($icons as $icon)
                    <div class="icon-item" data-name="{{ $icon }}">
                        <img src="{{ asset('icons/'.$icon) }}" alt="icon">
                        <small>{{ $icon }}</small>
                    </div>
                @endforeach
            </div>
        </div>

        <button type="submit" class="btn btn-primary">حفظ</button>
    </form>
</div>

<script>
    const iconItems = document.querySelectorAll('.icon-item');
    const iconInput = document.getElementById('icon_input');

    iconItems.forEach(item => {
        item.addEventListener('click', () => {
            iconItems.forEach(i => i.classList.remove('selected'));
            item.classList.add('selected');
            iconInput.value = item.getAttribute('data-name');
        });
    });
</script>
</body>
</html>
