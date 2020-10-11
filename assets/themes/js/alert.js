function alertSuccess(message, title){
    var t = (title == '')? ' Success':title;
    Swal.fire({
    type: 'success',
    title: t,
    html: message,
    })
}

function alertError(message, title){
	var t = (title == '')? ' Oops..':title;
	Swal.fire({
	  type: 'error',
	  title: t,
	  html: message,
	});
}

const flashData = $('.flash-success').data('flashdata');
if(flashData) {
    Swal.fire({
        title: 'Berhasil',
        text: flashData,
        type:'success'
    });
}

const flashData2 = $('.flash-failed').data('flashdata');
if(flashData2) {
    Swal.fire({
        title: 'Gagal',
        text: flashData2,
        type:'error'
    });
}

$(function () {
    $(".tombol-hapus").on('click', function (e) {
        e.preventDefault();
        const href = $(this).attr('href');
        swal.fire({
            title:"Are you sure?",
            text: "Data akan di hapus dari database",
            type:"warning",
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor:'#d33',
            confirmButtonText:'Yes delete it!',
        }).then((result) => {
            if(result.value == true) {
                document.location.href = href;
            }
        })
    })
    
});

$(function () {
    $(".tombol-konfirmasi").on('click', function (e) {
        e.preventDefault();
        const dataText = $('.tombol-konfirmasi').data('konfirmasi');
        const href = $(this).attr('href');
        swal.fire({
            title:"Apakah Anda Yakin?",
            text: dataText,
            type:"warning",
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor:'#d33',
            confirmButtonText:'Apply',
        }).then((result) => {
            if(result.value == true) {
                document.location.href = href;
            }
        })
    });
    
});

