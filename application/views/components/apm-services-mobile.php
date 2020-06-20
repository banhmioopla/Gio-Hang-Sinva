<div class="row mb-2">
    <div class="col-12 col-lg-6 offset-lg-3">
        <div id="apm_service_info_mobile<?= $item_apm['id'] ?>" class="carousel slide " data-ride="carousel" data-interval="false">
                <div class="carousel-inner">
                    <?php for ($i= 0; $i < count($list_service["list_service"]); $i+= 5): ?>
                            <?php 
                                $service_info_editable = '';
                                if($list_district_editable != null)
                                {
                                    $service_info_editable = in_array($district_key, $list_district_editable) != 0 ? 'service-info-editable':'';
                                }
                                
                             ?>
                            <div class="carousel-item border rounded border-warning <?= $list_service['list_service'][$i]['key_service'] == 'dien'? 'active':'' ?>">
                                <ul class="list-group <?= $service_info_editable ?>">
                                    <li class="list-group-item "><?= $list_service["list_service"][$i]["name"] ?>  <br>
                                        <span class="float-right service-info ">
                                            <div 
                                                data-name="<?= $list_service["list_service"][$i]["key_service"] ?>" 
                                                data-pk="<?= $item_apm['id'] ?>">
                                                 <?= $item_apm[$list_service["list_service"][$i]["key_service"]] ?>

                                            </div>
                                        </span>
                                    </li>
                                    <li class="list-group-item"><?= $list_service["list_service"][$i+1]["name"] ?>  <br>
                                        <span class="float-right service-info">
                                            <div
                                            data-name="<?= $list_service["list_service"][$i+1]["key_service"] ?>" 
                                            data-pk="<?= $item_apm['id'] ?>">
                                                <?= $item_apm[$list_service["list_service"][$i+1]["key_service"]] ?>
                                                </div>
                                        </span>
                                    </li>
                                    <li class="list-group-item"><?= $list_service["list_service"][$i+2]["name"] ?>  <br>
                                        <span class="float-right service-info">
                                            <div
                                            data-name="<?= $list_service["list_service"][$i+2]["key_service"] ?>" 
                                            data-pk="<?= $item_apm['id'] ?>">
                                                <?= $item_apm[$list_service["list_service"][$i+2]["key_service"]] ?>
                                            </div>
                                        </span>
                                    </li>
                                    <li class="list-group-item"><?= $list_service["list_service"][$i+3]["name"] ?>  <br>
                                        <span class="float-right service-info">
                                            <div
                                            data-name="<?= $list_service["list_service"][$i+3]["key_service"] ?>" 
                                            data-pk="<?= $item_apm['id'] ?>">
                                                <?= $item_apm[$list_service["list_service"][$i+3]["key_service"]] ?>
                                            </div>
                                        </span>
                                    </li>
                                    <li class="list-group-item"><?= $list_service["list_service"][$i+4]["name"] ?>  <br>
                                        <span class="float-right service-info">
                                            <div
                                            data-name="<?= $list_service["list_service"][$i+4]["key_service"] ?>" 
                                            data-pk="<?= $item_apm['id'] ?>">
                                                <?= $item_apm[$list_service["list_service"][$i+4]["key_service"]] ?>
                                            </div>
                                        </span>
                                    </li>
                                </ul>
                            </div>
                    <?php endfor; ?>
                </div>
                <a class="carousel-control-prev" href="#apm_service_info_mobile<?= $item_apm['id'] ?>" role="button" data-slide="prev">
                    <span class="mdi mdi-chevron-double-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#apm_service_info_mobile<?= $item_apm['id'] ?>" role="button" data-slide="next">
                    <span class="mdi mdi-chevron-double-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            
            
                
            </div>
            
    </div>
</div>
