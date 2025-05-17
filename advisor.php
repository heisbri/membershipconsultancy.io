<?php require "includes/header.php"; ?>
<?php require "libs/App.php"; ?>
<?php 

    $app = new App();
    $query = "SELECT * FROM certificates";
    $certificates = $app->selectAll($query);

?>


        <section class="heroo">
            <img src="img/Telegram Desktop/photo_2025-02-25_13-08-38.jpg" alt="heroimg">
        </section>


        <!-- Portfolio Start -->
        <h2>Available Certificates</h2>

        <ul id="portfolio-filters">
            <li data-filter="all" class="filter-active">All</li>
            <li data-filter="health">HEALTH</li>
            <li data-filter="accounting">ACCOUNTING</li>
            <li data-filter="engineering">ENGINEERING</li>
        </ul>

        <div class="portfolio-container col-md-6 col-md-3">
            <?php foreach ($certificates as $certificate): ?>
                <div class="portfolio-item <?php echo strtolower($certificate['category']); ?>">
                    <img src="img/certs/<?php echo $certificate['image']; ?>" alt="<?php echo $certificate['name']; ?>" >
                    <h4><?php echo $certificate['name']; ?></h4>
                    <p><?php echo ucfirst($certificate['category']); ?></p>
                    <p class="description"><?= $certificate['description']; ?></p>
                    <?php if (!empty($certificate['oldprice'])): ?>
                        <p class="old-price">List price: $<?php echo number_format($certificate['oldprice'], 2); ?></p>
                    <?php endif; ?>
                    <p class="price">Our price: $<?php echo number_format($certificate['price'], 2); ?></p>
                    <?php if (!empty($certificate['discount'])): ?>
                        <p class="discount">(<?php echo $certificate['discount']; ?>% OFF)</p>
                    <?php endif; ?>
                    <button onclick="window.loction.href='contact.html'">Contact</button>
                </div>
            <?php endforeach; ?>
        </div>
            
        <!-- Portfolio Start -->
        
        
        <!-- Fact Start -->
        <div class="fact">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-6">
                        <div class="fact-item">
                            <img src="img/icon-4.png" alt="Icon">
                            <h2>Qualified Team</h2>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="fact-item">
                            <img src="img/icon-1.png" alt="Icon">
                            <h2>Individual Approach</h2>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="fact-item">
                            <img src="img/icon-8.png" alt="Icon">
                            <h2>100% Success</h2>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="fact-item">
                            <img src="img/icon-6.png" alt="Icon">
                            <h2>100% Satisfaction</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Fact Start -->
        
        
        <!-- Testimonial Start -->
        <div class="testimonial">
            <div class="container">
                <div class="section-header">
                    <p>Testimonial Carousel</p>
                    <h2>100% Positive Customer Reviews</h2>
                </div>
                <div class="owl-carousel testimonials-carousel">
                    <div class="testimonial-item">
                        <img src="img/testimonial" alt="Image">
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus ut mollis mauris. Vivamus egestas eleifend dui ac consequat
                        </p>
                        <h2>Iyeh</h2>
                        <h3>Profession</h3>
                    </div>
                    <div class="testimonial-item">
                        <img src="img/testimonia" alt="Image">
                        <p>
                            Phasellus pellentesque tempus pretium. Quisque in enim sit amet purus venenatis porttitor sed non velit. Vivamus vehicula finibus
                        </p>
                        <h2>50 cent</h2>
                        <h3>Profession</h3>
                    </div>
                    <div class="testimonial-item">
                        <img src="img/testimonial" alt="Image">
                        <p>
                            Sed in lectus eu eros tincidunt cursus. Aliquam eleifend velit nisl. Sed et posuere urna, ut vestibulum massa. Integer quis magna
                        </p>
                        <h2>Bolo40</h2>
                        <h3>Profession</h3>
                    </div>
                    <div class="testimonial-item">
                        <img src="img/testimonijpg" alt="Image">
                        <p>
                            Sed in lectus eu eros tincidunt cursus. Aliquam eleifend velit nisl. Sed et posuere urna, ut vestibulum massa. Integer quis magna
                        </p>
                        <h2>Budget</h2>
                        <h3>Profession</h3>
                    </div>
                </div>
            </div>
        </div>
        <!-- Testimonial End -->


        <!-- Footer Start -->
<?php require "includes/footer.php"; ?>
