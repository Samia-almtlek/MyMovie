<footer>
    <div class="container">
        <div class="row">
            <!-- Copyright Section -->
            <div class="col-md-3">
                <p>
                    © {{ date('Y') }} MyMovie. All rights reserved.
                </p>
            </div>

            <!-- Quick Links Section -->
            <div class="col-md-3">
                <h5>Quick Links</h5>
                <ul class="list-unstyled">
                    <a href="{{ route('about') }}" class="text-light">About Us</a>
                    <li><a href="{{ route('contact.index') }}" class="text-light">Contact Us</a></li>
                    <li><a href="{{ route('faq.index') }}" class="text-light">FAQ</a></li>
                </ul>
            </div>

            <!-- Social Media Section -->
            <div class="col-md-3">
                <h5>Follow Us</h5>
                <div class="d-flex">
                    <a href="https://facebook.com" target="_blank" class="me-3 text-light">
                        <i class="fab fa-facebook fa-lg"></i>
                    </a>
                    <a href="https://twitter.com" target="_blank" class="me-3 text-light">
                        <i class="fab fa-twitter fa-lg"></i>
                    </a>
                    <a href="https://instagram.com" target="_blank" class="text-light">
                        <i class="fab fa-instagram fa-lg"></i>
                    </a>
                </div>
            </div>

            <!-- Newsletter Subscription Section -->
            <div class="col-md-3">
                <h5>Subscribe</h5>
                <form method="POST" action="/subscribe">
                    @csrf
                    <div class="input-group mt-3">
                        <input type="email" name="email" class="form-control" placeholder="Enter your email" required>
                        <button class="btn btn-subscribe" type="submit">Subscribe</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</footer>