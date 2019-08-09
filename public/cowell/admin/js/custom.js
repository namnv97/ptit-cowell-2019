jQuery(document).ready(function(){
    jQuery('input').attr('autocomplete','off');

});


jQuery(document).ready(function(){
    jQuery('body').on('click','#choose span.add',function(){
        CKFinder.popup( {
            chooseFiles: true,
            onInit: function( finder ) {
                finder.on( 'files:choose', function( evt ) {
                    var file = evt.data.files.first();
                    jQuery('#thum').find('img').attr('src',file.getUrl());
                    jQuery('#choose input').val(file.getUrl());
                    jQuery('#thum').css('display','block');
                    jQuery('#choose span').addClass('delete');
                    jQuery('#choose span').removeClass('add');
                    jQuery('#choose span').text('Xóa ảnh đại diện');
                    jQuery('#choose.logo span').text('Xóa ảnh');
                } );
            }
        } );
    });

});



jQuery(document).ready(function(){
   
    jQuery('input[name=username]').on('keypress',function(e){
        console.log(e.keyCode);
        var arr = [126, 35, 36, 37, 94, 38, 42, 40, 41, 95, 43, 45, 61,96,123,125,91,93,58,59,34,39,44,46,60,62,47,63];
        var a = arr.indexOf(e.keyCode);
        if(a >= 0) return false;
    });

    sc('desc__custom',3);

});

function ChangeToSlug(str)
{
    var slug;

    slug = str.toLowerCase();

    slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
    slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
    slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
    slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
    slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
    slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
    slug = slug.replace(/đ/gi, 'd');

    slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
    slug = slug.replace(/\&/gi, 'va');

    slug = slug.replace(/ /gi, "-");

    slug = slug.replace(/\-\-\-\-\-/gi, '-');
    slug = slug.replace(/\-\-\-\-/gi, '-');
    slug = slug.replace(/\-\-\-/gi, '-');
    slug = slug.replace(/\-\-/gi, '-');

    slug = '@' + slug + '@';
    slug = slug.replace(/\@\-|\-\@|\@/gi, '');

    return slug;
}

var openFile = function(file) {
    var input = file.target;

    var reader = new FileReader();
    reader.onload = function(){
      var dataURL = reader.result;
      jQuery('.thum').html('<img alt="thumbnails" id="output" style="max-width: 100%;">');
      var output = document.getElementById('output');
      output.src = dataURL;
  };
  reader.readAsDataURL(input.files[0]);
  jQuery('.choose span').text("Thay đổi ảnh");
};



