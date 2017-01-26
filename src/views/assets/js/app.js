$(document).ready(function(){
 


	
	$(window).on('load resize',function(){

		var menu = $('#menu > ul > li');
		var munuLight = menu.length;
		
		
				
		$('#menu-standart').html(menu);
			if ($('body').is('#menu'))
			{
				var positionRight = $('#menu').width() - menu.eq(-1).position().left;
				if (positionRight<0)
				{
					for ( var i = -1; positionRight < 0; i--) {
				 		positionRight = $('#menu').width() - menu.eq(i).position().left+10; // ?width*0.9=90%
				 		$('.menu-prepend').prepend(menu.eq(i));
				 	};
			}

			
			
		}


		if ($('.menu-prepend').is(':empty'))
			$('#prepend').fadeOut(0);
		else
			$('#prepend').fadeIn(0);
			

	});

	$('#menu-standart').on("mouseover", 'li', function() {
		//alert($(this).text())
		var submenu = $(this).children('.submenu');
		var left = $(this).position().left-100;
		submenu.css( "left", left+'px' );
		submenu.css( "top", '50px' );
		submenu.slideDown(0);
	});
	$('#menu-standart').on("mouseleave", 'li', function() {
			$('ul.submenu').slideUp(0);
	});

    	






	$("#prepend").mouseover(function() {
		$('ul.menu-prepend').slideDown(0);
	});
	$('ul.menu-prepend').mouseleave(function() {
		
		$('ul.menu-prepend').slideUp(0);
		
	});


	
	$("ul.menu-prepend").on("mouseover", 'li', function() {
		
		//alert($(this).children("span").text())
		var submenu = $(this).children('.submenu');
		var left = $(this).width()+20;
		var top = $(this).position().top-10;
		submenu.css( "left", left+'px' );
		submenu.css( "top", top+'px' );
		submenu.slideDown(0);
		submenu.removeClass('c1');
	});
	$('ul.menu-prepend').on("mouseleave", 'li', function() {
			$('ul.submenu').slideUp(0);
			$('ul.submenu').addClass('c1');
	});




	// $('ul.menu-prepend:last-child').click(function() {
    //    alert("Yes");
    //});




	    //input - number
	$('input[type="number"]').after('<i class="input-number-plus"></i>');

	$('input[type="number"]').before('<i class="input-number-minus"></i>');

	$(".input-number-minus").click(function() {
		var val = $(this).next().val();
		if (!($(this).next().attr('min')>=val))
			$(this).next().val(val-1)
	});
	$(".input-number-plus").click(function() {
		var val = $(this).prev().val();
		if (!($(this).prev().attr('max')<=val))
			$(this).prev().val((val*1+1))
	});


	//tooltip
	//var tooltip = $('[tooltip]');

	//tooltip
	
	$( "input[tooltip]" ).click(function() {
  		//alert(1)
  		showTooltip($(this));
	});


	$("button").click(function() {
		if ($(this).attr('ajax'))
		{
			//foreach	
			var name = $(this).attr('ajax');
			
			var content = $('[name='+name+']').text().split(';');
			content = content.map(Function.prototype.call, String.prototype.trim)

			var url      = window.location.href;
			var pathname = window.location.pathname.split("/");
			
			var request = location.host+'/'+pathname[1]+'/ajax';
			var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

			var post_data = {};
			post_data[name]= content;

			//alert(filename); 
			  // запускаем ajax-запрос, устанавливаем обработчики событий.
			// Возвращаемые методом $.get объект сохраним в переменной jqxhr для дальнейшего использования
			$.ajax({
			    url: 'ajax',
			    type: 'POST',
			    data: 
			    {
			    	data: post_data,
			    	_token: CSRF_TOKEN,
			    },
			    dataType: 'JSON',
			    success: function (data) {

			        $('[name='+name+']').attr('tooltip',data.msg)
			        showTooltip($('[name='+name+']'),1);
			        console.log(data);

			    },
			    fail: function (data) {
			        $('[name='+name+']').attr('tooltip',data.msg)
			        console.log(data.msg);

			    }
			});

			
			//alert(request);
			
			//$(this).attr()
		}
	});

	/*
	$(document).ready(function() {
		$('#btnSun').click(myTooltip());
	});

	function myTooltip() {
		alert('hi');
	}
	*/



	//var text = tooltip.attr("tooltip");
	//alert(text)



	
	function showTooltip(element, type=0) {
	
		
		
		
		var height = element.height();
  		var top = element.offsetTop;
  		var width = element.width();
  		if ( element.is('[type="number"]') )	width =  element.width()+50;
  		if ( element.is('.toggle-switch') )		width =  element.width()+300;

		//+" "+height+" "+width
		element.before("<div class='tooltip'>"+element.attr("tooltip")+"</div>");
		var tooltip = element.parent().find("div.tooltip");
		tooltip.css({top: (top) , left: width+50 , position:'absolute'});
		
		if (type==1) element.prev('.tooltip').addClass('t-green');
		if (type==2) element.prev('.tooltip').addClass('t-red');
		
		tooltip.delay(3000).fadeOut(1000)

		//alert(type)
	}



	//$('textarea').on('load',function(){
		//$(this).style.height = "1px";
		//$(this).style.height = (25+o.scrollHeight)+"px";

	//)};



});
	function textAreaAdjust(o) {
	  o.style.height = "1px";
	  o.style.height = (25+o.scrollHeight)+"px";
	}

	//textarea resize
	

