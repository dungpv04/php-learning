<?php 
    session_start();

    if (!isset($_SESSION['data'])) {
        $_SESSION['data'] = [];
    }
?>
<?php include 'header.php'; ?>
<?php include 'navigation.php'; ?>
<?php include 'users.php'; ?>
<?php include 'add.php'; ?>



<main>
    <?php if (empty($users)): ?>
        <p>Không có sản phẩm nào.</p>
    <?php else: ?>
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
                            <?php foreach ($_SESSION['data'] as $id => $record): ?>
                                <tr>
                                    <td><?= htmlspecialchars($record['name']) ?></td>
                                    <td><?= htmlspecialchars($record['email']) ?></td>
                                    <td><?= htmlspecialchars($record['address']) ?></td>
                                    <td><?= htmlspecialchars($record['phone']) ?></td>
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
$(document).ready(function(){
	// Activate tooltip
	$('[data-toggle="tooltip"]').tooltip();
	
	// Select/Deselect checkboxes
	var checkbox = $('table tbody input[type="checkbox"]');
	$("#selectAll").click(function(){
		if(this.checked){
			checkbox.each(function(){
				this.checked = true;                        
			});
		} else{
			checkbox.each(function(){
				this.checked = false;                        
			});
		} 
	});
	checkbox.click(function(){
		if(!this.checked){
			$("#selectAll").prop("checked", false);
		}
	});
});
</script>
</main>

<?php include 'footer.php'; ?>
