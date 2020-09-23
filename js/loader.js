$(document).ready(function(){
	$('.modal').modal();
	$('select').formSelect();
	 $('.parallax').parallax();
	 $('.sidenav').sidenav();
	 $(".slider").slider({height:500});
	 $(".myreviews").carousel({
		 numVisible:7,
		 shift:55,
		 padding:55
	 });
})
function toggleModal(){
	var instance=M.Modal.getInstance($('#modal3'));
	instance.open();
}