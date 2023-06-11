let deletes = document.querySelectorAll('.delete');
for(const el of deletes){
    el.addEventListener('click',
    function(){
        let parent = $(this).parent().parent();
        let item_id = parent.attr('item-id');
        console.log(item_id);
        Delete(parent, item_id);
    }, false);
}





let onoff = document.querySelectorAll('.onoff');
for(const el of onoff){
    el.addEventListener('click',
    function(){
        let currentvalue = el.value; 
        if(currentvalue == "Off"){
            el.value = "On";
        }else{
            el.value = "Off";
        }
        let parent = $(this).parent().parent().parent();
        let item_id = parent.attr('item-id');
        let status = ($(this).val() == "On") ? 1:0;
        change_status( item_id, status);
    }, false);
}


function changeElement(element) {
    
    if (element.tagName === "DIV") {
        var inputElement = document.createElement("input");
        inputElement.type = "text";
        inputElement.value = element.innerHTML;
        inputElement.classList = element.classList;
        
        element.parentNode.replaceChild(inputElement, element);
    } else if (element.tagName === "INPUT") {
        var divElement = document.createElement("div");
        divElement.innerHTML = element.value;
        divElement.classList = element.classList;
        
        element.parentNode.replaceChild(divElement, element);
    }
}


let change = document.querySelectorAll('.edit');
for(const el of change){
    el.addEventListener('click',
    function(){
        $(this).addClass('hide');
        let parent = $(this).parent().parent();
        let child = parent.children();
        for(const e of child){
            if ($(e).children('.apply').hasClass('hide'))
                $(e).children('.apply').removeClass('hide');
            if ($(e).hasClass('text') == true || $(e).hasClass('price') == true)
                changeElement(e);
        }

    
        // changeElement(el);
    }, false);
};

let apply = document.querySelectorAll('.apply');
for(const el of apply){
    el.addEventListener('click',
    function(){
        let parent = $(this).parent().parent();
        let child = parent.children();
        let text = parent.children('.text').val();
        let price= parent.children('.price').val();
        let item_id = parent.attr('item-id');
        for(const e of child){
            if ($(e).children('.edit').hasClass('hide'))
                $(e).children('.edit').removeClass('hide');
            if ($(e).hasClass('text') == true || $(e).hasClass('price') == true){
                changeElement(e);
            }
        }

        console.log(text);
        console.log(price);
        changeItem(item_id, text, price);
        $(this).addClass('hide');

    
        // changeElement(el);
    }, false);
};