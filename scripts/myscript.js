$('#mobi-menu').click(toggleMenu);
$('#mobi-search').click(toggleSearch);

$(".noSelect").prop("selectedIndex", -1);
function toggleMenu(){
	$('nav').slideToggle();
}
function toggleSearch(){
	$('#search-container').slideToggle();
	console.log('hello');
}

function showElement(id){
	$(id).show().css( "display", "block");
}

function hideElement(){
	$('#reservation-btn').hide();
}
function showFields(className){
	if ($(className+".showprice").val()!==""){
		showElement(className);
	}
}
function checkNumeric(id){
	var error ="<small class=\"error\">Please enter valid input.</small>";	
	if (!$.isNumeric($(id).val())){
		hideElement()
		$('#error').empty();
		$('#error').append(error);
		$('.showprice').empty();
		$(id).val('');
		$(id).focus();
	} else {
		$('#error').empty();
	}	
}

function checkUpperLimit(input,limit){
	var error ="<small class=\"error\">Please enter valid input.</small>";	
	if(input>limit){
		return true;
	} else {
		return false;
	}	
}

$('#priceSelectAdults').keyup(function(event) {
	checkNumeric('#priceSelectAdults');
});

$('#priceSelectAdults').blur(function(event) {
	checkNumeric('#priceSelectAdults');	
});

$('#form_price').submit(function(event){
	event.preventDefault(event);
	var error ="<small class=\"error\">Please enter valid input.</small>";
	var input = parseInt($('#priceSelectAdults').val());
	var limit = parseInt($('#upperlimit').text());
	if (input=="" || !$.isNumeric(input) || input<=1 || checkUpperLimit(input,limit)){
		hideElement()
		$('.price-result').empty();
		$('#error').empty();
		$('#error').append(error);
		$('#priceSelectAdults').val('');
		$('#priceSelectAdults').focus();
	} else {
	$.ajax({
		type:"get",
		url:"TourPrice.php",
		data: $('#form_price').serialize(),
		success: function(data){
			var obj = data;
			var count = Object.keys(obj).length;
			var no_of_adults = $("#priceSelectAdults").val();
			$('#error,.price-result,.no_of_adults,.no_of_child05,.no_of_child612').empty();
			$(".no_of_adults").append(no_of_adults);						
			
				var code = "tour-only";
				var id = obj[0].id;				
				name = "Tour only";
				category = "";
				adult = obj[0].adult;
				thumbnail = "philippine-eagle-walking-tour-davao-tours.jpg";
				room = obj[0].roomtype;
				night = obj[0].nights;

				element = '<div id="'+code+'" data-thumbnail="'+thumbnail+'" data-name="No accommodation(tour only)" data-category="'+category+'" data-adult="'+adult+'" class="mnu-list">';
				element += '<div><img class="list-image" src="images/accommodations/'+thumbnail+'"></div>';
				element += '<div class="list-details">';
				element += '<div class="list-details">';				
				element += '<h3 class="type">'+name+'</h3>';
				element += '</div></div>';
				element +='<div class="col2">';					
				element += '<p class="price small-grey no-margin">'+adult+'<span class="small-grey no-margin">/person</span></p>';
				element += '<a href="#reservation" id="reservation-btn" class="reservation-btn submit pure-button pure-button-primary open-popup-link">Make Reservations</a>';
				element += '<a class="lightbox-40507630053444" style="cursor:pointer;color:blue;text-decoration:underline;">Have questions?</a>';
				element += '</div>';
				element +='<div class="spacer"></div>';				
				element += '</div>';
				if (id==1){
					element += '<p class="priceBelow">Prices of tour packages below are with '+night+' nights accommodation and daily breakfast</p>';					
				}
				$('.price-result').append(element);	
				//var IDmatch = '#^'+DST+'#i'
				if (id==1){
				for (var i=1;i<count;i++){
					var code = obj[i].code;
					name = obj[i].hotelname;
					category = obj[i].category;
					adult = obj[i].adult;					
					thumbnail = obj[i].thumbnail;
					room = obj[i].roomtype;	
					notes = obj[i].notes;
					nights = obj[i].nights;				
					element = '<div id="'+code+'" data-thumbnail="'+thumbnail+'" data-name="'+name+'" data-nights="'+nights+'"data-category="'+category+'" data-adult="'+adult+'" class="mnu-list">';
					element += '<div><img class="list-image" src="images/accommodations/'+thumbnail+'"></div>';
					element += '<div class="list-details">';
					element +='<div class="info">';
					element += '<h3 class="type">'+name+'</h3>';
					element += '<p class="small-grey no-margin">Category: <span>'+category+'</span></p>';
					element += '<p class="small-grey no-margin">Room type: <span>'+room+'</span></p>';
					element += '<p class="small-grey no-margin">Number of nights: <span>'+nights+' nights</span></p>';
					for (var index in notes){
						element += '<p class="small-grey no-margin">'+notes[index]+'</p>';
					}
					element += '</div></div>';
					element +='<div class="col2">';					
					element += '<p class="price mid-grey no-margin">'+adult+'<span class="small-grey no-margin">/person</span></p>';
					element += '<a href="#reservation" id="reservation-btn" class="reservation-btn submit pure-button pure-button-primary open-popup-link">Make Reservations</a>';					
					element += '<a class="lightbox-40507630053444" style="cursor:pointer;color:blue;text-decoration:underline;">Have questions?</a>';
					element += '</div>';
					element +='<div class="spacer"></div>';
					element += '</div>';
					$('.price-result').append(element);
				}}
					showElement('#reservation-btn');
					$('.open-popup-link').magnificPopup({
						type:'inline',
						midClick: true, // Allow opening popup on middle mouse click. Always set it to true if you don't provide alternative source in href.	
					});
					new JotformFeedback({
					formId:'40507630053444',
					base:'http://jotform.me/',
					windowTitle:'Contact Form',
					background:'#0096FF',
					fontColor:'#FFFFFF',
					type:false,
					height:400,
					width:500
					});
		},
		error: function(jqXHR,textStatus,errorThrown){
			alert(jqXHR.status);
		},
		dataType: 'json'
	})}
})

$(".price-result").on("click",".reservation-btn",function(event){
	event.preventDefault();
	var choice = '#'+$(this).parent().parent().attr("id");
	thumbnail = $(choice).data('thumbnail');
	code = $('#tourcode').text();
	thumblink = 'images/accommodations/'+thumbnail;
	adultprice = $(choice).data('adult');
	noAdult = $("#priceSelectAdults").val();
	accommodation = $(choice).attr("id");
	$('.adultprice,#form-thumbnail,#form-user-choice,.kid05price,.kid612price').empty();
	$('#form-thumbnail').attr('src',thumblink);
	$('#form-user-choice').append(name);
	$('.adultprice').append($(choice).data('adult'));
	$('#inqCode').attr("value",code);
	$('#inqAdultPrice').attr("value",adultprice);
	$('#inqAdult').attr("value",noAdult);
	$('#inqAccommodation').attr("value",accommodation);
})

$('.index-package').click(function(event){
	var clicked = $(this).data('package');
	link = 'tour.php?code='+clicked;
	//console.log(clicked);
	window.location = link;
});



