<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="{{asset('css/dark-mode.css')}}">

</head>

<body>
    <div class="">
@include('admin.layout.navbar')

        <div class="container-fluid ">
            <div class="row mt-3  ">
                 <div class="col-12 col-md-4 mb-3">

                    <div class="card shadow rounded">
                        <div class="card-header">
                            <div class="card-title h2">เพิ่มข้อมูลคอร์ส</div>
                        </div>
                        <form  method="post" enctype="multipart/form-data">
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
        <div class="col-12 col-md-8 mb-3">
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
                                                    <button class="btn btn-info btn-sm viewBtn"
                                                        data-title="{{ $course->title }}"
                                                        data-description="{{ $course->description }}"
                                                        data-price="{{ $course->price }}" data-bs-toggle="modal"
                                                        data-image="{{ asset($course->image) }}"
                                                        data-id="{{ $course->uuid }}" data-bs-target="#viewModal">
                                                        View
                                                    </button>

                                                    <button type="button" class="btn btn-primary editBtn"
                                                        data-id="{{ $course->uuid }}"
                                                        data-title="{{ $course->title }}"
                                                        data-description="{{ $course->description }}"
                                                        data-price="{{ $course->price }}"
                                                        data-image="{{ asset($course->image) }}"
                                                        data-bs-toggle="modal" data-bs-target="#editModal">
                                                        แก้ไข
                                                    </button>

                                                    <form action="" method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button" class="btn btn-sm btn-danger deleteBtn"
                                                            data-id="{{ $course->uuid }}">
                                                            ลบ
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan=""></td>
                                                <td colspan=""></td>
                                                <td colspan=""></td>
                                                <td colspan=""></td>
                                                <td colspan=""></td>
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
    <!-- Modal (แค่หนึ่งอัน ใช้ร่วมกันได้ทุก row) -->
    <div class="modal fade" id="viewModal" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">รายละเอียดคอร์ส</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="ปิด"></button>
                </div>
                <div class="modal-body">
                    <div class="text-center mb-3">
                        <img id="modalImage" src="" alt="Course Image" class="img-fluid rounded"
                            style="max-height: 200px;">
                    </div>
                    <p><strong>ชื่อคอร์ส:</strong> <span id="modalTitle"></span></p>
                    <p><strong>รายละเอียด:</strong> <span id="modalDescription"></span></p>
                    <p><strong>ราคา:</strong> <span id="modalPrice"></span> บาท</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal สำหรับแก้ไข -->
    <div class="modal fade" id="editModal" method="POST" tabindex="-1" aria-labelledby="editModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="editForm" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id" id="editId">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">แก้ไขข้อมูลคอร์ส</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="editTitle" class="form-label">ชื่อคอร์ส</label>
                            <input type="text" class="form-control" id="editTitle" name="title">
                        </div>
                        <div class="mb-3">
                            <label for="editDescription" class="form-label">รายละเอียดคอร์ส</label>
                            <textarea class="form-control" id="editDescription" name="description" rows="3"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="editPrice" class="form-label">ราคา</label>
                            <input type="number" step="0.01" class="form-control" id="editPrice"
                                name="price">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">รูปภาพปัจจุบัน</label>
                            <img id="editImage" src="#" alt="รูปคอร์ส" style="max-width:100px;">
                            <input type="file" id="editImageInput" name="file" class="form-control mt-2"
                                accept="image/*" />
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                        <button type="submit" class="btn btn-primary">บันทึก</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
     @include('admin.layout.footer')
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


    $(document).ready(function() {
        $('.viewBtn').click(function() {
            $('#modalTitle').text($(this).data('title'));
            $('#modalDescription').text($(this).data('description'));
            $('#modalPrice').text($(this).data('price'));

            const imageUrl = $(this).data('image');
            $('#modalImage').attr('src', imageUrl);
        });

        $('.editBtn').click(function() {
            $('#editId').val($(this).data('id'));
            $('#editTitle').val($(this).data('title'));
            $('#editDescription').val($(this).data('description'));
            $('#editPrice').val($(this).data('price'));
            $('#editImage').attr('src', $(this).data('image'));
            let updateUrl = "/courses/update/" + $(this).data('id');
            $('#editForm').attr('action', updateUrl);
            $('#editForm').attr('method', 'POST');
        });
    });

    $('#editImageInput').on('change', function() {
        const file = this.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                $('#editImage').attr('src', e.target.result);
            }
            reader.readAsDataURL(file);
        }
    });
    $('.deleteBtn').click(function() {
        let id = $(this).data('id');
        Swal.fire({
            title: 'คุณแน่ใจหรือไม่?',
            text: "ต้องการลบข้อมูลคอร์สนี้ใช่หรือไม่",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'ลบ',
            cancelButtonText: 'ยกเลิก'
        }).then((result) => {
            if (result.isConfirmed) {
                // ส่งฟอร์มลบแบบ AJAX
                $.ajax({
                    url: '/courses/' + id,
                    type: 'POST',
                    data: {
                        _method: 'DELETE',
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        Swal.fire('ลบแล้ว!', 'ข้อมูลถูกลบเรียบร้อย', 'success').then(() => {
                            location.reload();
                        });
                    },
                    error: function() {
                        Swal.fire('ผิดพลาด!', 'ไม่สามารถลบข้อมูลได้', 'error');
                    }
                });
            }
        });
    });
</script>
