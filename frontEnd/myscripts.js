// JavaScript Document
$(function()
{
	$("#matricno").val()=="";	
$("#submitButton").click(function(e){
	e.preventDefault();
	if($("#matricno").val()=="")
		{
		$("#matricError").css("color","red");
		$("#matricError").html("Matriculation Number cannot be empty");
		$("#matricError").fadeIn(2000,function(){
			
			$("#matricError").fadeOut(2000);
			
			});


		
		}else if($("#surname").val()=="")
		{
		$("#surnameError").css("color","red");
		$("#surnameError").html("surname cannot be empty");
		$("#surnameError").fadeIn(2000,function(){
			
			$("#surnameError").fadeOut(2000);
			
			});


		
		} else if($("#programmeType").val()=="--Select Programme--")
		{
		$("#programmeTypeError").css("color","red");
		$("#programmeTypeError").html("Select a programme");
		$("#programmeTypeError").fadeIn(2000,function(){
			
			$("#programmeTypeError").fadeOut(2000);
			
			});


		
		}else if($("#gender").val()=="--Select Gender--")
		{
			$("#genderError").css("color","red");
			$("#genderError").html("Select gender");
			$("#genderError").fadeIn(2000,function(){
				
				$("#genderError").fadeOut(2000);
				
				});
	    

		
		} else{
			$.post("backEnd/ajax.php?sendingFromScript=yes",{matricNo:$("#matricno").val(), surname:$("#surname").val(), firstName:$("#firstName").val(), middleName:$("#middleName").val(), dateOfBirth: $("#dateOfBirth").val(), programme:$("#programmeType").val(), gender:$("#gender").val()},function(data){
				alert(data);
				if(data=="1" || data=="2" || data=="3")
				{
					alert("There was an error in database connect");
				
				}else{
					alert ("Your transaction was ok");
				}
				
				});
			
			}
		
		
	
	
	});	
	
	$("#dateOfBirth").datepicker({
		changeMonth: true,
		changeYear: true,
		dateFormat: "yy-mm-dd"
		});
	
});