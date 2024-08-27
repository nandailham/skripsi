function exportCanvas(name,opt,debug){
    if(!opt) opt = {
        ignoreElements: function (el) {
            return $(el).hasClass( "ignorecanvas" );
        },
        // scale : 1
    }

    $('.export').click(function(e) {
        e.preventDefault();
        html2canvas(document.querySelector(".content"), opt ).then(canvas => {
            let imgData = canvas.toDataURL('image/jpeg');
            
            if(debug){
                let win = window.open(imgData, '_blank');
                if (win) win.focus();
                return 
            }

            let doc = new jsPDF("p", "mm", "a4");

            let width = doc.internal.pageSize.width;
            let height = doc.internal.pageSize.height;

            doc.addImage(imgData, 'JPEG', 0, 0, width, height);
            doc.save(name +'.pdf');
        });

    });
}

$(document).on('click', 'img.preview', function(event) {
    event.preventDefault();
  
    let src = $(this).data('src') || $(this).attr('src')
    let alt = $(this).attr('alt')
    if(!src) return $.alert('Tidak ditemukan sumber foto');
    $('.modalprev-content').attr('src', src);

    if(alt) $('#preview-img .caption').html(alt)
    $('.modalprev').show();
  });

  $(document).on('click', '#preview-img .close', function(event) {
    event.preventDefault();
    $('.modalprev-content').attr('src', '');
    $('#preview-img .caption').html('')
    $('.modalprev').hide();
  });

$(function() {
  

});