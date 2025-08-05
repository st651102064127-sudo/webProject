<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <link rel="stylesheet" href="//cdn.datatables.net/2.3.2/css/dataTables.dataTables.min.css">
    <script src="//cdn.datatables.net/2.3.2/js/dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body>
    <div class="">
        <nav class="navbar navbar-expand-lg bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand text-white" href="#">Navbar</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active text-white" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="#">Features</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="#">Pricing</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-white" href="#" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Dropdown link
                            </a>
                            <ul class="dropdown-menu text-white">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>


        <div class="container-fluid">
            <div class="row mt-3">
                <div class="col-12 col-md-6 col-xl-4">
                    <div class="card shadow rounded">
                        <div class="card-header">
                            <div class="card-title h2">เพิ่มข้อมูลคอร์ส</div>
                        </div>
                        <form action="{{ route('Course.Store') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="card-body">
                                <!-- ชื่อคอร์ส -->
                                <div class="mb-3">
                                    <label for="title" class="form-label">ชื่อคอร์ส</label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror"
                                        name="title" id="title" value="{{ old('title') }}" required>
                                    @error('title')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <!-- รายละเอียดคอร์ส -->
                                <div class="mb-3">
                                    <label for="description" class="form-label">รายละเอียดคอร์ส</label>
                                    <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description"
                                        rows="3" required>{{ old('description') }}</textarea>
                                    @error('description')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <!-- ราคา -->
                                <div class="mb-3">
                                    <label for="price" class="form-label">ราคา</label>
                                    <input type="number" step="0.01"
                                        class="form-control @error('price') is-invalid @enderror" name="price"
                                        id="price" value="{{ old('price') }}" required>
                                    @error('price')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <!-- ลิงก์รูปภาพปก -->
                                <div class="mb-3">
                                    <label for="thumbnail_url" class="form-label">ลิงก์รูปภาพปก</label>
                                    <input type="file" id="imageInput" name="file"
                                        class="form-control @error('file') is-invalid @enderror" accept="image/*" />
                                    @error('file')
                                        <div class="invalid-feedback d-block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    <br>
                                    <img id="previewImage" src="#" alt="Preview"
                                        style="max-width:300px; display:none; margin: 10px auto 0 auto;" />
                                </div>

                                <!-- ปุ่มส่ง -->
                                <div class="text-end">
                                    <button type="submit" class="btn btn-primary">เพิ่มคอร์ส</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
                <div class="col-12 col-md-6 col-md-8">
                    <div class="card rounded shadow">
                        <div class="card-header">
                            <div class="card-title h2">ข้อมูลคอร์สเรียน</div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table" id="tableShow">
                                    <thead>
                                        <tr>
                                            <th class="text-right">#</th>
                                            <th>รูป</th>
                                            <th class="">ชื่อคอร์ส</th>
                                            <th>ราคา</th>
                                            <th>#</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($data as $index => $course)
                                            <tr>
                                                <td class="text-right">{{ $index + 1 }}</td> <!-- ลำดับ -->
                                                <td>
                                                    <img src="{{ asset($course->image) }}" alt="รูปคอร์ส"
                                                        style="max-width: 100px;">
                                                </td>
                                                <td>{{ $course->title }}</td>
                                                <td>{{ number_format($course->price, 2) }}</td>
                                                <td>
                                                    <!-- ตัวอย่างปุ่มแก้ไขหรือลบ -->
                                                    <a href="{{ route('courses.edit', $course->uuid) }}"
                                                        class="btn btn-sm btn-warning">แก้ไข</a>
                                                    <form action="{{ route('courses.destroy', $course->uuid) }}"
                                                        method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-sm btn-danger"
                                                            onclick="return confirm('ลบข้อมูล?')">ลบ</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="5" class="text-center">ไม่มีข้อมูลคอร์ส</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>



    </div>
</body>

</html>
@if (session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'สำเร็จ',
            text: "{{ session('success') }}",
            timer: 2000,
            showConfirmButton: false,
            toast: true,
            position: 'top-end'
        });
    </script>
@endif
<script>
    let table = new DataTable('#tableShow', {
        language: {
            search: "ค้นหา:",
            lengthMenu: "แสดง _MENU_ รายการต่อหน้า",
            info: "แสดง _START_ ถึง _END_ จากทั้งหมด _TOTAL_ รายการ",
            infoEmpty: "ไม่มีข้อมูลที่จะแสดง",
            infoFiltered: "(กรองจากทั้งหมด _MAX_ รายการ)",
            zeroRecords: "ไม่พบข้อมูลที่ค้นหา",
            paginate: {
                first: "หน้าแรก",
                last: "หน้าสุดท้าย",
                next: "ถัดไป",
                previous: "ย้อนกลับ"
            },
            emptyTable: "ไม่มีข้อมูลในตาราง",
        },
        pageLength: 10, // จำนวนแถวที่แสดงต่อหน้าเริ่มต้น
        lengthMenu: [5, 10, 25, 50], // ตัวเลือกจำนวนแถว
        responsive: true, // ทำให้ตาราง responsive ในหน้าจอเล็ก
        ordering: true, // เปิดการเรียงลำดับคอลัมน์
    });
</script>




<script>
    const imageInput = document.getElementById('imageInput');
    const previewImage = document.getElementById('previewImage');

    imageInput.addEventListener('change', function() {
        const file = this.files[0];
        if (file) {
            const reader = new FileReader();

            reader.addEventListener('load', function() {
                previewImage.setAttribute('src', this.result);
                previewImage.style.display = 'block';
            });

            reader.readAsDataURL(file);
        } else {
            previewImage.style.display = 'none';
            previewImage.setAttribute('src', '#');
        }
    });
</script>
