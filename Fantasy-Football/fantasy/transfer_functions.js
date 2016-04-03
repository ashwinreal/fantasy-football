	function myfun(id)
	{
		document.getElementById("GK_TABLE").style.display = 'none'; 
		document.getElementById("DF_TABLE").style.display = 'none'; 
		document.getElementById("MF_TABLE").style.display = 'none'; 
		document.getElementById("FW_TABLE").style.display = 'none'; 

		document.getElementById(id).style.display = 'block';
		document.getElementById(id).scrollTop = 0;
	}
	
	var team = [];
	
	for(i = 0; i < 21; i++) {
		team.push(0);
	}
	
	function set_clubs()
	{
		team[Number(document.getElementById("CID_GK1").value)]++;
		team[Number(document.getElementById("CID_GK2").value)]++;
		team[Number(document.getElementById("CID_DF1").value)]++;
		team[Number(document.getElementById("CID_DF2").value)]++;
		team[Number(document.getElementById("CID_DF3").value)]++;
		team[Number(document.getElementById("CID_DF4").value)]++;
		team[Number(document.getElementById("CID_DF5").value)]++;
		team[Number(document.getElementById("CID_MF1").value)]++;
		team[Number(document.getElementById("CID_MF2").value)]++;
		team[Number(document.getElementById("CID_MF3").value)]++;
		team[Number(document.getElementById("CID_MF4").value)]++;
		team[Number(document.getElementById("CID_MF5").value)]++;
		team[Number(document.getElementById("CID_FW1").value)]++;
		team[Number(document.getElementById("CID_FW2").value)]++;
		team[Number(document.getElementById("CID_FW3").value)]++;
	}
	
	function remove_player(id)
	{
		var x = id.substr(3,5);
		var pname = "S_".concat(x);
		var pid = "PID_".concat(x);
		var cid = "CID_".concat(x);
		var price_pl = "PRI_".concat(x);		
		
		var price = document.getElementById(price_pl).value;
		
		price = Number(price);
		
		document.getElementById('TEAM_VALUE').value = (Number(document.getElementById('TEAM_VALUE').value) - price).toFixed(1);
		document.getElementById('BANK_BALANCE').value = (Number(document.getElementById('BANK_BALANCE').value) + price).toFixed(1);
		
		team[Number(document.getElementById(cid).value)]--;
		
		document.getElementById(pid).value="";
		document.getElementById(cid).value="";
		document.getElementById(pname).value="";
		document.getElementById(price_pl).value=0;
		
		if(Number(document.getElementById('BANK_BALANCE').value)<0)
			document.getElementById('confirm_button').disabled = true;
		else
			document.getElementById('confirm_button').disabled = false;
	}	
		
	
	
	function take_player(id)
	{
		//document.getElementById(id).style.background = "#6666FF";
		
		var pname = "#".concat(id.concat(" td:nth-child(1)"));
		var cid = "#".concat(id.concat(" td:nth-child(4)"));
		var pid = "#".concat(id.concat(" td:nth-child(5)"));
		var pos = "#".concat(id.concat(" td:nth-child(6)"));
		var price1 = "#".concat(id.concat(" td:nth-child(3)"));
		var price = Number($(price1).text());
		
		if($(pos).text().localeCompare("GK")==0)
		{			
			flag = false;
			
			for(i=1;i<=2;i++)
			{
				var s_gk = "PID_GK".concat(i.toString());
			
				if(document.getElementById(s_gk).value.localeCompare($(pid).text())==0)
				{
					alert("Player already chosen");
					flag = true;
					break;
				}
			}
			
			if(team[Number($(cid).text())]==3)
			{	
				alert("More than 3 players from same team");
				return;
			}
			
			if(!flag)
			{
			for(i=1;i<=2;i++)
			{
				var s_gk = "S_GK".concat(i.toString());
				var pid_gk = "PID_GK".concat(i.toString());
				var cid_gk = "CID_GK".concat(i.toString());
				var pri_gk = "PRI_GK".concat(i.toString());
				
				if(document.getElementById(s_gk).value.localeCompare("")==0)
				{
					document.getElementById(s_gk).value=$(pname).text();
					document.getElementById(pid_gk).value=$(pid).text();
					document.getElementById(cid_gk).value=$(cid).text();
					document.getElementById(pri_gk).value=price;
					document.getElementById('TEAM_VALUE').value = (Number(document.getElementById('TEAM_VALUE').value) + price).toFixed(1);	
					document.getElementById('BANK_BALANCE').value = (Number(document.getElementById('BANK_BALANCE').value) - price).toFixed(1);
					
					team[Number($(cid).text())]++;
					
					if(Number(document.getElementById('BANK_BALANCE').value)<0)
						document.getElementById('confirm_button').disabled = true;
					else
						document.getElementById('confirm_button').disabled = false;
					
					flag = true;
					break;
				}
			}
			if(!flag)
			{
				alert("Goalkeepers Full");
			}
			}
		}
		else if($(pos).text().localeCompare("DF")==0)
		{
			flag = false;
			for(i=1;i<=2;i++)
			{
				var s_df = "PID_DF".concat(i.toString());
			
				if(document.getElementById(s_df).value.localeCompare($(pid).text())==0)
				{
					alert("Player already chosen");
					flag = true;
					break;
				}
			}
			
			if(team[Number($(cid).text())]==3)
			{	
				alert("More than 3 players from same team");
				return;
			}
			
			if(!flag)
			{
			for(i=1;i<=5;i++)
			{
				var s_df = "S_DF".concat(i.toString());
				var pid_df = "PID_DF".concat(i.toString());
				var cid_df = "CID_DF".concat(i.toString());
				var pri_df = "PRI_DF".concat(i.toString());
			
				if(document.getElementById(s_df).value.localeCompare("")==0)
				{
					document.getElementById(s_df).value=$(pname).text();
					document.getElementById(pid_df).value=$(pid).text();
					document.getElementById(cid_df).value=$(cid).text();
					document.getElementById(pri_df).value=price;
					document.getElementById('TEAM_VALUE').value = (Number(document.getElementById('TEAM_VALUE').value) + price).toFixed(1);	
					document.getElementById('BANK_BALANCE').value = (Number(document.getElementById('BANK_BALANCE').value) - price).toFixed(1);
					
					team[Number($(cid).text())]++;
					
					if(Number(document.getElementById('BANK_BALANCE').value)<0)
						document.getElementById('confirm_button').disabled = true;
					else
						document.getElementById('confirm_button').disabled = false;					
					
					flag = true;
					break;
				}
			}
			if(!flag)
			{
				alert("Defenders Full");
			}
			}
		}
		else if($(pos).text().localeCompare("MF")==0)
		{
			flag = false;
			
			for(i=1;i<=2;i++)
			{
				var s_mf = "PID_MF".concat(i.toString());
			
				if(document.getElementById(s_mf).value.localeCompare($(pid).text())==0)
				{
					alert("Player already chosen");
					flag = true;
					break;
				}
			}
			
			if(team[Number($(cid).text())]==3)
			{	
				alert("More than 3 players from same team");
				return;
			}
			
			if(!flag)
			{
			for(i=1;i<=5;i++)
			{
				var s_mf = "S_MF".concat(i.toString());
				var pid_mf = "PID_MF".concat(i.toString());
				var cid_mf = "CID_MF".concat(i.toString());
				var pri_mf = "PRI_MF".concat(i.toString());
			
				if(document.getElementById(s_mf).value.localeCompare("")==0)
				{
					document.getElementById(s_mf).value=$(pname).text();
					document.getElementById(pid_mf).value=$(pid).text();
					document.getElementById(cid_mf).value=$(cid).text();
					document.getElementById(pri_mf).value=price;
					document.getElementById('TEAM_VALUE').value = (Number(document.getElementById('TEAM_VALUE').value) + price).toFixed(1);	
					document.getElementById('BANK_BALANCE').value = (Number(document.getElementById('BANK_BALANCE').value) - price).toFixed(1);
					
					team[Number($(cid).text())]++;
					
					if(Number(document.getElementById('BANK_BALANCE').value)<0)
						document.getElementById('confirm_button').disabled = true;
					else
						document.getElementById('confirm_button').disabled = false;					
					
					flag = true;
					break;
				}
			}
			if(!flag)
			{
				alert("Midfielders Full");
			}
			}
		}
		else if($(pos).text().localeCompare("FW")==0)
		{
			flag = false;
			
			for(i=1;i<=2;i++)
			{
				var s_fw = "PID_FW".concat(i.toString());
			
				if(document.getElementById(s_fw).value.localeCompare($(pid).text())==0)
				{
					alert("Player already chosen");
					flag = true;
					break;
				}
			}
			
			if(team[Number($(cid).text())]==3)
			{	
				alert("More than 3 players from same team");
				return;
			}
			
			if(!flag)
			{
			for(i=1;i<=3;i++)
			{
				var s_fw = "S_FW".concat(i.toString());
				var pid_fw = "PID_FW".concat(i.toString());
				var cid_fw = "CID_FW".concat(i.toString());
				var pri_fw = "PRI_FW".concat(i.toString());
			
				if(document.getElementById(s_fw).value.localeCompare("")==0)
				{
					document.getElementById(s_fw).value=$(pname).text();
					document.getElementById(pid_fw).value=$(pid).text();
					document.getElementById(cid_fw).value=$(cid).text();
					document.getElementById(pri_fw).value=price;
					document.getElementById('TEAM_VALUE').value = (Number(document.getElementById('TEAM_VALUE').value) + price).toFixed(1);	
					document.getElementById('BANK_BALANCE').value = (Number(document.getElementById('BANK_BALANCE').value) - price).toFixed(1);
					
					team[Number($(cid).text())]++;
					
					if(Number(document.getElementById('BANK_BALANCE').value)<0)
						document.getElementById('confirm_button').disabled = true;
					else
						document.getElementById('confirm_button').disabled = false;					
					
					flag = true;
					break;
				}
			}
			if(!flag)
			{
				alert("Forwards Full");
			}
			}
		}
	}
