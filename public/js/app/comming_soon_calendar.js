var cal = $( '#calendar' ).calendario( {
	caldata : canvasEvents
} ),
$month = $( '#calendar-month' ).html( cal.getMonthName() ),
$year = $( '#calendar-year' ).html( cal.getYear() );

cal.setData({
	'04-11-2016':"<a onClick='checkEvents(\"2016-04-11\")'>Check events</a>",
	'04-12-2016':"<a onClick='checkEvents(\"2016-04-12\")'>Check events</a>",
	'04-13-2016':"<a onClick='checkEvents(\"2016-04-13\")'>Check events</a>",
	'04-14-2016':"<a onClick='checkEvents(\"2016-04-14\")'>Check events</a>",
	'04-15-2016':"<a onClick='checkEvents(\"2016-04-15\")'>Check events</a>",
	'04-16-2016':"<a onClick='checkEvents(\"2016-04-16\")'>Check events</a>",
	'04-17-2016':"<a onClick='checkEvents(\"2016-04-17\")'>Check events</a>",
	'04-18-2016':"<a onClick='checkEvents(\"2016-04-18\")'>Check events</a>",
	'04-19-2016':"<a onClick='checkEvents(\"2016-04-19\")'>Check events</a>",
	'04-20-2016':"<a onClick='checkEvents(\"2016-04-20\")'>Check events</a>",
	'04-21-2016':"<a onClick='checkEvents(\"2016-04-21\")'>Check events</a>",
	'04-22-2016':"<a onClick='checkEvents(\"2016-04-22\")'>Check events</a>"
});

var accordionTemplate = '<div class="panel-heading" role="tab" id="headingOne">\
		<h4 class="panel-title">\
			<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#{{titleNoSpace}}" aria-expanded="{{expanded}}" aria-controls="{{titleNoSpace}}">\
				{{title}}\
			</a>\
		</h4>\
	</div>\
	<div id="{{titleNoSpace}}" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="{{title}}">\
		<div class="panel-body">\
			<img src="{{bannerUrl}}" style="width: 100%"/>\
			Type: {{type}} <br />\
			Time: {{time}} <br />\
			Location: {{location}} <br />\
			Description: {{description}} <br />\
			<a href="{{details}}"><button class="btn btn-success">More details</button></a>\
		</div>\
	</div>';

function checkEvents(date) {
	$.ajax({
		url: '/api/getEvents',
		type: 'GET',
		dataType: 'JSON',
		data: {
			date: date
		},
		success: function(response) {
			var count = 0;
			var toReplace = "";
			$.each(response, function(key, val) {
				var noSpaceTitle = val.title.replace(" ", "");
				var tmp = accordionTemplate;
				var expanded = count == 0 ? "true" : "false";

				var link = "event/"+val.id;


				tmp = tmp.replace(/{{title}}/g, val.title);
				tmp = tmp.replace(/{{titleNoSpace}}/g, noSpaceTitle);
				tmp = tmp.replace("{{description}}", val.description);
				tmp = tmp.replace("{{time}}", val.time);
				tmp = tmp.replace("{{location}}", val.location);
				tmp = tmp.replace("{{expanded}}", expanded);
				tmp = tmp.replace("{{details}}", link);
				tmp = tmp.replace("{{bannerUrl}}", val.banner);
				tmp = tmp.replace("{{type}}", val.type);
				toReplace += tmp;
				count++;
			});
			$('#accordionPanel').html(toReplace);
			$('#date').html(date);
			$('#eventsModal').modal('show');
		}
	})
}
