<section id="about" class="about section-bg">
    <div class="container">
        <div class="section-title">
            <h1>Details</h1>
            <div class="row">
                <div class="col-lg-12 pt-4 pt-lg-0 content">
                    <div class="row">
                        <div class="col-lg-6">
                            <ul>
                                <li><i class="bi bi-chevron-right"></i> <strong>Name:</strong> <span>{{ $details['name']
                                        }}</span></li>
                                <li><i class="bi bi-chevron-right"></i> <strong>Sex:</strong> <span>{{ $details['sex']
                                        }}</span></li>
                                <li><i class="bi bi-chevron-right"></i> <strong>Email:</strong> <span>{{
                                        $details['email'] }}</span></li>
                            </ul>
                        </div>
                        <div class="col-lg-6">
                            <ul>
                                <li><strong>&nbsp;</strong> </li>
                                <li><i class="bi bi-chevron-right"></i> <strong>Age:</strong> <span>{{ $details['age']
                                        }}</span></li>
                                <li><i class="bi bi-chevron-right"></i> <strong>Phone:</strong> <span>{{
                                        $details['phone'] }}</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>