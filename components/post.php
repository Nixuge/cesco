<?php

function post($content, $author, $date) {
    return "
        <div class='post'>
            <div class='info-post'>
                <img src='' alt='profile.picture' class='post-profile'>
                <div class='name-date-post'>
                    <p class='name-post'>{$author}</p>
                    <p class='date-post'>{$date}</p>
                </div>
            </div>
            <div class='line'></div>
            <p class='text-post'>{$content}</p>

            <div class='post-footer'>
                <button class='button-bottom'><p class='button-bottom-text'>!</p></button>
                <button class='button-bottom'><p class='button-bottom-text'>X</p></button>
                <button class='button-bottom'><p class='button-bottom-text'>↑</p></button>
                <button class='button-bottom'><p class='button-bottom-text'>↕</p></button>
                <button class='button-bottom'><p class='button-bottom-text'>↓</p></button>
            </div>
        </div>
    ";
}

?>
