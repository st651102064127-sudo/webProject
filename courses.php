<div class="container">
    <h1 class="my-4">คอร์สเรียนทั้งหมด</h1>
    
    <div class="row mb-4">
        <div class="col-md-6">
            <form action="<?php echo BASE_URL; ?>pages/courses.php" method="get">
                <div class="input-group">
                    <input type="text" class="form-control" name="search" placeholder="ค้นหาคอร์ส...">
                    <button class="btn btn-primary" type="submit">ค้นหา</button>
                </div>
            </form>
        </div>
    </div>

    <div class="row">
        <?php
        $search = $_GET['search'] ?? '';
        $sql = "SELECT * FROM courses";
        
        if (!empty($search)) {
            $sql .= " WHERE title LIKE :search";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(['search' => "%$search%"]);
        } else {
            $stmt = $pdo->query($sql);
        }

        while ($course = $stmt->fetch(PDO::FETCH_ASSOC)) :
        ?>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100">
                    <img class="card-img-top" src="<?= ASSETS_URL ?>images/<?= htmlspecialchars($course['thumbnail'] ?? 'default-course.jpg') ?>" alt="<?= htmlspecialchars($course['title']) ?>">
                    <div class="card-body">
                        <h4 class="card-title"><?= htmlspecialchars($course['title']) ?></h4>
                        <h5>฿<?= number_format($course['price'], 2) ?></h5>
                        <p class="card-text"><?= htmlspecialchars(substr($course['description'], 0, 100)) ?>...</p>
                    </div>
                    <div class="card-footer">
                        <a href="#" class="btn btn-primary">ดูรายละเอียด</a>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
</div>