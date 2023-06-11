
function Delete(element, item_id){

    $.ajax({
		url: '/api.php',         /* Куда отправить запрос */
		method: 'get',             /* Метод запроса (post или get) */
		dataType: 'html',          /* Тип данных в ответе (xml, json, script, html). */
		data: {action: 'delete', idItem: item_id},     /* Данные передаваемые в массиве */
		success: function(data){
            alert('Удаление произошло успешно.');
			element.remove();
        },
        error: function(xhr, status, error){
			er = true;
            alert('Ошибка!');
		},
		complete: function(){
		}
	});
}


function change_status(item_id, stat){

    $.ajax({
		url: '/api.php',         /* Куда отправить запрос */
		method: 'get',             /* Метод запроса (post или get) */
		dataType: 'html',          /* Тип данных в ответе (xml, json, script, html). */
		data: {action: 'changestatus', idItem: item_id, status: stat},     /* Данные передаваемые в массиве */
		success: function(data){
			console.log(data);
        },
        error: function(xhr, status, error){
            console.log(error);
		},
		complete: function(){
			

			
		}
	});
}


function changeItem(item_id, n, p){

    $.ajax({
		url: '/api.php',         /* Куда отправить запрос */
		method: 'get',             /* Метод запроса (post или get) */
		dataType: 'html',          /* Тип данных в ответе (xml, json, script, html). */
		data: {action: 'changeitem', idItem: item_id, name: n, price: p},     /* Данные передаваемые в массиве */
		success: function(data){
			console.log(data);
            alert('Изменение произошло успешно.');	
        },
        error: function(xhr, status, error){
            console.log(error);
		},
		complete: function(){
			

			
		}
	});
}

