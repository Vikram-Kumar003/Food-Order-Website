<?php include('partials-front/menu.php'); ?>

<!-- Contact Section Starts Here -->
<section class="contact">
    <div class="container">
        <h2>Contact Us</h2>
        <div class="contact-info">
            <p>You can contact us through the following methods:</p>
            <ul>
                <li>Email: <a href="mailto:vikramsharma8651005689@gmail.com">vikramsharma8651005689@gmail.com</a></li>
                <li>Email: <a href="mailto:alok@gmail.com">alok@gmail.com</a></li>
                <li>Phone: 8651005689</li>
            </ul>
        </div>
        <p>Alternatively, you can fill out the form below:</p>
        <form action="process_contact_form.php" method="POST">
            <label for="name">Name:</label><br>
            <input type="text" id="name" name="name" required><br>

            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email" required><br>

            <label for="message">Message:</label><br>
            <textarea id="message" name="message" rows="4" required></textarea><br>

            <input type="submit" value="Submit">
        </form>
    </div>
</section>
<!-- Contact Section Ends Here -->

<?php include('partials-front/footer.php'); ?>
