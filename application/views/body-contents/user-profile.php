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

<div class="form-inline row justify-content-center">
    <div class="form-group mx-3">
    	<?php // print_r($this->session->account); ?>
        <label for="change-password" class="sr-only">Password</label>
        <input type="hidden" name="user_id" class="user_id" id="<?= $user_id ?>">
        <input type="password" class="form-control m-1 w-100" id="change-password" placeholder="Password Mới">
        <button class=" confirm-change-pw btn btn-primary m-1 w-100">Xác nhận</button>
    </div>
    
</div>
