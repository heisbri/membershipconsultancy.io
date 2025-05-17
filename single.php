<?php require "includes/header.php"; ?>
<?php require "libs/App.php"; ?>
<?php 

    $app = new APP();
    if (isset($_GET['id']) && is_numeric($_GET['id'])){
        $id = $_GET['id'];

        $query = "SELECT * FROM services WHERE id = ?";
        $service = $app->selectOneById($query, $id);

        if($service){

        }else{
            echo "service not found.";
            exit;
        }
    } else{
        echo "Invalid service ID.";
        exit;
    }

    if(isset($_GET['id']) && is_numeric($_GET['id'])){
        $service_id = $_GET['id'];

        $query = "SELECT * FROM services WHERE id = ?";
        $service = $app->selectOneById($query, $service_id);

        if (!$service){
            echo "Service not found.";
            exit;
        }

        $contacts = $app->getContact($service_id);
        $requirements = $app->getRequirements($service_id);
        $fee = $app->getFees($service_id);
        $ads = $app->getAllAds();
        $ads = $app->getAdsByService($service_id);
        $content = $app->getContentByservice($service_id);
    }

    $videoPath = htmlspecialchars($service['video_url']);
    $isYouTube = strpos($videoPath, 'youtube.com') !== false || strpos($videoPath, 'youtube.be') !== false;
    $historyItems = explode("\n", $service['history']);

?>


        <!-- Single Page Start -->
        <div class="single mt-125">
            <div class="container">
                <div class="section-header">
                    <p><?= htmlspecialchars($service['name']) ?></p>
                    <h2><?= htmlspecialchars($service['description']) ?></h2>
                </div>
                <div class="row">
                    <div class="col-12">
                        <img src="img/<?= htmlspecialchars($service['image']) ?>" alt="Image" height="500px">
                        <h2><?= htmlspecialchars($service['overview']) ?></h2>
                        <p><?= htmlspecialchars($service['requirements']) ?></p>
                        <ul class="ul-group">
                            <?php 
                            $modules = explode(',', $service['modules']);
                            foreach ($modules as $module): ?>
                            <li><?= htmlspecialchars(trim($module)) ?></li>
                            <?php endforeach; ?>
                        </ul>
                        <p><?= htmlspecialchars($service['rules']) ?></p>
                        <?php if(!empty($ads)): ?>
                            <div id="adCarousel" class="carousel slide my-4" data-bs-ride="carousel">
                                <div class="carousel_inner">
                                    <?php foreach ($ads as $index => $ad): ?>
                                        <div class="carousel-item <?= $index === 0 ? 'active' : '' ?>">
                                            <a href="<?= htmlspecialchars($ad['link']) ?>" target="_blank">
                                                <img src="img/certs/<?= htmlspecialchars($ad['image']) ?>" class="d-block w-100 rounded" alt="<?= htmlspecialchars($ad['title']) ?>">
                                            </a>
                                            <div class="carousel-caption d-none d-md-block">
                                                <h5><?= htmlspecialchars($ad['title']) ?></h5>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#adCarousel" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon"></span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#adCarousel" data-bs-slide="next">
                                    <span class="carousel-control-next-icon"></span>
                                </button>
                            </div>
                        <?php endif; ?>
                            
                        </p>
                        <ul class="list-group">
                            <?php
                              $historyItems = explode("\n", $service['history']); 
                              foreach ($historyItems as $item) {
                                if(trim($item) !== ''){
                                    echo '<li class="list-group-item">' . htmlspecialchars($item) . '</li>';
                                }
                              } 
                            ?>
                        </ul>
                        <?php if(!empty($content)): ?>
                            <div class="team">
                                <div class="container">
                                    <div class="section-header">
                                        <p>Support Services</p>
                                        <h2>Available Help Channels</h2>
                                    </div>
                                    <div class="row">
                                        <?php foreach ($content as $cont): ?>
                                            <div class="col-lg-3 col-md-6">
                                                <div class="team-item">
                                                    <div class="team-img">
                                                        <img src="img/certs/<?= htmlspecialchars($cont['image']) ?>" alt="Team Image">
                                                    </div>
                                                    <div class="team-text">
                                                        <h2><?= htmlspecialchars($cont['title']) ?></h2>
                                                        <p><?= htmlspecialchars($cont['description']) ?></p>
                                                        <div class="">
                                                            <button type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#contactModal"  >contact</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                        <?php if(!empty($videoPath)): ?>
                            <section class="advert-video bg-light p-4 mb-5  rounded">
                                <h4 class="mb-3"><?= htmlspecialchars($service['vid_title']) ?></h4>
                                <?php if ($isYouTube): ?>
                                    <div class="video-container" style="position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden;">
                                        <iframe src="<?=$videoPath ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen style="position: absolute; top:0; left:0; width:100%;" ></iframe>
                                    </div>
                                <?php else: ?>
                                    <video controls width="100%" autoplay loop muted>
                                        <source src="<?= $videoPath ?>" type="video/mp4">
                                        your browser does not support this ad
                                    </video>
                                <?php endif; ?>
                                
                            </section>
                        <?php endif; ?>
                        <p><?= htmlspecialchars($service['schedule']) ?></p>
                        <?php if (!empty($contacts)): ?>
                            <h3>Contact support table</h3>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Department</th>
                                        <th>Contact Person</th>
                                        <th>Email</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($app->getContact($service_id) as $row): ?>
                                        <tr>
                                            <td><?= htmlspecialchars($row['department']) ?></td>
                                            <td><?= htmlspecialchars($row['contact_person']) ?></td>
                                            <td><?= htmlspecialchars($row['email']) ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        <?php endif; ?>
                        <?php if(!empty($fee)): ?>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Fee Type</th>
                                        <th>Amount</th>
                                        <th>Currency</th>
                                        <th>Payment Method</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($app->getFees($service_id) as $fee): ?>
                                        <tr>
                                            <td><?= htmlspecialchars($fee['fee_type']) ?></td>
                                            <td><?= htmlspecialchars($fee['amount']) ?></td>
                                            <td><?= htmlspecialchars($fee['currency']) ?></td>
                                            <td><?= htmlspecialchars($fee['payment_methods']) ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        <?php endif; ?>
                        <?php if(!empty($requirements)): ?>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Requirement</th>
                                        <th>Description</th>
                                        <th>Require</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($app->getRequirements($service_id) as $req): ?>
                                        <tr>
                                            <td><?= htmlspecialchars($req['requirements']) ?></td>
                                            <td><?= htmlspecialchars($req['description']) ?></td>
                                            <td><?= htmlspecialchars($req['is_required']) ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- Single Page End -->


         <div class="modal fade" id="contactModal" tabindex="-1" aria-labelledby="contactModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="contactModalLabel">Contact Support</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
                    </div>
                    <div class="modal-body">
                        <form name="sendMessage" id="contactForm" action="contact.php" method="POST" novalidate="novalidate">
                        <input type="hidden" id="service_id" />
                            <div class="control-group md-3">
                                <input type="text" class="form-control" id="name"  placeholder="Your Name" required="required" data-validation-required-message="Please enter your name" autocomplete="name"/>
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="control-group md-3">
                                <input type="email" class="form-control" id="email" placeholder="Your Email" required="required" data-validation-required-message="Please enter your email" autocomplete="email"/>
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="control-group md-3">
                                <input type="text" class="form-control" placeholder="Subject" data-service-id="<?= htmlspecialchars($cont['id']) ?>" id="Subject" data-service-name="<?= htmlspecialchars($cont['title']); ?>"  autocomplete="subject" />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="control-group md-3">
                                <textarea class="form-control" id="message" placeholder="Message" required="required" data-validation-required-message="Please enter your message" autocomplete="off"></textarea>
                                <p class="help-block text-danger"></p>
                            </div>
                            <div>
                                <button class="btn btn-primary" type="submit" id="sendMessageButton">Send Message</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
         </div>




<?php require "includes/footer.php"; ?>
