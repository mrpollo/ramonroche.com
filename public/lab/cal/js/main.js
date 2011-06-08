$(document).ready(function(){
	$('.ui-button').button();
	$('#clear-canvas').click(function(){
		eCal.clearCanvas();
	})
	$('.dialog').dialog({
		modal: true,
		title: "Calendar App:",
		buttons: {
			"Ok": function(){
				$(this).dialog("close");
			}
		}
	});
	$('#events-a').click(function(){
		eCal.layOutDay(
			[
				{id : 1, start : 30, end : 150},	//from 9:30am to 11:30am
				{id : 2, start : 540, end : 600},	//from 6:00pm to 7:00pm
				{id : 3, start : 560, end : 620},	//from 6:20pm to 7:20pm
				{id : 4, start : 610, end : 670}	//from 7:10pm to 8:10pm
			]
		);
	})
	$('#events-b').click(function(){
		eCal.layOutDay(
			[
				{id : 1, start : 60, end : 300},	//from 10:00am to 12:00am
				{id : 2, start : 120, end : 180},	//from 6:00pm to 7:00pm
				{id : 3, start : 240, end : 260},	//from 6:20pm to 7:20pm
				{id : 4, start : 610, end : 670} 	//from 7:10pm to 8:10pm
			]
		);
	})
	$('#events-c').click(function(){
		eCal.layOutDay(
			[
				{id : 1, start : 30, end : 150},	//from 9:30am to 11:30am
				{id : 2, start : 540, end : 600},	//from 6:00pm to 7:00pm
				{id : 3, start : 560, end : 620},	//from 6:20pm to 7:20pm
				{id : 4, start : 610, end : 670},	//from 7:10pm to 8:10pm
				{id : 5, start : 210, end : 270},	//from 12:30pm to 1:30pm
				{id : 6, start : 220, end : 280},	//from 12:40pm to 1:40pm
				{id : 7, start : 230, end : 290},	//from 12:50pm to 1:50pm
				{id : 8, start : 240, end : 360},	//from 1:00pm to 3:00pm
				{id : 9, start : 300, end : 360} 	//from 2:00pm to 3:00pm
			]
		);
	})
	eCal.layOutDay(
		[
			{id : 1, start : 0, end : 30},
			{id : 2, start : 60, end : 90},
			{id : 3, start : 120, end : 150},
			{id : 4, start : 180, end : 210}
		]
	);
});
dLoad.loaded(function(){
	//eCal.layOutDay(testAppointments);
});