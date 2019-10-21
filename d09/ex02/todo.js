var ft_list;
var todos = [];

function getCookie(name) {
	let matches = document.cookie.match(new RegExp(
	  "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
	));
	return matches ? decodeURIComponent(matches[1]) : undefined;
}

function bay()
{
	var tods = [];
	var i = 0;
	for (var value of todos) {
		tods[i++] = value.innerHTML;
	}
	document.cookie = 'save_now=' + JSON.stringify(tods) + "; max-age=3600";
}

function come()
{
	var cook;
	var new_div;
	var k;

	ft_list = document.getElementById('ft_list');
	if ((cook = getCookie('save_now')))
	{
		tods = JSON.parse(cook);
		for (var value of tods) {
			new_div = document.createElement('div');
			new_div.setAttribute("onclick", 'delete_todo(this)');
			new_div.innerHTML = value;
			todos.push(new_div);
			ft_list.append(new_div);
		}
	}
}

function add_todo()
{
	var todo;
	var new_div;

	todo = prompt('New To do', "add To do");
	if (todo)
	{
		ft_list = document.getElementById('ft_list');
		new_div = document.createElement('div');
		new_div.setAttribute("onclick", 'delete_todo(this)');
		new_div.innerHTML = todo;
		todos.unshift(new_div);
		ft_list.prepend(new_div);
	}
}
function delete_todo(a)
{
	if (confirm('Delete?'))
	{
		todos = todos.filter(val => val !== a);
		a.remove();
	}
}
