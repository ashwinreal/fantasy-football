var GK = new Array("","","");
var DF = new Array("","","","","","");
var MF = new Array("","","","","","");
var FW = new Array("","","","");

function check_transfer(x){	
	if(x==0)
	{
		document.getElementById("trans").disabled = true;
		document.getElementById("cteam").disabled = true;
	}
	else
	{
		document.getElementById("trans").disabled = false;
		document.getElementById("cteam").disabled = false;
	}
}

function select_swap(id)
{
	var x = document.getElementById(id).value;

	var ch1 = Number(id.charAt(2));
	
	if(GK.indexOf(x) > 0)
	{
		var prev_data = GK[ch1];
		
		var new_id = "GK".concat((GK.indexOf(x)).toString());
		
		document.getElementById(new_id).value = prev_data;
	}
	else if(DF.indexOf(x) > 0)
	{
		var prev_data = DF[ch1];
		
		var new_id = "DF".concat((DF.indexOf(x)).toString());
		
		document.getElementById(new_id).value = prev_data;
	}
	else if(MF.indexOf(x) > 0)
	{
		var prev_data = MF[ch1];
		
		var new_id = "MF".concat((MF.indexOf(x)).toString());
		
		document.getElementById(new_id).value = prev_data;
	}
	else if(FW.indexOf(x) > 0)
	{
		var prev_data = FW[ch1];
		
		var new_id = "FW".concat((FW.indexOf(x)).toString());
		
		document.getElementById(new_id).value = prev_data;

	}
	
	set_selected();
}

function set_selected()
{		
	GK[1] = document.getElementById("GK1").value;
	GK[2] = document.getElementById("GK2").value;
	
	DF[1] = document.getElementById("DF1").value;
	DF[2] = document.getElementById("DF2").value;
	DF[3] = document.getElementById("DF3").value;
	DF[4] = document.getElementById("DF4").value;
	DF[5] = document.getElementById("DF5").value;
	
	MF[1] = document.getElementById("MF1").value;
	MF[2] = document.getElementById("MF2").value;
	MF[3] = document.getElementById("MF3").value;
	MF[4] = document.getElementById("MF4").value;
	MF[5] = document.getElementById("MF5").value;
	
	FW[1] = document.getElementById("FW1").value;
	FW[2] = document.getElementById("FW2").value;
	FW[3] = document.getElementById("FW3").value;
	
	document.getElementById("S_GK1").value = GK[1];
//	alert(document.getElementById("S_GK1").value);
	document.getElementById("S_GK2").value = GK[2];
	
	document.getElementById("S_DF1").value = DF[1];
	document.getElementById("S_DF2").value = DF[2];
	document.getElementById("S_DF3").value = DF[3];
	document.getElementById("S_DF4").value = DF[4];
	document.getElementById("S_DF5").value = DF[5];
	
	document.getElementById("S_MF1").value = MF[1];
	document.getElementById("S_MF2").value = MF[2];
	document.getElementById("S_MF3").value = MF[3];
	document.getElementById("S_MF4").value = MF[4];
	document.getElementById("S_MF5").value = MF[5];
	
	document.getElementById("S_FW1").value = FW[1];
	document.getElementById("S_FW2").value = FW[2];
	document.getElementById("S_FW3").value = FW[3];
}
	
function myFunction() {
	
    var selected=document.getElementById("formation").value;
    if(selected==442)
	  {document.getElementById("formimage").src="http://i.imgur.com/aN42IoQ.png";
	   document.getElementById("DF4").disabled=false;
	   document.getElementById("DF5").disabled=true;
	   document.getElementById("MF4").disabled=false;
	   document.getElementById("MF5").disabled=true;
	   document.getElementById("FW2").disabled=false;
	   document.getElementById("FW3").disabled=true;
	   document.getElementById("FORM").value = 442;
	   }
	if(selected==451)
	  {document.getElementById("formimage").src="http://i.imgur.com/Puje3pQ.png";
	   document.getElementById("DF4").disabled=false;
	   document.getElementById("DF5").disabled=true;
	   document.getElementById("MF4").disabled=false;
	   document.getElementById("MF5").disabled=false;
	   document.getElementById("FW2").disabled=true;
	   document.getElementById("FW3").disabled=true;
	   document.getElementById("FORM").value = 451;
	   
	  }
	if(selected==433)
	  {document.getElementById("formimage").src="http://i.imgur.com/bJXVB6v.png";
	   document.getElementById("DF4").disabled=false;
	   document.getElementById("DF5").disabled=true;
	   document.getElementById("MF4").disabled=true;
	   document.getElementById("MF5").disabled=true;
	   document.getElementById("FW2").disabled=false;
	   document.getElementById("FW3").disabled=false;
	   document.getElementById("FORM").value = 433;
	   
	   }
	if(selected==352)
	  {document.getElementById("formimage").src="http://i.imgur.com/Ceh64ye.png";
	   document.getElementById("DF4").disabled=true;
	   document.getElementById("DF5").disabled=true;
	   document.getElementById("MF4").disabled=false;
	   document.getElementById("MF5").disabled=false;
	   document.getElementById("FW2").disabled=false;
	   document.getElementById("FW3").disabled=true;
	   document.getElementById("FORM").value = 352;
	   
	}   
}
