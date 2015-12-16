<div class="content-main">
    <section class="content-section about-section about-section-main aside-col extend">
        <div class="container-fluid nopadding extend">
            <div class="row nopadding">
                <span class="col-lg-2 col-md-12 col-sm-12 col-xs-12 extend-col extend-left"></span><div class="page-header">
                    <div class="container">
                        <h3>Satisfy your craving!</h3>
                        <form action="bandsearch.php" method="post">
                            <div class="form-group">
                                <input type="text" class="form-control" id="spotify_q" name="spotify_q" 
                                       placeholder="Artist Search">
                            </div>
                            <button type="submit" class="btn btn-success">Search</button>
                        </form>
                        <?php

                        function getData($url) {
                            //$url = "https://api.spotify.com/v1/search?q=$q&type=artist&market=US";
                            //echo $url;
                            //exit();
                            //get the data from json call to api
                            $curl = curl_init($url);

                            // indicates that we want the response back
                            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
                            // curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
                            //curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
                            //curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
                            // exec curl and get the data back
                            $json_data = curl_exec($curl);

                            // remember to close the curl session once we are finished retrieveing the data
                            curl_close($curl);
                            return $json_data;
                        }

                        if (!empty($_POST['spotify_q'])) {
                            $q = urlencode($_POST['spotify_q']); //spotify needs encoded url
                            //prepare json url 
                            $url = "https://api.spotify.com/v1/search?q=$q&type=artist&market=US";

                            $artistData = json_decode(getData($url), true);
                            //var_dump($artistData['artists']['items']);            
                            if (!empty($artistData['artists']['items'])) {
                            $id = $artistData['artists']['items'][0]['id'];
                            

                            $url = "https://api.spotify.com/v1/artists/$id/albums?market=US";
                            $albumData = json_decode(getData($url), true);
                            //var_dump($albumData['items']);

                            $albums = $albumData['items'];

                            echo "<br>" . "<div class='row'>";
                            foreach ($albums as $album):
                                $name = $album['name'];
                                $imageURL = $album['images'][1]['url'];
                                $id = $album['id'];
                                //echo $name.'<br>';
                                echo "<div class='col-md-4'>
                          <a href='spotifySearch_3.php?id=$id&url=$imageURL' class='thumbnail'>
                            <img src='$imageURL' alt='$name'>
                          </a>
                          <div class='caption text-center'>
                            <h4>$name</h4>
                          </div>
                        </div>";
                            endforeach;
                            echo '</div>';

                            exit();
                            //var_dump($data['tracks']['items']);
                            $tracks = $data['tracks']['items'];
                            //var_dump($tracks);
                            //exit();
                            echo "<div class='row'>";
                            foreach ($data['tracks']['items'] as $track):
                                //var_dump($track['album']);
                                $imageURL = $track['album']['images'][1]['url'];
                                $name = $track['name'];
                                $preview_url = $track['preview_url'];
                                //$imageHeight = $track['album']['images'][1]['height'];
                                //echo "<img src='$imageURL'/>";
                                echo "<div class='col-md-4'>
                          <div class='thumbnail'>
                            <img src='$imageURL' alt='$name'>
                          </div>
                          <div class='caption text-center'>
                            <h4>$name</h4>
                          </div> 
                          <audio controls style='width:98%'>
                            <source src='$preview_url' type='audio/mpeg'>
                            Your browser does not support the audio element.
                          </audio>                        
                        </div>";
                                //<a href='$preview_url'>Preview Track</a>
                            endforeach;
                            echo "</div>";
                            }else{ //sets message for when visitors have a typo in Spotify search
                                echo "<br>" . '<img src="images/unicon404.jpg">';
                            }
                        
                        }
                        ?>
                    </div>
                </div>
