<!-- Start your project here-->
<section class="top-content">
   <div id="video-carousel-example2" class="carousel slide carousel-fade" data-ride="carousel">
      <!--Slides-->
      <div class="carousel-inner" role="listbox">
         <!--Third slide-->
         <div class="carousel-item active">
            <!--Mask color-->
            <div class="view hm-black-light">
               <!--Video source-->
               <video class="video-full" autoplay loop>
                  <source src="<?= base_url('assets/images/Mula_movie.mov'); ?>" type="video/mp4" />
               </video>
               <div class=""></div>
            </div>
            <!--Caption-->
            <div class="carousel-caption">
               <div class="flex-center container  animated fadeInDown">
                  <ul class="">
                     <li>
                        <h1 class="">MULA </h1>
                     </li>
                     <li>
                        <p> The first exchange where project owners can create and trade one of a kind tokens that are instantly liquid without the need for a counterparty   </p>
                     </li>
                     <li>
                        <?php if( ! is_user_loggedin() ): ?>
                        <a href="https://kyc.lendingblock.com/?_ga=2.222649755.1292635505.1523300231-49222197.1519828456" data-toggle="modal" data-target="#modalLRFormDemo" class="btn btn-default" rel="nofollow">Participate in Private Sale                                 </a>
                        <a href="https://kyc.lendingblock.com/?_ga=2.222649755.1292635505.1523300231-49222197.1519828456" data-toggle="modal" data-target="#modalLRFormDemo" class="btn btn-default" rel="nofollow">Participate in Pre-Sale                            </a>
                        <?php else: ?>
                        <a href="<?= base_url('user/wallet') ?>" class="btn btn-default" rel="nofollow">Access Account</a>
                        <?php endif; ?>
                         <br>
                        <a href="<?= base_url('products/exchange') ?>" class="btn btn-default" rel="nofollow">Use Our Product (Alpha)                           </a>
                     </li>
                  </ul>
               </div>
            </div>
            <!--/.Caption-->
         </div>
         <!--/Third slide-->
      </div>
      <!--/.Slides-->
   </div>
</section>
<section class="instant-funding">
   <div class="container">
      <div class="instant-payment">
         <div class="heading h2">
            <h2>WHAT IS MULA? </h2>
           <!--  <span class="divider"><img src="http://localhost/mula/assets/images/divider-angle.png" alt=""></span> -->
         </div>
         <div class="row">
            <div class="col-md-4">
               <div class="mula-coin-img">
                  <img src="<?= base_url('assets/images/mula-coin-tp.png'); ?>">
               </div>
            </div>
            <div class="col-md-8">
               <div class="intro-details">
                  <br>
                  <p>Mula is the first exchange for non-fungible tokens that allow project owners to create and trade tokens with built in liquidity </p>
                  <p>
                     With Mula there is no risk of funds being stolen or hacked as trades are made directly through the token smart contract 
                  </p>
                  <p>At last a solution that removes counterparty and liquidity risk for investors and project owners</p>
               </div>
            </div>
         </div>
         <hr>
         <div class="row">

            <h2 class="muls-xplainer-title">Watch Mula Explainer Video
                
            </h2>

 
            


            <div class="col align-self-center video-mula">

               <video class="video-fluid z-depth-1"  poster="<?= base_url('assets/images/poster1.jpg'); ?>" controls>
                  <source src="<?= base_url('assets/images/Mula-HD.mp4'); ?>" type="video/mp4" />
               </video>
            </div>
         </div>
      </div>
   </div>
</section>
<section class="our-technology" id="token-builder">
   <div class="container">
      <div class="heading h2">
         <h2>OUR TECHNOLOGY</h2>
         <span class="divider"><img src="<?= base_url('assets/images/divider-angle.png'); ?>" alt=""></span>
      </div>
      <div class="row">
         <div class="col-md-6">
            <div class="mula-wallet-content">
               <div class="single-mula-content">
                  <h3>Token Builder </h3>
                  <p>Mula allows business assets and projects to function like crypto currency tokens with continuous liquidity. The token builder allows a business to create tokens using the value of their project as collateral. </p>
               </div>
               <div class="single-mula-content">
                  <h3>Mula Exchange  </h3>
                  <p>Businesses can buy and sell tokens and convert token value to USD, GBP and EUR on the Mula exchange at a fraction of the costs of centralized exchanges. The Mula exchange is a trading platform for business project tokens without the need for third party validation </p>
               </div>
            </div>
         </div>
         <div class="col-md-6">
            <div class="mulla-wallet-image">
               <img src="<?= base_url('assets/images/computer-screens.png'); ?>" class="img-fluid">
            </div>
         </div>
      </div>
   </div>
</section>
<section class="what-problem-mula">
   <div class="container">
      <div class="mula-blocks">
         <div class="heading h2">
            <h2>Features</h2>
            <span class="divider"><img src="<?= base_url('assets/images/divider-angle.png'); ?>" alt=""></span>
         </div>
         <div class="row">
            <div class="col-md-6 col-sm-6">
               <div class="toke-one-img">
                  <img src="<?= base_url('assets/images/token-2.png'); ?>">
               </div>
            </div>
            <div class="col-md-6 col-sm-6">
               <div class="single-feature">
                  <h4>A Safe and Secure way of Investing </h4>
                  <p>Mula is a liquidity platform that allows anyone to buy and sell non-fungible tokens in the network, with no counter party, at an automatically calculated price without the risk of pricing fluctuations </p>
               </div>
               <div class="single-feature">
                  <h4>Re-Fungible Tokens </h4>
                  <p>The Mula link token owns the address of every Project token in the network. This allows one of a kind project tokens to become tradeable on exchanges such as Binance while still maintaining collectable properties. </p>
               </div>
            </div>
         </div>
      </div>
   </div>
   </div>
</section>
<section class="release-asset-value">
   <div class="container">
      <div class="heading h2">
         <h2>MULA TOKEN BENEFITS </h2>
         <span class="divider"><img src="<?= base_url('assets/images/divider-angle.png'); ?>" alt=""></span>
      </div>
      <div class="asset-full-content">
         <div class="row">
            <div class="col-md-7 col-sm-7">
               <div class="assets-value frst-value">
                  <p class="">
                     The Mula token (MUT) is a link token that holds a strong complimentary relationship to every project token in the network. 
                  </p>
                  <p class="">
                     Mula is a revolutionary new technical token standard that allows unique tokens to become tradeable with other unique tokens and to be tradeable on secondary exchanges. The result is continuous liquidity for token holders and project owners. 
                  </p>
               </div>
            </div>
            <div class="col-md-5 col-sm-5">
               <div class="trade-image">
                  <img src="<?= base_url('assets/images/Mula-Conversion1.png'); ?>" width="100%">
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<section class="how-it-work">
   <div class="container">
      <div class="heading h2">
         <h2>USE CASES</h2>
         <span class="divider"><img src="<?= base_url('assets/images/divider-angle.png'); ?>" alt=""></span>
      </div>
      <div class="how-works-container">
         <div class="row">
            <div class="col-md-4 col-sm-4">
               <div class="block-work">
                  <div class="work-icon">
                     <img src="<?= base_url('assets/images/mula-white.png'); ?>">
                  </div>
                  <div class="about-work">
                     <h3 class="work-title">PROJECT OWNERS</h3>
                     <p>Project owners can create tokens against assets and fund a project with instant liquidity. This also helps to create project traction and the ability to build communities around projects. 
                     </p>
                  </div>
               </div>
            </div>
            <div class="col-md-4 col-sm-4">
               <div class="block-work">
                  <div class="work-icon">
                     <img src="<?= base_url('assets/images/assets.jpg'); ?>">
                  </div>
                  <div class="about-work">
                     <h3 class="work-title">COMMUNITIES</h3>
                     <p>Anyone can support a project they are passionate about without counterparty risk. Project smart contracts allow individuals to sell their tokens at any time without the need for a third party. 
                     </p>
                  </div>
               </div>
            </div>
            <div class="col-md-4 col-sm-4">
               <div class="block-work">
                  <div class="work-icon">
                     <img src="<?= base_url('assets/images/tokens.jpg'); ?>">
                  </div>
                  <div class="about-work">
                     <h3 class="work-title">INVESTORS </h3>
                     <p> Asset backed project tokens have additional layers of security. Investors can also support projects and buy tokens without the concern of future token liquidity. 
                     </p>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<section class="mula-coin-value">
   <div class="container">
   <div class="wrap-mula-value">
      <div class="row">
         <div class="col-md-4 col-sm-4">
            <div class="wrap-graph">
               <img src="<?= base_url('assets/images/vector.png'); ?>">
            </div>
         </div>
         <div class="col-md-8 col-sm-8">
            <div class="expected-increase">
               <h2>A REVOLUTIONARY NEW TOKEN
               </h2>
               <p>Mula is a revolutionary new token standard that gives unique project tokens the ability to trade on secondary exchanges through smart contracts </p>
               <p>Mula will totally transform the way businesses fund projects in the future.</p>
               <?php if( ! is_user_loggedin() ): ?>
               <a href="#" data-toggle="modal" data-target="#modalLRFormDemo" class="btn btn-theme create-wallet">Create Your Wallet</a>
               <?php else: ?>
               <a href="<?= base_url('user/wallet'); ?>" data-toggle="modal" data-target="#modalLRFormDemo" class="btn btn-theme create-wallet">Access Wallet</a>
               <?php endif; ?>
            </div>
         </div>
      </div>
   </div>
</section>
<section class="what-we accept">
   <div class="container">
      <div class="heading h2">
         <h2>
            MULA EXCHANGE
         </h2>
         <span class="divider"><img src="<?= base_url('assets/images/divider-angle.png'); ?>" alt=""></span>
      </div>
      <div class="crypto-funding-xchng">
         <div class="container">
            <p>The first exchange for buying and selling unique project tokens  </p>

            <div class="row">
               <div class="token-holder col-md-6">
               <div class="token-card card">
                  <h4>NO TRANSACTION FEES </h4>
                  <p>No platform transaction fees to buy and sell tokens 
                  </p>
                  <hr>
                  <h4>Instant liquidity   </h4>
                  <p>Tokens are instantly tradeable through a link token on      secondary exchanges regardless of buyers and sellers          

                  </p>


                   
               </div>
               
            </div>
            <div class="token-holder col-md-6">
               <div class="token-card card">
                  
                  <h4>NO RISK </h4>
                  <p>Buy and sell tokens through their smart 
contracts without upfront deposits

                  <hr>
                  <h4>$ 100 million daily</h4>
                  <p>Forecasted non-fungible token trading volume 
per day by 2022 on the exchange 

                  </p>
               </div>
               
            </div>
            </div>
            <?php if( ! is_user_loggedin() ): ?>
            <a href="#" data-toggle="modal" data-target="#modalLRFormDemo" class="btn btn-theme create-wallet">Create Mula Token Wallet</a>
            <?php else: ?>
            <a href="<?= base_url('user/wallet'); ?>" data-toggle="modal" data-target="#modalLRFormDemo" class="btn btn-theme create-wallet">Create Mula Token Wallet</a>
            <?php endif; ?>
         </div>
      </div>
      <!--/.Slides-->
   </div>
</section>
<section class="token-sale">
   <div class="container">
      <div class="heading h2">
         <h2>Token Sale</h2>
         <span class="divider"><img src="<?= base_url('assets/images/divider-angle.png'); ?>" alt=""></span>
      </div>
      <div class="white-paper-content">
         <div class="">
            <h3>Whitepaper</h3>
            <p>Our detailed white paper and lite paper will give you great insight into Mula’s plans, team and mission</p>
            <a href="#" class="btn btn-theme">Whitepaper</a>
            <a href="#" class="btn btn-theme">Lightpaper</a>
         </div>
      </div>
      <div class="row">
            <div class="token-holder col-md-6">
               <div class="token-card card">
                  <h4>Instant token liquidity for token holders</h4>
                  <p>20% of all proceeds from our ICO will be used to initiate a bonding curve token contract which will allow Mula 
                     token holders to immediately sell tokens back to the token smart contract if they wish 
                  </p>
                  <hr>
                  <h4>Exclusive access to token projects </h4>
                  <p>Mula token holders will get exclusive first access to project tokens on the exchange 
                  </p>
               </div>
               
            </div>
            <div class="token-holder col-md-6">
                   <div class="token-card card">
                        <h4>Quarterly payouts for token holders </h4>
                        <p>Mula ICO token holders will receive quarterly bonus payouts of 5% of all commissions earned from the platform.
                           Bonus payments will be paid proportionally according to ICO contributions 
                        </p>
                        <hr>
                        <h4>Token demand </h4>
                        <p>Mula is the main link token that is used on our platform to buy project tokens. With every project joining the
                           platform the demand for Mula tokens will increase proportionally and so token holder value  
                        </p>
                   </div>
              </div>
         </div>
   </div>
   <div class="token-sale-wrapper">
      <div class="container">
         <div class="row">
            <div class="col-md-6">
               <div class="token-sale-MUT ">
                  <h3>Token Sale (MUT)   </h3>
                  <p>Pre-Sale:  Commencing 31 July 2018 </p>
                  <p>Main Sale:  Commencing 30 August 2018</p>
                  <div class="pre-main-sale-btn">
                     <a href="#" class="btn  btn-theme">Register for Pre- Sale </a>
                     <a href="#" class="btn  btn-theme">Register for Main Sale </a>
                  </div>
               </div>
            </div>
            <div class="col-md-6">
               <div class="mula-coin-img">
                  <img src="<?= base_url('assets/images/mula-coin.png'); ?>" 
                     class="img-fluid">
               </div>
            </div>
         </div>
         
      </div>
   </div>
   <div class="sale-information">
      <div class="container">
         <div class="">
            <h3>Sale Information</h3>
            <!--Table-->
            <table class="table table-bordered table-responsive-md sale-table">
               <!--Table head-->
               <thead>
                  <tr>
                     <th></th>
                     <th>PRE-SALE</th>
                     <th>MAIN SALE</th>
                  </tr>
               </thead>
               <!--Table head-->
               <!--Table body-->
               <tbody>
                  <tr>
                     <th><label>Sale Starts</label></th>
                     <td>14:00 GMT, May 15th</td>
                     <td>14:00 GMT, May 29th</td>
                  </tr>
                  <tr>
                     <th><label>Sale Ends</label></th>
                     <td>14:00 GMT, May 28th</td>
                     <td>14:00 GMT, June 28th</td>
                  </tr>
                  <tr>
                     <th><label>Tokens Allocated (Inc Bonus)</label></th>
                     <td>214,285,700 (60%)</td>
                     <td>25,000,000 (10%)</td>
                  </tr>
                  <tr>
                     <th><label>Bonus</label></th>
                     <td>20% bonus tokens</td>
                     <td>No bonus</td>
                  </tr>
                  <tr>
                     <th><label>Lock Up for Bonus Tokens</label></th>
                     <td>30 days</td>
                     <td>—</td>
                  </tr>
                  <tr>
                     <th><label>Target / Cap</label></th>
                     <td>$6m</td>
                     <td>$1m</td>
                  </tr>
                  <tr>
                     <th><label>Effective Price / LND</label></th>
                     <td>$0.028 (30% discount)</td>
                     <td>$0.04</td>
                  </tr>
               </tbody>
               <!--Table body-->
            </table>
            <!--Table-->
         </div>
      </div>
   </div>
   <div class="token-distributer">
      <div class="container">
         <div class="token-dis">
            <h3>Token Distributer </h3>
            <div class="row">
               <div class="col-md-6">
                  <div class="token-dis-color">
                     <ul>
                        <li><span style="background-color: #4a678a"></span>ICO</li>
                        <li><span style="background-color: #3a5f8d"></span>Network Growth</li>
                        <li><span style="background-color:#416a9c"></span>Sales and Marketing</li>
                        <br>
                        <li><span style="background-color: #4774ab"></span>Platform Development</li>
                        <li><span style="background-color: #7891b7"></span>Team</li>
                        <li><span style="background-color: #9aa8c2"></span>Founders</li>
                        <br>
                        <li><span style="background-color:#b2bbcc"></span>Exchange Management</li>
                     </ul>
                  </div>
                  <img src="<?= base_url('assets/images/distributer.png'); ?>">
               </div>
               <div class="col-md-6">
                  <div class="token-distributer-details">
                     <ul>
                        <li><i class="fa fa-angle-right"></i> ICO 25%</li>
                        <li><i class="fa fa-angle-right"></i> NETWORK GROWTH    10%</li>
                        <li> <i class="fa fa-angle-right"></i> SALES AND MARKETING   15%</li>
                        <li> <i class="fa fa-angle-right"></i> PLATFORM DEVELOPMENT   20%</li>
                        <li> <i class="fa fa-angle-right"></i> EXCHANGE MANAGEMENT   10%</li>
                        <li> <i class="fa fa-angle-right"></i> TEAM    5%</li>
                        <li> <i class="fa fa-angle-right"></i> FOUNDERS    15%</li>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<section class="our-team wow fadeInUp"  data-wow-offset="10" data-wow-duration="3s" id="our-team">
   <div class="container">
      <div class="heading h2">
         <h2>Our Team</h2>
         <span class="divider"><img src="<?= base_url('assets/images/divider-angle.png'); ?>" alt=""></span>
      </div>
      <div class="our-team-wrapper">
         <div class="row">
            <div class="col-md-3 col-sm-3">
               <div class="team-member">
                  <div class="team-member-image">
                     <div class="ImageWrapper chrome-fix">
                        <img src="<?= base_url('assets/images/chris.jpg'); ?>" align="">
                        <div class="ImageOverlayC"></div>
                        <div class=" Buttons StyleH">
                           <ul>
                              <li class="WhiteRounded"><a href="#"><img src="<?= base_url('assets/images/facebook.png'); ?>"></a></li>
                              <li class="WhiteRounded"><a href="#"><img src="<?= base_url('assets/images/twitter.png'); ?>"></a></li>
                              <li class="WhiteRounded"><a href="#"><img src="<?= base_url('assets/images/linkdin.png'); ?>"></a></li>
                              <li class="WhiteRounded"><a href="#"><img src="<?= base_url('assets/images/you-tube.png'); ?>"></a></li>
                           </ul>
                        </div>
                     </div>
                     <div class="about-member">
                        <h3>Christo Bosch</h3>
                        <h6>CEO and Founder </h6>
                        <p>Founded Icon Media Organization, a financial services and mining publication that  worked with clients such as Saudi Aramco, Mota Engil and Turkish Airlines. Christo also previously founded CMB Capital partners, a successful property investment firm based out of London. Also worked in the foreign currency derivatives markets for Western Union International. 
                        </p>
                        <span class="hvr-underline-from-center"></span>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-md-3 col-sm-3">
               <div class="team-member">
                  <div class="team-member-image">
                     <div class="ImageWrapper chrome-fix">
                        <img src="<?= base_url('assets/images/Joshua-tedam.jpg'); ?>" align="">
                        <div class="ImageOverlayC"></div>
                        <div class=" Buttons StyleH">
                           <ul>
                              <li class="WhiteRounded"><a href="#"><img src="<?= base_url('assets/images/facebook.png'); ?>"></a></li>
                              <li class="WhiteRounded"><a href="#"><img src="<?= base_url('assets/images/twitter.png'); ?>"></a></li>
                              <li class="WhiteRounded"><a href="#"><img src="<?= base_url('assets/images/linkdin.png'); ?>"></a></li>
                              <li class="WhiteRounded"><a href="#"><img src="<?= base_url('assets/images/you-tube.png'); ?>"></a></li>
                           </ul>
                        </div>
                     </div>
                     <div class="about-member">
                        <h3>Joshua Tedam</h3>
                        <h6>CTO </h6>
                        <p>Over 20 years highly experienced, highly skilled and qualified Enterprise Architect. Joshua has previously worked as lead strategic Enterprise Architect for the National Health Services. Joshua holds a MSC in Health Informatics from the University of London as well as a MBA and Executive MBA from the University of Warwick. 
                        </p>
                        <span class="hvr-underline-from-center"></span>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-md-3 col-sm-3">
               <div class="team-member">
                  <div class="team-member-image">
                     <div class="ImageWrapper chrome-fix">
                        <img src="<?= base_url('assets/images/stefan.jpg'); ?>" align="">
                        <div class="ImageOverlayC"></div>
                        <div class=" Buttons StyleH">
                           <ul>
                              <li class="WhiteRounded"><a href="#"><img src="<?= base_url('assets/images/facebook.png'); ?>"></a></li>
                              <li class="WhiteRounded"><a href="#"><img src="<?= base_url('assets/images/twitter.png'); ?>"></a></li>
                              <li class="WhiteRounded"><a href="#"><img src="<?= base_url('assets/images/linkdin.png'); ?>"></a></li>
                              <li class="WhiteRounded"><a href="#"><img src="<?= base_url('assets/images/you-tube.png'); ?>"></a></li>
                           </ul>
                        </div>
                     </div>
                     <div class="about-member">
                        <h3>Stefan Ionescu</h3>
                        <h6>Lead Ethereum Developer </h6>
                        <p>Stefan has previously worked as Lead Ethereum developer for Sapien, building Facebook on Ethereum. He has also worked as a blockchain developer on projects such as Zyp pages and Planport.
                        </p>
                        <span class="hvr-underline-from-center"></span>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-md-3 col-sm-3">
               <div class="team-member">
                  <div class="team-member-image">
                     <div class="ImageWrapper chrome-fix">
                        <img src="<?= base_url('assets/images/Nick_Brown.png'); ?>" align="">
                        <div class="ImageOverlayC"></div>
                        <div class=" Buttons StyleH">
                           <ul>
                              <li class="WhiteRounded"><a href="#"><img src="<?= base_url('assets/images/facebook.png'); ?>"></a></li>
                              <li class="WhiteRounded"><a href="#"><img src="<?= base_url('assets/images/twitter.png'); ?>"></a></li>
                              <li class="WhiteRounded"><a href="#"><img src="<?= base_url('assets/images/linkdin.png'); ?>"></a></li>
                              <li class="WhiteRounded"><a href="#"><img src="<?= base_url('assets/images/you-tube.png'); ?>"></a></li>
                           </ul>
                        </div>
                     </div>
                     <div class="about-member">
                        <h3>Nick Brown  </h3>
                        <h6>Blockchain Developer  </h6>
                        <p>Nick has previously worked as CTO for German blockchain start up, Motion Werk, one of the first commercial blockchain implementations. Nick has also worked as Lead Blockchain developer for 2PVentures and as Technology Lead for Oliver Wyman Labs. Nick holds an MA/BA Law from Cambridge University. 
                        </p>
                        <span class="hvr-underline-from-center"></span>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-md-3 col-sm-3">
               <div class="team-member">
                  <div class="team-member-image">
                     <div class="ImageWrapper chrome-fix">
                        <img src="<?= base_url('assets/images/hukum-khede.jpeg'); ?>" align="">
                        <div class="ImageOverlayC"></div>
                        <div class=" Buttons StyleH">
                           <ul>
                              <li class="WhiteRounded"><a href="#"><img src="<?= base_url('assets/images/facebook.png'); ?>"></a></li>
                              <li class="WhiteRounded"><a href="#"><img src="<?= base_url('assets/images/twitter.png'); ?>"></a></li>
                              <li class="WhiteRounded"><a href="#"><img src="<?= base_url('assets/images/linkdin.png'); ?>"></a></li>
                              <li class="WhiteRounded"><a href="#"><img src="<?= base_url('assets/images/you-tube.png'); ?>"></a></li>
                           </ul>
                        </div>
                     </div>
                     <div class="about-member">
                        <h3>Hukum Khede</h3>
                        <h6>Senior UI/UX designer   </h6>
                        <p>Hukum has worked as senior web developer and graphic designer for companies such as Infograins, Devoir Technosoft , SRC Technolab and Digital Magnify 
                        </p>
                        <span class="hvr-underline-from-center"></span>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-md-3 col-sm-3">
               <div class="team-member">
                  <div class="team-member-image">
                     <div class="ImageWrapper chrome-fix">
                        <img src="<?= base_url('assets/images/Ajit Tripathi.jpg'); ?>" align="">
                        <div class="ImageOverlayC"></div>
                        <div class=" Buttons StyleH">
                           <ul>
                              <li class="WhiteRounded"><a href="#"><img src="<?= base_url('assets/images/facebook.png'); ?>"></a></li>
                              <li class="WhiteRounded"><a href="#"><img src="<?= base_url('assets/images/twitter.png'); ?>"></a></li>
                              <li class="WhiteRounded"><a href="#"><img src="<?= base_url('assets/images/linkdin.png'); ?>"></a></li>
                              <li class="WhiteRounded"><a href="#"><img src="<?= base_url('assets/images/you-tube.png'); ?>"></a></li>
                           </ul>
                        </div>
                     </div>
                     <div class="about-member">
                        <h3>Advisors </h3>
                        <h6>Ajit Tripathi  </h6>
                        <p>Ajit is a qualified CFA and currently as partner at Consensys Solutions. He has also worked for PWC as Director of Fintech and Digital Banking. Ajit has also previously worked for Barclays as Director of Credit Risk and Market Risk Technology. 
                        </p>
                        <span class="hvr-underline-from-center"></span>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-md-3 col-sm-3">
               <div class="team-member">
                  <div class="team-member-image">
                     <div class="ImageWrapper chrome-fix">
                        <img src="<?= base_url('assets/images/Zeeshan Malik.jpg'); ?>" align="">
                        <div class="ImageOverlayC"></div>
                        <div class=" Buttons StyleH">
                           <ul>
                              <li class="WhiteRounded"><a href="#"><img src="<?= base_url('assets/images/facebook.png'); ?>"></a></li>
                              <li class="WhiteRounded"><a href="#"><img src="<?= base_url('assets/images/twitter.png'); ?>"></a></li>
                              <li class="WhiteRounded"><a href="#"><img src="<?= base_url('assets/images/linkdin.png'); ?>"></a></li>
                              <li class="WhiteRounded"><a href="#"><img src="<?= base_url('assets/images/you-tube.png'); ?>"></a></li>
                           </ul>
                        </div>
                     </div>
                     <div class="about-member">
                        <h3>ZeeshanMallick </h3>
                        <h6>Glance Technologies    </h6>
                        <p>Zeeshan currently works as Chief Digital Officer for Glance Technologies and also previously worked as Chief Marketing Officer for Zeus Systems. Zeeshan has also worked on various ICO’s in an advisory capacity.  
                        </p>
                        <span class="hvr-underline-from-center"></span>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-md-3 col-sm-3">
               <div class="team-member">
                  <div class="team-member-image">
                     <div class="ImageWrapper chrome-fix">
                        <img src="<?= base_url('assets/images/Jason Grant.jpg'); ?>" align="">
                        <div class="ImageOverlayC"></div>
                        <div class=" Buttons StyleH">
                           <ul>
                              <li class="WhiteRounded"><a href="#"><img src="<?= base_url('assets/images/facebook.png'); ?>"></a></li>
                              <li class="WhiteRounded"><a href="#"><img src="<?= base_url('assets/images/twitter.png'); ?>"></a></li>
                              <li class="WhiteRounded"><a href="#"><img src="<?= base_url('assets/images/linkdin.png'); ?>"></a></li>
                              <li class="WhiteRounded"><a href="#"><img src="<?= base_url('assets/images/you-tube.png'); ?>"></a></li>
                           </ul>
                        </div>
                     </div>
                     <div class="about-member">
                        <h3>                Jason Grant  </h3>
                        <h6>Integral    </h6>
                        <p>Jason is currently the CEO of Integral, a company working with technology start-ups. Jason has also worked as Head of User experience for Super Union and is a regular speaker at blockchain events. 
                        </p>
                        <span class="hvr-underline-from-center"></span>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>