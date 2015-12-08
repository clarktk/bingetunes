var jp = null;


function jplayer(){
    var current_track = null;
    var progress_bar = null;
    var vol = null;
    
    var last_track = null;
    var prev_track = null;

	var CookieObj = {
		set: function(name, value, days) {
			var expires = '';
			if(days) {
				var date = new Date();
				date.setTime(date.getTime()+(days*24*60*60*1000));
				expires = "; expires="+date.toGMTString();
			}
			document.cookie = name+"="+value+expires+"; path=/";
		},

		get: function(name) {
			var nameEQ = name + "=";
			var ca = document.cookie.split(';');
			for(var i=0;i < ca.length;i++) {
				var c = ca[i];
				while (c.charAt(0) == ' ') {
					c = c.substring(1, c.length);
				}
				if (c.indexOf(nameEQ) == 0) {
					return c.substring(nameEQ.length,c.length);
				}
			}
			return null;
		},

		del: function(name) {
			this.set(name, '', -1);
		}
	};

    this.init = function(container){
        
		
        // init
        if (jp){
            // destroy player
        } 
            
        jp = $j(container);

        set_cookieObj();
		
        vol =  $j('.volume');
        /* 
        progress_bar = 
            '<div class="jp-progress"> \
                <div class="jp-title"></div> \
                <div class="jp-bg"></div> \
                <div class="jp-seek-bar"> \
                    <div class="jp-play-bar"></div> \
                    <div class="jp-seek-wf"></div> \
                </div> \
            </div>';
        */

        // init jPlayer
        
        jp.jPlayer({
            solution:   "html,flash", // Flash with an HTML5 fallback.
            supplied:   "mp3",
            swfPath:    "/wp-content/themes/soundultima/js_player",
            play: function(){
                activate();
            },
            stop: function(){
                deactivate();
            },
            pause: function(){
                deactivate();
            },
            ended: function(obj) {
                var played = $j('.playing');
                played.removeClass('playing').addClass('played');
                $j('#play_ctrl').removeClass('stop');
                // play next track
                play_next();
            },
            volume: CookieObj.get('player_volume')
        });
		//jp.data("jPlayer").status.currentTime
        
        vol.slider({
            value: CookieObj.get('player_volume')*100,
            range: "min",
            orientation: "horizontal",
            min: 1,
            slide: function (event, ui){
                jp.jPlayer('volume', ui.value / 100);
            },
            start: function(event, ui){
            },
            stop: function(event, ui){
			// end slide event
			// cookie
				CookieObj.set('player_volume', ui.value / 100, 365);
            }
        });
        
        
        // observers

        $j('#jp_controls').on('click', function(evt){
            var elm = evt.target;
			
			if (!last_track){
				last_track = $j('#releases ul li:first');
			}
			
            if ($j(elm).closest('.jp-control').length > 0 && last_track){
                    if ($j(elm).hasClass('jp-next')) {
                        play_next();
                    } 
                    else if ($j(elm).hasClass('jp-prev')) {
                        play_prev();
                    } 
                    else {
                        if (current_track) {
                            jp.jPlayer("stop");
                        } else {
                            play(last_track);
                        }
                    }
            } else{
                // todo
            }
        });
		
		$j('#jp_volume').on('click', function(evt){
			var elm = evt.target;
			if ($j(elm).closest('.jp-vol').length > 0){
				$j(elm).closest('#jp_volume').toggleClass('muted');
				$j('#jp_volume').hasClass('muted') ? jp.jPlayer({"muted":true}) : jp.jPlayer({"muted":false});
            } else{
				
            }
		});			
		
        
        
        $j('#releases').on('click', function(evt){
            var elm = evt.target;
            
            if ( $j(elm).closest('.play').length > 0 ) {
                click_on_track($j(elm).closest('.play').parent());
            } 
            
			// get posts by label
			if ( $j(elm).closest('.label').length > 0 ) {
				evt.preventDefault();
				// new -
				ultima.media.sections = [];
				
                var tag_slug = $j(elm).closest('.label').attr("title");
				ultima.media.vars['tag_slug'] = tag_slug;
                // new -
				$j('.cats-wrapper input').removeAttr('checked');
				$j('.cats-wrapper li').removeClass('checked');
				
                preloader();
                // new -
				get_releases (null, 1, tag_slug);
				// new -
			}
			
			// get posts by category
            if ( $j(elm).closest('.post-categiries').length > 0 ) {
                evt.preventDefault();
                
                preloader();
                
                var cat_id = $j(elm).attr('id');
                var cat_replace = cat_id.replace('cat_', '');
                var split_arr = cat_replace.split('_');
                var id = split_arr[split_arr.length-1];
                
                // empty sections arr
                ultima.media.sections = [];
                ultima.media.sections.push(id);
                ultima.media.vars['by_cat_id'] = id;
                
                //ultima.media.empty_sections = true;
				
				// new -
				if (ultima.media.vars['tag_slug']) {
					ultima.media.vars['tag_slug'] = null;
				}
				// new -
                get_releases (ultima.media.sections, 1, null);
            }
                
                else {
                // todo
            }
        });
    }       
		
        // functions
		function set_cookieObj(){
			if (!CookieObj.get('player_volume')) {
				 CookieObj.set('player_volume', 0.8, 365);
			} else {
			}
		}
		
		
        function play_next(){
            var next = last_track.next('li.track');

            if (next.length > 0) {
                play(next);
            } else {
				current_track = null;
            }
        }
        
        function play_prev(){
            var prev = last_track.prev('li.track');

            if (prev.length > 0) {
                play(prev);
            } else {
            }
        }
        
        function activate(){
            $j('.playing').removeClass('playing');
            current_track.addClass('playing');
            last_track.removeClass('stop');
            $j("#play_ctrl").addClass('stop');
            

            //var progress = $j(progress_bar).appendTo(current_track);
            
            var progress = $j('.jp');
            
            jp.jPlayer("option", "cssSelectorAncestor" , '.jp');
            //jp.jPlayer("option", "cssSelectorAncestor" , '#main_player');

            //$j('.jp-bg', progress).css('background','url("/wp-content/themes/soundultima/js_player/1348816.png")');
            //$j('.jp-seek-wf', progress).css('background','url("/wp-content/themes/soundultima/js_player/1348816.png")');
            //$j('.jp-bg', progress).html(current_track.attr("title"));
            //$j('.jp-title .title', progress).html(current_track.attr("title"));
            $j('.jp-title .title', progress).html(current_track.find('.play span').html());
            //$j('.jp-play-bar', progress).css('background','url("/wp-content/themes/soundultima/js_player/1348816.png")');
        }
        
        function deactivate(){
            if (current_track) {
                current_track.find('.jp-progress').remove();
                current_track.removeClass('playing');

               $j("#play_ctrl").removeClass('stop');
               
                jp.jPlayer("stop");
                current_track = null;
            }
        }
        
        function ended(){
            
        }
        
        function play(track){
            //var sample = parseInt(track.attr('id'), 10) - parseInt(track.closest('ul').attr('id').replace('id_', ''), 10) + ultima.media.offset;
            var cover = track.closest('.al').find('.cover').attr('src');
            $j('.jp-cover img').attr('src', cover);

            var sample = track.attr('id');
            jp.jPlayer("setMedia", {
                mp3: 'http://geo-samples.beatport.com/lofi/'+ sample +'.LOFI.mp3' 
            });
            
            current_track = track;
            last_track = track;
            
            jp.jPlayer("play"); 
        }
        
        function click_on_track(track){
            if ( current_track && current_track.attr('id') == track.attr('id')) {
                jp.jPlayer("stop");
            } else {
                play(track);
            }
        }
        
        

        
        
    //$j("#jpId").jPlayer("play"); // BAD: The plugin is not ready yet

}
        

