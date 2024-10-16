<?php include
    '../includes/header.php'; ?>



    <div class="container">
        <div class="row">
            <div class="col-md-5 mx-auto">
                <form action="send.php" method="POST">
                    <h1 class="mb-4">Contact Us</h1>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Enter your name">
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Enter your email">
                    </div>

                    <div class="form-group">
                        <label for="message">Message</label>
                        <textarea name="message" id="message" rows="6" class="form-control" placeholder="Enter your message"></textarea>
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-info btn-block" name="submit">Send Message</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php include '../includes/footer.php'; ?>
