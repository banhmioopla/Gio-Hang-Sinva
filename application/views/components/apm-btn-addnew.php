<div class="btn-list <?= $apartment_can_add ?>">
	<form action="<?= base_url().'Apartment/Add/'.$district_key ?>" method="post">
		<button type="submit" class="btn-sm btn btn-success add-new-apm col-2 col-md-1">
			<i class="mdi mdi-plus-circle-outline"></i>
		</button>
	</form>
</div>