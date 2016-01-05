<div class="content-main-wrap">
    <div class="content-main opacity">
        <section class="content-section contact-section">
            <div class="wrap content-contact">
                <div class="container-fluid">
                    <header>
                        <h2 class="entry-header ">Binge Tunes Search</h2>
                    </header><hr /><br />

                    <?php
                    //var_dump($data['artist']);
                    $imageURL = $data['imageURL'];
                    //echo $imageURL;
                    echo "<div class='col-md-4'>";
                    echo  "<img src='$imageURL' alt='album cover'>";
                    echo "</div>";
                    echo "<div class='col-md-8'>";
                        foreach ($data['artist'] as $item):
                            //echo $item['name']. '<br>';
                            $name = $item['name'];
                            $preview_url = $item['preview_url'];
                            echo "<div class='col-md-4 tune'>
                                      <div class='caption text-center'>
                                        <h4>$name</h4>
                                      </div> 
                                      <audio controls style='width:98%'>
                                        <source src='$preview_url' type='audio/mpeg'>
                                        Your browser does not support the audio element.
                                      </audio>                        
                                    </div>";
                        endforeach;

                    echo '</div>';

                    ?>
                </div>
            </div>
        </section>
    </div>
</div>


