<footer class="footer">
    <div class="container">
        <div class="col-xs-12  col-md-3">
            <div class="widget-about  push-down-30">
                <img src="{!! asset('assets/images/website/logo.jpg') !!}" alt="Logo" width="176" height="70">
                <br/>

                <span class="footer__text">
                    We focus on highly customizable, fast and optimized themes for variety of popular platform like WordPress and Magento.
                </span>
            </div>
        </div>

        <!--Tags-->
        <div class="col-xs-12  col-md-3">
            @include('front.elements.tags')
        </div>

        <div class="col-xs-12  col-md-3">
            <nav class="widget-navigation  push-down-30">
                <h6>Navigation</h6>
                <hr>
                <ul class="navigation">
                    <li> <a href="index.html">Home</a> </li>
                    <li> <a href="single-post.html">Post Formats</a> </li>
                    <li> <a href="elements.html">Elements</a> </li>
                    <li> <a href="about-us.html">About</a> </li>
                    <li> <a href="contact.html">Contact</a> </li>
                </ul>
            </nav>
        </div>

        <div class="col-xs-12  col-md-3">
            <div class="widget-contact  push-down-30">
                <h6>Contact Us</h6>
                <hr>
                <span class="widget-contact__text">
                    <span class="widget-contact__title">Chicken Electric</span>
                    <br>Email: osbkca@gmail.com
                    <br>Skype: doankhoi
                </span>
            </div>
        </div>
    </div>
</footer>