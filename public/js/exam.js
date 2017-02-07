$(function(){


$(".product").change(function(){
     
        var product_id = $(this).val();
        self = this;
    var url ="?controller=DictController&act=getDictData&type=2&parent_id="+product_id;

       $.ajaxSettings.async = false;
    var options ="<option value=0>全部</option>";
    $.getJSON(url,function(result){
        $.each(result,function(i,data){
            options+="<option value="+data.module_id+">"+data.module_name+"</option>";
        });
        
        $(self).parents("form").find("[name='module_id']").empty();
        $(self).parents("form").find("[name='module_id']").append(options);
        $(self).parents("form").find("[name='module_id']").selectpicker('refresh');
        //$(this).parents("form").find("[name='module_name']").empty();
    //  $("#search_cate").empty();
    //  $("#search_cate").append(options);
    //  $("#search_cate").attr('multiple','true');
    //  $("#search_cate").selectpicker('refresh');
    });
});


$(".product_modules").change(function(){
     
        var product_id = $(this).val();
        self = this;
    var url ="?controller=DictController&act=getDictData&type=2&parent_id="+product_id;

       $.ajaxSettings.async = false;
    var options ="<option value=0>全部</option>";
    $.getJSON(url,function(result){
        $.each(result,function(i,data){
            options+="<option value="+data.module_id+">"+data.module_name+"</option>";
        });
        
        $(self).parents("form").find("[name='modules']").empty();
        $(self).parents("form").find("[name='modules']").append(options);
        $(self).parents("form").find("[name='modules']").selectpicker('refresh');
        //$(this).parents("form").find("[name='module_name']").empty();
    //  $("#search_cate").empty();
    //  $("#search_cate").append(options);
    //  $("#search_cate").attr('multiple','true');
    //  $("#search_cate").selectpicker('refresh');
    });
});
// 登录

$('#login-form').validate({        
        ignore:'',
        rules : {
            user_name:{ required : true},
            pwd:{required : true}
        },
        messages : {
            user_name : {required : '请填写用户名'},
            pwd : {required: '请填写密码'}
        }
    });	

    $("table[data-body='body']").on("click","tr:not(first)",function(){
        //$("table tr").find(".tr_selected").css("background-color","white").removeClass("tr_selected");

        $(this).parents("table").find(".tr_selected").removeClass("tr_selected");
    //  alert($(this).parents("table").html());
//      $(this).css("background-color","#51b2f6");
        $(this).addClass("tr_selected");
    });
    $('div[data-modal-url]').on('show.bs.modal', function () {
    var url = $(this).attr("data-modal-url");
    var table_dom = $(this).attr("data-target-table");

    var rec_id= $("#body_table_list").find(".tr_selected").attr("rec_id");
    if(rec_id =="" || rec_id ==null)
    {
        alert("请选中列表");
        return false;
    }
    url = url+"&rec_id="+rec_id;
     $.ajaxSettings.async = false;
    $.getJSON(url,function(result){
       
       var products  = result['products'];
       $type=0,$parent_id=0
        var url ="?controller=DictController&act=getDictData&type=2&parent_id="+products;
        var options ="";
        $.ajaxSettings.async = false;
        $.getJSON(url,function(result){
            $.each(result,function(i,data){

                options+="<option value="+data.module_id+">"+data.module_name+"</option>";
            });
            $("#"+table_dom).find("[name='module_id']").empty();
            $("#"+table_dom).find("[name='module_id']").append(options);

            $("#"+table_dom).find("[name='module_id']").selectpicker('refresh');
 
        });
        $.each(result,function(key,value){
        //  alert($(this).find("[name="+key+"]").html());
                
            var dom = $("#"+table_dom).find("[name="+key+"]");
          
            if($(dom).hasClass("selectpicker") == true){
                if(key =='depts' || key == 'module_id' || key=="products" || key=="modules"){
                    value = value.split(",");
                }
                $(dom).selectpicker('val',value);
            }else {
                $(dom).val(value);
            }
            
        });
    });
 
 

 });
   var Sys={};
    var ua=navigator.userAgent.toLowerCase();
 
    var s;
 
    (s=ua.match(/msie ([\d.]+)/))?Sys.ie=s[1]:
 
    (s=ua.match(/firefox\/([\d.]+)/))?Sys.firefox=s[1]:
 
    (s=ua.match(/chrome\/([\d.]+)/))?Sys.chrome=s[1]:
 
    (s=ua.match(/opera.([\d.]+)/))?Sys.opera=s[1]:

    (s=ua.match(/version\/([\d.]+).*safari/))?Sys.safari=s[1]:0;

            
    if(!Sys.chrome){//Js判断为谷歌chrome浏览器

        $("input[type='date']").each(function(){
            $(this).datepicker({dateFormat:'yy-mm-dd'});
        });

 }






});
 
