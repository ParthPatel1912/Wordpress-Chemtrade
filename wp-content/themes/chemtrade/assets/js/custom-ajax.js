$(document).ready(function () {
	
	var month = $('.news-month').val();
	var year = $('.news-year').val();
	$('.body-loader').removeClass('hide');
	newsFilter(year , month);

	$('.news-year').on("select2:select", function(e) {
		var year = $(this).val();
		var month = $('.news-month').val();
		$('.body-loader').removeClass('hide');
		newsFilter(year , month);
	});

	$('.news-month').on("select2:select", function(e) {
		var month = $(this).val();
		var year = $('.news-year').val();
		$('.body-loader').removeClass('hide');
		newsFilter(year , month);
	});

	$('#confirm-button').on("click", function(e) {
		var link = $('#confirm-link').attr('href');
		$("#alert-modal").modal('hide');
		window.open(link, '_blank');
	});

	addMarginToMenu();

	$(window).resize(function() {
		addMarginToMenu();
	});

});

function  addMarginToMenu() {
	if ($(window).width() > 767) {
		var height = $('.width-count-menu').height();
		var fheight = $('.fix-margin-menu').height();
		var wsscheight = $('.wssc-menu .mega-sub-menu').height();
		height = height + fheight + 15;
		$('.fix-margin-menu').css('margin-top', height - wsscheight);
	}
}

// news filter function
function newsFilter(year, month) {
	var data = {
		action: "newssectionbyfilter",
		year: year,
		month: month,
	};

	$.ajax({
		type: "POST",
		url: siteHomeUrl + "/wp-admin/admin-ajax.php",
		dataType: "json",
		cache: false,
		data: data,
		success: function (response) {
			if (response.status) {
				$('#news-row').html('');
				$('#news-row').html(response.message);
			}
			$('.body-loader').addClass('hide');
			equalHeight();
		}
	}).fail(function () {
		$('.body-loader').addClass('hide');
	});
}

// equalHeight function
function equalHeight() {
	$.fn.extend({
		equalHeights: function () {
			var top = 0;
			var row = [];
			var classname = ('equalHeights' + Math.random()).replace('.', '');
			$(this).each(function () {
				var thistop = $(this).offset().top;
				if (thistop > top) {
					$('.' + classname).removeClass(classname);
					top = thistop;
				}
				$(this).addClass(classname);
				$(this).height('auto');
				var h = (Math.max.apply(null, $('.' + classname).map(function () {
					return $(this).outerHeight();
				}).get()));
				$('.' + classname).height(h);
			}).removeClass(classname);
		}
	});
	$('.news-list-wrapper').equalHeights();
}