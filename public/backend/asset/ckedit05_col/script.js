

function handleSampleError( error ) {
	const issueUrl = 'https://github.com/ckeditor/ckeditor5/issues';

	const message = [
		'Oops, something went wrong!',
		`Please, report the following error on ${ issueUrl } with the build id "ra7b01nqzfx9-8udusz8j8014" and the error stack trace:`
	].join( '\n' );

	console.error( message );
	console.error( error );
}
