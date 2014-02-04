$(".fancybox").fancybox();

$(".fancybox-elastic").fancybox({
	openEffect  : 'elastic',
	closeEffect : 'elastic',

	helpers : {
		title : {
			type : 'inside'
		}
	}
});

$(".fancybox-thumb").fancybox({
	prevEffect	: 'none',
	nextEffect	: 'none',
	helpers	: {
		title	: {
			type: 'outside'
		},
		thumbs	: {
			width	: 50,
			height	: 50
		}
	}
});

var width = (window.innerWidth > 0) ? window.innerWidth : screen.width;
if (width >= 768)
{
	var max = 0;
	categories_1 = $("#categories_1 ul.thumbnails div.thumbnail");
	categories_1.each(function(index, elt){
		max = Math.max(max, $(elt).height());
	});
	categories_1.height(max);

	var max = 0;
	categories_2 = $("#categories_2 ul.thumbnails div.thumbnail");
	categories_2.each(function(index, elt){
		max = Math.max(max, $(elt).height());
	});
	categories_2.height(max);
}
