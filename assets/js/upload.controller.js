<?php
session_start();
header("content-type: application/javascript");
include('../../inc/settings.php');
include('../../inc/class.php');
include('../../inc/dependencies/class/perfil.php');

global $user;

$userInfo = User::getUserInfo($user);


?>

$(document).on('ready', function(){

// Setup html5 version
	$(".html5_uploader").pluploadQueue({
		// General settings
		runtimes : 'html5,flash,silverlight,html4',
		flash_swf_url : LMI.path + 'plugins/plupload/Moxie.swf',
		// Silverlight settings
	    silverlight_xap_url : LMI.path + 'plugins/Moxie.xap',
		url : LMI.path + '../upload.php',
		chunks_size: '200kb',
		unique_names : true,
        multiple_queues : true,
        prevent_duplicates: true,

		init : {
		    FilesAdded: function(up, files) {
		    	$('.__s_alert').hide();
		    	var maxfiles = <?php echo ($is_user && $is_moderator) ? "12" : ($is_user?"10":"0") ?>;
                    if(up.files.length > maxfiles ){
                        up.splice(maxfiles);
                        // alert('no more than '+maxfiles + ' file(s)');
                        $('.__s_alert ol').empty();
                        $('.__s_alert .alert-content ol').append("<li>"+ "Error: Numero m&aacute;ximo de subidas es " + maxfiles + "</li>");
                        $('.__s_alert').addClass('alert-info').removeClass('alert-warning').show();
                     }
                     up.start();
                     $('._st_load').addClass('loading');
				    Pace.restart();
            },
            ChunkUploaded: function(){
            	$('._st_load').addClass('loading');
			    Pace.restart();},
            UploadComplete: function(){
            	$('._st_load').removeClass('loading');
            	Notifications.create('Todas las tracks fueron subidas correctamente!', true);
		    }, FileUploaded: function(up, file, info) {
				    console.log(info.response);
				    var rs = jQuery.parseJSON(info.response);
				    $('._song-list').append('<input type="hidden" name="song_' + $('#' + file.id).index() + '_post_id" value="' + rs.post_id + '">');
				}
	    },
		
		filters : {
			max_file_size : '<?php echo ($is_user && $is_moderator) ? "100" : ($is_user?"50":"0") ?>mb',
			mime_types: [
				{title : "Audio files", extensions : "mp3"},
			]
		},
		multipart: true,
		multipart_params: {
			'key': '${filename}', // use filename as a key
			'Filename': '${filename}' // adding this to keep consistency across the runtimes
		}
	});



var firstTime = true;
var uploader = new plupload.Uploader({
    runtimes : 'html5,flash,silverlight,html4',
    browse_button : 'pickfiles', // you can pass in id...
    container: document.getElementById('cover_upload'), // ... or DOM Element itself
	flash_swf_url : LMI.path + 'plugins/plupload/Moxie.swf',
	// Silverlight settings
    silverlight_xap_url : LMI.path + 'plugins/Moxie.xap',
	url : LMI.path + '../upload.php',
	chunks_size: '1mb',
	max_file_count: 1,
	multi_selection: false,
	unique_names : true,
     
    filters : {
        max_file_size : '5mb',
        mime_types: [
            {title : "Image files", extensions : "jpg,gif,png"},
        ]
    },
    multipart: true,
	multipart_params: {
		'key': '${filename}', // use filename as a key
		'Filename': '${filename}' // adding this to keep consistency across the runtimes
	},

     
 
    init: {

         FilesAdded: function(up, files) {
        	var maxfiles = 1;
            
        	up.splice(maxfiles);

            up.start();
          
            // plupload.each(files, function(file) {
            //     document.getElementById('filelist').innerHTML += '<div id="' + file.id + '">' + file.name + ' (' + plupload.formatSize(file.size) + ') <b></b></div>';
            // });
        },

        Browse: function(up, files){
        	up.splice();
        },
 
        UploadProgress: function(up, file) {
            $('.progress_handler').show().find('.progress_percent').css({width: file.percent + "%"});
        },
 
        Error: function(up, err) {
            // document.getElementById('console').innerHTML += "\nError #" + err.code + ": " + err.message;
            $('.__s_alert ol').empty();
            $('.__s_alert .alert-content ol').append("<li>"+ "Error: " + err.message + "</li>");
            $('.__s_alert').addClass('alert-info').removeClass('alert-warning').show();
            Notifications.create('Ocurrio un error: ' + err.message + '. Intenta nuevamente!');
        },
        FileUploaded: function(up, file, info) {
        	console.log(info);
        	var rs = jQuery.parseJSON(info.response);
		    console.log(info.response);
		    $('#_cover_value').val(rs.id);
		    if($('#_cover_name_value').length>0) $('#_cover_name_value').val(rs.url);
		    $('#pickfiles').text("Cambiar");
		    $('h4._cover_change').remove();
		    $('.progress_handler').hide();
		    $('._cover_ img').attr('src', LMI.path + '../' + rs.url);
		    if(!$('._cover_ img').hasClass('profile')) $('._cover_ img').css({opacity: 0.1})

		    
		    if($('._cover_ch').hasClass('backstretch_image')) $('._cover_ch').backstretch(LMI.path + '../' + rs.url);
		    // up.splice();

		    Notifications.create('Imagen subida.', true);

		}
    }
});
 
uploader.init();


});