<div>
    @include('user.header')
    <?php
        session_start();
        $id = $_GET["id"];
        $data = $_SESSION['employees'][$id];
    ?>

    <div id="editEmployeeModal" class="container">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" action=<?php echo('"/employee/update/submit?id='.$id.'"') ?>>
                    @csrf
                    @method('PATCH')
                    <div class="modal-header">						
                        <h4 class="modal-title">Edit Employee</h4>
                    </div>
                    <div class="modal-body">					
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" required value="<?php echo $data['name']; ?>">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" required value="<?php echo $data['email']; ?>">
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <textarea class="form-control" name="address" required ><?php echo $data['address']; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label>Phone</label>
                            <input type="text" class="form-control" name="phone" required value="<?php echo $data['phone']; ?>">
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
</div>
