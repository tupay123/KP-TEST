<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Form Pemesanan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        body {
            background-color: #f8f9fa;
        }

        .card {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .container {
            max-width: 600px;
            margin-top: 50px;
        }

        .form-label {
            font-weight: 600;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .card-body {
            padding: 2rem;
        }

        h2 {
            font-size: 2rem;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h2 class="text-center mb-4">Pesan: {{ $food->name }}</h2>

                <!-- SweetAlert Trigger -->
                @if(session('success'))
                <script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil!',
                        text: '{{ session('success') }}',
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'OK'
                    });
                </script>
                @endif

                <form action="{{ route('pesanan.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="food_id" value="{{ $food->id }}">

                    <div class="mb-3">
                        <label for="nama_pemesan" class="form-label">Nama Pemesan</label>
                        <input type="text" name="nama_pemesan" id="nama_pemesan" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="no_hp" class="form-label">No HP</label>
                        <input type="text" name="no_hp" id="no_hp" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="jumlah" class="form-label">Jumlah</label>
                        <input type="number" name="jumlah" id="jumlah" class="form-control" required min="1">
                    </div>

                    <div class="mb-3">
                        <label for="catatan" class="form-label">Catatan</label>
                        <textarea name="catatan" id="catatan" class="form-control" rows="3"></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Pesan Sekarang</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
