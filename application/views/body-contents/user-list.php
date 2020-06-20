<div class="row hide-phone">
    <div class="col-sm-12">
        <div class="page-title-box">
            <div class="btn-group pull-right">
                <ol class="breadcrumb hide-phone p-0 m-0">
                    <li class="breadcrumb-item"><a href="#">0945 172 814 +alo Bình</a></li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="row card card-body">
	<form action="<?= base_url().'user/add' ?>" method="post">
	  <div class="form-group">
		    <label for="uname">Tên bạn mới</label>
		    <input type="text" class="form-control" name="uname" id="uname">
	  </div>
	  <div class="form-group">
	    <label for="newaccount">ID</label>
	    <input type="text" class="form-control" readonly name="newaccount" id="newaccount" value="<?= $newaccount['account'] +1 ?>">
	  </div>
	  <button type="submit" class="btn btn-primary">Oke</button>
	</form>
</div>
<?php // print_r($list_u); ?>
<div class="row card card-body">
	<div class="table-responsive ">    
        <table id="user_datatable" class="datatable table table-bordered">
            <thead>
                <tr class="text-muted">
                	<th>Leader ID </th>
                    <th>Tên</th>
                    <th>ID</th>
                    <th>Ngày Vào</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($list_u as $key_u => $u): ?>
                    <tr>
                    	<td><?= $u['leader'] ?></td>
                    	<td class="fullname-editable" 
                            data-name="fullname" 
                            data-pk="<?= $u['account'] ?>"><?= $u['fullname'] ?></td>
                    	<td><?= $u['account'] ?></td>
                    	<td><?= $u['datein'] ?></td>
                    	<td><? // $u['status'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
</div>