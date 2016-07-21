(function($) {	
	
	$(document).ready(function (){
		$('#edit-field-select-institute-und').change(function(){
		var section=$("#edit-field-select-institute-und").val();
		
		$.ajax({
					type: 'get',   
					url: 'http://172.16.0.9/PROJECTS/Socbeez/trunk1/teacher', 
					data:{
						'section' : section       				
					},			
					success: function(response){
						alert(response);
					},
						          		
				});	
       });
	});
})(jQuery);
