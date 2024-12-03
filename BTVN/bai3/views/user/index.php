<?php 

    if (!isset($_SESSION['data'])) {
        $_SESSION['data'] = [];
    }
?>
<?php include 'header.php'; ?>
<?php include 'navigation.php'; ?>
<?php include 'add.php'; ?>



<main>
    <div class="container-xl">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-6">
                            <h2>Quản lí <b>Người dùng</b></h2>
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
                            <th>Họ tên</th>
                            <th>Email</th>
                            <th>Địa chỉ</th>
                            <th>Số điện thoại</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($_SESSION['data'] as $record): ?>
                            <tr>
                                <td><?= htmlspecialchars($record['Name']) ?></td>
                                <td><?= htmlspecialchars($record['Email']) ?></td>
                                <td><?= htmlspecialchars($record['Address']) ?></td>
                                <td><?= htmlspecialchars($record['Phone']) ?></td>
                                <td>
                                <?php echo('<a href="?controller=User&action=Update&id='.$record['Id'].'"class="edit"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>'); ?>
                                <?php echo('<a href="?controller=User&action=Delete&id='.$record['Id'].'" class="delete"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>'); ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>        
    </div>

</main>

<?php include 'footer.php'; ?>
