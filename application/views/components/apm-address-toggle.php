<a  data-toggle="collapse"
	data-parent="#accordion" 
	href="#apm_<?= $item_apm['id'] ?>" 
	class="col-2 col-md-1 p-0 justify-content-center" 
	aria-expanded="true" 
	aria-controls="collapseOne">

	<button type="button" class="btn btn-custom btn-sm btn-rounded waves-light waves-effect">
	    <i class=" dripicons-chevron-down align-middle"></i>
	</button>
</a>

<div class="col-7 col-md-7 m-md-1 p-1 d-md-inline header-title font-weight-bold text-dark address"  style="line-height: 16px; ">
	<span id="apm_info_<?= $item_apm['id'] ?>" 
		  data-name="address" 
		  data-pk="<?= $item_apm['id'] ?>" 
		  class="address-item-detail"><?= $item_apm['address'] ?></span>
</div>

<span class="col-1 col-md-1 offset-1 p-0 offset-md-2 switchery-demo" style="line-height: 30px">
	<input type="checkbox" 
	       checked data-plugin="switchery" 
	       data-color="#ff5d48"
	       data-size="small" class="float-right" />

</span>
