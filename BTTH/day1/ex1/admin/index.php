<?php 
    session_start();

    if (!isset($_SESSION['data'])) {
        $_SESSION['data'] = [];
    }
?>
<?php include 'header.php'; ?>
<?php include '../flowers.php'; ?>
<?php include 'add.php'; ?>



<main>
    <?php if (empty($flowers)): ?>
        <p>Không có hoa nào.</p>
    <?php else: ?>
        <div class="container-xl">
            <div class="table-responsive">
                <div class="table-wrapper">
                    <div class="table-title">
                        <div class="row">
                            <div class="col-sm-6">
                                <h2>Quản lí <b>danh sách hoa</b></h2>
                            </div>
                            <div class="col-sm-6">
                                <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal">
                                    <i class="material-icons">&#xE147;</i> 
                                    <span>Thêm</span>
                                </a>                    
                            </div>
                        </div>
                    </div>
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Tên</th>
                                <th>Mô tả</th>
                                <th>Hình ảnh</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                foreach ($flowers as $flower){
                                    $_SESSION['data'][$flower['id']] = $flower;
                                } 
                            ?>

                            <?php foreach ($_SESSION['data'] as $id => $record): ?>
                                <tr>
                                    <td><?= htmlspecialchars($record['name']) ?></td>
                                    <td><?= htmlspecialchars($record['description']) ?></td>
                                    <td><?php echo('<a href ="../'.$record['image'].'">'.$record['image'].'</a>') ?></td>
                                    <td>
                                    <?php echo('<a href="edit.php?id='.$id.'"class="edit"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>'); ?>
							        <?php echo('<a href="delete.php?id='.$id.'" class="delete"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>'); ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>        
        </div>
    <?php endif; ?>
    <script>
</main>

