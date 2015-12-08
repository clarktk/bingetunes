var ultima = null;

function createMedia(){
    var cat_id = null;
    var sections = new Array();
    var page = 1;
    
    this.media = {
        player: null,
        categories:null,
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
        
        // init observers
        //
        // get by categories
        //

        
        
        //
        // get by release category
        //


        
        // call 
        get_releases(null, page);
    };
    

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
    
    
    // functions
    
    function preloader() {
        $('#page_nav').html('');
        $('#preloader').show();
    }
    
    function get_releases(section_ids, page) {
    

    
    }



    
  
    