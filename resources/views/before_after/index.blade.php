<!DOCTYPE html>
<html lang="ar">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Before/After Slider</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
.ba-container {
    position: relative;
    width: 350px; 
    height: 200px;
    overflow: hidden;
    border-radius:10%;
    margin: 50px auto;
    border: 1px solid #ccc;
}
.ba-container img {
    position: absolute;
    top: 0;
    left: 0;
    width: 400px;
    height: 250px;
    object-fit: cover;
}
.ba-overlay {
    position: absolute;
    top: 0;
    left: 0;
    height: 100%;
    overflow: hidden;
}
.ba-handle {
    position: absolute;
    top: 0;
    width: 3px;
    height: 100%;
    background: #fff;
    cursor: ew-resize;
    z-index: 10;
}
.delete-btn {
    position: absolute;
    top: 10px;
    right: 10px;
    background: red;
    color: #fff;
    border: none;
    padding: 5px 10px;
    cursor: pointer;
    z-index: 20;
    border-radius: 5px;
}
</style>
</head>
<body>

@foreach($items as $item)
<div class="ba-container" data-id="{{ $item->id }}">
    <img src="{{ asset('storage/'.$item->before_image) }}" alt="Before">
    <div class="ba-overlay" style="width: 200px;">
        <img src="{{ asset('storage/'.$item->after_image) }}" alt="After">
    </div>
    <div class="ba-handle" style="left: 200px;"></div>
</div>
        <form action="{{ route('before_after.destroy', $item->id) }}" method="POST" style="display:inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('هل أنت متأكد من الحذف؟')">حذف</button>
            </form>
@endforeach

<script>
// Slider functionality
document.querySelectorAll('.ba-container').forEach(container => {
    const overlay = container.querySelector('.ba-overlay');
    const handle = container.querySelector('.ba-handle');
    let isDragging = false;

    handle.addEventListener('mousedown', () => {
        isDragging = true;
        document.addEventListener('mousemove', drag);
        document.addEventListener('mouseup', stopDrag);
    });

    function drag(e){
        if(!isDragging) return;
        const rect = container.getBoundingClientRect();
        let offsetX = e.clientX - rect.left;
        if(offsetX < 0) offsetX = 0;
        if(offsetX > rect.width) offsetX = rect.width;
        overlay.style.width = offsetX + 'px';
        handle.style.left = offsetX - (handle.offsetWidth/2) + 'px';
    }

    function stopDrag(){
        isDragging = false;
        document.removeEventListener('mousemove', drag);
        document.removeEventListener('mouseup', stopDrag);
    }
});

// Delete button functionality

     
</script>

</body>
</html>
