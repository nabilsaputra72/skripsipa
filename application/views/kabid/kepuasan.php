<?php
?>
<div class="container py-4">
  <h2 class="mb-4"><?= $judul ?></h2>
  <div class="row">
    <div class="col-md-6">
      <canvas id="chartKepuasan"></canvas>
    </div>
    <div class="col-md-6">
      <h5>Komentar/Saran Masyarakat</h5>
      <ul class="list-group">
        <?php foreach($komentar as $k): ?>
          <li class="list-group-item">
            <span class="badge badge-warning"><?= str_repeat('★', $k['nilai']) ?></span>
            <span><?= htmlspecialchars($k['komentar']) ?></span>
            <div class="text-muted small"><?= date('d-m-Y H:i', strtotime($k['tanggal'])) ?></div>
          </li>
        <?php endforeach; ?>
      </ul>
    </div>
  </div>
</div>
<script src="<?= base_url('assets/vendor/chart.js/Chart.min.js') ?>"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
  const data = {
    labels: ['1 Bintang', '2 Bintang', '3 Bintang', '4 Bintang', '5 Bintang'],
    datasets: [{
      data: [
        <?= $statistik[1] ?>, <?= $statistik[2] ?>, <?= $statistik[3] ?>, <?= $statistik[4] ?>, <?= $statistik[5] ?>
      ],
      backgroundColor: ['#e74a3b','#f6c23e','#36b9cc','#4e73df','#1cc88a']
    }]
  };
  const total = data.datasets[0].data.reduce((a,b) => a+b, 0);
  const ctx = document.getElementById('chartKepuasan');
  if (ctx) {
    new Chart(ctx, {
      type: 'pie',
      data: data,
      options: {
        plugins: {
          legend: { position: 'top' },
          tooltip: {
            callbacks: {
              label: function(context) {
                const val = context.raw;
                const percent = total ? ((val/total)*100).toFixed(1) : 0;
                return context.label + ': ' + val + ' (' + percent + '%)';
              }
            }
          }
        }
      }
    });
  }
});
</script>