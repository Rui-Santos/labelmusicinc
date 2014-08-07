var $player = $('.player-footer'), $playerClone = $('.player-footer-clone'), 
    playerVisible, $modal = $('.modal'), $loader = $('._st_load'), nf = 'assets/image/bad.png', collection_open = false, timer = null, doxhr = null, LMI = null, $playerAn = $('#playerWrapper'), downloading = false, $body = $('body'), isPlaying = false, months, $playlist = $('.__playerplaylist'), playlist, lastFilter, carouselInstance, choseOpen = [], $filemanager = jQuery('.filemanager .filelist');


(function(d){function k(){var a;a=d(this);if(!a.data("streamdate")){a.data("streamdate",{datetime:e.datetime(a)});var b=d.trim(a.html());0<b.length&&a.attr("title",b)}a=a.data("streamdate");isNaN(a.datetime)||d(this).html(f(a.datetime));return this}function f(a){return e.inWords(n(a))}function n(a){return(new Date).getTime()-a.getTime()}d.streamdate=function(a){return a instanceof Date?f(a):"string"===typeof a?f(d.streamdate.parse(a)):f(d.streamdate.datetime(a))};var e=d.streamdate;d.extend(d.streamdate,{settings:{refreshMillis:1E3,
allowFuture:!1,strings:{prefixAgo:"",prefixFromNow:null,suffixAgo:"",suffixFromNow:"de este momento",seconds:"hace unos segundos",minute:"hace un minuto",minutes:"hace %d minutos",hour:"hace una hora",hours:"hace %d horas",day:"hace un dia",days:"hace %d dias",month:"el mes pasado",months:"hace %d meses",year:"el a&ntilde;o pasado",years:"%d a&ntilde;os",numbers:[]}},inWords:function(a){function b(b,e){return(d.isFunction(b)?b(e,a):b).replace(/%d/i,c.numbers&&c.numbers[e]||e)}var c=this.settings.strings,e=c.prefixAgo,f=c.suffixAgo;
this.settings.allowFuture&&0>a&&(e=c.prefixFromNow,f=c.suffixFromNow);var g=Math.abs(a)/1E3,l=g/60,m=l/60,h=m/24,k=h/365,g=45>g&&b(c.seconds,Math.round(g))||90>g&&b(c.minute,1)||45>l&&b(c.minutes,Math.round(l))||90>l&&b(c.hour,1)||24>m&&b(c.hours,Math.round(m))||48>m&&b(c.day,1)||30>h&&b(c.days,Math.floor(h))||60>h&&b(c.month,1)||365>h&&b(c.months,Math.floor(h/30))||2>k&&b(c.year,1)||b(c.years,Math.floor(k));return d.trim([e,g,f].join(" "))},parse:function(a){a=d.trim(a);a=a.replace(/\.\d\d\d+/,"");
a=a.replace(/-/,"/").replace(/-/,"/");a=a.replace(/T/," ").replace(/Z/," UTC");a=a.replace(/([\+\-]\d\d)\:?(\d\d)/," $1$2");return new Date(a)},datetime:function(a){a="time"===d(a).get(0).tagName.toLowerCase()?d(a).attr("datetime"):d(a).attr("title");return e.parse(a)}});d.fn.streamdate=function(){var a=this;a.each(k);var b=e.settings;0<b.refreshMillis&&setInterval(function(){a.each(k)},b.refreshMillis);return a};document.createElement("abbr");document.createElement("time")})(jQuery);

if(typeof String.prototype.trim !== 'function') { String.prototype.trim = function() { return this.replace(/^\s+|\s+$/g, ''); } }
function counterStyle(e){decPlaces=Math.pow(10,0);var t=["k","m","b","t"];for(var n=t.length-1;n>=0;n--){var r=Math.pow(10,(n+1)*3);if(r<=e){e=Math.round(e*decPlaces/r)/decPlaces;if(e==1e3&&n<t.length-1){e=1;n++}e="+"+e+t[n];break}}return e}

Array.prototype.unpush=function(e,t){var n=this.slice((t||e)+1||this.length);this.length=e<0?this.length+e:e;return this.push.apply(this,n)}



function updatePlayListSize(){
var playitems = $('.__playerplaylist ul li').length;
var w_ = ( ( (playitems*200) + (10*playitems)) + 5 ) > window.innerWidth ? window.innerWidth : ( ( (playitems*200) + (10*playitems)) + 5 );
$('.__playerplaylist ul').css({ width: ( ( (playitems*200) + (10*playitems)) + 5 ) + 'px', minWidth: '100%' });
$('.__playerplaylist ul').parent().css({ width: ( (playitems*200) + (10*playitems)) + 'px', minWidth: '100%' });
if(!LMI.isMobile()){ $('.__playerplaylist').mCustomScrollbar('update'); }else{ $('.__playerplaylist').css({overflowY: 'hidden', overflowX: 'auto', widtd: '100%', minWidth: '100%'}); }
return playitems;
}
months = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
function timeConverter(c){var a=new Date(c);c=a.getFullYear();var d=months[a.getMonth()],e=a.getDate();a.getHours();a.getMinutes();a.getSeconds();var b=new Date,a=months[b.getMonth()],f=b.getFullYear(),b=b.getDate();return c==f&&d==a&&e==b?"Hoy":c==f&&d==a&&1<b&&e==b-1?"Ayer":c==f&&d==a&&2<b&&e<b-1?"Este mes":c==f&&1<a&&d==a-1?"El mes padado":d+" "+e+", "+c};
function validUsername(a){un=/^[A-Za-z0-9_]{3,20}$/;return un.test(a)};
function validPassword(a){un=/^[A-Za-z0-9!@#$%^&*()_.]{6,20}$/;return un.test(a)};
function urlify(b){return b.replace(/(https?:\/\/[^\s]+)/g,function(a){return'<a href="'+a+'">'+a+"</a>"})};








var notificationTimer, 
  notificationTimeout = 5000,
  Notifications = {
  get: function(card){
    return jQuery(card);
  },
  create: function(message, attr){
    Notifications.clear(notificationTimer);

  var newID = jQuery('.errorpanel').length + 1, panel = jQuery('<div class="errorpanel" id="notification-' + newID + '" />'),
      closeButton = '<button type="button" class="close"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>';

    panel.removeClass('success notify');
    if(attr!=undefined && typeof attr == "boolean" && attr) panel.addClass('success');
    else if(attr!=undefined && attr==1) panel.addClass('notify');

    jQuery('.errorpanel').addClass('white');

    panel.html('<div class="containers">' + closeButton + message + '</div>')
      .css({top: -100, opacity: 0});
    Notifications.get('body').append(panel);
    notificationTimer = setTimeout(function(){
      panel.css({top: 0, opacity: 1 }).removeClass('white');
      notificationTimer = setTimeout(function(){
        if(attr!=undefined && typeof attr == "object"){
          for (var k in attr){
              if(attr[k][0]=="class") Notifications.get('.errorpanel').addClass(attr[k][1]);
                 else Notifications.get('.errorpanel').attr(attr[k][0], attr[k][1]);
          }
        }

        Notifications.clear(notificationTimer);
        notificationTimer = setTimeout(function(){
                    Notifications.close();
                  }, notificationTimeout);
      }, 500);
    }, 100);

      return message;

  },
  clear: function(notificationTimerTimer){
    clearTimeout(notificationTimerTimer);
  },
  close: function(){
    Notifications.clear(notificationTimer);
    Notifications.get('.errorpanel').css({opacity: 0, right: '-100%'});
    notificationTimer = setTimeout(function(){
      Notifications.get('.errorpanel').remove();
      Notifications.clear(notificationTimer);
    }, 500);
  }
};
Notifications.get('body').on('click', '.errorpanel .close', function(){
  Notifications.close();
});
if(jQuery('body').find('[rel="notify"]').length>0){
  var d_msg = jQuery('body').find('[rel="notify"]').attr('data-notification-message'),
      d_attr = jQuery('body').find('[rel="notify"]').attr('data-notification-attributes')!=undefined ? jQuery('body').find('[rel="notify"]').attr('data-notification-attributes') : false,
      d_attr = d_attr=="true" ? true : d_attr;
      if(!d_attr){
        Notifications.create(d_msg);
      }else{
        Notifications.create(d_msg, d_attr);
      }
}






var LMI = {};
LMI = {
  path: null,
  link: null,
  values: {
    categories: $('[name="lmi-categories"]',$body).val().split(','),
    session: "false",
    owner: 0,
    owner_name: null
  },
  setCookie: function(cname,cvalue,exdays){
    var d = new Date();
      d.setTime(d.getTime()+(1*24*60*60*1000));
      var expires = "expires="+d.toGMTString();
      document.cookie = cname + "=" + cvalue + "; " + expires + "; path=/labelmusicinc/;";
  },
  getCookie: function(cname){
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i=0; i<ca.length; i++){
      var c = ca[i].trim();
      if (c.indexOf(name)==0) return c.substring(name.length,c.length);
    }
      return "";
  },
  newCollection: function(){
    var cover = $('#_cover_value'), title = $('#_title'), song_count = $('#song_count');
    if(cover.val()==undefined
      || cover.val().length==0 || cover.val()==" "){
      
    }

    if(title.val()==undefined || title.val()!=('Sin titulo'||'Sin t&iacute;tulo'||'Sin título') 
      || title.val().length==0 || title.val()==" "){

    }
    
  },
  fetchCollections: function(){
    $('body').find('.fetch_collections').each(function(){
      var params = $(this).attr('data-params')!=undefined ? $(this).attr('data-params') : 'all,0,10', 
        params = params.split(','),
        collection_params = [];
        if(params.length>0){
          collection_params[0] = params[0]!=undefined ? params[0] : 'all';
          collection_params[1] = params[1]!=undefined ? params[1] : 0;
          collection_params[2] = params[2]!=undefined ? params[2] : 10;
        }
        $loader.addClass('loading');
        var _self = $(this);

        _self.addClass('preloading').css({minHeight: 50});

      setTimeout(function(){
        $.ajax({
        url: LMI.path + '../api.php?collections&view=' + collection_params[0] + '&from=' + collection_params[1] + '&to=' + collection_params[2],
        success: function(xhr){
          console.log(xhr);

          _self.empty().removeClass('preloading');

          if(xhr.status!=undefined){
            _self.append('<div class="alert alert-info">No hay colecciones.</div>');
          }else{
            var _ul = '<ul style="list-style: none"><h3 class="visible-xs text-muted text-center">Talvez te interese</h3>';
            for(i=0; i<xhr.length; i++){
              var hxs = i>1 ? " hidden-xs" : '';
              xhr[i].fullname = xhr[i].fullname.indexOf(' ')>-1 ? xhr[i].fullname.split(' ') : [xhr[i].fullname, ' '];
              _ul += '<li class="' + hxs + ' visible-xs col-sm-6 col-md-4"><div class="col-xs-12"><a href="' + LMI.link + 'colecciones/coleccion/' + xhr[i].id + '/"><span class="pull-left"><img src="' + LMI.path + '../usercontent/media/' + xhr[i].user_id + '/thumb_' + xhr[i].cover_url + '"></span><strong class="_title">' +  xhr[i].name + '</strong><small>Por <strong>' + xhr[i].fullname[0] + '</strong></small><span class="clearfix"></span></a></div><span class="clearfix"></span></li>';

              var classes = 'col-sm-4 col-md-4 hidden-xs';
                   _ul += '<div class="' + classes + ' __feature_oi __content_collection"><div class="col-xs-12"><div class="__feature_oi_cover"><a href="' + LMI.link + 'colecciones/coleccion/' + xhr[i].id + '"><div class="__feature_oi_img"><img src="' + LMI.path + '../usercontent/media/' + xhr[i].user_id + '/small_' + xhr[i].cover_url + '"></div></a><div class="__feature_oi_info"><a href="' + LMI.link + 'colecciones/coleccion/' + xhr[i].id + '" class="__linker"></a><div class="__b_a"><small class="text-muted">' + xhr[i].numb + ' canciones</small><br />' + xhr[i].name + '<br /><small>' + LMI.values.categories[xhr[i].category] + '</small><br /><span class="btn btn-trans btn-xs">LEER MAS</span></div></div></div></div></div>';
            }
            _ul += "</ul>";

            _self.append(_ul);
          }


          $loader.removeClass('loading');
        }
      });
      }, 500);
    });
  },  
  filemanager: {
    init: function(){
      var dataaction = jQuery('body').attr('data-action');
      if(dataaction.indexOf('_hash_tracks')>-1){
        LMI.filemanager.loadSongs();
      }else{
        LMI.filemanager.loadCollections();
      }
      LMI.filemanager.enable();
    },



    loadSongs: function(){
      // ?collections&view=filter:songs.user-1&from=0&to=12

      var emptymanager = '<p class="text-muted col-xs-12">Parece que no tienes contenidos.</p>',
          collections_html = "",
          tpl = document.getElementById('filetemplate').innerHTML,
          collection_div = $('<div />');

          collection_div.html(tpl);
          // console.log(tpl);

          $('.scollections').removeClass('active');
          $('.stracks').addClass('active');
          $('#contenttype').val('tracks');
          $('.fileactions').find('.btn').addClass('disabled btn-cancel').removeClass('btn-success').attr('disabled', 'disabled').attr('href','javascript:;');
          var limit = $filemanager.hasClass('filecompact')?6:12;
      $.ajax({
        url: LMI.link + 'api.php?collections&view=filter:songs.user-' + LMI.values.owner + '&from=0&to=' + limit,
        success: function(xhr){
          if(xhr.length>0){
            if(xhr.length==limit) jQuery('.loadmore').show();
            for(i=0; i<xhr.length; i++){
        collections_html += collection_div.html()
                              .replace(/{{type}}/g, 'track')
                              .replace(/{{link\.type}}/g, 'song')
                              .replace(/{{link}}/g, LMI.link)
                              .replace(/{{icon}}/g, '<i class="ion-music-note icon"></i>')
                              .replace(/{{details}}/g, ((xhr[i].filesize/1024)/1024).toFixed(2) + ' mb<span class="hidden-xs"> &bull; ' + LMI.values.categories[xhr[i].category] + '</span>')
                              .replace(/{{id}}/g, xhr[i].id)
                              .replace(/{{name}}/g, xhr[i].filename);
            }
            $filemanager.html(collections_html);
            if($filemanager.hasClass('filecompact')){
              $filemanager.append('<li class="divider"></li><li><a href="' + LMI.link + 'filemanager#tracks">Ver todo</a></li>');
              $filemanager.prepend('<li class="header">'
                + '<a href="javascript:;" class="col-xs-6 active"'
                + ' style="clear: none;">Tracks</a>'
                + '<a href="javascript:;"'
                + ' onmouseover="$(this).parent().addClass(\'active\').siblings().removeClass(\'active\');'
                + 'LMI.filemanager.loadCollections();" class="col-xs-6" style="clear: none;">Colecciones</a>'
                + '</li>'
                + '<span class="clearfix"></span><li class="divider"></li>');
            }
          }else{
            $filemanager.html(emptymanager);
            if($filemanager.hasClass('filecompact')){
              $filemanager.append('<li class="divider"></li><li><a href="' + LMI.link + 'filemanager#tracks">Ver todo</a></li>');
            }
          }
        }
      });

    },





    removeSong: function(id){
      $.ajax({
        url: LMI.link + 'user.interactions.php?profile&view=' + id + '&do=removesong',
        contentType: 'application/json',
        success: function(xhr){
          // console.log('removing song', xhr);
          // if(xhr.status=="success"){
            jQuery('.removing').remove();
            Notifications.create('Track removida.', true);
          // }else{
            // Notifications.create('Algo sali&oacute; mal.');
          // }
        }
      });
    },





    openCollection: function(id){

    },




    enable: function(){
      jQuery('body').on('click', '.file-item', function(){
        var _self = $(this), __self = {
          id: _self.attr('data-id'),
          isCollection: function(){
            if(_self.hasClass('collection')) return true;
            else return false;
          }
        };

        _self.toggleClass('active').siblings().removeClass('active');
        if(_self.hasClass('active')){
          $('.fileactions').find('.btn').removeClass('disabled btn-cancel').addClass('btn-success').removeAttr('disabled');
          LMI.filemanager.openCollection(__self.id);

          if(__self.isCollection()){
            $('.link-open').attr('href', LMI.link + 'colecciones/coleccion/' + __self.id).addClass('open-collection');
            $('.link-edit').attr('href', LMI.link + 'colecciones/editar/coleccion-' + __self.id);
            $('.link-remove').attr('href', LMI.link + 'colecciones/eliminar/coleccion-' + __self.id);
          }else{
            $('.link-open').attr('href', LMI.link + 'colecciones/song/' + __self.id).removeClass('open-collection');
            $('.link-edit').attr('href', LMI.link + 'colecciones/editar/cancion-' + __self.id);
            $('.link-remove').attr('href', LMI.link + 'colecciones/eliminar/cancion-' + __self.id);
          }

        }else{
          $('.fileactions').find('.btn').addClass('disabled btn-cancel').removeClass('btn-success').attr('disabled', 'disabled').attr('href','javascript:;');
        }
      }).on('click', '.stracks', function(){
        if($('#contenttype').val()!="tracks"){
          LMI.filemanager.loadSongs();
        }
      }).on('click', '.scollections', function(){
        if($('#contenttype').val()!="collections"){
          LMI.filemanager.loadCollections();
        }
      }).on('click', '.loadmore', function(){
          LMI.filemanager.loadMore();
      });
    },




    loadMore: function(){
      var actualNumber = $('.file-item').length,
          emptymanager = '<p class="text-muted col-xs-12">Parece que no tienes contenidos.</p>',
          collections_html = "",
          tpl = document.getElementById('filetemplate').innerHTML,
          collection_div = $('<div />');
          collection_div.html(tpl);;

      if($('#contenttype').val()=="collections"){

        $.ajax({
        url: LMI.link + 'api.php?collections&view=' + LMI.values.owner + '&from=' + actualNumber + '&to=12',
        success: function(xhr){
          if(xhr.length>0){
            if(xhr.length==12) jQuery('.loadmore').show();
            else jQuery('.loadmore').hide();

            for(i=0; i<xhr.length; i++){
        collections_html += collection_div.html()
                              .replace(/{{type}}/g, 'collection')
                              .replace(/{{icon}}/g, '<img src="' + LMI.link + 'usercontent/media/' + LMI.values.owner + '/thumb_' + xhr[i].cover_url + '" class="img-responsive" />')
                              .replace(/{{details}}/g, xhr[i].numb + ' tracks')
                              .replace(/{{id}}/g, xhr[i].id)
                              .replace(/{{name}}/g, xhr[i].name);
            }
            $filemanager.append(collections_html);
          }else{
            jQuery('.loadmore').hide();
          }
        }
      });


        //end is collection
      }else{



        $.ajax({
        url: LMI.link + 'api.php?collections&view=filter:songs.user-' + LMI.values.owner + '&from=' + actualNumber + '&to=12',
        success: function(xhr){
          if(xhr.length>0){
            if(xhr.length==12) jQuery('.loadmore').show();
            else jQuery('.loadmore').hide();
            for(i=0; i<xhr.length; i++){
        collections_html += collection_div.html()
                              .replace(/{{type}}/g, 'track')
                              .replace(/{{icon}}/g, '<i class="ion-music-note icon"></i>')
                              .replace(/{{details}}/g, ((xhr[i].filesize/1024)/1024).toFixed(2) + ' mb<span class="hidden-xs"> &bull; ' + LMI.values.categories[xhr[i].category] + '</span>')
                              .replace(/{{id}}/g, xhr[i].id)
                              .replace(/{{name}}/g, xhr[i].filename);
            }
            $filemanager.append(collections_html);
          }else{
            jQuery('.loadmore').hide();
          }
        }
      });


      }


    },


    loadCollections: function(){
      var emptymanager = '<p class="text-muted col-xs-12">Parece que no tienes contenidos.</p>',
          collections_html = "",
          tpl = document.getElementById('filetemplate').innerHTML,
          collection_div = $('<div />');
          collection_div.html(tpl);
          // console.log(tpl);

          $('.scollections').addClass('active');
          $('.stracks').removeClass('active');
          $('#contenttype').val('collections');
          $('.fileactions').find('.btn').addClass('disabled btn-cancel').removeClass('btn-success').attr('disabled', 'disabled').attr('href','javascript:;');

          var limit = $filemanager.hasClass('filecompact')?6:12;

      $.ajax({
        url: LMI.link + 'api.php?collections&view=' + LMI.values.owner + '&from=0&to=' + limit,
        success: function(xhr){
          if(xhr.length>0){
            if(xhr.length==limit) jQuery('.loadmore').show();

            for(i=0; i<xhr.length; i++){
        collections_html += collection_div.html()
                              .replace(/{{type}}/g, 'collection')
                              .replace(/{{link\.type}}/g, 'coleccion')
                              .replace(/{{link}}/g, LMI.link)
                              .replace(/{{icon}}/g, '<img src="' + LMI.link + 'usercontent/media/' + LMI.values.owner + '/thumb_' + xhr[i].cover_url + '" class="img-responsive" />')
                              .replace(/{{details}}/g, xhr[i].numb + ' tracks')
                              .replace(/{{id}}/g, xhr[i].id)
                              .replace(/{{name}}/g, xhr[i].name);
            }
            $filemanager.html(collections_html);
            if($filemanager.hasClass('filecompact')){
              $filemanager.append('<li class="divider"></li><li><a href="' + LMI.link + 'filemanager">Ver todo</a></li>');
              $filemanager.prepend('<li class="header">'
                + '<a href="javascript:;" class="col-xs-6"'
                + ' onmouseover="$(this).parent().addClass(\'active\').siblings().removeClass(\'active\');'
                + 'LMI.filemanager.loadSongs();"  style="clear: none;">Tracks</a>'
                + '<a href="javascript:;"'
                + ' class="col-xs-6 active" style="clear: none;">Colecciones</a>'
                + '</li>'
                + '<span class="clearfix"></span><li class="divider"></li>');
            }
          }else{
            $filemanager.html(emptymanager);
            if($filemanager.hasClass('filecompact')){
              $filemanager.append('<li class="divider"></li><li><a href="' + LMI.link + 'filemanager#tracks">Ver todo</a></li>');
            }
          }
        }
      });
    }
  },
  fetchComments: function($feedbox){
      // song-id::{$id},data-load::activityfeed
      var params = $feedbox.attr('data-from')!=undefined ? $feedbox.attr('data-from').split(',') : [];
      if(params.length>0){
        var type = 0;
        if(params[0].indexOf('song-id')>-1) type = 1;
        else if(params[0].indexOf('collection-id')>-1) type = 0;
        var type_part = params[0].split('::');
        var id = type_part[1];
        var _self = $feedbox;
        var from = _self.find('li').length;
        $.ajax({
          url: '' + LMI.path + '../api.php?comments&view=' + id + '&type=' + type + '&from=' + from + '&to=' + 10,
          success: function(xhr){
            console.log(xhr);

            // _self.addClass('fired');

            if(_self.find('ul').length==0){
                _self.empty();
              }

            if(xhr.status!=undefined){
              if(_self.find('ul').length==0){
                _self.append('<div class="alert alert-info">No hay comentarios.</div>');
              }
              if(_self.find('.load-more-button').length>0){
                _self.find('.load-more-button').find('a').text('No hay mas contenidos...');
                setTimeout(function(){
                  _self.find('.load-more-button').remove();
                },500);
              }
            }else{
              var _feed = _self.find('ul').length>0 ? "" : "<ul>";
              for(i=0; i<xhr.length; i++){
                xhr[i].comment_body = xhr[i].comment_body.replace(/\n/g, '<br />');
                xhr[i].comment_body = urlify(xhr[i].comment_body);
                var pic = xhr[i].user_profile_picture;
                _feed += '<li id="comment_' + xhr[i].comment_id
                        + '" data-id="' + xhr[i].comment_id + '" data-content-type="' + xhr[i].comment_content_type + '"><div class="col-xs-12 _pad"><a href="' + LMI.link + '@' + xhr[i].user_username + '" class="pull-left tooltip-t" title="perfil de ' + xhr[i].user_fullname + '"><img src="' + pic + '" class="_user_profile_photo_rounded" /></a><div class="comment_wrapper"><h4><a href="' + LMI.link + '@' + xhr[i].user_username + '">' + xhr[i].user_fullname + '</a> dijo: <span class="pull-right"><a href="javascript:;" class="comment_cog tooltip-t" title="Reportar"><i class="fa fa-cog"></i></a></span></h4><p>' + xhr[i].comment_body + '</p></div></div><span class="clearfix"></span></li>';
              }
              _feed += _self.find('ul').length>0 ? "" : "</ul>";
              if(xhr.length>9){
                _feed += '<div class="text-center load-more-button"><a href="javascript:;" class="btn btn-primary">Cargar m&aacute;s</a></div>';
              }

              if (_self.find('ul').length>0){
                if(_self.find('.load-more-button').length>0){
                  _self.find('.load-more-button').remove();
                }
                _self.find('ul').append(_feed);  
              }else{
                _self.append(_feed);
              }
            }
          }
        });
      }

  },
  coverflow: function(){

    var opt = $('body').find('._coverflow ul li');
    if(opt.length>0){
      opt.eq(0).addClass('current active');
      opt.eq(1).addClass('current next');
    }

    timer = setInterval(function(){
      var active_index = $('body').find('._coverflow ul li.active').index();
      if(opt.last().index()==active_index){
        opt.removeClass('current prev next active');
        setTimeout(function(){
          opt.eq(0).addClass('current active');
          opt.eq(1).addClass('current next');
        }, 500);
      }else{
        $('body').find('._coverflow ul li.next').click();
      }
    }, 5000);

    $('body').on('click', '._coverflow li.next', function(e){
      e.preventDefault();
      e.stopPropagation();

      $(this).addClass('active').removeClass('next');
      $(this).prev().removeClass('active').addClass('prev');
      $(this).prev().prev().removeClass('current prev active');
      $(this).next().addClass('current next');

      clearInterval(timer);
      var opt = $('body').find('._coverflow ul li');


    timer = setInterval(function(){
      var active_index = $('body').find('._coverflow ul li.active').index();
      if(opt.last().index()==active_index){
        opt.removeClass('current prev next active');
        setTimeout(function(){
          opt.eq(0).addClass('current active');
          opt.eq(1).addClass('current next');
        }, 500);
      }else{
        $('body').find('._coverflow ul li.next').click();
      }
    }, 5000);

    }).on('click', '._coverflow li.prev', function(e){
      e.preventDefault();
      e.stopPropagation();
      
      $(this).addClass('active').removeClass('prev');
      $(this).next().removeClass('active').addClass('next');
      $(this).next().next().removeClass('current next active');
      $(this).prev().addClass('current prev');

      clearInterval(timer);
      var opt = $('body').find('._coverflow ul li');

    timer = setInterval(function(){
      var active_index = $('body').find('._coverflow ul li.active').index();
      if(opt.last().index()==active_index){
        opt.removeClass('current prev next active');
        setTimeout(function(){
          opt.eq(0).addClass('current active');
          opt.eq(1).addClass('current next');
        }, 500);
      }else{
        $('body').find('._coverflow ul li.next').click();
      }
    }, 5000);

    }).on('click', '._coverflow li.active', function(e){
      e.preventDefault();
      e.stopPropagation();

      clearInterval(timer);
      var _href = $(this).find('a').attr('href');
      $(this).addClass('clicked');

      setTimeout(function(){
      Pace.restart();
        $.ajax({
          url: _href + '/ajax/',
          success: function(xhr){
            $('.pageContainer').html(xhr);
            setTimeout(function(){
              window.location = _href;
            }, 500);
          }
        });

      }, 500);
    

    });
  },
  isMobile: function(){
    var is_ = (/android|webos|iphone|ipad|ipod|blackberry|iemobile|opera mini/i.test(navigator.userAgent.toLowerCase())) || window.innerWidth < 767 ? true : false;
    return is_;
  },
  postComment: function($button){
    var $parent =       $button.closest('._comment_box');
    var $textbox =      $parent.find('._comment_text');
    var $values =       $parent.find('._comment_box_hidden');
    var oValue =        $textbox.attr('data-original-value');
    var user_id =       $values.find('input').eq(0).val(),
        content_id =    $values.find('input').eq(1).val(),
        content_type =  $values.find('input').eq(2).val(),
        content_title = $values.find('input').eq(3).val(),
        comment =       $textbox.serialize().replace('_comment_text', '').replace('form-control=', ''),
        data =          'user_id=' + user_id + '&content_id=' + content_id + '&content_type=' + content_type + '&comment=' + comment + '';

      if($textbox.val()==oValue){
        $textbox.focus();
        $button.button('reset');
      }else{
        $.ajax({
          url: '' + LMI.path + '../api.php?postComment',
          type: 'post',
          data: data,
          success: function(xhr){
            $textbox.val("");
            $button.button('reset');
            console.log(xhr);

            var _feed = "";
             xhr.comment_body = xhr.comment_body.replace(/\n/g, '<br />');
              xhr.comment_body = urlify(xhr.comment_body);
              _feed += '<li id="comment_' + xhr.comment_id
                      + '" data-id="' + xhr.comment_id + '" style="display: none"><div class="col-xs-12 _pad"><a href="' + LMI.link + '@' + xhr.user_username + '" class="pull-left tooltip-t" title="perfil de ' + xhr.user_fullname + '"><img src="' + xhr.user_profile_picture + '" class="_user_profile_photo_rounded" /></a><div class="comment_wrapper"><h4><a href="' + LMI.link + '@' + xhr.user_username + '">' + xhr.user_fullname + '</a> dijo: <span class="pull-right"><a href="javascript:;" class="comment_cog tooltip-t" title="Reportar"><i class="fa fa-cog"></i></a></span></h4><p>' + xhr.comment_body + '</p></div></div><span class="clearfix"></span></li>';

                if($('body').find('.activity_feed').find('ul').length>0){
                  $('body').find('.activity_feed').find('ul').prepend(_feed);
                }else{
                  $('body').find('.activity_feed').empty();
                  $('body').find('.activity_feed').prepend('<ul>'+_feed+'</ul>');
                }

                setTimeout(function(){
                  if ('WebkitTransform' in document.body.style 
                       || 'MozTransform' in document.body.style 
                       || 'OTransform' in document.body.style 
                       || 'transform' in document.body.style) 
                      {
                        $('body').find('.activity_feed').find('ul').find('li').first().css({display: 'block', opacity: 0});
                        setTimeout(function(){
                          $('body').find('.activity_feed').find('ul').find('li').first().css({opacity: 0.9});
                        }, 100);
                      }else{
                        $('body').find('.activity_feed').find('ul').find('li').first().slideDown();
                      }

                      Notifications.create('Comentario publicado correctamente.', true);
                }, 10);
          }
        });
      }

  },
  loadEditionCollections: function(){
    var template = '<li><div class="container_in_song">'
                  + '<span class="pull-left song_n">'
                  + '<i class="ion-close icon remove-from-collection tooltip-t" title="Eliminar" data-id="{{id}}" data-placement="top"></i> '
                  + '<i class="song_n_n">{{index}}</i> </span>'
                  + '<a href="' + LMI.link + 'colecciones/song/{{id}}" target="_blank" class="_song_name" title="{{name}}">'
                  + '{{name}}'
                  + '</a> <span class="clearfix"></span></div></li>',
        container = $('.collection_edition ul'),
        addmorebtn = '<span class="clearfix"></span><a href="' + LMI.link + 'addsong' + '" class="btn btn-default btn-lg"><i class="ion-plus"></i> Agregar tracks</a>';
        collection_id = $('.collection_edition').attr('data-id');
        $.ajax({
          url: LMI.link + 'api.php?collection&view=' + collection_id,
          success: function(xhr){
            console.log(xhr);
            if(xhr.songs!=undefined && xhr.songs.length>0){
              var nsongs = '';
              for(z=0; z<xhr.songs.length; z++){
                var nsong = template, zA = z+1;
                nsongs += nsong.replace(/{{id}}/g, xhr.songs[z].id)
                                .replace(/{{index}}/g, zA)
                                .replace(/{{name}}/g, xhr.songs[z].filename);
              }
              container.html(nsongs);
              container.append(addmorebtn);
            }else{
              container.html('No hay tracks en en esta colecci&oacute;n.');
              container.append(addmorebtn);
            }
          }
        });
  },
  fetchCollection: function(cid, status, _self){


        if(status=='notfired'){
          $loader.addClass('loading');
          _self.find('img').attr('src', '' + LMI.path + 'image/0_.png').addClass('preloading');
          $('._song_view_collection_list').find('img').attr('src', '' + LMI.path + 'image/0_.png').addClass('preloading');

          $.ajax({
            url: '' + LMI.path + '../api.php?collection&view=' + cid,
            success: function(xhr){
              console.log(xhr);
              /***** buil collection template *****/

              setTimeout(function(){
                 
              $.ajax({
                url: '' + LMI.path + '../usercontent/media/' + xhr.user_id + '/medium_' + xhr.cover_url, 
                success: function(xhr_){
                  $('._song_view_collection_list').find('img').attr('src', '' + LMI.path + '../usercontent/media/' + xhr.user_id + '/medium_' + xhr.cover_url).removeClass('preloading');
                    _self.find('img').attr('src', '' + LMI.path + '../usercontent/media/' + xhr.user_id + '/thumb_' + xhr.cover_url).removeClass('preloading');
                }}).fail(function(){
                  $.ajax({
                    url: '' + LMI.path + '../usercontent/media/' + xhr.user_id + '/small_' + xhr.cover_url,
                    success: function(xhr__){
                      $('._song_view_collection_list').find('img').attr('src', '' + LMI.path + '../usercontent/media/' + xhr.user_id + '/small_' + xhr.cover_url).removeClass('preloading');
                      _self.find('img').attr('src', '' + LMI.path + '../usercontent/media/' + xhr.user_id + '/thumb_' + xhr.cover_url).removeClass('preloading');
                    }
                  }).fail(function(){
                    $('._song_view_collection_list').find('img').attr('src', nf).removeClass('preloading');
                    _self.find('img').attr('src', '' + LMI.path + '../usercontent/media/' + xhr.user_id + '/thumb_' + xhr.cover_url).removeClass('preloading');
                  });
              });

                $('.collection_s').text(xhr.name);

              var songs = "";
              for(i=0; i<xhr.songs.length; i++){
                songs = songs + '<li><a href="' + LMI.link + 'colecciones/song/'+xhr.songs[i]['id']+'/">'+xhr.songs[i]['filename'].replace('\\ufff', '&ntilde;')+'</a></li>';
              }     
              
              $("._song_view_collection_list ul .items-ul").html(songs);
              var w = $("._song_view_collection_list ul li").length * (300 + 8);

              if(!LMI.isMobile()){
                 $(".__scrollable_w,.__scrollable_wx,.__scrollable_b").mCustomScrollbar("update");
                 $("._song_view_collection_list .items-ul").css({width: w + 'px'});
              }else{
                $("._song_view_collection_list .items-ul li").addClass('col-xs-6');
              }

              $loader.removeClass('loading');
              _self.attr('data-status', 'fired');
              
              }, 500);
            }
          });

        }






  },
  // LMI.playlist.add(song_id,title,url,collection_id,duration,autor_id,autor_name);
  playlist: {
    gen: function(){
      playlist = LMI.playlist.getList();

      $playlist.find('li').removeClass('playing');
      var newItem = '';
      for(i=0; i<playlist.songs.length; i++){
              newItem += '<li data-song-id="' + playlist.songs[i].song_id + '" data-title="' 
              + playlist.songs[i].title + '" data-url="' 
              + playlist.songs[i].url + '" data-collection="' + playlist.songs[i].collection_id + '" data-duration="' 
              + playlist.songs[i].duration + '" data-user-id="' + playlist.songs[i].autor_id + '" data-user-name="' 
              + playlist.songs[i].autor_name + '">'
              + '<a href="javascript:;" class="remove-song pull-right">&times;</a>'
              + '<a href="javascript:;" class="songdata"></a>'
              + '<a href="javascript:;" class="play-song pull-left"><i class="ion-play"></i><i class="ion-pause"></i></a>'
              + '<a class="songinfo" href="' + LMI.link + 'colecciones/song/' + playlist.songs[i].song_id + '">' 
              + playlist.songs[i].title + '</a>'
              + '<small>' + playlist.songs[i].duration + ' <a href="' 
              + LMI.link + '@' + playlist.songs[i].autor_id + '">' + playlist.songs[i].autor_name + '</a></small>'
            + '</li>';
      }
          $playlist.find('ul').append(newItem);
          LMI.player.set('refresh');


      return playlist.songs.length;



    },

    getList: function(){
      if(playlist==null){
        if(LMI.getCookie('playlist-' + LMI.values.owner)!=""){
          playlist = jQuery.parseJSON(decodeURI(LMI.getCookie('playlist-' + LMI.values.owner)));
        }else{
          playlist = {songs: []};
        }
      }
      return playlist;
    },

    save: function(){
      var encodedplaylist = encodeURI(JSON.stringify(playlist));
      LMI.setCookie('playlist-' + LMI.values.owner,encodedplaylist,360);
      Notifications.create('Lista de reproduccion guardada.', true);
    },

    add: function(song_id,title,url,collection_id,duration,autor_id,autor_name){
      console.log('add song #' + song_id + ' to playlist');

      playlist = LMI.playlist.getList();

      if(playlist.songs.length>0){
        playlist.owner = LMI.owner;
        var found = false, found_index;
        for(i=0; i<playlist.songs.length; i++){
          if(playlist.songs[i].song_id==song_id) found = true; found_index = i;
        }
        if(!found){
          playlist.songs.push({
            "song_id": song_id,
            "title": title,
            "url": url,
            "collection_id": collection_id,
            "duration": duration,
            "autor_id": autor_id,
            "autor_name": autor_name
          });


          $playlist.find('li').removeClass('playing');
          var newItem = '';
              newItem += '<li data-song-id="' + song_id + '" data-title="' + title + '" data-url="' 
              + url + '" data-collection="' + collection_id + '" data-duration="' 
              + duration + '" data-user-id="' + autor_id + '" data-user-name="' + autor_name + '" class="playing">'
              + '<a href="javascript:;" class="remove-song pull-right">&times;</a>'
              + '<a href="javascript:;" class="songdata"></a>'
              + '<a href="javascript:;" class="play-song pull-left"><i class="ion-play"></i><i class="ion-pause"></i></a>'
              + '<a class="songinfo" href="' + LMI.link + 'colecciones/song/' + song_id + '">' + title + '</a>'
              + '<small>' + duration + ' <a href="' + LMI.link + '@' + autor_id + '">' + autor_name + '</a></small>'
            + '</li>';
          $playlist.find('ul').append(newItem);
          LMI.player.set('refresh');
          console.log('add html item');
          Notifications.create(title + ' agregada a la lista de reproduccion.', true);
        }else{
          if($playlist.find('[data-song-id="' + song_id + '"]').length>0){
            $playlist.find('[data-song-id="' + song_id + '"]').addClass('playing').siblings().removeClass('playing');
          }
        }

        LMI.playlist.save();
      }else{
        playlist = {};
        playlist.owner = LMI.owner;
        playlist.songs = [];
        playlist.songs.push({
            "song_id": song_id,
            "title": title,
            "url": url,
            "collection_id": collection_id,
            "duration": duration,
            "autor_id": autor_id,
            "autor_name": autor_name
          });

        $playlist.find('li').removeClass('playing');
          var newItem = '';
              newItem += '<li data-song-id="' + song_id + '" data-title="' + title + '" data-url="' 
              + url + '" data-collection="' + collection_id + '" data-duration="' 
              + duration + '" data-user-id="' + autor_id + '" data-user-name="' + autor_name + '" class="playing">'
              + '<a href="javascript:;" class="remove-song pull-right">&times;</a>'
              + '<a href="javascript:;" class="songdata"></a>'
              + '<a href="javascript:;" class="play-song pull-left"><i class="ion-play"></i><i class="ion-pause"></i></a>'
              + '<a class="songinfo" href="' + LMI.link + 'colecciones/song/' + song_id + '">' + title + '</a>'
              + '<small>' + duration + ' <a href="' + LMI.link + '@' + autor_id + '">' + autor_name + '</a></small>'
            + '</li>';
          $playlist.find('ul').append(newItem);
          LMI.player.set('refresh');
          console.log('add html item');

          LMI.playlist.save();

      }
    }
  },
  player: {
    set: function(action){
      switch (action){
        case 'play':
          $playerAn.jPlayer('play');
          break;

        case 'pause':
          $playerAn.jPlayer('pause');
          Notifications.create('Reproduccion pausada. <a href="javascript:LMI.player.set(\'play\');">Reanudar</a>', 1);
          break;

        case 'refresh':
          return updatePlayListSize();
          break;
        
        case 'stop':
          Notifications.create('Reproduccion detenida.', 1);
          $playerAn.jPlayer('stop');
          break;


      }
    },
    volumerController: function(){
      //Store frequently elements in variables
      var slider  = $('#volumeslider'),
        volumetooltip = $('.tooltip');

      //Hide the Tooltip at first
      volumetooltip.hide();

      //Call the Slider
      slider.slider({
        //Config
        range: "min",
        min: 0,
        value: 100,

        start: function(event,ui) {
            volumetooltip.fadeIn('fast');
        },
        //Slider Event
        slide: function(event, ui) { //When the slider is sliding

          var value  = slider.slider('value'),
            volume = $('.volume');

            $playerAn.jPlayer("volume", value/100);

          volumetooltip.css('left', value).text(ui.value);  //Adjust the tooltip accordingly

          if(value <= 5) { 
            volume.css('background-position', '0 0');
          } 
          else if (value <= 25) {
            volume.css('background-position', '0 -25px');
          } 
          else if (value <= 75) {
            volume.css('background-position', '0 -50px');
          } 
          else {
            volume.css('background-position', '0 -75px');
          };

        },
        stop: function(event,ui) {
            volumetooltip.fadeOut('fast');
            var value  = slider.slider('value');
            $playerAn.jPlayer("volume", value/100);
        },
      });
    }
  },
  defaultSong: function(){
    $playerAn.jPlayer("setMedia", {
        title: "Nombre de cancion es?",
        mp3: "http://localhost/labelmusicinc/usercontent/media/1/o_18ovl3jvu30t1dcj158j1sui4c31c.mp3"
      });
    LMI.player.set("play");
  },
  setSong: function(title,url,collection_id,song_id,duration,autor_id,autor_name){
    // if(collection_id=='__?'){
      $playerAn.jPlayer("setMedia", {
        title: title,
        mp3: url
      });
    // }else{
    //   $playerAn.jPlayer("setMedia", {
    //     title: "Nombre de cancion es?",
    //     mp3: "http://localhost/labelmusicinc/usercontent/media/" + autor_id + "/o_18ovl3jvu30t1dcj158j1sui4c31c.mp3"
    //   });
    // }

    $player.find('.songtitle').parent().attr('href', LMI.link + 'colecciones/song/' + song_id);

    $('.__player_progress_bg_progress').css({width: '0%'});


      LMI.setCookie('playing_song_title',title,360),
      LMI.setCookie('playing_song_url', url, 360),
      LMI.setCookie('playing_song_collection_id', collection_id, 360);
      LMI.setCookie('playing_song_id', song_id, 360);
      LMI.setCookie('playing_duration', duration, 360);
      LMI.setCookie('playing_autor_id', autor_id, 360);
      LMI.setCookie('playing_autor_name', autor_name, 360);

      // if($playlist.find('[data-song-id="' + song_id + '"]').length==0){
        LMI.playlist.add(song_id,title,url,collection_id,duration,autor_id,autor_name);
      // }




    LMI.player.set("play");
  },
  getCurrentSong: function(){
    return {
      title: LMI.getCookie('playing_song_title'),
      url: LMI.getCookie('playing_song_url'),
      collection_id: LMI.getCookie('playing_song_collection_id'),
      song_id: LMI.getCookie('playing_song_id')
    };
  },
  initPlayer: function(){
    $playerAn.jPlayer({
      ready: function (event) {
        console.log('player ready');
      },
      timeupdate: function(event) {
        $player.find('.__player_progress_bg').css({width: event.jPlayer.status.currentPercentAbsolute + "%" });
        $player.find('.__player_progress_knob').css({marginLeft: (event.jPlayer.status.currentPercentAbsolute) + "%" });

        var currentTimeMinutes = Math.floor(event.jPlayer.status.currentTime / 60);
        var currentTimeSeconds = parseInt(event.jPlayer.status.currentTime - currentTimeMinutes * 60);
            currentTimeSeconds = new String(currentTimeSeconds).length==1 ? "0" + currentTimeSeconds : currentTimeSeconds;
        var currentTime = currentTimeMinutes + ':' + currentTimeSeconds;
        $player.find('.durationcurrent').text(currentTime);

        var totalTimeMinutes = Math.floor(event.jPlayer.status.duration / 60);
        var totalTimeSeconds = parseInt(event.jPlayer.status.duration - totalTimeMinutes * 60);
            totalTimeSeconds = new String(totalTimeSeconds).length==1 ? "0" + totalTimeSeconds : totalTimeSeconds;
        var totalTime = totalTimeMinutes + ':' + totalTimeSeconds;
        $player.find('.durationtotal').text(totalTime);
      },
      seeking: function(event){
        $player.find('.__player_progress_knob').css({marginLeft: (event.jPlayer.status.seekPercent) + "%" });
      },
      play: function(event) {
        $player.addClass('playing');

        console.log(event.jPlayer.status);

        var curSong = LMI.getCurrentSong();
        $('.playing').removeClass('playing');
        $('[data-song-id="' + curSong.song_id + '"]').addClass('playing');
        Notifications.create('Reproduciendo: ' + curSong.title, 1);

        if($playlist.find('li').length>0){
          if(LMI.isMobile()){
            $.pageslide({href:'#playlistplayer', modal: true});
          }else{
            $('.__playerplaylist.__scrollable_wx').mCustomScrollbar("scrollTo",$('.playlistplayer .playing').position().left);
          }
        }else{
          LMI.player.set('stop');
        }



        if(LMI.values.session=="false"){
          $('.modal .modal-dialog').removeClass('modal-lg');
            $.ajax({
              url: '' + LMI.path + '../user.interactions.php?offline&do=login',
              success: function(xhr){
                $('.modal .modal-content').html(xhr);
                $('.modal').modal();
              }
            });
        }


      },
      pause: function(event) {
        $player.removeClass('playing');
        $('.__feature_feed [data-song-id]').removeClass('playing');
        var curSong = LMI.getCurrentSong();
        $('[data-song-id="' + curSong.song_id + '"]').removeClass('playing');

      },
      stop: function(){
        Notifications.create('Reproduccion detenida.', 1);
      },
      ended: function(event) {
        $player.removeClass('playing');

        var curSong = LMI.getCurrentSong();
        if(playlist.songs.length>0){
          var cur_index = $playlist.find('li[data-url="' + curSong.url + '"]').index();
          if($playlist.find('li').length>cur_index){
            $playlist.find('li').eq(cur_index).next().find('.play-song').trigger('click');
          }
        }


        if(LMI.values.session=="false"){
          $('.modal .modal-dialog').removeClass('modal-lg');
            $.ajax({
              url: '' + LMI.path + '../user.interactions.php?offline&do=login',
              success: function(xhr){
                $('.modal .modal-content').html(xhr);
                $('.modal').modal();
              }
            });
        }


      },
      progress: function(lp) {
        var percent = lp.jPlayer.status.seekPercent;
        // console.log(percent);
        $('.__player_progress_bg_progress').css({width: percent + '%'});

      },
      volumechange: function(event){
        // if(event.jPlayer.status.muted){
        //   console.log('muted');
        // }
      },
      error: function(event){
        playlist = LMI.playlist.getList();
        if(playlist.songs.length>0){
          $playlist.find('li').first().find('.play-song').trigger('click');
        }else{
          $player.find('.songtitle').text("No hay canciones en cola de reproduccion.");
        }

        Notifications.create('No se pudo reproducir porque tu lista de reproduccion esta vacia.');
      },
      errorAlerts:true,
      swfPath: LMI.path + "plugins/player/",
      supplied: "mp3",
      wmode: "window",
      // keyEnabled: true,
      cssSelectorAncestor: '#bottom',
      cssSelector: {
        title: '.songtitle',
        play: '._control_play',
        seekBar: ".__player_progress_seek",
        pause: '._control_pause',
        mute: '._mute',
        unmute: '._unmute'
      }
    });



  },
  loadContent: function(filter){
     if(doxhr!=null && doxhr!=undefined){
          doxhr.abort();
      }


      console.log(filter);

      var link_filter = filter.replace('.','_');


      var isUserSongs = false;
      switch(filter){
            case 'collections':
              filter = 'all';
              break;
            case 'songs':
              filter = 'filter:songs';
              break;
            case 'activity':
              filter = 'filter:activity';
              break;
            case 'mixes':
              filter = "filter:category.1";
              break;
            case 'remixes':
              filter = "filter:category.2";
              break;
            case 'ediciones':
              filter = "filter:category.3";
              break;
            case 'sincategoria':
              filter = "filter:category.0";
              break;
            case 'songs.all':
              filter = "filter:songs.all";
              break;
            case 'songs.mixes':
              filter = "filter:songs.1";
              break;
            case 'songs.remixes':
              filter = "filter:songs.2";
              break;
            case 'songs.ediciones':
              filter = "filter:songs.3";
              break;
            case 'songs.sincategoria':
              filter = "filter:songs.0";
              break;
          }

      switch (true){
        case /songs\.user/.test(filter):
          isUserSongs = true;
          break;
      }

      filter = isUserSongs ? 'filter:' + filter : filter;

      console.log('._feed_container [data-content-filter="'+link_filter+'"]', $('._feed_container [data-content-filter="'+link_filter+'"]').length);

      if(filter!=lastFilter){ $('._feed_container').empty(); }
      var from = filter==lastFilter ? $('._feed_container [data-content-filter="'+link_filter+'"]').length : 0;
      // console.log(filter, lastFilter);
      lastFilter = filter;
      // console.log(filter, lastFilter);
      var maxResults = 12;
      var isHomepage = $('._feed_container').hasClass('homepage') ? true : false;
    doxhr = $.ajax({
          url: '' + LMI.path + '../api.php?collections&view=' + filter + '&from=' + from + '&to=' + maxResults,
          success: function(xhr){
            console.log(xhr);
            if(xhr.status!=undefined && $('._feed_container [data-content-filter="'+link_filter+'"]').length==0){
              $('._feed_container').empty().html('<p class="text-muted">No se encontraron datos.</p>');
              $('.d-more-btn').hide();
            }else{
              var _html = "";
              for(i=0; i<xhr.length; i++){

              if (xhr[i].contenttype ==  "song"){
                    var duration = '0:00';
                    if(xhr[i].audio_info!=undefined && xhr[i].audio_info!=null && xhr[i].audio_info!=""){
                      xhr[i].audio_info = jQuery.parseJSON(xhr[i].audio_info);
                      duration = xhr[i].audio_info.Length_mmss!=undefined ? xhr[i].audio_info.Length_mmss : duration;
                    }

                    date_published = timeConverter(xhr[i].published);

                    xhr[i].collection_id = xhr[i].collection_id==null ? "__?" : xhr[i].collection_id;
                    var collection_name = xhr[i].collection_id == "__?" ? "" : (xhr[i].collection.length>20 ? xhr[i].collection.substring(0,20) + '&hellip;' : xhr[i].collection);
                    var collection_link = xhr[i].collection_id == "__?" ? "" : '<b>&bull;</b> <a href="' + LMI.link + 'colecciones/coleccion/' + xhr[i].collection_id + '">' + collection_name + '</a>';
                    var classes = isHomepage ? 'col-xs-12 col-sm-12' : 'col-xs-12 col-sm-12';
                    var category_link = xhr[i].category;
                    switch(xhr[i].category){
                      case '0':
                        category_link = 'sincategoria';
                        break;
                      case '1':
                        category_link = 'mixes';
                        break;
                      case '2':
                        category_link = 'remixes';
                        break;
                      case '3':
                        category_link = 'ediciones';
                        break;
                      case 'all':
                        category_link = 'ediciones';
                        break;
                    }

                  _html += ( isHomepage ? '' : '<div class="col-xs-12 col-sm-6" data-content-type="songs">' )
                        + '<div data-content-filter="' + link_filter + '" data-content-type="songs" class="' 
                        + classes + ' __feature_oi __content_song -song-' + xhr[i].id + '" '
                        + 'id="song-' + xhr[i].id + '" data-id="' + xhr[i].id + '"><div class="col-xs-12">'
                        + '<div class="__feature_oi_cover" data-song-id="' 
                        + xhr[i].id + '"><div class="__feature_oi_info"><div class="__b_a">'
                        + '<a href="javascript:;" class="pull-left play_song_in" '
                        + 'data-collection="' + xhr[i].collection_id + '" data-duration="' + duration + '" '
                        + 'data-song-id="' + xhr[i].id + '" data-song-name="' + xhr[i].filename + '" '
                        + 'data-file="' + xhr[i].file + '" data-user-name="' + xhr[i].user_fullname + '" data-user-id="' 
                        + xhr[i].user_id + '"><i class="ion-play"></i><i class="ion-pause"></i></a>'
                        + ' &nbsp;<a href="' + LMI.link + 'colecciones/song/' + xhr[i].id + '" class="song_name">' 
                        + xhr[i].filename + '</a><br /><h4><i class="ion-ios7-clock-outline"></i> ' 
                        + duration + 'm ' + collection_link + ' <b>&bull;</b> <span title="' 
                        + xhr[i].published + '" class="tooltip-t_ date_counter">' 
                        + date_published + '</span> <b>&bull;</b> <a href="' + LMI.link + 'colecciones/#view/songs/' 
                        + category_link + '">' + LMI.values.categories[xhr[i].category] + '</a></h4></div></div>'
                        + '<span class="clearfix"></span></div></div><div class="useful_information _noshow">'
                        + '<input type="hidden" name="information__song__' + xhr[i].id + '" value="' 
                        + encodeURI(JSON.stringify(xhr[i])) + '" /></div></div>'
                        + ( isHomepage ? '' : '</div>');
                  
                }

                if(xhr[i].contenttype == "collection"){
                    var classes = isHomepage ? 'col-xs-6 col-sm-6 col-md-4' : 'col-xs-6 col-sm-4 col-md-3';
                    _html += '<div data-content-filter="' + link_filter + '" data-content-type="collections" data-content-filter="' + link_filter + '" class="' + classes + ' __feature_oi __content_collection"><div class="col-xs-12"><div class="__feature_oi_cover"><a href="' + LMI.link + 'colecciones/coleccion/' + xhr[i].id + '"><div class="__feature_oi_img"><img src="' + LMI.path + '../usercontent/media/' + xhr[i].user_id + '/small_' + xhr[i].cover_url + '"></div></a><div class="__feature_oi_info"><a href="' + LMI.link + 'colecciones/coleccion/' + xhr[i].id + '" class="__linker"></a><div class="__b_a"><small class="text-muted">' + xhr[i].numb + ' canciones</small><br />' + xhr[i].name + '<br /><small>' + LMI.values.categories[xhr[i].category] + '</small><br /><span class="btn btn-trans btn-xs">LEER MAS</span></div></div></div></div></div>';
                }

  



                    /***************************** comments *************************/
                      if(xhr[i].contenttype == "comment"){

                            date_published = timeConverter(xhr[i].published);

                            xhr[i].content = xhr[i].comment_content_type=="0" ? 'coment&oacute; una <a href="' + LMI.link + 'colecciones/coleccion/' + xhr[i].comment_content_id + '" class="tooltip-t" title="ver colecci&oacute;n" data-placement="right">colecci&oacute;n</a>' : 'coment&oacute; una <a href="' + LMI.link + 'colecciones/song/' + xhr[i].comment_content_id + '" class="tooltip-t" title="ver cancion" data-placement="right">canci&oacute;n</a>';
                            var _right = i % 2 == 1 ? ' _set_right' : '';

                            var classes = isHomepage ? 'col-xs-12 col-sm-12' : 'col-xs-12 col-sm-6';

                            xhr[i].comment_body = xhr[i].comment_body.replace(/\n/g, '<br />');
                          _html += '<div data-content-filter="' + link_filter + '" data-content-type="activity" data-content-filter="' + link_filter + '" class="' 
                                + classes + ' __feature_oi __content_song __content_comment -comment-' 
                                + xhr[i].id + _right + '" '
                                + 'id="comment-' + xhr[i].id + '" data-id="' + xhr[i].id + '"><div class="col-xs-12">'
                                + '<div class="__feature_oi_cover"><div class="__feature_oi_info"><div class="__b_a">'
                                + '<div class="__hea">'
                                + '<a href="' + LMI.link + '@' + xhr[i].user_username + '" class="pull-left user_photo">'
                                + ( xhr[i].user_photo!=null ? '<img src="' + LMI.link + 'usercontent/media/' + xhr[i].comment_user_id + '/' + xhr[i].user_photo +'" />' : '<img src="' + LMI.link + 'assets/image/_usr_pc.jpg" />' )
                                + '</a>'
                                + '<a href="' + LMI.link + '@' 
                                + xhr[i].user_username + '" class="song_name">' 
                                + xhr[i].user_fullname + '</a> ' + xhr[i].content + '</div> <p>' + urlify(xhr[i].comment_body) + '</p><h4>' 
                                + 'publicado <span title="' 
                                + xhr[i].published + '" class="tooltip-t_ date_counter" data-placement="right" data-date="' + date_published + '">'
                                + date_published + '</span> </h4></div></div>'
                                + '<span class="clearfix"></span></div></div><div class="useful_information _noshow">'
                                + '<input type="hidden" name="information__comment__' + xhr[i].id + '" value="' 
                                + encodeURI(JSON.stringify(xhr[i])) + '" /></div></div>';


                      }
                    /***************************** comments *************************/

                }

                // console.log(link_filter);
              setTimeout(function(){
                if($('._feed_container [data-content-filter="'+link_filter+'"]').length>0 && filter==lastFilter){
                  $('._feed_container').append(_html);
                }else{
                  $('._feed_container').empty().html(_html);
                }
                $('body').find('._pager').find('a[href="#view/' + link_filter + '"]').parent().addClass('active').siblings().removeClass('active');
                if(xhr.length>--maxResults){
                  $('.d-more-btn').show();
                }else{
                  $('.d-more-btn').hide();
                }
              },10);

            }
          }
        });
  },
  init: function(){
      $('[data-toggle=offcanvas]').click(function () {
        $('.row-offcanvas').toggleClass('active')
      });
      $('body .tooltip-t').tooltip();
      $('body').on('click', '.player-toggl', function(){
        if((LMI.getCookie('LMI_playerVisible')!=null && LMI.getCookie('LMI_playerVisible')!="" && LMI.getCookie('LMI_playerVisible')=="true") 
          || (playerVisible)){
          playerVisible = false;
          LMI.setCookie('LMI_playerVisible','false',360);
        }else{
          playerVisible = true;
          LMI.setCookie('LMI_playerVisible','true',360);
        }

        $(this).toggleClass('ui-orange').parent().toggleClass('open active');
        $(this).closest('.navbar').toggleClass('open');
        $player.toggleClass('open');
        $playerClone.toggleClass('open');
      }).on('click', '.btn-close-modal', function(e){
        e.preventDefault();
        e.stopPropagation();
        $modal.modal('hide');
      }).on('click', '.btn-new-modal', function(e){
        if(LMI.isMobile()){
          //do nothin
        }else{
          e.preventDefault();
          e.stopPropagation();
        
          $(this).next('.login-drop').toggle();
        }

      }).on('focus', '.collection-item a', function(){
        $(this).closest('.collection-item').addClass('focus');
      }).on('blur', '.collection-item a', function(){
        $(this).closest('.collection-item').removeClass('focus');
      }).on('click', '.toggle_list_collection', function(e){
        e.preventDefault();
        e.stopPropagation();

        var status = $(this).attr('data-status');
        var cid = $(this).attr('data-collection');
        var _self = $(this);

        LMI.fetchCollection(cid,status,_self);

        // $('[href="#share"]').toggle();
        if(collection_open){
          collection_open = false;
          // $('body').removeClass('modal-open');
        }else{
          collection_open = true;
          // $('body').addClass('modal-open');
        }

        // var windowHeight = window.innerHeight;
        // var h = $('.menu-area').innerHeight() + $('.song_view_songs_list_').innerHeight() + $('.__song_list_title').innerHeight() + 50;
        // h = windowHeight>h ? windowHeight - h : h - windowHeight;
        _self.children('.c_info__').toggleClass('open');
        $('._song_view_collection_list').toggleClass('open');

        $("._song_view_collection_list").css({opacity: 0.98});
        


      }).on('keyup', function(e){
        if(e.keyCode==27){
          if(collection_open){
            $('body .toggle_list_collection').children('.c_info__').removeClass('open');
            $('._song_view_collection_list').removeClass('open');
            collection_open = false;
            $('body').removeClass('modal-open');
          }
        }
      }).on('click', '._collection_togg', function(){
        $(this).toggleClass('open');
        $('.collection_songs').toggle();
      }).on('click', '._comment_box_submit', function(e){
        e.preventDefault();
        e.stopPropagation();
        if(!$(this).hasClass('disabled')){
          $(this).button('loading');
          LMI.postComment($(this));
        }

      }).on('click', '.load-more-button a', function(){
        $(this).button('loading');
        setTimeout(function(){
          LMI.fetchComments($('body').find('.activity_feed'));
        }, 100);
      }).on('click', '.openaction', function(){
        $('.modal .modal-dialog').removeClass('modal-lg');

        var _id = $(this).attr('data-id'), action = $(this).attr('data-action'), par = $(this).attr('data-par')!=undefined ? $(this).attr('data-par') : "";
        $.ajax({
          url: '' + LMI.path + '../user.interactions.php?profile&view=' + _id + '&do=' + action + "&param=" + par,
          success: function(xhr){
            $('.modal .modal-content').html(xhr);
            $('.modal').modal();
          }
        });
      }).on('click', '.changeuname', function(){
        var _id = $(this).attr('data-id'), ouname = $('#ousername'), nuname = $('#nusername'), err = $('#uerr');
        err.hide().addClass('alert-warning').removeClass('alert-info');
        if(nuname.val()==ouname.val()){
          err.show().text('Deberias elegir un nombre distinto!');
        }else{
          if(validUsername(nuname.val())){
            $.ajax({
              url: LMI.link + 'api.php?user&view=' + nuname.val(),
              success: function(xhr){
                if(xhr.status!=undefined){
                  err.hide();
                  $.ajax({
                    url: LMI.link + 'user.interactions.php?profile&view=' + _id + '&do=saveuname&show=' + nuname.val(),
                    success: function(sub_xhr){
                      $('.modal .modal-content').html(sub_xhr);
                      $('.modal').modal();
                      setTimeout(function(){
                        window.location = LMI.link + '@' + _id + '/editar';
                      }, 1000);
                    }
                  });
                }else{
                  err.show().text('Este nombre de usuario ya esta siendo usado.');
                }
              }
            });
          }else{
            err.show().addClass('alert-info').removeClass('alert-warning').html('Nombre de usuario invalido! Los nombres de usuario solo deben contener letras (A-Z) y numeros (0-9). No se permiten caracteres adiciones, a excepcion de gui&oacute;n bajo (_).<br /><br /><a href="javascript:;" onclick="$(\'#nusername\').val(\'dj_win_\' + (new String(Math.random(1,5)).replace(\'.\',\'\').substring(1,6)))" class="button button-white">Haz click aqui y te mostramos como</a>');
          }
        }
      }).on('click', '.changecollectiondo', function(){
        var _id = $(this).attr('data-id'), ncollection = $('#ncollection');
          $.ajax({
            url: LMI.link + 'user.interactions.php?profile&view=' + _id + '&do=savencollection&show=' + ncollection.val(),
            success: function(sub_xhr){
              $('.modal .modal-content').html(sub_xhr);
              $('.modal').modal();
              Notifications.create('Cambios guardados. Se recargara la pagina en 1 segundo.', true);
              setTimeout(function(){
                window.location.reload();
              }, 1000);
            }
          });
          
      }).on('click', '.changeupassword', function(){
        var _id = $(this).attr('data-id'), ouname = $('#opassword'), nuname = $('#npassword'), err = $('#uerr');
        err.hide().addClass('alert-warning').removeClass('alert-info');
        if(nuname.val()==ouname.val() || (nuname.val()=='Clave nueva' || ouname.val()=="Clave actual")){
          err.show().text('Elige una clave diferente.');
        }else{
          if(validPassword(nuname.val())){
            $.ajax({
              url: LMI.link + 'api.php?user&view=' + _id + '&do=checkpass',
              type: 'post',
              data: $('.modal :input').serialize(),
              success: function(xhr){
                  console.log(xhr);
                if(xhr.status==undefined && xhr.id!=undefined){
                  err.hide();

                  setTimeout(function(){
                    // window.location = LMI.link + '@' + _id + '/editar';
                    window.location.reload()
                  }, 1000);

                console.log('clave correcta');
                }else{
                  if(xhr.status=="nochanged"){
                    err.show().text('Ha ocurrido un error durante el proceso.');
                  }else{
                    err.show().text('Clave de usuario actual incorrecta.');
                  }
                }
              }
            });
          }else{
            err.show().addClass('alert-info').removeClass('alert-warning').html('Clave invalida! No puede contener caracteres especiales y debe tener entre 6 y 20 letras.');
            nuname.focus();
          }
        }
      }).on('click', '.changeucountry', function(){
        var _id = $(this).attr('data-id'), ouname = $('#ocountry'), nuname = $('#ncountry'), err = $('#uerr');
        err.hide().addClass('alert-warning').removeClass('alert-info');
        if(nuname.val()==ouname.val() || (nuname.val()=='')){
          err.show().text('Elige un pais.');
        }else{

            $.ajax({
              url: LMI.link + 'api.php?user&view=' + _id + '&do=updatecountry',
              type: 'post',
              data: $('.modal :input').serialize(),
              success: function(xhr){
                  console.log(xhr);
                if(xhr.status==undefined){
                  err.hide();

                  setTimeout(function(){
                    window.location = LMI.link + '@' + _id + '/editar';
                  }, 1000);

                // console.log('clave correcta');
                }else{
                  if(xhr.status=="nochanged"){
                    err.show().text('Ha ocurrido un error durante el proceso.');
                  }else{
                    err.show().text('El pais no pudo ser cambiado.');
                  }
                }
              }
            });
         
        }
      }).on('click', '.comment_cog', function(){
        $('.modal .modal-dialog').removeClass('modal-lg');
        
        var _id = $(this).closest('li').attr('data-id');
        var _type = $(this).closest('li').attr('data-content-type');
        $.ajax({
          url: '' + LMI.path + '../user.interactions.php?comment_actions&view=' + _id + '&type=' + _type,
          success: function(xhr){
            $('.modal .modal-content').html(xhr);
            $('.modal').modal();
          }
        });
      }).on('click', '.comment_actions a', function(){
        $(this).toggleClass('active').siblings().removeClass('active');
      }).on('click', '.comment_actions_choose', function(){
        if($(this).closest('.modal').find('.comment_actions').find('a.active').length>0){
          $(this).button('loading');
          var selectedItem = $(this).closest('.modal').find('.comment_actions').find('a.active');
          var action = selectedItem.attr('data-action'),
              comment_id = selectedItem.attr('data-comment-id'),
              comment_content_type = selectedItem.attr('data-content-type');
          $.ajax({
            url: '' + LMI.path + '../user.interactions.php?comment_actions&exec=' + action + '&view=' + comment_id + '&type=' + comment_content_type,
            success: function(xhr){
              console.log(action, comment_id, comment_content_type);
              $('.modal .modal-content').html(xhr);

              if(xhr.indexOf('data-success-removing')>-1){
                console.log('removed');
                $('body').find('#comment_' + comment_id).remove();
              }
            }
          });
        }else{
          alert('Selecciona una accion antes de continuar');
        }
      }).on('click', '.comment_actions_send_flag', function(){
        console.log('Confirming flag comment');

        var comment = $(this).closest('.comment_parent').find('textarea');

        if( comment.closest('.comment_parent').find('._err').length>0 ){
          comment.closest('.comment_parent').find('._err').remove();
        }

        if(comment.val()!=undefined && comment.val()!=null && comment.val()!=""){
          //success, now send the comment
          $(this).button('loading');
          var _type = comment.attr('data-content-type'),
              _id = comment.attr('data-comment-id'),
              _flag = comment.serialize().replace("flag_c=",'');

              $.ajax({
                url: '' + LMI.path + '../user.interactions.php?comment_actions&exec=flag&confirm=' + _flag + '&type=' + _type + '&view=' + _id,
                success: function(xhr){
                  $('.modal .modal-content').html(xhr);
                  console.log(xhr);
                }
              });

        }else{
          if( comment.closest('.comment_parent').find('._err').length>0 ){
            comment.closest('.comment_parent').find('._err').html('<p class="text-danger">No puedes enviar un formulario vacio!</p>');
          }else{
            comment.closest('.comment_parent').find('.form-group').after('<div class="_err"><p class="text-danger">No puedes enviar un formulario vacio!</p></div>');
          }
        }
      }).on('click', '.collection_more a', function(){
        var limit = $(this).attr('data-limit');
        $(this).button('loading');
        var count = $('._collections_l .__content_collection').length;
        var user = $(this).attr('data-user');
        var btn = $(this);
        $.ajax({
          url: '' + LMI.path + '../api.php?collections&id=' + user + '&from=' + count + '&to=' + limit,
          success: function(xhr){
            console.log(xhr);
            if(xhr.status!=undefined){
              btn.remove();
            }else{
              var item = "";
              for(i=0; i<xhr.length; i++){



                item += '<div class="col-xs-6 col-md-3 __feature_oi __content_collection">'
              + '<div class="col-xs-12"><div class="__feature_oi_cover"><div class="__feature_oi_info"><a href="' + LMI.link + 'colecciones/coleccion/' +  xhr[i]['id'] + '"><div class="__b_a" style="border-bottom: 1px solid #FCECEC;">' + xhr[i]['name'] + '<br /><small>' + LMI.values.categories[xhr[i]['category']] + '</small></div></a><div style="margin: 7px; text-align: left"><a href="' + LMI.link + 'colecciones/editar/coleccion-'+ xhr[i]['id'] + '" class="btn btn-default btn-xs">EDITAR</a>&nbsp;<a href="' + LMI.link + 'colecciones/eliminar/coleccion-'+ xhr[i]['id'] + '" class="btn btn-cancel btn-xs pull-right">&times;</a></div><span class="clearfix"></span></div></div></div></div>';
              }

              $('._collections_l').append(item);

              if(xhr.length<limit){
                btn.remove();
              }else{
                btn.button('reset');
              }

            }
          }
        });
      }).on('click', '.go-to-access', function(e){
        if(LMI.isMobile()){

        }else{
          e.preventDefault();
          e.stopPropagation();

          $('.btn-access').click();
          $(window).scrollTop(0);
        }
      }).on('click', '._feed_listener li a', function(e){
        // e.preventDefault();
        // e.stopPropagation();
        
        var filter = $(this).attr('href');
        console.log(filter);
        var _self = $(this);
        var oHTML = _self.html();
        _self.html('<img src="' + LMI.path + 'image/preloader_small.gif" />');
        _self.parent().addClass('active').siblings().removeClass('active');
        setTimeout(function(){
            _self.html(oHTML);
          }, 50);
      }).on('click', '._togglenoflowlist', function(){
        var _self = $(this);
        $('._noflowlist, ._noflowlist .mCustomScrollBox').animate({maxHeight: ( ($('._noflowlist li').first().innerHeight() * $('._noflowlist li').length) + ( 2 * $('._noflowlist li').length ) ) + 'px'}, 300, function(){
        $('._noflowlist').css({overflow: 'visible'});
        _self.remove();
        });
      }).on('click', '._layer_toggle ul li a', function(e){
        e.preventDefault();
        e.stopPropagation();

        var _index = $(this).parent().index();

        $(this).parent().addClass('active').siblings().removeClass('active');
        $('._layer').removeClass('active');
        $('._layer').eq(_index).addClass('active');
      }).on('click', '.download', function(e){
        // downloading = false;
        var _self = $(this);

        if(_self.hasClass('dl_____')){
          // console.log('disable');
          setTimeout(function(){
            _self.attr('disabled','disabled').addClass('disabled').html('<i class="ion-checkmark-round"></i> descargado');
          }, 10);
        }else{
        e.preventDefault();
        e.stopPropagation();

        var _link = $(this).attr('data-download');
        var timer = 30;
        if(!downloading){
            downloading = true;
            
            _self.button('loading').removeClass('btn-success').addClass('btn-cancel');
            _self.html('<i class="ion-ios7-clock-outline"></i> descarga en ' + timer);

          var timeInterval = setInterval(function(){
          if(timer>0){
            _self.html('<i class="ion-ios7-clock-outline"></i> descarga en ' + timer);
            timer--;
          }else{
          _self.text('espera');
          setTimeout(function(){
            clearInterval(timeInterval);
            _self.html('click aqui para descargar').removeClass('btn-cancel').addClass('btn-warning').removeAttr('disabled','false').removeClass('disabled');
            var download_count = parseInt($('.downloads-number').text());
            download_count++;
            $('.downloads-number').html('<i class="ion-ios7-cloud-download-outline"></i> ' + download_count);

            // window.location = _link;
            _self.attr('href', _link).attr('target','_blank').addClass('dl_____').removeAttr('disabled','false').removeClass('disabled');
            // console.log('enable');
            // _self.trigger('click');
            },500);
          }
          },1000);
        }

        }
      }).on('click touch', '.play_song_in', function(){

        var user_id = $(this).attr('data-user-id'),
            file = $(this).attr('data-file'),
            collection = $(this).attr('data-collection'),
            url = LMI.path + '../usercontent/media/' + user_id + '/' + file,
            title = $(this).attr('data-song-name'),
            song_id = $(this).attr('data-song-id'),
            duration = $(this).attr('data-duration'),
            autor_id = $(this).attr('data-user-id'),
            autor_name = $(this).attr('data-user-name');

            var getCurrentSong = LMI.getCurrentSong();
            if($(this).hasClass('playing') && $('.player-footer').hasClass('playing') && getCurrentSong.url!=undefined && getCurrentSong.url==url){
              LMI.player.set('pause');
              $('.play_song_in').removeClass('playing');
              // $(this).find('.ion-pause').addClass('ion-play').removeClass('ion-pause');
              isPlaying=url;
            }else{
              // if(!$('.player-toggl').parent().hasClass('open')){
              // $('.player-toggl').trigger('click');
              // }

              if(getCurrentSong.url!=undefined && getCurrentSong.url==url && $('.player-footer').hasClass('playing')){
                  $(this).addClass('playing');
                  // $(this).find('.ion-play').removeClass('ion-play').addClass('ion-pause');
                  LMI.player.set('play');
              }else{
                LMI.setSong(title,url,collection,song_id,duration, autor_id, autor_name);

                if(getCurrentSong.url!=undefined && getCurrentSong.url==url){
                    $(this).addClass('playing');
                    // $(this).find('.ion-play').removeClass('ion-play').addClass('ion-pause');
                  }else{
                  $('.play_song_in').removeClass('playing');
                  $(this).addClass('playing');
                  // $(this).find('.ion-play').removeClass('ion-play').addClass('ion-pause');
                  }
              }

              isPlaying=url;
              
            }
      }).on('click touch', '.play-song, .songdata', function(){

        console.log('playing/pausing song');

        var _song = $(this).closest('li');
        var user_id = _song.attr('data-user-id'),
            collection = _song.attr('data-collection'),
            url = _song.attr('data-url'),
            title = _song.attr('data-title'),
            song_id = _song.attr('data-song-id'),
            duration = _song.attr('data-duration'),
            autor_id = _song.attr('data-user-id'),
            autor_name = _song.attr('data-user-name');

            if(_song.hasClass('playing') && $player.hasClass('playing')){
              LMI.player.set('pause');
              // _song.removeClass('playing');
              // $(this).find('.ion-pause').addClass('ion-play').removeClass('ion-pause');
              isPlaying=url;
            }else{
              if(!$('.player-toggl').parent().hasClass('open')){
              $('.player-toggl').trigger('click');
              }

              if(isPlaying!=false && url==isPlaying){
                  _song.addClass('playing');
                  // $(this).find('.ion-play').removeClass('ion-play').addClass('ion-pause');
                  LMI.player.set('play');
              }else{
                var getCurrentSong = LMI.getCurrentSong();
                LMI.setSong(title,url,collection,song_id,duration, autor_id, autor_name);

                if(getCurrentSong.url!=undefined && getCurrentSong.url==url){
                    _song.addClass('playing');
                    // $(this).find('.ion-play').removeClass('ion-play').addClass('ion-pause');
                  }else{
                  $playlist.find('li').removeClass('playing');
                  _song.addClass('playing');
                  // $(this).find('.ion-play').removeClass('ion-play').addClass('ion-pause');
                  }
              }

              isPlaying=url;
              
            }
      }).on('click touch', '.remove-song', function(){
        var _index = $(this).closest('li').index();


        console.log(_index);

        playlist = LMI.playlist.getList();
        playlist.songs.unpush(_index);
        LMI.playlist.save();

        if($('.playlistplayer').first().find('li').eq(_index).hasClass('playing')){
          LMI.player.set('stop');
          
          if($('.playlistplayer').first().find('li').eq(_index).next('li').length>0){
              $('.playlistplayer').first().find('li').eq(_index).next('li').find('.play-song').trigger('click');
            }else{
            if($('.playlistplayer').first().find('li').eq(_index).prev('li').length>0){
              $('.playlistplayer').first().find('li').eq(_index).prev('li').find('.play-song').trigger('click');
            }else{
              LMI.player.set('stop');
            }
          }
        }

        $('.playlistplayer').each(function(){
          $(this).find('li').eq(_index).remove();
        });

        LMI.player.set('refresh');

        Notifications.create('Track removida de la lista.');

        
      }).on('click', '._control_next', function(){
        if($playlist.find('li.playing').index()==$playlist.find('li').last().index()){
          $playlist.find('li').first().find('.play-song').trigger('click');
        }else{
          $playlist.find('li.playing').next('li').find('.play-song').trigger('click');
        }
      }).on('click', '._control_prev', function(){
        if($playlist.find('li.playing').index()==$playlist.find('li').first().index()){
          $playlist.find('li').last().find('.play-song').trigger('click');
        }else{
          $playlist.find('li.playing').prev('li').find('.play-song').trigger('click');
        }
      }).on('click', '.toggle-playlist', function(){
        $player.toggleClass('playlistopen');
      }).on('click', '.d-more-btn a', function(){
        var _self = $(this),
            parent = _self.parent();
        var filter = location.hash.slice(6).replace(/\//g,'.');
        LMI.loadContent(filter);
      }).on('click', '.curchoice', function(e){
        e.preventDefault();
        e.stopPropagation();


        var _self = $(this);
        $('.chose').not(_self.parent()).removeClass('open');
        _self.parent().toggleClass('open');
        choseOpen[_self.index()] = true;
      }).on('click', '*', function(e){
        if($('body').find('.chose.open').length>0 && !$(this).hasClass('curchoice')){
          $('.chose').removeClass('open');
        }
      }).on('click', '.chose ul li a', function(e){
        var _self = $(this),
            _text = _self.text();
        _self.parent().addClass('active').siblings().removeClass('active');
        _self.closest('.chose').find('.curchoice').html(_text + ' <b class="caret text-muted"></b>');
      }).on('submit', '#searchform', function(e){
        e.preventDefault();
        e.stopPropagation();
        var searchquery = encodeURI($('#searchquery').val());
        window.location.href = LMI.link + 'colecciones/buscar/#view/buscar/' + searchquery;
      }).on('click', '.remove-from-collection', function(){
        var d_id = jQuery(this).attr('data-id');
        if(confirm('Estas seguro de que quieres eliminar esta track?')){
          jQuery(this).closest('li').addClass('removing');
          LMI.filemanager.removeSong(d_id);
        }
      });









      $('form').attr('autocomplete','off');
      // $('form input[type="text"]').first().focus();


      if($('body').find('.toggle_list_collection').length>0){
        setTimeout(function(){
          $('.toggle_list_collection').trigger('click');
        }, 500);
      }

      var window_current_action = window.location.href.replace(window.location.protocol + LMI.link,'').replace(/\//g,'-').replace(/\#/g,'_hash_');
      $('body').addClass(window_current_action).attr('data-action',window_current_action);

       if($('body').find('.filemanager').length>0){
        LMI.filemanager.init();
      }


       if($('body').find('._coverflow').length>0 && $('body').find('._coverflow').find('li').length>0){
        setTimeout(function(){
        $('body').find('._coverflow').show();
          LMI.coverflow();
        }, 500);
       }

        if($('body').find('.__intro._affixer').length>0){
          var affixer = $('body').find('.__intro._affixer');
          var affixheight = affixer.height();
          if($('body').find('._affixer_clone').length>0){
            $('body').find('._affixer_clone').css({height: affixheight + 'px'});
          }else{
          affixer.after('<div class="__intro _affixer_clone" style="height: ' + affixheight + 'px"></div>');
          }
         }

       if($('body').find('.fetch_collections').length>0){
          LMI.fetchCollections();
       }

       if($('body').find('.activity_feed').length>0){
            LMI.fetchComments($('body').find('.activity_feed'));
       }

       if($('body').find('._comment_box').length>0){
        var $textbox = $('body').find('._comment_box').find('._comment_text');
        $textbox.attr('data-original-value', $textbox.val());
       }

       $('._pager_tabs li').last().addClass('last');

      LMI.initPlayer();


        if(!LMI.isMobile()){
          $(".__scrollable_w").mCustomScrollbar({
              theme:"light-3",
              scrollInertia:0
            });
          $(".__scrollable_wx").mCustomScrollbar({
              axis: 'x',
              theme:"minimal",
              scrollInertia:0
            });
          $(".__scrollable_b").mCustomScrollbar({
              theme:"dark-3",
              scrollInertia:0
            });
          $(".__scrollable_md").mCustomScrollbar({
              theme:"minimal-dark",
              scrollInertia:0
            });
        }else{
          $(".__scrollable_w,.__scrollable_wx, .__scrollable_b, .__scrollable_md").css({overflowY: 'scroll'});
        }


        if($('body').find('[data-reload-timer]').length>0){
          var tt = $('[data-reload-timer]').attr('data-reload-timer'), 
              tt = parseInt(tt);
          setTimeout(function(){window.location.reload();},tt);
        }


        LMI.playlist.gen();
        LMI.player.volumerController();


        carouselInstance = $("#carousel-image-and-text").touchCarousel({          
          pagingNav: false,
          snapToItems: false,
          itemsPerMove: 2,        
          scrollToLast: false,
          loopItems: false,
          scrollbar: true
        }).data('touchCarousel');

        if($("#carousel-image-and-text").length>0 && $("#carousel-image-and-text").find('li').length==0){
          $("#carousel-image-and-text").hide();
        }


        if(!$('body').hasClass('notfound')){
          $('.loadingNotif').css({display: 'inherit'});
        }

        if(jQuery('._col_cover_big,.backstretch_image').length>0){
          jQuery('._col_cover_big, .backstretch_image').each(function(){
            jQuery(this).backstretch(jQuery(this).attr('data-image'));
          });
        }


        if(jQuery('.collection_edition').length>0){
          LMI.loadEditionCollections();
        }

        if(jQuery('.nav-tabs').length>0){
          jQuery('body').on('click', '.nav-tabs a', function(e){
            e.preventDefault(); e.stopPropagation();
            var d_parent = jQuery(this).closest('li');
            d_parent.addClass('active').siblings().removeClass('active');
            jQuery('.tab-content .tab-pane').eq(d_parent.index()).addClass('active').siblings().removeClass('active');
          });
        }
  }
}


$(document).on('ready', function(){
  LMI.init();

  if($('body').find('.toggle_list_collection').length>0){
    var _self = $('body').find('.toggle_list_collection');
    var status = _self.attr('data-status');
    var cid = _self.attr('data-collection');
    // LMI.fetchCollection(cid,status,_self);

  }else{
    $loader.removeClass('loading');
  }


Pace.on('hide', function(){
  $('._st_load').removeClass('loading');
});


var viewFirstTab = function () {
  // if($('body').find('._pager').find('li').length>0){
  //   $('body').find('._pager').find('li').eq(0).find('a').trigger('click');
  // }
  if($('body').find('[data-attach="true"]').length>0){
    $('body').find('[data-attach="true"]').find('li').first().find('a').trigger('click');
    // var url = $('body').find('[data-attach="true"]').find('li').first().find('a').attr('href');
    // window.location = url;
  }
};
var viewBook = function (bookId) {
  console.log("viewBook: bookId is populated: " + bookId);
  var tabId = bookId;
};
var viewContent = function (bookId) {
  LMI.loadContent(bookId);

  $('body').removeClass('showsongs');

  if($('body').find('[data-attach="true"]').length>0){
    $('body').find('[data-attach="true"]').each(function(){
      $(this).find('a[href*="#view/' + bookId + '"]').trigger('click')
    });
  }
};
var viewContentAdvanced = function (bookId, book2Id) {
  
  if(bookId=="buscar"){
    LMI.loadContent('filter:buscar.' + book2Id);
    $('#searchquery').val(decodeURI(book2Id));
  }else{
    LMI.loadContent(bookId+'.'+book2Id);
  }


  // console.log(bookId, book2Id);

  $('body').addClass('showsongs');

  if($('body').find('[data-attach="true"]').length>0){
    $('body').find('[data-attach="true"]').each(function(){
      $(this).find('a[href*="#view/' + bookId + '/"]').trigger('click')
      $(this).find('a[href*="#view/' + bookId + '/' + book2Id + '"]').trigger('click')
    });
  }
};

var viewContentAdvancedSearch = function(query){
  LMI.loadContent('filter:buscar.' + query);
  $('#searchquery').val(decodeURI(query));
}

var routes = {
  '/': viewFirstTab,
  '/tab': viewFirstTab,
  '/tab/:bookId': viewBook,
  '/view/:bookId': viewContent,
  '/view/:bookId/:book2Id': viewContentAdvanced,
  '/view/buscar/([^\/]*)': function(query){
    viewContentAdvancedSearch(query);
  }
};

var router = Router(routes);
router.init();


//end of ready
}).ajaxStart(function () {
    $('._st_load').addClass('loading');
    Pace.restart();
}).ajaxComplete(function () {
    $('._st_load').removeClass('loading');
    setTimeout(function(){$('body .tooltip-t').tooltip();$('.date_counter').streamdate();}, 500);
});