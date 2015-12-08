var ultima = null;

function createMedia(){
    var cat_id = null;
    //var sections = new Array();
    var page = null;
    
    this.media = {
        player: null,
        sections: [],
        vars: {
			tag_slug: null,
            by_cat_id: null,
            timeout_id: null
        },
        offset: 3000000,
        selectors: {
            jp: null,
            jp_progress_bar: null,
            jp_vol: null,
            jp_current_track: null
        },
        functions: {
            click_on_track: function(){
            }
        }
    };
    
    
    
    this.init = function(){
        this.media.player = new jplayer();
        
		// player init
		if (!jp){
			ultima.media.player.init("#jpId");
		}
		
        // init observers
        $j('.cats-wrapper input').on('click', function(evt){
            var elm = evt.target;
            var parent = $j(elm).closest('li');
            parent.toggleClass('checked');
            

            var get_cat_id = $j(this).attr("id");
            
            cat_id = get_cat_id.replace('cat_', '');
            
            if ( ultima.media.sections.indexOf(cat_id) != -1) {
                ultima.media.sections.splice( ultima.media.sections.indexOf(cat_id), 1 );
            } else {
                ultima.media.sections.push(cat_id);
            }
            
            if ( ultima.media.vars.timeout_id ){
                window.clearTimeout(ultima.media.vars.timeout_id);
            }
            
            ultima.media.vars.timeout_id = setTimeout(function(){
                preloader();
				// new -
				if (ultima.media.vars['tag_slug']) {
					ultima.media.vars['tag_slug'] = null;
				}
				// new -
                get_releases(ultima.media.sections, 1, null);
            }, 1500);
        });
        
        
        $j('.pager').on('click', function(evt){
            var elm = evt.target;
			
            if ($j(elm).closest('a').length > 0){
                evt.preventDefault();
                
                if ($j(elm).closest('a').hasClass('active')) {
                } else {
                    $j('.page-nav a').removeClass('active');
                    $j(elm).closest('a').addClass('active')
                }
                
                page = $j(elm).closest('a').attr('title');
				// new -
				if ( ultima.media.vars['tag_slug'] ) {
					ultima.media.sections = [];
				}
                get_releases(ultima.media.sections, page, ultima.media.vars['tag_slug']);
				// new -
            } else {
                // todo
            }
        });
        
        // call 
        //get_releases(null, 1, null);
    };
    
    this.place = function(data){
        // hide preloader
        $j('#preloader').hide();
        $j('#releases').html(data['content']);
        $j('.page-nav').html(data['pages']);
    }
}
    /* init media
    *
    */
    ultima = new createMedia();
    

    
    // ie fix of prop indexOf
    if (!Array.prototype.indexOf) {
        Array.prototype.indexOf = function(obj, start) {
             for (var i = (start || 0), j = this.length; i < j; i++) {
                 if (this[i] === obj) { return i; }
             }
             return -1;
        }
    }
    
    
    
    function load_cover(){
        // load album cover and title for player
        var cover = $j('#releases .al:first').find('.cover').attr('src');
        var title = $j('#releases .al:first').find('.title a').html();
        
        $j('.jp-cover img').attr('src', cover);
        $j('.jp-title .title').html(title);
    }
    
    function preloader(){
        $j('#page_nav').html('');
        $j('#preloader').show();
    }
    
    function get_releases(section_ids, page, label) {
        if (section_ids) {
            categories = section_ids.join(',');
        } 
        else {
            categories = null;
        }
        
        jQuery.ajax({
            type: 'POST',
            url: '/wp-admin/admin-ajax.php',
            method: 'POST',
            data:{
               'action':'do_ajax',
               'fn':'get_posts_by_date_range',
               'sections': categories,
               'page': page,
			   'label': label
               //'date_offset': 10
               },
            dataType: 'JSON',
            success: function(data){
                
                // draw data
                // is it right place for player init?
                $j('.al-list').text('');
                ultima.place(data);
                
                if ( ultima.media.vars['by_cat_id'] ) {
                    var checked_cat =  $j('.cats-wrapper #cat_' + ultima.media.vars['by_cat_id'] );
                    
                    $j('.cats-wrapper input').removeAttr('checked');
                    checked_cat.attr('checked', true);
                    
                    $j('.cats-wrapper li').removeClass('checked');
                    checked_cat.closest('li').addClass('checked');
                    
                    ultima.media.vars['by_cat_id'] = null;
                }
            },
            error: function(errorThrown){
            }
        });
    
    }
    
    
    function load_releases() {
        jQuery.ajax({
            type: 'POST',
            url: '/wp-admin/admin-ajax.php',
            method: 'POST',
            data:{
               'action':'do_ajax',
               'fn':'get_latest_posts',
               'count':10
               },
            dataType: 'JSON',
            success: function(data){
                ultima.draw(data);
            },
            error: function(errorThrown){
            }
        });
    }

        


    
  
    