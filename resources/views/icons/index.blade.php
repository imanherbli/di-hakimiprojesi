@foreach($services as $service)
    <div>
        <img src="{{ asset($service->icon_path) }}" width="50">
        <span>{{ $service->name }}</span>
    </div>
@endforeach
