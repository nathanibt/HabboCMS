$(document).ready(function(){

	$("#open").click(function() {
		$('#question').hide();
		$('#open').hide();
		$('#reponse').show();
		setTimeout(function(){
			$('.blagounette').fadeOut();
		}, 2500);

		$.get('/api/blagounette', function(data) {
			console.log(data)
		})
	});

	$('.article_reaction > center > .img').click(function () {

		$('.compteur > span').removeClass('current');
		$('.compteur > span', this).addClass('current');
		var r1 = $('.compteur > span#r1').attr('value');
		var r2 = $('.compteur > span#r2').attr('value');
		var r3 = $('.compteur > span#r3').attr('value');
		var r4 = $('.compteur > span#r4').attr('value');
		var r5 = $('.compteur > span#r5').attr('value');
		var r6 = $('.compteur > span#r6').attr('value');

		if($('.compteur > span', this).hasClass('current')){
			var reaction = parseInt($('.compteur > span', this).attr('value'))+1;
			var bulle = parseInt($('.compteur > span', this).text());
			if(reaction > bulle){
				//NICOLAS
				$('.img > .compteur > span#r1').text(r1);
				$('.img > .compteur > span#r2').text(r2);
				$('.img > .compteur > span#r3').text(r3);
				$('.img > .compteur > span#r4').text(r4);
				$('.img > .compteur > span#r5').text(r5);
				$('.img > .compteur > span#r6').text(r6);
				$('.compteur > span', this).text(bulle+1);
			}else if(reaction == bulle){
				//NICOLAS
				$('.img > .compteur > span#r1').text(r1);
				$('.img > .compteur > span#r2').text(r2);
				$('.img > .compteur > span#r3').text(r3);
				$('.img > .compteur > span#r4').text(r4);
				$('.img > .compteur > span#r5').text(r5);
				$('.img > .compteur > span#r6').text(r6);
				$('.compteur > span', this).text(bulle-1);
				$('.compteur > span', this).removeClass('current');
			}
		}
	});

	$('.home_badges > a').click(function(){
		$('.home_badges > a').removeClass('current');
		$(this).addClass('current');
		$('.home_badges > .badges').hide();
		$('.home_badges > .badges[id=' + $(this).attr('id') + ']').show();
	});

	$('#s1').click(function(){
		$(this).css("background-color", "rgba(0,0,0,0.04)");
		$('#s2').css("background-color", "rgba(0,0,0,0.03)");
		$('#s3').css("background-color", "rgba(0,0,0,0.03)");
		$('#l1').show();
		$('#l1_2').show();
		$('#l2').hide();
		$('#l2_2').hide();
		$('#l3').hide();
		$('#l3_2').hide();
	});
	$('#s2').click(function(){
		$('#s1').css("background-color", "rgba(0,0,0,0.03)");
		$(this).css("background-color", "rgba(0,0,0,0.04)");
		$('#s3').css("background-color", "rgba(0,0,0,0.03)");
		$('#l1').hide();
		$('#l1_2').hide();
		$('#l2').show();
		$('#l2_2').show();
		$('#l3').hide();
		$('#l3_2').hide();
	});
	$('#s3').click(function(){
		$('#s1').css("background-color", "rgba(0,0,0,0.03)");
		$('#s2').css("background-color", "rgba(0,0,0,0.03)");
		$(this).css("background-color", "rgba(0,0,0,0.04)");
		$('#l1').hide();
		$('#l1_2').hide();
		$('#l2').hide();
		$('#l2_2').hide();
		$('#l3').show();
		$('#l3_2').show();
	});

	//NICOLAS
	$('.activate').click(function(){
		if($(this).attr('value') == 'yes') {
			$(this).attr('value', 'no');
		}else if($(this).attr('value') == 'no') {
			$(this).attr('value', 'yes');
		}
	});

	$('#coffre').click(function(){
		//NICOLAS
		var win = '1 trophée';
		$('#coffre_img').hide();
		$('#coffre_img').delay(300).fadeIn();
		$('#coffre_img').attr('src', '//cdn.ehabbo.eu/dist/img/coffre_ouvert.gif')
		$('#coffre_img').attr('id', 'ouvert');
		$('#coffre_1').hide();
		$('#coffre_2').hide();
		$('#win_1').delay(300).fadeIn();
		$('#win_2').delay(300).fadeIn();
		$('#win_2').text(win);
	});

	var dots = $('.profil_slider > .dots'),
		time = 4000,
		intervalNews = setTimeout(function() {
			slidernews();
		}, time),
		newid, nc;

	function slidernews(nc, clicked) {
		clearInterval(intervalNews);
		if (!clicked) {
			dots.each(function(index) {
				if ($(this).hasClass('current')) {
					nc = parseInt($(this).attr('toid')) + 1;
				}
			});
		}
		if (nc >= dots.length) {
			nc = 0;
		} else if (nc < 0) {
			nc = dots.length;
		}
		$('.profil_slider > .dots').removeClass('current');
		$('.profil_slider > .dots[toid="' + nc + '"]').addClass('current');
		$('.profil_slider > .slide').hide();
		$('.profil_slider > .slide[id="' + nc + '"]').show();
		nc++;
		intervalNews = setTimeout(function() {
			slidernews(nc);
		}, time);
	}
	setTimeout(function() {
		intervalNews;
	}, time);
	$('.profil_slider > .dots').on('click', function() {
		var id = $(this).attr('toid');
		slidernews(id, true);
	});
});