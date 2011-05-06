var cal = {
	_holder: false,
	_from: 0,
	_to: 0,
	from: function(f){
		cal._from = f;
	},
	to: function(t){
		cal._to = t;
	},
	init: function(w, f, t){
		cal._holder = w;
		cal._from = f;
		cal._to = t;
		
	}
};
/*
var s = new Date();
console.log(s.getSeconds());
console.log(s.getMinutes());
console.log(s.getHours());
console.log(s.getDay());

1) how many hours between interval
	1.1) get half hours too
2) 
*/
var timeutil = {
	timetodec: function(t){
		
	}
};
true
/^[0-9]{1,2}(am|pm)/.test('9am')
true
/^[0-9]{1,2}(|:[0-9]{1,2})(am|pm)/.test('9am')
/^[0-9]{1,2}(|:[0-9]{1,2})|(am|pm)/.test('9:00am')
/^([0-9]{1,})(|:[0-9]{1,2})|(am|pm)$/.test('119:00am')

0 o 2
/^(|[0-1]{1})([0-9])(|:[0-59])|(am|pm)/.test('9:00am')
0 o 9

/^[0-9]{1,2}(|:[0-9]{1,2})|(am|pm)/.test('9:00am')



/^((|[01])\d|2[0-3]):?([0-5]\d)|(|\s)(am|pm)$/.test('9:00')

/^((|[01])\d|2[0-3]):?([0-5]\d)(|(am|pm))$/.test('9:00f am')


cal.init('cal-main', '9am', '9pm');
cal.init('cal-main', '9:00', '21:00');
cal.init('cal-main', '9:00am', '9:00pm');
cal.init('cal-main', '09:00am', '09:00pm');




2,807.00 - 272.90 = 

2,385.95 - 231.965 = 2617.915