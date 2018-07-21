// Header file js code
$(document).ready(function(e) {
    $(".profile_picture").click(function(){
		$(".option_menu_div").slideToggle('fast');
	});
	
	/*$(".SearchBox").keyup(function(){
		var input_search_data = $(this).val().trim();
		//alert(input_search_data);
		if(input_search_data != ""){
		  $(".drop_down_list_for_search").slideDown('fast');	
		}else{
		  $(".drop_down_list_for_search").slideUp('fast');
		}		
	});
	*/
});