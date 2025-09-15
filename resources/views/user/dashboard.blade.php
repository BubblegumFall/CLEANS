@extends('layouts.user')

@section('title', 'Dashboard')

@section('content')
<style>
    /* Global Styles */
body {
  background-color: #f8f9fa;
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

/* Card Styles */
.card {
  border-radius: 8px;
  transition: all 0.2s ease;
}

.card:hover {
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08) !important;
}

/* Icon Box */
.icon-box {
  width: 48px;
  height: 48px;
  border-radius: 8px;
  display: flex;
  align-items: center;
  justify-content: center;
}

.icon-box i {
  font-size: 20px;
}

/* Light Background Colors */
.bg-primary-light {
  background-color: rgba(0, 123, 255, 0.1);
}

.bg-success-light {
  background-color: rgba(40, 167, 69, 0.1);
}

.bg-warning-light {
  background-color: rgba(255, 193, 7, 0.1);
}

/* Avatar Styles */
.avatar-lg {
  width: 64px;
  height: 64px;
  overflow: hidden;
  border-radius: 50%;
}

.avatar-lg img {
  width: 100%;
  height: 100%;
  object-fit: cover;
}

/* Table Styles */
.table th {
  border-top: none;
  font-weight: 600;
  color: #495057;
  font-size: 0.875rem;
}

.table td {
  vertical-align: middle;
  font-size: 0.875rem;
}

.table-hover tbody tr:hover {
  background-color: rgba(0, 123, 255, 0.05);
}

/* Badge Styles */
.badge {
  padding: 0.375rem 0.75rem;
  font-weight: 500;
}

/* Button Styles */
.btn {
  border-radius: 4px;
  font-weight: 500;
  transition: all 0.2s ease;
}

.btn-sm {
  padding: 0.25rem 0.5rem;
  font-size: 0.75rem;
}

.btn-outline-primary:hover {
  background-color: #007bff;
  color: white;
}

/* Simple Fade-in Animation */
@keyframes fadeIn {
  from { opacity: 0; }
  to { opacity: 1; }
}

.fade-in {
  animation: fadeIn 0.5s ease-in-out;
}
</style>
<div class="container-fluid">
  <!-- Welcome Section -->
  <div class="row mb-4">
    <div class="col-12">
      <div class="card border-0 shadow-sm">
        <div class="card-body py-4">
          <div class="d-flex align-items-center">
            <div class="mr-3">
              <div class="avatar-lg">
                <img src="https://randomuser.me/api/portraits/men/1.jpg" class="rounded-circle" alt="User">
              </div>
            </div>
            <div>
              <h4 class="mb-1">Selamat datang, Budi Santoso</h4>
              <p class="text-muted mb-0">Terakhir login: 24 Juni 2024, 10:30</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Quick Stats -->
  <div class="row mb-4">
    <div class="col-md-4 mb-3">
      <div class="card border-0 shadow-sm h-100">
        <div class="card-body">
          <div class="d-flex align-items-center">
            <div class="mr-3">
              <div class="icon-box bg-primary-light">
                <i class="fas fa-tshirt text-primary"></i>
              </div>
            </div>
            <div>
              <h6 class="text-muted">Total Pesanan</h6>
              <h3 class="mb-0">24</h3>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-4 mb-3">
      <div class="card border-0 shadow-sm h-100">
        <div class="card-body">
          <div class="d-flex align-items-center">
            <div class="mr-3">
              <div class="icon-box bg-success-light">
                <i class="fas fa-check-circle text-success"></i>
              </div>
            </div>
            <div>
              <h6 class="text-muted">Selesai</h6>
              <h3 class="mb-0">18</h3>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-4 mb-3">
      <div class="card border-0 shadow-sm h-100">
        <div class="card-body">
          <div class="d-flex align-items-center">
            <div class="mr-3">
              <div class="icon-box bg-warning-light">
                <i class="fas fa-clock text-warning"></i>
              </div>
            </div>
            <div>
              <h6 class="text-muted">Dalam Proses</h6>
              <h3 class="mb-0">3</h3>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Active Orders -->
  <div class="row mb-4">
    <div class="col-12">
      <div class="card border-0 shadow-sm">
        <div class="card-header bg-white border-0 py-3">
          <div class="d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Pesanan Aktif</h5>
            <button class="btn btn-sm btn-primary">Pesanan Baru</button>
          </div>
        </div>
        <div class="card-body p-0">
          <div class="table-responsive">
            <table class="table table-hover mb-0">
              <thead>
                <tr>
                  <th>No. Pesanan</th>
                  <th>Layanan</th>
                  <th>Berat (Kg)</th>
                  <th>Status</th>
                  <th>Estimasi Selesai</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>#ORD-2024-025</td>
                  <td>Cuci Kering</td>
                  <td>3.5</td>
                  <td><span class="badge badge-warning">Dicuci</span></td>
                  <td>25 Juni 2024</td>
                  <td>
                    <button class="btn btn-sm btn-outline-primary">Detail</button>
                  </td>
                </tr>
                <tr>
                  <td>#ORD-2024-024</td>
                  <td>Cuci Setrika</td>
                  <td>5.2</td>
                  <td><span class="badge badge-info">Dikeringkan</span></td>
                  <td>24 Juni 2024</td>
                  <td>
                    <button class="btn btn-sm btn-outline-primary">Detail</button>
                  </td>
                </tr>
                <tr>
                  <td>#ORD-2024-023</td>
                  <td>Setrika Saja</td>
                  <td>2.8</td>
                  <td><span class="badge badge-primary">Menunggu</span></td>
                  <td>26 Juni 2024</td>
                  <td>
                    <button class="btn btn-sm btn-outline-primary">Detail</button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Recent Orders -->
  <div class="row">
    <div class="col-12">
      <div class="card border-0 shadow-sm">
        <div class="card-header bg-white border-0 py-3">
          <h5 class="mb-0">Riwayat Pesanan</h5>
        </div>
        <div class="card-body p-0">
          <div class="table-responsive">
            <table class="table table-hover mb-0">
              <thead>
                <tr>
                  <th>No. Pesanan</th>
                  <th>Layanan</th>
                  <th>Berat (Kg)</th>
                  <th>Tanggal</th>
                  <th>Total</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>#ORD-2024-022</td>
                  <td>Cuci Kering</td>
                  <td>4.1</td>
                  <td>22 Juni 2024</td>
                  <td>Rp 82.000</td>
                  <td><span class="badge badge-success">Selesai</span></td>
                  <td>
                    <button class="btn btn-sm btn-outline-primary">Detail</button>
                  </td>
                </tr>
                <tr>
                  <td>#ORD-2024-021</td>
                  <td>Cuci Setrika</td>
                  <td>3.2</td>
                  <td>20 Juni 2024</td>
                  <td>Rp 96.000</td>
                  <td><span class="badge badge-success">Selesai</span></td>
                  <td>
                    <button class="btn btn-sm btn-outline-primary">Detail</button>
                  </td>
                </tr>
                <tr>
                  <td>#ORD-2024-020</td>
                  <td>Setrika Saja</td>
                  <td>2.5</td>
                  <td>18 Juni 2024</td>
                  <td>Rp 50.000</td>
                  <td><span class="badge badge-success">Selesai</span></td>
                  <td>
                    <button class="btn btn-sm btn-outline-primary">Detail</button>
                  </td>
                </tr>
              </tbody>
              <script>
                document.addEventListener('DOMContentLoaded', function() {
  // Add fade-in class to elements
  const cards = document.querySelectorAll('.card');
  cards.forEach((card, index) => {
    setTimeout(() => {
      card.classList.add('fade-in');
    }, index * 100);
  });
  
  // Simple notification for new order button
  const newOrderBtn = document.querySelector('.btn-primary');
  if (newOrderBtn) {
    newOrderBtn.addEventListener('click', function() {
      alert('Fitur pesanan baru akan segera hadir!');
    });
  }
  
  // Simple detail button functionality
  const detailBtns = document.querySelectorAll('.btn-outline-primary');
  detailBtns.forEach(btn => {
    btn.addEventListener('click', function() {
      const orderId = this.closest('tr').querySelector('td').textContent;
      alert(`Menampilkan detail untuk ${orderId}`);
    });
  });
});
              </script>
            </table>
          </div>
          <div class="card-footer bg-white border-0 py-3 text-center">
            <a href="#" class="text-primary">Lihat Semua Riwayat</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
