$(function(){
	initCountDown();
	// initMap();
});

function initCountDown() {
	var newDate = new Date(2021, 10, 20, 12); // luna - 1 => aprilie = 3 in loc de 4
	$('#countdown-ex4').countdown({until: newDate});

}

function initMap() {
	// Google Map
	jQuery('#headquarters-map').gMap({
		address: 'Melbourne, Australia',
		maptype: 'ROADMAP',
		zoom: 14,
		markers: [
			{
				address: "Melbourne, Australia",
				html: "Melbourne, Australia"
			}
		],
		doubleclickzoom: false,
		controls: {
			panControl: false,
			zoomControl: false,
			mapTypeControl: false,
			scaleControl: false,
			streetViewControl: false,
			overviewMapControl: false
		}
	});
}

function subscribeToNewsletter() {
	var email = $('#email').val();
	if(email == '') {
		alert('Email is not valid!');
		return;
	}

	$.ajax({
		url: '/api/saveEmail',
		method: 'POST',
		dataType: 'json',
		data: {
			email: email
		},
		success: function(response) {
			if(response.success == 1) {
				toastr.success('Thank you for subscribing!');
				$('#email').val('');
			} else {
				toastr.error(response.message);
			}
		},
		error: function(response) {
			toastr.success('Thank you for subscribing!');
			$('#email').val('');
		}
	});
}

function acceptGDPR() {
	console.log("intra in functie")
	let x = document.getElementById("gdpr")
	let checkBox = document.getElementById("accept");
	if (checkBox.checked == true) {
		console.log("accept");
		x.style.display = "block";
	} else {
		console.log("not accept");
		x.style.display = "none";
	}
}

function showSchoolInput(fieldId, checkboxId) {
	let x = document.getElementById(fieldId)
	let checkBox = document.getElementById(checkboxId);
	console.log(checkBox)
	if (checkBox.checked == true) {
		console.log("accept");
		x.style.display = "block";
	} else {
		console.log("not accept");
		x.style.display = "none";
	}
}
function showDetailsGdpr() {
	console.log("intra in functie")
	let x = document.getElementById("detailsGdpr")
	let checkBox = document.getElementById("showGdpr");
	if (checkBox.checked == true) {
		console.log("accept");
		x.style.display = "block";
	} else {
		console.log("not accept");
		x.style.display = "none";
	}
}

function signupTeam() {
	var teamName = $('#team-name').val();
	var teamJoke = $('#team-joke').val();
	var teamTheme = $('#team-theme').val();
	var teamLeadName = $('#member1-name').val();
	var teamLeadEmail = $('#member1-email').val();
	var teamLeadPhone = $('#member1-phone').val();
	var teamLeadSchool = $('#member1-school').val();
	var questions = $('#questions').val();

	if(teamName == '' || teamLeadEmail == '' || teamLeadName == '' || teamLeadPhone == '' || teamJoke == '' || teamTheme == '') {
		alert('Team name, team leader name, team leader email, team leader phone, presentation link or technologies cannot be empty!');
		return;
	}

	$.ajax({
		url: '/api/addTeam',
		method: 'POST',
		dataType: 'json',
		data: {
			team: teamName,
			joke: teamJoke,
			theme: teamTheme,
			teamLeadName: teamLeadName,
			teamLeadEmail: teamLeadEmail,
			teamLeadPhone: teamLeadPhone,
			teamLeadSchool: teamLeadSchool,
			questions: questions,

			member2Name: $('#member2-name').val(),
			member2Email: $('#member2-email').val(),
			member2Phone: $('#member2-phone').val(),
			member2School: $('#member2-school').val(),
			
			member3Name: $('#member3-name').val(),
			member3Email: $('#member3-email').val(),
			member3Phone: $('#member3-phone').val(),
			member3School: $('#member3-school').val(),
			
			member4Name: $('#member4-name').val(),
			member4Email: $('#member4-email').val(),
			member4Phone: $('#member4-phone').val(),
			member4School: $('#member4-school').val()
		},
		success: function(response) {
			if(response.success == 1) {
				toastr.success('Thank you for signing up!');
				$('#team-name').val("");
				$('#team-joke').val("");
				$('#team-theme').val("");
				$('#questions').val("");

				$('#member1-name').val("");
				$('#member1-email').val("");
				$('#member1-phone').val("");
				$('#member1-school').val("");

				$('#member2-name').val("");
				$('#member2-email').val("");
				$('#member2-phone').val("");
				$('#member2-school').val("");

				$('#member3-name').val("");
				$('#member3-email').val("");
				$('#member3-phone').val("");
				$('#member3-school').val("");

				$('#member4-name').val("");
				$('#member4-email').val("");
				$('#member4-phone').val("");
				$('#member4-school').val("");
			} else {
				toastr.error(response.message);
			}
		},
		error: function(response) {
			toastr.error('There was a problem! Please try again later!');
		}
	});
}

function showFullTimeline() {
	if(!$('.hiddenItem').is(':visible')) {
		$('.hiddenItem').show('slow');
		$('#showTimelineBtn').html("Hide timeline");
	} else {
		$('.hiddenItem').hide('slow');
		$('#showTimelineBtn').html("Show full timeline");
	}
}
