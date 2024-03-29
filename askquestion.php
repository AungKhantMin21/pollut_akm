<?php include("layout/header.php");
if(empty($_SESSION['id']))
{
    echo '<script type="text/javascript">'; 
    echo 'alert("You does not have permission to visit this page. You need to login first.");'; 
    echo 'window.location.href = "index.php";';
    echo '</script>';
}
else{
?>

    <section>
        <div class="container">
            <div class="row w-100">
                <div class="col-md-8 mx-auto my-5 text-center">
                    <h2>How can we help you ?</h2>
                    <p class="font-weight-light mb-3">We love to help you. Feel free to ask.</p>
                    <div class="card">
                        <div class="card-body shadow-sm">
                            <form class="mb-3 text-right" action="insert_q.php" method="POST">
                                <div class="form-group">
                                    <textarea class="form-control" name="question" placeholder="Ask a question" rows="5" required></textarea>
                                </div>
                                <a type="reset" href="faq.php" class="btn btn-outline-danger px-3 mr-2">Cancel</a>
                                <button type="submit" class="btn btn-dark px-4">Send</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php }
include("layout/footer.php");?>