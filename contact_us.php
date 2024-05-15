<?php require_once ("header.html");?>

<main>

	<h2>We want to hear from you!</h2>

    <form action="submit_form.php" method="post">
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name"><br><br>
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email"><br><br>
        <textarea rows="5" cols="33" placeholder="Comments"></textarea>
        <p><input type="submit" value="Submit"></p>
    </form>
	

    <section>
            <h2>Contact Us</h2>
            <p>For any inquiries, please email us at <a href="mailto:info@example.com">info@example.com</a>.</p>
        </section>
	<h2 id = "links">Links</h2>
	<ul>
	<p><a href=https://www.facebook.com>Facebook</a></p>
	<p><a href=mailto:racheloalden@gmail.com>Email</a></p>
	</ul>
	<hr>

</main>

<?php require_once ("footer.html");?>