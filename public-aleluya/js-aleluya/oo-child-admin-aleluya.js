/**
 * For God so loved the world, that He gave His only begotten Son, that all who believe in Him should not perish, but have everlasting life
 **/

 // Thank You Jesus for https://wordpress.stackexchange.com/a/236296

 jQuery(document).ready( function($) {

      jQuery('input#oo_aleluya_media_manager2').click(function(e) {

             e.preventDefault();
             var image_frame_aleluya;
             if(image_frame_aleluya){
                 image_frame_aleluya.open();
             }
             // Define image_frame as wp.media object
             image_frame_aleluya = wp.media({
                           title: 'Select Media',
                           multiple : false,
                           library : {
                                type : 'image',
                            }
             });

             image_frame_aleluya.on('close',function() {
                // On close, get selections and save to the hidden input
                // plus other AJAX stuff to refresh the image preview
                var selection_aleluya =  image_frame_aleluya.state().get('selection');
                var gallery_ids_aleluya = new Array();
                var my_index_aleluya = 0;
                selection_aleluya.each(function(attachment_aleluya) {
                   gallery_ids_aleluya[my_index_aleluya] = attachment_aleluya['id'];
                   my_index_aleluya++;
                });
                var ids_aleluya = gallery_ids_aleluya.join(",");
                jQuery('input#avatar_media_id_aleluya').val(ids_aleluya);
                Refresh_Image_aleluya(ids_aleluya);
             });

            image_frame_aleluya.on('open',function() {
              // On open, get the id from the hidden input
              // and select the appropiate images in the media manager
              var selection_aleluya =  image_frame_aleluya.state().get('selection');
              var ids_aleluya = jQuery('input#avatar_media_id_aleluya').val().split(',');
              ids_aleluya.forEach(function(id) {
                var attachment_aleluya = wp.media.attachment(id);
                attachment_aleluya.fetch();
                selection_aleluya.add( attachment_aleluya ? [ attachment_aleluya ] : [] );
              });

            });

          image_frame_aleluya.open();
     });

});

// Ajax request to refresh the image preview
function Refresh_Image_aleluya(the_id_aleluya){
    var data_aleluya = {
        action: 'oo_child_get_image_aleluya',
        id_aleluya: the_id_aleluya
    };

    jQuery.get(ajaxurl, data_aleluya, function(response_aleluya) {
    console.log("Hallelujah - " + JSON.stringify(response_aleluya));
        if(response_aleluya.success === true) {

            jQuery('#oo-child-preview-image-aleluya').replaceWith( response_aleluya.data.image_aleluya );
        }
    });
}


// THank You Jesus for Darren @ https://wordpress.stackexchange.com/a/302962

$(function() {

function myTheme_calculateImageSelectOptions(attachment, controller) {

    var control = controller.get( 'control' );

    var flexWidth = !! parseInt( control.params.flex_width, 10 );
    var flexHeight = !! parseInt( control.params.flex_height, 10 );

    var realWidth = attachment.get( 'width' );
    var realHeight = attachment.get( 'height' );

    var xInit = parseInt(control.params.width, 10);
    var yInit = parseInt(control.params.height, 10);

    var ratio = xInit / yInit;

    controller.set( 'canSkipCrop', ! control.mustBeCropped( flexWidth, flexHeight, xInit, yInit, realWidth, realHeight ) );

    var xImg = xInit;
    var yImg = yInit;

    if ( realWidth / realHeight > ratio ) {
        yInit = realHeight;
        xInit = yInit * ratio;
    } else {
        xInit = realWidth;
        yInit = xInit / ratio;
    }        

    var x1 = ( realWidth - xInit ) / 2;
    var y1 = ( realHeight - yInit ) / 2;        

    var imgSelectOptions = {
        handles: true,
        keys: true,
        instance: true,
        persistent: true,
        imageWidth: realWidth,
        imageHeight: realHeight,
        minWidth: xImg > xInit ? xInit : xImg,
        minHeight: yImg > yInit ? yInit : yImg,            
        x1: x1,
        y1: y1,
        x2: xInit + x1,
        y2: yInit + y1  
    };

    return imgSelectOptions;
}  

function myTheme_setImageFromURL(url, attachmentId, width, height) {
    var choice, data = {};

    data.url = url;
    data.thumbnail_url = url;
    data.timestamp = _.now();

    if (attachmentId) {
        data.attachment_id = attachmentId;
    }

    if (width) {
        data.width = width;
    }

    if (height) {
        data.height = height;
    }

    alert("Aleluya - " + attachmentId + " - " + url);

    $("#avatar_media_url_aleluya").val( url );
    $("#oo-child-preview-image-aleluya").prop("src", url);        

}

function myTheme_setImageFromAttachment(attachment) {
alert("No Id - aleluya");
    //$("#heading_picture").val( attachment.url );
    $("#oo-child-preview-image-aleluya").prop("src", attachment.url);             

}

var mediaUploader;

$("input#oo_aleluya_media_manager").on("click", function(e) {

    e.preventDefault(); 

    /* We need to setup a Crop control that contains a few parameters
       and a method to indicate if the CropController can skip cropping the image.
       In this example I am just creating a control on the fly with the expected properties.
       However, the controls used by WordPress Admin are api.CroppedImageControl and api.SiteIconControl
    */

   var cropControl = {
       id: "control-id",
       params : {
         flex_width : true,  // set to true if the width of the cropped image can be different to the width defined here
         flex_height : true, // set to true if the height of the cropped image can be different to the height defined here
         width : 192,  // set the desired width of the destination image here
         height : 192, // set the desired height of the destination image here
       }
   };

   cropControl.mustBeCropped = function(flexW, flexH, dstW, dstH, imgW, imgH) {

    // If the width and height are both flexible
    // then the user does not need to crop the image.

    if ( true === flexW && true === flexH ) {
        return false;
    }

    // If the width is flexible and the cropped image height matches the current image height, 
    // then the user does not need to crop the image.
    if ( true === flexW && dstH === imgH ) {
        return false;
    }

    // If the height is flexible and the cropped image width matches the current image width, 
    // then the user does not need to crop the image.        
    if ( true === flexH && dstW === imgW ) {
        return false;
    }

    // If the cropped image width matches the current image width, 
    // and the cropped image height matches the current image height
    // then the user does not need to crop the image.               
    if ( dstW === imgW && dstH === imgH ) {
        return false;
    }

    // If the destination width is equal to or greater than the cropped image width
    // then the user does not need to crop the image...
    if ( imgW <= dstW ) {
        return false;
    }

    return true;        

   };      

    /* NOTE: Need to set this up every time instead of reusing if already there
             as the toolbar button does not get reset when doing the following:

            mediaUploader.setState('library');
            mediaUploader.open();

    */       

    mediaUploader = wp.media({
        button: {
            text: 'Select and Crop', // l10n.selectAndCrop,
            close: false
        },
        states: [
            new wp.media.controller.Library({
                title:     'Select and Crop', // l10n.chooseImage,
                library:   wp.media.query({ type: 'image' }),
                multiple:  false,
                date:      false,
                priority:  20,
                suggestedWidth: 192,
                suggestedHeight: 192
            }),
            new wp.media.controller.CustomizeImageCropper({ 
                imgSelectOptions: myTheme_calculateImageSelectOptions,
                control: cropControl
            })
        ]
    });

    mediaUploader.on('cropped', function(croppedImage) {

        var url = croppedImage.url,
            attachmentId = croppedImage.attachment_id,
            w = croppedImage.width,
            h = croppedImage.height;

            myTheme_setImageFromURL(url, attachmentId, w, h);            

    });

    mediaUploader.on('skippedcrop', function(selection) {

        var url = selection.get('url'),
            w = selection.get('width'),
            h = selection.get('height');

            myTheme_setImageFromURL(url, selection.id, w, h);            

    });        

    mediaUploader.on("select", function() {


        var attachment = mediaUploader.state().get( 'selection' ).first().toJSON();
/* For now we must crop *
        if (     cropControl.params.width  === attachment.width 
            &&   cropControl.params.height === attachment.height 
            && ! cropControl.params.flex_width 
            && ! cropControl.params.flex_height ) {
                myTheme_setImageFromAttachment( attachment );
            mediaUploader.close();
        } else { */
            mediaUploader.setState( 'cropper' );
       // }

    });

    mediaUploader.open();

});
});