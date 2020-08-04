@extends('System.Layouts.Master')
@section('title')
	Edit Menu Item
@endsection
@section('css')
<style type="text/css">
    .cf:after {
        visibility: hidden;
        display: block;
        font-size: 0;
        content: " ";
        clear: both;
        height: 0;
    }

    * html .cf {
        zoom: 1;
    }

    *:first-child+html .cf {
        zoom: 1;
    }

    html {
        margin: 0;
        padding: 0;
    }

    body {
        font-size: 100%;
        margin: 0;
        padding: 0;
        font-family: 'Helvetica Neue', Arial, sans-serif;
    }

    h1 {
        font-size: 1.75em;
        margin: 0 0 0.6em 0;
    }

    a {
        color: #2996cc;
    }

    a:hover {
        text-decoration: none;
    }

    p {
        line-height: 1.5em;
    }

    .small {
        color: #666;
        font-size: 0.875em;
    }

    .large {
        font-size: 1.25em;
    }

    / * Nestable */ .dd {
        position: relative;
        display: block;
        margin: 0;
        padding: 0;
        max-width: 600px;
        list-style: none;
        font-size: 13px;
        line-height: 20px;
    }

    .dd-list {
        display: block;
        position: relative;
        margin: 0;
        padding: 0;
        list-style: none;
    }

    .dd-list .dd-list {
        padding-left: 30px;
    }

    .dd-collapsed .dd-list {
        display: none;
    }

    .dd-item,
    .dd-empty,
    .dd-placeholder {
        display: block;
        position: relative;
        margin: 0;
        padding: 0;
        min-height: 20px;
        font-size: 12px;
        line-height: 20px;
        width: 300px;
    }

    .dd-handle {
        display: block;
        height: 100%;
        margin: 5px 0;
        padding: 5px 10px;
        color: #333;
        text-decoration: none;
        font-weight: bold;
        border: 1px solid #ccc;
        background: #fafafa;
        background: -webkit-linear-gradient(top, #fafafa 0%, #eee 100%);
        background: -moz-linear-gradient(top, #fafafa 0%, #eee 100%);
        background: linear-gradient(top, #fafafa 0%, #eee 100%);
        -webkit-border-radius: 3px;
        border-radius: 3px;
        box-sizing: border-box;
        -moz-box-sizing: border-box;
    }

    .dd-handle:hover {
        color: #2ea8e5;
        background: #fff;
    }

    .dd-item>button {
        display: block;
        position: relative;
        cursor: pointer;
        float: left;
        width: 25px;
        height: 20px;
        margin: 5px 0;
        padding: 0;
        text-indent: 100%;
        white-space: nowrap;
        overflow: hidden;
        border: 0;
        background: transparent;
        font-size: 12px;
        line-height: 1;
        text-align: center;
        font-weight: bold;
    }

    .dd-item>button:before {
        content: '+';
        display: block;
        position: absolute;
        width: 100%;
        text-align: center;
        text-indent: 0;
    }

    .dd-item>button[data-action="collapse"]:before {
        content: '-';
    }

    .dd-placeholder,
    .dd-empty {
        margin: 5px 0;
        padding: 0;
        min-height: 30px;
        background: #f2fbff;
        border: 1px dashed #b6bcbf;
        box-sizing: border-box;
        -moz-box-sizing: border-box;
    }

    .dd-empty {
        border: 1px dashed #bbb;
        min-height: 100px;
        background-color: #e5e5e5;
        background-image: -webkit-linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff),
            -webkit-linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff);
        background-image: -moz-linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff),
            -moz-linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff);
        background-image: linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff),
            linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff);
        background-size: 60px 60px;
        background-position: 0 0, 30px 30px;
    }

    .dd-dragel {
        position: absolute;
        pointer-events: none;
        z-index: 9999;
    }

    .dd-dragel>.dd-item .dd-handle {
        margin-top: 0;
    }

    .dd-dragel .dd-handle {
        -webkit-box-shadow: 2px 4px 6px 0 rgba(0, 0, 0, .1);
        box-shadow: 2px 4px 6px 0 rgba(0, 0, 0, .1);
    }

    / * Nestable Extras */ .nestable-lists {
        display: block;
        clear: both;
        padding: 30px 0;
        width: 100%;
        border: 0;
        border-top: 2px solid #ddd;
        border-bottom: 2px solid #ddd;
    }

    #nestable-menu {
        padding: 0;
        margin: 20px 0;
    }

    #nestable-output,
    #nestable2-output {
        width: 100%;
        height: 7em;
        font-size: 0.75em;
        line-height: 1.333333em;
        font-family: Consolas, monospace;
        padding: 5px;
        box-sizing: border-box;
        -moz-box-sizing: border-box;
    }

    #nestable2 .dd-handle {
        color: #fff;
        border: 1px solid #999;
        background: #bbb;
        background: -webkit-linear-gradient(top, #bbb 0%, #999 100%);
        background: -moz-linear-gradient(top, #bbb 0%, #999 100%);
        background: linear-gradient(top, #bbb 0%, #999 100%);
    }

    #nestable2 .dd-handle:hover {
        background: #bbb;
    }

    #nestable2 .dd-item>button:before {
        color: #fff;
    }

    @media only screen and (min-width: 700px) {

        .dd {
            float: left;
            width: 48%;
        }

        .dd+.dd {
            margin-left: 2%;
        }

    }

    .dd-hover>.dd-handle {
        background: #2ea8e5 !important;
    }

    / * Nestable Draggable Handles */ .dd3-content {
        display: block;
        height: 30px;
        margin: 5px 0;
        padding: 5px 10px 5px 40px;
        color: #333;
        text-decoration: none;
        font-weight: bold;
        border: 1px solid #ccc;
        background: #fafafa;
        background: -webkit-linear-gradient(top, #fafafa 0%, #eee 100%);
        background: -moz-linear-gradient(top, #fafafa 0%, #eee 100%);
        background: linear-gradient(top, #fafafa 0%, #eee 100%);
        -webkit-border-radius: 3px;
        border-radius: 3px;
        box-sizing: border-box;
        -moz-box-sizing: border-box;
    }

    .dd3-content:hover {
        color: #2ea8e5;
        background: #fff;
    }

    .dd-dragel>.dd3-item>.dd3-content {
        margin: 0;
    }

    .dd3-item>button {
        margin-left: 30px;
    }

    .dd3-handle {
        position: absolute;
        margin: 0;
        left: 0;
        top: 0;
        cursor: pointer;
        width: 30px;
        text-indent: 100%;
        white-space: nowrap;
        overflow: hidden;
        border: 1px solid #aaa;
        background: #ddd;
        background: -webkit-linear-gradient(top, #ddd 0%, #bbb 100%);
        background: -moz-linear-gradient(top, #ddd 0%, #bbb 100%);
        background: linear-gradient(top, #ddd 0%, #bbb 100%);
        border-top-right-radius: 0;
        border-bottom-right-radius: 0;
    }

    .dd3-handle:before {
        content: '≡';
        display: block;
        position: absolute;
        left: 0;
        top: 3px;
        width: 100%;
        text-align: center;
        text-indent: 0;
        color: #fff;
        font-size: 20px;
        font-weight: normal;
    }

    .dd3-handle:hover {
        background: #ddd;
    }

    / * Socialite */ .socialite {
        display: block;
        float: left;
        height: 35px;
    }

   .card-body{
	   max-height: 60vh;
	   overflow-y: scroll;
   }
    .list-unstyled {
        padding-left: 0;
        list-style: none;
        overflow-y: auto;
        border-bottom: 1px solid #00000029;
        padding-bottom: 10px;
        padding-top: 10px;
        margin-bottom: 10px;

    }

    .div-move {
        width: 100%;
        overflow-y: auto;
        overflow-x: auto;
        border-bottom: 2px solid #00000029;
    }

    .div-move::-webkit-scrollbar-track,
    .card-body::-webkit-scrollbar-track {
        -webkit-box-shadow: inset 0 0 6px rgba(5, 90, 49, 0.19);
        background-color: #F5F5F5;
    }

    .div-move::-webkit-scrollbar,
    .card-body::-webkit-scrollbar {
        width: 5px;
    background-color: #F5F5F5;
    }

    .div-move::-webkit-scrollbar-thumb,
    .card-body::-webkit-scrollbar-thumb {
        background-color: rgba(5, 90, 49, 0.48);
    }

    .slimScrollBar {
        max-width: 7px;
    }
    .panel-collapse .list-unstyled label{
	    font-weight: 400;
	    text-transform: uppercase;
	    font-size: 0.8rem;
	    margin-bottom: 5px;
    }
</style>
@endsection
@section('content')
<div class="container-fluid">

    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <h4 class="page-title">Edit Menu</h4>
            </div>
        </div>
    </div>
    <!-- end page title end breadcrumb -->

   
    <div class="row">
        <div class="col-md-12 col-lg-4 menu-d">
            <div class="element-wrapper">
                <div class="element-box">
                    <div class="card card-default">
                        <div class="card-header">
                            <h5 class="card-title text-uppercase mb-0">
                                Service
                            </h5>
                        </div>
                        <div id="category" class="panel-collapse card-body pt-0 pb-0">
                            <ul class="list-unstyled">
                                @foreach($service as $ser)
                                <li>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" data-category_id="{{$ser->id}}" name="service[]"
                                                value="{{$ser->id}}">
                                            {{$ser->title}}
                                        </label>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="form-buttons-w p-3">
                            <a href="javascript:addItemMenu('category');" data-action="service"
                                class="click-edit-menu btn btn-primary">Add Menu</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-lg-4 menu-d">
            <div class="element-wrapper">
                <div class="element-box">
                    <div class="card card-default">
                        <div class="card-header">
                            <h5 class="panel-title mb-0 text-uppercase">
                                Product
                            </h5>
                        </div>
                        <div id="news" class="panel-collapse card-body pt-0 pb-0">
                            <ul class="list-unstyled">
                                @foreach($product as $pro)
                                <li>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" data-news_id="{{$pro->id}}" name="product[]"
                                                value="{{$pro->id}}">
                                            {{$pro->name}}
                                        </label>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="form-buttons-w p-3">
                            <a href="javascript:void(0);" data-action="product"
                                class="click-edit-menu btn btn-primary">Add Menu</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12  col-lg-4 menu-d cf nestable-lists">
            <div class="row">
                <div class="col-md-12">
                    <div class="nested-list dd card " id="nestable" style="width:100%;max-width: 420px;">
                        <div class="card-header">
                            <h5 class="card-title">
                                Menu
                            </h5>
                        </div>
                        <div class="card-body pt-1 pb-0">
	                        <ol class="dd-list div-move">
	                            <?php $i = 1; ?>
	                            @foreach($menu as $item)
	                            <li class="dd-item" data-order="{{$i}}" data-id="{{$item->id}}" data-name="{{$item->name}}" data-name_en="{{$item->name_en}}"
	                                data-category_id="{{$item->category_id}}" data-news_id="{{$item->news_id}}">
	                                <div class="dd-handle">{{$item->name}}</div>
	                                <?php $i++; ?>
	                                @if(count($item->menu_child))
	                                <ol class="dd-list">
	                                    @foreach($item->menu_child as $child)
	                                    <li class="dd-item" data-order="{{$i}}" data-id="{{$child->id}}"
	                                        data-name="{{$child->name}}" data-name_en="{{$item->name_en}}" data-category_id="{{$child->category_id}}"
	                                        data-news_id="{{$child->news_id}}">
	                                        <div class="dd-handle">{{$child->name}}</div>
	                                    </li>
	                                    <?php $i++; ?>
	                                    @endforeach
	                                </ol>
	                                @endif
	                            </li>
	                            @endforeach
	                        </ol>
                        </div>
		                <div class="col-md-12 p-0">
		                    <div class="form-buttons-w p-3">
		                        <button id="btn-submit" class="test btn btn-primary" value="">Update</button>
		                    </div>
		                    <li class="dd-item dd-item-clone d-none" data-value="" data-name="" data-name_en="" data-order="" data-id=""
		                        data-category_id="" data-news_id="">
		                        <div class="item-wrap dd-handle"></div>
		                    </li>
		                </div>
                    </div>
                </div>
            </div>


        </div>
    </div>

</div>
<p class="class-test"></p>
@endsection

@section('script')
<script type="text/javascript">
    $(document).ready(function()
    {
        $('.click-edit-menu').on('click', function(){
            $action = $(this).data('action');
            alert($action);
            // addItemMenu($action);
        })
    });
    function addItemMenu(type) {
        // alert(11);
        $('#'+type+' .checkbox input:checked').each(function () {
            var value = $(this).attr('value');
            var category = $(this).data('category_id');
            var news = $(this).data('news_id');
            var name = $(this).parents('label').text().trim();
            // alert(category);
            // return;
            // CHECK ITEM EXIST
            // if ($('li[data-value=' + value + ']').length) {
            //     $('#'+type+' input[type=checkbox]').prop('checked', false);
            //     return
            // }
            var itemClone = $('li.dd-item-clone').clone();
            itemClone.attr('data-id', value);
            itemClone.attr('data-name', name);
            itemClone.attr('data-news_id', news);
            itemClone.attr('data-category_id', category);
            // itemClone.attr('data-type', type);
            itemClone.find('.item-wrap').text(name);
            // itemClone.find('.item-name').val(name);
            itemClone.removeClass('dd-item-clone d-none');
        
            $('.nested-list ol.dd-list:first-child').append(itemClone[0]);
            
            $('#'+type+' input[type=checkbox]').prop('checked', false);
            updateOutput($('#nestable').data('output', $('#nestable-output')));
        });
    }
    $('.nested-list').nestable({maxDepth: 2});
    var data_json_menu = '';
    var updateOutput = function(e)
    {
        var list   = e.length ? e : $(e.target),
            output = list.data('output');
        if (window.JSON) {
            output.val(window.JSON.stringify(list.nestable('serialize')));//, null, 2));
        } else {
            output.val('JSON browser support required for this demo.');
        }
        data_json_menu = window.JSON.stringify(list.nestable('serialize'));
    };

    // activate Nestable for list 1
    $('#nestable').nestable({
        group: 1
    })
    .on('change', updateOutput);

    // output initial serialised data
    updateOutput($('#nestable').data('output', $('#nestable-output')));

    $('#btn-submit').on('click', function (e) {
        // alert(11);
        e.preventDefault();
        // var data = [];
        // data = $('.nested-list').trigger('change').nestable('serialize');
        console.log(data_json_menu);
        // return;
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "POST",
            url: "system/admin/menu/edit/menu-item",
            data: {data_json_menu: data_json_menu},
            success: function (res) {
                alert(res);
                // if(res.status === 'success'){
                //     $('.message').removeClass('d-none').find('.alert').addClass('alert-success').text(res.message);
                // } else {
                //     $('.message').removeClass('d-none').find('.alert').addClass('alert-warning').text(res.message);
                // }
            }
        });
    });
 
</script>
@endsection