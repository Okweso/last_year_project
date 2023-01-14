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
	
function Validate(){

	document.getElementById('presd')
	var count=$("input[type=checkbox]:ckecked").length;
	if (count>1){
		alert("only one candidate can be selected");
	}
	else{
		
	}
}

function cbChange(obj){
	var cbs = document.getElementsByClassName("pres");
	for (var i=0; i<cbs.length; i++){
		cbs[i].checked=false;
	}
	obj.checked=true;
}


function cbChangedp(obj){
	var cbs = document.getElementsByClassName("dpres");
	for (var i=0; i<cbs.length; i++){
		cbs[i].checked=false;
	}
	obj.checked=true;
}


function cbChangefm(obj){
	var cbs = document.getElementsByClassName("fin_min");
	for (var i=0; i<cbs.length; i++){
		cbs[i].checked=false;
	}
	obj.checked=true;
}


function cbChangeem(obj){
	var cbs = document.getElementsByClassName("edu_min");
	for (var i=0; i<cbs.length; i++){
		cbs[i].checked=false;
	}
	obj.checked=true;
}


function cbChangetm(obj){
	var cbs = document.getElementsByClassName("trans_min");
	for (var i=0; i<cbs.length; i++){
		cbs[i].checked=false;
	}
	obj.checked=true;
}

function cbChangesm(obj){
	var cbs = document.getElementsByClassName("sprt_min");
	for (var i=0; i<cbs.length; i++){
		cbs[i].checked=false;
	}
	obj.checked=true;
}


function cbChangesec(obj){
	var cbs = document.getElementsByClassName("sec");
	for (var i=0; i<cbs.length; i++){
		cbs[i].checked=false;
	}
	obj.checked=true;
}


 function functionConfirm(msg, myYes, myNo) {
            var confirmBox = $("#confirm");
            confirmBox.find(".message").text(msg);
            confirmBox.find(".yes,.no").unbind().click(function() {
               confirmBox.hide();
            });
            confirmBox.find(".yes").click(myYes);
            confirmBox.find(".no").click(myNo);
            confirmBox.show();
         }
function btnSubmit(){
	alert("voting successful");
}
function yes() {
         alert("Yes")
      }
function no() {
         alert("no")
      }

function Confirmation(){
	let Confirmation= confirm("Are you sure about your selection?");
	if (Confirmation){
		const form = document.getElementById('sub');
		form.action= "submit.php";
	}
	else{
		const form = document.getElementById('sub');
		form.addEventListener('submit', (event)=>{
			event.preventDefault();
		});
	}
}