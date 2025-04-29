<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mie Jebew Bude</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('backend/css/welcome.css') }}">
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Mie Jebew Bude</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <a href="#about" class="btn btn-outline-light me-2">Tentang Kami</a>
                @if (Route::has('login'))
                    @auth
                        <a class="btn btn-outline-light me-2" href="{{ url('/dashboard') }}">Dashboard</a>
                    @else
                        <a class="btn btn-outline-light me-2" href="{{ route('login') }}">Login</a>
                        <a class="btn btn-warning" href="{{ route('register') }}">Register</a>
                    @endauth
                @endif
            </div>
        </div>
    </nav>

    <!-- Jumbotron -->
    <div class="jumbotron jumbotron-fluid position-relative" style="background-image: url('{{ asset('bg.jpg') }}'); background-size: cover; height: 100vh;">
        <div class="position-absolute top-0 start-0 w-100 h-100" style="background-color: rgba(0, 0, 0, 0.5);"></div>
        <div class="position-absolute top-50 start-50 translate-middle text-center text-white">
            <h1 class="display-3 fw-bold">Mie Jebew Bude</h1>
            <p>Cita rasa khas, harga terjangkau, dan pelayanan terbaik!</p>
            <a href="#menu" class="btn btn-warning btn-lg">Lihat Menu</a>
        </div>
    </div>

    <!-- Tentang Kami -->
    <section id="about" class="container py-5 text-center">
        <h2 class="fw-bold">Tentang Kami</h2>
        <p>Mie Jebew Bude adalah tempat terbaik untuk menikmati mie buatan tangan dengan cita rasa khas. Kami menggunakan bahan-bahan berkualitas tinggi dan resep turun-temurun yang membuat setiap sajian terasa istimewa. Dengan komitmen terhadap kualitas dan kepuasan pelanggan, kami menawarkan berbagai pilihan mie yang lezat, dari yang klasik hingga varian pedas yang menggugah selera. Setiap porsi disajikan dengan penuh cinta dan perhatian, menjadikan pengalaman makan Anda tak terlupakan.</p>
    </section>

    <!-- Menu -->
    <section id="menu" class="container py-5 text-center">
        <h2 class="fw-bold">Menu Kami</h2>
        <div class="row">
            @foreach($foods as $food)
            <div class="col-md-4 mb-4">

                <div class="card">
                    @if($food->image)
                    <img src="{{ asset('storage/' . $food->image) }}" class="card-img-top" alt="{{ $food->name }}">
                    @else
                    <img src="{{ asset('placeholder-image.jpg') }}" class="card-img-top" alt="No Image">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $food->name }}</h5>
                        <p class="card-text">Rp {{ number_format($food->price, 0, ',', '.') }}</p>
                        <p class="card-text">{{ $food->description }}</p>
                    </div>
                    <a href="{{ route('pesanan.create', $food->id) }}" class="btn btn-success mt-2">Pesan</a>
                </div>

            </div>
            @endforeach
        </div>
    </section>

    <!-- Testimoni -->
    <section id="testimoni" class="container py-5 text-center">
        <h2 class="fw-bold">Apa Kata Mereka?</h2>
        <blockquote class="blockquote">
            <p>"Mie Jebew Bude enak banget! Bakal jadi langganan tetap."</p>
            <footer class="blockquote-footer">Pelanggan Setia</footer>
        </blockquote>
    </section>

    <!-- Kontak -->
    <section id="contact" class="container py-5 text-center">
        <h2 class="fw-bold">Hubungi Kami</h2>
        <p>
            📍 Perum Bumi Purnawira Asri Blok i NO 2 |
            <a href="https://wa.me/6281563456382" class="text-decoration-none" target="_blank">
                📞 0815-6345-6382
            </a>
        </p>

        <!-- peta Google Maps -->
        <div class="mt-4">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d495.0480278716875!2d106.90829694149315!3d-6.963920211624189!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6838063aa20709%3A0xdf8e89171a778bb8!2sJl.%20Perum%20Purnawira%20Asri%20No.2%2C%20Cipanengah%2C%20Kec.%20Lembursitu%2C%20Kota%20Sukabumi%2C%20Jawa%20Barat%2043134!5e0!3m2!1sid!2sid!4v1745612039805!5m2!1sid!2sid"
                width="100%"
                height="450"
                style="border:0;"
                allowfullscreen=""
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>
    </section>

    <!-- Promo Section -->
    <section class="bg-dark text-white py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <h3 class="fw-bold">Jangan lewatkan promo dari kami</h3>
                    <p class="mb-4">
                        Pastikan kalian follow Instagram kami untuk informasi terkait promo, event, menu baru atau giveaway bagi kalian para pecinta mie di seluruh Indonesia!
                    </p>
                    <a href="https://instagram.com/miejebewbude" class="btn btn-outline-light">
                        <i class="fab fa-instagram me-2"></i> Follow Instagram →
                    </a>
                </div>
                <div class="col-md-4">
                    <h5 class="fw-bold">Mie Jebew Bude</h5>
                    <p>Harga Murah dan terjangkau!!</p>
                    <p>
                        Mie Jebew Bude adalah tempat yang menyediakan berbagai macam Mie dan minuman yang segar, dengan harga yang murah namun rasanya endul. Outlet kita selalu rame, jadi jangan lupa mampir ya!
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-black text-white py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h5>Navigasi Cepat</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-white text-decoration-none">Beranda</a></li>
                        <li><a href="#about" class="text-white text-decoration-none">Tentang Kami</a></li>
                        <li><a href="#menu" class="text-white text-decoration-none">Menu</a></li>
                        {{-- <li><a href="#menu" class="text-white text-decoration-none">Kategori</a></li>
                        <li><a href="#" class="text-white text-decoration-none">Galeri Outlet</a></li> --}}
                    </ul>
                </div>
                <div class="col-md-6">
                    <h5>Sosial Media</h5>
                    <div class="social-links">
                        <a href="https://wa.me/6281563456382" class="text-white me-3" target="_blank">
                            <i class="fab fa-whatsapp fa-2x"></i>
                        </a>
                        <a href="https://instagram.com/miejebewbude" class="text-white me-3" target="_blank">
                            <i class="fab fa-instagram fa-2x"></i>
                        </a>
                        {{-- <a href="https://twitter.com/miejebewbude" class="text-white me-3" target="_blank">
                            <i class="fab fa-twitter fa-2x"></i>
                        </a>
                        <a href="https://facebook.com/miejebewbude" class="text-white" target="_blank">
                            <i class="fab fa-facebook fa-2x"></i>
                        </a> --}}
                    </div>
                    <p class="mt-3 mb-0">
                        © 2025 Mie Jebew Bude
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
