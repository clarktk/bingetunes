<div class="content-main main-videos">
                                <section class="content-section videos-section extend">
                                    <div class="wrap content-videos extend">

                                        <header>
                                            <h2 class="entry-header opacity">Band Test</h2>
                                        </header>



                                        <!-- Nav tabs -->
<!--                                            <div class="tabs-wrap videos-tabs opacity" id="videos_tabs">
                                                        <ul class="nav nav-tabs bootstrap-tabs">
                                                            <li class="active"><a href="#category1" data-toggle="tab">Concert Videos</a></li>
                                                            <li class="hidden-tab"  id="slider-hidden2"><a href="#category2" data-toggle="tab">Clips</a></li>
                                                            <li class="hidden-tab"  id="slider-hidden3"><a href="#category3" data-toggle="tab">Other Videos</a></li>
                                                        </ul>
                                            </div>-->

                                        <!-- Tab panes -->
                                           
                                                <div class="container">
    <h1>Search for an Artist</h1>
    <p>Type an artist name and click on "Search". Then, click on any album from the results to play 30 seconds of its first track.</p>
    <form id="search-form">
        <input type="text" id="query" value="" class="form-control" placeholder="Type an Artist Name"/>
        <input type="submit" id="search" class="btn btn-primary" value="Search" />
    </form>
    <div id="results"></div>
</div>
<script id="results-template" type="text/x-handlebars-template">
    {{#each albums.items}}
    <div style="background-image:url({{images.0.url}})" data-album-id="{{id}}" class="cover"></div>
    {{/each}}
</script>

                                    
                                                <div class="tab-pane fade" id="category2">
                                                            <div class="the-slider" data-tesla-container=".slide-wrapper" data-tesla-prev=".slide-left" data-tesla-autoplay="false" data-tesla-next=".slide-right" data-tesla-item=".slide" data-tesla-plugin="slider-hidden2">
                                                                <div class="slider-wrap">
                                                        
                                                                <div class="slide-arrows">
                                                                    <div class="slide-left"></div>
                                                                    <div class="slide-right"></div>
                                                                </div>
                                                                    
                                                                <ul class="slide-wrapper">
                                                                    <li class="slide">
                                                                        <div class="row">
                                                                            <div class="col-lg-7">
                                                                                <div class="video-clip">
                                                                                    <img src="images/videos/video1.jpg" alt="video spot" />
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-5">
                                                                                <div class="video-clip-desc">
                                                                                    <header>
                                                                                        <h3 class="entry-header">
                                                                                            The Shippint Yard Clip
                                                                                        </h3>
                                                                                    </header><hr />

                                                                                    <div class="rating">
                                                                                        <span class="star star-rate star-s">
                                                                                            <span style="width:78%"></span>
                                                                                        </span>
                                                                                    </div>

                                                                                    <div class="clip-meta">
                                                                                        <div class="row">
                                                                                            <div class="col-lg-3 col-md-2 col-sm-4 col-xs-6">Duration</div>
                                                                                            <div class="col-lg-9 col-md-10 col-sm-8 col-xs-6">00:07:12</div>
                                                                                        </div>
                                                                                        <div class="row">
                                                                                            <div class="col-lg-3 col-md-2 col-sm-4 col-xs-6">Directed by:</div>
                                                                                            <div class="col-lg-9 col-md-10 col-sm-8 col-xs-6">Alex Webber</div>
                                                                                        </div>
                                                                                        <div class="row">
                                                                                            <div class="col-lg-3 col-md-2 col-sm-4 col-xs-6">Melody by:</div>
                                                                                            <div class="col-lg-9 col-md-10 col-sm-8 col-xs-6">Andres Fernandes</div>
                                                                                        </div>
                                                                                        <div class="row">
                                                                                            <div class="col-lg-3 col-md-2 col-sm-4 col-xs-6">Lyrics by:</div>
                                                                                            <div class="col-lg-9 col-md-10 col-sm-8 col-xs-6">Morgan Tompson</div>
                                                                                        </div>
                                                                                         
                                                                                    </div>
                                                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident,</p>

                                                                                    <div class="share">
                                                                                        <span class="share-on">Share on:</span>

                                                                                        <ul class="share-list">
                                                                                            <li class="twitter">
                                                                                                <img src="images/sprites/twitter.png" alt="twitter" />
                                                                                            </li>
                                                                                            
                                                                                            <li class="facebook">
                                                                                                <img src="images/sprites/facebook.png" alt="facebook" />
                                                                                            </li>
                                                                                            <li class="gplus">
                                                                                                <img src="images/sprites/gplus.png" alt="gplus" />
                                                                                            </li>
                                                                                        </ul>
                                                                                    </div>

                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                    <li class="slide">
                                                                        <div class="row">
                                                                            <div class="col-lg-7">
                                                                                <div class="video-clip">
                                                                                   <img src="images/videos/video2.jpg" alt="video spot" />
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-5">
                                                                                <div class="video-clip-desc">
                                                                                    <header>
                                                                                        <h3 class="entry-header">
                                                                                            The Shippint Yard Clip
                                                                                        </h3>
                                                                                    </header><hr />

                                                                                    <div class="rating">
                                                                                        <span class="star star-rate star-s">
                                                                                            <span style="width:78%"></span>
                                                                                        </span>
                                                                                    </div>

                                                                                    <div class="clip-meta">
                                                                                        <div class="row">
                                                                                            <div class="col-lg-3 col-md-2 col-sm-4 col-xs-6">Duration</div>
                                                                                            <div class="col-lg-9 col-md-10 col-sm-8 col-xs-6">00:07:12</div>
                                                                                        </div>
                                                                                        <div class="row">
                                                                                            <div class="col-lg-3 col-md-2 col-sm-4 col-xs-6">Directed by:</div>
                                                                                            <div class="col-lg-9 col-md-10 col-sm-8 col-xs-6">Alex Webber</div>
                                                                                        </div>
                                                                                        <div class="row">
                                                                                            <div class="col-lg-3 col-md-2 col-sm-4 col-xs-6">Melody by:</div>
                                                                                            <div class="col-lg-9 col-md-10 col-sm-8 col-xs-6">Andres Fernandes</div>
                                                                                        </div>
                                                                                        <div class="row">
                                                                                            <div class="col-lg-3 col-md-2 col-sm-4 col-xs-6">Lyrics by:</div>
                                                                                            <div class="col-lg-9 col-md-10 col-sm-8 col-xs-6">Morgan Tompson</div>
                                                                                        </div>
                                                                                         
                                                                                    </div>
                                                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident,</p>

                                                                                    <div class="share">
                                                                                        <span class="share-on">Share on:</span>

                                                                                        <ul class="share-list">
                                                                                            <li class="twitter">
                                                                                                <img src="images/sprites/twitter.png" alt="twitter" />
                                                                                            </li>
                                                                                            
                                                                                            <li class="facebook">
                                                                                                <img src="images/sprites/facebook.png" alt="facebook" />
                                                                                            </li>
                                                                                            <li class="gplus">
                                                                                                <img src="images/sprites/gplus.png" alt="gplus" />
                                                                                            </li>
                                                                                        </ul>
                                                                                    </div>

                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                    <li class="slide">
                                                                        <div class="row">
                                                                            <div class="col-lg-7">
                                                                                <div class="video-clip">
                                                                                   <img src="images/videos/video3.jpg" alt="video spot" />
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-5">
                                                                                <div class="video-clip-desc">
                                                                                    <header>
                                                                                        <h3 class="entry-header">
                                                                                            The Shippint Yard Clip
                                                                                        </h3>
                                                                                    </header><hr />

                                                                                    <div class="rating">
                                                                                        <span class="star star-rate star-s">
                                                                                            <span style="width:78%"></span>
                                                                                        </span>
                                                                                    </div>

                                                                                    <div class="clip-meta">
                                                                                        <div class="row">
                                                                                            <div class="col-lg-3 col-md-2 col-sm-4 col-xs-6">Duration</div>
                                                                                            <div class="col-lg-9 col-md-10 col-sm-8 col-xs-6">00:07:12</div>
                                                                                        </div>
                                                                                        <div class="row">
                                                                                            <div class="col-lg-3 col-md-2 col-sm-4 col-xs-6">Directed by:</div>
                                                                                            <div class="col-lg-9 col-md-10 col-sm-8 col-xs-6">Alex Webber</div>
                                                                                        </div>
                                                                                        <div class="row">
                                                                                            <div class="col-lg-3 col-md-2 col-sm-4 col-xs-6">Melody by:</div>
                                                                                            <div class="col-lg-9 col-md-10 col-sm-8 col-xs-6">Andres Fernandes</div>
                                                                                        </div>
                                                                                        <div class="row">
                                                                                            <div class="col-lg-3 col-md-2 col-sm-4 col-xs-6">Lyrics by:</div>
                                                                                            <div class="col-lg-9 col-md-10 col-sm-8 col-xs-6">Morgan Tompson</div>
                                                                                        </div>
                                                                                         
                                                                                    </div>
                                                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident,</p>

                                                                                    <div class="share">
                                                                                        <span class="share-on">Share on:</span>

                                                                                        <ul class="share-list">
                                                                                            <li class="twitter">
                                                                                                <img src="images/sprites/twitter.png" alt="twitter" />
                                                                                            </li>
                                                                                            
                                                                                            <li class="facebook">
                                                                                                <img src="images/sprites/facebook.png" alt="facebook" />
                                                                                            </li>
                                                                                            <li class="gplus">
                                                                                                <img src="images/sprites/gplus.png" alt="gplus" />
                                                                                            </li>
                                                                                        </ul>
                                                                                    </div>

                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                </ul>
                                                                <hr />
                                                                <div class="the-slider-bullets">
                                                                    
                                                                        <ul class="the-bullets" data-tesla-plugin="bullets">
                                                                            <li><img src="images/thumbs/thumb5.jpg" alt="thumb" /></li>
                                                                            <li><img src="images/thumbs/thumb2.jpg" alt="thumb" /></li>
                                                                            <li><img src="images/thumbs/thumb6.jpg" alt="thumb" /></li>
                                                                        </ul>
                                                                </div>
                                                                </div>
                                                            </div>
                                                </div>
                                                <div class="tab-pane fade" id="category3">

                                                            <div class="the-slider" data-tesla-container=".slide-wrapper" data-tesla-prev=".slide-left" data-tesla-next=".slide-right" data-tesla-item=".slide" data-tesla-plugin="slider-hidden3">
                                                                <div class="slider-wrap">
                                                        
                                                                <div class="slide-arrows">
                                                                    <div class="slide-left"></div>
                                                                    <div class="slide-right"></div>
                                                                </div>
                                                                    
                                                                <ul class="slide-wrapper">
                                                                    <li class="slide">
                                                                        <div class="row">
                                                                            <div class="col-lg-7">
                                                                                <div class="video-clip">
                                                                                    <img src="images/videos/video1.jpg" alt="video spot" />
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-5">
                                                                                <div class="video-clip-desc">
                                                                                    <header>
                                                                                        <h3 class="entry-header">
                                                                                            The Shippint Yard Clip
                                                                                        </h3>
                                                                                    </header><hr />

                                                                                    <div class="rating">
                                                                                        <span class="star star-rate star-s">
                                                                                            <span style="width:78%"></span>
                                                                                        </span>
                                                                                    </div>

                                                                                    <div class="clip-meta">
                                                                                        <div class="row">
                                                                                            <div class="col-lg-3 col-md-2 col-sm-4 col-xs-6">Duration</div>
                                                                                            <div class="col-lg-9 col-md-10 col-sm-8 col-xs-6">00:07:12</div>
                                                                                        </div>
                                                                                        <div class="row">
                                                                                            <div class="col-lg-3 col-md-2 col-sm-4 col-xs-6">Directed by:</div>
                                                                                            <div class="col-lg-9 col-md-10 col-sm-8 col-xs-6">Alex Webber</div>
                                                                                        </div>
                                                                                        <div class="row">
                                                                                            <div class="col-lg-3 col-md-2 col-sm-4 col-xs-6">Melody by:</div>
                                                                                            <div class="col-lg-9 col-md-10 col-sm-8 col-xs-6">Andres Fernandes</div>
                                                                                        </div>
                                                                                        <div class="row">
                                                                                            <div class="col-lg-3 col-md-2 col-sm-4 col-xs-6">Lyrics by:</div>
                                                                                            <div class="col-lg-9 col-md-10 col-sm-8 col-xs-6">Morgan Tompson</div>
                                                                                        </div>
                                                                                         
                                                                                    </div>
                                                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident,</p>

                                                                                    <div class="share">
                                                                                        <span class="share-on">Share on:</span>

                                                                                        <ul class="share-list">
                                                                                            <li class="twitter">
                                                                                                <img src="images/sprites/twitter.png" alt="twitter" />
                                                                                            </li>
                                                                                            
                                                                                            <li class="facebook">
                                                                                                <img src="images/sprites/facebook.png" alt="facebook" />
                                                                                            </li>
                                                                                            <li class="gplus">
                                                                                                <img src="images/sprites/gplus.png" alt="gplus" />
                                                                                            </li>
                                                                                        </ul>
                                                                                    </div>

                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                    <li class="slide">
                                                                        <div class="row">
                                                                            <div class="col-lg-7">
                                                                                <div class="video-clip">
                                                                                   <img src="images/videos/video2.jpg" alt="video spot" />
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-5">
                                                                                <div class="video-clip-desc">
                                                                                    <header>
                                                                                        <h3 class="entry-header">
                                                                                            The Shippint Yard Clip
                                                                                        </h3>
                                                                                    </header><hr />

                                                                                    <div class="rating">
                                                                                        <span class="star star-rate star-s">
                                                                                            <span style="width:78%"></span>
                                                                                        </span>
                                                                                    </div>

                                                                                    <div class="clip-meta">
                                                                                        <div class="row">
                                                                                            <div class="col-lg-3 col-md-2 col-sm-4 col-xs-6">Duration</div>
                                                                                            <div class="col-lg-9 col-md-10 col-sm-8 col-xs-6">00:07:12</div>
                                                                                        </div>
                                                                                        <div class="row">
                                                                                            <div class="col-lg-3 col-md-2 col-sm-4 col-xs-6">Directed by:</div>
                                                                                            <div class="col-lg-9 col-md-10 col-sm-8 col-xs-6">Alex Webber</div>
                                                                                        </div>
                                                                                        <div class="row">
                                                                                            <div class="col-lg-3 col-md-2 col-sm-4 col-xs-6">Melody by:</div>
                                                                                            <div class="col-lg-9 col-md-10 col-sm-8 col-xs-6">Andres Fernandes</div>
                                                                                        </div>
                                                                                        <div class="row">
                                                                                            <div class="col-lg-3 col-md-2 col-sm-4 col-xs-6">Lyrics by:</div>
                                                                                            <div class="col-lg-9 col-md-10 col-sm-8 col-xs-6">Morgan Tompson</div>
                                                                                        </div>
                                                                                         
                                                                                    </div>
                                                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident,</p>

                                                                                    <div class="share">
                                                                                        <span class="share-on">Share on:</span>

                                                                                        <ul class="share-list">
                                                                                            <li class="twitter">
                                                                                                <img src="images/sprites/twitter.png" alt="twitter" />
                                                                                            </li>
                                                                                            
                                                                                            <li class="facebook">
                                                                                                <img src="images/sprites/facebook.png" alt="facebook" />
                                                                                            </li>
                                                                                            <li class="gplus">
                                                                                                <img src="images/sprites/gplus.png" alt="gplus" />
                                                                                            </li>
                                                                                        </ul>
                                                                                    </div>

                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                    <li class="slide">
                                                                        <div class="row">
                                                                            <div class="col-lg-7">
                                                                                <div class="video-clip">
                                                                                   <img src="images/videos/video3.jpg" alt="video spot" />
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-5">
                                                                                <div class="video-clip-desc">
                                                                                    <header>
                                                                                        <h3 class="entry-header">
                                                                                            The Shippint Yard Clip
                                                                                        </h3>
                                                                                    </header><hr />

                                                                                    <div class="rating">
                                                                                        <span class="star star-rate star-s">
                                                                                            <span style="width:78%"></span>
                                                                                        </span>
                                                                                    </div>

                                                                                    <div class="clip-meta">
                                                                                        <div class="row">
                                                                                            <div class="col-lg-3 col-md-2 col-sm-4 col-xs-6">Duration</div>
                                                                                            <div class="col-lg-9 col-md-10 col-sm-8 col-xs-6">00:07:12</div>
                                                                                        </div>
                                                                                        <div class="row">
                                                                                            <div class="col-lg-3 col-md-2 col-sm-4 col-xs-6">Directed by:</div>
                                                                                            <div class="col-lg-9 col-md-10 col-sm-8 col-xs-6">Alex Webber</div>
                                                                                        </div>
                                                                                        <div class="row">
                                                                                            <div class="col-lg-3 col-md-2 col-sm-4 col-xs-6">Melody by:</div>
                                                                                            <div class="col-lg-9 col-md-10 col-sm-8 col-xs-6">Andres Fernandes</div>
                                                                                        </div>
                                                                                        <div class="row">
                                                                                            <div class="col-lg-3 col-md-2 col-sm-4 col-xs-6">Lyrics by:</div>
                                                                                            <div class="col-lg-9 col-md-10 col-sm-8 col-xs-6">Morgan Tompson</div>
                                                                                        </div>
                                                                                         
                                                                                    </div>
                                                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident,</p>

                                                                                    <div class="share">
                                                                                        <span class="share-on">Share on:</span>

                                                                                        <ul class="share-list">
                                                                                            <li class="twitter">
                                                                                                <img src="images/sprites/twitter.png" alt="twitter" />
                                                                                            </li>
                                                                                            
                                                                                            <li class="facebook">
                                                                                                <img src="images/sprites/facebook.png" alt="facebook" />
                                                                                            </li>
                                                                                            <li class="gplus">
                                                                                                <img src="images/sprites/gplus.png" alt="gplus" />
                                                                                            </li>
                                                                                        </ul>
                                                                                    </div>

                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                </ul>
                                                                <hr />
                                                                <div class="the-slider-bullets">
                                                                    
                                                                        <ul class="the-bullets" data-tesla-plugin="bullets">
                                                                            <li><img src="images/thumbs/thumb4.jpg" alt="thumb" /></li>
                                                                            <li><img src="images/thumbs/thumb2.jpg" alt="thumb" /></li>
                                                                            <li><img src="images/thumbs/thumb3.jpg" alt="thumb" /></li>
                                                                        </ul>
                                                                </div>
                                                                </div>
                                                            </div>
                                                </div>
                                            </div>
                                    </div>
                                </section>
                            </div>