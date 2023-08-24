<div class="col-md-6">
<div class="h">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Produk</h5>

          <!-- Pie Chart -->
          <canvas id="pieChart" style="max-height: 400px;"></canvas>
          <script>
            //ambil data nama jenis dan jumlah produk per jenis dari DashboardController di fungsi index
                var lbl2 = [@foreach($ar_jumlah as $j) '{{ $j->nama_barang }}', @endforeach];
                var jml = [@foreach($ar_jumlah as $j) {{ $j->stok }}, @endforeach];
            document.addEventListener("DOMContentLoaded", () => {
              new Chart(document.querySelector('#pieChart'), {
                type: 'pie',
                data: {
                  /*
                  labels: [
                    'Red',
                    'Blue',
                    'Yellow'
                    ], */
                  labels: lbl2,
                  datasets: [{
                    label: 'Jumlah Produk',
                    //data: [300, 50, 100],
                    data: jml,
                    backgroundColor: [
                      'rgb(255, 99, 132)',
                      'rgb(54, 162, 235)',
                      'rgb(255, 205, 86)'
                      ],
                    hoverOffset: 4
                  }]
                }
              });
            });
          </script>
          <!-- End Pie CHart -->

        </div>
      </div>
      </div>
    </div> 