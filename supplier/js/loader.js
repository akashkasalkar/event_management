
  $(document).ready(function(){
    $('select').formSelect();
     $('.sidenav').sidenav();
     $('.file-upload').file_upload();
     $('.modal').modal();
  });
function toggleModal(){
  var instance=M.Modal.getInstance($('#modal3'));
  instance.open();
}