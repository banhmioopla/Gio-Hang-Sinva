<?php 

function set_btn_delete($name = null, $id = null)
{
	if($id == null or $name == null) return;
	
	$view = '<div class="'.$name.'-delete text-center">
                <button id="'.$name.'-delete-'.$id.'" class=" btn-sm btn btn-danger">
                <i class="mdi mdi-delete-circle"></i>
                </button>
                <div id="confirm-'.$name.'-delete-'.$id.'"></div>
            </div>';
    return $view;
}

function set_btn_delete_confirm()
{

	$view = '<button class="confirm-delete btn-sm btn btn-warning"><i class="mdi mdi-comment-check-outline"></i></button>';
    return $view;
}

function is_product_manager($current_district, $arr_districtCURD, $return_string = '')
{
    $success = false;
    if($arr_districtCURD == null) return '';
    $success = in_array($current_district, $arr_districtCURD);

    if($success === true)
    {
        return $return_string;
    }
    return '';
}

function data_class_processing($data, $district_key, $list_district_editable)
{
    $data['district_key'] = $district_key;
    $data['list_district_editable'] = $list_district_editable;

    $data['address_can_editable'] = is_product_manager(
                                            $district_key, 
                                            $list_district_editable,
                                            'address-editable ');
    $data['contenteditable'] = '';
    $data['apartment_note_can_editable'] = '';
    $data['service_info_can_editable'] = '';
    $data['room_status_can_editable'] = '';
    $data['apartment_tag'] = 'd-none';
    $data['apartment_can_delete'] = is_product_manager(
                                            $district_key, 
                                            $list_district_editable,'true') =='true'?'':'d-none';
    $data['apartment_can_add'] = is_product_manager(
                                            $district_key, 
                                            $list_district_editable, 'true') == 'true'? '':'d-none';
    $data['service_info_can_editable'] = is_product_manager(
                                                $district_key, 
                                                $list_district_editable,'service-info-editable');
    $data['add_new_room_btn'] = is_product_manager(
                                            $district_key, 
                                            $list_district_editable, 'true') == 'true'? '':'d-none';
    $data['room_status_can_editable'] = is_product_manager(
                                            $district_key, 
                                            $list_district_editable,'room-status');
    $data['contenteditable'] = is_product_manager(
                                            $district_key, 
                                            $list_district_editable,'contenteditable="true"');
    $data['apartment_tag'] = is_product_manager(
                                            $district_key, 
                                            $list_district_editable,
                                            'apartment-tag');
    $data['apartment_note_can_editable'] = is_product_manager(
                                            $district_key, 
                                            $list_district_editable,
                                            'note-editable');
    $data['power_sale'] = is_product_manager(
                            $district_key, $list_district_editable, 'true')=='true'?'d-none':'';
    $data['power_lead'] = is_product_manager(
                            $district_key, $list_district_editable, 'true') =='true'?'':'d-none';
    return $data;
}


?>