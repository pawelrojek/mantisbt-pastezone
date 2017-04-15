$("document").ready(function(){

    var dz = $('.dropzone');
    dz.parent().prepend("<input type='text' id='pasteZone' style='width: 100%; text-align: center; color: #478FCA; margin-bottom: 3px' value='" + LANG_PASTEHERE + "'>");

    $("#pasteZone")[0].onpaste = function(event)
    {
        var myDropzone = null;

        if ($(".dropzone-form").length>0) myDropzone = Dropzone.forElement(".dropzone-form");
        if ($(".auto-dropzone-form").length>0) myDropzone = Dropzone.forElement(".auto-dropzone-form");

        if (myDropzone==null) return false;

        var items = (event.clipboardData || event.originalEvent.clipboardData).items;
        for (index in items)
        {
            var item = items[index];
            if (item.kind === 'file')
            {
                myDropzone.addFile( item.getAsFile() );
            }
        }
    }

});
