
var lovers = null;
var jp = null;


	
function jplayer(){
	var last_track = null;
	var prev_track = null;
	var current_track = null;

	this.init = function(container){
		 jp = $(container);

		 jp.jPlayer({
            solution:   "html,flash", // Flash with an HTML5 fallback.
            supplied:   "mp3",
            swfPath:    "flash",
            ready: function (event) {
				var $time = $(event.jPlayer.options.cssSelectorAncestor + " .jp-current-time");
            },
            play: function(){
                activate();
            },
            stop: function(){
        	},
            pause: function(){
                deactivate();
            },
            ended: function(obj) {
            },
        	timeupdate: function(){
        		showTimeLeft();
        	},
            volume: 0.8
        });

		    // init slider
	    $( "#jp_volume .volume" ).slider({
            value: 80,
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
            }
        });

	    
    	// init observers 
    	// player

        $('#jp_controls').on('click', function(evt){
            var elm = evt.target;
			
			if (!last_track){
				last_track = $('#releases ul li:first');
			}
			
            if ($(elm).closest('.jp-control').length > 0 && last_track){
                    if ($(elm).hasClass('jp-next')) {
                    	
                        playNext();
                    } 
                    else if ($(elm).hasClass('jp-prev')) {
                    	
                        playPrev();
                    } 
                    else {
                        if (current_track) {
        					
                            jp.jPlayer("pause");
                        } else {
                        	jp.jPlayer("setMedia",{mp3: 'http://geo-samples.beatport.com/lofi/5175225.LOFI.mp3'});
                            jp.jPlayer("play");
                            //playTrack(last_track);
                        }
                    }
            } else{
                // todo
            }
        });


    	// releases 
		$('#carousel').on('click', function(evt){
			var elm = evt.target;

			if ( $(elm).closest('.play').length > 0 ) {
			    clickOnTrack($(elm).closest('.play').parent());
			}
		});



        $('#carousel li').on('mouseenter', function(evt){
            var elm = evt.target;
            if ($(elm).closest('li').length > 0) {
                var $this = $(elm).closest('li');
         
            
                $('#album_meta').stop(true).fadeIn('fast', function(){
                    
                });
            }
            
        });

        $('#carousel li').on('mouseleave', function(evt){
            var elm = evt.target;
            if ($(elm).closest('li').length > 0) {
                var $this = $(elm).closest('li');
                
                    
                    $('#album_meta').stop(true).fadeOut('fast', function(){
                        
                    });
            }
            
        });

		$('#mute').on('click', function(evt){
			var elm = evt.target;
			if ($(elm).closest('.jp-vol').length > 0){
				$(elm).closest('#mute').toggleClass('muted');
				$('#mute').hasClass('muted') ? jp.jPlayer({"muted":true}) : jp.jPlayer({"muted":false});
            } else{
				
            }
		});	



	}
	
	// declare functions

	function activate() {
		$("#play").addClass('pause');

		var progress = $('.jp-audio');
		jp.jPlayer("option", "cssSelectorAncestor" , '.jp-audio');
	}
	function deactivate() {
		$("#play").removeClass('pause');

	 	jp.jPlayer("pause");
        current_track = null;
	}

    function playNext(){
        var next = last_track.next('li.track');

        if (next.length > 0) {
        	var sample = next.attr('id');
        	jp.jPlayer("setMedia", {
	            mp3: 'http://geo-samples.beatport.com/lofi/'+ sample +'.LOFI.mp3' 
	        });
            playTrack(next);
        } else {
			current_track = null;
        }
    }
    
    function playPrev(){
        var prev = last_track.prev('li.track');

        if (prev.length > 0) {
        	var sample = prev.attr('id');
        	jp.jPlayer("setMedia", {
	            mp3: 'http://geo-samples.beatport.com/lofi/'+ sample +'.LOFI.mp3' 
	        });
            playTrack(prev);
        } else {
        }
    }

    function showTimeLeft(){
    	
    	//jp.data("jPlayer").status.currentTime;

    		
		var timeLeft = 	event.jPlayer.status.duration - event.jPlayer.status.currentTime,
						timeDisplay = '-' + $.jPlayer.convertTime(timeLeft),
						$time = $(this).data('$time');
						if($time) {
							$time.text(timeDisplay);
						}

								
    }

    function playTrack(track){
		
        var sample = track.attr('id');

        if (!jp.data("jPlayer").status.currentTime) {
	        jp.jPlayer("setMedia", {
	            mp3: 'http://geo-samples.beatport.com/lofi/'+ sample +'.LOFI.mp3' 
	        });
        }
        
        current_track = track;
        last_track = track;

        // update track duration

        //var duration = $.jPlayer.convertTime(jp.data("jPlayer").status.duration);
        //$('#duration').html(duration);

        jp.jPlayer("play");
    }

    function clickOnTrack (track){
	    if ( current_track && current_track.attr('id') == track.attr('id')) {
	        jp.jPlayer("pause");
	    } else {
	        playTrack(track);
	    }
	}

	//$("#jplayer_inspector").jPlayerInspector({jPlayer:$("#jpId")});
}



function createMedia(){
	this.media = {
		player : null
	}

	 this.init = function(){
	 	this.media.player = new jplayer();
		this.media.player.init("#jpId");
	 }
}


        var ino = $('#navigation');
        var $tElems = $('.inner a');
        var ct = $('.inner a').length;
        var al = {queue:true,duration:800,easing:"easeInOutQuad"};
        var al2 = {queue:true,duration:400,easing:"easeInOutQuad"};
        var bo = $('.body-overlay');
        var $mem = $('.member-box');
        var memlenght = $('.member-box').length;
        var $project = $('.box a');
        var projectlenght = $('.box a').length;    

        // show menu ------------------ 

        function showmenu(){
            $(".nav-button").addClass('nav-rotade');
            ino.animate({"left":'0'}, al);          
            ino.removeClass("isDown");
            bo.fadeIn();        
            setTimeout( function(){     
                for (var i = 0; i <= ct; i++) {
                    var cft = $tElems[i];
                    $(cft).delay(150 * i).animate({'opacity' : '1',left:'0'},al); 
                }
            },100);
        }
        
    // hide menu ------------------

        function hidemenu(){
            $(".nav-button").removeClass('nav-rotade');
            ino.animate({"left":'-296px'},al2);   
            ino.addClass("isDown");
            bo.fadeOut();       
            setTimeout( function(){                 
                for (var i = 0; i <= ct; i++) {
                    var cft = $tElems[i];
                    $(cft).delay(150 * i).animate({'opacity' : '0',left:'-25%'},al);                 
                }       
            },100);
        }

lovers = new createMedia();




    /*Masonry*/

    var mason = function() {
        var box = jQuery('#masonry_list');

        if (box.length) {
            box.masonry({
                isResizeBound:false,
                itemSelector: box.children("li"),
                isFitWidth: true,
                columnWidth: 132,
                gutter: 10,
                isAnimated: false,
                animationOptions: {
                duration: 750,
                    easing: 'linear',
                    queue: false
                }
            });
        }
    };





(function($) {
	$(function() {

        
 


        mason();

        // scroll init

        $('#accordion').click( function(evt){
            var elm = evt.target;
            if ( $(elm).closest('header').length > 0 ) {
                if ( !$(elm).closest('header').hasClass('active') ) {

                    $('#accordion .accord-body').slideUp('slow');
                    $('#accordion .accord-head').removeClass('active');

                    $(elm).closest('header').addClass('active');
                    $(elm).closest('li').find('.accord-body').slideDown('slow', function(){
                        
                    });
                }
            }
        });


	    // init jplayer
        lovers.init();



        
        // register events
        $('#gallery_tabs').click( function(evt) {
            var elm = evt.target;
            if ( $(elm).closest('#gallery_tabs ul li').length > 0 ) {
                var tab = $(elm).closest('#gallery_tabs ul li');
                
                if (tab.hasClass('hidden-tab')){    
                    $('[data-tesla-plugin="'+ tab.attr('id') +'"]').tesla_carousel();
                }
                tab.removeClass('hidden-tab');
            }
        });



        $('#videos_tabs').click( function(evt) {
            var elm = evt.target;
            if ( $(elm).closest('#videos_tabs ul li').length > 0 ) {
                var tab = $(elm).closest('#videos_tabs ul li');
                
                if (tab.hasClass('hidden-tab')){
                    $('[data-tesla-plugin="'+ tab.attr('id') +'"]').tesla_slider();
                }
                tab.removeClass('hidden-tab');
            }
        });



        
        // call menu ------------------
            $('#nav_overlay').click(function(){
                if ($('#navigation').hasClass("isDown") ) {
                    showmenu();
                } else {
                    hidemenu();
                }
            });
            
                
            
/*
        $('#scroll_me').jScrollPane({
            contentWidth: '0px'
        });
*/

	});


        $(window).resize(function(e){
            //$('.extend').css({'height' : 'auto'});
            //$('#scrollable').sbscroller('refresh');
        });

})(jQuery);	