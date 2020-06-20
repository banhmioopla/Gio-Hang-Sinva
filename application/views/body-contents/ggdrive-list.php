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

<div class="col-md-12">
    <div class="card-box">
         <?php foreach($list_linkdrive['googledrive'] as $item => $container):?>
            <a href="<?= $container['link'] ?>" target="blank">
                <button type="button" class="btn btn-custom btn-rounded waves-light m-2 waves-effect">
                    <?= $container['quan'] ?>
                </button>
            </a>
         <?php endforeach; ?>
    </div>
</div>

<div class="col-md-12 row">
    <div class="file-man-box card card-body col-md-2 col-12 m-1">
        <div class="file-img-box">
            <img src="<?= base_url() ?>templates/example/assets/images/file_icons/doc.svg" alt="icon">
        </div>
        <a href="<?= base_url() ?>docs/Coc-Updated.pdf" class="file-download"><i class="mdi mdi-download"></i> </a>
        <div class="file-man-title">
            <h5 class="mb-0 text-overflow">Cọc</h5>
        </div>
    </div>
</div>

<!-- <div class="col-md-12"></div> put component here -->
<div class="col-md-12 mt-2" style="height: 550px">
    <div class="card-box h-100">
        <div  class="gmaps h-100">
            <!-- <iframe width="100%" height="100%" src="https://docs.google.com/spreadsheets/d/1x39nUW-jwdFzVx77cwMI-epkNC34z87trzDbKIoRdU8/edit?fbclid=IwAR1WbNfUEjGJzitBEYSe0Xo8UGMjItvXYSfGrR84s7w-e11ptXBQdbTy5os#gid=2058118353" frameborder="0"></iframe> -->
            <iframe  width="100%" height="100%" src="https://docs.google.com/spreadsheets/d/e/2PACX-1vS7uJ8FabrwE0lWBsJeCFcxMTQlKa8xx53pqlDn_eDSsvGxODpeHkTtECZysYETFd5FijQChrLVOrcE/pubhtml?widget=true&amp;headers=false"></iframe>
<!-- <div id="calendar"></div> -->
        </div>
    </div>
</div>