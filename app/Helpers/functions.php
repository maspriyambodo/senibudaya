<?php

use Illuminate\Support\Facades\Cookie;

function searchFilter($option) {
    echo "<input type=\"text\" id=\"keyword\" name=\"keyword\" value=\"" . request()->cookie('keyword') . "\" class=\"form-control\" placeholder=\"search\">
		<input type=\"hidden\" id=\"filter\" name=\"filter\">";
    if (count($option) > 0)
        echo "<button class=\"btn btn-light btn-sm dropdown-toggle dropdown-filter\" type=\"button\" data-toggle=\"dropdown\">
		<i class=\"fas fa-filter\"></i> 
		</button>";
    echo "<div class=\"dropdown-menu filter\">";
    foreach ($option as $id => $data) {
        echo "<a id=\"" . $id . "\" class=\"dropdown-item\" href=\"#\"><i id=\"i-" . $id . "\" class=\"far fa-square mr-2\"></i> " . $data . "</a>";
    }
    echo "</div>
		<script>
		$('.dropdown-menu.filter a').click(function (e) {
		var text = $('#filter').val();
		var id = $(this).prop('id');
		if($(this).attr('class').match('selected') == null){
		$(this).addClass('selected');
		$('#i-' + id).removeClass('fa-square').addClass('fa-check-square');
		text+= id + ',';
		}else{
		$(this).removeClass('selected');
		$('#i-' + id).removeClass('fa-check-square').addClass('fa-square');
		text= text.replace(id + ',', '');
		}
		$('#filter').val(text);
		e.stopPropagation();
		});
		</script>";
}

function dataTable($url, $column = array(), $scrollx = false, $fixed = 0, $paging = true) {
    $id = isset($column['id']) ? $column['id'] : 'data';
    $align = isset($column['align']) ? $column['align'] : array();
    $order = isset($column['order']) ? $column['order'] : array();
    $data = isset($column['data']) ? $column['data'] : array();
    $render = isset($column['render']) ? $column['render'] : array();
    $nosort = isset($column['nosort']) ? $column['nosort'] : array();

    $left = $right = $center = array();
    foreach ($align as $key => $val) {
        if ($val == 'left')
            $left[] = $key;
        if ($val == 'right')
            $right[] = $key;
        if ($val == 'center')
            $center[] = $key;
    }

    echo "<script>";
    echo "$(function() {";
    echo "var dTable = $('#" . $id . "').DataTable({";
    echo "processing: true,";
    echo "serverSide: true,";
    echo "paging: true,";
    echo "ordering: true,";
    echo "deferRender: true,";
    echo "info: true,";
    echo "ajax: {";
    echo "url: '" . $url . "',";
    echo "data: function (d) {";
    echo "d.keyword = $('#keyword').val();";
    echo "d.filter = $('#filter').val();";
    echo "d.kategori = $('#kategori').val();";
    echo "d.sub = $('#sub').val();";
    echo "d.year = $('#year').val();";
    echo "d.month = $('#month').val();";
    echo "}";
    echo "},";
    echo "order: [[0, 'asc']],";
    echo "columnDefs: [";
    echo "{ className: 'text-center text-nowrap', targets: [" . implode(",", $center) . "] },";
    echo "{ className: 'text-right text-nowrap', targets: [" . implode(",", $right) . "] },";
    echo "{ orderable: false, targets: [" . implode(",", $nosort) . "] }";
    echo "],";
    echo "columns: [";
    echo "{";
    echo "render: function (data, type, row, meta) {";
    echo "return meta.row + meta.settings._iDisplayStart + 1;";
    echo "},";
    echo "},";
    foreach ($data as $field) {
        echo "{ data: '" . $field . "' },";
    }
    echo "],";
    echo "displayStart: " . (empty(request()->cookie('start')) ? 0 : request()->cookie('start')) . ",";
    echo "pageLength: " . (empty(request()->cookie('length')) ? 10 : request()->cookie('length')) . ",";
    echo "rowCallback: function(row, data) {";
    echo "$(row).unbind('click');";

    //edit
    echo "$(row).on('click','#edit', function () {";
    echo "$.fn.start_length(";
    echo "dTable.page.info()['start'],";
    echo "dTable.page.info()['length']";
    echo ");";
    echo "$.fn.edit(data);";
    echo "});";

    //update
    echo "$(row).on('click','#update', function () {";
    echo "$.fn.start_length(";
    echo "dTable.page.info()['start'],";
    echo "dTable.page.info()['length']";
    echo ");";
    echo "$.fn.update(data.id);";
    echo "});";

    //delete
    echo "$(row).on('click','#del', function () {";
    echo "$.fn.start_length(";
    echo "dTable.page.info()['start'],";
    echo "dTable.page.info()['length']";
    echo ");";
    echo "$.fn.del(data.id);";
    echo "});";

    echo "},";

    //input
    echo "drawCallback: function() {";
    if ($scrollx) {
        echo "$('#spacer').remove();";
        echo "if(dTable.page.info()['page'] == dTable.page.info()['pages'] - 1){";
        echo "if(dTable.page.info()['recordsDisplay'] % dTable.page.info()['length'] < 4){";
        echo "$('#" . $id . "').append('<div id=\"spacer\" style=\"height:' + ((5-dTable.page.info()['recordsDisplay']) * 35) + 'px;\">&nbsp;</div>');";
        echo "}";
        echo "}";
    }
    echo "$('[data-toggle=\"popover\"]').popover({";
    echo "container: 'body'";
    echo "});";
    echo "$('#input').on('click', function () {";
    echo "$.fn.start_length(";
    echo "dTable.page.info()['start'],";
    echo "dTable.page.info()['length']";
    echo ");";
    echo "$.fn.input();";
    echo "});";
    echo "},";

    //reset
    echo "initComplete: function() {";
    echo "$.fn.start_length(0,0,'','');";
    echo "},";

    
    echo "dom: `<'row'<'col-sm-6 text-left'><'col-sm-6 text-right'B>>
                <'row'<'col-sm-12'tr>>
                <'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7 dataTables_pager'lp>>`,";
    if ($scrollx)
        echo "scrollX: true,";
    if ($fixed > 0) {
        echo "fixedColumns:{";
        echo "leftColumns: " . $fixed;
        echo "}";
    }
    echo "});";
    echo "$('.dropdown-menu.filter a').click(delay(function (e) {";
    echo "dTable.draw();";
    echo "e.preventDefault();";
    echo "}, 500));";
    echo "$('#keyword').keyup(delay(function (e) {";
    echo "dTable.draw();";
    echo "e.preventDefault();";
    echo "}, 500));";
    echo "$('#kategori').change(delay(function (e) {";
    echo "dTable.draw();";
    echo "e.preventDefault();";
    echo "}, 50));";
    echo "$('#sub').change(delay(function (e) {";
    echo "dTable.draw();";
    echo "e.preventDefault();";
    echo "}, 50));";
    echo "$('#year').change(delay(function (e) {";
    echo "dTable.draw();";
    echo "e.preventDefault();";
    echo "}, 50));";
    echo "$('#month').change(delay(function (e) {";
    echo "dTable.draw();";
    echo "e.preventDefault();";
    echo "}, 50));";
    echo "$('#reload').click(delay(function (e) {";
    echo "dTable.draw();";
    echo "e.preventDefault();";
    echo "}, 50));";
    echo "});";
    echo "</script>";
}

function deleteModal($page) {
    echo "<div class=\"modal fade\" id=\"delete\" role=\"dialog\">
		<div class=\"modal-dialog modal-dialog-centered\" role=\"document\">
		<div class=\"modal-content\">
		<form action=\"" . $page . "/destroy\" method=\"post\">
		<input type=\"hidden\" name=\"_token\" value=\"" . csrf_token() . "\">
		<div class=\"modal-header\">
		<h5 class=\"modal-title\">Hapus Data</h5>
		</div>
		<div class=\"modal-body\">
		<input id=\"dt\" name=\"dt\" type=\"hidden\">
		Anda yakin akan menghapus data ini ?
		</div>
		<div class=\"modal-footer bg-whitesmoke br\">
		<button type=\"button\" class=\"btn btn-light w-25\" data-dismiss=\"modal\">Tidak</button>
		<button type=\"submit\" class=\"btn btn-success w-25 ml-1\">Ya</button>
		</div>
		</form>
		</div>
		</div>
		</div>";
}

function noEmpty($text) {
    echo "required=\"\" oninvalid=\"" . $text . "\"";
}

function alertInfo() {
    echo "<div id=\"alert\" class=\"alert alert-info alert-dismissible\">
		<div class=\"alert-body\">
		<button class=\"close\" data-dismiss=\"alert\">
		<span>&times;</span>
		</button>
		<i id=\"ico\" class=\"fas fa-info-circle\"></i>
		<span id=\"info\"></span>
		</div>
		</div>";
}

function alertContent() {
    echo "<div id=\"alert\" class=\"alert alert-success alert-dismissible d-none\">
		  <small id=\"info\">&nbsp;</small>
		</div>";
}

function getBulan($m) {
    $name = array('', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');

    return $name[intval($m)];
}

function getLink($text) {
    $text = strtolower($text);
    $text = str_replace(" ", "-", $text);
    return preg_replace('/[^a-zA-Z0-9-]/', '', $text);
}

function clean($str) {
    $str = utf8_decode($str);
    $str = strip_tags($str);
    $str = html_entity_decode($str);

    $str = trim($str);
    return $str;
}

function trunc($str, $cnt) {
    $text = explode(' ', $str);
    if (count($text) > $cnt && $cnt > 0)
        $str = implode(' ', array_slice($text, 0, $cnt));

    return $str;
}

function slug($str) {
    return str_replace(' ', '-', strtolower(trim($str)));
}

function debug($text) {
    echo "<pre>";
    print_r($text);
    echo "</pre>";
    #die();
}

function enkrip($text) {
    $text2 = Crypt::encryptString($text);
    $encryption = str_replace('/', '%2F', $text2);
    return $encryption;
}

function dekrip($text){
    $text2= str_replace('%2F', '/', Crypt::decryptString($text));
    return $text2;
}