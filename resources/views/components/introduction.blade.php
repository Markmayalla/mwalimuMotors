@if($page == 'home')
<section class="about section-margin mb-5">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-md-5">
					<div class="about__img text-center text-md-left mb-5 mb-md-0">
						<img class="img-fluid" src="img/about.png" alt="">
						<a href="#/" class="about__img__date text-center">
							<h3>30</h3>
							<p>Years <br> of Creativity</p>
						</a>
					</div>
				</div>
				<div class="col-md-7 pl-xl-5">
					<div class="section-intro">
						<h4 class="section-intro__title">Since 1989</h4>
						<h2 class="section-intro__subtitle">We've been Buiding the Future <br> Restoring the Past</h2>
					</div>
                    <p class="text-justify">Salem Construction Limited is a private owned company established during 1989 in Zanzibar, Tanzania. Having started as a modest building contractor on the island, we have diversified into the contracting industry, branching out to all corners of Tanzania. In 2003 we established our branch in Dar es Salaam, Tanzania.</p>
                    <p class="text-justify">Over the years we have built a strong reputation for delivering a quality service, on time and at a competitive price. We pride ourselves on being skilled and experienced in all aspects of building, civil and electrical projects. The company is registered with Contractor’s Board both on Mainland and Island and with Engineer’s Association.</p>

					<a id="myBtn" class="btn btn--rightBorder mt-4" href="index.php/web/about">About Us</a>
				</div>
			</div>
		</div>
    </section>
@else   
    <section class="about section-margin mb-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-5">
                    <div class="about__img text-center text-md-left mb-5 mb-md-0">
                        <img class="img-fluid" src="img/about.png" alt="">
                        <a href="#/" class="about__img__date text-center">
                            <h3>30</h3>
                            <p>Years <br> of Creativity</p>
                        </a>
                    </div>
                </div>
                <div class="col-md-7 pl-xl-5">
                    <div class="section-intro">
                        <h4 class="section-intro__title">Since 1989</h4>
                        <h2 class="section-intro__subtitle">We've been Buiding the Future <br> Restoring the Past</h2>
                    </div>
                    <span class="text-justify">
                        <p>Salem Construction Limited is a private owned company established during 1989 in Zanzibar, Tanzania. Having started as a modest building contractor on the island, we have diversified into the contracting industry, branching out to all corners of Tanzania. In 2003 we established our branch in Dar es Salaam, Tanzania.</p>
                        <p>Over the years we have built a strong reputation for delivering a quality service, on time and at a competitive price. We pride ourselves on being skilled and experienced in all aspects of building, civil and electrical projects. The company is registered with Contractor’s Board both on Mainland and Island and with Engineer’s Association.</p>
                        <span id="more">
                        <p>Through our extensive task history of constructing ventures our clientele has grown from private individuals to government organizations, diplomatic missions and other corporate clients. We have accomplished various project such as construction of residential buildings, hotels and resorts, schools, banks, hospitals, conservation and renovation of old Stone Town buildings, overhead lines, electrical substations, telecommunication towers and drainage and sewage work. We also provide turn-key project solutions where we undertake design and building projects in the fields of both engineering and architecture.</p>
                        <p>Our mission is to form long-term relationship with our client by providing cost effective service without compromising on quality of the work by using quality construction and engineering solution and employing the best resource and latest techniques. Our commitment to innovation and excellence invariably results in a successfully completed project for both contractor and client. We understand and promote the idea of working as a partnership with our clients to ensure their goals are met and projects are delivered on time. Our unique and flexible project management systems ensure that a positive outcome is achieved regardless of size or nature of the project. Our objective is to provide highest possible standard of quality and service in the construction industry, giving our clients the best satisfaction, our company can offer
                        </p>
                        <p>Our staff comprises of well experienced and qualified personnel, with both administrative and technical competencies, who work closely with clients to provide effective service. They believe that quality of work is recognized through quality management, quality people and quality materials and are proud to bring joy to clients through the quality of work that is provided. This is supported by a progressive management style that encourages the Quality culture throughout the Company. Our COMPANY maintains a rigorous quality control programme that includes continuous awareness, communication and implementation. Our Team combine technical excellence with superior understanding of client need and the environment in which our client operates. We are committed to working partnerships with our clients that add value and consistently exceed expectations. Our aim is to provide the highest possible standard of quality and service in the construction industry, giving Clients the best satisfaction, the company can offer.
                        </p>
                        <p>To ensure a safe workplace for staff and also to protect clients’ investment and facilities, we have put in place a policy on health and safety procedures on site, we are also registered with OSHA. The company fully acknowledges that by complying with stringent Health, Safety and Environment (HSE) procedures, zero accidents can
                            be accomplished. SOME OF OUR PROCEDURES ARE • Use of full range of Personal Protective Equipment (PPE) • Use of Safe Tools & Equipment • Trained & competent staff • Regular on-site safety audits.
                        </p>
                        </span>
                    </span>
                    <button id="myBtn" class="btn btn--rightBorder mt-4" onclick="readmore()">Read More</button>
                </div>
            </div>
        </div>
    </section>
@endif