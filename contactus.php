<?php 
    include("layout/header.php");
?>

    <section>
        <div class="row w-100 m-0">
            <div class="col-md-12 py-5 text-center">
                <h1 class="display-4">Let's Connect</h1>
                <p class="font-weight-light">We love to help you. Feel free to ask.</p>
            </div>
        </div>
        <div class="container">
            <div class="row my-5">
                <div class="col-md-7">
                    <h4 class="mb-4">Contact form</h4>
                    <form class="mb-3" action="insert_q.php" method="POST">
                        <div class="form-group">
                            <input type="text" class="form-control" name="username" placeholder="Username" required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="email" placeholder="Email" required>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="question" placeholder="Ask a question" rows="5" required></textarea>
                        </div>
                        <button type="reset" class="btn btn-outline-danger px-3 mr-2">Cancel</button>
                        <button type="submit" class="btn btn-dark px-4">Send</button>
                    </form>
                </div>
                <div class="col-md-5">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d756.4622944717552!2d-73.94086017078314!3d40.67729199870848!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNDDCsDQwJzM4LjMiTiA3M8KwNTYnMjUuMSJX!5e0!3m2!1sen!2smm!4v1603874144371!5m2!1sen!2smm" width="100%" height="293" frameborder="0" style="border: thin solid rgba(128, 128, 128, 0.383);" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                    <p class="mb-1"><i class="fa fa-map-pin" aria-hidden="true"></i> 1527 Pacific St, <br> Brooklyn, NY 11213, <br> United States</p>
                    <p class="mb-1"><i class="fa fa-envelope" aria-hidden="true"></i> info@pollut.com</p>
                    <p><i class="fa fa-phone" aria-hidden="true"></i>+1-202-555-987</p>
                </div>
            </div>
        </div>
    </section>

<?php 
    include("layout/footer.php");
?>