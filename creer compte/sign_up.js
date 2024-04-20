function verif()
{
	var cin = f.cin.value;
	var phone = f.phone.value;
	var gender = f.gender.value;
	var pwd= f.pwd.value;
	var pwdv= f.verif_pwd.value;
	var name=f.name.value;
	var birth=f.birth.value;
	if(name!="" && birth!="")
	{
		if(cin.length!="" && cin.length!=8)
		{
			alert("Your Id card must be 8 numbers");
			return false;
		}
		if(phone.length!=8)
		{
			alert("Phone number must be 8 numbers");
			return false;
		}
		if(gender!='M' && gender!='m' && gender!='f' && gender!='F')
		{
			alert("Gender must be m or f ");
			return false;
		}
		if(pwd!=pwdv)
		{
			alert("Confirm your password");
			return false;
		}
	}
}