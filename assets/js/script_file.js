// JavaScript Document
$(document).ready(function(){
	var id=$('#message');
	var width=$(window).width();
	if(width>=1300)
	{
	id.text('Large screen');	
	}
	else if(width<1300 && width>=1000)
	{
	id.text('medium screen');		
	}
	else if(width<1000)
	{
	id.text('small screen');	
	}
	/////////////////////
	/////
	$(window).resize(function(){
		var width=$(window).width();
		if(width>=1300)
	{
	id.text('Large screen');	
	}
	else if(width<1300 && width>=1000)
	{
	id.text('medium screen');		
	}
	else if(width<1000)
	{
	id.text('small screen');	
	}
		
		});
		
		//////////////////setting captcha
		var first=Math.floor(Math.random()*10);
		var second=Math.floor(Math.random()*10);
		var third=Math.floor(Math.random()*10);
		var fourth=Math.floor(Math.random()*10);
		var five=Math.floor(Math.random()*10);
		var six=Math.floor(Math.random()*10);
		var allinone=first+''+second+''+third+''+fourth+''+five+''+six;
	
	var verify=first+''+second+''+third+''+fourth+''+five;
	
		///////////////////////////
		$('#setCaptcha').val(allinone);
		
		$('#captcha').keydown(function() {
            var value=$(this).val();
			if(value==verify)
			{
				$('#submitbtn').removeAttr('disabled');
			}
			else
			{
			$('#submitbtn').attr('disabled','disabled');
			}
        });
	});
	