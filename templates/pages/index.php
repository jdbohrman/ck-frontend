<section class="section section--header section--header--1">
    <div class="flex-container flex-container--justify">
        <div class="title-card flex-col flex-col--8">
            <h3 class="text-center">I'm looking for <i class="fa fa-search"></i></h3>

            <search-home></search-home>
        </div>
    </div>

    <div class="flex-container flex-container--justify">
        <div class="flex-col flex-col--10">
            <p class="text-center color-blue">You can search by keyword, category or by groups</p>
        </div>
    </div>
</section>

<section class="section">
    <div class="flex-container">
        <div class="flex-col flex-col--12 text-center">
            <h3>Browse by category <i class="fa fa-columns"></i></h3>
        </div>
    </div>

    <div class="flex-container">
        <div class="flex-col flex-col--12 highlight highlight--grey text-center">
            <categories></categories>
        </div>
    </div>
</section>

<section class="section section--light-blue">
    <div class="flex-container">
        <div class="flex-col flex-col--12 text-center">
            <h3>Services for people</h3>
            <p>View services and information for people with specific needs:</p>
        </div>
    </div>

    <recommendations></recommendations>
</section>

<section class="section section--social-media">
    <div class="flex-container">
        <div class="flex-col flex-col--12">
            <h3>Hear from us</h3>
        </div>
    </div>

    <div class="flex-container text-center">
        <div class="flex-col flex-col--4">
            {% include('templates/_components/card.php') with { type: 'social', frame: 'white', platform: 'twitter', content: "We're proud to supporting the homeless, refugees and many more in the Kingston area. Find out more about becoming a Community Health Champion here 👉 <a href='#'>https://t.co/3BFo2D0S3g</a>" } %}
            {% include('templates/_components/button.php') with { type: 'secondary', action: '#', target: '_blank', text: 'Follow us on twitter' } %}
        </div>

        <div class="flex-col flex-col--2"></div>

        <div class="flex-col flex-col--4">
            {% include('templates/_components/card.php') with { type: 'social', frame: 'white', platform: 'facebook', content: "We're proud to supporting the homeless, refugees and many more in the Kingston area. Find out more about becoming a Community Health Champion here 👉 <a href='#'>https://t.co/3BFo2D0S3g</a>" } %}
            {% include('templates/_components/button.php') with { type: 'secondary', action: '#', target: '_blank', text: 'Like us on facebook' } %}
        </div>
    </div>
</section>

<section class="section">
    <div class="flex-container">
        <div class="flex-col flex-col--7 highlight highlight--grey">
        {% include('templates/_components/media.php') with { type: 'video', embedCode: '<iframe width="560" height="315" src="https://www.youtube.com/embed/NpEaa2P7qZI" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>' } %}
        </div>

        <div class="flex-col flex-col--5">
            {% include('templates/_components/quote.php') with { quote: "It's been something I look forward every week, it's really helped me.", by: 'Rachel', what: 'Coffee morning regular' } %}
        </div>
    </div>
</section>