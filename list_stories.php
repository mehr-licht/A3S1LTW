<?php
    include_once('templates/tpl_common.php');
    draw_header(null); // TODO
?>
    <section id="stories">
        <article>
            <h1>This is some random title</h1>
            <img alt="Some random image" src="https://picsum.photos/200">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent diam elit, fringilla eget imperdiet ac, lobortis ac massa. Etiam vulputate quam pretium, viverra metus vitae, molestie lorem. Nullam iaculis nunc sit amet mauris ornare venenatis. Fusce blandit urna nunc, id iaculis erat porta non. Nullam semper euismod ornare. Nulla sit amet enim lacinia libero accumsan pharetra. Praesent sed tortor a diam dictum varius. Nullam cursus, ligula ut molestie egestas, ante diam dictum ipsum, id lobortis est sapien vitae ligula. Vestibulum ultricies diam tristique felis facilisis feugiat. Maecenas malesuada fermentum odio molestie sagittis. Sed imperdiet sapien nec velit aliquam ullamcorper. Donec tincidunt euismod nisi a dignissim. Mauris dapibus sed tellus sagittis gravida. Nulla hendrerit id dolor vel volutpat. Fusce tortor risus, consequat sit amet cursus id, mattis vitae nulla.</p>
            <footer>
                <p>
                    Posted on
                    <time datetime="2018-11-06 11:15">2018-11-06 11:15</time>
                    by
                    <a href="#">Some guy</a>
                </p>
            </footer>
        </article>
        <article>
            <h1>Yet another post</h1>
            <img alt="Some random image" src="https://picsum.photos/200">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed placerat pharetra libero, sit amet pretium neque viverra et. Donec facilisis sapien quis eros sagittis vestibulum. Aenean quis felis rutrum, consectetur felis et, pellentesque lectus. Morbi et mi pellentesque sem molestie pulvinar eget ut metus. Ut fringilla velit ac velit imperdiet fermentum. Nam metus dolor, mattis eget libero vitae, imperdiet faucibus nibh. Vivamus condimentum sapien eget pellentesque volutpat. Phasellus lacus purus, ornare ut malesuada in, porta id sapien.</p>
            <footer>
                <p>
                    Posted on
                    <time datetime="2018-11-06 11:21">2018-11-06 11:21</time>
                    by
                    <a href="#">Some guy</a>
                </p>
            </footer>
        </article>

    </section>

    <aside>
        <p>aside</p>
    </aside>

<?php
    draw_footer();
?>