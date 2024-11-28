<?php
	include("header.php");
	session_start();
	$id = $_GET["id"];
	$data = $_SESSION['data'][$id];
?>

<div id="editEmployeeModal" class="container">
	<div class="modal-dialog">
		<div class="modal-content">
			<form method="POST">
				<div class="modal-header">						
					<h4 class="modal-title">Edit Employee</h4>
				</div>
				<div class="modal-body">					
					<div class="form-group">
						<label>Name</label>
						<input type="text" name="name" class="form-control" required value="<?php echo $data['name']; ?>">
					</div>
					<div class="form-group">
						<label>Description</label>
						<textarea class="form-control" name="description" required ><?php echo $data['description']; ?></textarea>
					</div>
					<div class="form-group">
						<label>Image</label>
						<input type="file" class="form-control" name="image" required>
					</div>					
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="submit" class="btn btn-info" name="update" value="Save">
				</div>
			</form>
		</div>
	</div>
</div>

<?php
	if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])) {
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
		
		$finalImgPath = str_replace('../', '', $uploadFilePath);
		

		$conn = new mysqli("localhost", "root", "", "FLOWERS");
		$stmt = $conn->prepare("UPDATE FLowerList SET Name = ?, Description = ?, Image = ? WHERE Id = ?");
		$stmt->bind_param("ssss", $name, $description, $finalImgPath, $id);
        $stmt->execute();

		header('Location:index.php');
		exit();
	}
?>
