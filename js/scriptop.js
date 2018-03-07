$( document ).ready(function() {
	
	setInterval (function(){
		$.get("allsend.php", function(data) {		
		 	$('#send_ot').html(data);		 	
		});
	}, 5000); 
	
	$("#refresh").on("click", function(){			
		$.get("allsend.php", function(data) {		
		 	$('#send_ot').html(data);		 	
		});
	});

});