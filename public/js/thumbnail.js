// When Document Ready execute :
$(document).ready(function() {

  Dropzone.options.thumb = {
    uploadMultiple: false,        // No multiple
    addRemoveLinks: false,        // No removable link
    maxFilesize: 2,               // Max size in MB
    acceptedFiles: 'image/*',     // Files type Acepted
    dictDefaultMessage: '',
      init: function() {
        this.on("addedfile", function(file) {
          Materialize.toast('Saved', 3000);             // Message
        });
       this.on("thumbnail", function(file, dataUrl) {
          $('.dz-image-preview').hide();
          $('.dz-file-preview').hide();
        });
        this.on("success", function(file, res){
          $('#thumb-pic').attr('src', '/imgs/thumbnails/' + res.resource + '/' + res.file_name);    // Change pic src
        });
      }
  }; var thumb = new Dropzone("#thumb");              // Initialize dropzone

  // Enable dropzone click
  $('#thumb-submit').on('click', function(e) {
    e.preventDefault();
      $("#thumb").trigger('click');                   // Trigger file upload select
  });

});

// Manually init the dropzone
Dropzone.autoDiscover = false;
