var jp = null;
function jplayer(){
    var v = null;
    var c = null;
    var l = null;
    
    this.init = function(c){
        
        if (jp){
        } 
            
        jp = $(c);
         
        v =  $('.volume');
        jp.jPlayer({
            solution:   "html,flash",
            supplied:   "mp3",
            swfPath:    "/wp-content/themes/soundultima/js_player",
            play: function(){
                a();
            },
            stop: function(){
                d();
            },
            pause: function(){
                d();
            },
            ended: function(obj) {
                var p = $('.playing');
                p.removeClass('playing').addClass('played');
                
                p_n();
            },
            volume: 0.8
        });
        
        v.slider({
            value: 80,
            range: "min",
            orientation: "horizontal",
            min: 1,
            slide: function (event, ui){
                jp.jPlayer('volume', ui.value / 100);
            },
            start: function(){
            },
            stop: function(){
            }
        });
        
        
        $('#jp_controls').on('click', function(v){
            var e = v.target;
            
            if ($(e).closest('.jp-control').length > 0 && l){
                
                    if ($(e).hasClass('jp-next')) {
                        p_n();
                    } 
                    else {
                        p_p();
                    } 
                    
            } else{
            }
                
            
        });
        
        
        $('.playlist').on('click', function(v){
            var e = v.target;
            if ( $(e).closest('.play').hasClass('play') ){
                n($(e).closest('.play').parent()); 
            } else {
            }
        });
    }        
        
        
        
        
        function p_n(){
            var p = l.next('li.track');

            if (p.length > 0) {
                t(p);
            } else {
            }
        }
        
        function p_p(){
            var prev = l.prev('li.track');

            if (prev.length > 0) {
                t(prev);
            } else {
            }
        }
        
        function a(){
            c.addClass('playing');
            $("#jp_play").addClass('active');

            
            var p = $('.jp');
            
            jp.jPlayer("option", "cssSelectorAncestor" , '.jp');
            $('.jp-title .title', p).html(c.attr("title"));
        }
        
        function d(){
            if (c) {
                c.find('.jp-progress').remove();
                c.removeClass('playing');
                $("#jp_play").removeClass('active');
               
                jp.jPlayer("stop");
                c = null;
            }
        }
        
        function ended(){
        }
        
        function t(t){
            var s = t.attr('id');
            jp.jPlayer("setMedia", {
                mp3: 'http://geo-samples.beatport.com/lofi/'+ s +'.LOFI.mp3' 
            });
            jp.jPlayer("play"); 
            
            c = t;
            l = t;
            
        }
        
        function n(s){
            
            if ( c && c.attr('id') == s.attr('id')) {
                jp.jPlayer("stop");
            } else {
                t(s);
            }
        }
        
        

        
        

}
        

