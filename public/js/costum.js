$(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
        'paging'      : true,
        'lengthChange': false,
        'searching'   : false,
        'ordering'    : true,
        'info'        : true,
        'autoWidth'   : false
    })

    //Date picker
    $('#datepicker').datepicker({
        autoclose: true
    })

    $('#avatar').click(function(){
        $("#file").click();
    })

    $('#file').change(function(){
        setImage(this,"#avatar");
    })
})

function setImage(input,target){
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            $(target).attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

// Add Buku
function add_buku(no_induk,judul){
    var no = $(".buku-item").length+1;
    var content = '<tr class="buku-item '+no_induk+'">';
    content += '<td>'+no+'</td>';
    content += '<td>'+no_induk+'</td>';
    content += '<td>'+judul+'</td>';
    content += '<td>';
    content += '<button type="button" class="btn btn-flat btn-xs btn-danger" no-induk ="'+no_induk+'" onclick="remove_buku(this)">X</button>';
    content += '<input type="hidden" value="'+no_induk+'" name="nobuku[]">';
    content += '<input type="hidden" value="'+judul+'" name="judul[]">';
    content += '</td>';
    content += '</tr>';

    $("#lsBuku").append(content);
  }

  function remove_buku(obj){
    var cls = $(obj).attr("no-induk");
    $("."+cls).remove();
  }

 function pesan(pos,tp,judul,waktu){
     Swal.fire({
         position: pos+'-end',
         type: tp,
         title: judul,
         showConfirmButton: false,
         timer: waktu
     });
 }

 function Confirm_Delete(target) {
    const swalWithBootstrapButtons = Swal.mixin({
        confirmButtonClass: 'btn btn-success',
        cancelButtonClass: 'btn btn-danger',
        buttonsStyling: false,
    })
    
    swalWithBootstrapButtons.fire({
    title: 'Are you sure?',
    text: "You won't be able to revert this!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonText: 'Yes, delete it!',
    cancelButtonText: 'No, cancel!',
    reverseButtons: true
    }).then((result) => {
    if (result.value) {
        swalWithBootstrapButtons.fire(
        'Deleted!',
        'Your file has been deleted.',
        'success'
        )
        window.location = $(target).attr("link");
        
    } else if (
        // Read more about handling dismissals
        result.dismiss === Swal.DismissReason.cancel
    ) {
        swalWithBootstrapButtons.fire(
        'Cancelled',
        'Your imaginary file is safe :)',
        'error'
        )
    }
    })
 }

 function Confirm_Save(target){
    Swal.fire({
      position: 'center',
      type: 'success',
      title: 'Your work has been saved',
      showConfirmButton: false,
      timer: 1500
    })
    window.location = $(target).attr("link");
  }