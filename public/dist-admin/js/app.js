// Arefin Admin - App JS

// Sidebar toggle (mobile)
function toggleSidebar() {
  const sb = document.getElementById('sidebar');
  const ov = document.getElementById('overlay');
  sb.classList.toggle('open');
  if (ov.style.display === 'block') {
    ov.style.display = 'none';
  } else {
    ov.style.display = 'block';
  }
}

// --- Daily Sales Chart ---
$(function () {
  // Close dropdown on outside click
  $(document).on('click', function (e) {
    if (!$(e.target).closest('#userDropdown').length) $('#userMenu').removeClass('show');
  });

  const days = Array.from({ length: 31 }, (_, i) => i + 1);
  const sales = [820,650,940,1100,780,560,430,890,1250,1340,970,1120,860,740,1020,1180,690,530,1400,1560,1320,1080,920,670,1240,1450,1100,980,1370,1510,1600];

  if ($('#salesChart').length) {
    new Chart($('#salesChart')[0], {
      type: 'bar',
      data: {
        labels: days,
        datasets: [{
          label: 'Sales ($)',
          data: sales,
          backgroundColor: '#2563eb',
          hoverBackgroundColor: '#1d4ed8',
          borderRadius: 4,
          barPercentage: 0.6
        }]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: { display: false },
          tooltip: {
            callbacks: {
              title: (t) => 'Day ' + t[0].label,
              label: (t) => ' $' + t.raw.toLocaleString()
            }
          }
        },
        scales: {
          y: {
            beginAtZero: true,
            grid: { color: '#f1f5f9' },
            ticks: { font: { size: 11 }, callback: v => '$' + v }
          },
          x: {
            grid: { display: false },
            ticks: { font: { size: 11 } }
          }
        }
      }
    });
  }
});
