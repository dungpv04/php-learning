<div>
    <?php 

    if (!isset($_SESSION['employees'])) {
        $_SESSION['employees'] = [];
    }
    ?>
    @include('user.header')
    @include('user.create')

    <main>
    <div class="container-xl">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-6">
                            <h2><b>Quản lí nhân viên</b></h2>
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
                        <?php foreach ($_SESSION['employees'] as $record): ?>
                            <tr>
                                <td><?= htmlspecialchars($record['name']) ?></td>
                                <td><?= htmlspecialchars($record['email']) ?></td>
                                <td><?= htmlspecialchars($record['address']) ?></td>
                                <td><?= htmlspecialchars($record['phone']) ?></td>
                                <td>
                                <?php echo('<a href="employee/update?id='.$record['id'].'"class="edit"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>'); ?>
                                
                                <form action="{{ route('employee.delete', ['id' => $record['id']]) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="delete" style="border: none; background: none;">
                                        <i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i>
                                    </button>
                                </form>                                
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>        
    </div>

    </main>

    @include('user.footer')

</div>
