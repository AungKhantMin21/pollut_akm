<?php 
    include("layout/header.php");
    include("layout/slider.php");
    $news = "SELECT * FROM news as n, user as u WHERE category = 0 AND n.id=u.id ORDER BY news_id DESC LIMIT 1;";
    $newsdata = mysqli_query($conn,$news);
    $result_ours = mysqli_fetch_array($newsdata);
    $globalnews = "SELECT * FROM news as n, user as u WHERE category = 1 AND n.id=u.id ORDER BY news_id DESC LIMIT 1;";
    $globalnewsdata = mysqli_query($conn,$globalnews);
    $result_global = mysqli_fetch_array($globalnewsdata);
    $localnews = "SELECT * FROM news as n, user as u WHERE category = 2 AND n.id=u.id ORDER BY news_id DESC LIMIT 1;";
    $localnewsdata = mysqli_query($conn,$localnews);
    $result_local = mysqli_fetch_array($localnewsdata);
    function custom_echo($x, $length)
    {
        if(strlen($x)<=$length)
        {
            echo $x;
        }
        else
        {
            $y=substr($x,0,$length) . ' . . .';
            echo $y;
        }
    }
?>
    <section>
        <div class="container-fluid">
            <div class="row py-5">
                <div class="col-md-9 text-center mx-auto">
                    <h2>Welcome</h2>
                    <p>Pollut is a organization founded by a group of entrepreneurs from United States. Pollut offers the latest news about air pollution and air quality of United States</p>
                </div>
            </div>
            
            <div class="row py-5" style="background-color: #f5f5f5;">
                <div class="col-md-12 text-center">
                    <h4>
                        What is Air Pollution?
                    </h4>
                    <div class="row">
                        <div class="col-md-8">
                            <br><br>
                            <p class="text-justify ">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pollution is now a commonplace term that our ears are attuned to. We hear about the various forms of pollution every day and read about it through the mass media. Air pollution is one such form that refers to the contamination of the air, irrespective of indoors or outside. <br><br>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;A physical, biological or chemical alteration to the air in the atmosphere can be termed as pollution. It occurs when any harmful gases, dust, smoke enters into the atmosphere and makes it difficult for plants, animals, and humans to survive as the air becomes dirty. 
                                </p>
                        </div>
                        <div class="col-md-4">
                            <img src="images/mask.jpg" alt="" class="w-100">  
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row py-5" style="background-image: url(https://mipa.unram.ac.id/wp-content/uploads/2019/09/Savin-NY-Website-Background-Web.jpg); background-size: cover; background-attachment: fixed;">
                <div class="col-md-12 text-center">
                    <h4>What causes Air Pollution</h4>
                    <div class="row mt-4">
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-header p-0">
                                    <div class="hover p-0">
                                        <img src="https://images.unsplash.com/photo-1524316258794-08104ccf1e0f?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=634&q=80" class="w-100 shwekyee" style="height:330px;">
                                        <div class="sktext w-100 text-left">
                                            <h3 class="font-weight-normal text-uppercase ml-3">Industries</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <p>
                                        Industries are a major contributor to air pollution. Industrial processes discharge pollutants such as nitrous oxide and hydrofluorocarbons into the air. The overall effect is amplification in the global warming probability.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-header p-0">
                                    <div class="hover p-0">
                                        <img src="https://images.unsplash.com/photo-1515816949419-7caf0a210607?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=634&q=80" class="w-100 shwekyee" style="height:330px;">
                                        <div class="sktext w-100 text-left">
                                            <h3 class="font-weight-normal text-uppercase ml-3">Vehicles</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <p>
                                        Cars, heavy duty trucks, shipping vessels, trains, and airplanes all burn lots of fossil fuels to work. Emissions from automobile engines hold both primary and secondary pollutants. This is a major cause of pollution.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-header p-0">
                                    <div class="hover p-0">
                                        <img src="https://images.unsplash.com/photo-1596628930480-540b65f6f0a6?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=634&q=80" class="w-100 shwekyee" style="height:330px;">
                                        <div class="sktext w-100 text-left">
                                            <h3 class="font-weight-normal text-uppercase ml-3">Deforestation</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <p>
                                        When forests are burned and destroyed on purpose and to tremendous extents, this storage area for carbon dioxide is removed, thus increasing the amount of atmospheric carbon dioxide.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-header p-0">
                                    <div class="hover p-0">
                                        <img src="https://miro.medium.com/max/1050/1*3TeAR6a9OEX2BnE2ySkIPQ.jpeg" class="w-100 shwekyee" style="height:330px;">
                                        <div class="sktext w-100 text-left">
                                            <h3 class="font-weight-normal text-uppercase ml-3">Smoking</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <p>
                                        Tobacco smoke contains up to 40 carcinogens, making it an especially fatal form of air pollution. If you have smokers in the family air purifiers will ensure that the other members don’t suffers from second hand smoke.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row py-5" style="background-color: #f5f5f5;">
                <div class="col-md-12 text-center">
                    <h4>Air Quality In US</h4>
                    <div class="row mt-4">
                        <div class="col-md-6">
                            <p class="text-justify">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b>Air pollution</b> is getting worse, and data show more people are dying. Recent press reports note that air quality has improved worldwide and in the United States during the ongoing pandemic1. Shortly prior to the pandemic, though, stories lamented declining American air quality2. What’s really going on?  Is the news good or bad?<br> <br>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Certainly, the pandemic and the resulting orders to Americans to stay at home and to pause nonessential business activities have decreased activities such as driving and manufacturing that generate air pollution. Even before those events, however, significant progress had been made in reducing air pollution in the United States. The American Lung Association recognizes in its 2020 report on the State of the Air that there have been “dramatic improvements” in air quality over the past fifty years.</p>
                        </div>
                        <div class="col-md-6">
                            <img src="images/usair.PNG" alt="" class="w-100 mt-2">
                            <small>Source : <a href="https://gispub.epa.gov/airnow/"> AirNow Interactive Map</a></small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row pt-5 px-3">
                <h3>Recent News</h3>
            </div>
            <div class="row pb-5">
                <div class="col-md-4 mt-3">
                    <a href="news/news.php?id=<?php echo $result_ours['news_id'];?>" class="text-decoration-none">
                    <div class="slider hvr-float" style="background-image: url(images/gettyimages-575346013-612x612.jpg); height:330px;">
                        <div class="h-100 px-3 text-white" style="padding-top:200px; background:rgba(0, 0, 0, 0.109);">
                            <span class="px-4 rounded-pill py-1" style="background-color:rgba(0, 0, 0, 0.623);font-size: 13px;"><?php echo $result_ours['tags'];?></span>
                            <h4 class="mt-2"><?php custom_echo($result_ours['title'],45);?></h4>
                            <span><?php echo $result_ours['date'];?></span>
                        </div>
                    </div>
                    </a>
                </div>
                <div class="col-md-4 mt-3">
                    <a href="news/news.php?id=<?php echo $result_global['news_id'];?>" class="text-decoration-none">
                    <div class="slider hvr-float" style="background-image: url(images/<?php echo $result_global['photo'];?>); height:330px;">
                        <div class="h-100 px-3 text-white" style="padding-top:200px; background:rgba(0, 0, 0, 0.109);">
                            <span class="px-4 rounded-pill py-1" style="background-color:rgba(0, 0, 0, 0.623);font-size: 13px;"><?php echo $result_global['tags'];?></span>
                            <h4 class="mt-2"><?php custom_echo($result_global['title'],45);?></h4>
                            <span><?php echo $result_global['date'];?></span>
                        </div>
                    </div>
                    </a>
                </div>
                <div class="col-md-4 mt-3">
                    <a href="news/news.php?id=<?php echo $result_local['news_id'];?>" class="text-decoration-none">
                    <div class="slider hvr-float" style="background-image: url(images/<?php echo $result_local['photo'];?>); height:330px;">
                        <div class="h-100 px-3 text-white" style="padding-top:200px; background:rgba(0, 0, 0, 0.109);">
                            <span class="px-4 rounded-pill py-1" style="background-color:rgba(0, 0, 0, 0.623);font-size: 13px;"><?php echo $result_local['tags'];?></span>
                            <h4 class="mt-2"><?php custom_echo($result_local['title'],45);?></h4>
                            <span><?php echo $result_local['date'];?></span>
                        </div>
                    </div>
                    </a>
                </div>
            </div>
        </div>
    </section>




<?php 
    include("layout/footer.php");
?>