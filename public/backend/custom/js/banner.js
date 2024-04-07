
var button = document.getElementById( 'ckfinder-popup' );
button.onclick = function(e) {
  selectFileWithCKFinder( 'image-input', 'ckfinder-popup' );
};

function selectFileWithCKFinder( elementId, targetDisplay ) {
  CKFinder.popup( {
    chooseFiles: true,
    width: 800,
    height: 600,
    onInit: function( finder ) {
      finder.on( 'files:choose', function( evt ) {
        var file = evt.data.files.first();
        var output = document.getElementById( elementId );
        output.value = file.getUrl();
        var display = document.getElementById(targetDisplay);
        display.src = file.getUrl();
        
      } );

      finder.on( 'file:choose:resizedImage', function( evt ) {
        var output = document.getElementById( elementId );
        output.value = evt.data.resizedUrl;
        var display = document.getElementById(targetDisplay);
        display.src = evt.data.resizedUrl;
      } );
    }
  });
}