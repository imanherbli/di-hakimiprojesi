<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
    <meta charset="UTF-8">
<title>{{ __('home_page_title') }} - {{ __('clinic_name') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">

<link rel="icon" href="{{ asset('favicon.ico.png') }}" type="image/png">

    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background: #f1fdfd;
        }

        /* Hero Section */
        .hero {
    background-image: url('{{ asset("fotos/emrah.jpg") }}');
            background-size: cover;
            background-position: center;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }
        .hero::after {
            content: "";
            position: absolute;
            inset: 0;
            background: rgba(0,0,0,0.4);
        }
        .hero-text {
            position: relative;
            color: #fff;
            text-align: center;
            z-index: 1;
        }
        .hero-text h1 {
            font-size: 3rem;
            font-weight: 700;
        }

        /* Navbar */
        .navbar-custom {
            background: linear-gradient(90deg, #4bb9c8ff, #00acc1);
        }
        .navbar-custom .navbar-brand,
        .navbar-custom .nav-link {
            color: #fff;
            font-weight: 500;
        }
        .navbar-custom .nav-link:hover {
            color: #ffd700;
        }

        /* خدماتنا */
        .section-title {
            text-align: center;
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 50px;
        }
        .card-service {
            border-radius: 20px;
            text-align: center;
            padding: 2rem 1rem;
            transition: transform 0.3s, box-shadow 0.3s;
            cursor: pointer;
            background: #ffffff;
            border: 1px solid #e0e0e0;
        }
        .card-service:hover {
            transform: translateY(-8px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
        }
        .icon-large {
            font-size: 4rem;
            color: #26c6da;
            margin-bottom: 1rem;
        }

        /* فيديوهات */
        .videos-section1 {
            background: #e0f0f5; /* خلفية أغمق قليلاً */
       
        }
        .card-video {
            position: relative;
            border-radius: 20px;
            overflow: hidden;
            cursor: pointer;
              margin:60px;
         padding: auto;
            transition: transform 0.3s, box-shadow 0.3s;
        }
        .card-video img {
            width: 100%;
            height: 220px;
            object-fit: cover;
            display: block;
        }
        .card-video h5 {
            position: absolute;
            bottom: 10px;
            left: 10px;
            margin: 0;
            color: #fff;
            background: rgba(0,0,0,0.5);
            padding: 5px 10px;
            border-radius: 10px;
        }
        .card-video:hover {
            transform: translateY(-8px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.3);
        }

     /* دكاترتنا */
     .container{
          width: 80%;    max-width: 100%; 
     }
.doctor-card {
    display: flex;
    flex-direction: row; /* البطاقة أفقية */
    width: 90%;         /* عرض كامل للعمود */
    max-width: 100%;     /* لتجنب التجاوز */
    overflow: hidden;
 
     margin-bottom: 20px;
 
}

/* صورة الطبيب */
.doctor-card img {
    width: 40%;          /* الصورة تأخذ نصف البطاقة */
    object-fit: cover;
    margin:10px;
}

/* معلومات الطبيب */
.doctor-info {
    width: 40%;          /* النصف الآخر للمعلومات */
    padding: 20px;
    display: flex;
    flex-direction: column;
    justify-content: center;
}

/* على الشاشات الصغيرة تتحول البطاقة إلى عمودية */
@media (max-width: 767px) {
    .doctor-card {
        flex-direction: column;
        height: auto;    /* ارتفاع ديناميكي */
    }
    .doctor-card img,
    .doctor-info {
        width: 100%;
        height: auto;
    }
}

/* على الشاشات الصغيرة تتحول البطاقة إلى عمودية */
@media (max-width: 767px) {
    .doctor-card {
        flex-direction: column !important;
    }
    .card-img-left {
        width: 100%;
        height: 200px;
    }
}
        /* WhatsApp Button */
        .whatsapp-btn {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 999;
            background-color: #25d366;
            color: #fff;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 2rem;
            box-shadow: 0 5px 15px rgba(0,0,0,0.3);
            cursor: pointer;
        }
        .footer{
            margin-bottom:0;
        }

        @media (max-width: 768px) {
            .hero-text h1 {
                font-size: 2rem;
            }
            .icon-large {
                font-size: 3rem;               

            }
            .card-video img, .card-doctor img {
                height: 400px;
             }
        }
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
 

/**/

.video-card {
    box-shadow: 0 4px 8px rgba(0,0,0,0.2);
}

.fake-play-btn {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: rgba(0, 0, 0, 0.8);
    color: white;
    border: none;
    border-radius: 50%;
    width: 60px;
    height: 60px;
    font-size: 24px;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: background-color 0.3s;
}
.services:hover .card {
    transform: translateY(-8px);
    box-shadow: 0 12px 24px rgba(0,0,0,0.25);
}

/* Animation fadeInUp */
.o-animate {
    opacity: 0;
    transform: translateY(20px);
    animation: fadeInUp 0.8s forwards;
    animation-delay: 0.2s;
}
@keyframes fadeInUp {
    to {
        opacity: 1;
        transform: translateY(0);
    }
}
.heading {
    font-weight: bold;
    font-size: 1.1rem;
}
.fake-play-btn:hover {
    background-color: rgba(0, 0, 0, 1);
}
</style>
</head>
<body>
  
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-custom">
    <div class="container">
        <a class="navbar-brand" href="#"> {{ __('clinic_name') }}  </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="{{ url('/lang/' . app()->getLocale()) }}">{{ __('home') }}</a></li>
                <li class="nav-item"><a class="nav-link" href="#servis">{{ __('services') }}</a></li>
                <li class="nav-item"><a class="nav-link" href="#doktor">{{ __('doctors') }}</a></li>
                <li class="nav-item"><a class="nav-link" href="tel:+963123456789"> {{ __('contact_us') }}</a></li>
<!-- Dropdown اختيار اللغة -->
  <li class="nav-item dropdown">
     <a class="nav-link dropdown-toggle" href="#" id="langDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"> {{ strtoupper(app()->getLocale()) }} </a> 
     <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="langDropdown">
         <li><a class="dropdown-item" href="/lang/en">EN</a></li> 
   <li>
    <a class="dropdown-item" href="/lang/tr">TR</a>
    </li>
    <li>
    <a class="dropdown-item" href="/lang/ar">AR</a>
    </li>
         </ul>
            </li>


            </ul>
        </div>
    </div>
</nav>

<!-- Hero Section -->
<div class="hero" data-aos="fade-right">
    <div class="hero-text">
        

<h1>{{ __('welcome') }}</h1>      
  <p> {{ __('best_care') }}</p>
    </div>
</div>

<!-- خدماتنا -->
<div class="container my-5" data-aos="fade-left" id="servis">
    <h1 class="mb-4 text-center"><h1>{{__('messages.services')}}</h1>

</h1>

    <div class="row g-4 justify-content-center" >
        @foreach ($services as $service)
            <div class="col-md-3 d-flex services align-self-stretch p-4 o-animate ftco-animated">
                <div class="card text-center shadow-sm w-100" style="border-radius:15px; overflow:hidden; position:relative; background: rgba(255,255,255,0.2);">

                    <!-- أيقونة دائرية -->
                    <div class="icon d-flex justify-content-center align-items-center mx-auto"
                         style="width:100px; height:100px; border-radius:50%; background-color:#f0f4f8; margin-top:20px;">
                        <img src="{{ asset($service->icon_path) }}" alt="{{ $service->name_ar }}" style="width:60%; height:60%; object-fit:contain;">
                    </div>

                    <!-- الكتابة -->
                    <div class="media-body mt-3 mb-3" style=" color:black; padding:10px 0; border-radius:10px;">
                        <h3 class="heading ">{{ $service->{'name_' . session('lang')} }}</h3>
                    </div>
                </div>
            </div>
        @endforeach  
   </div>
</div>
 <!--   فيديويهات         --->
<!--   فيديوهات         --->
<div class="container" data-aos="fade-right">
    <h1 class="mb-4 text-center"> {{ __('videos_list') }}</h1>

    <div class="row row-cols-1 row-cols-md-3 g-4" >
        @foreach ($videos as $video)
            <div class="col">
                <div class="card video-card h-100 position-relative" style="border-radius: 15px; overflow: hidden;">
                    
                    <!-- رابط الفيديو -->
                    <a href="{{ $video->url }}" target="_blank" class="d-block position-relative">
                        
                        <!-- صورة الفيديو -->
                        <img src="{{ asset($video->thumbnail) }}" 
                             alt="{{ $video->title }}" 
                             class="card-img-top" 
                             style="height: 200px; object-fit: cover;">

                        <!-- زر تشغيل فيديو وهمي -->
                        <div class="fake-play-btn position-absolute top-50 start-50 translate-middle">
                            <i class="bi bi-play-circle-fill" style="font-size: 3rem; color: white;"></i>
                        </div>

                    </a>
                </div>
            </div>
        @endforeach
    </div>
</div>

 <!--    sonrası       --->
 <!--   oncesi sonrası       --->
    <div class="videos-section " style="margin:0px;" id="oncesisonrasi"  data-aos="fade-left">
    <div class="container">
        <h2 class="section-title"> {{ __('before_after') }}  </h2>
    <div class="row row-cols-1 row-cols-md-3 g-4">
    
 @foreach($items as $item)
<div class="ba-container" data-id="{{ $item->id }}">
    <img src="{{ asset('storage/'.$item->before_image) }}" alt="Before">
    <div class="ba-overlay" style="width: 200px;">
        <img src="{{ asset('storage/'.$item->after_image) }}" alt="After">
    </div>
    <div class="ba-handle" style="left: 200px;"></div>
</div>
        
@endforeach
        </div>
 </div>
    <!--          --->


<!-- دكاترتنا -->
<div class="row">
    <div class="container" id="doktor">
        <h2 class="mb-4 text-center" data-aos="fade-left">{{ __('our_doctors') }}</h2>

        @foreach($doctors as $doctor)
            <div class="doctor-card" data-aos="fade-right">
                <img src="{{ asset($doctor->image ?? 'default-doctor.jpg') }}" alt="Doctor Image">
                <div class="doctor-info">
                    <h3>{{ $doctor->{'name_' . session('lang')} }}</h3>
                    <p><strong>{{ __('specialization') }}:</strong> {{ $doctor->{'specialization_' . session('lang')} }}</p>
                    <p>{{ $doctor->{'description_' . session('lang')} }}</p>
                </div>
            </div>
        @endforeach
    </div>
</div>
<style>
.doctor-card {
    display: flex;
    flex-direction: row;
    align-items: center;
    background: #ffffffcc; /* شفاف شوي */
    border-radius: 20px;
    padding: 20px;
    margin-bottom: 30px;
    box-shadow: 0 10px 25px rgba(0,0,0,0.1);
    transition: transform 0.3s, box-shadow 0.3s;
}

.doctor-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 30px rgba(0,0,0,0.2);
}

.doctor-card img {
    width: 250px;
    height: 250px;
    object-fit: cover;
    border-radius: 15px;
    margin-right: 30px;
}

.doctor-info {
    flex: 1;
}

.doctor-info h3 {
    font-size: 1.8rem;
    font-weight: 700;
    margin-bottom: 10px;
    color: #007B8F;
}

.doctor-info p {
    font-size: 1rem;
    line-height: 1.6;
    color: #333;
}

@media (max-width: 768px) {
    .doctor-card {
        flex-direction: column;
        text-align: center;
    }
    .doctor-card img {
        margin-right: 0;
        margin-bottom: 20px;
        width: 200px;
        height: 200px;
    }
}

</style>
 
<!--- form---->
<div class="container mt-5" data-aos="fade-left">
<h2 class="section-title">{{ __('book_whatsapp') }}</h2>
    <form id="whatsappForm">
        <div class="mb-3">
            <label>{{ __('full_name') }}</label>
            <input type="text" id="name" class="form-control" placeholder="   {{ __('full_name') }}" required>
        </div>
        <div class="mb-3">
            <label> {{ __('phone_number') }}</label>
            <input type="tel" id="phone" class="form-control" placeholder="  {{ __('phone_number') }}  " required>
        </div>
        <div class="mb-3">
            <label>    {{ __('appointment_date') }}</label>
            <input type="date" id="date" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success w-100">
            <i class="bi bi-whatsapp"></i>  {{ __('book_now') }}    
        </button>
    </form>
</div>

<!-- WhatsApp Button -->
<a href="https://wa.me/905316487555" target="_blank" class="whatsapp-btn">
    <i class="bi bi-whatsapp"></i>
</a>


<!-- Footer -->
<footer class="bg-dark text-white pt-5 pb-4">
    <div class="container text-center">
        <p>© 2025 {{ __('rights_reserved') }}. .</p>
        <p>{{ __('address') }}:     istanbul turkey  </p>
<p>{{ __('phone') }}: 123456789 - {{ __('email') }}: <a href="mailto:clinic@example.com">clinic@example.com</a></p>
        <p>
            <a href="#">{{ __('home') }}</a> |
            <a href="#">{{ __('services') }}</a> |
            <a href="#">{{ __('doctors') }}</a> |
             <a href="#contact">{{ __('contact_us') }}</a>
        </p>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
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

// WhatsApp form functionality
document.getElementById("whatsappForm").addEventListener("submit", function(e){
    e.preventDefault();

    let name = document.getElementById("name").value.trim();
    let phone = document.getElementById("phone").value.trim();
    let date = document.getElementById("date").value.trim();

    let clinicNumber = "905316487555";  
    let message = `merhaba adım ${name}.tarihinde randevu yapmak istiyorum ${date}.   numaram: ${phone}`;

    let url = "https://wa.me/" + clinicNumber + "?text=" + encodeURIComponent(message);
    window.open(url, '_blank');
});
  AOS.init({
    duration: 1000, // مدة الحركة بالمللي ثانية
    once: true,     // يظهر الحركة مرة واحدة بس
  });
</script>

</body>
</html>
