<x-layout>    
    <main class="container-fluid">
        <section class="row about-us">
            <div class="col-12">
                <h4 class="text-center tx-darkBlu mt-5">Il Team dietro il progetto</h4>
                <div class="text-center tx-darkBlu mt-3">
                    <p>
                        Perchè Presto?<br>
                        Perchè crediamo che pubblicare e trovare un annuncio debba essere<br>
                        facile, immediato e senza complicazioni.
                    </p>
                </div>
                <div class="row justify-content-center mt-5 mb-5 g-4">

                    <div class="col-12 col-md-4 d-flex justify-content-center"> 
                        <div class="card card-team text-center">
                            <img src="{{asset('/img/Leonardo.png') }}" class="img-avatar mx-auto mt-3" alt="team">
                            <div class="card-body">
                                <h5 class="card-title fw-bold">Leonardo Lauria</h5>
                                <p class="card-text">Sviluppatore Backend</p>
                                <div class="social-icons">
                                    <a href="#"><i class="bi bi-instagram"></i></a>
                                    <a href="#"><i class="bi bi-linkedin"></i></a>
                                </div>
                                <button class="btn-more" onclick="toggleInfo(this)">Scopri di più</button>
                                <p class="extra-info  mt-2">
                                    Appassionato di sviluppo backend e architetture scalabili.
                                </p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-12 col-md-4 d-flex justify-content-center"> 
                        <div class="card card-team text-center">
                            <img src="{{asset('/img/Maria.png') }}" class="img-avatar mx-auto mt-3" alt="team">
                            <div class="card-body">
                                <h5 class="card-title fw-bold">Maria Tagliente</h5>
                                <p class="card-text">Sviluppatrice Frontend</p>
                                <div class="social-icons">
                                    <a href="#"><i class="bi bi-instagram"></i></a>
                                    <a href="#"><i class="bi bi-linkedin"></i></a>
                                </div>
                                <button class="btn-more" onclick="toggleInfo(this)">Scopri di più</button>
                                <p class="extra-info mt-2">
                                    Appassionata di sviluppo frontend e interfacce moderne e intuitive.
                                </p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-12 col-md-4 d-flex justify-content-center">
                        <div class="card card-team text-center">
                            <img src="{{asset('/img/Leopoldo.png') }}" class="img-avatar mx-auto mt-3" alt="team">
                            <div class="card-body">
                                <h5 class="card-title fw-bold">Leopoldo Romano</h5>
                                <p class="card-text">Sviluppatore Full Stack</p>
                                <div class="social-icons">
                                    <a href="#"><i class="bi bi-instagram"></i></a>
                                    <a href="#"><i class="bi bi-linkedin"></i></a>
                                </div>
                                <button class="btn-more" onclick="toggleInfo(this)">Scopri di più</button>
                                <p class="extra-info mt-2">
                                    Appassionato di sviluppo full stack, dalla logica backend alle interfacce frontend.
                                </p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </main>
</x-layout>