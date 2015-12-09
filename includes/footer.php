
<div class="footer footer-wrap opacity">
    <?php
    if(!empty($_SESSION['user_id'])){
    ?>
            <section class="player">
                
                <div class="row">
                    <div class="col-lg-3 col-md-1 col-sm-1">

                        <div class="jp-album">
                            <div class="row ">
                                <div class="col-lg-2 col-md-4 col-sm-1">
                                    <div class="jp-cover">
                                        <img src="images/covers/player.jpg" alt="cover"  />
                                    </div>
                                </div>
                                <div class="col-lg-10 col-md-8 col-sm-11">
                                    <div class="jp-title">
                                        <span class="now-playing">Now playing:</span>
                                        <span class="title">BXT - Moments (Original Mix)</span>
                                    </div>
                                    <div class="rating">
                                        <span class="star star-rate star-s">
                                            <span style="width:78%"></span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="player-tracklist opacity" id="player_tracklist" style="display:none">
                                <div class="playlist" id="releases" style="">
                                    <table class="table release">
                                        <colgroup>
                                            <col class="no">
                                            <col>
                                            <col>
                                            <col>
                                            <col>
                                        </colgroup>
                                        
                                        <thead>
                                            <tr>
                                                <th colspan="2">Name</th>
                                                <th>Genre</th>
                                                <th>Time</th>
                                                <th>Price</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr id="5191362" class="track play">
                                                <td><div>01</div></td>
                                                <td>Phrakture - Sanctuary Gone (Instrumental Mix)</td>
                                                <td>Breaks</td>
                                                <td>8:59 / 130 BPM</td>
                                                <td>$2.49</td>
                                            </tr>
                                            <tr  id="5191363" class="track play">
                                                <td><div>02</div></td>
                                                <td>Gux Jimenez  - Aerosfera (Original Mix)</td>
                                                <td>Breaks</td>
                                                <td>8:59 / 130 BPM</td>
                                                <td>$2.49</td>
                                            </tr>
                                            <tr  id="5191364" class="track play">
                                                <td><div>03</div></td>
                                                <td>DJ U-Cef - Solar (Original Mix)</td>
                                                <td>Breaks</td>
                                                <td>8:59 / 130 BPM</td>
                                                <td>$2.49</td>
                                            </tr>
                                            <tr  id="5191365" class="track play">
                                                <td><div>04</div></td>
                                                <td>Edgar Mountain - 56%% of Happiness (Original Mix)</td>
                                                <td>Breaks</td>
                                                <td>8:59 / 130 BPM</td>
                                                <td>$2.49</td>
                                            </tr>
                                            <tr  id="5191366" class="track play">
                                                <td><div>05</div></td>
                                                <td>Stendahl  - La Croisette</td>
                                                <td>Breaks</td>
                                                <td>8:59 / 130 BPM</td>
                                                <td>$2.49</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>          
                                    

                                    

                        </div>


                    </div>
                    <div class="col-lg-9 col-md-11 col-sm-11 nopadding">
                            <div id="jpId"></div>

                            <div class="jp-audio">
                                <div class="jp-controls-wrap">
                                    <div class="jp-controls" id="jp_controls">
                                        <div id="jp_prev" class="jp-prev jp-control"></div>
                                        <div class="play jp-control" id="play"></div>
                                        <div id="jp_next" class="jp-next jp-control"></div>
                                    </div>
                                </div>
                                
                                    
                                    <div class="jp-bar">
                                        <div class="jp-progress">
                                            <div class="jp-bg"></div>
                                            <div class="jp-seek-bar">
                                                <div class="jp-play-bar"></div>
                                                <div class="jp-seek-wf"></div>
                                            </div>
                                        </div>
                                        <div class="jp-time duration" id="duration">00:00</div>
                                        <div class="jp-time jp-current-time" id="current_time">00:00</div>
                                    </div>
                                    <div id="jp_volume" class="vol-wrapper jp-volume">
                                        <div class="volume"></div>
                                        <div class="jp-vol" id="mute"></div>
                                    </div>
                                    <div class="playlist" id="playlist"></div>
                                    
                                    
                                
                                    
                            </div>
                    </div>
                </div>
            </section>
    <?php } ?>
        </div>

        <!-- ======================================================================
                                        START SCRIPTS
        ======================================================================= -->
        

        
        <script src="js/jquery-1.10.0.min.js" type="text/javascript"></script>
        <script src="js/bootstrap.js" type="text/javascript"></script>

        <script type="text/javascript" src="js/imagesloaded.pkgd.min.js"></script>

        <script src="js/jquery-ui.js" type="text/javascript"></script>
        <script src="js/jquery.jplayer.min.js" type="text/javascript"></script>

        <script type="text/javascript" src="js/plugins.js"></script>
        <script src="js/common.js" type="text/javascript"></script>
        
        <script src="js/jquery.swipebox.min.js" type="text/javascript"></script>
        <script src="js/jquery.mousewheel.js" type="text/javascript"></script>




        <!-- ======================================================================
                                        END SCRIPTS
        ======================================================================= -->  
    </body>
</html>