function FormDisplay() {

	document.getElementById('log_form').style.display = 'flex';
}

function ConfirmDetails() {

	var adm= document.forms["form1"]["admn_no"].value;
	//var pass=document.getElementsByTagName('psw');
	if(adm=="")
	{
		alert("Please fill the blanks");
		return false;
	}
	
}
	
