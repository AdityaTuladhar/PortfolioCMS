<section id="experiences" class="experiences section-bg pb-5">
    <div class="container">
        <div class="section-title">
            <h1>Experiences</h1>
        </div>
        <div class="row experience-content">
            @foreach ($experiences as $experience)
            <div class="col-1 experience-dash" data-aos="fade-up"></div>
            <div class="col-11 experience-detail">
                <div class="experience-date">{{ explode(" ",$experience['date'])[0] }}</div>
                <div class="experience-name">{{ $experience['info'] }}</div>
            </div>
            @endforeach
        </div>

    </div>
</section>