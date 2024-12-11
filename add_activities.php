<style>
    body {
        background: linear-gradient(135deg, hsla(208, 67%, 81%, 1) 0%, hsla(37, 65%, 85%, 1) 50%, hsla(301, 65%, 83%, 1) 100%);
}
</style>

<!DOCTYPE html>
<html>
<style>
    table {
        margin-left: auto;
        margin-right: auto;
    }
     h1{
        text-align: center;
    }
   
</style>

<head>
    <title>Add Activities</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="css_inv1/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body class="d-flex flex-column min-vh-100 justify-content-center align-items-center">
    
        <h1>Add Activity</h1>
        <form method="POST" action="my_activities_action.php" enctype="multipart/form-data" id="myForm">
		<table width = 100%>
            <tr>
				<td width="10%" >Semester*</td>
				<td width="1%">:</td>
				<td width="30%">
					<select class="form-select" size="1" name="sem" required>                        
                        <option value="">&nbsp;--Select--&nbsp;</option>
                        <option value="1">1</option>;                           
                        <option value="2">2</option>;                           
					</select>
				</td>
			</tr>
			<tr>
				<td>Year*</td>
				<td>:</td>
				<td>
                <select class="form-select" size="1" name="year" required>                        
                        <option value="">&nbsp;--Select--&nbsp;</option>
                        <option value="1">1</option>;                           
                        <option value="2">2</option>;    
                        <option value="3">3</option>;                           
                        <option value="4">4</option>;                    
					</select>                                    
				</td>
			</tr>
			<tr>
				<td>Activity Name*</td>
				<td>:</td>
				<td>
					<textarea class="form-control" rows="4" name="act_name" cols="20" required></textarea>
				</td>
			</tr>
			<tr>
				<td>Activity Type*</td>
				<td>:</td>
				<td>
                <select class="form-select" size="1" name="act_type" required onchange="updateActLevel()">
                    <option value="">--Select--</option>
                    <option value="Activities">Activities</option>
                    <option value="Competition">Competition</option>
                    <option value="Certificate">Certificate</option>
                </select>
				</td>
			</tr>
            <tr>
				<td>Activity Level*</td>
				<td>:</td>
				<td>
            <select class="form-select" size="1" name="act_level" required>
                <option value="">--Select--</option>
                <option value="Faculty">Faculty Level</option>
                <option value="University">University Level</option>
                <option value="National">National Level</option>
                <option value="International">International Level</option>
                <option value="Certificate">Certificate</option>
            </select>
				</td>
			</tr>
			<tr>
				<td>Remark</td>
				<td>:</td>
				<td>
					<textarea class="form-control" rows="4" name="remark" cols="20"></textarea>
				</td>
			</tr>
			<tr>
				<td colspan="3" align="right"> 
				<input class="btn btn-success"type="submit" value="Add" name="B1">                
				<a class="btn btn-secondary" href="my_activities.php">Back</a>
				</td>
			</tr>
		</table>
	</form>
    <br><br>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
<script>
    //disable dropdown for cert
    function updateActLevel() {
        var actTypeDropdown = document.getElementsByName("act_type")[0];
        var actLevelDropdown = document.getElementsByName("act_level")[0];

        // If Certificate is selected in act_type, set act_level to Certificate and disable the dropdown
        if (actTypeDropdown.value === "Certificate") {
        actLevelDropdown.value = "Certificate";
        actLevelDropdown.disabled = true;
        } else {
            actLevelDropdown.value = ""; // Reset the value
            actLevelDropdown.disabled = false;
        }

        var certificateOption = actLevelDropdown.querySelector('option[value="Certificate"]');
            if (certificateOption) {
                certificateOption.disabled = true;
            }
}


</script>