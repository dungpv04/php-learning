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
                            <?php include 'loaddata.php'; ?>
                        </tbody>
                    </table>
                </div>
            </div>        
        </div>
    <?php endif; ?>
    <script>
</main>

