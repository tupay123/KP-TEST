<!DOCTYPE html>
<html>
<head>
    <title>Pembayaran</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-p0uQs_dXBB2eTGC1"></script>
</head>
<body>
<div class="container py-5 text-center">
    <h3>Pesanan atas nama: {{ $pesanan->nama_pemesan }}</h3>
    <p>Total pembayaran: <strong>Rp {{ number_format($pesanan->jumlah * $pesanan->food->price, 0, ',', '.') }}</strong></p>

    <button id="pay-button" class="btn btn-success">Bayar Sekarang</button>
</div>

<script type="text/javascript">
    var payButton = document.getElementById('pay-button');
    payButton.addEventListener('click', function () {
        window.snap.pay('{{ $snapToken }}', {
            onSuccess: function(result) {
                alert("Pembayaran berhasil!");
                console.log(result);
                window.location.href = "/"; // redirect ke halaman utama
            },
            onPending: function(result) {
                alert("Menunggu pembayaran...");
                console.log(result);
            },
            onError: function(result) {
                alert("Pembayaran gagal!");
                console.log(result);
            },
            onClose: function() {
                alert('Kamu menutup popup tanpa menyelesaikan pembayaran');
            }
        });
    });
</script>
</body>
</html>
