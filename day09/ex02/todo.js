
var x = get_n_cookies();
var y = 0;

window.onload = function() {
	var j = 0;
	var list = document.cookie.split(";");
	while (list[j])
	{
		addToList(getCookie("todo" + j));
		j++;
	}

}

function get_n_cookies() {
	var i = 0;
	var cookie_list = document.cookie.split(';');
	while (cookie_list[i])
		i++;
	return i;
}

function setCookie(name, text, date) {
	var str = name + "=" + text + ", expires=" + date + ", path=/;";
	document.cookie = str;
}

function eraseCookie(text) {
	var i = 0;
	var j = 0;
	var cookie_list = document.cookie.split(';');
	while (cookie_list[i])
	{
		j = 0;
		var cookie = cookie_list[i];
		while (cookie.charAt(0)==' ')
		{
			cookie = cookie.substring(1);
		}
		var l = cookie.split('=');
		var t = l[1].split(",");
		while (t[0].charAt(0) == ' ')
		{
			t[0] = t[0].substring(1);
		}
		if (t[0] == text.substring(3, text.length - 4))
			setCookie(l[0], "", -1);
		i++;
	}
}

function getCookie(name) {
	var i = 0;
	var cookie_list = document.cookie.split(';');
	while (cookie_list[i])
	{
		var cookie = cookie_list[i];
		while (cookie.charAt(0)==' ') {
			cookie = cookie.substring(1);
		}
		if (cookie.indexOf(name) == 0)
		{
			var tmp = cookie.substring(name.length + 1, cookie.length);
			var l = tmp.split(",");
			console.log(l[0]);
			return l[0];
		}
		i++;
	}
	return null;
}

function addToList(text) {
	if (text)
	{
		var list = document.getElementById('ft_list');
		var new_div = document.createElement('div');
		new_div.setAttribute("onclick", "removeItem(this);");
		new_div.innerHTML = "<a>" + text + "</a>";
		new_div.id = 'new_div';
		list.insertBefore(new_div, list.childNodes[2]);
	}
}

function removeItem(item) {
	var name = item.innerHTML;
	eraseCookie(name);
	item.parentNode.removeChild(item);	
}

function newItem() {
	var text = prompt("Add your item:");
	var name = "todo" + x;
	x += 1;
	var date = new Date();
	date.setTime(date.getTime() + (30*24*60*60*1000));
	setCookie(name, text, date);
	location.reload();
}