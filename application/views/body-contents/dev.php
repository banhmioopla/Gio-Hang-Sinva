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
<div class="container">
	<div class="row ">
		<div class="col-lg-6 card card-body">
			<ul class="list-group">
			<?php foreach ($apartment_tag as $row): ?>
					<li class="list-group-item">
						<?= $row['name'] ?>
						<span class="float-right"><i class="mdi mdi-city"></i></span>		
					</li>
			<?php endforeach ?>
			</ul>
			<form action="<?= base_url().'Dev/add_catelog/apartment_tag' ?>" method="post" accept-charset="utf-8" class="form-horizontal mt-3" role="form">
                <div class="form-group">
                        <input type="text" name="apartment_tag-new" class="form-control border border-success" placeholder="Tag mới">
                </div>
                <div class="form-group mb-0 justify-content-start row">
                    <div class="col-9">
                        <button type="submit" class="btn btn-info waves-effect waves-light">Ok</button>
                    </div>
                </div>
            </form>
		</div>
		<div class="col-lg-6 card card-body">
			<ul class="list-group">
			<?php foreach ($room_status as $row): ?>
					<li class="list-group-item">
						<?= $row['name'] ?>
						<span class="float-right"><i class="mdi mdi-city"></i></span>		
					</li>
			<?php endforeach ?>
			</ul>
			<form action="<?= base_url().'Dev/add_catelog/room_status' ?>" method="post" accept-charset="utf-8" class="form-horizontal mt-3" role="form">
                <div class="form-group">
                        <input type="text" name="room_status-new" class="form-control border border-success" placeholder="Tag mới">
                </div>
                <div class="form-group mb-0 justify-content-start row">
                    <div class="col-9">
                        <button type="submit" class="btn btn-info waves-effect waves-light">Ok</button>
                    </div>
                </div>
            </form>
		</div>
		<div class="col-lg-12 card card-body">
			<form action="dev_submit" method="get" accept-charset="utf-8">
				<select class="select2 form-control select2-multiple" multiple="multiple" multiple data-placeholder="Chọn tags...">
				<?php foreach ($apartment_tag as $row): ?>
					<option value="<?= $row['slug'] ?>"><?= $row['name'] ?></option>
				<?php endforeach ?>
                </select>
			</form>
		</div>	
	</div>
</div>
