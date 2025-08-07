<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Management Dashboard</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/dashborad.css') }}">
</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark h-100">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold" href="#">
                <i class="fas fa-graduation-cap me-2"></i>Course Dashboard
            </a>

            <ul class="navbar-nav ms-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-user me-1"></i>
                        {{ session('user_fullname') ?? 'Guest' }}
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="dropdown-item">
                                    <i class="fas fa-sign-out-alt me-2"></i>Logout
                                </button>
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-2 p-0">
                <div class="sidebar p-3 bg-dark vh-100">
                    <nav class="nav flex-column">
                        <a class="nav-link active text-white" href="{{ route('Admin.Dashboard') }}">
                            <i class="fas fa-home me-2"></i> Home
                        </a>
                        <a class="nav-link text-white" href="{{ route('Employee.Index') }}">
                            <i class="fas fa-user me-2"></i> Employee
                        </a>
                        <a class="nav-link text-white" href="{{ route('Courses.Index') }}">
                            <i class="fas fa-book me-2"></i> Courses
                        </a>
                        <a class="nav-link text-white" href="{{ route('registrations.index') }}">
                            <i class="fas fa-clipboard-list me-2"></i> Registrations
                        </a>

                        <!-- ปุ่ม Toggle ธีม -->

                        <!-- User info dropdown (ถ้าต้องการ) -->

                    </nav>
                </div>
            </div>


            <!-- Main Content -->
            <div class="col-md-10 p-4">
                <h1 class="mb-4">แดชบอร์ดจัดการคอร์ส</h1>

                <!-- Key Metrics -->
                <div class="row mb-4">
                    <div class="col-md-3 mb-3">
                        <div class="card stat-card">
                            <div class="card-body d-flex align-items-center">
                                <div class="metric-icon icon-primary me-3">
                                    <i class="fas fa-users"></i>
                                </div>
                                <div>
                                    <div class="stat-number text-primary">1,247</div>
                                    <div class="stat-label">ผู้ใช้ทั้งหมด</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="card stat-card">
                            <div class="card-body d-flex align-items-center">
                                <div class="metric-icon icon-success me-3">
                                    <i class="fas fa-book-open"></i>
                                </div>
                                <div>
                                    <div class="stat-number text-success">156</div>
                                    <div class="stat-label">คอร์สทั้งหมด</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="card stat-card">
                            <div class="card-body d-flex align-items-center">
                                <div class="metric-icon icon-warning me-3">
                                    <i class="fas fa-clipboard-check"></i>
                                </div>
                                <div>
                                    <div class="stat-number text-warning">2,831</div>
                                    <div class="stat-label">การลงทะเบียน</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="card stat-card">
                            <div class="card-body d-flex align-items-center">
                                <div class="metric-icon icon-success me-3">
                                    <i class="fas fa-dollar-sign"></i>
                                </div>
                                <div>
                                    <div class="stat-number text-success">₿2.8M</div>
                                    <div class="stat-label">รายได้รวม</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Charts Row -->
                <div class="row mb-4">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="mb-0"><i class="fas fa-chart-pie me-2"></i>สถานะผู้ใช้</h5>
                            </div>
                            <div class="card-body">
                                <div class="chart-container">
                                    <canvas id="userStatusChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="mb-0"><i class="fas fa-chart-pie me-2"></i>สถานะการชำระเงิน</h5>
                            </div>
                            <div class="card-body">
                                <div class="chart-container">
                                    <canvas id="paymentStatusChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="mb-0"><i class="fas fa-chart-line me-2"></i>ยอดลงทะเบียนรายเดือน</h5>
                            </div>
                            <div class="card-body">
                                <div class="chart-container">
                                    <canvas id="registrationTrendChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Popular Courses -->
                <div class="row mb-4">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="mb-0"><i class="fas fa-star me-2"></i>คอร์สยอดนิยม</h5>
                            </div>
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <div>
                                        <h6 class="mb-0">Full-Stack Web Development</h6>
                                        <small class="text-muted text-white">฿15,999</small>
                                    </div>
                                    <div class="text-end">
                                        <div class="badge bg-success">487 คน</div>
                                    </div>
                                </div>
                                <div class="progress mb-3" style="height: 6px;">
                                    <div class="progress-bar bg-success" style="width: 95%"></div>
                                </div>

                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <div>
                                        <h6 class="mb-0">React Native Mobile App</h6>
                                        <small class="text-muted">฿12,999</small>
                                    </div>
                                    <div class="text-end">
                                        <div class="badge bg-primary">342 คน</div>
                                    </div>
                                </div>
                                <div class="progress mb-3" style="height: 6px;">
                                    <div class="progress-bar bg-primary" style="width: 70%"></div>
                                </div>

                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <div>
                                        <h6 class="mb-0">Data Science & Analytics</h6>
                                        <small class="text-muted">฿18,999</small>
                                    </div>
                                    <div class="text-end">
                                        <div class="badge bg-warning text-dark">298 คน</div>
                                    </div>
                                </div>
                                <div class="progress" style="height: 6px;">
                                    <div class="progress-bar bg-warning" style="width: 60%"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="mb-0"><i class="fas fa-trophy me-2"></i>คอร์สรายได้สูงสุด</h5>
                            </div>
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <div>
                                        <h6 class="mb-0">AI & Machine Learning</h6>
                                        <small class="text-muted text-white">฿24,999 × 234 คน</small>
                                    </div>
                                    <div class="text-end">
                                        <div class="stat-number text-success" style="font-size: 1.2rem;">฿5.8M</div>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <div>
                                        <h6 class="mb-0">Full-Stack Web Development</h6>
                                        <small class="text-muted">฿15,999 × 487 คน</small>
                                    </div>
                                    <div class="text-end">
                                        <div class="stat-number text-success" style="font-size: 1.2rem;">฿7.8M</div>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h6 class="mb-0">Cloud Architecture</h6>
                                        <small class="text-muted">฿19,999 × 189 คน</small>
                                    </div>
                                    <div class="text-end">
                                        <div class="stat-number text-success" style="font-size: 1.2rem;">฿3.8M</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Recent Users & Registration Status -->
                <div class="row mb-4">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="mb-0"><i class="fas fa-user-plus me-2"></i>ผู้ใช้ล่าสุด</h5>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-dark table-hover">
                                        <thead>
                                            <tr>
                                                <th>ชื่อ</th>
                                                <th>Email</th>
                                                <th>สถานะ</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>สมชาย จันทร์ดี</td>
                                                <td>somchai@email.com</td>
                                                <td><span class="status-badge status-active">Active</span></td>
                                            </tr>
                                            <tr>
                                                <td>นิดา เพชรรัตน์</td>
                                                <td>nida.p@email.com</td>
                                                <td><span class="status-badge status-active">Active</span></td>
                                            </tr>
                                            <tr>
                                                <td>วิชาญ กิตติศักดิ์</td>
                                                <td>wichan.k@email.com</td>
                                                <td><span class="status-badge status-inactive">Inactive</span></td>
                                            </tr>
                                            <tr>
                                                <td>สุวิทย์ นันทวัน</td>
                                                <td>suwit.n@email.com</td>
                                                <td><span class="status-badge status-active">Active</span></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="mb-0"><i class="fas fa-clock me-2"></i>การลงทะเบียนล่าสุด</h5>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-dark table-hover ">
                                        <thead>
                                            <tr>
                                                <th>คอร์ส</th>
                                                <th>ราคา</th>
                                                <th>สถานะ</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>React Development</td>
                                                <td>฿12,999</td>
                                                <td><span class="status-badge status-paid">Paid</span></td>
                                            </tr>
                                            <tr>
                                                <td>Python Data Science</td>
                                                <td class="text-white">฿15,999</td>
                                                <td><span class="status-badge status-pending">Pending</span></td>
                                            </tr>
                                            <tr>
                                                <td>DevOps Engineering</td>
                                                <td>฿18,999</td>
                                                <td><span class="status-badge status-paid">Paid</span></td>
                                            </tr>
                                            <tr>
                                                <td>UI/UX Design</td>
                                                <td>฿9,999</td>
                                                <td><span class="status-badge status-canceled">Canceled</span></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Summary Cards -->
                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="mb-0"><i class="fas fa-chart-bar me-2"></i>สรุปช่วงเวลา</h5>
                            </div>
                            <div class="card-body">
                                <div class="d-flex justify-content-between mb-2">
                                    <span>วันนี้</span>
                                    <strong>45 การลงทะเบียน</strong>
                                </div>
                                <div class="d-flex justify-content-between mb-2">
                                    <span>เดือนนี้</span>
                                    <strong>1,247 การลงทะเบียน</strong>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <span>ปีนี้</span>
                                    <strong>12,834 การลงทะเบียน</strong>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="mb-0"><i class="fas fa-money-bill me-2"></i>ราคาคอร์ส</h5>
                            </div>
                            <div class="card-body">
                                <div class="d-flex justify-content-between mb-2">
                                    <span>ราคาเฉลี่ย</span>
                                    <strong>฿15,749</strong>
                                </div>
                                <div class="d-flex justify-content-between mb-2">
                                    <span>ราคาสูงสุด</span>
                                    <strong>฿24,999</strong>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <span>ราคาต่ำสุด</span>
                                    <strong>฿4,999</strong>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="mb-0"><i class="fas fa-users me-2"></i>สถิติผู้ใช้</h5>
                            </div>
                            <div class="card-body">
                                <div class="d-flex justify-content-between mb-2">
                                    <span>Active Users</span>
                                    <strong class="text-success">1,089 (87%)</strong>
                                </div>
                                <div class="d-flex justify-content-between mb-2">
                                    <span>Inactive Users</span>
                                    <strong class="text-secondary">158 (13%)</strong>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <span>ผู้ใช้ใหม่เดือนนี้</span>
                                    <strong class="text-primary">234 คน</strong>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script>
        // Chart.js configuration for dark theme
        Chart.defaults.color = '#b3b3b3';
        Chart.defaults.borderColor = '#404040';

        // User Status Chart
        const userStatusCtx = document.getElementById('userStatusChart').getContext('2d');
        new Chart(userStatusCtx, {
            type: 'doughnut',
            data: {
                labels: ['Active', 'Inactive'],
                datasets: [{
                    data: [1089, 158],
                    backgroundColor: ['#28a745', '#6c757d'],
                    borderColor: '#404040',
                    borderWidth: 2
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            padding: 20,
                            usePointStyle: true
                        }
                    }
                }
            }
        });

        // Payment Status Chart
        const paymentStatusCtx = document.getElementById('paymentStatusChart').getContext('2d');
        new Chart(paymentStatusCtx, {
            type: 'doughnut',
            data: {
                labels: ['Paid', 'Pending', 'Canceled'],
                datasets: [{
                    data: [2156, 487, 188],
                    backgroundColor: ['#28a745', '#ffc107', '#dc3545'],
                    borderColor: '#404040',
                    borderWidth: 2
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            padding: 20,
                            usePointStyle: true
                        }
                    }
                }
            }
        });

        // Registration Trend Chart
        const registrationTrendCtx = document.getElementById('registrationTrendChart').getContext('2d');
        new Chart(registrationTrendCtx, {
            type: 'line',
            data: {
                labels: ['มค', 'กพ', 'มีค', 'เมย', 'พค', 'มิย'],
                datasets: [{
                    label: 'การลงทะเบียน',
                    data: [856, 1247, 1089, 1356, 1598, 1247],
                    borderColor: '#007bff',
                    backgroundColor: 'rgba(0, 123, 255, 0.1)',
                    tension: 0.4,
                    fill: true,
                    pointBackgroundColor: '#007bff',
                    pointBorderColor: '#ffffff',
                    pointBorderWidth: 2
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    x: {
                        grid: {
                            color: '#404040'
                        }
                    },
                    y: {
                        grid: {
                            color: '#404040'
                        },
                        beginAtZero: true
                    }
                },
                plugins: {
                    legend: {
                        display: false
                    }
                }
            }
        });

        // Add smooth hover effects
        document.addEventListener('DOMContentLoaded', function() {
            const cards = document.querySelectorAll('.stat-card');
            cards.forEach(card => {
                card.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-2px)';
                });
                card.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0)';
                });
            });
        });
    </script>
</body>

</html>
