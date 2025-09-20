<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>لوحة التحكم - عيادة الأسنان</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background: #e0f7f7;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        /* Navbar */
        .navbar-custom {
            background: linear-gradient(90deg, #26c6da, #00acc1);
        }
        .navbar-custom .navbar-brand,
        .navbar-custom .nav-link {
            color: #fff;
            font-weight: 500;
        }
        .navbar-custom .nav-link:hover {
            color: #ffd700;
        }

        /* Cards */
        .card-control {
            position: relative;
            border-radius: 20px;
            padding: 3rem 2rem 2rem;
            text-align: center;
            color: #fff;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            cursor: pointer;
        }
        .card-control:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 35px rgba(0,0,0,0.2);
        }

        /* Card colors */
        .card-img-before { background: linear-gradient(135deg, #4facfe, #00f2fe); }
        .card-video { background: linear-gradient(135deg, #26c6da, #38f9d7); }
        .card-doctors { background: linear-gradient(135deg, #26c6da, #00f2fe); color: #333; }
        .card-services { background: linear-gradient(135deg, #26c6da, #00f2fe); }

        /* Icon + circle */
        .icon-wrapper {
            position: relative;
            display: inline-block;
        }
        .icon-wrapper i {
            font-size: 6rem;
        }
        .icon-wrapper::after {
            content: "+";
            position: absolute;
            top: -10px;
            right: -10px;
            background: #ffffffff;
            color: #000000ff;
            width: 38px;
            height: 38px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            font-weight: bold;
            font-size: 1rem;
            box-shadow: 0 3px 8px rgba(0,0,0,0.3);
        }  .icon-wrapper {
            position: relative;
            display: inline-block;
        }
        .icon-wrapper1 i {
            font-size: 6rem;
        }
   

        .card-control h5 {
            font-weight: 600;
            font-size: 1.3rem;
            margin-top: 1rem;
        }

        .container-cards {
            padding-top: 80px;
            padding-bottom: 80px;
        }

        @media (max-width: 768px) {
            .icon-wrapper i {
                font-size: 4rem;
            }
            .card-control {
                padding: 2rem 1.5rem 1.5rem;
            }
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-custom">
    <div class="container">
        <a class="navbar-brand" href="#">لوحة التحكم</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ms-auto">
                
                <li class="nav-item">
                    <a class="nav-link" href="/logout"><i class="bi bi-box-arrow-right"></i> تسجيل خروج</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Cards -->
<div class="container container-cards">
    <div class="row g-4 justify-content-center">
        <!-- إضافة صور قبل/بعد -->
        <div class="col-md-6 col-lg-3">
<div class="card card-control card-img-before" onclick="location.href='/before_after/create'">
                <div class="icon-wrapper"><i class="bi bi-image"></i></div>
                <h5>إضافة صور قبل / بعد</h5>
            </div>
        </div>

        <!-- إضافة فيديو -->
        <div class="col-md-6 col-lg-3">
            <div class="card card-control card-video" onclick="location.href='/videolar/create'">
                <div class="icon-wrapper"><i class="bi bi-camera-video"></i></div>
                <h5>إضافة فيديو</h5>
            </div>
        </div>

        <!-- إضافة دكاترة -->
        <div  class="col-md-6 col-lg-3">
            <div  class="card card-control card-doctors" onclick="location.href='/doctor/create'">
                <div  style="color:white;"  class="icon-wrapper"><i class="bi bi-person-add"></i></div>
                <h5  style="color:white;" >إضافة دكاترة</h5>
            </div>
        </div>

        <!-- إضافة خدمات -->
        <div class="col-md-6 col-lg-3">
            <div class="card card-control card-services" onclick="location.href='/services/create'">
                <div class="icon-wrapper"><i class="bi bi-briefcase"></i></div>
                <h5>إضافة خدمات</h5>
            </div>
        </div>
    </div>
</div>
<!-- Cards الثانية - إدارة -->
<div class="container container-cards">
    <div class="row g-4 justify-content-center mt-4">
        <!-- إدارة الدكاترة -->
        <div class="col-md-6 col-lg-3">
            <div class="card card-control card-doctors" onclick="location.href='/doctor'">
                <div style="color:white;"  class="icon-wrapper1"><i class="bi bi-person-fill-gear"></i></div>
                <h5 style="color:white;"  >إدارة الدكاترة</h5>
            </div>
        </div>

        <!-- إدارة الخدمات -->
        <div class="col-md-6 col-lg-3">
            <div class="card card-control card-services" onclick="location.href='/services'">
                <div class="icon-wrapper1"><i class="bi bi-database-fill-gear"></i></div>
                <h5>إدارة الخدمات</h5>
            </div>
        </div>

        <!-- إدارة الصور قبل/بعد -->
        <div class="col-md-6 col-lg-3">
    <div class="card card-control card-img-before" onclick="location.href='{{ route('before_after') }}'">
                <div class="icon-wrapper1"><i class="bi bi-list-ul"></i></div>
                <h5>إدارة الصور قبل / بعد</h5>
            </div>
        </div>

        <!-- إدارة الفيديو -->
        <div class="col-md-6 col-lg-3">
            <div class="card card-control card-video" onclick="location.href='/videolar'">
                <div class="icon-wrapper1"><i class="bi bi-camera-reels"></i></div>
                <h5>إدارة الفيديو</h5>
            </div>
        </div>
    </div>
</div>

</body>
</html>
