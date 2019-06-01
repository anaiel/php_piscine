window.onload = function () {
	var elements = JSON.parse(document.cookie);
	elements.forEach(function (task) {
		addTask(task);
	});

	document.getElementById('new').onclick = function ( ) {
		var newTaskText = prompt("Enter new task:");
		if ( newTaskText != null && newTaskText != "" ) {
			addTask(newTaskText);
		}
	}
	return;
}

window.onunload = function () {
	var elements = new Array ();
	document.getElementById('ft_list').childNodes.forEach(function (child) {
		if ( child.innerHTML )
			elements.unshift(child.innerHTML);
	});
	document.cookie = JSON.stringify(elements);
	return;
}

function addTask ( string ) {
	var newTask = document.createElement('div');
	newTask.setAttribute('class', 'todo');
	newTask.appendChild(document.createTextNode(string));
	document.getElementById('ft_list').prepend(newTask);
	newTask.addEventListener('click', function (e) {
		if (e.target.id != 'new'){
			if ( confirm("Is you task really done?") === true)
				newTask.parentNode.removeChild(newTask);
		}
	});
	return;
}