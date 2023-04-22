<section id="skills" class="skills section-bg">
    <div class="container">
        <div class="section-title">
            <h1>Skills</h1>
        </div>
        <div class="row skills-content">
            <div class="col-lg-12" data-aos="fade-up">
                @foreach ($skills as $skill)
                <div class="progress">
                    <span class="skill">{{ $skill['languages'] }} <i class="val">{{ $skill['rating'] }}/5</i></span>
                    <div class="progress-bar-wrap">
                        <div class="progress-bar" role="progressbar" aria-valuenow="{{ (int)$skill['rating']/5 * 100 }}"
                            aria-valuemin="0" aria-valuemax="100">
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>
</section>