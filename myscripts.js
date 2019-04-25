$(function(){
	$("#changeOfNameYes").removeAttr("checked");
	$("#changeOfNameNo").removeAttr("checked");
	$("#otherResetButton, #officialResetButton, #promotionResetButton, #contactResetButton, #nextOfKinResetButton, #qualificationResetButton, #NYSCResetButton, #personalResetButton").button({
		icons:{
			primary: "ui-icon-trash"
			
			}});
	
	

	//links made buttons
	$("#personalNext, #personalClear, #otherNext, #otherClear, #otherPrevious, #officialNext, #officialClear, #officialPrevious, #promotionNext, #promotionClear, #promotionPrevious, #submitPromotion, #morePromotion, #contactPrevious, #contactClear, #contactNext, #nextOfKinPrevious, #nextOfKinNext, #nextOfKinClear, #qualificationNext, #qualificationClear, #qualificationPrevious, #submitQualification").button();
		// end of links made buttons

	
	
	// arrows

	$("#moreQualification, #morePromotion").button({
		icons:{
			primary: "ui-icon-plus"
			
			}
		});
		
	$("#submitPromotion, #submitQualification").button({
		icons:{
			secondary: "ui-icon-arrow-1-n"
			
			}
		});
		
	$("#otherPrevious, #officialPrevious,  #promotionPrevious, #contactPrevious, #nextOfKinPrevious, #qualificationPrevious, #NYSCPrevious").button({
		icons:{
			primary: "ui-icon-arrowreturnthick-1-w"
			
			}
		});
		
	
		
	$("#personalNext, #officialNext,  #promotionNext, #contactNext, #qualificationNext, #nextOfKinNext, #otherNext, #NYSCNext").button({
		icons:{
			secondary: "ui-icon-triangle-1-e"
			
			}
		});
		
	
	// end of arrows
	
	
			
$("#state").change(function(){
                     var stateValue=$("#state").val();
                     $.post("backend/ajax.php?getLga=yes",{stateValue:stateValue},
					 function(data)
					 	{
                              $("#lga").html(data);
                        })
	});


$("#faculty").change(function(){
                     var facultyValue=$("#faculty").val();
                     $.post("backend/ajax.php?getDepartment=yes",{facultyValue:facultyValue},
					 function(data)
					 	{
                              $("#departmentOrUniOrCenter").html(data);
                        })
	});


$("#dateOfConfirmation, #dateOfBirth, #dateOfFirstAppointment, #dateOfCurrentAppointment, #promotionDate, #yearObtained").datepicker({
	changeMonth: true,
      		changeYear: true,
			dateFormat: "dd-mm-yy"});





	$(":radio").click(function(){
		
		$("#changeOfNameYes").is(":checked")? $(".changeOfnametextBox").show():$(".changeOfnametextBox").hide();
		
				
		});
		
	$("#personalNext").click(function(e){
		e.preventDefault();
		
			if( $("#pfNumber").val()=="")
			{
				$("#personalErrormessage").html("<p>Please provide information for the field(s) marked red</p>");
				 $("#pfNumber").addClass("errorClass")
				 $("#personalErrormessage").fadeIn(4000,function(){
					$("#personalErrormessage").fadeOut(4000);	
					
					});
				
			
			}
			else if( $("#surname").val()=="")
			{
				$("#personalErrormessage").html("<p>Please provide information for the field(s) marked red</p>");
				 $("#surname").addClass("errorClass")
				 $("#personalErrormessage").fadeIn(4000,function(){
					$("#personalErrormessage").fadeOut(4000);	
					
					});
			}
			else if( $("#firstName").val()=="")
			{
				$("#personalErrormessage").html("<p>Please provide information for the field(s) marked red</p>");
				 $("#firstName").addClass("errorClass")
				 $("#personalErrormessage").fadeIn(4000,function(){
					$("#personalErrormessage").fadeOut(4000);	
					
					});
			}
			else if( $("#middleName").val()=="")
			{
				$("#personalErrormessage").html("<p>Please provide information for the field(s) marked red</p>");
				 $("#middleName").addClass("errorClass")
				 $("#personalErrormessage").fadeIn(4000,function(){
					$("#personalErrormessage").fadeOut(4000);	
					
					});
			}
			else if( $("#maidenName").val()=="")
			{
				$("#personalErrormessage").html("<p>Please provide information for the field(s) marked red</p>");
				 $("#maidenName").addClass("errorClass")
				 $("#personalErrormessage").fadeIn(4000,function(){
					$("#personalErrormessage").fadeOut(4000);	
					
					});
			}
			else if( $("#title").val()=="--Select Title--")
			{
				$("#personalErrormessage").html("<p>Please provide information for the field(s) marked red</p>");
				 $("#title").addClass("errorClass")
				 $("#personalErrormessage").fadeIn(4000,function(){
					$("#personalErrormessage").fadeOut(4000);	
					
					});
			}
			else if( $("#gender").val()=="---Select Gender---")
			{
				$("#personalErrormessage").html("<p>Please provide information for the field(s) marked red</p>");
				 $("#gender").addClass("errorClass")
				 $("#personalErrormessage").fadeIn(4000,function(){
					$("#personalErrormessage").fadeOut(4000);	
					
					});
			}
			else if( $("#maritalStatus").val()=="--Select Marital Status--")
			{
				$("#personalErrormessage").html("<p>Please provide information for the field(s) marked red</p>");
				 $("#maritalStatus").addClass("errorClass")
				 $("#personalErrormessage").fadeIn(4000,function(){
					$("#personalErrormessage").fadeOut(4000);	
					
					});
			}
			
			else
			{
				
		$(".personalClosingDiv").slideUp(2000,function(){
			//returned message for the save record operation
			$(".closingDivForOther").slideDown(2000,function(){})
			});
		
				
			}
		});


		
		
		
		
		
		
		
		
		
		
	$("#otherNext").click(function(e){
		e.preventDefault();
		
		if($("#homeTown").val()=="" ||  $("#nationality").val()=="--Select Country--" ||  $("#state").val()=="--Select State--" ||  $("#lga").val()=="--Select LGA--" || $("#dateOfBirth").val()=="" || $("#dateOfBirth").val()=="" ||  $("#placeOfBirth").val()=="" || $("#religion").val()=="---Select Religion---" || $("#pension").val()=="--Select PFA--")
		{
				$("#homeTown").val()==""? $("#homeTown").addClass("errorClass"):$("#homeTown").removeClass("errorClass");
				$("#nationality").val()=="--Select Country--"? $("#nationality").addClass("errorClass"):$("#nationality").removeClass("errorClass");
				 $("#state").val()=="--Select State--"? $("#state").addClass("errorClass"):$("#state").removeClass("errorClass");
				 $("#lga").val()=="--Select LGA--"? $("#lga").addClass("errorClass"):$("#lga").removeClass("errorClass");
				$("#dateOfBirth").val()==""? $("#dateOfBirth").addClass("errorClass"):$("#dateOfBirth").removeClass("errorClass");
				$("#placeOfBirth").val()==""? $("#placeOfBirth").addClass("errorClass"):$("#placeOfBirth").removeClass("errorClass");
				$("#religion").val()=="---Select Religion---"? $("#religion").addClass("errorClass"):$("#religion").removeClass("errorClass");
				$("#pension").val()=="--Select PFA--"? $("#pension").addClass("errorClass"):$("#pension").removeClass("errorClass");
		
				$("#otherErrormessage").html("<p>Please provide information for the field(s) marked red</p>");
				 $("#otherErrormessage").fadeIn(1000,function(){
				$("#otherErrormessage").fadeOut(5000);
				 })
			
		}else{
			$(".closingDivForOther").slideUp(2000,function(){
			//returned message for the save record operation
			$(".closingDivForOfficial").slideDown(2000,function(){})
			})
		}
	});
	
		
$("#officialNext").click(function(e){
	e.preventDefault();
		
	if($("#staffCategory").val()=="--Select Appointment Type--" ||  $("#dateOfFirstAppointment").val()=="" ||  $("#dateOfCurrentAppointment").val()=="" ||  $("#appointmentType").val()=="--Select Appointment Type--" || $("#designationAtAppointment").val()=="--Select Designation--" || $("#presentDesignation").val()=="--Present Designation--" ||  $("#faculty").val()=="--Select Faculty--" || $("#departmentOrUniOrCenter").val()=="--Select Department--" || $("#dateOfConfirmation").val()=="")
		{
				$("#staffCategory").val()=="--Select Appointment Type--" ? $("#staffCategory").addClass("errorClass"):$("#staffCategory").removeClass("errorClass");
				$("#dateOfFirstAppointment").val()==""? $("#dateOfFirstAppointment").addClass("errorClass"):$("#dateOfFirstAppointment").removeClass("errorClass");
				 $("#dateOfCurrentAppointment").val()==""? $("#dateOfCurrentAppointment").addClass("errorClass"):$("#dateOfCurrentAppointment").removeClass("errorClass");
				$("#appointmentType").val()=="--Select Appointment Type--"? $("#appointmentType").addClass("errorClass"):$("#appointmentType").removeClass("errorClass");
				$("#designationAtAppointment").val()=="--Select Designation--"? $("#designationAtAppointment").addClass("errorClass"):$("#designationAtAppointment").removeClass("errorClass");
				$("#presentDesignation").val()=="--Present Designation--"? $("#presentDesignation").addClass("errorClass"):$("#presentDesignation").removeClass("errorClass");
				$("#faculty").val()=="--Select Faculty--"? $("#faculty").addClass("errorClass"):$("#faculty").removeClass("errorClass");
				$("#departmentOrUniOrCenter").val()=="--Select Department--" ? $("#departmentOrUniOrCenter").addClass("errorClass"):$("#departmentOrUniOrCenter").removeClass("errorClass");
				$("#dateOfConfirmation").val()=="" ? $("#dateOfConfirmation").addClass("errorClass"):$("#dateOfConfirmation").removeClass("errorClass");

				$("#officialErrormessage").html("<p>Please provide information for the field(s) marked red</p>");
				$("#officialErrormessage").fadeIn(1000,function(){
				$("#officialErrormessage").fadeOut(5000);
				 })
			
		}else{
			$(".closingDivForOfficial").slideUp(2000,function(){
			//returned message for the save record operation
			$(".closingDivForPromotion").slideDown(2000,function(){})
			})
		}

});
		
	$("#promotionNext").click(function(e){
		e.preventDefault();
	
		$(".closingDivForPromotion").slideUp(2000,function(){
			//returned message for the save record operation
			$(".closingDivForContact").slideDown(2000,function(){})
			})
		});



$("#submitPromotion").click(function(e){
		e.preventDefault();
	if($("#allPromotionsAndRanks").val()=="-- Rank--" ||  $("#levels").val()=="-- Level--" ||  $("#steps").val()=="-- Steps--" || $("#promotionDate").val()=="")
		{
				$("#allPromotionsAndRanks").val()=="-- Rank--"? $("#allPromotionsAndRanks").addClass("errorClass"):$("#allPromotionsAndRanks").removeClass("errorClass");
				$("#levels").val()=="-- Level--"? $("#levels").addClass("errorClass"):$("#levels").removeClass("errorClass");
				 $("#steps").val()=="-- Steps--"? $("#steps").addClass("errorClass"):$("#steps").removeClass("errorClass");
				$("#promotionDate").val()==""? $("#promotionDate").addClass("errorClass"):$("#promotionDate").removeClass("errorClass");

				$("#promotionErrormessage").html("<p>Please provide information for the field(s) marked red</p>");
				$("#promotionErrormessage").fadeIn(1000,function(){
				$("#promotionErrormessage").fadeOut(5000);
				 })
			
		}else{
			
			
			
			
		}

	
		
		
	
		
		});



	$("#contactNext").click(function(e){
		e.preventDefault();
		$(".closingDivForContact").slideUp(2000,function(){
			//returned message for the save record operation
			$(".nextOfKinClosingDiv").slideDown(2000,function(){})
			})
		});
	
	$("#nextOfKinNext").click(function(e){
		e.preventDefault();
		$(".nextOfKinClosingDiv").slideUp(2000,function(){
			//returned message for the save record operation
			$(".closingDivForQualification").slideDown(2000,function(){})
			})
		});
	
	$("#qualificationNext").click(function(e){
		e.preventDefault();
		$(".closingDivForQualification").slideUp(2000,function(){
			//returned message for the save record operation
			$(".closingDivForNYSC").slideDown(2000,function(){})
			})
		});




$("#NYSCPrevious").click(function(e){
		e.preventDefault();
		
		
		$("#previousDialog").dialog({
	
	title:"Establishment Messages",
	height:200,
	width:500,
	modal: true,
	resizable: false,
	draggable: false,
	buttons:[
			{text: "OK!",
			click: function(){
				alert("You said OK");
				$(this).dialog("close")
				$(".closingDivForNYSC").slideUp(2000,function(){
			//returned message for the save record operation
			$(".closingDivForQualification").slideDown(2000,function(){})
			})
				}
			
			},
			{text: "Cancel!",
			click: function(){
				$(this).dialog("close")
				}
			
			
			}
			 	]
	
	});


		});
	


		
$("#loginDialog").dialog({
	
	title:"Establishment Gateway",
	 show: {
			effect: "blind",
			duration: 1000
			},
	hide: {
			effect: "explode",
			duration: 1000
			},
	height:400,
	width:500,
	//disabled: true,
	modal: true,
	resizable: false,
	draggable: false,
	buttons:[
			{text: "OK!",
			click: function(){
					if($("#txtusername").val()=="" || $("#txtUserPassword").val()=="" )
					{
						$("#txtusername").val()==""?$("#txtusername").addClass("errorClass"): $("#txtusername").removeClass("errorClass");
						$("#txtUserPassword").val()==""?$("#txtUserPassword").addClass("errorClass"): $("#txtUserPassword").removeClass("errorClass");
					
					$("#loginError").html("<b>Please Enter Your User Account Parameter(s) (UAP)</b>");
					$("#loginError").fadeIn(4000,
						function()
							{
								$("#loginError").fadeOut(4000);	
					
							}
					);
					}
					else
					{
						
						$.post("backend/ajax.php?validation=yes",{userFromBrowser: $("#txtusername").val() , passwordFromBrowser: $("#txtUserPassword").val()},
						function(data)
						{ 
						
						
							if(data=="1")
							{
																
								$("#loginError").html("<b>Your User Account Parameter(s) (UAP) is/are not valid</b>");
									$("#loginError").fadeIn(4000,
										function()
											{
												$("#loginError").fadeOut(4000);	
									
											}
								);
								
							}else{
																
								
													
								$("#loginDialog").dialog("close");
								var obj = jQuery.parseJSON(data);
								$("#pfNumber").val(obj.pfnumber);
								$("#surname").val(obj.surname);
								$("#othernames").val(obj.othernames);
								$("#title").val(obj.title);
													
								
								$(".personalClosingDiv").slideDown(2000);	
								
								
																
								
							}
							
						});
						
						
						
						
						
						
						
						
					
					}
				}
			
			}
			 	]
	
	});


		
	


	
$("#qualificationPrevious").click(function(e){
		e.preventDefault();
		
		
		$("#previousDialog").dialog({
	
	title:"Establishment Messages",
	height:200,
	width:500,
	modal: true,
	resizable: false,
	draggable: false,
	buttons:[
			{text: "OK!",
			click: function(){
				alert("You said OK");
				$(this).dialog("close")
				$(".closingDivForQualification").slideUp(2000,function(){
			//returned message for the save record operation
			$(".nextOfKinClosingDiv").slideDown(2000,function(){})
			})
				}
			
			},
			{text: "Cancel!",
			click: function(){
				$(this).dialog("close")
				}
			
			
			}
			 	]
	
	});


		});
	

$("#nextOfKinPrevious").click(function(e){
		e.preventDefault();
		
		
		$("#previousDialog").dialog({
	
	title:"Establishment Messages",
	height:200,
	width:500,
	modal: true,
	resizable: false,
	draggable: false,
	buttons:[
			{text: "OK!",
			click: function(){
				alert("You said OK");
				$(this).dialog("close")
				$(".nextOfKinClosingDiv").slideUp(2000,function(){
			//returned message for the save record operation
			$(".closingDivForContact").slideDown(2000,function(){})
			})
				}
			
			},
			{text: "Cancel!",
			click: function(){
				$(this).dialog("close")
				}
			
			
			}
			 	]
	
	});


		});
	

	
	
	



	
	
	
	$("#contactPrevious").click(function(e){
		e.preventDefault();
		
		
		$("#previousDialog").dialog({
	
	title:"Establishment Messages",
	height:200,
	width:500,
	modal: true,
	resizable: false,
	draggable: false,
	buttons:[
			{text: "Yes!",
			click: function(){
				alert("You said OK");
				$(this).dialog("close")
				$(".closingDivForContact").slideUp(2000,function(){
			//returned message for the save record operation
			$(".closingDivForPromotion").slideDown(2000,function(){})
			})
				}
			
			},
			{text: "No!",
			click: function(){
				$(this).dialog("close")
				}
			
			
			}
			 	]
	
	});


		});
		
	$("#promotionPrevious").click(function(e){
		e.preventDefault();
		$("#previousDialog").dialog({
	
	title:"Establishment Messages",
	height:200,
	width:500,
	modal: true,
	resizable: false,
	draggable: false,
	buttons:[
			{text: "Yes!",
			click: function(){
				alert("You said OK");
				$(this).dialog("close");
				$(".closingDivForPromotion").slideUp(2000,function(){
			//returned message for the save record operation
			$(".closingDivForOfficial").slideDown(2000,function(){})
			})
				
				
				}
			
			},
			{text: "No!",
			click: function(){
				$(this).dialog("close")
				}
			
			
			}
			 	]
	
	});
				
		});
		
	$("#officialPrevious").click(function(e){
		e.preventDefault();
		
		$("#previousDialog").dialog({
	
	title:"Establishments Report",
	height:200,
	width:500,
	modal: true,
	resizable: false,
	draggable: false,
	buttons:[
			{text: "Yes!",
			click: function(){
				alert("You said OK");
				$(this).dialog("close");
				$(".closingDivForOfficial").slideUp(2000,function(){
			//returned message for the save record operation
			$(".closingDivForOther").slideDown(2000,function(){})
			})
				
				}
			
			},
			{text: "No!",
			click: function(){
				$(this).dialog("close")
				}
			
			
			}
			 	]
	
	});
		
		});
		
	$("#otherPrevious").click(function(e){
		e.preventDefault();
		
		$("#previousDialog").dialog({
	
	title:"Establishment Messages",
	height:200,
	width:500,
	modal: true,
	resizable: false,
	draggable: false,
	buttons:[
			{text: "Yes!",
			click: function(){
				alert("You said OK");
				$(this).dialog("close");
				$(".closingDivForOther").slideUp(2000,function(){
			//returned message for the save record operation
			$(".personalClosingDiv").slideDown(2000,function(){})
			})
		
				
				}
			
			},
			{text: "No!",
			click: function(){
				$(this).dialog("close")
				}
			
			
			}
			 	]
	
	});
		});
		
	$("#contactClear").click(function(e){
		e.preventDefault();
		$("#permanentAddress").val("");
		$("#residentialAddress").val("");
		$("#emailAddress").val("");
		$("#gsmNumber").val("");
		
		});
	
	$("#personalClear").click(function(e){
		e.preventDefault();
		$("#pfNumber").val("");
		$("#surname").val("");
		$("#firstName").val("");
		$("#middleName").val("");
		$("#maidenName").val("");
		
		personalTitleHtml = '<option value="--Select Title--">--Select Title--</option><option value="Professor">Prof.</option><option value="Doctor">Dr.</option><option value="Mister">Mr.</option><option value="Miss">Miss</option><option value="Mrs">Mrs</option><option value="Mallam">Mallam</option><option value="Rev">Rev.</option><option value="Arch">Arch.</option><option value="Alh">Alh.</option>'
		$("#title").html(personalTitleHtml);
		
		personalGenderHtml = '<option value="---Select Gender---" selected ><b>---Select Gender---</b></option><option value="Female" class="selectionBoxes">Female</option><option value="Male" class="selectionBoxes">Male</option>';
		$("#gender").html(personalGenderHtml);
		
		personalMaritalStatusHtml = '<option value="--Select Marital Status--" selected ><b>--Select Marital Status--</b></option><option value="Single" class="selectionBoxes">Single</option><option value="Married" class="selectionBoxes">Married</option><option value="Divorcee" class="selectionBoxes">Divorcee</option><option value="Widow" class="selectionBoxes">Widow</option><option value="Widower" class="selectionBoxes">Widower</option><option value="Single Parent" class="selectionBoxes">Single Parent</option>';
		$("#maritalStatus").html(personalMaritalStatusHtml);
		
		$("#previousSurname").val("");
		$("#previousOthernames").val("");
		
		});
	
		
	$("#promotionClear").click(function(e){
		e.preventDefault();
		$("#promotionDate").val("");
		var myHtml ='<option value=selectLevel selected>-- Level--</option><option value=1>1</option><option value=2>2</option><option value=3>3</option><option value=4>4</option><option value=5>5</option><option value=6>6</option><option value=7>7</option><option value=8>8</option><option value=9>9</option>  <option value=10>10</option><option value=11>11</option><option value=12>12</option><option value=13>13</option><option value=14>14</option><option value=15>15</option>';
		var stepHtml ='<option value=selectLevel selected>-- Level--</option><option value=1>1</option><option value=2>2</option><option value=3>3</option><option value=4>4</option><option value=5>5</option><option value=6>6</option><option value=7>7</option><option value=8>8</option><option value=9>9</option>  <option value=10>10</option><option value=11>11</option><option value=12>12</option><option value=13>13</option><option value=14>14</option><option value=15>15</option><option value=16>16</option><option value=17>17</option><option value=18>18</option><option value=19>19</option><option value=20>20</option>';
                        
                        
                            
		$("#levels").html(myHtml);
		$("#steps").html(stepHtml);
		
		
		});
		

$("#qualificationClear").click(function(e){
		e.preventDefault();
		$("#qualificationType").val("");
		$("#nameOfSchool").val("");
		$("#yearObtained").val("");
		});

$("#nextOfKinClear").click(function(e){
		e.preventDefault();
		$("#nextOfKinSurname").val("");
		$("#nextOfKinFirstName").val("");
		$("#nextOfKinMiddleName").val("");
		$("#nextOfKinPermanentAddress").val("");
		$("#nextOfKinEmail").val("");
		$("#nextOfKinPhone").val("");
		$("#nextOfKinrRelationship").val("");

		});
$("#contactClear").click(function(e){
		e.preventDefault();
		$("#permanentAddress").val("");
		$("#residentialAddress").val("");
		$("#emailAddress").val("");
		$("#nextOfKinPermanentAddress").val("");
		$("#nextOfKinEmail").val("");
		$("#nextOfKinPhone").val("");
		$("#nextOfKinrRelationship").val("");

		});


	
		
	$("#NYSCClear").click(function(e){
		e.preventDefault();
		var NYSCTypeHtml ='<option value="--Select Certificate Type--">--Select Certificate Type--</option><option value="dischargedCertificate"> Discharged Certificate</option><option value="exemption"> Exemption</option>';
		
 NYSCYearHtml ='<option value="--Select Year--">--Select Year--</option><option value="1940">1940</option><option value="1941">1941</option><option value="1942">1942</option><option value="1943">1943</option><option value="1944">1944</option><option value="1945">1945</option><option value="1946">1946</option><option value="1947">1947</option><option value="1948">1948</option><option value="1949">1949</option><option value="1950">1950</option><option value="1951">1951</option><option value="1952">1952</option><option value="1953">1953</option><option value="1954">1954</option><option value="1955">1955</option><option value="1956">1956</option><option value="1957">1957</option><option value="1958">1958</option><option value="1959">1959</option><option value="1960">1960</option><option value="1961">1961</option><option value="1962">1962</option><option value="1963">1963</option><option value="1964">1964</option><option value="1965">1965</option><option value="1966">1966</option><option value="1967">1967</option><option value="1968">1968</option><option value="1969">1969</option><option value="1970">1970</option><option value="1971">1971</option><option value="1972">1972</option><option value="1973">1973</option><option value="1974">1974</option><option value="1975">1975</option><option value="1976">1976</option><option value="1977">1977</option><option value="1978">1978</option><option value="1979">1979</option><option value="1980">1980</option><option value="1981">1981</option><option value="1982">1982</option><option value="1983">1983</option><option value="1984">1984</option><option value="1985">1985</option><option value="1986">1986</option><option value="1987">1987</option><option value="1988">1988</option><option value="1989">1989</option><option value="1990">1990</option><option value="1991">1991</option><option value="1992">1992</option><option value="1993">1993</option><option value="1994">1994</option><option value="1995">1995</option><option value="1996">1996</option><option value="1997">1997</option><option value="1998">1998</option><option value="1999">1999</option><option value="2000">2000</option><option value="2001">2001</option><option value="2002">2002</option><option value="2003">2003</option><option value="2004">2004</option><option value="2005">2005</option><option value="2006">2006</option><option value="2007">2007</option><option value="2008">2008</option><option value="2009">2009</option><option value="2010">2010</option><option value="2011">2011</option><option value="2012">2012</option><option value="2013">2013</option><option value="2014">2014</option><option value="2015">2015</option><option value="2016">2016</option><option value="2017">2017</option><option value="2018">2018</option><option value="2019">2019</option><option value="2020">2020</option><option value="2021">2021</option><option value="2022">2022</option><option value="2023">2023</option><option value="2024">2024</option><option value="2025">2025</option><option value="2026">2026</option><option value="2027">2027</option><option value="2028">2028</option><option value="2029">2029</option><option value="2030">2030</option><option value="2031">2031</option><option value="2032">2032</option><option value="2033">2033</option><option value="2034">2034</option><option value="2035">2035</option><option value="2036">2036</option><option value="2037">2037</option><option value="2038">2038</option>';
                    
		$("#NYSCCertificateType").html(NYSCTypeHtml);
		$("#NYSCYear").html(NYSCYearHtml);
		
		
		});
	
	
	
	

});