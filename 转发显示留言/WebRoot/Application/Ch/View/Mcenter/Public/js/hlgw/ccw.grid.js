// JavaScript Document
$(document).ready(function()
{

	// New values
	var animateWgt = '518px';
	var animateHgt = '518px';
	var defaultWgt = '300px';
	var defaultHgt = '250px'; /*原来是250 290*/
	var defaultBottom = '270px';
	var defaultBottom = '268px';
	var taget_animateWgt = '204px';
	var notaget_animateWgt = '134px';
	var box1_default_top = '20px';
	var box1_default_top = '0px';
	var box2_default_top = '289px';
	var box2_default_top = '268px';  /*原来是268 308*/
	var box3_default_top = '558px';
	var box3_default_top = '558px';
	var box3_default_top = '536px';
	var box4_default_top = '827px';
	var box4_default_top = '804px';
	var box5_default_top = '1096px';
	var box5_default_top = '1072px';


	var box1_default_left = '20px';
	var box1_default_left = '0px';
	var box2_default_left = '339px';
	var box2_default_left = '318px';
	var box3_default_left = '658px';
	var box3_default_left = '636px';

	var box1_set_left2_top = '544px';
	var box1_set_left2_top = '524px';
	var box1_set_left3_top = '754px';
	var box1_set_left3_top = '732px';
	var box1_set_left1_bot = '544px';
	var box1_set_left1_bot = '524px';
	var box1_set_left2_bot = '684px';
	var box1_set_left2_bot = '664px';
	var box1_set_left3_bot = '824px';
	var box1_set_left3_bot = '804px';

	var active_top2_set3_left = '863px';
	var active_top2_set3_left = '842px';
	var active_top2_set3_width = '95px';
	var active_top2_set2bot_left = '180px';
	var active_top2_set2bot_left = '158px';
	var active_bot2_width = '140px';

	var active_top3_set2top_left = '230px';
	var active_top3_set2top_left = '210px';
	var active_top3_left = '440px';
	var active_top3_left = '420px';
	var active_top3_left_bot2 = '160px';
	var active_top3_left_bot2 = '140px';
	var active_top3_left_bot3 = '300px';
	var active_top3_left_bot3 = '280px';

/*
	// Old values
	var animateWgt = '500px';
	var animateHgt = '520px';


	var defaultWgt = '300px';
	var defaultHgt = '250px';


	var defaultBottom = '270px';

	var taget_animateWgt = '200px';
	var notaget_animateWgt = '126px';

	var box1_default_top = '0px';
	var box2_default_top = '270px';
	var box3_default_top = '540px';
	var box4_default_top = '810px';
	var box5_default_top = '1080px';


	var box1_default_left = '0px';
	var box2_default_left = '319px';
	var box3_default_left = '637px';

	var box1_set_left2_top = '520px';
	var box1_set_left3_top = '736px';
	var box1_set_left1_bot = '520px';
	var box1_set_left2_bot = '666px';
	var box1_set_left3_bot = '808px';

	var active_top2_set3_left = '837px'; //860
	var active_top2_set3_width = '98px';
	var active_top2_set2bot_left = '160px'; //180
	var active_bot2_width = '140px';

	var active_top3_set2top_left = '220px'; //240
	var active_top3_left = '437px'; //460
	var active_top3_left_bot2 = '146px'; //166
	var active_top3_left_bot3 = '292px'; //312*/

	var box1_width = defaultWgt;
	var box1_height = defaultHgt;
	var box1_left = box1_default_left;
	var box1_top = box1_default_top;

	var box2_width = defaultWgt;
	var box2_height = defaultHgt;
	var box2_left = box2_default_left;
	var box2_top = box1_default_top;

	var box3_width = defaultWgt;
	var box3_height = defaultHgt;
	var box3_left = box3_default_left;
	var box3_top = box1_default_top;

	var box4_width = defaultWgt;
	var box4_height = defaultHgt;
	var box4_left = box1_default_left;
	var box4_top = box2_default_top;

	var box5_width = defaultWgt;
	var box5_height = defaultHgt;
	var box5_left = box2_default_left;
	var box5_top = box2_default_top;

	var box6_width = defaultWgt;
	var box6_height = defaultHgt;
	var box6_left = box3_default_left;
	var box6_top = box2_default_top;



	$('.list-item').bind(
	{
		mouseenter: function()
		{

/*            $(".smalimg").addClass("onit");
			$(".inner").addClass("onit");*/
			var id = $(this).attr('id');
			switch (id)
			{
			case 'box1':
				return ( //taget box 1
				(box1_width = animateWgt), (box1_height = animateHgt), (box1_left = box1_default_left), (box1_top = box1_default_top),

				(box2_width = taget_animateWgt), (box2_height = defaultHgt), (box2_left = box1_set_left2_top), (box2_top = box1_default_top),

				(box3_width = taget_animateWgt), (box3_height = defaultHgt), (box3_left = box1_set_left3_top), (box3_top = box1_default_top),

				(box4_width = notaget_animateWgt), (box4_height =
				defaultHgt), (box4_left = box1_set_left1_bot), (box4_top =
				box2_default_top),

				(box5_width = notaget_animateWgt), (box5_height =
				defaultHgt), (box5_left = box1_set_left2_bot), (box5_top =
				box2_default_top),

				(box6_width = notaget_animateWgt), (box6_height =
				defaultHgt), (box6_left = box1_set_left3_bot), (box6_top =
				box2_default_top),

				(box7_width = defaultWgt), (box7_height = defaultHgt), (box7_left = box1_default_left), (box7_top = box3_default_top),

				(box8_width = defaultWgt), (box8_height = defaultHgt), (box8_left = box2_default_left), (box8_top = box3_default_top),

				(box9_width = defaultWgt), (box9_height = defaultHgt), (box9_left = box3_default_left), (box9_top = box3_default_top),

				(box10_width = defaultWgt), (box10_height = defaultHgt), (box10_left = box1_default_left), (box10_top = box4_default_top),

				(box11_width = defaultWgt), (box11_height = defaultHgt), (box11_left = box2_default_left), (box11_top = box4_default_top),

				(box12_width = defaultWgt), (box12_height = defaultHgt), (box12_left = box3_default_left), (box12_top = box4_default_top),

				(box13_width = defaultWgt), (box13_height = defaultHgt), (box13_left = box1_default_left), (box13_top = box5_default_top),

				(box14_width = defaultWgt), (box14_height = defaultHgt), (box14_left = box2_default_left), (box14_top = box5_default_top),

				(box15_width = defaultWgt), (box15_height = defaultHgt), (box15_left = box3_default_left), (box15_top = box5_default_top),


				(create_animate()));
				break;
			case 'box2':

				return ( //taget box 2
				(box1_width = defaultWgt), (box1_height = defaultHgt), (box1_left = box1_default_left), (box1_top = box1_default_top),

				(box2_width = animateWgt), (box2_height = animateHgt), (box2_left = box2_default_left), (box2_top = box1_default_top),

				(box3_width = active_top2_set3_width), (box3_height =
				defaultHgt), (box3_left = active_top2_set3_left), (box3_top =
				box1_default_top),

				(box4_width = active_bot2_width), (box4_height =
				defaultHgt), (box4_left = box1_default_left), (box4_top =
				box2_default_top),

				(box5_width = active_bot2_width), (box5_height =
				defaultHgt), (box5_left = active_top2_set2bot_left), (box5_top =
				box2_default_top),

				(box6_width = active_top2_set3_width), (box6_height =
				defaultHgt), (box6_left = active_top2_set3_left), (box6_top =
				box2_default_top),

				(box7_width = defaultWgt), (box7_height = defaultHgt), (box7_left = box1_default_left), (box7_top = box3_default_top),

				(box8_width = defaultWgt), (box8_height = defaultHgt), (box8_left = box2_default_left), (box8_top = box3_default_top),

				(box9_width = defaultWgt), (box9_height = defaultHgt), (box9_left = box3_default_left), (box9_top = box3_default_top),

				(box10_width = defaultWgt), (box10_height = defaultHgt), (box10_left = box1_default_left), (box10_top = box4_default_top),

				(box11_width = defaultWgt), (box11_height = defaultHgt), (box11_left = box2_default_left), (box11_top = box4_default_top),

				(box12_width = defaultWgt), (box12_height = defaultHgt), (box12_left = box3_default_left), (box12_top = box4_default_top),

				(box13_width = defaultWgt), (box13_height = defaultHgt), (box13_left = box1_default_left), (box13_top = box5_default_top),

				(box14_width = defaultWgt), (box14_height = defaultHgt), (box14_left = box2_default_left), (box14_top = box5_default_top),

				(box15_width = defaultWgt), (box15_height = defaultHgt), (box15_left = box3_default_left), (box15_top = box5_default_top),

				(create_animate()));
				break;

			case 'box3':
				return ( //taget box 3
				(box1_width = taget_animateWgt), (box1_height = defaultHgt), (box1_left = box1_default_left), (box1_top = box1_default_top),

				(box2_width = taget_animateWgt), (box2_height = defaultHgt), (box2_left = active_top3_set2top_left), (box2_top = box1_default_top),

				(box3_width = animateWgt), (box3_height = animateHgt), (box3_left = active_top3_left), (box3_top = box1_default_top),

				(box4_width = notaget_animateWgt), (box4_height =
				defaultHgt), (box4_left = box1_default_left), (box4_top =
				box2_default_top),

				(box5_width = notaget_animateWgt), (box5_height =
				defaultHgt), (box5_left = active_top3_left_bot2), (box5_top =
				box2_default_top),

				(box6_width = notaget_animateWgt), (box6_height =
				defaultHgt), (box6_left = active_top3_left_bot3), (box6_top =
				box2_default_top),

				(box7_width = defaultWgt), (box7_height = defaultHgt), (box7_left = box1_default_left), (box7_top = box3_default_top),

				(box8_width = defaultWgt), (box8_height = defaultHgt), (box8_left = box2_default_left), (box8_top = box3_default_top),

				(box9_width = defaultWgt), (box9_height = defaultHgt), (box9_left = box3_default_left), (box9_top = box3_default_top),

				(box10_width = defaultWgt), (box10_height = defaultHgt), (box10_left = box1_default_left), (box10_top = box4_default_top),

				(box11_width = defaultWgt), (box11_height = defaultHgt), (box11_left = box2_default_left), (box11_top = box4_default_top),

				(box12_width = defaultWgt), (box12_height = defaultHgt), (box12_left = box3_default_left), (box12_top = box4_default_top),

				(box13_width = defaultWgt), (box13_height = defaultHgt), (box13_left = box1_default_left), (box13_top = box5_default_top),

				(box14_width = defaultWgt), (box14_height = defaultHgt), (box14_left = box2_default_left), (box14_top = box5_default_top),

				(box15_width = defaultWgt), (box15_height = defaultHgt), (box15_left = box3_default_left), (box15_top = box5_default_top),


				(create_animate()));
				break;

			case 'box4':
				return ( //taget box 4
				(box1_width = defaultWgt), (box1_height = defaultHgt), (box1_left = box1_default_left), (box1_top = box1_default_top),

				(box2_width = defaultWgt), (box2_height = defaultHgt), (box2_left = box2_default_left), (box2_top = box1_default_top),

				(box3_width = defaultWgt), (box3_height = defaultHgt), (box3_left = box3_default_left), (box3_top = box1_default_top),

				(box4_width = animateWgt), (box4_height = animateHgt), (box4_left = box1_default_left), (box4_top = box2_default_top),

				(box5_width = taget_animateWgt), (box5_height = defaultHgt), (box5_left = box1_set_left2_top), (box5_top = box2_default_top),

				(box6_width = taget_animateWgt), (box6_height = defaultHgt), (box6_left = box1_set_left3_top), (box6_top = box2_default_top),

				(box7_width = notaget_animateWgt), (box7_height =
				defaultHgt), (box7_left = box1_set_left1_bot), (box3_top =
				box1_default_top),

				(box8_width = notaget_animateWgt), (box8_height =
				defaultHgt), (box8_left = box1_set_left2_bot), (box8_top =
				box3_default_top),

				(box9_width = notaget_animateWgt), (box9_height =
				defaultHgt), (box9_left = box1_set_left3_bot), (box9_top =
				box3_default_top),

				(box10_width = defaultWgt), (box10_height = defaultHgt), (box10_left = box1_default_left), (box10_top = box4_default_top),

				(box11_width = defaultWgt), (box11_height = defaultHgt), (box11_left = box2_default_left), (box11_top = box4_default_top),

				(box12_width = defaultWgt), (box12_height = defaultHgt), (box12_left = box3_default_left), (box12_top = box4_default_top),

				(box13_width = defaultWgt), (box13_height = defaultHgt), (box13_left = box1_default_left), (box13_top = box5_default_top),

				(box14_width = defaultWgt), (box14_height = defaultHgt), (box14_left = box2_default_left), (box14_top = box5_default_top),

				(box15_width = defaultWgt), (box15_height = defaultHgt), (box15_left = box3_default_left), (box15_top = box5_default_top),


				(create_animate()));
				break;

			case 'box5':

				return ( //taget box 5
				(box1_width = defaultWgt), (box1_height = defaultHgt), (box1_left = box1_default_left), (box1_top = box1_default_top), (box2_width = defaultWgt), (box2_height = defaultHgt), (box2_left = box2_default_left), (box2_top = box1_default_top),

				(box3_width = defaultWgt), (box3_height = defaultHgt), (box3_left = box3_default_left), (box3_top = box1_default_top),


				(box4_width = defaultWgt), (box4_height = defaultHgt), (box4_left = box1_default_left), (box4_top = box2_default_top),

				(box5_width = animateWgt), (box5_height = animateHgt), (box5_left = box2_default_left), (box5_top = box2_default_top),

				(box6_width = active_top2_set3_width), (box6_height =
				defaultHgt), (box6_left = active_top2_set3_left), (box6_top =
				box2_default_top),

				(box7_width = active_bot2_width), (box7_height =
				defaultHgt), (box7_left = box1_default_left), (box7_top =
				box3_default_top),

				(box8_width = active_bot2_width), (box8_height =
				defaultHgt), (box8_left = active_top2_set2bot_left), (box8_top =
				box3_default_top),

				(box9_width = active_top2_set3_width), (box9_height =
				defaultHgt), (box9_left = active_top2_set3_left), (box9_top =
				box3_default_top),

				(box10_width = defaultWgt), (box10_height = defaultHgt), (box10_left = box1_default_left), (box10_top = box4_default_top),

				(box11_width = defaultWgt), (box11_height = defaultHgt), (box11_left = box2_default_left), (box11_top = box4_default_top),

				(box12_width = defaultWgt), (box12_height = defaultHgt), (box12_left = box3_default_left), (box12_top = box4_default_top),

				(box13_width = defaultWgt), (box13_height = defaultHgt), (box13_left = box1_default_left), (box13_top = box5_default_top),

				(box14_width = defaultWgt), (box14_height = defaultHgt), (box14_left = box2_default_left), (box14_top = box5_default_top),

				(box15_width = defaultWgt), (box15_height = defaultHgt), (box15_left = box3_default_left), (box15_top = box5_default_top),


				(create_animate()));
				break;

			case 'box6':
				return ( //taget box 6
				(box1_width = defaultWgt), (box1_height = defaultHgt), (box1_left = box1_default_left), (box1_top = box1_default_top), (box2_width = defaultWgt), (box2_height = defaultHgt), (box2_left = box2_default_left), (box2_top = box1_default_top),

				(box3_width = defaultWgt), (box3_height = defaultHgt), (box3_left = box3_default_left), (box3_top = box1_default_top),

				(box4_width = taget_animateWgt), (box4_height = defaultHgt), (box4_left = box1_default_left), (box4_top = box2_default_top),

				(box5_width = taget_animateWgt), (box5_height = defaultHgt), (box5_left = active_top3_set2top_left), (box5_top = box2_default_top),

				(box6_width = animateWgt), (box6_height = animateHgt), (box6_left = active_top3_left), (box6_top = box2_default_top),

				(box7_width = notaget_animateWgt), (box7_height =
				defaultHgt), (box7_left = box1_default_left), (box7_top =
				box3_default_top),

				(box8_width = notaget_animateWgt), (box8_height =
				defaultHgt), (box8_left = active_top3_left_bot2), (box8_top =
				box3_default_top),

				(box9_width = notaget_animateWgt), (box9_height =
				defaultHgt), (box9_left = active_top3_left_bot3), (box9_top =
				box3_default_top),

				(box10_width = defaultWgt), (box10_height = defaultHgt), (box10_left = box1_default_left), (box10_top = box4_default_top),

				(box11_width = defaultWgt), (box11_height = defaultHgt), (box11_left = box2_default_left), (box11_top = box4_default_top),

				(box12_width = defaultWgt), (box12_height = defaultHgt), (box12_left = box3_default_left), (box12_top = box4_default_top),

				(box13_width = defaultWgt), (box13_height = defaultHgt), (box13_left = box1_default_left), (box13_top = box5_default_top),

				(box14_width = defaultWgt), (box14_height = defaultHgt), (box14_left = box2_default_left), (box14_top = box5_default_top),

				(box15_width = defaultWgt), (box15_height = defaultHgt), (box15_left = box3_default_left), (box15_top = box5_default_top),


				(create_animate()));
				break;
				
			case 'box7':
				return ( //taget box 13
				(box1_width = defaultWgt), (box1_height = defaultHgt), (box1_left = box1_default_left), (box1_top = box1_default_top),

				(box2_width = defaultWgt), (box2_height = defaultHgt), (box2_left = box2_default_left), (box2_top = box1_default_top),

				(box3_width = defaultWgt), (box3_height = defaultHgt), (box3_left = box3_default_left), (box3_top = box1_default_top),

				(box4_width = defaultWgt), (box4_height = defaultHgt), (box4_left = box1_default_left), (box4_top = box2_default_top),

				(box5_width = defaultWgt), (box5_height = defaultHgt), (box5_left = box2_default_left), (box5_top = box2_default_top),

				(box6_width = defaultWgt), (box6_height = defaultHgt), (box6_left = box3_default_left), (box6_top = box2_default_top),

				(box7_width = defaultWgt), (box7_height = defaultHgt), (box7_left = box1_default_left), (box7_top = box3_default_top),

				(box8_width = defaultWgt), (box8_height = defaultHgt), (box8_left = box2_default_left), (box8_top = box3_default_top),

				(box9_width = defaultWgt), (box9_height = defaultHgt), (box9_left = box3_default_left), (box9_top = box3_default_top),

				(box10_width = defaultWgt), (box10_height = defaultHgt), (box10_left = box1_default_left), (box10_top = box4_default_top),

				(box11_width = defaultWgt), (box11_height = defaultHgt), (box11_left = box2_default_left), (box11_top = box4_default_top),

				(box12_width = defaultWgt), (box12_height = defaultHgt), (box12_left = box3_default_left), (box12_top = box4_default_top),

				(box13_width = defaultWgt), (box13_height = defaultHgt), (box13_left = box1_default_left), (box13_top = box5_default_top),

				(box14_width = defaultWgt), (box14_height = defaultHgt), (box14_left = box2_default_left), (box14_top = box5_default_top),

				(box15_width = defaultWgt), (box15_height = defaultHgt), (box15_left = box3_default_left), (box15_top = box5_default_top),




				(create_animate()));
				break;

			case 'box8':
				return ( //taget box 14
				(box1_width = defaultWgt), (box1_height = defaultHgt), (box1_left = box1_default_left), (box1_top = box1_default_top),

				(box2_width = defaultWgt), (box2_height = defaultHgt), (box2_left = box2_default_left), (box2_top = box1_default_top),

				(box3_width = defaultWgt), (box3_height = defaultHgt), (box3_left = box3_default_left), (box3_top = box1_default_top),

				(box4_width = defaultWgt), (box4_height = defaultHgt), (box4_left = box1_default_left), (box4_top = box2_default_top),

				(box5_width = defaultWgt), (box5_height = defaultHgt), (box5_left = box2_default_left), (box5_top = box2_default_top),

				(box6_width = defaultWgt), (box6_height = defaultHgt), (box6_left = box3_default_left), (box6_top = box2_default_top),

				(box7_width = defaultWgt), (box7_height = defaultHgt), (box7_left = box1_default_left), (box7_top = box3_default_top),

				(box8_width = defaultWgt), (box8_height = defaultHgt), (box8_left = box2_default_left), (box8_top = box3_default_top),

				(box9_width = defaultWgt), (box9_height = defaultHgt), (box9_left = box3_default_left), (box9_top = box3_default_top),

				(box10_width = defaultWgt), (box10_height = defaultHgt), (box10_left = box1_default_left), (box10_top = box4_default_top),

				(box11_width = defaultWgt), (box11_height = defaultHgt), (box11_left = box2_default_left), (box11_top = box4_default_top),

				(box12_width = defaultWgt), (box12_height = defaultHgt), (box12_left = box3_default_left), (box12_top = box4_default_top),

				(box13_width = defaultWgt), (box13_height = defaultHgt), (box13_left = box1_default_left), (box13_top = box5_default_top),

				(box14_width = defaultWgt), (box14_height = defaultHgt), (box14_left = box2_default_left), (box14_top = box5_default_top),

				(box15_width = defaultWgt), (box15_height = defaultHgt), (box15_left = box3_default_left), (box15_top = box5_default_top),




				(create_animate()));
				break;

			case 'box9':
				return ( //taget box 15
				(box1_width = defaultWgt), (box1_height = defaultHgt), (box1_left = box1_default_left), (box1_top = box1_default_top),

				(box2_width = defaultWgt), (box2_height = defaultHgt), (box2_left = box2_default_left), (box2_top = box1_default_top),

				(box3_width = defaultWgt), (box3_height = defaultHgt), (box3_left = box3_default_left), (box3_top = box1_default_top),

				(box4_width = defaultWgt), (box4_height = defaultHgt), (box4_left = box1_default_left), (box4_top = box2_default_top),

				(box5_width = defaultWgt), (box5_height = defaultHgt), (box5_left = box2_default_left), (box5_top = box2_default_top),

				(box6_width = defaultWgt), (box6_height = defaultHgt), (box6_left = box3_default_left), (box6_top = box2_default_top),

				(box7_width = defaultWgt), (box7_height = defaultHgt), (box7_left = box1_default_left), (box7_top = box3_default_top),

				(box8_width = defaultWgt), (box8_height = defaultHgt), (box8_left = box2_default_left), (box8_top = box3_default_top),

				(box9_width = defaultWgt), (box9_height = defaultHgt), (box9_left = box3_default_left), (box9_top = box3_default_top),

				(box10_width = defaultWgt), (box10_height = defaultHgt), (box10_left = box1_default_left), (box10_top = box4_default_top),

				(box11_width = defaultWgt), (box11_height = defaultHgt), (box11_left = box2_default_left), (box11_top = box4_default_top),

				(box12_width = defaultWgt), (box12_height = defaultHgt), (box12_left = box3_default_left), (box12_top = box4_default_top),

				(box13_width = defaultWgt), (box13_height = defaultHgt), (box13_left = box1_default_left), (box13_top = box5_default_top),

				(box14_width = defaultWgt), (box14_height = defaultHgt), (box14_left = box2_default_left), (box14_top = box5_default_top),

				(box15_width = defaultWgt), (box15_height = defaultHgt), (box15_left = box3_default_left), (box15_top = box5_default_top),




				(create_animate()));
				break;



			default:
				break;
			}
		}

	});

	var create_animate = function()
	{
		$('#box1').stop(true, true).animate(
		{
			width: box1_width,
			height: box1_height,
			left: box1_left,
			top: box1_top
		});
		$('#box2').stop(true, true).animate(
		{
			width: box2_width,
			height: box2_height,
			left: box2_left,
			top: box2_top
		});
		$('#box3').stop(true, true).animate(
		{
			width: box3_width,
			height: box3_height,
			left: box3_left,
			top: box3_top
		});
		$('#box4').stop(true, true).animate(
		{
			width: box4_width,
			height: box4_height,
			left: box4_left,
			top: box4_top
		});
		$('#box5').stop(true, true).animate(
		{
			width: box5_width,
			height: box5_height,
			left: box5_left,
			top: box5_top
		});
		$('#box6').stop(true, true).animate(
		{
			width: box6_width,
			height: box6_height,
			left: box6_left,
			top: box6_top
		});

		$('#box7').stop(true, true).animate(
		{
			width: box7_width,
			height: box7_height,
			left: box7_left,
			top: box7_top
		});
		$('#box8').stop(true, true).animate(
		{
			width: box8_width,
			height: box8_height,
			left: box8_left,
			top: box8_top
		});
		$('#box9').stop(true, true).animate(
		{
			width: box9_width,
			height: box9_height,
			left: box9_left,
			top: box9_top
		});

	}
$('.list-wrapper').bind(
	{
		mouseleave: function()
		{
			return (

			(box1_width = defaultWgt), (box1_height = defaultHgt), (box1_left = box1_default_left), (box1_top = box1_default_top),

			(box2_width = defaultWgt), (box2_height = defaultHgt), (box2_left = box2_default_left), (box2_top = box1_default_top),

			(box3_width = defaultWgt), (box3_height = defaultHgt), (box3_left = box3_default_left), (box3_top = box1_default_top),

			(box4_width = defaultWgt), (box4_height = defaultHgt), (box4_left = box1_default_left), (box4_top = box2_default_top),

			(box5_width = defaultWgt), (box5_height = defaultHgt), (box5_left = box2_default_left), (box5_top = box2_default_top),

			(box6_width = defaultWgt), (box6_height = defaultHgt), (box6_left = box3_default_left), (box6_top = box2_default_top),

			(box7_width = defaultWgt), (box7_height = defaultHgt), (box7_left = box1_default_left), (box7_top = box3_default_top),

			(box8_width = defaultWgt), (box8_height = defaultHgt), (box8_left = box2_default_left), (box8_top = box3_default_top),

			(box9_width = defaultWgt), (box9_height = defaultHgt), (box9_left = box3_default_left), (box9_top = box3_default_top),

			(box10_width = defaultWgt), (box10_height = defaultHgt), (box10_left = box1_default_left), (box10_top = box4_default_top),

			(box11_width = defaultWgt), (box11_height = defaultHgt), (box11_left = box2_default_left), (box11_top = box4_default_top),

			(box12_width = defaultWgt), (box12_height = defaultHgt), (box12_left = box3_default_left), (box12_top = box4_default_top),

			(box13_width = defaultWgt), (box13_height = defaultHgt), (box13_left = box1_default_left), (box13_top = box5_default_top),

			(box14_width = defaultWgt), (box14_height = defaultHgt), (box14_left = box2_default_left), (box14_top = box5_default_top),

			(box15_width = defaultWgt), (box15_height = defaultHgt), (box15_left = box3_default_left), (box15_top = box5_default_top),

			(create_animate()));

		}
		  
	});
});