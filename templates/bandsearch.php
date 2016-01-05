<div class="content-main-wrap">
                <div class="content-main opacity">
                    <section class="content-section contact-section">
                        <div class="wrap content-contact">
                            <div class="container-fluid">
                                <header>
                                    <h2 class="entry-header ">Satisfy your craving!</h2>
                                </header><hr /><br />

                                <form action="bandsearch" method="post">
                            <div class="form-group">
                                <input type="text" class="form-control" id="spotify_q" name="spotify_q" 
                                       placeholder="Artist Search">
                            </div>
                            <button type="submit" class="btn btn-success">Search</button>
                        </form>
                        <?php
                            //var_dump($data['albums']);
                            //var_dump($data['albums']['artists']['items']);
                            echo "<br>" . "<div class='row'>";
                            if (!empty($data['albums'])){
                                foreach ($albums as $album):
                                    $name = $album['name'];
                                    $imageURL = $album['images'][1]['url'];
                                    $newURL = str_replace('/', '|', $imageURL);
                                    $id = $album['id'];
                                    //echo $name.'<br>';
                                    echo "<div class='col-md-4'>
                                             <a href='bandresult/$id/$newURL' class='thumbnail'>
                                              <img src='$imageURL' alt='$name'>
                                            </a>
                                            <div class='caption text-center'>
                                              <h4>$name</h4>
                                            </div>
                                          </div>";
                                endforeach;
                            }
                            echo '</div>';
 
                        ?>
                    </div>
                </div>
                    </section>
                </div>
</div>
