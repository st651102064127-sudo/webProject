<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    @include('Admin.layout.navbar')
    <div class="container mt-5">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">รายชื่อคอร์ส</h4>
            </div>
            <div class="card-body">
                <table id="coursesTable" class="table table-striped table-hover align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>รูป</th>
                            <th>ชื่อคอร์ส</th>
                            <th>ผู้สอน</th>
                            <th>ราคา</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($courses as $index => $course)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>
                                    <img src="{{ $course->image_url ? asset($course->image_url) : '' }}"
                                        alt="Course Image" width="60" height="60" class="rounded">
                                </td>
                                <td>{{ $course->title }}</td>
                                <td>{{ $course->instructor }}</td>
                                <td>{{ number_format($course->price, 2) }}</td>
                                <td>
                                    <button class="btn btn-info btn-sm viewBtn" data-bs-toggle="modal"
                                        data-bs-target="#viewModal" data-title="{{ $course->title }}"
                                        data-id="{{ $course->uuid }}" data-category="{{ $course->category }}"
                                        data-instructor="{{ $course->instructor }}"
                                        data-duration="{{ $course->duration }}" data-level="{{ $course->level }}"
                                        data-price="{{ $course->price }}"
                                        data-description="{{ $course->description }}"
                                        data-image="{{ $course->image_url ? asset($course->image_url) : 'https://via.placeholder.com/150' }}"
                                        data-syllabuses='@json($course->syllabuses)'
                                        data-features='@json($course->features)'>View</button>

                                    <button class="btn btn-warning btn-sm editBtn" data-bs-toggle="modal"
                                        data-bs-target="#editModal" data-id="{{ $course->course_id }}"
                                        data-title="{{ $course->title }}" data-category="{{ $course->category }}"
                                        data-instructor="{{ $course->instructor }}" data-level="{{ $course->level }}"
                                        data-price="{{ $course->price }}"
                                        data-description="{{ $course->description }}"
                                        data-image="{{ $course->image_url ? asset($course->image_url) : '' }}"
                                        data-syllabuses='@json($course->syllabuses)'
                                        data-features='@json($course->features)'>Edit</button>
                                    <button class="btn btn-danger btn-sm deleteBtn" data-id="{{ $course->course_id }}"
                                        data-title="{{ $course->title }}" data-bs-toggle="modal"
                                        data-bs-target="#deleteModal">Delete</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Edit Modal -->
    <!-- Edit Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-scrollable">
            <div class="modal-content">
                <form id="editForm" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="modal-header bg-warning text-dark">
                        <h5 class="modal-title fw-bold" id="editModalLabel">Edit Course</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body" style="max-height: 75vh; overflow-y: auto;">
                        <div class="row g-4">
                            <!-- Left: Image -->
                            <div class="col-md-4 text-center">
                                <img id="editImagePreview" src="https://via.placeholder.com/300"
                                    class="img-fluid rounded mb-3" style="max-height:300px;">
                                <input type="file" name="image" id="editImageInput" class="form-control mt-2"
                                    accept="image/*">
                            </div>

                            <!-- Right: Details -->
                            <div class="col-md-8">
                                <input type="hidden" name="uuid" id="editUuid">

                                <div class="mb-2">
                                    <label class="form-label">Title</label>
                                    <input type="text" name="title" id="editTitle" class="form-control" required>
                                </div>
                                <div class="mb-2">
                                    <label class="form-label">Category</label>
                                    <input type="text" name="category" id="editCategory" class="form-control">
                                </div>
                                <div class="mb-2">
                                    <label class="form-label">Instructor</label>
                                    <input type="text" name="instructor" id="editInstructor" class="form-control"
                                        required>
                                </div>
                                <div class="mb-2">
                                    <label class="form-label">Level</label>
                                    <input type="text" name="level" id="editLevel" class="form-control">
                                </div>
                                <div class="mb-2">
                                    <label class="form-label">Price</label>
                                    <input type="number" name="price" id="editPrice" class="form-control"
                                        min="0" required>
                                </div>
                                <div class="mb-2">
                                    <label class="form-label">Description</label>
                                    <textarea name="description" id="editDescription" class="form-control"></textarea>
                                </div>

                                <hr>
                                <h6>Syllabuses</h6>
                                <div id="editSyllabusWrapper"></div>
                                <button type="button" id="addEditSyllabus" class="btn btn-light btn-sm mt-2">+
                                    เพิ่มหัวข้อ</button>

                                <hr>
                                <h6>Features</h6>
                                <div id="editFeatureWrapper"></div>
                                <button type="button" id="addEditFeature" class="btn btn-light btn-sm mt-2">+ เพิ่ม
                                    Feature</button>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Save Changes</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal View -->
    <div class="modal fade" id="viewModal" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title fw-bold" id="viewModalLabel">Course Details</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row g-4">
                        <!-- Left: Image -->
                        <div class="col-md-4 text-center">
                            <img id="modalImage" src="https://via.placeholder.com/300" class="img-fluid rounded"
                                style="max-height:300px;">
                        </div>

                        <!-- Right: Details -->
                        <div class="col-md-8">
                            <h4 id="modalTitle" class="fw-bold mb-3"></h4>
                            <p><strong>Category:</strong> <span id="modalCategory"></span></p>
                            <p><strong>Instructor:</strong> <span id="modalInstructor"></span></p>
                            <p><strong>Duration:</strong> <span id="modalDuration"></span></p>
                            <p><strong>Level:</strong> <span id="modalLevel"></span></p>
                            <p><strong>Price:</strong> <span id="modalPrice"></span></p>
                            <p><strong>Description:</strong> <span id="modalDescription"></span></p>

                            <hr>
                            <h6>Syllabuses:</h6>
                            <ul id="modalSyllabuses" class="list-group list-group-flush mb-3"></ul>

                            <h6>Features:</h6>
                            <ul id="modalFeatures" class="list-group list-group-flush"></ul>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
    <script src="//cdn.datatables.net/2.3.2/js/dataTables.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#coursesTable').DataTable();

            $('.viewBtn').click(function() {
                const btn = $(this);
                $('#modalTitle').text(btn.data('title'));
                $('#modalCategory').text(btn.data('category'));
                $('#modalInstructor').text(btn.data('instructor'));
                $('#modalDuration').text(btn.data('duration'));
                $('#modalLevel').text(btn.data('level'));
                $('#modalPrice').text(btn.data('price'));
                $('#modalDescription').text(btn.data('description'));
                $('#modalImage').attr('src', btn.data('image'));

                const syllabuses = btn.data('syllabuses');
                let syllabusHtml = '';
                syllabuses.forEach(s => {
                    syllabusHtml +=
                        `<li class="list-group-item">${s.title} (${s.duration || '-'})</li>`;
                });
                $('#modalSyllabuses').html(syllabusHtml);

                const features = btn.data('features');
                let featureHtml = '';
                features.forEach(f => {
                    featureHtml +=
                        `<li class="list-group-item">${f.feature_name}: ${f.feature_value}</li>`;
                });
                $('#modalFeatures').html(featureHtml);
            });
        });
    </script>

    <!-- Modal View -->
    <div class="modal fade" id="viewModal" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold" id="viewModalLabel">Course Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="text-center mb-3">
                        <img id="modalImage" src="https://via.placeholder.com/150" class="img-fluid rounded"
                            style="max-height:200px;">
                    </div>
                    <h5 id="modalTitle"></h5>
                    <p><strong>Category:</strong> <span id="modalCategory"></span></p>
                    <p><strong>Instructor:</strong> <span id="modalInstructor"></span></p>
                    <p><strong>Duration:</strong> <span id="modalDuration"></span></p>
                    <p><strong>Level:</strong> <span id="modalLevel"></span></p>
                    <p><strong>Price:</strong> <span id="modalPrice"></span></p>
                    <p><strong>Description:</strong> <span id="modalDescription"></span></p>

                    <h6>Syllabuses:</h6>
                    <ul id="modalSyllabuses"></ul>

                    <h6>Features:</h6>
                    <ul id="modalFeatures"></ul>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Delete -->
    <!-- Delete Confirmation Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form id="deleteForm" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="modal-header bg-danger text-white">
                        <h5 class="modal-title" id="deleteModalLabel">ยืนยันการลบคอร์ส</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <p>คุณต้องการลบคอร์ส <strong id="deleteCourseTitle"></strong> จริงหรือไม่?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger">ลบ</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
    <script src="//cdn.datatables.net/2.3.2/js/dataTables.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#coursesTable').DataTable();

            // View Modal
            $('.viewBtn').click(function() {
                const btn = $(this);
                $('#modalTitle').text(btn.data('title'));
                $('#modalCategory').text(btn.data('category'));
                $('#modalInstructor').text(btn.data('instructor'));
                $('#modalDuration').text(btn.data('duration'));
                $('#modalLevel').text(btn.data('level'));
                $('#modalPrice').text(btn.data('price'));
                $('#modalDescription').text(btn.data('description'));
                $('#modalImage').attr('src', btn.data('image'));

                // Syllabuses
                const syllabuses = btn.data('syllabuses');
                let syllabusHtml = '';
                syllabuses.forEach(s => {
                    syllabusHtml += `<li>${s.title} (${s.duration || '-'})</li>`;
                });
                $('#modalSyllabuses').html(syllabusHtml);

                // Features
                const features = btn.data('features');
                let featureHtml = '';
                features.forEach(f => {
                    featureHtml += `<li>${f.feature_name}: ${f.feature_value}</li>`;
                });
                $('#modalFeatures').html(featureHtml);
            });
        });
    </script>
    <script>
        $(document).ready(function() {

            $('#coursesTable').DataTable();

            // Edit Modal เปิดข้อมูล
            $('.editBtn').click(function() {
                const btn = $(this);
                $('#editCourseId').val(btn.data('id'));
                $('#editTitle').val(btn.data('title'));
                $('#editCategory').val(btn.data('category'));
                $('#editInstructor').val(btn.data('instructor'));
                $('#editDuration').val(btn.data('duration'));
                $('#editLevel').val(btn.data('level'));
                $('#editPrice').val(btn.data('price'));
                $('#editDescription').val(btn.data('description'));
                $('#editImagePreview').attr('src', btn.data('image') || '');


                $('#editForm').attr('action', '/courses/update/' + btn.data('id'));

                // Syllabuses
                const syllabuses = btn.data('syllabuses');
                let syllabusHtml = '';
                syllabuses.forEach((s, index) => {
                    syllabusHtml += `
                <div class="row g-2 mb-2 syllabus-item">
                    <div class="col-md-5">
                        <input type="text" name="syllabuses[${index}][title]" class="form-control" value="${s.title}" required>
                    </div>
                    <div class="col-md-3">
                        <input type="text" name="syllabuses[${index}][duration]" class="form-control" value="${s.duration}">
                    </div>

                    <div class="col-md-2">
                        <button type="button" class="btn btn-danger w-100 removeRow">ลบ</button>
                    </div>
                </div>`;
                });
                $('#editSyllabusWrapper').html(syllabusHtml);

                // Features
                const features = btn.data('features');
                let featureHtml = '';
                features.forEach((f, index) => {
                    featureHtml += `
                <div class="row g-2 mb-2 feature-item">
                    <div class="col-md-5">
                        <input type="text" name="features[${index}][feature_name]" class="form-control" value="${f.feature_name}" required>
                    </div>
                    <div class="col-md-5">
                        <input type="text" name="features[${index}][feature_value]" class="form-control" value="${f.feature_value}">
                    </div>
                    <div class="col-md-2">
                        <button type="button" class="btn btn-danger w-100 removeRow">ลบ</button>
                    </div>
                </div>`;
                });
                $('#editFeatureWrapper').html(featureHtml);
            });

            // Image Preview
            $('#editImageInput').change(function() {
                const file = this.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        $('#editImagePreview').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(file);
                }
            });

            // Add/Remove Syllabus & Feature
            let syllabusIndex = 100;
            let featureIndex = 100;

            $('#addEditSyllabus').click(function() {
                $('#editSyllabusWrapper').append(`
            <div class="row g-2 mb-2 syllabus-item">
                <div class="col-md-5">
                    <input type="text" name="syllabuses[${syllabusIndex}][title]" class="form-control" placeholder="หัวข้อ" required>
                </div>
                <div class="col-md-3">
                    <input type="text" name="syllabuses[${syllabusIndex}][duration]" class="form-control" placeholder="ระยะเวลา">
                </div>

                <div class="col-md-2">
                    <button type="button" class="btn btn-danger w-100 removeRow">ลบ</button>
                </div>
            </div>
        `);
                syllabusIndex++;
            });

            $('#addEditFeature').click(function() {
                $('#editFeatureWrapper').append(`
            <div class="row g-2 mb-2 feature-item">
                <div class="col-md-5">
                    <input type="text" name="features[${featureIndex}][feature_name]" class="form-control" placeholder="เช่น ภาษา" required>
                </div>
                <div class="col-md-5">
                    <input type="text" name="features[${featureIndex}][feature_value]" class="form-control" placeholder="เช่น ไทย/อังกฤษ">
                </div>
                <div class="col-md-2">
                    <button type="button" class="btn btn-danger w-100 removeRow">ลบ</button>
                </div>
            </div>
        `);
                featureIndex++;
            });

            $(document).on('click', '.removeRow', function() {
                $(this).closest('.row').remove();
            });
        });
        $('.deleteBtn').click(function() {
            const btn = $(this);
            const id = btn.data('id');
            const title = btn.data('title');
            $('#deleteCourseTitle').text(title);
            $('#deleteForm').attr('action', '/courses/delete/' + id); // route สำหรับลบ
        });
    </script>

    <script>
        // ตรวจสอบ session messages จาก Laravel
        @if (session('success'))
            Swal.fire({
                toast: true,
                position: 'top-end',
                icon: 'success',
                title: "{{ session('success') }}",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true
            });
        @endif

        @if (session('error'))
            Swal.fire({
                toast: true,
                position: 'top-end',
                icon: 'error',
                title: "{{ session('error') }}",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true
            });
        @endif
    </script>

</body>

</html>
