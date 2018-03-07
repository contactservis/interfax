var cookie = {
	set: function(cookie_name, cookie_value, cookie_expire) {
				var expire_date = new Date;
				expire_date.setDate(expire_date.getDate() + cookie_expire);
				document.cookie = cookie_name + "=" + escape(cookie_value) + (cookie_expire == null ? "" : ";expires=" + expire_date.toGMTString());
		},
		get: function(cookie_name) {
				var cookie = document.cookie, length = cookie.length;
				if(length) {
						var cookie_start = cookie.indexOf(cookie_name + "=");
						if(cookie_start != -1) {
								var cookie_end = cookie.indexOf(";", cookie_start);
								if(cookie_end == -1) {
										cookie_end = length;
								}
								cookie_start += cookie_name.length + 1;
								return unescape(cookie.substring(cookie_start, cookie_end));
						}
				}
				return null;
		},
		erase: function(cookie_name) {
				core.cookies.set(cookie_name, "", -1);
		}
	};

function getRandomInt(min, max) {
  return Math.floor(Math.random() * (max - min)) + min;
}

$( document ).ready(function() {
	
	var iframe_h = $('iframe').height();
	var h_otv = iframe_h - 165;
	$("#send_ot").css('height', h_otv +'px');

	$(window).resize(function(){
	  	var iframe_h = $('iframe').height();
		console.log(iframe_h);
	});

	$("#set_name_user").on("click", function(){
		
		var str_len = cookie.get("user_ids");		
		
		if (str_len == null){			
			var user_id_set = getRandomInt(1, 1000);
			cookie.set("user_ids", user_id_set);
		}		
		var user_name	= $("#user_name").val();		
		cookie.set("user_names", user_name);
		$('#send_mess').removeAttr('disabled');
		$('#name_user').css('display','none');
	});

	$("#send_mess").on("click", function(){					
		var user_id 	= cookie.get("user_ids");
		var user_name   = cookie.get("user_names");
		var send_text 	= $("#send_text").val();		
		$.get("send.php", { user_id:user_id, send:send_text, user_name: user_name})
			.done(function(data) {
			$('#send_ot').append(data);
		});

	});

});