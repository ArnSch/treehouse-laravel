@extends('shop/layout')

@section('content')
<div class="section page">

        <div class="wrapper">

            <h1>Contact</h1>

            <?php // if status=thanks in the query string, display an thank you message instead of the form ?>
            <?php if (isset($_GET["status"]) AND $_GET["status"] == "thanks") { ?>
                <p>Thanks for the email! I&rsquo;ll be in touch shortly!</p>
            <?php } else { ?>

                <?php
                    if (!isset($error_message)) {
                        echo '<p>I&rsquo;d love to hear from you! Complete the form to send me an email.</p>';
                    } else {
                        echo '<p class="message">' . $error_message . '</p>';
                    }
                ?>

                <form method="post" action="<?php echo BASE_URL; ?>contact/">

                    <table>
                        <tr>
                            <th>
                                <label for="name">Name</label>
                            </th>
                            <td>
                                <input type="text" name="name" id="name" value="<?php if (isset($name)) { echo htmlspecialchars($name); } ?>">
                            </td>
                        </tr>
                        <tr>
                            <th>
                                <label for="email">Email</label>
                            </th>
                            <td>
                                <input type="text" name="email" id="email" value="<?php if(isset($email)) { echo htmlspecialchars($email); } ?>">
                            </td>
                        </tr>
                        <tr>
                            <th>
                                <label for="message">Message</label>
                            </th>
                            <td>
                                <textarea name="message" id="message"><?php if (isset($message)) { echo htmlspecialchars($message); } ?></textarea>
                            </td>
                        </tr> 
                        <tr style="display: none;">
                            <?php // the field named address is used as a spam honeypot ?>
                            <?php // it is hidden from users, and it must be left blank ?>
                            <th>
                                <label for="address">Address</label>
                            </th>
                            <td>
                                <input type="text" name="address" id="address">
                                <p>Humans (and frogs): please leave this field blank.</p>
                            </td>
                        </tr>                   
                    </table>
                    <input type="submit" value="Send">

                </form>

            <?php } ?>

        </div>

    </div>
@stop