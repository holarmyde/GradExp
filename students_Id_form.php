<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Student Form</title>
<link type="text/css" rel= "stylesheet" href= "../../../Users/david aremu/Desktop/Unnamed Site 2/Templates/style.css" media= "screen">
<link type="text/css" rel= "stylesheet" href= "../../../Users/david aremu/Desktop/Unnamed Site 2/Templates/css1/ui-lightness/jquery-ui-1.10.3.custom.css" media= "screen">
<script type="text/javascript" src="../../../Users/david aremu/Desktop/Unnamed Site 2/Templates/jas/jquery-1.9.1.js"></script>
<script type="text/javascript" src="../../../Users/david aremu/Desktop/Unnamed Site 2/Templates/jas/jquery-ui-1.10.3.custom.js"></script>
<script type="text/javascript" src="../../../Users/david aremu/Desktop/Unnamed Site 2/Templates/jas/myscripts.js"></script>

</head>   

<body>
<div>
	<table>
    <form>
    	<tr>
        	<td>
            Matriculation Number:
            </td>
            <td>
            <input type="text" id="matricno" placeholder="Matriculation Number">
            </td>
            <td>
            <span id="matricError"></span>
            </td>
        </tr>
        <tr>
        	<td>
            Surname:
            </td>
            <td>
            <input type="text" id="surname" placeholder="Surname">
            </td>
            <td>
            <span id="surnameError"></span>
            </td>
        </tr>
        
        <tr>
        	<td>
            First Name:
            </td>
            <td>
            <input type="text" id="firstName" placeholder="First Name">
            </td>
            <td>
            <span id="firstNameError"></span>
            </td>
        </tr>
        <tr>
        	<td>
            Middle Name:
            </td>
            <td>
            <input type="text" id="middleName" placeholder="Middle Name">
            </td>
            <td>
            <span id="middleNameError"></span>
            </td>
        </tr>
        <tr>
        	<td>
            Date of Birth:
            </td>
            <td>
            <input type="date" id="dateOfBirth" placeholder="Date of Birth">
            </td>
            <td>
            <span id="DateOfBirthError"></span>
            </td>
        </tr>
        <tr>
        	<td>
            Programme:
            </td>
            <td>
            <select>
            	<option value = "--Select Programme--" selected>--Select Programme--</option>
                <option value="First Degree">First Degree</option>
                <option value="Sub Degree">Sub Degree</option>
                <option value="Masters Degree">Masters Degree</option>
                <option value="MPhil/Ph.D">MPhil/Ph.D</option>
                <option value="Ph.D">Ph.D</option>
                <option value="Diploma">Diploma</option>
                
                
            </select>
            </td>
            <td>
            <span id="surnameError"></span>
            </td>
        </tr>
        
        <tr>
        	<td>
            Gender:
            </td>
            <td>
            <select>
            	<option value = "--Select Gender--" selected>--Select Gender--</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                                
            </select>
            </td>
            <td>
            <span id="surnameError"></span>
            </td>
        </tr>
        
        <tr>
        	<td colspan="3">
            <input type="submit" value="Submit" id="submitButton">
            </td>
            
        </tr>
    </table>
</div>
</body>
</html>
