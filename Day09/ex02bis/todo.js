$( window ).ready( function () {
	var elements = JSON.parse(document.cookie);
	elements.forEach(function (task) {
		addTask(task);
	});

	$( '#new' ).click( function ( ) {
		var newTaskText = prompt("Enter new task:");
		if ( newTaskText != null && newTaskText != "" ) {
			addTask(newTaskText);
		}
	});
	return;
});

$( window ).on('unload', function () {
	var elements = new Array ();
	$( '#ft_list' ).children().each(function () {
		if ( $( this ).text() )
			elements.unshift($( this ).text());
	});
	document.cookie = JSON.stringify(elements);
	return;
});

function addTask ( string ) {
	$( '#ft_list' )
		.prepend( $('<div></div>')
			.addClass('todo')
			.text(string)
			.click( function () {
				if ( confirm("Is you task really done?") === true )
					$( this ).remove();
			})
		);
	return;
}