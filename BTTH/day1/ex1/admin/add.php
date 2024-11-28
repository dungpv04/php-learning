<div id="addEmployeeModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form method="POST" action="" enctype="multipart/form-data">
				<div class="modal-header">						
					<h4 class="modal-title">Thêm hoa</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">					
					<div class="form-group">
						<label>Tên</label>
						<input type="text" class="form-control" name="name" required>
					</div>
					<div class="form-group">
						<label>Mô tả</label>
						<textarea class="form-control" name="description" required></textarea>
					</div>
					<div class="form-group">
						<label>Hình ảnh</label>
						<input type="file" class="form-control" name="image" required>
					</div>				
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="submit" class="btn btn-success" name="create" value="Add">
				</div>
			</form>
		</div>
	</div>
</div>

<?php
	if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['create'])) {
		if (!is_dir($saveDir)) {
			mkdir($saveDir, 0777, true);
		}

		$id = uniqid(); // Generate a unique ID
		$name = htmlspecialchars($_POST['name']);
		$description = htmlspecialchars($_POST['description']);

		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			// Directory to save uploaded files
			$uploadDir = '../images/';
		
			// Ensure the directory exists
			if (!is_dir($uploadDir)) {
				mkdir($uploadDir, 0777, true);
			}
		
			// Handle file upload
			if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
				$fileName = basename($_FILES['image']['name']);
				$uploadFilePath = $uploadDir . $fileName;
		
				if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadFilePath)) {
					echo "File uploaded successfully! Path: " . $uploadFilePath;
				} else {
					echo "Error: Unable to save the file.";
				}
			} else {
				echo "Error: File upload failed. ";
				if (isset($_FILES['image']['error'])) {
					echo "Error code: " . $_FILES['image']['error'];
				}
			}
		}
		
		$_SESSION['data'][$id] = [
			'name' => $name,
			'description' => $description,
			'image'=> str_replace('../', '', $uploadFilePath)
		];
		
		header("Location: index.php");
		exit;
	}
?>
