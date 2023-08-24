<div class="col-md-6">
<div class="h">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Stok Barang</h5>

          <!-- Bar Chart -->
          <canvas id="barChart" style="max-height: 400px;"></canvas>
          <script>
            //ambil data nama nama dan stok dari DashboardController di fungsi index
                var lbl = [@foreach($ar_stok as $s) '{{ $s->nama_barang }}', @endforeach];
                var stk = [@foreach($ar_stok as $s) {{ $s->stok }}, @endforeach];
            document.addEventListener("DOMContentLoaded", () => {
              new Chart(document.querySelector('#barChart'), {
                type: 'bar',
                data: {
                  //labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
                  labels: lbl,
                  datasets: [{
                    label: 'Grafik Stok Barang',
                    //data: [65, 59, 80, 81, 56, 55, 40],
                    data: stk,
                    backgroundColor: [
                      'rgba(255, 99, 132, 0.2)',
                      'rgba(255, 159, 64, 0.2)',
                      'rgba(255, 205, 86, 0.2)',
                      'rgba(75, 192, 192, 0.2)',
                      'rgba(54, 162, 235, 0.2)',
                      'rgba(153, 102, 255, 0.2)',
                      'rgba(201, 203, 207, 0.2)'
                      ],
                    borderColor: [
                      'rgb(255, 99, 132)',
                      'rgb(255, 159, 64)',
                      'rgb(255, 205, 86)',
                      'rgb(75, 192, 192)',
                      'rgb(54, 162, 235)',
                      'rgb(153, 102, 255)',
                      'rgb(201, 203, 207)'
                      ],
                    borderWidth: 1
                  }]
                },
                options: {
                  scales: {
                    y: {
                      beginAtZero: true
                    }
                  }
                }
              });
            });
          </script>
          <!-- End Bar CHart -->

        </div>
      </div>
      </div>
    </div>