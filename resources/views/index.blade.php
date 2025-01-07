<x-app-layout>
    <!-- Hero Section -->
    <div class="bg-image">
        <h1>Welcome to your hub for movie news, reviews, and ratings.</h1>
        <p>Join a community that loves cinema as much as you do! <br> My Movie .. Start the new movie world</p>
        <a href="/">Start Reading</a>
    </div>

    <div class="container-fluid my-0 content-section content-container">
        <div class="row align-items-center g-0">
            <!-- Image Section -->
            <div class="col-md-6">
                <img src="/images/who2.jpg" alt="About My Movie" class="img-fluid">
            </div>
            <!-- Text Section -->
            <div class="col-md-6 p-5">
                <h2 class="mb-3">About My Movie</h2>
                <!-- Short Content -->
                <p class="short-content">
                    Welcome to <strong>My Movie</strong>, a platform that combines passion for movies with personal
                    reviews
                    in a unique and distinctive way.
                </p>
                <!-- Full Content (hidden by default) -->
                <div class="full-content" style="display: none;">
                    <p>
                        Our goal is to provide a comprehensive experience for cinema lovers by showcasing movies in a
                        way
                        that combines reliable information and personal insights.
                    </p>
                    <ul>
                        <li>
                            <strong>Original movie name and poster:</strong> We present the movie’s name and its
                            original
                            poster inspired by the official design, offering a visual representation of the film as it
                            is.
                        </li>
                        <li>
                            <strong>The movie’s story:</strong> A precise summary of the film’s original story as
                            presented
                            by its creators, helping you understand the plot and context.
                        </li>
                        <li>
                            <strong>Personal opinion and evaluation:</strong> We share our personal perspective on the
                            movie, including analysis of acting performance, plot, direction, and artistic aspects,
                            along
                            with a numeric rating that reflects our experience.
                        </li>
                    </ul>
                    <p>
                        <strong>Our Mission:</strong> Our mission is to deliver content that reflects our passion for
                        the
                        world of cinema, providing a unique experience that combines accurate information with personal
                        perspective. Whether you're looking for movie details or personal reviews to help you decide
                        what to
                        watch, <strong>My Movie</strong> is the perfect place.
                    </p>
                </div>
                <a href="javascript:void(0);" class="btn btn-standard">Read More</a>
            </div>
        </div>
    </div>


    <!-- Recent Posts Section -->
    <div class="recent-posts py-5">
        <div class="container my-5">
            <div class="row align-items-center g-0 content-container">
                <!-- Text Section -->
                <div class="col-md-6 p-5">
                    <h2 class="section-title mb-4">Recent Posts</h2>
                    <div class="mb-3">
                        <a href="#" class="post-tag me-1">movie</a>
                        <a href="#" class="post-tag me-1">2024</a>
                    </div>
                    <h3 class="post-title mb-3">The Platform 2</h3>
                    <!-- Short Content -->
                    <p class="short-content">
                        A thrilling physical journey that allows an approach to the darkness, where it is scary to look.
                    </p>
                    <!-- Full Content (hidden by default) -->
                    <div class="full-content" style="display: none;">
                        <p>
                            It appeals to the viewer's civil responsibility and forces them to face the limits of their
                            own
                            solidarity. The story delivers a powerful message about society and humanity as a whole.
                        </p>
                        <div class="personal-review mt-4">
                            <h3 class="post-title mb-3">My Personal Review</h3>
                            <p class="review-text">
                                "The Platform 2" is an engaging and thought-provoking movie that challenges societal
                                norms.
                                The performances are compelling, and the story unfolds in a way that keeps the
                                viewer on
                                edge. I would rate it 8.5/10 for its unique concept and execution.
                            </p>
                        </div>
                    </div>
                    <a href="javascript:void(0);" class="btn btn-standard">Read More</a>
                </div>
                <!-- Image Section -->
                <div class="col-md-6">
                    <img src="/images/movie1.jpg" alt="Post Image" class="img-fluid">
                </div>
            </div>
        </div>
    </div>


    <!-- Include JavaScript file -->
    <script src="/resources/js/app.js"></script>

    </div>
</x-app-layout>