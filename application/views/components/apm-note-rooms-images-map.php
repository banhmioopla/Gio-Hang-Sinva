<?php 
    $data['list_service'] = $list_service;
    $data['district_key'] = $district_key;
    $data['list_district_editable'] = $list_district_editable;

    $this->load->model('apartment_model');
    $list_room = $this->apartment_model->getListRoomById($item_apm['id']);

?>
<div class="row">
    <div class="col-12 p-0">
        <ul class="nav nav-tabs tabs-bordered nav-justified">
            <li class="nav-item d-block d-md-none">
                <a href="#apm_service_<?= $item_apm['id'] ?>" data-toggle="tab" aria-expanded="false" class="nav-link ">
                    <i class="mdi mdi-panda mr-2"></i>
                </a>
            </li>
            <li class="nav-item">
                <a href="#apm_note_<?= $item_apm['id'] ?>" data-toggle="tab" aria-expanded="false" class="nav-link active">
                    <i class="fa fa-sticky-note-o mr-2"></i>
                </a>
            </li>
            <li class="nav-item">
                <a href="#apm_room_<?= $item_apm['id'] ?>" data-toggle="tab" aria-expanded="true" class="nav-link">
                    <i class="dripicons-view-apps mr-2"></i>
                </a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane" id="apm_service_<?= $item_apm['id'] ?>">
            <?php 
                $this->load->view('components/apm-services-mobile', $data);
            ?>
            </div>
            <div class="tab-pane active" id="apm_note_<?= $item_apm['id'] ?>">
                <!-- CUSTOM Ghi Chú -->
                <blockquote class="blockquote blockquote-custom bg-white p-4 shadow rounded">
                    <div class="blockquote-custom-icon bg-info shadow-sm copy-text" 
                         data-clipboard-target="#note-<?= $item_apm['id']?>">
                            <i class="fa fa-quote-left text-white btn"></i>
                    </div>

                    <span class="mb-0 mt-1 font-italic note <?= $apartment_note_can_editable ?>">
                        <div id="note-<?= $item_apm['id']?>" 
                            data-name="note" 
                             data-pk="<?= $item_apm['id'] ?>">
                             <?= $item_apm['note'] =="chưa có note"? "": trim($item_apm['note']) ?>
                        </div>
                    </span>
                    <footer class="blockquote-footer pt-1 mt-1 border-top">
                        <cite title="Source Title">Not Not Tomorrow</cite>
                    </footer>
                </blockquote>
                <!-- END -->
            </div>

            <div class="tab-pane" id="apm_room_<?= $item_apm['id'] ?>">
                <div class="mb-1 <?= $add_new_room_btn ?>">
                    <button class="room-new btn-sm btn btn-success" id="room-new-<?= $item_apm['id'] ?>">
                        <i class="mdi mdi-plus-circle-outline"></i>
                    </button>
                </div>
                <div class="table-responsive">
                    <table id="room-table-<?= $item_apm['id'] ?>" class="datatable apm-room table table-bordered">
                        <thead>
                            <tr class="text-muted">
                                <th>Mã</th>
                                <th class="item-room-type">Loại</th>
                                <th class="item-room-price">Giá</th>
                                <th>m<sup>2</sup></th>
                                <th>Trống</th>
                                <th>Sắp</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Room infomation -->
                            <?php foreach ($list_room as $key_room => $item_room): ?>
                                <?php 
                                    $delete_td_room = '';
                                    if($list_district_editable != null)
                                    {
                                            $delete_td_room = (in_array($district_key, $list_district_editable) != 0 AND $editable) ? set_btn_delete('room',$item_room['id']):'';
                                    }
                                 ?>
                                <tr id="room-<?= $item_room['id'] ?>">
                                    <td class="apm-room-item" id="maphong-<?= $item_room['id'] ?>" <?= $contenteditable ?>>
                                        <?= $item_room['maphong'] ?>
                                    </td>
                                    <td class="apm-room-item" id="id_type-<?= $item_room['id'] ?>" <?= $contenteditable ?>>
                                        <?= $item_room['id_type'] ?>
                                    </td>
                                    <td class="apm-room-item" id="price-<?= $item_room['id'] ?>" <?= $contenteditable ?> class="font-weight-bold">
                                        <?= $item_room['price'] ?>
                                    </td>
                                    <td class="apm-room-item" id="square-<?= $item_room['id'] ?>" <?= $contenteditable ?>>
                                        <?= $item_room['square'] ?>
                                    </td>
                                    <td class="font-weight-bold text-info <?= $room_status_can_editable ?>" id="id_status-<?= $item_room['id'] ?>" class="<?= $room_status_can_editable ?>">
                                        <?= $item_room['id_status'] ?>
                                    </td>
                                    <td class="apm-room-item" id="saptrong-<?= $item_room['id'] ?>" <?= $contenteditable ?>>
                                        <?= $item_room['saptrong'] ?>
                                    </td>
                                    <td>
                                        <?= $delete_td_room ?>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="tab-pane" id="apm_images<?= $item_apm['id'] ?>">
                <p><i>Tính năng này chưa có</i></p>
            </div>

            <div class="tab-pane" id="apm_map<?= $item_apm['id'] ?>">
                <p><i>Tính năng này cũng chưa có</i></p>
            </div>
            <hr>
            <div class="row container float-right">
                <a data-toggle="collapse" data-parent="#accordion" href="#apm_<?= $item_apm['id'] ?>" class="col-2 p-0 justify-content-center " aria-expanded="true" aria-controls="collapseOne">
                    <button type="button" class="btn btn-custom btn-sm btn-rounded waves-light waves-effect">
                        <i class=" dripicons-chevron-up align-middle"></i>
                    </button>
                </a>
            </div>
        </div>
    </div>
</div>
<!--endrow-->