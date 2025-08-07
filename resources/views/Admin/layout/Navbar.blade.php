           <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
               integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr"
               crossorigin="anonymous">
           <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
               integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous">
           </script>
           <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
           <link rel="stylesheet" href="//cdn.datatables.net/2.3.2/css/dataTables.dataTables.min.css">
           <script src="//cdn.datatables.net/2.3.2/js/dataTables.min.js"></script>
           <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

           <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
               <div class="container-fluid">
                   <a class="navbar-brand text-white" href="#">BKW</a>

                   <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                       data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                       aria-label="Toggle navigation">
                       <span class="navbar-toggler-icon"></span>
                   </button>

                   <div class="collapse navbar-collapse justify-content-between" id="navbarNavDropdown">
                       <!-- Left menu -->
                       <ul class="navbar-nav">
                           <li class="nav-item">
                               <a class="nav-link active text-white" aria-current="page"
                                   href="{{ route('Admin.Dashboard') }}">Home</a>
                           </li>
                           <li class="nav-item">
                               <a class="nav-link text-white" href="{{ route('Employee.Index') }}">Employee</a>
                           </li>
                           <li class="nav-item">
                               <a class="nav-link text-white" href="{{ route('Courses.Index') }}">Courses</a>
                           </li>
                            <li class="nav-item">
                               <a class="nav-link text-white" href="{{ route('registrations.index') }}">registrations</a>
                           </li>
                       </ul>

                       <!-- Right user info -->
                       <ul class="navbar-nav">
                        <button id="themeToggle" class="btn  btn-sm ms-3">🌙</button>

                           <li class="nav-item dropdown">
                               <a class="nav-link dropdown-toggle text-white d-flex align-items-center" href="#"
                                   role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                   <i class="bi bi-person-circle me-1"></i>
                                   {{ session('user_fullname') ?? 'Guest' }}
                               </a>
                               <ul class="dropdown-menu dropdown-menu-end">
                                   <li>
                                       <form method="POST">
                                           @csrf
                                           <button type="submit" class="dropdown-item">
                                               <i class="bi bi-box-arrow-right me-2"></i>Logout
                                           </button>
                                       </form>
                                   </li>
                               </ul>
                           </li>
                       </ul>
                   </div>
               </div>
           </nav>
<script>

    const themeToggleBtn = document.getElementById('themeToggle');
    const body = document.body;


    if (localStorage.getItem('theme') === 'dark') {
        body.classList.add('dark-mode');
        themeToggleBtn.textContent = '☀️'; // เปลี่ยนไอคอน
    } else {
        body.classList.add('light-mode');
        themeToggleBtn.textContent = '🌙';
    }

    themeToggleBtn.addEventListener('click', () => {
        if (body.classList.contains('dark-mode')) {
            body.classList.remove('dark-mode');
            body.classList.add('light-mode');
            themeToggleBtn.textContent = '🌙';
            localStorage.setItem('theme', 'light');
        } else {
            body.classList.remove('light-mode');
            body.classList.add('dark-mode');
            themeToggleBtn.textContent = '☀️';
            localStorage.setItem('theme', 'dark');
        }
    });
</script>
