<?php 
$data['apartment_note_can_editable'] = $apartment_note_can_editable;
$data['add_new_room_btn'] = $add_new_room_btn;
$data['contenteditable'] = $contenteditable;
$data['room_status_can_editable'] = $room_status_can_editable;
$data['service_info_can_editable'] = $service_info_can_editable;


 ?>
<div id="apm_<?= $item_apm['id'] ?>" class="collapse address-detail" role="tabpanel">
	<div class="card-body">
		<div class="d-none d-md-block">
			<?php 
				$this->load->view('components/apm-services'); 
			?>
		</div>
		<?php
			$this->load->view('components/apm-note-rooms-images-map',$data); 
		?>
	</div>
</div>