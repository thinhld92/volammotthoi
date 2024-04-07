<script>

  ClassicEditor
	.create( document.querySelector( '.editor' ), {
		ckfinder: {
      uploadUrl: '{{ route('ckfinder_connector') }}?command=QuickUpload&type=Files&responseType=json'
    },
		link: {
            decorators: {
                openInNewTab: {
                    mode: 'manual',
                    label: 'Open in a new tab',
                    attributes: {
                        target: '_blank',
                        rel: 'noopener noreferrer'
                    }
                }
            }
        }
	} )
	.then( editor => {
		window.editor = editor;
	} )
	.catch( handleSampleError );

function handleSampleError( error ) {
	const issueUrl = 'https://github.com/ckeditor/ckeditor5/issues';

	const message = [
		'Oops, something went wrong!',
		`Please, report the following error on ${ issueUrl } with the build id "50f8j09770h3-cku9qlsh2fz8" and the error stack trace:`
	].join( '\n' );

	console.error( message );
	console.error( error );
}
</script>