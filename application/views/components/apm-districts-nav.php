<ul class="nav nav-pills nav-justified pull-in">
	<?php foreach ($list_district as $key => $value): ?>
		<li class="nav-item ">
            <a href="#quan_<?= $key ?>" data-toggle="tab" aria-expanded="false" class="text-dark  nav-link <?= $key==$district_active?'active':'' ?>"> <?= $value ?> </a>
        </li>
	<?php endforeach; ?>
</ul> 