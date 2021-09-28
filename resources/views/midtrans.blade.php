<html>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
<body id="body">
    <p>Jangan tinggalkan halaman ini sampai transaksi selesai</p>
    <a class="btn btn-success text-center" href="{{ url('/')}}">Transaksi Selesai</a>
    <p id="result-json" style="display: none;"></p>
    <legend class="text-center">Jangan tutup halaman ini sebelum anda menekan tombol Submit</legend>
    <div class="container">
        <div class="row">
            <div class="col-4"></div>
            <div class="col-sm-6 align-content-center">
                <form action="{{ url('midtrans/transaction')}}" method="POST">
                    @csrf
                        <input type="hidden" id="status_code" name="status_code">
                        <div class="mb-3">
                            <label for="disabledTextInput" class="form-label">ID ORDER</label>
                            <input type="text" id="id_order" name="order_id" readonly class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="disabledTextInput" class="form-label">ID TRANSAKSI</label>
                            <input type="text" id="transaction_id" name="transaction_id" class="form-control" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="disabledTextInput" class="form-label">PAYMENT TYPE</label>
                            <input type="text" id="payment_type" name="payment_type" class="form-control" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="disabledTextInput" class="form-label">WAKTU TRANSAKSI</label>
                            <input type="text" id="transaction_time" name="transaction_time" class="form-control" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="disabledTextInput" class="form-label">STATUS TRANSAKSI</label>
                            <input readonly type="text" id="transaction_status" name="transaction_status" class="form-control">
                        </div>
                            <div class="mb-3">
                                <label for="disabledSelect" class="form-label">TOTAL BAYAR</label>
                                <input readonly type="text" readonly class="form-control" id="total" name="gross_amount">
                            </div>
                            <h3 id="pesan"></h3>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
<div class="col-4"></div>

<!-- TODO: Remove ".sandbox" from script src URL for production environment. Also input your client key in "data-client-key" -->
    <script src="https://app.midtrans.com/snap/snap.js" data-client-key="Mid-client-hm8eukZFdfuZIiE6"></script>
    <script type="text/javascript">
    document.getElementById('body').onload = function(){
        // SnapToken acquired from previous step
        snap.pay("{{ $snapToken}}", {
        // Optional
        onSuccess: function(result){
            /* You may add your own js here, this is just example */ document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
        },
        // Optional
        onPending: function(result){
            /* You may add your own js here, this is just example */ document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
            $('#status_code').val(result.status_code);
            $('#id_order').val(result.order_id);
            $('#transaction_id').val(result.transaction_id);
            $('#transaction_time').val(result.transaction_time);
            $('#payment_type').val(result.payment_type);
            $('#transaction_status').val(result.transaction_status);
            $('#total').val(result.gross_amount);
            $('#pesan').text(result.status_message);


            
        },
        // Optional
        onError: function(result){
            /* You may add your own js here, this is just example */ document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
        }
        });
    };
    </script>
</body>
</html>
