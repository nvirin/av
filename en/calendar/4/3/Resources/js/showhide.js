function currentId(){
	return location.href.substring((location.href.lastIndexOf("#"))+1);
}
function Highlight(id1,id2)
{
	if(itm2 = my_getbyid(id2)){
		itm2.style.background="";
	}
	
	if(itm1 = my_getbyid(id1)){
		itm1.style.background="#eeffe5";
	}
}

function ShowHide(id1, id2)
{
	if (id1 != '') toggleview(id1);
	if (id2 != '') toggleview(id2);
}
	
function my_getbyid(id)
{
	itm = null;
	
	if (document.getElementById)
	{
		itm = document.getElementById(id);
	}
	else if (document.all)
	{
		itm = document.all[id];
	}
	else if (document.layers)
	{
		itm = document.layers[id];
	}
	
	return itm;
}

//==========================================
// Show/hide toggle
//==========================================

function toggleview(id)
{
	if ( ! id ) return;
	
	if ( itm = my_getbyid(id) )
	{
		if (itm.style.display == "none")
		{
			my_show_div(itm);
		}
		else
		{
			my_hide_div(itm);
		}
	}
}

//==========================================
// Set DIV ID to hide
//==========================================

function my_hide_div(itm)
{
	if ( ! itm ) return;
	
	itm.style.display = "none";
}

function my_show_div(itm)
{
	if ( ! itm ) return;
	
	itm.style.display = "";
}

