<link rel="stylesheet" href="./folder_css/autocomplete.css">
<div class="ui-widget">
    
    <!-- <img id="project-icon" style="height: 100px;" src="images/transparent_1x1.png" class="ui-state-default" alt> -->
    <input id="project" placeholder=" Nhập tên điện thoại,máy tính,phụ kiện cần tìm" class="search_autocomplete">
    
</div>

<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script>
    
    $(document).ready(function(){
        $("#project").autocomplete({
            minLength: 1,
            source: "searching.php",
            focus: function(event, ui){
                $("#project").val(ui.item.label);
                return false;
            },
            select: function(event,ui){
                $("#project").val(ui.item.label);
                $("#project-id").val(ui.item.value);
                $("#project-icon").attr("src","admin/products/photo_product/" + ui.item.photo);
                $("#project-description").val(ui.item.value1);
                return false;
            }
        })
        .autocomplete("instance")._renderItem = function(ul,item){
            return $('<li>')
                .append(`<div class="sub_display" style=''>
                        <span style='display:none'>${item.value}</span>
                        <a class="name-product-search" style="color:#3E83DC;text-decoration: none;background-color: white;border:none" href="form_display.php?id=${item.value}">${item.label}</a>
                        <br>
                        <a class="photo-product-search" style="text-decoration: none;text-decoration: none;background-color: white;border:none" href="form_display.php?id=${item.value}"><img src='admin/products/photo_product/${item.photo}'style='height:50px'></a>
                        
                        <br>
                        <span class="price-product-search" style="color:black;text-decoration: none;background-color: white;border:none"> ${item.value1}<u>đ</u> </span>
                        </div>
                `)
                .appendTo(ul);
        }
    })
</script>
<!-- <div class="sub_display" style=''> -->