$(document).ready(function() {
	var date = new Date();
	var d = date.getDate();
	var m = date.getMonth();
	var y = date.getFullYear();	
	$('#calendar').fullCalendar({
		editable: true,
		events: [
			/*{
				title: '',
				start: new Date(2014, 0, 1)
			},
			{
				title: '',
				start: new Date(2014, 0, 20)
			},
			{
				title: '',
				start: new Date(2014, 1, 17),
			},
			{
				title: '',
				start: new Date(2014, 2, 17),
			},
			{
				title: '',
				start: new Date(2014, 3, 21),
			},
			{
				title: '',
				start: new Date(2014, 4, 19),
			},
			{
				title: '',
				start: new Date(2014, 4, 26),
			},
			{
				title: '',
				start: new Date(2014, 6, 1),
			},
			{
				title: '',
				start: new Date(2014, 6, 4),
			},
			{
				title: '',
				start: new Date(2014, 7, 4),
			},
			{
				title: '',
				start: new Date(2014, 8, 1),
			},
			{
				title: '',
				start: new Date(2014, 9, 13),
			},
			{
				title: '',
				start: new Date(2014, 10, 11),
			},
			{
				title: '',
				start: new Date(2014, 10, 27),
			},
			{
				title: '',
				start: new Date(2014, 11, 25),
				url: 'http://google.com/'
			}*/
		]
	});
	
});