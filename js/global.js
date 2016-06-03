$(function(){
	// funtion for Edit => Update
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
	// Funtion for Delete data
	$(".edit").click(function(e){ 
		var r = confirm("Do you want to Delete This Record?");
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
    // Remove div notif error
    function remove(){
    	$('#error_name').fadeOut().remove();
    	$('#error_email').fadeOut().remove();
    	$('#error_phone').fadeOut().remove();
    	$('#error_content').fadeOut().remove();
    }
    var d = new Array("name", "email", "phone","content");
	// Funtion for button send
	$(".btn").click(function(){
		//alert(error_element);
		var s ="";
		remove();
		for (var i = 0; i < 3; i++) {
			if (!check($('#txt_'+d[i]), re[i])){
				$('#txt_' + d[i]).after("<div id='error_" +d[i] +"'>"+err[i]+'</div>');
				return false;	
			}
			
		}		
		if ($('#txt_content').val() == ""){
			$('#txt_content').after('<div id ="error_content">'+err[3]+'</div>');
			return false;
		}		
		Send();						
		return false;		
	});
	function check_err_server(s){
		remove();
		for(var i = 0; i < 4; i++){
			if (s == err[i]){
				$('#txt_' + d[i]).after("<div id='error_" +d[i] +"'>"+err[i]+'</div>');
				return false;	
			}
		}
	}
	var err;
	err= Array('Only letters and white space allowed', "Invalid email format", "Only numbers allowed", "Content is not allowed to be empty");
	re = Array( /^[^\W]*$/, /^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/, /^[0-9]*$/);
	$(".btnadd").click(function(){
		modal.modal('toggle');
		//Send();
		//mov();
	});
	$('#txt_name').on('input', function() {
		var input=$(this);		
		//var re = /^[a-zA-Z ]*$/;				
		if(check(input, re[0])){
			input.removeClass("invalid").addClass("valid");
		}
		else{
			input.removeClass("valid").addClass("invalid");
			//alert(err[0]);
		}
	});

	$('#txt_email').on('input', function() {
		var input=$(this);		
		//var re = /^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/;		
		//var is_email=re.test(input.val());
		if(check(input,re[1])){
			input.removeClass("invalid").addClass("valid");
		}
		else{
			input.removeClass("valid").addClass("invalid");
		}
	});
	
	$('#txt_phone').on('input', function() {
		var input=$(this);
		//var re = /^[0-9]*$/;	
		if(check(input, re[2])){
			input.removeClass("invalid").addClass("valid");
		}
		else{
			input.removeClass("valid").addClass("invalid");
			//alert(error_phone);
		}
	});
	// check input
	function check(input, re){
		var is_smt = re.test(input.val());
		if(input.val() == "") return 0;
		return(is_smt);
	}
	var modal = $('#id01');
	$('.close').click(function(){
		$('#id01').modal('hide');
	});

	// When the user clicks anywhere outside of the modal, close it
	window.onclick = function(event) {
		if (event.target == modal) {
			$('#id01').modal('hide');
		}
	}
	//click contact ind indec.php
	$(".act").click(function(){
		modal.modal('toggle');
	});				
	function mov(){
		$('#myTable tr:last').insertBefore('table > tbody > tr:first');
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
			})
			.done(function(response){
				
				var t = JSON.parse(response);
					// Step 1: Get variable data from reponse 
					// Step 2: Write HTML code
					var html_content = "<tr><td class = 'c_id'>" + t.id + 
					"</td><td class = 'c_Name'>" + t.name +
					"</td><td class = 'c_Email'>" + t.email +
					"</td><td class = 'c_Phone'>" + t.phone +
					"</td><td class = 'c_Content'>" + t.content +
					"</td><td><a class='editable' href='#'>Edit</a> <a class='edit' href='#'>Delete</a></td></tr>";
					//var $row = document.createElement(html_content);
					//$(html_content).insertBefore('table > tbody');
					$("#myTable tbody").prepend(html_content);				
					$('#id01').modal('hide');
					//modal.modal('toggle');
				})
			.fail(function(jqXHR, textStatus, errorThrown){				
				// console.log(jqXHR);
				// console.log(textStatus);
				// console.log(errorThrown);
				check_err_server(jqXHR.responseText);
				//alert(jqXHR.responseText);
				//alert("Fail");			
			});
		}		
	}

	var myVar;

	function myFunction() {
		myVar = setTimeout(showPage, 3000);
	}

	function showPage() {
		$("#loader").style.display = "none";
		$("#myDiv").style.display = "block";
	}
	
});

