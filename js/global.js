// Get the modal
var modal = document.getElementById('id01');

		// When the user clicks anywhere outside of the modal, close it
		window.onclick = function(event) {
			if (event.target == modal) {
				modal.style.display = "none";

			}
		}				
// When user clicks send button	

function Send() {		
	var name = $('#txt_name').val();
	var email = $('#txt_email').val();
	var phone = $('#txt_phone').val();
	var content =$('#txt_content').val();
	var postData = "&name="+name+"&email="+email+"&phone="+phone+"&content="+content;			
	if (name != '' && email != '' && phone != '' && content != ''){
		$.ajax({
			url: "process.php",
			type: "POST",
			data: postData
		});

	}
}

var myVar;

function myFunction() {
	myVar = setTimeout(showPage, 3000);
}

function showPage() {
	document.getElementById("loader").style.display = "none";
	document.getElementById("myDiv").style.display = "block";
}
$(function(){
	$(".editable").click(function(e){        	
		var $this = $(this);
		var text = $this.text();
		var i, ceil1, text1, s, t;
		t = new Array("c_Name", "c_Email", "c_Phone","c_Content");
		if(text=="Edit"){
			$this.text("Update");
			var $row = $(this).closest("tr");    // Find the row
			
			for (var i = 0; i < 4; i++) {
				s ="." + t[i];
				ceil1 =  $row.find(s);
     			text1 =ceil1.text(); // Find the text
     			ceil1.replaceWith("<td><input class = '"+ t[i]+ "' value='" + text1 + "' id = inp"+ i+" /></td>");	
     		}	


     	}
     	else{
     		$this.text("Edit");
    		var $row = $(this).closest("tr");    // Find the row
    		ceil1 =  $row.find(".c_id");
    		var to = ceil1.text();
    		//alert(to);
    		var postData = "&id="+to+"&name="+$('#inp0').val()+"&email="+$('#inp1').val()+"&phone="+$('#inp2').val()+"&content="+$('#inp3').val();	
    		//alert(postData);
    		$.ajax({
    			url: "update.php",
    			type: "POST",
    			cache: false,
    			data: postData
    		});

    		for (var i = 0; i < 4; i++) {
    			s ="."+t[i];
    			ceil1 =  $row.find(s);
     			text1 =$('#inp'+i).val(); // Find the text     			
     			$('#inp'+i).replaceWith("<td class = '"+ t[i]+ "'>" + text1 + "</td>");	
     			//$('#inp0').text(text1);
     		}	
     	}
     });
	$(".edit").click(function(e){ 
		var r = confirm("Do you really want to delete it?");
		if (r == true){
			var $row = $(this).closest("tr"); 
			ceil1 =  $row.find(".c_id");
    		var to = ceil1.text();
    		//alert(to);
    		var postData = "&id="+to+"&name="+$('#inp0').val()+"&email="+$('#inp1').val()+"&phone="+$('#inp2').val()+"&content="+$('#inp3').val();	
    		//var $ele = $(this).parent().parent();
    		//alert(postData);
    		$.ajax({
    			url: "del.php",
    			type: "POST",
    			cache: false,
    			data: postData    		
    		});
    		$row.fadeOut().remove();
			
		}

	});

});

