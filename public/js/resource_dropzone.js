// When Document Ready execute :
$(document).ready(function() {

  Dropzone.options.thumb = {
    uploadMultiple: false,
    addRemoveLinks: false,
    maxFilesize: 2,               // MB
    acceptedFiles: 'image/*',     // Files Acepted
    dictDefaultMessage: '',
      init: function() {
        this.on("addedfile", function(file) {
          Materialize.toast('Saved', 3000);     // Message
        });
       this.on("thumbnail", function(file, dataUrl) {
          $('.dz-image-preview').hide();
          $('.dz-file-preview').hide();
        });
        this.on("success", function(file, res){
          $('#thumb-pic').attr('src', res.path);    // Change pic src
          //$('input[name="pic_url"]').val(res.path);
        });
      }
  }; var thumb = new Dropzone("#thumb");    // Initialize dropzone

  // Enable dropzone click
  $('#thumb-submit').on('click', function(e) {
    e.preventDefault();
    // Trigger file upload select
    $("#thumb").trigger('click');
  });

});

// Manually init the dropzone
Dropzone.autoDiscover = false;
